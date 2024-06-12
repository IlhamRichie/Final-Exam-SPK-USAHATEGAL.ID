<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::insert([
            'nama_user' => 'Administrator',
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'level' => 'admin',
            'status_user' => 1,
        ]);
        \App\Models\User::insert([
            'nama_user' => 'User',
            'username' => 'user',
            'password' => Hash::make('user'),
            'level' => 'user',
            'status_user' => 1,
        ]);

        for ($a = 1; $a <= 5; $a++) {
            $kriteria = new \App\Models\Kriteria([
                'kode_kriteria' => 'C0' . $a,
                'nama_kriteria' => 'Kriteria ' . $a,
                'atribut' => array_rand(['benefit' => 'benefit', 'cost' => 'cost']),
                'bobot' => rand(1, 5),
            ]);
            $kriteria->save();
            foreach (['Sangat Rendah', 'Rendah', 'Cukup', 'Tinggi', 'Sangat Tinggi'] as $key => $val) {
                $crisp = new \App\Models\Crisp([
                    'kode_kriteria' => 'C0' . $a,
                    'nama_crisp' => $val,
                    'nilai' => $key + 1,
                ]);
                $crisp->save();
            }
        }

        for ($a = 1; $a <= 8; $a++) {
            $alternatif = new \App\Models\Alternatif([
                'kode_alternatif' => 'A0' . $a,
                'nama_alternatif' => 'Alternatif ' . $a,
                'keterangan' => '-',
            ]);
            $alternatif->save();
        }

        DB::statement("INSERT INTO tb_rel_alternatif (kode_alternatif, kode_kriteria) SELECT kode_alternatif, kode_kriteria FROM tb_alternatif, tb_kriteria");

        DB::table('tb_rel_alternatif')->update([
            'id_crisp' => DB::raw("(SELECT id_crisp FROM tb_crisp WHERE kode_kriteria=tb_rel_alternatif.kode_kriteria ORDER BY RAND() LIMIT 1)")
        ]);
    }
}
