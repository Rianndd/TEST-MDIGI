<?php

namespace Database\Seeders;

use App\Models\Rekening;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RekeningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rekening::create([
            'kode_rekening' => '41101.01',
            'nama_rekening' => 'Pajak Hotel Bintang 1',
        ]);
        Rekening::create([
            'kode_rekening' => '41101.02',
            'nama_rekening' => 'Pajak Hotel Bintang 2',
        ]);
        Rekening::create([
            'kode_rekening' => '41101.03',
            'nama_rekening' => 'Pajak Hotel Bintang 3',
        ]);
        Rekening::create([
            'kode_rekening' => '41101.04',
            'nama_rekening' => 'Pajak Hotel Bintang 4',
        ]);
        Rekening::create([
            'kode_rekening' => '41101.05',
            'nama_rekening' => 'Pajak Hotel Bintang 5',
        ]);
    }
}
