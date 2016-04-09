<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solved extends Model
{
	protected $table = 'solved';
    //

	protected $fillable = ['qid', 'uid'];
}
