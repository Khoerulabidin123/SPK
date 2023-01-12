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
                            <h6 class="mb-4">Form Edit data alternatif</h6>
                            @if(count($errors) > 0)
                            @foreach($errors->all() as $error)
                                <div class="alert alert-warning">{{ $error }}</div>
                            @endforeach
                            @endif
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
                            <form action="{{ route('alternatif.update', $itemalternatif->id) }}" method="post">
                            {{ method_field('patch') }}    
                            @csrf
                                <div class="mb-3">
                                    <label for="nama_alternatif" class="form-label">Nama alternatif</label>
                                    <input type="text" name="nama_alternatif" id="nama_alternatif" value={{ $itemalternatif->nama_alternatif }} class="form-control">
                                </div><div class="mb-3">
                                    <label for="kode_alternatif" class="form-label">Kode alternatif</label>
                                    <input type="text" name="kode_alternatif" id="kode_alternatif" value={{ $itemalternatif->kode_alternatif }} class="form-control">
                                </div>
                                <div class="mb-3">
                                <button type="submit" class="btn btn-primary ms-2">Update</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form End -->


@endsection