<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
     public $fillable = ['user_id','title','company','startdate','enddate']; 
	 public $dates = ['startdate','enddate'];
	 public $timestamps = false;
	 public function candidate() {
		 return $this-belongsTo('App\Candidate', 'id', 'user_id');
	 }
}
