@extends('layout.app')
@section('title', $title)
@section('content')
{{ show_msg() }}
<form action="{{ route('user.profil.update') }}" method="post" enctype="multipart/form-data">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    {{ show_error($errors) }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Nama Lengkap <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="nama_user" value="{{ old('nama_user', $user->nama_user) }}" />
                    </div>
                    <div class="form-group">
                        <label>Username <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="username" value="{{ old('username', $user->username) }}" />
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        </div>
    </div>
</form>
@endsection