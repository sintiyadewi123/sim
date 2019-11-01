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
	<h2 align="center">Daftar Guru</h2> 
	<br>
	<table border="1" cellspacing="0">
	<thead>
		<tr>
			<th align="center">Nama Lengkap</th>
			<th align="center">Jenis Kelamin</th>
			<th align="center">Agama</th>
			<th align="center">No Telp</th>
			<th align="center">Alamat</th>

			

		</tr>
	</thead>
	<tbody>
		@foreach($guru as $b)
		<tr>
			<td align="center">{{$b->nama_lengkap}}</td>
			<td align="center">{{$b->jenis_kelamin}}</td>
			<td align="center">{{$b->agama}}</td>
			<td align="center">{{$b->no_hp}}</td>
			<td align="center">{{$b->alamat}}</td>
	
		
		</tr>
		@endforeach
	</tbody>
</body>
</table>

