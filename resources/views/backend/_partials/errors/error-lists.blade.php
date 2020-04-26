@if (isset($errors) && count($errors)>0)
    {{Session::flash('error','Something went wrong')}}
    @foreach ($errors->all() as $error)
        {{ Session::flash('error',$error) }}
    @endforeach
@endif
