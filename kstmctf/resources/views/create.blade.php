@extends('master')

@section('content')
{{Session::get('message')}}
<div class="container">
<!--	<label class="control-label">Flagを入力</label>-->
{{Form::open(['action'=>'MainController@createcheck'])}}
<div class="form-group">
title
{{Form::text('title',null,['class'=>'form-control'])}}
</div>
<div class="form-group">
url 
{{Form::input('url','url',null,['class'=>'form-control'])}}<br/>
</div>
<div class="form-group">
Flag
{{Form::text('flag',null,['class'=>'form-control'])}}
</div>
{{Form::submit()}}
{{Form::close()}}
</div>
@stop
