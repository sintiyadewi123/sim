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
                  <h3 class="panel-title">Data Akun Siswa</h3>
                  <div class="right">
                  <!--   <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal">
                    <i class="lnr lnr-plus-circle"></i></button> -->
                </div>
              </div>
                <div class="panel-body">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Password</th>
                     
                      <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($data_akunsiswa as $akunsiswa)
                    <tr>
                       <td>{{$akunsiswa->name}}</td>
                       <td>{{$akunsiswa->email}}</td>
                       <td>{{$akunsiswa->password}}</td>
                    
                       <td>
                           <a href="/akunsiswa/{{$akunsiswa->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ?')">Delete</a></td>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Akun Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="/akunsiswa/create" method="POST">
       	{{csrf_field()}}
       	 <div class="form-group">
       	 <label for="exampleInputEmail1">Username</label>
       	 <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Username">
       	 </div>

       	 <div class="form-group">
       	 <label for="exampleInputEmail1">Email</label>
       	 <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Email">
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
