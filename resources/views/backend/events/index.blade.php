@extends('backend.layouts.app')
@section('page-header')
    <h1>Events</h1>
@endsection
@section('content')
    <div class="row mb-4">
        <div class="col-md-12">
            <a href="{{route('admin.event.create')}}" class="btn btn-success btn-sm"><span class="fa fa-plus"></span> Add new Events</a>
        </div>
    </div>
    @if(!empty($model))
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header">
                        <span class="h2 card-title">
                            Events list
                        </span>
                        <a href="{{route('admin.event.create')}}" class="float-right btn btn-success btn-sm"><span class="fa fa-plus"></span> Add new Events</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead-dark">
                                <tr>
                                    <th style="width:40%">Event Name</th>
                                    <th style="width:30%" class="text-center">Start Date / End Date</th>
                                    <th style="width:30%;" class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($model as $item)
                                    <tr>
                                        <td>
                                            <span class="{{getBGClass($item['event_priority'])}} fa fa-sticky-note"></span> {{$item['event_name']}}
                                        </td>
                                        <td class="text-center">{{$item['event_startDate']}} / {{$item['event_endDate']}}</td>
                                        <td class="text-center">
                                            <a href="{{route('admin.event.edit',['id'=>$item['id']])}}" class="btn btn-info btn-sm"><span class="fa fa-edit"></span> Edit</a>
                                            <a href="#deleteModal" class="btn btn-danger btn-sm btn-delete" data-toggle="modal" data-route="{{route('admin.event.destroy',['id'=>$item['id']])}}"><span class="fa fa-trash-alt"></span> Delete</a>
                                            <a href="{{route('admin.event.show',['id'=>$item['id']])}}" class="btn btn-warning btn-sm btn-delete"><span class="fa fa-eye"></span> Show</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
@push('scripts')
    <script type="text/javascript">
        jQuery(function ($) {
            $('.btn-delete').on('click', function () {
                let route = $(this).data('route');
                $('#deleteModal').find('a').attr('href', route);
            });
        });
    </script>
@endpush
