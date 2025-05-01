@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <!-- Tombol membuka modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalBarangKeluar">
                Tambah Barang Keluar
            </button>
            <br><br>

            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Daftar Barang Keluar</h4>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>KD Barang</th>
                                        <th>Barang</th>
                                        <th>Quantity</th>
                                        <th>Tanggal Keluar</th>
                                        <th>Tujuan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($data as $barangKeluar)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $barangKeluar->kd_barang }}</td>
                                            <td>{{ $barangKeluar->nama_barang }}</td>
                                            <td>{{ $barangKeluar->quantity }}</td>
                                            <td>{{ $barangKeluar->tanggal_keluar }}</td>
                                            <td>{{ $barangKeluar->tujuan }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Data barang keluar kosong</td>
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

    <!-- Modal Form Input Barang Keluar -->
    <div class="modal fade" id="modalBarangKeluar" tabindex="-1" aria-labelledby="modalBarangMasukLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('barang_keluar.store') }}" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalBarangMasukLabel">Input Barang Keluar</h5>
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
                        <label for="tanggal_keluar" class="form-label">Tanggal Keluar</label>
                        <input type="date" name="tanggal_keluar" class="form-control" min="1" required>
                    </div>

                    <div class="mb-3">
                        <label for="tujuan" class="form-label">Tujuan</label>
                        <input type="text" name="tujuan" class="form-control" required>
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