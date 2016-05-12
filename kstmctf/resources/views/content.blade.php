@extends('master')

@section('content')
<h1>問題{{$question['id']}}:{{$question['title']}}</h1>
問題文を見た人数:{{$question['challengecount']}}<br />
解けた人数:{{$question['solvedcount']}}<br />
作問者id:{{$question['creator']['id']}}<br />
作問者:{{$question['creator']['nickname']}}<br />
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
var scale = {
	1:"1秒~",
	30:"30秒~",
	60:"1分~",
	1800:"30分~",
	3600:"1時間~",
	43200:"12時間~",
	86400:"24時間~",
	1296000:"15日~",
	2592000:"1ヵ月~",
	31536000:"1年~",
	315360000:"10年~"
};
var chart;
$.getJSON("../contentjson/{{$question['id']}}",function(data){
	var values = [0,0,0,0,0,0,0,0,0,0,0];
	var categories = [];
	for(key in scale){
		categories.push(scale[key]);
	}
	for(var i=0;i<data.length;i++){
		for(key in scale){
			if(data[i] >= scale[key]){
				values[key]++;
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

