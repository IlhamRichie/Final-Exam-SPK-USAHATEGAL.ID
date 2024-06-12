@extends('layout.app')
@section('title', $title)
@section('content')
{{ show_msg() }}
<form action="{{ route('user.password.update') }}" method="post">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    {{ show_error($errors) }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Password Lama <span class="text-danger">*</span></label>
                        <input class="form-control" type="password" name="pass1" value="{{ old('pass1') }}" />
                    </div>
                    <div class="form-group">
                        <label>Password Baru <span class="text-danger">*</span></label>
                        <input class="form-control" type="password" name="pass2" value="{{ old('pass2') }}" />
                    </div>
                    <div class="form-group">
                        <label>Konfirmasi Password Baru <span class="text-danger">*</span></label>
                        <input class="form-control" type="password" name="pass2_confirmation" value="{{ old('pass3') }}" />
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