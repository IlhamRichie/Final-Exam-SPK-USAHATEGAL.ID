@extends('layout.print')
@section('title', $title)
@section('content')
<table class="table table-bordered table-hover">
	<thead>
		<th>No</th>
		<th>Kriteria</th>
		<th>Nilai Kriteria</th>
		<th>Nilai</th>
	</thead>
	<?php $no = 1 ?>
	@foreach($rows as $key => $row)
	<tr>
		<td>{{ $no++ }}</td>
		<td>{{ $row->nama_kriteria }}</td>
		<td>{{ $row->nama_crisp }}</td>
		<td>{{ $row->nilai }}</td>
	</tr>
	@endforeach
</table>
@endsection