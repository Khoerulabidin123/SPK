<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use App\Models\Alternatif;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itemnilai = Nilai::with(relations:'kriteria')->with(relations:'subkriteria')->with(relations:'alternatif')->orderBy('alternatif_id', 'asc')->orderBy('kriteria_id', 'desc')->paginate(20);
        $data = array('title' => 'nilai',
                    'itemnilai' => $itemnilai);
        return view('nilai.index', $data)->with('no', ($request->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array('title' => 'Form Penilaian Baru');
        $itemkriteria = Kriteria::all();
        $itemalternatif = Alternatif::all();
        $itemsubkriteria = SubKriteria::all();
        return view('nilai.create', compact('itemkriteria', 'itemalternatif', 'itemsubkriteria'), $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'alternatif_id' => 'required',
            'kriteria_id' => 'required',
            'subkriteria_id' => 'required'
        ],[
            'alternatif_id.required' => 'Alternatif tidak boleh kosong'
        ]);
        $itemuser = $request->user();
        $inputan = $request->all();
        $inputan['status'] = 'publish';
        $itemnilai = Nilai::create($inputan);
        return redirect()->route('nilai.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function show(Nilai $nilai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function edit(Nilai $nilai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nilai $nilai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $itemnilai = Nilai::findOrFail($id);//cari berdasarkan id = $id, 
        if ($itemnilai->delete()) {
            return back()->with('success', 'Data berhasil dihapus');
        } else {
            return back()->with('error', 'Data gagal dihapus');
        }
    }
}
