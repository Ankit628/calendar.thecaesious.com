@extends('backend.layouts.app')
@section('page-header')
    <h1>Edit User</h1>
@endsection
@section('content')
    <div class="row mt-5">
        <div class="offset-md-2 col-md-8">
            {!! Form::model($model,['id'=>'editUserForm'])!!}
            <div class="card shadow">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="card-title">
                                <span class="fa fa-user-alt text-lg {{($model->hasRole('admin'))?'text-success':'text-warning'}} pr-md-4"></span> User: {{$model['name']}}
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        @include('backend.users.fields')
                    </div>
                </div>
                <div class="card-footer text-md-right">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="{{asset('backend/assets/img/dual-ring.png')}}" alt="loader" style="display:none;" id="loader" width="70px"/>
                            <a href="javascript:void(0)" class="btn btn-sm btn-info" id="btn-update"><span class="fa fa-check-circle"></span>
                                <span class="display-md-none">Update</span></a>
                            <a href="{{route('admin.user.destroy',['id'=>$model['id']])}}" class="btn btn-sm btn-danger"><span class="fa fa-trash-alt"></span>
                                <span class="display-md-none">Delete</span></a>
                            <a href="{{route('admin.user.show',['id'=>$model['id']])}}" class="btn btn-sm btn-warning"><span class="fa fa-eye"></span>
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
        jQuery(function () {
            let body = $('body');
            let createEventForm = $('#editUserForm');
            let loader = $('#loader');
            let submitBtn = $('#btn-update');
            let updateEventRoute = '{{route('admin.user.update',['id'=>$model['id']])}}';
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
