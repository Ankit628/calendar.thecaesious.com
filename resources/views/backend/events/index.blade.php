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
                        <h3 class="card-title">
                            Events list
                        </h3>
                        <div class="row mb-3">
                            <div class="col-lg-12 col-md-12 col-sm-12 pt-0">
                                {{ Form::open(['route' => ['admin.event.index'],'id'=>'events-filter-form','class'=>'form-horizontal','method'=>'GET']) }}
                                <div class="form-row">
                                    <div class="col-md-2 p-1">
                                        {!! Form::select('filter_per_page',getPagelist(),Request::get('time_period')?Request::get('time_period'):'this_month', ["class" => "form-control bg-light"])!!}
                                    </div>
                                    <div class="col-md-3 p-1">
                                        {!! Form::select("time_period",getHumanReadableTimeFormat(), Request::get('time_period')?Request::get('time_period'):'this_month', ["class" => "form-control bg-light"]) !!}
                                    </div>
                                    <div class="col-md-3 p-1">
                                        {!! Form::date("start_date", Request::get('start_date')?Request::get('start_date'):now(), ["class" => "form-control bg-light DatePicker",'required']) !!}
                                    </div>
                                    <div class="col-md-3 p-1">
                                        {!! Form::date("end_date",Request::get('end_date')?Request::get('end_date'):now()->endOf('month'), ["class" => "form-control bg-light DatePicker",'required']) !!}
                                    </div>
                                    <div class="col-md-1 p-1">
                                        {!! Form::submit('Filter',['class'=>'btn btn-outline-info btn-block','id'=>'filter-notifications']) !!}
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
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
                                            <span class="{{getTextClass($item['event_priority'])}} fa fa-exclamation-circle text-lg pr-4"></span> {{$item['event_name']}}
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
