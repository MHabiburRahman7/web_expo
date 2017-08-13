<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //
    protected $table = "status";
    protected $fillable = [
        'nama', 'detail', 
    ];

    public function user()
    {
    	return $this->hasMany('App\User','status_id');
    }
}
