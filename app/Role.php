<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $table = "role";
    protected $fillable = [
        'nama','maks', 'kompetisi_id',
    ];

    public function kompetisi()
    {
    	return $this->belongsTo('App\Kompetisi','kompetisi_id');
    }
}
