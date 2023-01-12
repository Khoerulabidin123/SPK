<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kriteria = [
            ['nama_kriteria' => 'Jarak', 'bobot' => '0.1', 'slug_kriteria' => 'C1'],
            ['nama_kriteria' => 'Keuntungan', 'bobot' => '0.4', 'slug_kriteria' => 'C2'],
            ['nama_kriteria' => 'Kerjasama', 'bobot' => '0.2', 'slug_kriteria' => 'C3'],
            ['nama_kriteria' => 'Jumlah Barang', 'bobot' => '0.2', 'slug_kriteria' => 'C4'],
            ['nama_kriteria' => 'Barang Retur', 'bobot' => '0.1', 'slug_kriteria' => 'C5'],
        ];
        DB::table('kriteria')->insert($kriteria);
    }
}
