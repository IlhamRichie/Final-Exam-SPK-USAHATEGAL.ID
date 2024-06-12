@extends('layout.app')
@section('title', $title)
@section('content')
{{ show_msg() }}
<div class="card card-primary card-outline">
	<div class="card-header">
		<form class="form-inline">
			<div class="form-group mr-1">
				<input class="form-control" type="text" name="q" value="{{ $q }}" placeholder="Pencarian..." />
			</div>
			<div class="form-group mr-1">
				<button class="btn btn-success"><i class="fa fa-search"></i> Cari</button>
			</div>
			<div class="form-group mr-1" {{ is_hidden('alternatif.create') }}>
				<a class="btn btn-primary" href="{{ route('alternatif.create') }}"><i class="fa fa-plus"></i> Tambah</a>
			</div>
			<div class="form-group mr-1" {{ is_hidden('alternatif.cetak') }}>
				<a class="btn btn-default" href="{{ route('alternatif.cetak') }}" target="_blank"><span class="fa fa-print"></span> Cetak</a>
			</div>
		</form>
	</div>
	<div class="card-body p-0 table-responsive">
		<table class="table table-bordered table-hover">
			<thead>
				<th>No</th>
				<th>Kode</th>
				<th>Nama alternatif</th>
				<th>Keterangan</th>
				<th>Harga</th>
				<th>Foto</th>
				<th>Aksi</th>
			</thead>
			@foreach($rows as $key => $row)
			<tr>
				<td>{{ $no++ }}</td>
				<td>{{ $row->kode_alternatif }}</td>
				<td>{{ $row->nama_alternatif }}</td>
				<td>{{ $row->keterangan }}</td>
				<td>RP. {{ $row->harga }}</td>
				<td>
					<img src="{{ asset('fototempat/'.$row->foto)}}" alt="" style="width: 70px;;">
				</td>
				<td>
					<a class="btn btn-xs btn-info" href="{{ route('alternatif.edit', $row) }}" {{ is_hidden('alternatif.edit') }}><i class="fa fa-edit"></i> Ubah</a>
					<form action="{{ route('alternatif.destroy', $row) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Hapus Data?')" {{ is_hidden('alternatif.destroy') }}>
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Hapus</button>
					</form>
				</td>
			</tr>
			@endforeach
		</table>
	</div>
	@if ($rows->hasPages())
	<div class="card-footer">
		{{ $rows->links() }}
	</div>
	@endif
</div>
@endsection