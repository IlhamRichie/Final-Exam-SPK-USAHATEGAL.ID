@extends('layout.app')
@section('title', $title)
@section('content')
<form action="{{ route('alternatif.update', $row) }}" method="post">
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
						<label>Nama alternatif <span class="text-danger">*</span></label>
						<input class="form-control" type="text" name="nama_alternatif" value="{{ old('nama_alternatif', $row->nama_alternatif) }}">
					</div>
					<div class="form-group">
						<label>Keterangan</label>
						<input class="form-control" type="text" name="keterangan" value="{{ old('keterangan', $row->keterangan) }}" />
					</div>
					<div class="form-group">
						<label>Harga</label>
						<input class="form-control" type="text" name="harga" value="{{ old('harga', $row->harga) }}" />
					</div>
					<div class="form-group">
						<label for="exampleInputEmail" class="form-label"> Masukan Foto</label>
						<input type="file" name="foto" class="form-control" value="{{ old('foto', $row->foto) }}">
					</div>
					<div class="form-group">
						<label>Link Pembelian</label>
						<input class="form-control" type="text" name="link_pembelian" value="{{ old('link_pembelian', $row->link_pembelian) }}" />
					</div>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<button class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
			<a class="btn btn-danger" href="{{ route('alternatif.index' )}}"><i class="fa fa-backward"></i> Kembali</a>
		</div>
	</div>
</form>
@endsection