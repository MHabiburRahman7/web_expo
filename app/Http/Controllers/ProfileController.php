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
use App\Profile;
use App\Kompetisi;

class ProfileController extends Controller
{
    //
	public function __construct()
    {
        $this->middleware('auth');
    }

     /*
    	Fungsi untuk menampilkan profile
    */
    public function index()
    {
        $kategori = Kompetisi::find(Auth::user()->kompetisi_id)->kategori()->get();
        $kompetisi = Kompetisi::where('id',Auth::user()->kompetisi_id)->first();
    	return view('profile')->with('kategori',$kategori)->with('kompetisi',$kompetisi); 
    }

    /*
    	Fungsi untuk membuat profile
    */
    public function create()
    {
        if (Profile::where('user_id',Auth::user()->id)->exists())
        {
            return redirect('/');
        }
    	// mencari model user dan kompetisi
    	$user = User::where('id', Auth::user()->id)->first();
    	$kompetisi = $user->kompetisi()->first();

    	if ($kompetisi->nama == 'Section')
    	{
    		// validasi section
    		$validation = Validator::make(Input::all(), 
        	array(
            	'kategori' => 'required|numeric|kategori',
            	'asal_instansi' => 'required|max:255',
            	'alamat_instansi'=> 'required|max:255',
            	)
        	);
    	}
    	else
    	{
    		// validasi untuk selain section
    		$validation = Validator::make(Input::all(), 
        	array(
            	'nama_tim' => 'required|max:255',
            	'kategori' => 'required|numeric|kategori',
            	'asal_instansi' => 'required|max:255',
            	'alamat_instansi'=> 'required|max:255',
            	)
        	);
    	}

        if($validation->fails()) {
            //withInput keep the users info
            return Redirect::back()->withInput()->withErrors($validation->messages());
        } else {
        	// mencari kategori pilihan dalam kompetisi dengan tujuan menghindari edit element pada saat pengisian data
        	$kategori = $kompetisi->kategori()->where('id', Input::get('kategori'));

        	if (!$kategori->exists())
        	{
        		 return Redirect::back()->withInput()->with('error', 'Kategori salah!');
        	}
            
            // membuat profile
            Profile::create([
            'nama_tim' => Input::get('nama_tim'),
            'user_id' => Auth::user()->id,
            'kategori_id' => $kategori->first()->id,
            'asal_instansi' => Input::get('asal_instansi'),
            'alamat_instansi' => Input::get('alamat_instansi'),

        ]);
            $user = User::where('id', Auth::user()->id)->first();
            $user->status_id = 2;
            $user->save();
            return redirect('/payment');
        }
    }

    /*
    	Fungsi untuk mengupdate profile
    */
    public function update($id)
    {
    	$user = User::find('id', Auth::user()->id)->first();
    	$kompetisi = $user->kompetisi()->first();

    	if ($kompetisi->nama == 'section')
    	{
    		// validasi section
    		$validation = Validator::make(Input::all(), 
        	array(
            	'kategori' => 'required|numeric',
            	'asal_instansi' => 'required|max:255',
            	'alamat_instansi'=> 'required|max:255',
            	)
        	);
    	}
    	else
    	{
    		// validasi untuk selain section
    		$validation = Validator::make(Input::all(), 
        	array(
            	'nama_tim' => 'required|max:255',
            	'kategori' => 'required',
            	'asal_instansi' => 'required|max:255',
            	'alamat_instansi'=> 'required|max:255',
            	)
        	);
    	}

        if($validation->fails()) {
            //withInput keep the users info
            return Redirect::back()->withInput()->withErrors($validation->messages());
        } else {
        	// mencari kategori pilihan dalam kompetisi dengan tujuan menghindari edit element pada saat pengisian data
        	$kategori = $kompetisi->kategori()->where('nama', Input::get('kategori'));
            
            if (!$kategori->exists())
        	{
        		 return Redirect::back()->with('error', 'Kategori salah!');
        	}
            // mengupdate profile
            Profile::where('id', $id)->update([
            'nama_tim' => Input::get('nama_tim'),
            'user_id' => Auth::user()->id,
            'kategori_id' => $kategori->first()->id,
            'asal_instansi' => Input::get('asal_instansi'),
            'alamat_instansi' => Input::get('nama_tim'),

        ]);
            return redirect('/profile');
        }
    }

}
