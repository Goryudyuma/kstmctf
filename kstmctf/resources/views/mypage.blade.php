@extends('master')

@section('content')
<div class="container">
問題数:{{$mydata['count']['question']}}<br />
解いた問題の数:{{$mydata['count']['solved']}}<br />
開いた問題の数:{{$mydata['count']['opened']}}<br />
</div>
@stop
