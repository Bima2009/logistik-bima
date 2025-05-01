<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangMasukController extends Controller
{
    public function index()
    {
        $barang = DB::table('barang')->get();
        
        $data = DB::table('barang_masuk' )
            ->join('barang', 'barang.id_barang', 'barang_masuk.id_barang')
            ->select(
                'barang_masuk.*',
                'barang.kode_barang as kd_barang',
                'barang.nama_barang as nama_barang',
            )
            ->get();

        return view('barang_masuk.index', compact('data', 'barang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_barang'    => 'required',
            'quantity'     => 'required|integer|min:1',
            'tanggal_masuk' => 'required',
            'asal_barang'  => 'required|string|max:255',
        ]);

        // Ambil data barang berdasarkan kode_barang
        $barang = DB::table('barang')->where('id_barang', $request->id_barang)->first();

        if (!$barang) {
            return back()->with('error', 'Barang tidak ditemukan.');
        }

        // Tambahkan stok (pakai update manual)
        DB::table(table: 'barang')->where('id_barang', $request->id_barang)->update([
            'stok' => $barang->stok + $request->quantity
        ]);

        // Simpan data barang masuk
        DB::table('barang_masuk')->insert([
            'id_barang'         => $barang->id_barang,
            'quantity'          => $request->quantity,
            'tanggal_masuk'     => $request->tanggal_masuk,
            'asal_barang'       => $request->asal_barang,
            'created_at'        => now(),
        ]);

        return redirect()->route('barang_masuk.index')->with('success', 'Barang masuk berhasil ditambahkan.');
    }
}
