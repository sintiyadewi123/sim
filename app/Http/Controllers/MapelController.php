<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function addmatpel()
    {

    	$matpel= \App\Mapel::all();
        $kamu= \App\Guru::all();
        

    	return view('mapel.index',['matpel' => $matpel, 'kamu' => $kamu]);
    }
    public function create(Request $request)
    {
    	\App\Mapel::create($request->all());
    	return redirect('/matpel')->with('sukses','Data Mata Pelajaran Berhasil Diinput');;
    }
    public function delete($id)
    {
    	$matpel= \App\Mapel::find($id);
    	$matpel->delete($matpel);
    	return redirect('/matpel')->with('sukses','Data Mata Pelajaran Berhasil Dihapus');
    }
}
