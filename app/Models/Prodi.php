<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
   use HasFactory;

    protected $table = 'prodi';
    protected $primaryKey = 'kode_prodi';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['kode_prodi', 'nama_prodi', 'kode_jenjang', 'kode_jurusan'];

    public function jenjang()
    {
        return $this->belongsTo(Jenjang::class, 'kode_jenjang', 'kode_jenjang');
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'kode_jurusan', 'kode_jurusan');
    }

}
