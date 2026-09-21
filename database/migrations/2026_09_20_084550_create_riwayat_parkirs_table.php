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
        Schema::create('riwayat_parkirs', function (Blueprint $table) {
    $table->id('id_riwayat');

    $table->unsignedBigInteger('id_reservasi');

    $table->dateTime('jam_masuk');
    $table->dateTime('jam_keluar')->nullable();

    $table->integer('durasi');
    $table->string('status',20);

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_parkirs');
    }
};
