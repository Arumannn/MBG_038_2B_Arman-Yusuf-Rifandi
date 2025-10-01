<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membersihkan tabel sebelum memasukkan data baru
        DB::table('users')->truncate();

        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Budi Santoso',
                'email' => 'budi.gudang@mbg.id',
                'password' => Hash::make('pass123'), // <- Diubah ke Bcrypt
                'role' => 'gudang',
                
                
            ],
            [
                'id' => 2,
                'name' => 'Siti Aminah',
                'email' => 'siti.gudang@mbg.id',
                'password' => Hash::make('pass123'),
                'role' => 'gudang',
                
                
            ],
            [
                'id' => 3,
                'name' => 'Rahmat Hidayat',
                'email' => 'rahmat.gudang@mbg.id',
                'password' => Hash::make('pass123'),
                'role' => 'gudang',
                
                
            ],
            [
                'id' => 4,
                'name' => 'Lina Marlina',
                'email' => 'lina.gudang@mbg.id',
                'password' => Hash::make('pass123'),
                'role' => 'gudang',
                
                
            ],
            [
                'id' => 5,
                'name' => 'Anton Saputra',
                'email' => 'anton.gudang@mbg.id',
                'password' => Hash::make('pass123'),
                'role' => 'gudang',
                
                
            ],
            [
                'id' => 6,
                'name' => 'Dewi Lestari',
                'email' => 'dewi.dapur@mbg.id',
                'password' => Hash::make('pass123'),
                'role' => 'dapur',
                
                
            ],
            [
                'id' => 7,
                'name' => 'Andi Pratama',
                'email' => 'andi.dapur@mbg.id',
                'password' => Hash::make('pass123'),
                'role' => 'dapur',
                
                
            ],
            [
                'id' => 8,
                'name' => 'Maria Ulfa',
                'email' => 'maria.dapur@mbg.id',
                'password' => Hash::make('pass123'),
                'role' => 'dapur',
                
                
            ],
            [
                'id' => 9,
                'name' => 'Surya Kurnia',
                'email' => 'surya.dapur@mbg.id',
                'password' => Hash::make('pass123'),
                'role' => 'dapur',
                
                
            ],
            [
                'id' => 10,
                'name' => 'Yanti Fitri',
                'email' => 'yanti.dapur@mbg.id',
                'password' => Hash::make('pass123'),
                'role' => 'dapur',
                
                
            ],
        ]);
    }
}