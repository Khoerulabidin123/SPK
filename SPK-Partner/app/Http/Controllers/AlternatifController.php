<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itemalternatif = Alternatif::orderBy('kode_alternatif', 'asc')->paginate(20);
        $data = array('title' => 'Alternatif',
                    'itemalternatif' => $itemalternatif);
        return view('alternatif.index', $data)->with('no', ($request->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array('title' => 'Form Alternatif Baru');
        return view('alternatif.create', $data);
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
            'nama_alternatif' => 'required',
            'kode_alternatif' => 'required'
        ]);
        $itemuser = $request->user();

        $slug = $request->slug_alternatif;
        $inputan = $request->all();
        $inputan['status'] = 'publish';
        $itemalternatif = Alternatif::create($inputan);
        return redirect()->route('alternatif.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = array($id);
        return view('alternatif.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $itemalternatif = Alternatif::findOrFail($id);
        
        $data = array('title' => 'Form Edit Alternatif',
                'itemalternatif' => $itemalternatif);
        return view('alternatif.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_alternatif' => 'required|unique:alternatif,id,'.$id,
            'kode_alternatif' => 'required'
        ]);
        $itemalternatif = Alternatif::findOrFail($id);
        $slug = $request->slug_alternatif;
        $validasislug = Alternatif::where('id', '!=', $id)
                                ->where('kode_alternatif', $slug)
                                ->first();
        if ($validasislug) {
            return back()->with('error', 'Alternatif sudah ada, coba yang lain');
        } else {
            $inputan = $request->all();
            $inputan['slug'] = $slug;
            $itemalternatif->update($inputan);
            return redirect()->route('alternatif.index')->with('success', 'Data berhasil diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $itemalternatif = Alternatif::findOrFail($id);//cari berdasarkan id = $id, 
        if ($itemalternatif->delete()) {
            return back()->with('success', 'Data berhasil dihapus');
        } else {
            return back()->with('error', 'Data gagal dihapus');
        }
    }
}
