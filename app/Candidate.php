<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    public $fillable = ['id','firstname','lastname','email'];
	public $timestamps = false;
	public function jobs() {
        return $this->hasMany('App\Job', 'user_id', 'id')->orderBy('startdate', 'desc');;
    }

}
