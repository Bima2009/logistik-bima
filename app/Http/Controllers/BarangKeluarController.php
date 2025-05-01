<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangKeluarController extends Controller
{         
    public function index()
    {
        $barang = DB::table('barang')->get();

        $data = DB::table('barang_keluar' )
            ->join('barang', 'barang.id_barang', 'barang_keluar.id_barang')
            ->select(
                'barang_keluar.*',
                'barang.kode_barang as kd_barang',
                'barang.nama_barang as nama_barang',
            )
            ->get();

        return view('barang_keluar.index', compact('data', 'barang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_barang'    => 'required',
            'quantity'     => 'required|integer|min:1',
            'tanggal_keluar' => 'required',
            'tujuan'  => 'required|string|max:255',
        ]);

        // Ambil data barang berdasarkan kode_barang
        $barang = DB::table('barang')->where('id_barang', $request->id_barang)->first();

        if (!$barang) {
            return back()->with('error', 'Barang tidak ditemukan.');
        }

        // Tambahkan stok (pakai update manual)
        DB::table(table: 'barang')->where('id_barang', $request->id_barang)->update([
            'stok' => $barang->stok - $request->quantity,
            'updated_at' => now(),
        ]);

        // Simpan data barang masuk
        DB::table('barang_keluar')->insert([
            'id_barang'         => $barang->id_barang,
            'quantity'          => $request->quantity,
            'tanggal_keluar'    => $request->tanggal_keluar,
            'tujuan'            => $request->tujuan,
            'created_at'        => now(),
        ]);

        return redirect()->route('barang_keluar.index')->with('success', 'Barang masuk berhasil ditambahkan.');
    }
}
