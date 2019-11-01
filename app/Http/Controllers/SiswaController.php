<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class SiswaController extends Controller
{
    public function index()
    {
    	$data_siswa = \App\Siswa::all();
    	return view('siswa.index',['data_siswa'=>$data_siswa]);
    }
    public function create(Request $request)
    {
    	
        $user = new \App\User;
        $user->role = 'siswa';
        $user->name = $request->nama_lengkap;
        $user->email = $request->email;
        $user->password = bcrypt('rahasia');
        $user->remember_token = str_random(60);
        $user->save();

        $request->request->add(['user_id' => $user->id ]);
        $siswa =\App\Siswa::create($request->all());
    	return redirect ('/siswa')->with('sukses','Data Siswa Berhasil Diinput');
    }
    public function edit($id)
    {
    	$siswa= \App\Siswa::find($id);
    	return view('siswa/edit',['siswa'=>$siswa]);
    }
    public function update(Request $request,$id)
    {

    	$siswa=\App\Siswa::find($id);
    	$siswa->update($request->all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
    	return redirect('/siswa')->with('sukses','Data Siswa Berhasil Diupdate');
    }
    public function delete($user_id)
    {
    	$siswa=\App\Siswa::find($user_id);
    	$siswa->delete($siswa);
    	return redirect('/siswa')->with('sukses','Data Siswa Berhasil Dihapus');
    }
    public function profile($id)
    {
        $siswa = \App\Siswa::find($id);
        $matapelajaran = \App\Mapel::all();
        return view('siswa.profile',['siswa' => $siswa, 'matapelajaran' => $matapelajaran]);
    }
    public function addnilai(Request $request,$idsiswa)
    {
        $siswa=\App\Siswa::find($idsiswa);
        if($siswa->mapel()->where('mapel_id', $request->mapel)->exists()){
             return redirect('siswa/'.$idsiswa.'/profile')->with('error','Data Mata Pelajaran Sudah Ada');
        }
        $siswa->mapel()->attach($request->mapel,['nilai' => $request->nilai]);

        return redirect('siswa/'.$idsiswa.'/profile')->with('sukses','Data Nilai Berhasil Disimpan');
    }
    public function deletenilai($idsiswa,$idmapel)
    {
        $siswa =  \App\Siswa::find($idsiswa);
        $siswa->mapel()->detach($idmapel);
        return redirect()->back()->with('sukses', 'Data Nilai Berhasil Dihapus');
    }

    public function exportExcel() 
    {
        return Excel::download(new SiswaExport, 'daftar_siswa.xlsx');
    }
    public function exportPdf()
    {
        $siswa = \App\Siswa::all();
        $pdf = PDF::loadView('export.siswapdf',['siswa' => $siswa])->setPaper('a4', 'landscape');
        return $pdf->download('daftar_siswa.pdf');
    }
}
