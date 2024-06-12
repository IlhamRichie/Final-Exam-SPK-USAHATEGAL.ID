<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    public function cetak()
    {
        $data['title'] = 'Laporan Data Alternatif';
        $data['rows'] = Alternatif::orderBy('kode_alternatif')->get();
        return view('alternatif.cetak', $data);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['q'] = $request->input('q');
        $data['title'] = 'Data Alternatif';
        $data['limit'] = 10;
        $data['rows'] = Alternatif::where('nama_alternatif', 'like', '%' . $data['q'] . '%')
            ->orderBy('kode_alternatif')
            ->paginate($data['limit']);
        $data['no'] = $data['rows']->firstItem();
        return view('alternatif.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Tambah Alternatif';
        return view('alternatif.create', $data);
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
            'kode_alternatif' => 'required|unique:tb_alternatif',
            'nama_alternatif' => 'required',
            'harga' => 'required',
            'foto' => 'required',
            'link_pembelian' => 'required',
        ], [
            'kode_alternatif.required' => 'Kode alternatif harus diisi',
            'kode_alternatif.unique' => 'Kode alternatif harus unik',
            'nama_alternatif.required' => 'Nama alternatif harus diisi',
        ]);
        $alternatif = Alternatif::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fototempat/', $request->file('foto')->getClientOriginalName());
            $alternatif->foto = $request->file('foto')->getClientOriginalName();
        }
        $alternatif->save();

        query("INSERT INTO tb_rel_alternatif (kode_alternatif, kode_kriteria) SELECT ?, kode_kriteria FROM tb_kriteria", [$alternatif->kode_alternatif]);

        return redirect('alternatif')->with('message', 'Data berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function show(Alternatif $alternatif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function edit(Alternatif $alternatif)
    {
        $data['row'] = $alternatif;
        $data['title'] = 'Ubah Alternatif';
        return view('alternatif.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alternatif $alternatif)
    {
        $request->validate([
            'nama_alternatif' => 'required',
        ], [
            'nama_alternatif.required' => 'Nama alternatif harus diisi',
        ]);
        $alternatif->nama_alternatif = $request->nama_alternatif;
        $alternatif->keterangan = $request->keterangan;
        $alternatif->harga = $request->harga;
        $alternatif->foto = $request->foto;
        $alternatif->link_pembelian = $request->link_pembelian;
        $alternatif->save();
        return redirect('alternatif')->with('message', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alternatif $alternatif)
    {
        query("DELETE FROM tb_rel_alternatif WHERE kode_alternatif=?", [$alternatif]);
        $alternatif->delete();
        return redirect('alternatif')->with('message', 'Data berhasil dihapus!');
    }
}
