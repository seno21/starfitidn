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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('id_event');
            $table->string('id_tiket');
            $table->string('id_user');
            $table->integer('qty');
            $table->integer('final_payment'); //uang yang dibayar user
            $table->integer('fee_commision'); //komisi yang diterima penyedia website
            $table->integer('payment_fee')->nullable(); //uang yang dibayar ke payment gateway
            $table->integer('clean_fee')->nullable(); //uang bersih yang diterima penyedia
            $table->string('mode')->nullable();
            $table->string('no_bib')->nullable();
            $table->string('no_rfid')->nullable();
            $table->string('no_transaksi');
            $table->string('active');
            $table->string('status_pembayaran'); //pending (sudah isi data belum bayar), booking (sudah melakukan pembayaran)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
