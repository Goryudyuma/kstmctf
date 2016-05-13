@extends('master')

@section('content')
<h1>問題{{$question['id']}}:{{$question['title']}}</h1>
作問者:{{$question['creator']['nickname']}}<br />
問題文を見た人数:{{$question['challengecount']}}<br />
解けた人数:{{$question['solvedcount']}}<br />
<!--作問者id:{{$question['creator']['id']}}<br />-->
@if ($question['solvedcount'] !== 0)
平均時間:{{$question['avetime']}}秒<br />
@endif
</div>
<div class="container" style="margin-top:20px;">
{{Html::link('/question/'.$question['id'], "問題を開く", ['about'=>'_blank','class'=>'btn btn-primary btn-lg btn-block'])}}
@if ($question['solvedcount'] !== 0)
</div>
<div class="container" style="margin-top:20px;">
<div id="graph"></div>
</div>
<script>
var scale = [0, 30, 60, 1800, 3600, 43200, 86400, 1296000, 2592000, 31536000, 315360000];
var categories = ["0秒～","30秒～","1分～","30分～","1時間～","12時間～","1日～","15日～","1ヵ月～","1年～","10年～"];
var chart;
$.getJSON("../contentjson/{{$question['id']}}",function(data){
	var values = [0,0,0,0,0,0,0,0,0,0,0];
	console.log(data);
	for(var i=0;i<data.length;i++){
		var p=0;
		for(var j=scale.length-1;j>=0;j--){
			if(data[i].time >= scale[j]){
				values[j]++;
				break;
			}
		}
	}
	console.log(values);
	var options = {
		title:{
			text:null
		},
		chart:{
			renderTo:"graph",
			type:"column"
		},
		yAxis:{
			title:{
				text:"正答数"
			},
			allowDecimals:false
		},
		xAxis:{
			title:{
				text:"解くのにかかった時間"
			},
			categories:categories
		},
		series:[{name:"solved time",data:values}]
	}
	chart = new Highcharts.Chart(options);
});
</script>
<!--@foreach ($question['mintime'] as $var)
{{$var['nickname']}}
{{$var['time']}}<br />
@endforeach-->
@endif
@stop

