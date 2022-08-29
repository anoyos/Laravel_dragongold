<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Transaction;
use App\User;

class AdminDepositComplete extends Notification {

    use Queueable;

    protected $transaction;
    protected $user;
    protected $currency;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Transaction $transaction) {
        $this->transaction = $transaction;
        $this->user = $transaction->user;
        $this->currency = $transaction->currency->symbol;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable) {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable) {
        return (new MailMessage)
                        ->subject('Successful Deposit Notification')
                        ->greeting("Hello {$notifiable->username},")
                        ->line($this->user->name . ' have made a succussful deposit on ' . config('app.name'))
                        ->line('Deposit Details:')
                        ->line('Created on: ' . $this->transaction->created_at->format('Y-m-d H:i'))
                        ->line('Payment System: ' . $this->currency)
                        ->line('Amount: ' . $this->transaction->amount)
//                      ->action('View Transaction', route('admin.transactions'));
                        ->action('View Transaction', '#');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable) {
        return [
            'transaction' => $this->transaction->id,
            'type' => 'deposit',
            'message' => "Deposit of {$this->transaction->amount} {$this->currency} made by {$this->user->name} is completed"
        ];
    }

}
