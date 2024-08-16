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
            $table->string('alamat');
            $table->string('jenis_kelamin')->nullable();
            $table->string('tgl_lahir');
            $table->string('logo_partner')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_users');
    }
};
