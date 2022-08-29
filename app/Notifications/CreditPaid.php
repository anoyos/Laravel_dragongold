<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use App\Credit;
class CreditPaid extends Notification
{
    use Queueable;

    protected $credit;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Credit $credit)
    {
        $this->credit = $credit;
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
                        ->subject('Deposit profit received on ' . config('app.name'))
                        ->greeting("Hello {$notifiable->username},")
                        ->line('You received a daily charge on your deposit in ' . config('app.name'))
                        ->line('Profit Detail:')
                        ->line('Created on: ' . $this->credit->created_at->format('Y-m-d H:i'))
                        ->line('Payment System: ' . $this->credit->transaction->currency->name)
                        ->line('Amount: ' . $this->credit->transaction->amount)
                        ->line('You can order a withdrawal of funds in your personal account.');
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
