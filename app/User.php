<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'email', 'password', 'telp', 'kompetisi_id', 'is_admin', 'status_id',
    ];

    public function kompetisi()
    {
        return $this->belongsTo('App\Kompetisi', 'kompetisi_id');
    }

    public function profile()
    {
        return $this->hasOne('App\Profile','user_id');
    }

    public function anggota()
    {
        return $this->hasMany('App\Anggota','user_id');
    }

    public function status()
    {
        return $this->belongsTo('App\Status','status_id');
    }

    public function berkas()
    {
        return $this->hasMany('App\Berkas','user_id');
    }

    protected $casts = ['is_admin'=> 'boolean',];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'is_admin', 
    ];
}
