<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class OrderCreatedNotification extends Notification
{
    use Queueable;

    protected $order;
    /**
     * Create a new notification instance.
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array // notifiable user model
    {
        return ['mail','database','broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage // toBroadCast //toDataBase
    {
        $address  = $this->order->addresses->first();
        return (new MailMessage)
            ->subject("New Order #{$this->order->number}")
            ->from('no-replay@store.com', 'E-commerce Store')
            ->line("A new order (#{$this->order->number}) created by {$address->name} from {$address->country}")
            ->action('View Order', url('/dashboard'))
            ->line('Thank you for using our application!');
    }

    public function toDatabase(object $notifiable) // toBroadCast //toDatabase
    {
        $address  = $this->order->addresses->first();
        return [
            'body' => "A new order (#{$this->order->number}) created by {$address->name} from {$address->country}",
            'icon' => 'fas fa-file',
            'url' => url('/dashboard'),
            'order_id' => $this->order->id
        ];
    }
    public function toBroadcast(object $notifiable) // toBroadCast //toDatabase
    {
        $address  = $this->order->addresses->first();

        return [
            'body' => "A new order (#{$this->order->number}) created by {$address->name} from {$address->country}",
            'icon' => 'fas fa-file',
            'url' => url('/dashboard'),
            'order_id' => $this->order->id
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
