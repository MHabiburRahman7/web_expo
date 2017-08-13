<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

use App\Kompetisi;
use App\Berkas;
use App\User;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {   
        
        view()->composer('*', function($view) { 
            if (Auth::guard(null)->check()) 
            { 
            $user = User::where('id', Auth::user()->id)->first(); 
            $profile = $user->profile()->first(); 
            $kompetisi = $user->kompetisi()->first(); 
            $view->with('kompetisi', $kompetisi)->with('profile',$profile); 
            } 
        });

        Validator::extend('kategori', function ($attribute, $value, $parameters, $validator) {
            $kompetisi = Kompetisi::where('id', Auth::user()->kompetisi_id)->first();
            $kategori = $kompetisi->kategori()->where('id', $value);
            return $kategori->exists();
        });
        Validator::extend('payment', function ($attribute, $value, $parameters, $validator) {
            $tipeberkas = Kompetisi::where('id', Auth::user()->kompetisi_id)->first()->berkasType()->where('nama', 'payment')->first();
        
            // mengambil model user
            $user = User::where('id', Auth::user()->id)->first();
        
            // retreive berkas payment dari user
            $bukti = $user->berkas()->where('type_id', $tipeberkas);
            return !$bukti->exists();
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
