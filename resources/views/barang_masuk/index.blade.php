@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <!-- Tombol membuka modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalBarangMasuk">
                Tambah Barang Masuk
            </button>
            <br><br>

            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Daftar Barang Masuk</h4>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>NO</th>
                                    <th>KD Barang</th>
                                    <th>Barang</th>
                                    <th>Quantity</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Asal Barang</th>
                                </thead>
                                <tbody>
                                    @forelse($data as $barangMasuk)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $barangMasuk->kd_barang }}</td>
                                            <td>{{ $barangMasuk->nama_barang }}</td>
                                            <td>{{ $barangMasuk->quantity }}</td>
                                            <td>{{ $barangMasuk->tanggal_masuk }}</td>
                                            <td>{{ $barangMasuk->asal_barang }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6">Data barang masuk kosong</td>
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

    <!-- Modal Form Input Barang Masuk -->
    <div class="modal fade" id="modalBarangMasuk" tabindex="-1" aria-labelledby="modalBarangMasukLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('barang_masuk.store') }}" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalBarangMasukLabel">Input Barang Masuk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="kd_barang" class="form-label">Nama Barang</label>
                        <select name="id_barang" class="form-select">
                            <option value="">--PILIH BARANG--</option>
                            @foreach ($barang as $dataBarang)
                                <option value="{{ $dataBarang->id_barang }}">{{ $dataBarang->kode_barang }} - {{ $dataBarang->nama_barang }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" name="quantity" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                        <input type="date" name="tanggal_masuk" class="form-control" min="1" required>
                    </div>

                    <div class="mb-3">
                        <label for="asal_barang" class="form-label">Asal Barang</label>
                        <input type="text" name="asal_barang" class="form-control" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
@endsection