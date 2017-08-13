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
use App\Berkas;
use App\berkasType;

class BerkasController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /*
    	Fungsi untuk menampilkan anggota
    */
    public function index()
    {
    	$user = User::where('id', Auth::user()->id)->first();
        $kompetisi = $user->kompetisi()->first();
        $tipeberkas = $kompetisi->berkasType()->get();
    	return view('berkas')->with('berkas', $user->berkas()->get())->with('tipe', $tipeberkas); 
    }

    /*
    	Fungsi untuk membuat anggota
    */
    public function create()
    {
    	$fileName = 'null';

        // mengambil tipe berkas payment
        $user = User::where('id', Auth::user()->id)->first();
        $kompetisi = $user->kompetisi()->first();
        
        // mengecek input 
        $validation = Validator::make(Input::all(), 
        array(
            'type' => 'required|numeric',
            'berkas' => 'required|mimes:pdf,jpg,png,gif,jpeg,doc,docx,ppt,pptx,zip|max:20480',
            )
        );
        if($validation->fails()) {
            //return jika validasi gagal
            return Redirect::back()->withErrors($validation->messages());
        } else {
            
            $tipeberkas = $kompetisi->berkasType()->where('id', Input::get('type'));

            if (!$tipeberkas->exists())
            {
                return Redirect::back()->with('error', 'Type tidak ditemukan!');
            }

            // mengeset destinasi sesuai id user
            $destinationPath = 'app/uploads/berkas/'.Auth::user()->id;
            
            // mendapatkan ekstensi file yang dikirim user
            $fileName= Input::file('berkas')->getClientOriginalName();
            
            //memindahkan file ke dalam storage
            Input::file('berkas')->move($destinationPath, $fileName);
            
            // mencatat dalam database
            Berkas::create([
                'nama' => $fileName,
                'user_id' => Auth::user()->id,
                'type_id' => $tipeberkas->first()->id,
            ]);

            return redirect('/berkas');
        }
    }

    public function delete($id)
    {
        $berkas = Berkas::where('id', $id);
        $nama = $berkas->first()->nama;

        Storage::disk('uploads')->delete('berkas/'.Auth::user()->id.'/'.$nama);

        $berkas->delete();

        return redirect('/berkas');
        
    }
}
