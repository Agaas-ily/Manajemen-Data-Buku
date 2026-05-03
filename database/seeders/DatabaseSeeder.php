<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Kategori::insert([
            ['nama_kategori' => 'Fiksi'],
            ['nama_kategori' => 'Non-Fiksi'],
            ['nama_kategori' => 'Teknologi'],
        ]);

        Penerbit::insert([
            ['nama_penerbit' => 'Penerbit A'],
            ['nama_penerbit' => 'Penerbit B'],
            ['nama_penerbit' => 'Penerbit C'],
        ]);

        Buku::factory()->count(50)->create();
    }
} 