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
                                    <span class="fa fa-exclamation-triangle {{getTextClass($model['event_priority'])}}"></span>
                                    Details
                                </h4>
                            </div>
                            <div class="col-md-4 text-right">
                                <a href="{{route('admin.event.edit',['id'=>$model['id']])}}" class="btn btn-info"><span class="fa fa-edit"></span> Edit</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="{{getTextClass($model['event_priority'])}}">
                            <tr>
                                <th>Title</th>
                                <th>Details</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Id</td>
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
                            @if(!empty($model['event_recursion']))
                                <tr>
                                    <td>Event Repeats</td>
                                    <td class="text-capitalize">{{deSlugify($model['event_recursion'])}}</td>
                                </tr>
                            @endif
                            @if(!empty($model['event_repeating_days']))
                                <tr>
                                    <td>Event Repeating Days</td>
                                    <td class="text-capitalize">
                                        @foreach($model['event_repeating_days'] as $item)
                                            {{getDaysOfWeek($item)}}
                                        @endforeach
                                    </td>
                                </tr>
                            @endif
                            <tr>
                                <td>Description</td>
                                <td>{{$model['event_description']}}</td>
                            </tr>
                            <tr>
                                <td>Data</td>
                                <td>{{$model['event_data']}}</td>
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
