<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMail extends Model
{
	protected $table = 'ctfusersmail';

	/**
	 * The attributes that are mass assignable.   
	 *     
	 * @var array       
	 */

	protected $fillable = [
		'userid', 'name', 'email', 'password'
	];
}
