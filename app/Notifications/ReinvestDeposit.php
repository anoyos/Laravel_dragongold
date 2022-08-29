<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Transaction;

class ReinvestDeposit extends Notification
{
    use Queueable;
    protected $transaction;
    protected $amount;
    protected $currency;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Transaction $transaction, $currency, $amount)
    {
        $this->transaction = $transaction;
        $this->currency = $currency;
        $this->amount = $amount;
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
                    ->subject('You have request to make reinvest on ' . config('app.name'))
                    ->greeting("Hello {$notifiable->username},")
                    ->line('You have created a request to reinvest your balance on ' . config('app.name'))
                    ->line('Deposit Details:')
                    ->line('Deposit type: REINVEST')
                    ->line('Created on: ' . $this->transaction->created_at->format('Y-m-d H:i'))
                    ->line('Payment System: ' . $this->currency)
                    ->line('Amount: ' . $this->amount)
                    ->line('The amount will be automatically deducted from your balance and added to your investment');
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
