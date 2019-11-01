@extends('layouts.master')

@section('header')
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
@stop

@section('content')

<div class="main">

			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					

					@if(session('error'))
						<div class="alert alert-danger" role="alert">
							{{session('error')}}
						</div>
					@endif


		
					<div class="panel panel-profile">
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							<div class="profile-left">
								<!-- PROFILE HEADER -->
								<div class="profile-header">
									<div class="overlay"></div>
									<div class="profile-main">
										<img src="{{$siswa->getAvatar()}}" class="img-circle" alt="Avatar">
										<h3 class="name">{{$siswa->nama_lengkap}}</h3>
										<span class="online-status status-available">Available</span>
									</div>
									<div class="profile-stat">
										<div class="row">
											<div class="col-md-6 stat-item">
												{{$siswa->mapel->count()}}<span>Mata Pelajaran</span>
											</div>
											<div class="col-md-6 stat-item">
												{{$siswa->test()}}<span>Rata-Rata Nilai</span>
											</div>
											
										</div>
									</div>
								</div>
								<!-- END PROFILE HEADER -->
								<!-- PROFILE DETAIL -->
								<div class="profile-detail">
									<div class="profile-info">
										<h4 class="heading">Data Diri</h4>
										<ul class="list-unstyled list-justify">
											<li>Jenis Kelamin <span>{{$siswa->jenis_kelamin}}</span></li>
											<li>Agama <span>{{$siswa->agama}}</span></li>
											<li>No Telp <span>{{$siswa->no_hp}}</span></li>
											<li>Alamat <span>{{$siswa->alamat}}</span></li>
										</ul>
									</div>
									
									<div class="text-center"><a href="/siswa/{{$siswa->id}}/edit" class="btn btn-primary">Edit Profile</a></div>
								</div>
								<!-- END PROFILE DETAIL -->
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							<div class="profile-right">
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  								Tambah Nilai
								</button>
						
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Mata Pelajaran</h3>
								</div>
								<div class="panel-body">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>KODE</th>
												<th>NAMA</th>
												<th>SEMESTER</th>
												<th>NILAI</th>
												<th>GURU</th>
												<th>AKSI</th>
											</tr>
										</thead>
										<tbody>
											@foreach($siswa->mapel as $mapel)
											<tr>
												<td>{{$mapel->kode}}</td>
												<td>{{$mapel->nama}}</td>
												<td>{{$mapel->semester}}</td>
												<td><a href="#" class="nilai" data-type="text" data-pk="{{$mapel->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilai" data-title="Masukan nilai">{{$mapel->pivot->nilai}}</a></td>
											
												<td><a href="/guru/{{$mapel->guru_id}}/profile">{{$mapel->guru->nama_lengkap}}</td></a>

												<td><a href="/siswa/{{$siswa->id}}/{{$mapel->id}}/deletenilai" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ?')">Delete</a></td>
											</tr>
											@endforeach
										
										</tbody>
									</table>
								</div>
							</div>
							<!-- END TABLE STRIPED -->
						</div>
							</div>
							<!-- END RIGHT COLUMN -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>

		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form action="/siswa/{{$siswa->id}}/addnilai" method="POST" enctype="multipart/form-data">
      		{{csrf_field()}}
      		<div class="form-group">
   			 <label for="mapel">Pilih Mata Pelajaran</label>
    		 <select class="form-control" id="mapel" name="mapel">
     		 @foreach($matapelajaran as $mp)
     		 	<option value="{{$mp->id}}">{{$mp->nama}}</option>
     		 @endforeach
    		 </select>
        </div>

      		<label for="exampleInputEmail1">Nilai</label>
      		<input name="nilai" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nilai" value="{{old('nilai')}}">
      	
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
@stop

@section('footer')
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

<script>
	$(document).ready(function() {
    $('.nilai').editable();
});
</script>
@stop