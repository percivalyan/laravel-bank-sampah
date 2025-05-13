<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('saldos', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->constrained('users')->onDelete('cascade');
            $table->string('sampah_id')->constrained('sampahs')->onDelete('cascade');
            $table->string('transaksi_id')->constrained('transaksi')->onDelete('cascade');
            $table->bigInteger('total')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('saldos');
    }
};
