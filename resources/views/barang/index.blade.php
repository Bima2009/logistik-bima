@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <!-- Tombol membuka modal -->
            <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalBarangMasuk">
                Tambah Barang
            </button>
            <br><br> -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Daftar Barang</h4>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>NO</th>
                                    <th>KD Barang</th>
                                    <th>Barang</th>
                                    <th>Stok</th>
                                    <th>Satuan</th>
                                </thead>
                                <tbody>
                                    @forelse($data as $barang)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $barang->kode_barang }}</td>
                                            <td>{{ $barang->nama_barang }}</td>
                                            <td>{{ $barang->stok }}</td>
                                            <td>{{ $barang->satuan }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6">Data barang kosong</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection