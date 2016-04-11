@extends('master')

@section('content')
<h1>
ようこそkstmctfへ!
</h1>
@if(!Auth::check())
<div class="social-buttons">
{{Html::link(env('APP_URL','.').'auth/twitter', 'Twitter')}}

</div>
@endif
@stop
