<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function details($id)
    {
        $barang = Alternatif::where('kode_alternatif', $id)->first();

        return view('detail.index', compact('barang'));
    }
    public function bawah()
    {
        $bawahh = Alternatif::paginate(4);
        return view('detail.index', compact('bawahh'));
    }
}
