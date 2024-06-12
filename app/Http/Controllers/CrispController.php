<?php

namespace App\Http\Controllers;

use App\Models\Crisp;
use Illuminate\Http\Request;

class CrispController extends Controller
{
    public function cetak()
    {
        $data['title'] = 'Laporan Data Nilai Kriteria';
        $data['rows'] =  Crisp::join('tb_kriteria', 'tb_kriteria.kode_kriteria', '=', 'tb_crisp.kode_kriteria')
            ->orderBy('tb_crisp.kode_kriteria')
            ->orderBy('nilai')->get();
        return view('crisp.cetak', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['q'] = $request->input('q');
        $data['title'] = 'Data Nilai Kriteria';
        $data['limit'] = 10;
        $data['rows'] = Crisp::where('nama_crisp', 'like', '%' . $data['q'] . '%')
            ->join('tb_kriteria', 'tb_kriteria.kode_kriteria', '=', 'tb_crisp.kode_kriteria')
            ->orderBy('tb_crisp.kode_kriteria')
            ->orderBy('nilai')
            ->paginate($data['limit']);
        $data['no'] = $data['rows']->firstItem();
        return view('crisp.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Tambah Crisp';
        return view('crisp.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_kriteria' => 'required',
            'nama_crisp' => 'required',
            'nilai' => 'required',
        ], [
            'kode_kriteria.required' => 'Kriteria harus diisi',
            'nama_crisp.required' => 'Nama crisp harus diisi',
            'nilai.required' => 'Nilai harus diisi',
        ]);
        $crisp = new Crisp($request->all());
        $crisp->save();
        return redirect('crisp')->with('message', 'Data berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Crisp  $crisp
     * @return \Illuminate\Http\Response
     */
    public function show(Crisp $crisp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Crisp  $crisp
     * @return \Illuminate\Http\Response
     */
    public function edit(Crisp $crisp)
    {
        $data['row'] = $crisp;
        $data['title'] = 'Ubah Crisp';
        return view('crisp.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Crisp  $crisp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Crisp $crisp)
    {
        $request->validate([
            'kode_kriteria' => 'required',
            'nama_crisp' => 'required',
            'nilai' => 'required',
        ], [
            'kode_kriteria.required' => 'Kriteria harus diisi',
            'nama_crisp.required' => 'Nama crisp harus diisi',
            'nilai.required' => 'Nilai harus diisi',
        ]);
        $crisp->kode_kriteria = $request->kode_kriteria;
        $crisp->nama_crisp = $request->nama_crisp;
        $crisp->nilai = $request->nilai;
        $crisp->save();
        return redirect('crisp')->with('message', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Crisp  $crisp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Crisp $crisp)
    {
        $crisp->delete();
        return redirect('crisp')->with('message', 'Data berhasil dihapus!');
    }
}
