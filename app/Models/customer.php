<?php

// Customer.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Return_;

class Customer extends Model
{
    protected $table = 'customer';

    public function transaksis()
{
    return $this->hasMany(Transaksi::class, 'id_customer');
}


}

