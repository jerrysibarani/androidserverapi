<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Pegawai;

class PegawaiController extends Controller
{

    public function index()
    {
    	// $pegawai = Pegawai::all();
            $pegawai = DB::table('pegawai')->paginate(5);

    	return view('pegawai', ['pegawai' => $pegawai]);
    }


	public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;		
 		 
         // if ($cari=='')
         // {
         // 	return redirect('/pegawai');
         // }else {

         	$pegawai = DB::table('pegawai')
			->where('nama','like',"%".$cari."%")
			->paginate(5);
 
    		// mengirim data pegawai ke view index
			 return view('pegawai',['pegawai' => $pegawai]);
         // } 		 
	}


    public function tambah()
    {
    	return view('pegawai_tambah');
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
    		'nama' => 'required',
    		'alamat' => 'required'
    	]);
 
        Pegawai::create([
    		'nama' => $request->nama,
    		'alamat' => $request->alamat
    	]);
 
    	return redirect('/pegawai');
    }

    public function edit($id)
	{
	   $pegawai = Pegawai::find($id);
	   return view('pegawai_edit', ['pegawai' => $pegawai]);
	}

	public function update($id, Request $request)
	{
	    $this->validate($request,[
		   'nama' => 'required',
		   'alamat' => 'required'
	    ]);
	 
	    $pegawai = Pegawai::find($id);
	    $pegawai->nama = $request->nama;
	    $pegawai->alamat = $request->alamat;
	    $pegawai->save();
	    return redirect('/pegawai');
	}

	public function delete($id)
	{
	    $pegawai = Pegawai::find($id);
	    $pegawai->delete();
	    return redirect('/pegawai');
	}

}