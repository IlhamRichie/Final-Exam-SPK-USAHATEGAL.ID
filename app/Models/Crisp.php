<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crisp extends Model
{
    use HasFactory;

    protected $table = 'tb_crisp';
    protected $primaryKey = 'id_crisp';
    public $incrementing = false;

    protected $fillable = ['kode_kriteria', 'nama_crisp', 'nilai'];
}
