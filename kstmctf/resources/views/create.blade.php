@extends('master')

@section('content')
{{Session::get('message')}}
<div class="container">
<!--	<label class="control-label">Flagを入力</label>-->
{{Form::open(['action'=>'MainController@createcheck'])}}
title
{{Form::text('title')}}<br/>
url 
{{Form::text('url')}}<br/>
Flag
{{Form::text('flag')}}
{{Form::submit()}}
{{Form::close()}}
</div>
@stop
