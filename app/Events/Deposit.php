<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Transaction;
use App\User;
class Deposit
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $transaction;
    public $user;
    public $type;
    public $amount;
    public $currency;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Transaction $transaction, User $user, $currency, $amount, $type = 'invest')
    {
        $this->transaction = $transaction;
        $this->currency = $currency;
        $this->amount = $amount;
        $this->type = $type;
        $this->user = $user;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
