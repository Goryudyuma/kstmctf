<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<title>kstm CTF</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- BootstrapのCSS読み込み -->
		<link href="https://cdn.jsdelivr.net/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
		<!-- jQuery読み込み -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	</head>
	<body style="padding-top:50px;">
		<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
		<div class="navbar-header">
			{{Html::link(env('APP_URL','.'), 'kstm CTF', 'class="navbar-brand"')}}
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#gnavi">
		<span class="sr-only">メニュー</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		</button>
		</div>
		<!-- 3.リストの配置 -->
		<div id="gnavi" class="collapse navbar-collapse">
		<ul class="nav navbar-nav">

		@if(Request::url() == env('APP_URL','.').'questionlist')
		<li class="active">
		@else
		<li>
		@endif
		{{Html::link(env('APP_URL','.').'questionlist', '問題一覧')}}</li>

		@if(Request::url() == env('APP_URL','.').'ranking')
		<li class="active">
		@else
		<li>
		@endif
		{{Html::link(env('APP_URL','.').'ranking', 'Ranking')}}</li>

		@if(App::make('App\Http\Controllers\MainController')->iskstmuser())
		@if(Request::url() == env('APP_URL','.').'create')
		<li class="active">
		@else
		<li>
		@endif
		{{Html::link(env('APP_URL','.').'create', '問題投稿')}}</li>
		@endif
	</ul><ul class="nav navbar-nav navbar-right" style="margin-right:0px;">
		@if(Auth::check())
		@if(Request::url() == env('APP_URL','.').'mypage')
		<li class="active">
		@else
		<li>
		@endif
		{{Html::link(env('APP_URL','.').'mypage', 'mypage')}}</li>
		<li>{{Html::link(env('APP_URL','.').'logout', 'logout')}}</li>
		@endif
	</ul>
</div>
</div>
</nav>

	<div class="container">
		@yield('content')
	</div>
	</body>
</html>
