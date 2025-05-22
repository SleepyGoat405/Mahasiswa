<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenjang extends Model
{
    use HasFactory;

    protected $table = 'jenjang';
    protected $primaryKey = 'kode_jenjang';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['kode_jenjang', 'nama_jenjang'];
}

