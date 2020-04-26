@extends('backend.layouts.app')
@section('page-header')
    <h1>Edit Event</h1>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            {!! Form::model($model,['id'=>'editEventForm'])!!}
            <div class="card shadow">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-3">
                            <h2 class="card-title">Edit Event</h2>
                        </div>
                        <div class="col-md-8 mt-2">
                            <label class="custom-radio text-success">
                                {!! Form::radio('event_priority', '1')!!} Low Priority
                                <span class="radio-btn green"></span>
                            </label>
                            <label class="custom-radio text-warning">
                                {!! Form::radio('event_priority', '2')!!} Medium Priority
                                <span class="radio-btn yellow"></span>
                            </label>
                            <label class="custom-radio text-danger">
                                {!! Form::radio('event_priority', '3')!!} High Priority
                                <span class="radio-btn red"></span>
                            </label>
                        </div>
                        <div class="col-md-1">
                            <a href="javascript:void(0)" class="float-right btn btn-sm btn-info" id="btn-update">Update</a>
                            <img src="{{asset('backend/assets/img/dual-ring.png')}}" alt="loader" style="display:none;" id="loader"
                                 width="70px"/>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('backend.events.fields')
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        let datePicker = flatpickr('.DatePicker');
        let timePicker = flatpickr('.timePicker', {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i:S",
            time_24hr: false
        });
        $(function () {
            let customCheckboxes = $('.custom-checkboxes');
            let optionalField = $('.optional-field');
            optionalField.on('change', function () {
                if ($(this).val() !== 'custom_days') {
                    customCheckboxes.find('input[type=checkbox]').prop("checked", false)
                }
            });
            customCheckboxes.on('click', function () {
                let val = optionalField.val();
                if (val !== 'custom_days') {
                    toastr.error('Error', 'Cannot select Days on this option');
                    toastr.warning('Warning', 'Please select custom days option to select days');
                    return false;
                }
            });
            let body = $('body');
            let createEventForm = $('#editEventForm');
            let loader = $('#loader');
            let submitBtn = $('#btn-update');
            let updateEventRoute = '{{route('admin.event.update',['id'=>$model['id']])}}';
            submitBtn.on('click', function (e) {
                e.preventDefault();
                submitBtn.prop('disabled', true);
                let value = [];
                createEventForm.find(':input.form-control[required=required]').each(function () {
                    if ($(this).val() !== "")
                        value.push(true);
                    else
                        value.push(false);
                });
                if (value.includes(false)) {
                    toastr.warning('Warning', 'Please fill all the fields');
                    submitBtn.prop('disabled', false);
                    return false;
                } else {
                    $.ajax({
                        url: updateEventRoute,
                        type: 'POST',
                        data: createEventForm.serialize(),
                        beforeSend: function () {
                            submitBtn.hide();
                            loader.show();
                        },
                        success: function (data) {
                            toastr.success('Success', 'Event Successfully updated');
                            loader.hide();
                            submitBtn.show();
                            submitBtn.prop('disabled', false);
                        },
                        error: function (data) {
                            toastr.error('Error', 'Errors Occurred check console');
                            console.log(data);
                            loader.hide();
                            submitBtn.show();
                            submitBtn.prop('disabled', false);
                        }
                    });
                }
            });
        });
    </script>
@endpush
