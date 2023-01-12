<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Alternatif;
use Illuminate\Support\Facades\DB;

class AlternatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alternatif = [
            ['nama_alternatif' => 'Toko Amanda', 'kode_alternatif' => 'A1'],
            ['nama_alternatif' => 'Toko Berkah', 'kode_alternatif' => 'A2'],
            ['nama_alternatif' => 'Muda Karya', 'kode_alternatif' => 'A3'],
            ['nama_alternatif' => 'Toko Bu Endang', 'kode_alternatif' => 'A4'],
            ['nama_alternatif' => 'Toko Wahyu', 'kode_alternatif' => 'A5'],
            ['nama_alternatif' => 'Toko Semar', 'kode_alternatif' => 'A6'],
            ['nama_alternatif' => 'Toko Putra', 'kode_alternatif' => 'A7'],
        ];
        DB::table('alternatif')->insert($alternatif);
    }
}
