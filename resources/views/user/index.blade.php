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
			<div class="form-group mr-1">
				<a class="btn btn-primary" href="{{ route('user.create') }}"><i class="fa fa-plus"></i> Tambah</a>
			</div>
		</form>
	</div>
	<div class="card-body p-0 table-responsive">
		<table class="table table-bordered table-hover">
			<thead>
				<th>No</th>
				<th>Nama user</th>
				<th>Username</th>
				<th>Level</th>
				<th>Status</th>
				<th>Aksi</th>
			</thead>
			@foreach($rows as $key => $row)
			<tr>
				<td>{{ $no++ }}</td>
				<td>{{ $row->nama_user }}</td>
				<td>{{ $row->username }}</td>
				<td>{{ $row->level }}</td>
				<td>{{ $row->status_user ? 'Aktif' : 'NonAktif' }}</td>
				<td>
					<a class="btn btn-xs btn-info" href="{{ route('user.edit', $row) }}"><i class="fa fa-edit"></i> Ubah</a>
					<form action="{{ route('user.destroy', $row) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Hapus Data?')">
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