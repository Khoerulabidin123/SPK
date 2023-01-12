<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubkriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subkriteria = [
            ['nama_subkriteria' => 'Jarak < 10 KM', 'nilai' => '100', 'kriteria_id' => '1'],
            ['nama_subkriteria' => 'Jarak 11 - 10 KM', 'nilai' => '90', 'kriteria_id' => '1'],
            ['nama_subkriteria' => 'Jarak 21 - 10 KM', 'nilai' => '80', 'kriteria_id' => '1'],
            ['nama_subkriteria' => 'Jarak 31 - 10 KM', 'nilai' => '70', 'kriteria_id' => '1'],
            ['nama_subkriteria' => 'Jarak < 10 KM', 'nilai' => '60', 'kriteria_id' => '1'],
            ['nama_subkriteria' => 'Keuntungan > 201 ribu', 'nilai' => '100', 'kriteria_id' => '2'],
            ['nama_subkriteria' => 'Keuntungan 151 - 200 ribu', 'nilai' => '80', 'kriteria_id' => '2'],
            ['nama_subkriteria' => 'Keuntungan 101 = 150 ribu', 'nilai' => '60', 'kriteria_id' => '2'],
            ['nama_subkriteria' => 'Keuntungan 51 - 100 ribu', 'nilai' => '40', 'kriteria_id' => '2'],
            ['nama_subkriteria' => 'Keuntungan < 50 ribu', 'nilai' => '20', 'kriteria_id' => '2'],
            ['nama_subkriteria' => 'Kerjasama Sangat Baik', 'nilai' => '100', 'kriteria_id' => '3'],
            ['nama_subkriteria' => 'Kerjasama Baik', 'nilai' => '75', 'kriteria_id' => '3'],
            ['nama_subkriteria' => 'Kerjasama Kurang', 'nilai' => '40', 'kriteria_id' => '3'],
            ['nama_subkriteria' => 'JML Barang > 4 Paket', 'nilai' => '100', 'kriteria_id' => '4'],
            ['nama_subkriteria' => 'JML Barang 3 Paket', 'nilai' => '90', 'kriteria_id' => '4'],
            ['nama_subkriteria' => 'JML Barang 2 Paket', 'nilai' => '80', 'kriteria_id' => '4'],
            ['nama_subkriteria' => 'JML Barang 1 Paket', 'nilai' => '70', 'kriteria_id' => '4'],
            ['nama_subkriteria' => 'Barang Retur < 20', 'nilai' => '100', 'kriteria_id' => '5'],
            ['nama_subkriteria' => 'Barang Retur 21 - 40', 'nilai' => '85', 'kriteria_id' => '5'],
            ['nama_subkriteria' => 'Barang Retur 41 - 60', 'nilai' => '70', 'kriteria_id' => '5'],
            ['nama_subkriteria' => 'Barang Retur > 61', 'nilai' => '55', 'kriteria_id' => '5'],
        ];
        DB::table('subkriteria')->insert($subkriteria);
    }
}
