@extends('master')

@section('content')
問題番号:{{$question['id']}}<br />
問題文を見た人数:{{$question['challengecount']}}<br />
解けた人数:{{$question['solvedcount']}}<br />
@if ($question['solvedcount'] !== 0)
平均時間:{{$question['avetime']}}秒<br />
最速時間:{{$question['mintime']['time']}}秒<br />
最速回答者:{{$question['minuser']->nickname}}<br />
@endif
リンク:{{Html::link('/question/'.$question['id'], $question['title'], 'target="_blank"')}}
@stop
