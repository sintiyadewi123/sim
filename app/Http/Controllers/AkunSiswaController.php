<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AkunSiswaController extends Controller
{
	public function index()
	{
		$data_akunsiswa=\App\AkunSiswa::where('role', 'siswa')->get();
        return view('akunsiswa.index',['data_akunsiswa'=>$data_akunsiswa]);
	}
  	public function create(Request $request)
    {
    	\App\AkunSiswa::create($request->all());
    	return redirect ('/akunsiswa');
    }
    public function delete($user_id)
    {
    	$data_akunsiswa=\App\AkunSiswa::find($user_id);
    	$data_akunsiswa->delete($data_akunsiswa);
    	return redirect('/akunsiswa')->with('sukses','Data Akun Siswa Berhasil Dihapus');
    }
}
