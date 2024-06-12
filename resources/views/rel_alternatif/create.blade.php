@extends('layout.app')
@section('title', $title)
@section('content')
<form action="{{ route('alternatif.store') }}" method="POST">
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-md-6">
					{{ show_error($errors) }}
					{{ csrf_field() }}
					<div class="form-group">
						<label>Kode <span class="text-danger">*</span></label>
						<input class="form-control" type="text" name="kode_alternatif" value="{{ old('kode_alternatif', kode_oto('kode_alternatif', 'tb_alternatif', 'A', 2)) }}" />
					</div>
					<div class="form-group">
						<label>Nama laptop <span class="text-danger">*</span></label>
						<input class="form-control" type="text" name="nama_alternatif" value="{{ old('nama_alternatif') }}" />
					</div>
					<div class="form-group">
						<label>Keterangan</label>
						<input class="form-control" type="text" name="keterangan" value="{{ old('keterangan') }}" />
					</div>
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