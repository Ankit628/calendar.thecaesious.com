@extends('backend.layouts.app')
@section('page-header')
    <h1>Create User</h1>
@endsection
@section('content')
    <div class="row">
        <div class="offset-2 col-md-8">
            {!! Form::open(['id'=>'createUserForm','route'=>'admin.user.store','method'=>'POST']) !!}
            <div class="card shadow p-4 bg-light">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-9">
                            <h2 class="card-title">
                                <span class="fa fa-user-alt text-lg pr-md-4"></span>
                                Create User Form
                            </h2>
                        </div>
                        <div class="col-md-3 text-md-right">
                            <button type="submit" class="btn btn-sm btn-success" id="btn-submit">
                                <span class="fa fa-check-circle"></span>
                                Create
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            @include('backend.users.fields')
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('password','Password',['class'=>'col-form-label']) !!}
                                    {!! Form::password('password',['class'=>'form-control','required'=>'required']) !!}
                                </div>
                            </div>
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
        jQuery(function ($) {
            let createEventForm = $('#createUserForm');
            let submitBtn = $('#btn-submit');
            customCheckboxes.on('click', function () {
                let val = optionalField.val();
                if (val !== 'custom_days') {
                    toastr.error('Warning', 'Cannot select Days on this option.Please select custom days option to select days');
                    return false;
                }
            });
            submitBtn.on('click', function (e) {
                $(this).prop('disabled', true);
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
                    createEventForm.submit();
                }
            });
        });
    </script>
@endpush
