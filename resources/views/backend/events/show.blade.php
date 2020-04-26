@extends('backend.layouts.app')
@section('page-header')
    <h1>Detailed View of the Event</h1>
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
                                    <span class="fa fa-exclamation-triangle {{getBGClass($model['id'])}}"></span>
                                    Details
                                </h4>
                            </div>
                            <div class="col-md-4">
                                <a href="{{route('admin.event.edit',['id'=>$model['id']])}}" class="btn btn-info btn-sm"><span class="fa fa-edit"></span> Edit</a>
                                <a href="#deleteModal" class="btn btn-danger btn-sm btn-delete" data-toggle="modal" data-route="{{route('admin.event.destroy',['id'=>$model['id']])}}"><span class="fa fa-trash-alt"></span> Delete</a>
                                <a href="{{route('admin.event.show',['id'=>$model['id']])}}" class="btn btn-warning btn-sm btn-delete"><span class="fa fa-eye"></span> Show</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th>Title</th>
                                <th>Details</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Id:</td>
                                <td>{{$model['event_priority']}}</td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>{{$model['event_name']}}</td>
                            </tr>
                            <tr>
                                <td>Start Date/Time</td>
                                <td>{{$model['event_startDate']}} / {{$model['event_startTime']}}</td>
                            </tr>
                            <tr>
                                <td>End Date/Time</td>
                                <td>{{$model['event_endDate']}} / {{$model['event_endTime']}}</td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td>{{$model['event_description']}}</td>
                            </tr>
                            </tbody>
                            <tfoot class="thead-dark">
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
    <script type="text/javascript">
        jQuery(function ($) {
            $('.btn-delete').on('click', function () {
                let route = $(this).data('route');
                $('#deleteModal').find('a').attr('href', route);
            });
        });
    </script>
@endpush
