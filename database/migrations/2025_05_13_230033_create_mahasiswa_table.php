<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->string('nim')->primary();
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('kode_prodi');
            $table->string('nip')->nullable();
            $table->string('email')->unique();
            $table->string('no_hp');
            $table->string('tahun_masuk');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->string('asal');
            $table->string('alamat');
            $table->string('foto_profil')->nullable();
            $table->string('password');
            $table->timestamps();

            $table->foreign('kode_prodi')->references('kode_prodi')->on('prodi')->onDelete('cascade');
            $table->foreign('nip')->references('nip')->on('dosen')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};