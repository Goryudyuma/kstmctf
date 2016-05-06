@extends('master')

@section('content')
<h1>
{{ Session::get('message') }}
</h1>
<div class="container">
{{Form::open(['action'=>'AuthController@userMailCallback','style'=>'border: 1px solid #079DD4;border-radius: 5px;padding: 13px;background: #ADDCE6;'])}}
{{Form::label('email','emailを入力',['style'=>'display:block;'])}}
{{Form::text('email',null,['style'=>'width:60%;'])}}
{{Form::label('password','パスワードを入力',['style'=>'display:block;'])}}
{{Form::password('password',null,['style'=>'width:60%;'])}}
{{Form::submit()}}
{{Form::close()}}
</div>
@stop
