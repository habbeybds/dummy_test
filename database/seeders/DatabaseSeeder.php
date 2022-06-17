<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Barang;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Barang::create([
            'nama_barang' => 'Beras Bulog',
            'satuan' => 'kg',
            'harga' => '50000',
            'stok' => '50',
            'status' => 'pending',
        ]);
        Barang::create([
            'nama_barang' => 'Minyak Goreng',
            'satuan' => 'ltr',
            'harga' => '50000',
            'stok' => '500',
            'status' => 'pending',
        ]);
    }
}
