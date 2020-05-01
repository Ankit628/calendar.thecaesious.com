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
                        <div class="col-md-4">
                            <h2 class="card-title">
                                <span class="fa fa-sticky-note text-lg text-success pr-md-4"></span>
                                Edit Event: {{$model['event_name']}}
                            </h2>
                        </div>
                        <div class="col-md-8">
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
                    </div>
                </div>
                <div class="card-body">
                    @include('backend.events.fields')
                </div>
                <div class="card-footer text-md-right">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="{{asset('backend/assets/img/dual-ring.png')}}" alt="loader" style="display:none;" id="loader" width="70px"/>
                            <a href="javascript:void(0)" class="btn btn-sm btn-info" id="btn-update"><span class="fa fa-check-circle"></span>
                                <span class="display-md-none">Update</span></a>
                            <a href="{{route('admin.event.destroy',['id'=>$model['id']])}}" class="btn btn-sm btn-danger btn-delete"><span class="fa fa-trash-alt"></span>
                                <span class="display-md-none">Delete</span></a>
                            <a href="{{route('admin.event.show',['id'=>$model['id']])}}" class="btn btn-sm btn-warning"><span class="fa fa-eye"></span>
                                <span class="display-md-none">Show</span></a>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
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
            let body = $('body');
            let createEventForm = $('#editEventForm');
            let loader = $('#loader');
            let submitBtn = $('#btn-update');
            let updateEventRoute = '{{route('admin.event.update',['id'=>$model['id']])}}';
            optionalField.on('change', function () {
                if ($(this).val() !== 'custom_days') {
                    customCheckboxes.find('input[type=checkbox]').prop("checked", false)
                }
            });
            customCheckboxes.on('click', function () {
                let val = optionalField.val();
                if (val !== 'custom_days') {
                    toastr.error('Warning', 'Cannot select Days on this option. Please select custom days option to select days');
                    return false;
                }
            });
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
