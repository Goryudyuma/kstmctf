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
	<body body style="padding-top:70px;">
		<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
		<div class="navbar-header">
			{{Html::link(env('APP_URL','.'), 'kstm CTF', 'class="navbar-brand"')}}
		</div>
		<!-- 3.リストの配置 -->
		<ul class="nav navbar-nav">
		<li class="active">{{Html::link(env('APP_URL','.').'questionlist', '問題一覧')}}</li>
		<li class="active">{{Html::link(env('APP_URL','.').'ranking', 'Ranking')}}</li>
		<li class="active">{{Html::link(env('APP_URL','.').'create', '問題投稿')}}</li>
	</ul>
		<ul class="nav navbar-nav navbar-right">
		@if(Auth::check())
		<li class="active">{{Html::link(env('APP_URL','.').'logout', 'logout')}}</li>
		@endif
	</ul>
</div>
</nav>

	<div class="container">
		@yield('content')
	</div>
	</body>
</html>
