<?php

namespace App\Http\Controllers;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use App\Models\Alternatif;
use App\Models\Nilai;

use Illuminate\Http\Request;

class HasilController extends Controller
{ 
    public function index()
    {
        // $AlternatifModel = Alternatif::findAll();

        // foreach ($AlternatifModel as $alternatif_sementara) {
        //     $nilai_akhir = 0;

        //     $id_alternatif = $alternatif_sementara['id_alternatif'];

        //     $id_pembobotan_sementara = Nilai::select('id')->where('alternatif_id', $id_alternatif)->findAll();
        //     foreach ($id_pembobotan_sementara as $id_pembobotan_sem) {
        //         $id_pembobotan = $id_pembobotan_sem['id'];
        //         $id_kriteria_sementara = Nilai::select('kriteria_id')->where('id', $id_pembobotan)->findAll();
        //         foreach ($id_kriteria_sementara as $id_kriteria_sem) {
        //             $id_kriteria = $id_kriteria_sem['id_kriteria'];
        //         };

        //         $bobot_pembobotan_sementara = Nilai::select('alternatif_id')->where('id', $id_pembobotan)->findAll();
        //         foreach ($bobot_pembobotan_sementara as $bobot_pembobotan_sem) {
        //             $bobot_pembobotan = $bobot_pembobotan_sem['bobot_pembobotan'];
        //         };

        //         $bobot_kriteria_sementara = Kriteria::select('bobot')->where('id', $id_kriteria)->findAll();
        //         foreach ($bobot_kriteria_sementara as $bobot_kriteria_sem) {
        //             $bobot_kriteria = $bobot_kriteria_sem['bobot_kriteria'];
        //         };

        //         $nilai_akhir_sementara = round($bobot_kriteria * $bobot_pembobotan, 3);

        //         $nilai_akhir = $nilai_akhir + $nilai_akhir_sementara;
        //     };

        //     $perhitungan_akhir[] = [
        //         'nilai_akhir' => $nilai_akhir,
        //         'nama_alternatif' => $alternatif_sementara['nama_alternatif'],
        //     ];
        // };

        // // mengurutkan data besar ke kecil
        // foreach ($perhitungan_akhir as $key => $row) {
        //     $nama_alternatif[$key] = $row['nama_alternatif'];
        // }

        // $nilai_akhir = array_column($perhitungan_akhir, 'nilai_akhir');
        // $nama_alternatif = array_column($perhitungan_akhir, 'nama_alternatif');

        // array_multisort($nilai_akhir, SORT_DESC, $nama_alternatif, SORT_DESC, $perhitungan_akhir);
        // // mengurutkan data besar ke kecil

        // $data = [
        //     'hasil_akhir' => $perhitungan_akhir
        // ];

        // return view('admin/hasil/hasil', $data);
        
        return view('hasil.index');
    }
}
