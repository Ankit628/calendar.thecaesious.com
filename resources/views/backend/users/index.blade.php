@extends('backend.layouts.app')
@section('page-header')
    <h1>Users</h1>
@endsection
@section('content')
    <div class="row mb-4">
        <div class="col-md-12">
            <a href="{{route('admin.user.create')}}" class="btn btn-success btn-sm"><span class="fa fa-plus"></span> Add new Users</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow bg-light">
                <div class="card-header">
                    <h3 class="card-title">Users List</h3>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        @foreach($model as $item)
                            <div class="list-group-item list-group-item-action">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5 class="m-0">
                                            <span class="{{($item->hasRole('admin'))?'text-success':'text-warning'}} fa fa-user text-lg pr-4"></span> {{$item['name']}}
                                        </h5>
                                    </div>
                                    <div class="col-md-4">
                                        <span class="text-info fa fa-at pr-4"></span>
                                        {{$item['email']}}
                                    </div>
                                    <div class="col-md-5">
                                        <div class="btn btn-group-sm">
                                            <a href="{{route('admin.user.edit',['id'=>$item['id']])}}" class="btn btn-info btn-sm"><span class="fa fa-edit"></span> Edit</a>
                                            <a href="#deleteModal" class="btn btn-danger btn-sm btn-delete" data-toggle="modal" data-route="{{route('admin.user.destroy',['id'=>$item['id']])}}"><span class="fa fa-trash-alt"></span> Delete</a>
                                            <a href="{{route('admin.user.show',['id'=>$item['id']])}}" class="btn btn-warning btn-sm"><span class="fa fa-eye"></span> Show</a>
                                            <a href="{{route('admin.user.events',['id'=>$item['id']])}}" class="btn btn-success btn-sm"><span class="fa fa-sticky-note"></span> Events</a>
                                            <a href="{{route('admin.user.calendar',['id'=>$item['id']])}}" class="btn btn-primary btn-sm"><span class="fa fa-calendar"></span> Calendar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type='text/javascript'>
        $('.btn-delete').on('click', function () {
            let route = $(this).data('route');
            $('#deleteModal').find('a').attr('href', route);
        });
    </script>
@endpush
