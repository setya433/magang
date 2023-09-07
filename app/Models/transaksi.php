<?php

// Transaksi.php (in the App\Models namespace)
// Customer.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksis';

    // Transaksi.php
// Dalam model Transaksi
public function customer()
{
    return $this->belongsTo(Customer::class, 'id_customer');
}





public function barang()
{
    return $this->belongsTo(Barang::class, 'id_barang');
}


}


