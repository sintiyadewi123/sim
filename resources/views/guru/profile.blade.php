@extends('layouts.master')

@section('content')

<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-profile">
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							<div class="profile-left">
								<!-- PROFILE HEADER -->
								<div class="profile-header">
									<div class="overlay"></div>
									<div class="profile-main">
										<img src="{{$guru->getAvatar()}}" class="img-circle" alt="Avatar">
										<h3 class="name">{{$guru->nama_lengkap}}</h3>
										<span class="online-status status-available">Available</span>
									</div>
									<div class="profile-stat">
										<div class="row">
											<div class="col-md-15 stat-item">
												{{$guru->mapel->count()}}<span>Mata Pelajaran</span>
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
											<li>Jenis Kelamin <span>{{$guru->jenis_kelamin}}</span></li>
											<li>Agama <span>{{$guru->agama}}</span></li>
											<li>No Telp <span>{{$guru->no_hp}}</span></li>
											<li>Alamat <span>{{$guru->alamat}}</span></li>
										</ul>
									</div>
									
									<div class="text-center"><a href="/guru/{{$guru->id}}/edit" class="btn btn-primary">Edit Profile</a></div>
								</div>
								<!-- END PROFILE DETAIL -->
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							<div class="profile-right">
								<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  								Tambah Mapel
								</button> -->
								<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Mata pelajaran yang diampu oleh guru {{$guru->nama_lengkap}}</h3>
								</div>
								<div class="panel-body">
									<table class="table table-striped">
										<thead>
											<tr>
											
												<th>NAMA</th>
												<th>SEMESTER</th>
												
											</tr>
										</thead>
										<tbody>
											@foreach($guru->mapel as $mapel)
											<tr>
											
												<td>{{$mapel->nama}}</td>
												<td>{{$mapel->semester}}</td>
												<!-- <td><a href="/guru/{{$guru->id}}/{{$mapel->id}}/deletemapel" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ?')">Delete</a></td> -->
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Mata Pelajaran Guru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form action="/guru/{{$guru->id}}/addmapel" method="POST" enctype="multipart/form-data">
      		{{csrf_field()}}
      		<div class="form-group">
   			 <label for="mapel">Pilih Mata Pelajaran</label>
    		 <select class="form-control" id="mapel" name="mapel">
     		 @foreach($matapelajaran as $mp)
     		 	<option value="{{$mp->id}}">{{$mp->nama}}</option>
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
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
@stop
