@extends('master')

@section('content')
問題番号:{{$question['id']}}<br />
問題文を見た人数:{{$question['challengecount']}}<br />
解けた人数:{{$question['solvedcount']}}<br />
作問者id:{{$question['creator']['id']}}<br />
作問者:{{$question['creator']['nickname']}}<br />
@if ($question['solvedcount'] !== 0)
平均時間:{{$question['avetime']}}秒<br />
@foreach ($question['mintime'] as $var)
{{$var['nickname']}}
{{$var['time']}}<br />
@endforeach
@endif
リンク:{{Html::link('/question/'.$question['id'], $question['title'], 'target="_blank"')}}
@stop
