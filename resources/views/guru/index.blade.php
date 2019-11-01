@extends('layouts.master')
@section('content')

<div class="main">
<div class="main-content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
              <!-- TABLE HOVER -->
              <div class="panel">
                <div class="panel-heading">
                  <h3 class="panel-title">Data Guru</h3>
                  <div class="right">
                    <a href="/guru/exportexcel" class="btn btn-sm btn-primary">Export Excel</a>
                    <a href="/guru/exportpdf" class="btn btn-sm btn-primary">Export Pdf</a>
                    <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal">
                    <i class="lnr lnr-plus-circle"></i></button>
                </div>
              </div>
                <div class="panel-body">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                      <th>Nama Lengkap</th>
                      <th>Jenis Kelamin</th>
                      <th>Agama</th>
                      <th>No Telp</th>
                      <th>Alamat</th>
                      <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($data_guru as $guru)
                    <tr>
                       <td><a href="/guru/{{$guru->id}}/profile">{{$guru->nama_lengkap}}</td></a>
                       <td>{{$guru->jenis_kelamin}}</td>
                       <td>{{$guru->agama}}</td>
                       <td>{{$guru->no_hp}}</td>
                       <td>{{$guru->alamat}}</td>
                       <td>
                           <a href="/guru/{{$guru->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                           <a href="#" class="btn btn-danger btn-sm delete" guru-id="{{$guru->id}}">Delete</a>
                       </tr>
                       @endforeach
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- END TABLE HOVER -->
            </div>
</div>


	
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Guru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="/guru/create" method="POST">
       	{{csrf_field()}}
       	 <div class="form-group">
       	 <label for="exampleInputEmail1">Nama Lengkap</label>
       	 <input name="nama_lengkap" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nama Lengkap">
       	 </div>

       	 <div class="form-group">
       	 <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
       	 <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
       	 <option value="L">Laki-Laki</option>
       	 <option value="P">Perempuan</option>
         </select>
       	 </div>

           <div class="form-group">
         <label for="exampleInputEmail1">Email</label>
         <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Email">
         </div>

       	 <div class="form-group">
       	 <label for="exampleInputEmail1">Agama</label>
       	 <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Agama">
         </div>

    
         <div class="form-group">
       	 <label for="exampleInputEmail1">No Telp</label>
       	 <input name="no_hp" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan No Telp">
         </div>

          <div class="form-group">
       	 <label for="exampleFormControlTextarea1">Alamat</label>
       	 <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
         </div>

         </div>
         <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>
</form>
@stop
@section('footer')
<script>
 $('.delete').click(function(){
    var guru_id =$(this).attr('guru-id');
    swal({
    title: "Yakin ?",
    text: "Mau menghapus data guru dengan id "+guru_id + " ?",
    icon: "warning",
    buttons: true,
    dangerMode: true,
    })
    .then((willDelete) => {
      console.log(willDelete);
    if (willDelete) {
    window.location = "/guru/"+guru_id+"/delete";
    }
  });
});
</script>
@stop
