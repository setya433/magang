<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BarangController extends Controller
{
    public function index()
    {
    	// mengambil data dari table barang
    	$barang = DB::table('barang')->get();

    	// mengirim data barang ke view index
    	return view('barang.index',['barang' => $barang]);

    }

    // method untuk menampilkan view form tambah barang
    public function tambahbarang()
    {

        // memanggil view tambah
        return view('/barang/tambahbarang');

    }

    // method untuk insert data ke table barang
    public function store(Request $request)
    {
	// insert data ke table barang
	DB::table('barang')->insert([
		'nama_barang' => $request->nama_barang,
		'harga' => $request->harga,
		'stok' => $request->stok,   
		]);
	// alihkan halaman ke halaman barang
	return redirect('/barang');

    }

    // method untuk edit data barang
    public function editbarang($id)
    {
        // mengambil data barang berdasarkan id yang dipilih
        $barang = DB::table('barang')->where('id_barang',$id)->get();
        // passing data barang yang didapat ke view edit.blade.php
        return view('barang.editbarang',['barang' => $barang]);

    }

    // update data barang
    public function update(Request $request)
    {
        // update data barang
        DB::table('barang')->where('id_barang',$request->id)->update([
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);
        // alihkan halaman ke halaman barang
        return redirect('/barang');
    }

    // method untuk hapus data barang
        public function delete($id)
        {
            // menghapus data barang berdasarkan id yang dipilih
            DB::table('barang')->where('id_barang',$id)->delete();

            // alihkan halaman ke halaman barang
            return redirect('/barang');
        }

}
