<?php

namespace App\Events;

use App\Models\Delivery;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class DeliveryLocationUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $lat;
    public $lng;

    protected $delivery;
    /**
     * Create a new event instance.
     */
    public function __construct(Delivery $delivery,$lat, $lng)
    {
        $this->delivery = $delivery;
        $this->lat = $lat;
        $this->lng = $lng;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('deliveries.'.$this->delivery->order_id),
        ];
    }
    public function broadcastWith()
    {
        return [
            'lat' => $this->lat,
            'lng' => $this->lng,

        ];
    }

    public function broadcastAs()
    {
        return 'map-location';
    }
}
