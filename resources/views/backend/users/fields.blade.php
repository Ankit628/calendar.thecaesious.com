
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('name','User Name',['class'=>'col-form-label']) !!}
            {!! Form::text('name',null,['class'=>'form-control','required'=>'required']) !!}
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('email','Email',['class'=>'col-form-label']) !!}
            {!! Form::email('email',null,['class'=>'form-control','required'=>'required']) !!}
        </div>
    </div>
