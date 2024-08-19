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
        Schema::create('detail_users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('id_user');
            $table->string('no_telp');
            $table->string('nama_lengkap');
            $table->string('nik');
            $table->string('kontak_darurat');
            $table->string('domisili');
            $table->string('usia');
            $table->string('ukuran_jersey');
            $table->string('jenis_kelamin');
            $table->date('tgl_lahir');
            $table->string('tempat_lahir');
            $table->string('logo_partner')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_user');
    }
};
