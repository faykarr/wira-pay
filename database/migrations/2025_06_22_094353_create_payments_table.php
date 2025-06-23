<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswa')->onDelete('cascade')->comment('ID Siswa');
            $table->string('kode_transaksi')->unique()->comment('Kode Transaksi');
            $table->enum('jenis_pembayaran', ['Registrasi', 'SPI'])->comment('Jenis Pembayaran');
            $table->integer('angsuran')->default(null)->nullable()->comment('Angsuran Pembayaran');
            $table->bigInteger('nominal')->comment('Nominal Pembayaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
