
@extends('layouts.app')
@section('content')


<div class="container-fluid pt-4 px-4">
                <div class="row g-4">

                <div class="col-sm-12 col-xl-12">
                    <div class="d-flex mb-2" style="float: left;">
                        <h2>Kriteria</h2>
                    </div>
                    <div class="d-flex mb-2" style="float: right;">
                               <a href="{{ route('kriteria.create') }}">
                                <button class="btn btn-success ms-2">Tambah</button>
                                </a> 
                    </div>
                </div>

                <div class="card-body">
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
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Data Kriteria</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Nama Kriteria</th>
                                            <th scope="col">Kode Kriteria</th>
                                            <th scope="col">Bobot</th>
                                            <th scope="col">action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($itemkriteria as $kriteria)
                                        <tr>
                                            <td>
                                                {{ ++$no }}
                                            </td>
                                            <td>
                                                {{ $kriteria->nama_kriteria }}
                                            </td>
                                            <td>
                                                {{ $kriteria->slug_kriteria }}
                                            </td>
                                            <td>
                                                {{ $kriteria->bobot }}
                                            </td>
                                            <td>
                                                <a href="{{ route('kriteria.edit', $kriteria->id) }}" class="btn btn-sm btn-primary mr-2 mb-2">Edit</a>
                                                <form action="{{ route('kriteria.destroy', $kriteria->id) }}" method="post" style="display:inline;">
                                                @csrf
                                                {{ method_field('delete') }}
                                                <button type="submit" class="btn btn-sm btn-danger mb-2">
                                                    Hapus
                                                </button>                    
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $itemkriteria->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <!-- Table End -->
            @endsection

