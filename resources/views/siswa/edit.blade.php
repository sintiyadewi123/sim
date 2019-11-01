@extends('layouts.master')
@section('content')
   <div class="main">
<div class="main-content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">

        <div class="panel">
          <div class="panel-heading">
          <h3 class="panel-title">Edit Data Siswa</h3>
          </div>

          <div class="panel-body">
          <form action="/siswa/{{$siswa->id}}/update" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
         <div class="form-group">
         <label for="exampleInputEmail1">Nama Lengkap</label>
         <input name="nama_lengkap" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nama Lengkap" value="{{$siswa->nama_lengkap}}">
         </div>

         <div class="form-group">
         <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
         <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
         <option value="L" @if($siswa->jenis_kelamin=="L") selected @endif >Laki-Laki</option>
         <option value="P" @if($siswa->jenis_kelamin=="P") selected @endif >Perempuan</option>
         </select>
         </div>


         <div class="form-group">
         <label for="exampleInputEmail1">Agama</label>
         <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Agama"  value="{{$siswa->agama}}">
         </div>

    
         <div class="form-group">
         <label for="exampleInputEmail1">No Telp</label>
         <input name="no_hp" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan No Telp"  value="{{$siswa->no_hp}}">
         </div>

          <div class="form-group">
         <label for="exampleFormControlTextarea1">Alamat</label>
         <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$siswa->alamat}}</textarea>
         </div>

         <div class="form-group">
         <label for="exampleFormControlTextarea1">Foto Profil</label>
         <input type="file" name="avatar" class="form-control">
         </div>
        
         <button type="submit" class="btn btn-warning">Update</button>
      </div>
    </div>
  </div>
</div>
</form>
</label>
</div>
</div>



		
@endsection
