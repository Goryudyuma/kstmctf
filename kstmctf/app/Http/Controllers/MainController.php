<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\Question;
use App\Solved;
use App\User;
use Illuminate\Support\Facades\Request;

class MainController extends Controller
{
	public function index()
	{
		return view('top');
	}

	public function qlist()
	{
		if (!Auth::check()) {
			return redirect('/');
		}
		$result = Question::Join('ctfusers as c', function($join){$join->on('question.userid', '=', 'c.id');})->leftJoin('solved', function($join){$join->on('question.id', '=', 'solved.qid')->where('solved.userid', '=', Auth::user()->id);})->select('solved.userid as suid', 'question.title as title', 'question.url as url', 'nickname')->get();
		return view('index')->with('result', $result);
	}

	public function check()
	{
		if (!Auth::check()) {
			return redirect('/');
		}

		#		return var_dump(Request::all());
		$qid = Question::where('flag', Request::input('flag'))->value('id');

		if ($qid) {
			Solved::firstOrCreate([
				'userid' => Auth::user()->id,	
				'qid' => $qid,
			]);
			return redirect('/questionlist')->with('message', '正解！');
		}else{
			return redirect('/questionlist')->with('message', '不正解！');
		}

	}

	public function create()
	{
		if (!Auth::check()) {
			return redirect('/');
		}
		return view('create');	
	}

	public function createcheck()
	{

		$qid = Question::where('flag', Request::input('flag'))->value('id');
		if ($qid) {
			return redirect('/create')->with('message','flagがかぶっています');
		}
		if(preg_match('/^kstm\{.+\}$/', Request::input('flag')) === 0) {
			return redirect('/create')->with('message','flagはkstm{hogehoge}の形に則ってください');
		}
		Question::insert([
			'title' => Request::input('title'),
				'url' => Request::input('url'),
				'flag' => Request::input('flag'),
				'userid' => Auth::user()->id,
			]);
		return redirect('/create')->with('message','登録されました！');


	}

	public function ranking()
	{
		$result=User::Join('solved', 'ctfusers.id', '=', 'solved.userid')->select(DB::raw('count(*) as countsolved, ctfusers.nickname as nickname'))->groupBy('solved.userid')->orderBy('countsolved', 'desc')->get();
		$rank = 0;
		$num = 1;
		$prev = PHP_INT_MAX;
		foreach ($result as &$user) {
			if ($user->countsolved !== $prev) {
				$rank = $num;
				$prev = $user->countsolved;
			}
			$user->ranking = $rank;
			$num++;
		}
		return view('ranking')->with('result', $result);
	}
}
