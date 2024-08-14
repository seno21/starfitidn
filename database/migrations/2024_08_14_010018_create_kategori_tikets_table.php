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
        Schema::create('kategori_tikets', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_event');
            $table->integer('jarak');
            $table->integer('usia');
            $table->string('kelamin');
            $table->boolean('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori_tikets');
    }
};
