<?php

namespace App\Notifications;
use Illuminate\Bus\Queueable;

use Illuminate\Notifications\Notification;

use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Notifications\Messages\MailMessage;

class Reserved extends Notification implements ShouldQueue

{

   use Queueable;

   protected $my_notification; 

   public function __construct($msg)

   {

       $this->my_notification = $msg; 

   }

   public function via($notifiable)

   {

       return ['mail'];

   }

   public function toMail($notifiable)

   {

       return (new MailMessage)

                   ->line('Welcome '.$this->user->name)

                   ->action('Welcome to our system', url('/client'))

                   ->line('Thank you for using our website!');

   }

   public function toArray($notifiable)

   {

       return [

           //

       ];

   }

}