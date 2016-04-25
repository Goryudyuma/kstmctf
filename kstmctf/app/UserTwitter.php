<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTwitter extends Model
{
	 protected $table = 'ctfuserstwitter';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userid', 'uid', 'name', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
}
