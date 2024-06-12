@extends('layout.print')
@section('title', $title)
@section('content')
<table class="table table-bordered table-hover">
    <thead>
        <th>Rank</th>
        <th>Kode</th>
        <th>Nama</th>
        <th>Total</th>
    </thead>
    @foreach($rows as $row)
    <tr>
        <td>{{ $row->rank }}</td>
        <td>{{ $row->kode_alternatif }}</td>
        <td>{{ $row->nama_alternatif }}</td>
        <td>{{ round($row->total, 3) }}</td>
    </tr>
    @endforeach
</table>
@endsection