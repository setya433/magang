<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function customerindex()
    {
        // mengambil data dari table customer
    	$customer = DB::table('customer')->get();

    	// mengirim data customer ke view index
    	return view('customer.customerindex',['customer' => $customer]);
    }

    // method untuk menampilkan view form tambah customer
    public function tambahcustomer()
    {

        // memanggil view tambah
        return view('/customer/tambahcustomer');

    }

    // method untuk insert data ke table customer
    public function store(Request $request)
    {
	// insert data ke table customer
	DB::table('customer')->insert([
		'nama_customer' => $request->nama_customer,
		]);
	// alihkan halaman ke halaman customer
	return redirect('/customer');

    }

    // method untuk edit data customer
    public function editcustomer($id)
    {
        // mengambil data customer berdasarkan id yang dipilih
        $customer = DB::table('customer')->where('id_customer',$id)->get();
        // passing data customer yang didapat ke view edit.blade.php
        return view('customer.editcustomer',['customer' => $customer]);

    }

    // update data customer
    public function update(Request $request)
    {
        // update data customer
        DB::table('customer')->where('id_customer',$request->id)->update([
            'nama_customer' => $request->nama_customer,
        ]);
        // alihkan halaman ke halaman customer
        return redirect('/customer');
    }

    // method untuk hapus data customer
        public function delete($id)
        {
            // menghapus data customer berdasarkan id yang dipilih
            DB::table('customer')->where('id_customer',$id)->delete();

            // alihkan halaman ke halaman customer
            return redirect('/customer');
        }

}


