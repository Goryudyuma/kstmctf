<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

class MainController extends Controller
{
	public function index()
	{
		if (!Auth::check()) {
			return redirect('/auth/twitter');
		}
		return view('index');
	}
}
