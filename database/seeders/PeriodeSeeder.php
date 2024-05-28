<?php

namespace Database\Seeders;

use App\Models\Periode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeriodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Periode::create([
            'awal_masa' => '2021-01-01',
            'akhir_masa' => '2021-01-31',
        ]);
        Periode::create([
            'awal_masa' => '2022-01-01',
            'akhir_masa' => '2022-01-31',
        ]);
    }
}
