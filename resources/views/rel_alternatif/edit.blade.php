@extends('layout.app')
@section('title', $title)
@section('content')
<form action="{{ route('rel_alternatif.update', $row) }}" method="post">
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-md-6">
					{{show_error($errors)}}
					{{ csrf_field() }}
					{{ method_field('PUT') }}
					<div class="form-group">
						<label>Kode alternatif <span class="text-danger">*</span></label>
						<input class="form-control" type="text" name="kode_alternatif" value="{{ old('kode_alternatif', $row->kode_alternatif) }}" readonly>
					</div>
					<div class="form-group">
						<label>Nama Laptop <span class="text-danger">*</span></label>
						<input class="form-control" type="text" name="nama_alternatif" value="{{ old('nama_alternatif', $row->nama_alternatif) }}" readonly>
					</div>
					@foreach($nilais as $nilai)
					<div class="mb-3">
						<label> {{ $nilai->nama_kriteria }} </label>
						<select class="form-control" name="nilai[{{ $nilai->ID }}]">
							<?= get_crisp_option($nilai->kode_kriteria, $nilai->id_crisp) ?>
						</select>
					</div>
					@endforeach
				</div>
			</div>
		</div>
		<div class="card-footer">
			<button class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
			<a class="btn btn-danger" href="{{ route('alternatif.index') }}"><i class="fa fa-backward"></i> Kembali</a>
		</div>
	</div>
</form>
@endsection