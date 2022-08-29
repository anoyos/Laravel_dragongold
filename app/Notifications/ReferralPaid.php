<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Transaction;

class ReferralPaid extends Notification
{
    use Queueable;
    protected $transaction;
    protected $downlink;
    protected $currency;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Transaction $transaction, $downlink, $currency )
    {
        $this->transaction = $transaction;
        $this->currency = $currency;
        $this->downlink = $downlink;
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
                        ->subject('You have received a referral bonus on ' . config('app.name'))
                        ->greeting("Hello {$notifiable->username},")
                        ->line('You have successfully received a referral bonus in ' . config('app.name'))
                        ->line('Referral Bonus Details:')
                        ->line('Created on: ' . $this->transaction->created_at->format('Y-m-d H:i'))
                        ->line('From: ' . $this->downlink)
                        ->line('Payment System: ' . $this->currency)
                        ->line('Amount: ' . $this->transaction->amount)
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
