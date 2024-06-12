@extends('layout.print')
@section('title', $title)
@section('content')
<table class="table table-bordered table-hover">
	<thead>
		<th>No</th>
		<th>Kode</th>
		<th>Nama kriteria</th>
		<th>Atribut</th>
		<th>Bobot</th>
	</thead>
	<?php $no = 1 ?>
	@foreach($rows as $key => $row)
	<tr>
		<td>{{ $no++ }}</td>
		<td>{{ $row->kode_kriteria }}</td>
		<td>{{ $row->nama_kriteria }}</td>
		<td>{{ $row->atribut }}</td>
		<td>{{ $row->bobot }}</td>
	</tr>
	@endforeach
</table>
@endsection