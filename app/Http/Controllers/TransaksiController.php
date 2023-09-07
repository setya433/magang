<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\transaksi;
use App\Models\customer;
use App\Events\UpdateStokBarangEvent;


class TransaksiController extends Controller
{

        public function index()
        {
            $transaksis = DB::table('transaksi_detail')
        ->select('transaksi_detail.*', 'barang.harga as harga', 'barang.nama_barang as nama_barang', 'customer.nama_customer as nama_customer')
        ->leftJoin('customer', 'transaksi_detail.id_customer', '=', 'customer.id_customer')
        ->leftJoin('barang', 'transaksi_detail.id_barang', '=', 'barang.id_barang')
        ->get();
    	    return view('transaksi.index',['transaksis' => $transaksis]);
        }

        public function total()
        {
            $harga = DB::table('transaksi_detail.harga')->get();
            $jumlah = DB::table('transaksi_detail.qty')->get();
            $total_harga = $harga * $jumlah;

            return view('transaksi.index',['total_harga' => $total_harga]);
        }

        public function tambahtransaksi()
        {

            // memanggil view tambah
            return view('/transaksi/tambahtransaksi');

        }

        public function create()
        {
            $barang = DB::table('barang')
                    ->where('stok', '>', '0') // Anda dapat mengganti 'kondisi' dan 'baik' dengan kriteria yang sesuai dengan kebutuhan Anda
                    ->get();

            $customer = DB::table('customer')->get();

            $qty = DB::table('transaksi_detail')->get();

            // passing data barang yang didapat ke view edit.blade.php
            return view('transaksi.tambahtransaksi', ['barang' => $barang, 'customer' => $customer,'qty' => $qty]);
        }


        public function store(Request $request)
        {
            $barang = DB::table('barang')
                ->where('id_barang', $request->id_barang)
                ->first();

            if (!$barang) {
                return redirect('transaksi/tambahtransaksi')->with('error', 'Barang tidak ditemukan.');
            }

            $qtyRequested = $request->qty;
            $qtyAvailable = $barang->stok;

            if ($qtyAvailable < $qtyRequested) {
                return redirect()->route('transaksi.tambahtransaksi')->with('error', 'Stok barang tidak cukup untuk membuat transaksi.');
            }else{
                DB::table('transaksi_detail')->insert([
                'id_customer' => $request-> id_customer,
                'id_barang' => $request->id_barang,
                'qty' => $request->qty,
                ]);

                return redirect()->route('transaksi.index')->with('success', 'Stok barang berhasil diperbarui.');
            }







        }

    public function edittransaksi($id){
        $barang = DB::table('barang')
                    ->where('stok', '>', '1') // Anda dapat mengganti 'kondisi' dan 'baik' dengan kriteria yang sesuai dengan kebutuhan Anda
                    ->pluck('nama_barang','id_barang');


            //$customer = DB::table('customer')->get();
            $transaksi = DB::table('transaksi_detail')->where('id',$id)->get();

            // print_r($transaksi->id);
            // die;

            $transaksiDetail = DB::table('transaksi_detail')
                ->select('id_customer','id_barang')
                ->where('id', $id)
                ->first();

            $customer = DB::table('customer')
                ->pluck('nama_customer', 'id_customer');

            $qty = DB::table('transaksi_detail')->where('id',$id)->get();



        return view('transaksi.edittransaksi',['barang' => $barang,'customer' => $customer, 'qty' => $qty, 'transaksi' => $transaksi, 'transaksiDetail' => $transaksiDetail]);
    }

        public function update(Request $request)
    {
        /* DB::table('transaksi_detail')
        ->where('id', '=', $request->id)
        ->update([
            'id_customer' => $request->id_customer,
            'id_barang' => $request->id_barang,
            'qty' => $request->qty,


    ]); */
    $barang = DB::table('barang')
    ->where('id_barang', $request->id_barang)
    ->first();

            if (!$barang) {
                return redirect('transaksi/editrtansaksi')->with('error', 'Barang tidak ditemukan.');
            }

            $qtyRequested = $request->qty;
            $qtyAvailable = $barang->stok;

            if ($qtyAvailable < $qtyRequested) {
                return redirect()->route('transaksi.edittransaksi', ['id' => $request->id])->with('error', 'Stok barang tidak cukup untuk membuat transaksi.');


            }else{
                DB::table('transaksi_detail')
            ->where('id', '=', $request->id)
            ->update([
            'id_customer' => $request->id_customer,
            'id_barang' => $request->id_barang,
            'qty' => $request->qty,


            ]);

                return redirect()->route('transaksi.index')->with('success', 'Stok barang berhasil diperbarui.');
            }








        /* DB::table('barang')
        ->join('transaksi_detail', 'barang.id_barang', '=', 'transaksi_detail.id_barang')
        ->select('barang.id_barang', DB::raw('SUM(transaksi_detail.qty) as total_qty'))
        ->groupBy('barang.id_barang')
        ->get()
        ->each(function ($item) {
            DB::table('barang')
                ->where('id_barang', $item->id_barang)
                ->update(['stok' => DB::raw('stok - ' . $item->total_qty)]);
        });
 */


        return redirect('/transaksi');
    }

    // method untuk hapus data customer
    public function delete($id)
    {
        // Temukan detail transaksi yang akan dihapus
        $transaksiDetail = DB::table('transaksi_detail')->where('id', $id)->first();

        if (!$transaksiDetail) {
            return redirect()->back()->with('error', 'Detail transaksi tidak ditemukan.');
        }

        // Simpan data id_barang dan qty_deleted sebelum menghapus record
        $id_barang = $transaksiDetail->id_barang;
        $qty_deleted = $transaksiDetail->qty;

        // Mulai transaksi database
        DB::beginTransaction();

        try {
            // Hapus detail transaksi
            DB::table('transaksi_detail')->where('id', $id)->delete();

            // Update stok barang sesuai dengan qty yang dihapus
            $barang = DB::table('barang')->where('id_barang', $id_barang)->first();

            if (!$barang) {
                throw new \Exception('Barang tidak ditemukan.');
            }

            $new_stok = $barang->stok + $qty_deleted;

            // Update stok barang
            DB::table('barang')->where('id_barang', $id_barang)->update(['stok' => $new_stok]);

            // Commit transaksi database
            DB::commit();

            return redirect()->back()->with('success', 'Detail transaksi berhasil dihapus dan stok barang diperbarui.');
        } catch (\Exception $e) {
            // Rollback transaksi database jika terjadi kesalahan
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage());
        }
    }






}
