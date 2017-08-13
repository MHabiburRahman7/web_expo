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
use App\Berkas;
use App\Kompetisi;
use App\berkasType;
use App\User;

class PaymentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
    	Fungsi untuk menampilkan frontend pembayaran
    */
    public function index()
    {
        $kompetisi = Kompetisi::where('id', Auth::user()->kompetisi_id)->first();
    	// mengambil tipe berkas payment
    	$tipeberkas = $kompetisi->berkasType()->where('nama', 'payment')->first();
    	
    	// mengambil model user
    	$user = User::where('id', Auth::user()->id)->first();

        $kategori = $user->profile()->first()->kategori()->first();
    	
    	// retreive berkas payment dari user
    	$bukti = $user->berkas()->where('type_id', $tipeberkas)->first();
    	
    	// passing ke view jika user sudah upload tidak boleh upload lagi 
    	return view('payment')->with('bukti', $bukti)->with('kompetisi', $kompetisi)->with('kategori', $kategori);
    }

    /*
    	Fungsi untuk upload bukti pembayaran
    */
    public function create()
    {
    	$fileName = 'null';

    	// mengambil tipe berkas payment
    	$tipeberkas = berkasType::where('nama','payment')->first()->id;
        
        // mengecek input 
        $validation = Validator::make(Input::all(), 
        array(
            'bukti' => 'required|mimes:pdf,jpg,png,gif,jpeg|max:1024|payment',
            )
        );
        if($validation->fails()) {
            //return jika validasi gagal
            return Redirect::back()->withErrors($validation->messages());
        } else {
        	
        	// mengeset destinasi sesuai id user
        	$destinationPath = 'app/uploads/bukti/'.Auth::user()->id;
        	
        	// mendapatkan ekstensi file yang dikirim user
        	$extension = Input::file('bukti')->getClientOriginalExtension();
        	
        	// menghasilkan nama unik untuk bukti pembayaran
        	$fileName = uniqid().'.'.$extension;
        	
        	//memindahkan file ke dalam storage
        	Input::file('bukti')->move($destinationPath, $fileName);
        	
        	// mencatat dalam database
        	Berkas::create([
            	'nama' => $fileName,
            	'user_id' => Auth::user()->id,
            	'type_id' => $tipeberkas,
        	]);

        	return redirect('/payment');
    	}
    }

    
}
