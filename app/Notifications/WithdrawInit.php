<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class WithdrawInit extends Notification
{
    use Queueable;

    protected $date;
    protected $amount;
    protected $currency;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($date, $currency, $amount)
    {
        $this->date = $date;
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
                    ->subject('You have request to make a new withdrawal on ' . config('app.name'))
                    ->greeting("Hello {$notifiable->username},")
                    ->line('You have created a request for making a new withdrawal on ' . config('app.name'))
                    ->line('Withdraw Details:')
                    ->line('    Created on: ' . $this->date->format('Y-m-d H:i'))
                    ->line('    Payment System: ' . $this->currency)
                    ->line('    Amount: ' . $this->amount)
                    ->line('If you do not make this withdraw, please notify us within an hour.');
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
