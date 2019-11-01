<!DOCTYPE html>
<html>
<head>
<title>HTML Tables</title>
<style type="text/css">
	table{
		width: 1030px;
		margin-left: 0;
	}
	th {
    background-color: gray; color: fff;
  }

</style>

</head>
<body>
	<br>
	<h2 align="center">Daftar Siswa</h2> 
	<br>
	<table border="1" cellspacing="0">
	<thead>
		<tr>
			<th align="center">Nama Lengkap</th>
			<th align="center">Jenis Kelamin</th>
			<th align="center">Agama</th>
			<th align="center">No Telp</th>
			<th align="center">Alamat</th>
			<th align="center">Rata-Rata Nilai</th>
			

		</tr>
	</thead>
	<tbody>
		@foreach($siswa as $a)
		<tr>
			<td align="center">{{$a->nama_lengkap}}</td>
			<td align="center">{{$a->jenis_kelamin}}</td>
			<td align="center">{{$a->agama}}</td>
			<td align="center">{{$a->no_hp}}</td>
			<td align="center">{{$a->alamat}}</td>
			<td align="center">{{$a->test()}}</td>
		
		</tr>
		@endforeach
	</tbody>
</body>
</table>

