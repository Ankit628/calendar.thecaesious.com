@extends('backend.layouts.app')
@section('page-header')
    <h1>Add New Events</h1>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['id'=>'createEventForm','route'=>'admin.event.store','method'=>'POST']) !!}
            <div class="card shadow">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-3">
                            <h2 class="card-title">
                                <span class="fa fa-sticky-note text-lg text-success pr-md-4"></span>
                                Create Event Form
                            </h2>
                        </div>
                        <div class="col-md-8 mt-2">
                            <label class="custom-radio text-success">
                                {!! Form::radio('event_priority', '1',null,['class'=>'form-control','required'=>'required'])!!} Low Priority
                                <span class="radio-btn green"></span>
                            </label>
                            <label class="custom-radio text-warning">
                                {!! Form::radio('event_priority', '2',null,['class'=>'form-control','required'=>'required'])!!} Medium Priority
                                <span class="radio-btn yellow"></span>
                            </label>
                            <label class="custom-radio text-danger">
                                {!! Form::radio('event_priority', '3',null,['class'=>'form-control','required'=>'required'])!!} High Priority
                                <span class="radio-btn red"></span>
                            </label>
                        </div>
                        <div class="col-md-1">
                            <button type="submit" class="float-right btn btn-success" id="btn-submit">
                                <span class="fa fa-check-circle"></span>
                                Create
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('backend.events.fields')
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
            time_24hr: false,
            allowInput: true
        });
        jQuery(function ($) {
            let customCheckboxes = $('.custom-checkboxes');
            let optionalField = $('.optional-field');
            customCheckboxes.on('click', function () {
                let val = optionalField.val();
                if (val !== 'custom_days') {
                    toastr.error('Warning', 'Cannot select Days on this option.Please select custom days option to select days');
                    return false;
                }
            });
            let createEventForm = $('#createEventForm');
            let submitBtn = $('#btn-submit');
            createEventForm.submit(function (e) {
                submitBtn.prop('disabled', true);
                let value = [];
                createEventForm.find(':input.form-control[required=required]').each(function () {
                    if ($(this).val() !== "")
                        value.push(true);
                    else
                        value.push(false);
                });
                console.log(value);
                if (value.includes(false)) {
                    toastr.warning('Warning', 'Please fill all the fields');
                    submitBtn.prop('disabled', false);
                    return false;
                } else {
                    return true;
                }
            });
        });
    </script>
@endpush
