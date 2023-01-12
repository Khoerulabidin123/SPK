<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itemkriteria = Kriteria::orderBy('slug_kriteria', 'asc')->paginate(20);
        $data = array('title' => 'Kriteria',
                    'itemkriteria' => $itemkriteria);
        return view('kriteria.index', $data)->with('no', ($request->input('page', 1) - 1) * 20);
        
        
        // return view('kriteria.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array('title' => 'Form Kriteria Baru');
        return view('kriteria.create', $data);
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
            'nama_kriteria' => 'required',
            'bobot' => 'required|numeric',
            'slug_kriteria' => 'required'
        ]);
        $itemuser = $request->user();

        $slug = $request->slug_kriteria;
        $inputan = $request->all();
        $inputan['slug_kriteria'] = $slug;
        $inputan['status'] = 'publish';
        $itemkriteria = Kriteria::create($inputan);
        return redirect()->route('kriteria.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = array($id);
        return view('kriteria.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $itemkriteria = Kriteria::findOrFail($id);
        
        $data = array('title' => 'Form Edit Kriteria',
                'itemkriteria' => $itemkriteria);
        return view('kriteria.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_kriteria' => 'required|unique:kriteria,id,'.$id,
            'slug_kriteria' => 'required',
            'bobot' => 'required|numeric' 
        ]);
        $itemkriteria = Kriteria::findOrFail($id);
        $slug = $request->slug_kriteria;
        $validasislug = Kriteria::where('id', '!=', $id)
                                ->where('slug_kriteria', $slug)
                                ->first();
        if ($validasislug) {
            return back()->with('error', 'Slug sudah ada, coba yang lain');
        } else {
            $inputan = $request->all();
            $inputan['slug'] = $slug;
            $itemkriteria->update($inputan);
            return redirect()->route('kriteria.index')->with('success', 'Data berhasil diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $itemkriteria = Kriteria::findOrFail($id);//cari berdasarkan id = $id, 
        if ($itemkriteria->delete()) {
            return back()->with('success', 'Data berhasil dihapus');
        } else {
            return back()->with('error', 'Data gagal dihapus');
        }
    }
}
