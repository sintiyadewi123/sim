<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\GuruExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class GuruController extends Controller
{
	public function index()
	{
        $data_guru= \App\Guru::all();
    	return view('guru.index',['data_guru'=>$data_guru]);
    }
    public function create(Request $request)
    {
        $user = new \App\User;
        $user->role = 'guru';
        $user->name = $request->nama_lengkap;
        $user->email = $request->email;
        $user->password = bcrypt('secret');
        $user->remember_token = str_random(60);
        $user->save();

        $request->request->add(['user_id' => $user->id ]);
        $siswa =\App\Guru::create($request->all());
    	return redirect ('/guru')->with('sukses','Data Guru Berhasil Diinput');
    }
    public function edit($id)
    {
    	$guru= \App\Guru::find($id);
    	return view('guru/edit',['guru'=>$guru]);
    }
    public function update(Request $request,$id)
    {
    	$guru=\App\Guru::find($id);
    	$guru->update($request->all());
         if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $guru->avatar = $request->file('avatar')->getClientOriginalName();
            $guru->save();
        }
    	return redirect('/guru')->with('sukses','Data Guru Berhasil Diupdate');
    }
    public function delete($id)
    {
    	$guru=\App\Guru::find($id);
    	$guru->delete($guru);
    	return redirect('/guru')->with('sukses','Data Guru Berhasil Dihapus');
    }
     public function profile($id)
    {
        $guru = \App\Guru::find($id);
        $matapelajaran = \App\Mapel::all();
        return view('guru.profile',['guru' => $guru, 'matapelajaran' => $matapelajaran]);
    
    }
    public function exportExcel() 
    {
        return Excel::download(new GuruExport, 'daftar_guru.xlsx');
    }
    public function exportPdf()
    {
        $guru = \App\Guru::all();
        $pdf = PDF::loadView('export.gurupdf',['guru' => $guru])->setPaper('a4', 'landscape');
        return $pdf->download('daftar_guru.pdf');
    }

}
