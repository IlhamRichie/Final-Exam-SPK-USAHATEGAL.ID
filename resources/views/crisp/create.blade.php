@extends('layout.app')
@section('title', $title)
@section('content')
<form action="{{ route('crisp.store') }}" method="POST">
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-md-6">
					{{ show_error($errors) }}
					{{ csrf_field() }}
					<div class="form-group">
						<label>Kriteria <span class="text-danger">*</span></label>
						<select class="form-control" name="kode_kriteria">
							<?= get_kriteria_option(old('kode_kriteria')) ?>
						</select>
					</div>
					<div class="form-group">
						<label>Nilai Kriteria <span class="text-danger">*</span></label>
						<input class="form-control" type="text" name="nama_crisp" value="{{ old('nama_crisp') }}" />
					</div>
					<div class="form-group">
						<label>Nilai <span class="text-danger">*</span></label>
						<input class="form-control" type="text" name="nilai" value="{{ old('nilai') }}" />
					</div>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<button class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
			<a class="btn btn-danger" href="{{ route('crisp.index') }}"><i class="fa fa-backward"></i> Kembali</a>
		</div>
	</div>
</form>
@endsection