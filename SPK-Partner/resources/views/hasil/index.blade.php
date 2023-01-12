@extends('layouts.app')
@section('content')


<div class="container-fluid pt-4 px-4">
                <div class="row g-4">

                <div class="col-sm-12 col-xl-12">
                    <div class="d-flex mb-2" style="float: left;">
                        <h2>Hasil</h2>
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
                            <h6 class="mb-4">Hasil Perhitungan</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Nama Alternatif</th>
                                            <th scope="col">Nilai akhir</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                        <tr>
                                            <td>
                                                1
                                            </td>
                                            <td>
                                                Toko Putra
                                            </td>
                                            <td>
                                                90.5
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                2
                                            </td>
                                            <td>
                                                Toko Bu Endang
                                            </td>
                                            <td>
                                                89.5
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                3
                                            </td>
                                            <td>
                                                Toko Amanda
                                            </td>
                                            <td>
                                                82.5
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                4
                                            </td>
                                            <td>
                                                Toko Wahyu
                                            </td>
                                            <td>
                                                80
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                5
                                            </td>
                                            <td>
                                                Toko Berkah
                                            </td>
                                            <td>
                                                78
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                6
                                            </td>
                                            <td>
                                                Muda Karya
                                            </td>
                                            <td>
                                                74
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                7
                                            </td>
                                            <td>
                                                Toko Semar
                                            </td>
                                            <td>
                                                62.5
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <!-- Table End -->
            @endsection