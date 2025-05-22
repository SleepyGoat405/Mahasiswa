<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('prodi', function (Blueprint $table) {
            $table->string('kode_prodi')->primary();
            $table->string('nama_prodi');
            $table->string('kode_jenjang');
            $table->string('kode_jurusan');
            $table->timestamps();

            $table->foreign('kode_jenjang')->references('kode_jenjang')->on('jenjang')->onDelete('cascade');
            $table->foreign('kode_jurusan')->references('kode_jurusan')->on('jurusan')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prodi');
    }
};
