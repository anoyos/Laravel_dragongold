<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Transaction;
class DepositIncomplete extends Notification
{
    use Queueable;
    protected $transaction;
    protected $paid;
    protected $initial;
    protected $currency;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Transaction $transaction, $paid, $currency)
    {
        $this->transaction =  $transaction;
        $this->initial = $transaction->amount;
        $this->paid = $paid;
        $this->currency = $currency;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Important - Partial Payment Received on ' . config('app.name'))
            ->greeting("Hello {$notifiable->username},")
            ->line('You paid the sum of ' . $this->paid . $this->currency . ' instead of ' . 
                    $this->initial . $this->currency . ' specified in your deposit request.')
            ->line('Your deposit has been updated to the new amount')
            ->line('Deposit Details:')
            ->line('Created on: ' . $this->transaction->created_at->format('Y-m-d H:i'))
            ->line('Payment System: ' . $this->currency)
            ->line('Amount: ' . $this->paid)
            ->line('You can track details of your deposit in your personal account.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
