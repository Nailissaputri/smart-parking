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
        Schema::create('reservasis', function (Blueprint $table) {
    $table->id('id_reservasi');

    $table->unsignedBigInteger('id_user');
    $table->unsignedBigInteger('id_kendaraan');
    $table->unsignedBigInteger('id_slot');

    $table->text('qr_code');
    $table->dateTime('waktu_reservasi');
    $table->string('status',20);

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservasis');
    }
};
