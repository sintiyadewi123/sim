<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AkunGuruController extends Controller
{
    public function index()
	{
		$data_akunguru=\App\AkunGuru::where('role', 'guru')->get();;
        return view('akunguru.index',['data_akunguru'=>$data_akunguru]);
	}
  	public function create(Request $request)
    {
    	\App\AkunGuru::create($request->all());
    	return redirect ('/akunguru');
    }
    public function delete($id)
    {
    	$data_akunguru=\App\AkunGuru::find($id);
    	$data_akunguru->delete($data_akunguru);
    	return redirect('/akunguru')->with('sukses','Data Akun Guru Berhasil Dihapus');
    }
}
