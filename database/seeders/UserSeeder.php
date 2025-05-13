<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ketua User',
                'email' => 'ketua@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'role' => 'ketua',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bendahara User',
                'email' => 'bendahara@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'role' => 'bendahara',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Petugas User',
                'email' => 'petugas@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'role' => 'petugas',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Regular User',
                'email' => 'user@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'role' => 'user',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $users = [
            ['name' => 'Andi Pratama', 'email' => 'andi@example.com'],
            ['name' => 'Budi Santoso', 'email' => 'budi@example.com'],
            ['name' => 'Citra Lestari', 'email' => 'citra@example.com'],
            ['name' => 'Dewi Anggraini', 'email' => 'dewi@example.com'],
            ['name' => 'Eka Putri', 'email' => 'eka@example.com'],
            ['name' => 'Fajar Nugroho', 'email' => 'fajar@example.com'],
            ['name' => 'Gita Mawar', 'email' => 'gita@example.com'],
            ['name' => 'Hendra Gunawan', 'email' => 'hendra@example.com'],
            ['name' => 'Indah Permatasari', 'email' => 'indah@example.com'],
            ['name' => 'Joko Ryanto', 'email' => 'joko@example.com'],
            ['name' => 'Kurniawan Saputra', 'email' => 'kurniawan@example.com'],
            ['name' => 'Lia Rahmawati', 'email' => 'lia@example.com'],
            ['name' => 'Muhammad Iqbal', 'email' => 'iqbal@example.com'],
            ['name' => 'Nina Oktaviani', 'email' => 'nina@example.com'],
            ['name' => 'Oscar Yulianto', 'email' => 'oscar@example.com'],
            ['name' => 'Putri Amelia', 'email' => 'putri@example.com'],
            ['name' => 'Rizky Ramadhan', 'email' => 'rizky@example.com'],
            ['name' => 'Siti Nurhaliza', 'email' => 'siti@example.com'],
            ['name' => 'Teguh Prakoso', 'email' => 'teguh@example.com'],
            ['name' => 'Wulan Ayu', 'email' => 'wulan@example.com'],
        ];

        foreach ($users as $user) {
            DB::table('users')->insert([
                'name' => $user['name'],
                'email' => $user['email'],
                'email_verified_at' => now(),
                'password' => Hash::make('password123'), // password default
                'role' => 'user',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
