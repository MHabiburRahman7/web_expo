<?php

// bismillah lancar!
namespace App\Http\Controllers;

// class dalam laravel
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

// class dalam aplikasi
use App\User;
use App\Anggota;
use App\Role;

class AnggotaController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
    	Fungsi untuk menampilkan anggota
    */
    public function index()
    {
    	$user = User::find('id', Auth::user()->id)->first();
    	return view('anggota')->with('anggota', $user->anggota()); 
    }

    /*
    	Fungsi untuk membuat anggota
    */
    public function create()
    {
    	// mencari model user, kompetisi, dan role
    	$user = User::find('id', Auth::user()->id)->first();
    	$kompetisi = $user->kompetisi()->first();
    	$role = $kompetisi()->role();

    	
    	$validation = Validator::make(Input::all(), 
        array(
           	'nama' => 'required|max:255|unique:anggota',
           	'email' => 'required|email|max:255|unique:anggota',
           	'id_line' => 'required|max:255', 
           	'telp' => 'required|numeric', 
           	'alamat' => 'required|max:255', 
           	'jenis_kelamin' => 'required|regex:/(\bL\b)?(\bP\b)?/', 
           	'tanggal_lahir' => 'required|date', 
           	'tempat_lahir' => 'required|max:255', 
           	'nomor_identitas' => 'required|alpha_num',
           	'role' => 'required',
           	)
        );    

        if($validation->fails()) {
            //withInput keep the users info
            return Redirect::back()->withInput()->withErrors($validation->messages());
        } else {
        	
        	$roleuser = $role->where('nama', Input::get('role'));

        	if (!$roleuser->exists())
        	{
        		return Redirect::back()->with('error', 'Role tidak ditemukan!');
        	}

        	$roleuser = $roleuser->first();

        	$jumlah = $user->where('role_id',$roleuser->id)->count();

        	if ($jumlah == $roleuser->maks)
        	{
        		 return Redirect::back()->with('error', 'Anggota dengan role tersebut sudah penuh!');
        	}
            
            // membuat anggota
            Anggota::create([
            'nama' => Input::get('nama'), 
            'email' => Input::get('email'), 
            'id_line' => Input::get('id_line'), 
            'telp' => Input::get('telp'), 
            'alamat' => Input::get('alamat'), 
            'jenis_kelamin' => Input::get('jenis_kelamin'), 
            'tanggal_lahir' => strtotime(Input::get('tanggal_lahir')), 
            'tempat_lahir' => Input::get('tempat_lahir'), 
            'nomor_identitas' => Input::get('nomor_identitas'), 
            'role_id' => $roleuser->id,
            'user_id' => Auth::user()->id,
        ]);
            return redirect('/anggota');
        }
    }

    /*
    	Fungsi untuk mengupdate anggota
    */
    public function update($id)
    {
    	// mencari model user, kompetisi, dan role
    	$user = User::find('id', Auth::user()->id)->first();
    	$kompetisi = $user->kompetisi()->first();
    	$role = $kompetisi()->role();

    	
    	$validation = Validator::make(Input::all(), 
        array(
           	'nama' => 'required|max:255|unique:anggota',
           	'email' => 'required|email|max:255|unique:anggota',
           	'id_line' => 'required|max:255', 
           	'telp' => 'required|numeric', 
           	'alamat' => 'required|max:255', 
           	'jenis_kelamin' => 'required|regex:/(\bL\b)?(\bP\b)?/', 
           	'tanggal_lahir' => 'required|date', 
           	'tempat_lahir' => 'required|max:255', 
           	'nomor_identitas' => 'required|alpha_num',
           	'role' => 'required',
           	)
        );    

        if($validation->fails()) {
            //withInput keep the users info
            return Redirect::back()->withInput()->withErrors($validation->messages());
        } else {
        	
        	$roleuser = $role->where('nama', Input::get('role'));

        	if (!$roleuser->exists())
        	{
        		return Redirect::back()->with('error', 'Role tidak ditemukan!');
        	}

        	$roleuser = $roleuser->first();
            
            // merubah anggota
            Anggota::where('id', $id)->update([
            'nama' => Input::get('nama'), 
            'email' => Input::get('email'), 
            'id_line' => Input::get('id_line'), 
            'telp' => Input::get('telp'), 
            'alamat' => Input::get('alamat'), 
            'jenis_kelamin' => Input::get('jenis_kelamin'), 
            'tanggal_lahir' => strtotime(Input::get('tanggal_lahir')), 
            'tempat_lahir' => Input::get('tempat_lahir'), 
            'nomor_identitas' => Input::get('nomor_identitas'), 
            'role_id' => $roleuser->id,
            'user_id' => Auth::user()->id,
        ]);
            return redirect('/anggota');
        }
    }
}
