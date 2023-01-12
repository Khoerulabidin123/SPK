@extends('layouts.app')
@section('content')


<div class="container-fluid pt-4 px-4">
        

                <div class="row g-4">
                <div class="col-sm-12 col-xl-12">
                    <div class="d-flex mb-2" style="float: right;">
                               <a href="{{ route('nilai.index') }}">
                                <button class="btn btn-primary ms-2">Kembali</button>
                                </a> 
                    </div>
                </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Form Tambah data Penilaian</h6>
                            @if ($message = Session::get('error'))
                                <div class="alert alert-warning">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <form action="{{ route('nilai.store') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="alternatif_id" class="form-label">Pilih Alternatif</label>
                                    <select name="alternatif_id" id="alternatif_id" class="form-control">
                                        <option value="">Pilih</option>
                                        @foreach ($itemalternatif as $alternatif)
                                            <option value="{{ $alternatif->id }}">{{ $alternatif->nama_alternatif }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="kriteria_id" class="form-label">Pilih Kriteria</label>
                                    <select name="kriteria_id" id="kriteria_id" class="form-control">
                                        <option value="">Pilih</option>
                                        @foreach ($itemkriteria as $kriteria)
                                            <option value="{{ $kriteria->id }}">{{ $kriteria->nama_kriteria }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="subkriteria_id" class="form-label">Pilih Subkriteria (pilih salah satu)</label>
                                    <select name="subkriteria_id" id="subkriteria_id" class="form-control" size="7">
                                        <!-- <option value="">Pilih salah satu</option> -->
                                        
                                        @foreach ($itemsubkriteria as $subkriteria)
                                        @if ( $kriteria->id = $subkriteria->kriteria_id)
                                            <option value="{{ $subkriteria->id }}">{{ $subkriteria->nama_subkriteria }}</option>
                                        @endif
                                        @endforeach
                                        
                                    </select>
                                </div>
                                <div class="mb-3">
                                <button type="submit" class="btn btn-primary ms-2">Simpan</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form End -->


@endsection