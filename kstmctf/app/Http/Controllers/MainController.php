<?php

namespace App\Http\Controllers;

use Auth;
use App\Question;
use App\Solved;
use Illuminate\Support\Facades\Request;

class MainController extends Controller
{
	public function index()
	{
		if (!Auth::check()) {
			return redirect('/auth/twitter');
		}
		$result = Question::Join('ctfusers as c', function($join){$join->on('question.creatorid', '=', 'c.uid');})->leftJoin('solved', function($join){$join->on('question.id', '=', 'solved.qid')->where('solved.uid', '=', Auth::user()->uid);})->select('solved.uid as suid', 'question.title as title', 'question.url as url', 'nickname')->get();
		return view('index')->with('result', $result);
	}

	public function check()
	{
		if (!Auth::check()) {
			return redirect('/auth/twitter');
		}

		#		return var_dump(Request::all());
		$qid = Question::where('flag', Request::input('flag'))->value('id');

		if ($qid) {

			Solved::firstOrCreate([
				'qid' => $qid,
				'uid' => Auth::user()->uid,	
			]);
			return redirect('/questionlist')->with('message', '正解！');
		}else{
			return redirect('/questionlist')->with('message', '不正解！');
		}

	}

	public function create()
	{
		if (!Auth::check()) {
			return redirect('/auth/twitter');
		}
		return view('create');	
	}

	public function createcheck()
	{

		$qid = Question::where('flag', Request::input('flag'))->value('id');
		if ($qid) {
			return redirect('/create')->with('message','flagがかぶっています');
		}else{
			Question::insert([
				'title' => Request::input('title'),
					'url' => Request::input('url'),
					'flag' => Request::input('flag'),
					'creatorid' => Auth::user()->uid,
				]);
			return redirect('/create')->with('message','登録されました！');
		}

	}
}
