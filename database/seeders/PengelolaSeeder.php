<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PengelolaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Pengelola',
            'no_hp' => '08123456789',
            'alamat' => 'Jl. Contoh Alamat No. 123',
            'jenis_kelamin' => 'Laki-laki',
            'email' => 'pengelola@gmail.com',
            'password' => Hash::make('pengelola'),
            'hak_akses' => 'Pengelola',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
