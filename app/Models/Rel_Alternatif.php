<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rel_Alternatif extends Model
{
    use HasFactory;

    protected $table = 'tb_rel_alternatif';
    protected $primaryKey = 'ID';

    protected $fillable = ['kode_alternatif', 'kode_kriteria', 'nilai'];
}
