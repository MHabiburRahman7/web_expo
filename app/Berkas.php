<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Berkas extends Model
{
    protected $table = "berkas";
    protected $fillable = [
        'nama', 'type_id', 'user_id', 
    ];

    public function user()
    {
    	return $this->belongsTo('App\User','user_id');
    }

    public function type()
    {
    	return $this->belongsTo('App\berkasType', 'type_id');
    }
    
}
