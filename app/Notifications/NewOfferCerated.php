<?php

namespace App\Notifications;

use App\Models\Offer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewOfferCerated extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(protected Offer $offer)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
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
                    ->line('Good News !!! You have Got a New Offer ')
                    ->line('Related Fault : '. $this->offer->fault)
                    ->line('Center Location : '. $this->offer->location)
                    ->line('Center Owner Idea for your fault : '. $this->offer->discription)
                    ->line('Budght : '. $this->offer->cost)
                    ->line('Center Mail Address : '. $this->offer->email)
                    ->line('Center Mobile Number : '. $this->offer->mobile)
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our Kandy Vehicle System !');
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
          // 'jobId' => $this->Offer->id,
           //'vehicle' => $this->Offer->fault,
        ];
    }
}
