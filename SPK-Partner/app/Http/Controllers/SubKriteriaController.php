<?php

namespace App\Http\Controllers;

use App\Models\SubKriteria;
use App\Models\Kriteria;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;

class SubKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $itemsubkriteria = Subkriteria::orderBy('kriteria_id', 'asc')->paginate(20);
        $itemsubkriteria = Subkriteria::with(relations:'kriteria')->orderBy('kriteria_id', 'asc')->orderBy('nilai', 'desc')->paginate(50);
        $data = array('title' => 'SubKriteria',
                    'itemsubkriteria' => $itemsubkriteria);
        return view('subkriteria.index', $data)->with('no', ($request->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array('title' => 'Form Sub-Kriteria Baru');
        $itemkriteria = Kriteria::all();
        return view('subkriteria.create', compact('itemkriteria'), $data);
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
            'nama_subkriteria' => 'required',
            'nilai' => 'required|numeric',
            'kriteria_id' => 'required'
        ],[
            'kriteria_id.required' => 'Kriteria tidak boleh kosong'
        ]);
        $itemuser = $request->user();
        $inputan = $request->all();
        $inputan['status'] = 'publish';
        $itemsubkriteria = SubKriteria::create($inputan);
        return redirect()->route('subkriteria.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubKriteria  $subKriteria
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = array($id);
        return view('subkriteria.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubKriteria  $subKriteria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $itemsubkriteria = SubKriteria::findOrFail($id);
        $itemkriteria = Kriteria::all();
        
        $data = array('title' => 'Form Edit Sub-Kriteria',
                'itemsubkriteria' => $itemsubkriteria);
        return view('subkriteria.edit', compact('itemkriteria'), $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubKriteria  $subKriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, SubKriteria $subKriteria)
    {
        $this->validate($request, [
            'nama_subkriteria' => 'required|unique:subkriteria,id,'.$id,
            'nilai' => 'required|numeric',
            'kriteria_id' => 'required'
        ]);
        $itemsubkriteria = SubKriteria::findOrFail($id);
        $slug = $request->nama_subkriteria;
        $validasislug = SubKriteria::where('id', '!=', $id)
                                ->where('created_at', $slug)
                                ->first();
        if ($validasislug) {
            return back()->with('error', 'Slug sudah ada, coba yang lain');
        } else {
            $inputan = $request->all();
            $inputan['slug'] = $slug;
            $itemsubkriteria->update($inputan);
            return redirect()->route('subkriteria.index')->with('success', 'Data berhasil diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubKriteria  $subKriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubKriteria $subKriteria, $id)
    {
        $itemsubkriteria = SubKriteria::findOrFail($id);//cari berdasarkan id = $id, 
        if ($itemsubkriteria->delete()) {
            return back()->with('success', 'Data berhasil dihapus');
        } else {
            return back()->with('error', 'Data gagal dihapus');
        }
    }
}
