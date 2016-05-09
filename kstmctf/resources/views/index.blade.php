@extends('master')

@section('content')
<h1>
{{ Session::get('message') }}
</h1>
<div class="container">
{{Form::open(['action'=>'MainController@check','style'=>'border: 1px solid #079DD4;border-radius: 5px;padding: 13px;background: #ADDCE6;'])}}
{{Form::label('flag','Flagを入力',['style'=>'display:block;'])}}
{{Form::text('flag',null,['style'=>'width:60%;'])}}
{{Form::submit()}}
{{Form::close()}}
</div>
<div class="container">
	<table class="table table-striped">
	<thead>
	<tr>
		<th>問題</th>
		<th>作問者</th>
		<th>solved</th>
	</tr>
	</thead>
		<tbody>
		@foreach($result as $question)
			@if($question->suid)
			<tr class="success">
			@elseif($question->openuid)
			<tr class="warning">
			@else
			<tr>
			@endif
			<td>
				{{Html::link('/content/'.$question->url, $question->title)}}
			</td>
			<td>{{$question->nickname}}</td>
			<td>
				@if($question->suid)
				ok
				@elseif($question->openuid)
				opened
				@endif
			</td>
			</tr>
		@endforeach
		</tbody>
	</table>
</div>
@stop
