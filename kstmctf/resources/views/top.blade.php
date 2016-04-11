@extends('master')

@section('content')
<h1>
ようこそkstmctfへ!
</h1>
@if(!Auth::check())
<div class="social-buttons">
<a href="{{URL::to(env('APP_URL','.').'auth/twitter')}}"><img src={{asset('images/sign-in-with-twitter-gray.png')}} alt='Sign in with Twitter'</a>

</div>
@endif
@stop
