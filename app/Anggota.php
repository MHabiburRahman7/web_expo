<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
	protected $table = "anggota";
   	protected $fillable = [ 'nama', 'email', 'id_line', 'telp', 'alamat', 'jenis_kelamin', 'tanggal_lahir', 'tempat_lahir', 'nomor_identitas', 'user_id', 'role_id', ];
    
    public function user()
    {
    	return $this->belongsTo('App\User','user_id');
    }

    public function role()
    {
    	return $this->belongsTo('App\Role','role_id');
    }

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'tanggal_lahir',
   ];
}
