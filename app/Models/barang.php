<?php

// Customer.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    

    // Dalam model Barang
public function transaksis()
{
    return $this->hasMany(Transaksi::class);
}


}

