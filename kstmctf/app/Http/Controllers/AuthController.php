<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\UserTwitter;
use App\UserMail;

use Auth;
use Socialite;
use DB;

class AuthController extends Controller
{
	/**
	 * Redirect the user to the Twitter authentication page.
	 *
	 * @return Response
	 */
	public function redirectToProvider()
	{
		return Socialite::driver('twitter')->redirect();
	}

	/**
	 * Obtain the user information from Twitter.
	 *
	 * @return Response
	 */
	public function handleProviderCallback()
	{
		try {
			$user = Socialite::driver('twitter')->user();
		} catch (Exception $e) {
			return redirect('auth/twitter');
		}

		//		return var_dump($user);
		$authUser = $this->findOrCreateUser($user);

		Auth::login($authUser, true);

		return redirect('questionlist');
	}

	/**
	 * Return user if exists; create and return if doesn't
	 *
	 * @param $twitterUser
	 * @return User
	 */
	private function findOrCreateUser($twitterUser)
	{
		$authUser = UserTwitter::where('uid', $twitterUser->id)->first();
		//	$authUser = Socialite::driver('twitter')->with($twitterUser->id)->user();


		if ($authUser){
			UserTwitter::where('uid', $twitterUser->id)->update(
				[
					'name' => $twitterUser->name,
					'avatar' => $twitterUser->avatar,
					'updated_at' => NULL
				]);
			return User::where('id', $authUser['userid'])->first();
		}


		$userid = User::firstOrCreate([
			'nickname' => $twitterUser->nickname,
		])->id;
		UserTwitter::firstOrCreate([
			'userid' => $userid,
			'uid' => $twitterUser->id,
			'name' => $twitterUser->name,
			'avatar' => $twitterUser->avatar
		]);
		return User::where('id', $userid)->first();
	}

	public function userMailCallback(Request $request)
	{
		if (Auth::check()) {
			return redirect('questionlist');
		}
		$user = UserMail::where('email', '=', $request->input('email'))->first();
		if (is_null($user) || !password_verify($request->input('password'), $user['password'])) {
			return redirect('/auth/mail/login')->with('message', 'メールアドレスまたはパスワードが間違っています');
		}
		Auth::loginUsingId($user['userid']);
		return redirect('questionlist');
	}

	public function userMailLogin()
	{
		if (Auth::check()) {
			return redirect('questionlist');
		}
		return view('maillogin');
	}

	public function userMailRegister(Request $request)
	{
		if (Auth::check()) {
			return redirect('questionlist');
		}
		return view('mailregister');
	}

	public function userMailRegisterCallback(Request $request)
	{
		if (Auth::check()) {
			return redirect('questionlist');
		}
		if (is_null($request->input('name')) || !is_string($request->input('name'))) {
			return redirect('/auth/mail/register')->with('message', '名前が不正です');
		}
		if (is_null($request->input('email')) || !is_string($request->input('email'))) {
			return redirect('/auth/mail/register')->with('message', 'メールアドレスが不正です');
		}
		if (is_null($request->input('password')) || !is_string($request->input('password'))) {
			return redirect('/auth/mail/register')->with('message', 'passwordが不正です');
		}
		if (is_null($request->input('passwordv')) || !is_string($request->input('passwordv'))) {
			return redirect('/auth/mail/register')->with('message', 'passwordvが不正です');
		}
		if ($request->input('password') !== $request->input('passwordv')) {
			return redirect('/auth/mail/register')->with('message', 'password２つが一致しません');
		}
		if (!is_null(UserMail::where('email', '=', $request->input('email'))->first())) {
			return redirect('/auth/mail/register')->with('message', 'すでに登録されています');
		}
		$userid = User::firstOrCreate([
			'nickname' => $request->input('name'),
			])->id;
		UserMail::firstOrCreate([
			'userid' => $userid,
			'name' => $request->input('name'),
			'email' => $request->input('email'),
			'password' => password_hash($request->input('password'), PASSWORD_DEFAULT)
		]);	
		return redirect('/auth/mail/login')->with('message', '登録されました！');
	}

	public function logout()
	{
		if (Auth::check()) {
			Auth::logout();
		}
		return redirect('/');
	}
}
