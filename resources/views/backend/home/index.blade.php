@extends('backend.layouts.app')
@section('page-header')
    <h1>Dashboard</h1>
@endsection
@section('content')
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="btn-group-sm">
                <a href="{{route('admin.event.create')}}" class="btn btn-sm btn-success">
                    <div class="card bg-transparent border-0">
                        <div class="card-body">
                            <h4 class="card-title text-white m-0">
                                Add Event <span class="fa fa-calendar-plus"></span>
                            </h4>
                        </div>
                    </div>
                </a>
                <a href="{{route('admin.event.index')}}" class="btn btn-sm btn-warning">
                    <div class="card bg-transparent border-0">
                        <div class="card-body">
                            <h4 class="card-title text-white m-0">
                                View Events <span class="fa fa-calendar-check"></span>
                            </h4>
                        </div>
                    </div>
                </a>
                <a href="{{route('admin.calendar.index')}}" class="btn btn-sm btn-info">
                    <div class="card bg-transparent border-0">
                        <div class="card-body">
                            <h4 class="card-title text-white m-0">
                                View Calendar <span class="fa fa-calendar"></span>
                            </h4>
                        </div>
                    </div>
                </a>
                <a href="{{route('admin.notification.push')}}" class="btn btn-sm btn-info">
                    <div class="card bg-transparent border-0">
                        <div class="card-body">
                            <h4 class="card-title text-white m-0">
                                Push Notification <span class="fa fa-bell"></span>
                            </h4>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card shadow bg-light">
                <div class="card-header">
                    <h3 class="card-title">
                        Upcomming Events
                    </h3>
                    <div class="row mb-3">
                        <div class="col-lg-12 col-md-12 col-sm-12 pt-0">
                            {{ Form::open(['route' => ['admin.index'],'id'=>'events-filter-form','class'=>'form-horizontal','method'=>'GET']) }}
                            <div class="form-row">
                                <div class="col-sm-3 col-md-2 p-1">
                                    {!! Form::select('filter_per_page',getPagelist(),Request::get('time_period')?Request::get('time_period'):'this_month', ["class" => "form-control bg-light"])!!}
                                </div>
                                <div class="col-sm-3 col-md-3 p-1">
                                    {!! Form::select("time_period",getHumanReadableTimeFormat(), Request::get('time_period')?Request::get('time_period'):'this_month', ["class" => "form-control bg-light"]) !!}
                                </div>
                                <div class="col-sm-3 col-md-3 p-1">
                                    {!! Form::date("start_date", Request::get('start_date')?Request::get('start_date'):now(), ["class" => "form-control bg-light DatePicker",'required']) !!}
                                </div>
                                <div class="col-sm-3 col-md-3 p-1">
                                    {!! Form::date("end_date",Request::get('end_date')?Request::get('end_date'):now()->endOf('month'), ["class" => "form-control bg-light DatePicker",'required']) !!}
                                </div>
                                <div class="col-sm-12 col-md-1 p-1">
                                    {!! Form::submit('Filter',['class'=>'btn btn-outline-info btn-block','id'=>'filter-notifications']) !!}
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        @foreach($model as $item)
                            <div class="list-group-item list-group-item-action">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3>
                                            <span class="{{getTextClass($item['event_priority'])}} fa fa-exclamation-circle text-lg pr-md-4"></span>
                                            {{$item['event_name']}}
                                            <span class="pl-md-4 fa fa-bell{{($item['event_notification']=='1')?"":'-slash'}} {{($item['event_notification']=='1')?"text-primary":'text-secondary'}}"></span>
                                        </h3>
                                    </div>
                                    <div class="col-md-3">
                                        <h4>
                                            {{$item['event_startDate']}} / {{$item['event_endDate']}}
                                        </h4>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="{{route('admin.event.edit',['id'=>$item['id']])}}" class="btn btn-info btn-sm"><span class="fa fa-edit"></span>
                                            <span class="display-md-none">Edit</span></a>
                                        <a href="#deleteModal" class="btn btn-danger btn-sm btn-delete" data-toggle="modal" data-route="{{route('admin.event.destroy',['id'=>$item['id']])}}"><span class="fa fa-trash-alt"></span>
                                            <span class="display-md-none">Delete</span></a>
                                        <a href="{{route('admin.event.show',['id'=>$item['id']])}}" class="btn btn-warning btn-sm btn-delete"><span class="fa fa-eye"></span>
                                            <span class="display-md-none">Show</span></a>
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
    <script type="text/javascript">
        jQuery(function ($) {

            let datePicker = flatpickr('.DatePicker');

            $('.btn-delete').on('click', function () {
                let route = $(this).data('route');
                $('#deleteModal').find('a').attr('href', route);
            });

            $('select[name=time_period]').on('change', function () {
                let dates = getDateByDurationName(this.value);
                $('input[name=start_date]').val(dates[0]).trigger('change');
                $('input[name=end_date]').val(dates[1]).trigger('change');
                setTimeout(function () {
                    $('#events-filter-form').submit();
                }, 200)
            });

            function getDateByDurationName(duration) {
                if (duration === 'today') {
                    let startDate = moment().format('YYYY-MM-DD');
                    return [startDate, startDate];
                } else if (duration === 'tomorrow') {
                    let startDate = moment().add(1, 'day').format('YYYY-MM-DD');
                    return [startDate, startDate];
                } else if (duration === 'this_week') {
                    return [moment().format('YYYY-MM-DD'), moment().endOf('week').format('YYYY-MM-DD')]
                } else if (duration === 'next_week') {
                    return [moment().format('YYYY-MM-DD'), moment().add(1, 'week').format('YYYY-MM-DD')]
                } else if (duration === 'this_month') {
                    return [moment().format('YYYY-MM-DD'), moment().endOf('month').format('YYYY-MM-DD')]
                } else if (duration === 'next_month') {
                    return [moment().format('YYYY-MM-DD'), moment().add(1, 'month').format('YYYY-MM-DD')]
                }
            }
        });
    </script>
@endpush
