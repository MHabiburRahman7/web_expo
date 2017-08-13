<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class berkasType extends Model
{
	protected $table = "berkasType";
    protected $fillable = ['nama','hidden',];

    public function berkas()
    {
    	return $this->hasMany('App\Berkas', 'type_id');
    }

    public function kompetisi()
    {
        return $this->belongsToMany('App\berkasType','kompetisi_berkasType','berkasType_id','kompetisi_id');
    }

}
