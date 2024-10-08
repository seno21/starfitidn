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
        Schema::create('tikets', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_event');
            $table->string('nama_promo');
            $table->string('kategori')->nullable();
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->integer('quota')->nullable();
            $table->integer('harga');
            $table->boolean('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tikets');
    }
};
