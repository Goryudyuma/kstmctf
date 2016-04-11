@extends('master')

@section('content')
{{Session::get('message')}}
<div class="container">
<!--	<label class="control-label">Flagを入力</label>-->
{{Form::open(['action'=>'MainController@createcheck'])}}
<div class="form-group">
{{Form::label('title','Title')}}
{{Form::text('title',null,['class'=>'form-control'])}}
</div>
<div class="form-group">
{{Form::label('url','URL')}} 
{{Form::input('url','url',null,['class'=>'form-control'])}}<br/>
</div>
<div class="form-group">
{{Form::label('Flag')}}
{{Form::text('flag',null,['class'=>'form-control'])}}
</div>
{{Form::submit()}}
{{Form::close()}}
</div>
@stop
