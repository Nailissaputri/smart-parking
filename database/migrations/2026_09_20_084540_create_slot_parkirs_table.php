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
        Schema::create('slot_parkirs', function (Blueprint $table) {
    $table->id('id_slot');
    $table->string('nomor_slot',10);
    $table->string('lokasi',50);
    $table->enum('status',['tersedia','terisi']);
    $table->string('jenis_slot',20);
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slot_parkirs');
    }
};
