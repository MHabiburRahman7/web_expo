<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
	protected $table = "kategori";
	protected $fillable = [
        'nama','harga', 'kompetisi_id',
    ];

    public function kompetisi()
    {
    	return $this->belongsTo('App\Kompetisi','kompetisi_id');
    }

    public function user()
    {
    	return $this->hasMany('App\Profile','kategori_id');
    }
}
