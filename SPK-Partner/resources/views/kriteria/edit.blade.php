@extends('layouts.app')
@section('content')


<div class="container-fluid pt-4 px-4">
        

                <div class="row g-4">
                <div class="col-sm-12 col-xl-12">
                    <div class="d-flex mb-2" style="float: right;">
                               <a href="{{ route('kriteria.index') }}">
                                <button class="btn btn-primary ms-2">Kembali</button>
                                </a> 
                    </div>
                </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Form Edit data Kriteria</h6>
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
                            <form action="{{ route('kriteria.update', $itemkriteria->id) }}" method="post">
                            {{ method_field('patch') }}    
                            @csrf
                                <div class="mb-3">
                                    <label for="nama_kriteria" class="form-label">Nama kriteria</label>
                                    <input type="text" name="nama_kriteria" id="nama_kriteria" value={{ $itemkriteria->nama_kriteria }} class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="bobot" class="form-label">Bobot (%)</label>
                                    <input type="text" name="bobot" class="form-control" id="bobot" value={{ $itemkriteria->bobot }}>
                                </div>
                                <div class="mb-3">
                                    <label for="slug_kriteria" class="form-label">Kode Kriteria</label>
                                    <input type="text" name="slug_kriteria" class="form-control" id="slug_kriteria" value={{ $itemkriteria->slug_kriteria }}>
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