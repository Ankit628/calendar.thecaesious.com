@extends('backend.layouts.app')
@section('page-header')
    <h1>Detailed View of User</h1>
@endsection
@section('content')
    @if(!empty($model))
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8">
                                <h4>
                                    <span class="fa fa-user {{($model->hasRole('admin'))?'text-success':'text-warning'}} text-lg pr-4"></span>
                                    Details : {{$model['name']}}
                                </h4>
                            </div>
                            <div class="col-md-4 text-right">
                                <a href="{{route('admin.user.edit',['id'=>$model['id']])}}" class="btn btn-info"><span class="fa fa-edit"></span> Edit</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="thead-dark">
                            <tr>
                                <th>Title</th>
                                <th>Details</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Id</td>
                                <td>{{$model['id']}}</td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>{{$model['name']}}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{$model['email']}}</td>
                            </tr>
                            <tr>
                                <td>Created at</td>
                                <td>{{$model['created_at']}}</td>
                            </tr>
                            <tr>
                                <td>Updated at</td>
                                <td>{{$model['created_at']}}</td>
                            </tr>
                            <tr>
                                <td>Verified at</td>
                                <td>{{$model['email_verified_at']}}</td>
                            </tr>
                            </tbody>
                            <tfoot class="{{getTextClass($model['event_priority'])}}">
                            <tr>
                                <th>Title</th>
                                <th>Details</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
@push('scripts')
@endpush