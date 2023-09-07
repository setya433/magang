<?php

namespace App\Listeners;

use App\Events\UpdateStokBarangEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class UpdateStokBarangListener
{
    public function handle(UpdateStokBarangEvent $event)
    {
        $transaksiData = $event->transaksiData;

        DB::table('barang')
    ->join('transaksi_detail', 'barang.id_barang', '=', 'transaksi_detail.id_barang')
    ->select('barang.id_barang', DB::raw('SUM(transaksi_detail.qty) as total_qty'))
    ->groupBy('barang.id_barang')
    ->get()
    ->each(function ($item) {
        DB::table('barang')
            ->where('id_barang', $item->id_barang)
            ->update(['stok' => DB::raw('stok - ' . $item->total_qty)]);
    });

    }
}
