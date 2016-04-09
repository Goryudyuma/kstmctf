@extends('master')

@section('content')
<h1>
{{ Session::get('message') }}
</h1>
<div class="container">
	<label class="control-label">Flagを入力</label>
{{Form::open(['action'=>'MainController@check'])}}
{{Form::text('flag')}}
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
		<tr>
<td>
{{Html::link($question->url, $question->title, 'target="_blank"')}}
</td>
			<td>{{$question->nickname}}</td>
			<td>
@if($question->suid)
ok
@endif
</td>

		</tr>
@endforeach
		</tbody>
	</table>
</div>
@stop
