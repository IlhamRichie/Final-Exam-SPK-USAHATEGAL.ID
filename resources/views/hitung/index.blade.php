@extends('layout.app')
@section('title', $title)
@section('content')
{{ show_msg() }}
<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">Kriteria</h3>
    </div>
    <div class="card-body p-0 table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <th>Kode</th>
                <th>Nama</th>
                <th>Atribut</th>
                <th>Bobot</th>
                <th>Normal</th>
            </thead>
            @foreach($kriterias as $key => $val)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $val->nama_kriteria }}</td>
                <td>{{ $val->atribut }}</td>
                <td>{{ $val->bobot }}</td>
                <td>{{ round($saw->bobot_normal[$key], 4) }}</td>
            </tr>
            @endforeach
            <tfoot>
                <tr>
                    <td colspan="3">Total</td>
                    <td>{{ round(array_sum($saw->bobot), 4) }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">Data Tempat Usaha</h3>
    </div>
    <div class="card-body p-0 table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <th>Kode</th>
                <th>Nama</th>
                @foreach($kriterias as $key => $val)
                <th>{{ $val->nama_kriteria }}</th>
                @endforeach
            </thead>
            @foreach($rel_alternatif as $key => $val)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $alternatifs[$key]->nama_alternatif }}</td>
                @foreach($val as $k => $v)
                <td>{{ isset($crisp[$v]) ? $crisp[$v]->nama_crisp : '' }}</td>
                @endforeach
            </tr>
            @endforeach
        </table>
    </div>
</div>

<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">Nilai Tempat Usaha</h3>
    </div>
    <div class="card-body p-0 table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <th>Kode</th>
                <th>Nama</th>
                @foreach($kriterias as $key => $val)
                <th>{{ $val->nama_kriteria }}</th>
                @endforeach
            </thead>
            @foreach($saw->rel_alternatif as $key => $val)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $alternatifs[$key]->nama_alternatif }}</td>
                @foreach($val as $k => $v)
                <td>{{ round($v, 4) }}</td>
                @endforeach
            </tr>
            @endforeach
            <tfoot>
                <tr>
                    <td colspan="2">Min</td>
                    @foreach ($saw->minmax as $key => $val)
                    <td>{{ round($val['min'], 4) }}</td>
                    @endforeach
                </tr>
                <tr>
                    <td colspan="2">Max</td>
                    @foreach ($saw->minmax as $key => $val)
                    <td>{{ round($val['max'], 4) }}</td>
                    @endforeach
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">Normalisasi</h3>
    </div>
    <div class="card-body p-0 table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <th>Kode</th>
                @foreach($kriterias as $key => $val)
                <th>{{ $key }}</th>
                @endforeach
            </thead>
            @foreach($saw->normal as $key => $val)
            <tr>
                <td>{{ $key }}</td>
                @foreach($val as $k => $v)
                <td>{{ round($v, 3) }}</td>
                @endforeach
            </tr>
            @endforeach
        </table>
    </div>
</div>

<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">Terbobot</h3>
    </div>
    <div class="card-body p-0 table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <th>Kode</th>
                @foreach($kriterias as $key => $val)
                <th>{{ $key }}</th>
                @endforeach
            </thead>
            @foreach($saw->terbobot as $key => $val)
            <tr>
                <td>{{ $key }}</td>
                @foreach($val as $k => $v)
                <td>{{ round($v, 3) }}</td>
                @endforeach
            </tr>
            @endforeach
        </table>
    </div>
</div>

<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">Perangkingan</h3>
    </div>
    <div class="card-body p-0 table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <th>Rank</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Total</th>
            </thead>
            @foreach($saw->rank as $key => $val)
            <tr>
                <td>{{ $val }}</td>
                <td>{{ $key }}</td>
                <td>{{ $alternatifs[$key]->nama_alternatif }}</td>
                <td>{{ round($saw->total[$key], 3) }}</td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="card-footer">
        <a class="btn btn-default" href="{{ route('hitung.cetak') }}" target="_blank"><span class="fa fa-print"></span> Cetak</a>
    </div>
</div>
@endsection