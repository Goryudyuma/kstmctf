@extends('master')

@section('content')
<h1>
ようこそkstmctfへ!
</h1>
@if(!Auth::check())
<div class="social-buttons">
<a href="{{URL::to(env('APP_URL','.').'auth/twitter')}}"><img src={{asset('images/sign-in-with-twitter-gray.png')}} alt='Sign in with Twitter'></a><br />
<a href="{{URL::to(env('APP_URL','.').'auth/mail/login')}}"> メールアドレスでログイン</a><br />
<a href="{{URL::to(env('APP_URL','.').'auth/mail/register')}}"> メールアドレスで登録</a><br />

</div>
@endif
@stop
