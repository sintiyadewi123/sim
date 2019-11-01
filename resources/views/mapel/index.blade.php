@extends('layouts.master')
@section('header')
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
@stop
@section('content')

<div class="main">
<div class="main-content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
              <!-- TABLE HOVER -->
              <div class="panel">
                <div class="panel-heading">
                  <h3 class="panel-title">Data Mata Pelajaran</h3>
                  <div class="right">
                    <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal">
                    <i class="lnr lnr-plus-circle"></i></button>
                </div>
              </div>
                <div class="panel-body">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                      <th>Kode</th>
                      <th>Nama Mata Pelajaran</th>
                      <th>Semester</th>
                      <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($matpel as $mat)
                    <tr>
                       <td>{{$mat->kode}}</td></a>
                       <td>{{$mat->nama}}</td>
                       <td>{{$mat->semester}}</td>
                       <td>
                          
                           <a href="/matpel/{{$mat->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ?')">Delete</a></td>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mata Pelajaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="/matpel/create" method="POST">
        {{csrf_field()}}
         <div class="form-group">
         <label for="exampleInputEmail1">Kode</label>
         <input name="kode" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan kode mata pelajaran">
         </div>

         <div class="form-group">
         <label for="exampleInputEmail1">Nama Mata Pelajaran</label>
         <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan nama mata pelajaran">
         </div>

         <div class="form-group">
         <label for="guru_id">Pilih Guru Pengampu</label>
         <select class="form-control" id="guru_id" name="guru_id">
         @foreach($kamu as $smp)
          <option value="{{$smp->guru_id}}">{{$smp->nama_lengkap}}</option>
         @endforeach
         </select>
        </div>

         <div class="form-group">
         <label for="exampleFormControlSelect1">Semester</label>
         <select name="semester" class="form-control" id="exampleFormControlSelect1">
         <option value="ganjil">ganjil</option>
         </select>
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
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<script>
  $(document).ready(function() {
    $('.kode').editable();
});
</script>
@stop