@extends('layout.print')
@section('title', $title)
@section('content')
<table class="table table-bordered table-hover">
    <thead>
        <th>No</th>
        <th>Kode</th>
        <th>Nama</th>
        @foreach($kriterias as $kriteria)
        <th>{{ $kriteria->nama_kriteria }}</th>
        @endforeach
    </thead>
    <?php $no = 1 ?>
    @foreach($rows as $key => $row)
    <tr>
        <td>{{ $no++ }}</td>
        <td>{{ $row->kode_alternatif }}</td>
        <td>{{ $row->nama_alternatif }}</td>
        @foreach($row->nilais as $nilai)
        <td>{{ $nilai->pivot->nilai }}</td>
        @endforeach
    </tr>
    @endforeach
</table>
@endsection