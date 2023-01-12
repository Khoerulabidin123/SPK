@extends('layouts.app')
@section('content')


<div class="container-fluid pt-4 px-4">
        

                <div class="row g-4">
                <div class="col-sm-12 col-xl-12">
                    <div class="d-flex mb-2" style="float: right;">
                               <a href="{{ route('alternatif.index') }}">
                                <button class="btn btn-primary ms-2">Kembali</button>
                                </a> 
                    </div>
                </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Form Tambah data alternatif</h6>
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
                            <form action="{{ route('alternatif.store') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama_alternatif" class="form-label">Nama alternatif</label>
                                    <input type="text" name="nama_alternatif" class="form-control" id="nama_alternatif" placeholder="Masukkan alternatif">
                                </div>
                                <div class="mb-3">
                                    <label for="kode_alternatif" class="form-label">Kode alternatif</label>
                                    <input type="text" name="kode_alternatif" class="form-control" id="kode_alternatif" placeholder="Masukkan kode alternatif">
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