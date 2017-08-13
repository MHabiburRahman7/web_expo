<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	protected $table = "profile";
    protected $fillable = [
        'nama_tim', 'kategori_id', 'asal_instansi', 'alamat_instansi', 'user_id',
    ];

    public function user()
    {
    	return $this->belongsTo('App\User','user_id');
    }

    public function kategori()
    {
    	return $this->belongsTo('App\Kategori','kategori_id');
    }
}
