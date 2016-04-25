<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\UserTwitter;

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

	public function logout()
	{
		if (Auth::check()) {
			Auth::logout();
		}
		return redirect('/');
	}
}
