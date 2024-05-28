<?php

namespace Database\Seeders;

use App\Models\Target;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TargetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Target::create([
            'kode_rekening' => '41101.01',
            'target' => '60500000',
            'periode_id' => '3',
        ]);
        Target::create([
            'kode_rekening' => '41101.02',
            'target' => '50750000',
            'periode_id' => '3',
        ]);
        Target::create([
            'kode_rekening' => '41101.03',
            'target' => '50500000',
            'periode_id' => '3',
        ]);
        Target::create([
            'kode_rekening' => '41101.04',
            'target' => '50250000',
            'periode_id' => '3',
        ]);
        Target::create([
            'kode_rekening' => '41101.05',
            'target' => '50000000',
            'periode_id' => '3',
        ]);
        Target::create([
            'kode_rekening' => '41101.01',
            'target' => '70500000',
            'periode_id' => '2',
        ]);
        Target::create([
            'kode_rekening' => '41101.02',
            'target' => '70750000',
            'periode_id' => '2',
        ]);
    }
}
