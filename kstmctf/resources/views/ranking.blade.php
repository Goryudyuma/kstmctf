@extends('master')

@section('content')
<h1>
{{ Session::get('message') }}
</h1>
<div class="container">
	<table class="table table-striped">
	<thead>
	<tr>
		<th>ranking</th>
		<th>user</th>
		<th>solved</th>
	</tr>
	</thead>
		<tbody>
@foreach($result as $user)
		<tr>
<td>
			{{$user->ranking}}
</td>
			<td>{{$user->nickname}}</td>
			<td>{{$user->countsolved}}</td>

		</tr>
@endforeach
		</tbody>
	</table>
</div>
@stop
