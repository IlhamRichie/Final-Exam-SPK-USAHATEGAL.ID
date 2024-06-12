<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\SAW;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show()
    {
        $data['title'] = 'Home';
        return view('home', $data);
    }
	
	public function landingpage()
    {
        $barangs = Alternatif::paginate(8);
        return view('landingpage', compact('barangs'));
    }
	
	public function hasilsaw()
    {
        query("DELETE FROM tb_crisp WHERE kode_kriteria NOT IN (SELECT kode_kriteria FROM tb_kriteria)");
        query("DELETE FROM tb_rel_alternatif WHERE kode_kriteria NOT IN (SELECT kode_kriteria FROM tb_kriteria)");
        query("DELETE FROM tb_rel_alternatif WHERE kode_alternatif NOT IN (SELECT kode_alternatif FROM tb_alternatif)");

        $data['rel_alternatif'] = get_rel_alternatif();
        $data['alternatifs'] = get_alternatif(); 
        $data['crisp'] = get_crisp();
		
		
        $data['rel_nilai'] = array();
        foreach ($data['rel_alternatif'] as $key => $val) {
            foreach ($val as $k => $v) {
                $data['rel_nilai'][$key][$k] = isset($data['crisp'][$v]) ? $data['crisp'][$v]->nilai : 0;
            }
        }

        $kriteria = Kriteria::all();
		 
        $atribut = array();
        $bobot = array();
        foreach ($kriteria as $row) {
            $atribut[$row->kode_kriteria] = $row->atribut;
            $bobot[$row->kode_kriteria] = $row->bobot;
            $data['kriterias'][$row->kode_kriteria] = $row;
        }
		
        $saw = new SAW($data['rel_nilai'], $atribut, $bobot);
        foreach ($saw->total as $key => $val) {
            $alternatif = Alternatif::find($key);
            $alternatif->total = $val;
            $alternatif->rank = $saw->rank[$key];
            $alternatif->save();
        }
		
		 
		$data['arrfilter'] = [0,0,0,0,0,0,0];
		
		
        $data['saw'] = $saw;
        $data['title'] = 'Hasil SAW';
		$data['juduldata'] = 'Rekomendasi 2024 Tegal & Sekitarnya';
		  
		
		 return view('hasilsaw', $data);
    }
	
	
	public function filter(Request $request)
    {
        query("DELETE FROM tb_crisp WHERE kode_kriteria NOT IN (SELECT kode_kriteria FROM tb_kriteria)");
        query("DELETE FROM tb_rel_alternatif WHERE kode_kriteria NOT IN (SELECT kode_kriteria FROM tb_kriteria)");
        query("DELETE FROM tb_rel_alternatif WHERE kode_alternatif NOT IN (SELECT kode_alternatif FROM tb_alternatif)");

        $data['rel_alternatif'] = get_rel_alternatif();
        $data['alternatifs'] = get_alternatif();
        $data['crisp'] = get_crisp();
        $data['rel_nilai'] = array();
        foreach ($data['rel_alternatif'] as $key => $val) {
            foreach ($val as $k => $v) {
                $data['rel_nilai'][$key][$k] = isset($data['crisp'][$v]) ? $data['crisp'][$v]->nilai : 0;
            }
        }

        $kriteria = Kriteria::all();
		$data['kriteriaku'] = $kriteria;
        $atribut = array();
        $bobot = array();
        foreach ($kriteria as $row) {
            $atribut[$row->kode_kriteria] = $row->atribut;
            $bobot[$row->kode_kriteria] = $row->bobot;
            $data['kriterias'][$row->kode_kriteria] = $row;
        }
		
		
        $saw = new SAW($data['rel_nilai'], $atribut, $bobot);
        foreach ($saw->total as $key => $val) {
            $alternatif = Alternatif::find($key);
            $alternatif->total = $val;
            $alternatif->rank = $saw->rank[$key];
            $alternatif->save();
        }
		
		//menyiapkan filter
		$arr=array();
		 foreach ($kriteria as $row) {
            $kode = $row->kode_kriteria;
			$x='kriteria'.$kode;
			$terpilih= $request->$x;  
			array_push($arr,$terpilih);
        }  
		$data['arrfilter'] = $arr;
		 //end menyiapkan filter
		 
 
        $data['saw'] = $saw;
        $data['title'] = 'Hasil SAW';
		$data['juduldata'] = 'Hasil Filter Data Rekomendasi 2024 Tegal & Sekitarnya';
		
		
		 return view('hasilfilter', $data);
    }
	
	
}
