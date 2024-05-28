<?php

namespace Database\Seeders;

use App\Models\TransaksiHarian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TransaksiHarian::create([
            'kode_rekening' => '41101.01',
            'via_bayar' => '1',
            'tanggal_setor' => '2022-10-02',
            'jumlah_bayar' => '2000000',
        ]);
        TransaksiHarian::create([
            'kode_rekening' => '41101.03',
            'via_bayar' => '2',
            'tanggal_setor' => '2022-10-02',
            'jumlah_bayar' => '1500000',
        ]);
        TransaksiHarian::create([
            'kode_rekening' => '41101.02',
            'via_bayar' => '1',
            'tanggal_setor' => '2022-10-09',
            'jumlah_bayar' => '1750000',
        ]);
        TransaksiHarian::create([
            'kode_rekening' => '41101.01',
            'via_bayar' => '2',
            'tanggal_setor' => '2022-10-11',
            'jumlah_bayar' => '2000000',
        ]);
        TransaksiHarian::create([
            'kode_rekening' => '41101.05',
            'via_bayar' => '1',
            'tanggal_setor' => '2022-10-12',
            'jumlah_bayar' => '1000000',
        ]);
        TransaksiHarian::create([
            'kode_rekening' => '41101.02',
            'via_bayar' => '1',
            'tanggal_setor' => '2022-10-15',
            'jumlah_bayar' => '1750000',
        ]);
        TransaksiHarian::create([
            'kode_rekening' => '41101.04',
            'via_bayar' => '1',
            'tanggal_setor' => '2022-10-15',
            'jumlah_bayar' => '1250000',
        ]);
        TransaksiHarian::create([
            'kode_rekening' => '41101.02',
            'via_bayar' => '1',
            'tanggal_setor' => '2022-11-02',
            'jumlah_bayar' => '1750000',
        ]);
        TransaksiHarian::create([
            'kode_rekening' => '41101.03',
            'via_bayar' => '1',
            'tanggal_setor' => '2022-11-03',
            'jumlah_bayar' => '1500000',
        ]);
        TransaksiHarian::create([
            'kode_rekening' => '41101.03',
            'via_bayar' => '1',
            'tanggal_setor' => '2022-11-03',
            'jumlah_bayar' => '1500000',
        ]);
        TransaksiHarian::create([
            'kode_rekening' => '41101.01',
            'via_bayar' => '2',
            'tanggal_setor' => '2022-11-05',
            'jumlah_bayar' => '2000000',
        ]);
        TransaksiHarian::create([
            'kode_rekening' => '41101.02',
            'via_bayar' => '2',
            'tanggal_setor' => '2022-11-06',
            'jumlah_bayar' => '1750000',
        ]);
        TransaksiHarian::create([
            'kode_rekening' => '41101.04',
            'via_bayar' => '2',
            'tanggal_setor' => '2022-11-10',
            'jumlah_bayar' => '1250000',
        ]);
        TransaksiHarian::create([
            'kode_rekening' => '41101.05',
            'via_bayar' => '2',
            'tanggal_setor' => '2022-11-12',
            'jumlah_bayar' => '1000000',
        ]);
        TransaksiHarian::create([
            'kode_rekening' => '41101.01',
            'via_bayar' => '2',
            'tanggal_setor' => '2022-11-12',
            'jumlah_bayar' => '2000000',
        ]);
    }
}
