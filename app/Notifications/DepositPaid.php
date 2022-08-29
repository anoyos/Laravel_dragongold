<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Deposit;

class DepositPaid extends Notification {

    use Queueable;

    protected $deposit;
    protected $amount;
    protected $currency;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Deposit $deposit, $currency, $amount) {
        $this->deposit = $deposit;
        $this->currency = $currency;
        $this->amount = $amount;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable) {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable) {
        return (new MailMessage)
                        ->subject('Your deposit has been successfully paid on ' . config('app.name'))
                        ->greeting("Hello {$notifiable->username},")
                        ->line('You have successfully paid a new deposit in ' . config('app.name'))
                        ->line('Deposit Details:')
                        ->line('Created on: ' . $this->deposit->created_at->format('Y-m-d H:i'))
                        ->line('Payment System: ' . $this->currency)
                        ->line('Amount: ' . $this->amount)
                        ->line('You can track details of your deposit in your personal account.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable) {
        return [
                //
        ];
    }

}
