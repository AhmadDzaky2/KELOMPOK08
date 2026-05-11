<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;

class TokoSeeder extends Seeder
{
    public function run(): void
    {
       // Contoh di TokoSeeder.php
User::updateOrCreate(
    ['username' => 'admin_toko'], // Cek apakah username ini ada
    [
        'password' => Hash::make('admin123'),
        'role' => 'admin'
    ]
);

User::updateOrCreate(
    ['username' => 'lifa'],
    [
        'password' => Hash::make('lifa123'),
        'role' => 'customer'
    ]
);

        // 2. Isi Produk
        Product::create([
            'nama_produk' => 'Kaos Polos Premium Black',
            'deskripsi' => 'Bahan katun combed 30s warna hitam pekat.',
            'harga' => 85000,
            'foto' => 'kaos-hitam.jpg',
            'stok' => 50
        ]);

        Product::create([
            'nama_produk' => 'Jaket Parka Dark Grey',
            'deskripsi' => 'Jaket tahan angin dengan warna abu gelap.',
            'harga' => 275000,
            'foto' => 'parka-grey.jpg',
            'stok' => 12
        ]);
        
        Product::create([
            'nama_produk' => 'Sepatu Sneakers Charcoal',
            'deskripsi' => 'Nyaman digunakan untuk harian.',
            'harga' => 420000,
            'foto' => 'sneakers-dark.jpg',
            'stok' => 8
        ]);
    }
}