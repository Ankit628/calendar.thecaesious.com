@extends('backend.layouts.app')
@section('page-header')
    <h1>Calendar View</h1>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow p-3 text-dark">
                <div id="calendar"></div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        jQuery(function () {
            let calendarelem = $('#calendar');
            let calendar = new FullCalendar.Calendar(calendarelem[0], {
                plugins: ['dayGrid'],
                theme: ['bootstrap'],
                textColor: '#fff',
                height: 'parent',
                events: [
                        @foreach($model as $item)
                    {
                        id: '{{$item['id']}}',
                        title: '{{$item['event_name']}}',
                        start: '{{$item['event_startDate']}}' + 'T' + '{{$item['event_startTime']}}',
                        end: '{{$item['event_endDate']}}' + 'T' + '{{$item['event_endTime']}}',
                        url: '{{route('admin.event.show',['id'=>$item['id']])}}',
                        color: '{{getBGColor($item['event_priority'])}}',
                        @if(!empty($item['event_repeating_days']))
                        startRecur: '{{$item['event_startDate']}}' + 'T' + '{{$item['event_startTime']}}',
                        daysOfWeek: {!! getStringOfDates($item['event_repeating_days'])!!},
                        @endif
                            @if(!empty($item['event_recursion']) && $item['event_recursion']!=='custom_days')
                        startRecur: '{{$item['event_startDate']}}' + 'T' + '{{$item['event_startTime']}}',
                        daysOfWeek: {!! getStringOfDates($item['event_recursion'],$item['event_startDate'])!!},
                        @endif
                    },
                    @endforeach
                ],
            });
            calendar.render();
        });
    </script>
@endpush

