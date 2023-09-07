<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UpdateStokBarangEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $transaksiData;

    public function __construct($transaksiData)
    {
        $this->transaksiData = $transaksiData;
    }
}

