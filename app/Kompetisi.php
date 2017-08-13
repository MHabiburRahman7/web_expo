<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kompetisi extends Model
{
    //
    protected $table = "kompetisi";
    protected $fillable = ['nama','contact'];

    public function users()
    {
    	return $this->hasMany('App\User','kompetisi_id');
    }

    public function kategori()
    {
    	return $this->hasMany('App\Kategori','kompetisi_id');
    }

    public function role()
    {
        return $this->hasMany('App\Role','role_id');
    }

    public function berkasType()
    {
        return $this->belongsToMany('App\berkasType','kompetisi_berkasType','kompetisi_id','berkasType_id');
    }


}
