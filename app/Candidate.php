<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    public $fillable = ['id','firstname','lastname','email'];
	public $timestamps = false;
}
