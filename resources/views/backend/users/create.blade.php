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
                            <h4 class="card-title">
                                <span class="fa fa-user-alt text-lg pr-md-4"></span>
                                Create User Form
                            </h4>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="float-right btn btn-success" id="btn-submit">
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
