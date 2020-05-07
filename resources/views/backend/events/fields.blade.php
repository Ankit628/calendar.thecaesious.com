<div class="form-row">
    <div class="col-md-12 notification" {{!empty($model['event_notify'])?'':"style=display:none;"}}>
        <div class="form-group">
            {!! Form::label('event_notify','Notify Before',['class'=>'col-form-label']) !!}
            {!! Form::select('event_notify',getNotificationsTime(),null,['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('event_name','Event Name',['class'=>'col-form-label']) !!}
            {!! Form::text('event_name',null,['class'=>'form-control','required'=>'required']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('event_startDate','Event Start Date',['class'=>'col-form-label']) !!}
            {!! Form::date('event_startDate',null,['class'=>'form-control DatePicker','required'=>'required']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('event_endDate','Event End Date',['class'=>'col-form-label']) !!}
            {!! Form::date('event_endDate',null,['class'=>'form-control DatePicker','required'=>'required']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('event_startTime','Event Start Time',['class'=>'col-form-label']) !!}
            {!! Form::time('event_startTime',null,['class'=>'form-control timePicker','required'=>'required']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('event_endTime','Event End Time',['class'=>'col-form-label']) !!}
            {!! Form::time('event_endTime',null,['class'=>'form-control timePicker','required'=>'required']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('event_recursion','Event Repeat',['class'=>'col-form-label']) !!}
            {!! Form::select('event_recursion',getHumanReadableTimePeriods(),null,['class'=>'form-control optional-field']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group weekDays">
            <label class="custom-checkboxes">
                {!! Form::checkbox('event_repeating_days[]',6,null,['class'=>'form-control']) !!} Sat
                <span class="checkmark"></span>
            </label>
            <label class="custom-checkboxes">
                {!! Form::checkbox('event_repeating_days[]',0,null,['class'=>'form-control']) !!} Sun
                <span class="checkmark"></span>
            </label>
            <label class="custom-checkboxes">
                {!! Form::checkbox('event_repeating_days[]',1,null,['class'=>'form-control']) !!} Mon
                <span class="checkmark"></span>
            </label>
            <label class="custom-checkboxes">
                {!! Form::checkbox('event_repeating_days[]',2,null,['class'=>'form-control']) !!} Tue
                <span class="checkmark"></span>
            </label>
            <label class="custom-checkboxes">
                {!! Form::checkbox('event_repeating_days[]',3,null,['class'=>'form-control']) !!} Wed
                <span class="checkmark"></span>
            </label>
            <label class="custom-checkboxes">
                {!! Form::checkbox('event_repeating_days[]',4,null,['class'=>'form-control']) !!} Thu
                <span class="checkmark"></span>
            </label>
            <label class="custom-checkboxes">
                {!! Form::checkbox('event_repeating_days[]',5,null,['class'=>'form-control']) !!} Fri
                <span class="checkmark"></span>
            </label>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('event_description','Event Description',['class'=>'col-form-label']) !!}
            {!! Form::textarea('event_description',null,['class'=>'form-control']) !!}
        </div>
    </div>
</div>
