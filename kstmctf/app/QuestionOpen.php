<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionOpen extends Model
{
    //
	protected $table = 'openquestion';

	protected $fillable = [
		'userid', 'urllistid'
	];
}
