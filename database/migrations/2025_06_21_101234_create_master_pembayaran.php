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
        Schema::create('master_pembayaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('akademik_id')->constrained('akademik')->onDelete('cascade');
            $table->bigInteger('registration_fee')->default(null)->nullable();
            $table->bigInteger('spi_fee')->default(null)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_pembayaran');
    }
};
