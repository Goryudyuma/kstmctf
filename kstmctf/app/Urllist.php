<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Urllist extends Model
{
	protected $table = 'urllist';

	/**
	 * The attributes that are mass assignable.   
	 *     
	 * @var array       
	 */

	protected $fillable = [
		'id', 'urlstring'
	];
}
