<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sampahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('satuan', ['kg', 'buah', 'liter'])->default('kg');
            $table->decimal('harga', 10, 2);
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });

        // Insert data sampah daur ulang (ensure user_id exists)
        DB::table('sampahs')->insert([
            ['nama' => 'Plastik PET', 'satuan' => 'kg', 'harga' => 5000, 'deskripsi' => 'Plastik PET yang sering digunakan untuk botol minuman.'],
            ['nama' => 'Plastik HDPE', 'satuan' => 'kg', 'harga' => 4000, 'deskripsi' => 'Plastik HDPE, sering digunakan pada kemasan deterjen.'],
            ['nama' => 'Kertas', 'satuan' => 'kg', 'harga' => 2000, 'deskripsi' => 'Kertas daur ulang, misalnya kertas kantor atau koran.'],
            ['nama' => 'Kaca', 'satuan' => 'kg', 'harga' => 3000, 'deskripsi' => 'Kaca bekas botol atau kemasan lainnya.'],
            ['nama' => 'Aluminium', 'satuan' => 'kg', 'harga' => 7000, 'deskripsi' => 'Logam aluminium bekas, seperti kaleng minuman.'],
            ['nama' => 'Besi', 'satuan' => 'kg', 'harga' => 6000, 'deskripsi' => 'Besi bekas yang dapat didaur ulang seperti batang atau plat.'],
            ['nama' => 'Kartons', 'satuan' => 'kg', 'harga' => 2500, 'deskripsi' => 'Kartons yang digunakan untuk kemasan barang.'],
            ['nama' => 'Tetra Pak', 'satuan' => 'kg', 'harga' => 4500, 'deskripsi' => 'Kemasan Tetra Pak yang digunakan untuk minuman atau makanan.'],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('sampahs');
    }
};
