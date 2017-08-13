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
use DB;
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
        $id = Auth::user()->id;
    	$user = DB::table('users')
                ->where('users.id','=',$id)
                ->get();
//        dd($user[0]);
        $ketua = DB::table('kompetisi')
                    ->join('role','role.kompetisi_id','=','kompetisi.id')
                    ->where('kompetisi.id','=',$user[0]->kompetisi_id)
                    ->where('role.nama','Ketua')
                    ->select('role.maks','role.id')
                    ->get();
        $anggota = DB::table('kompetisi')
                    ->join('role','role.kompetisi_id','=','kompetisi.id')
                    ->where('kompetisi.id','=',$user[0]->kompetisi_id)
                    ->where('role.nama','Anggota')
                    ->select('role.maks','role.id')
                    ->get();
        $semua = DB::table('anggota')
                    ->where('anggota.user_id','=',$id)
                    ->get();
        //dd($anggota);
    	return view('anggota',['user'=>$user,'ketua'=>$ketua,'anggota'=>$anggota,'semua'=>$semua]); 
    }
    public function store(Request $request)
    {   
        //dd($request['role_id']);
        $id = Auth::user()->id;
        $max = count($request['nama']);
        //dd($max);
        for($i = 0; $i < $max; $i++)
        {
            $anggota = new Anggota;
            $anggota->nama = $request['nama'][$i];
            $anggota->telp = $request['telp'][$i];
            $anggota->id_line = $request['id_line'][$i];
            $anggota->alamat = $request['alamat'][$i];
            $anggota->jenis_kelamin = $request['jk'][$i];
            $anggota->tanggal_lahir = $request['tgl_lahir'][$i];
            $anggota->tempat_lahir = $request['tmpt_lahir'][$i];
            $anggota->nomor_identitas = $request['nomor_identitas'][$i];
            $anggota->user_id = $id;
            $anggota->role_id = $request['role_id'][$i];
            $anggota->email = $request['email'][$i];
            //dd($anggota);
            $anggota->save();
        }
        return redirect('/anggota');
    }
    public function edit(Request $request)
    {
        $id = Auth::user()->id;
        $data = DB::table('anggota')
                    ->where('anggota.user_id','=',$id)
                    ->delete();
        //dd($data);
        //$data->delete();
        $max = count($request['nama']);
        //dd($max)
        for($i = 0; $i < $max; $i++)
        {
            $anggota = new Anggota;
            $anggota->nama = $request['nama'][$i];
            $anggota->telp = $request['telp'][$i];
            $anggota->id_line = $request['id_line'][$i];
            $anggota->alamat = $request['alamat'][$i];
            $anggota->jenis_kelamin = $request['jk'][$i];
            $anggota->tanggal_lahir = $request['tgl_lahir'][$i];
            $anggota->tempat_lahir = $request['tmpt_lahir'][$i];
            $anggota->nomor_identitas = $request['nomor_identitas'][$i];
            $anggota->user_id = $id;
            $anggota->role_id = $request['role_id'][$i];
            $anggota->email = $request['email'][$i];
            //dd($anggota);
            $anggota->save();
        }
        return redirect('/anggota');
    }

    /*
    	Fungsi untuk membuat anggota
    */
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
