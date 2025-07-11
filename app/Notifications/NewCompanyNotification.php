<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Company;
class NewCompanyNotification extends Notification
{
    use Queueable;

    /**
     * The company instance.
     *
     * @var \App\Models\Company
     */
    protected $company;

    /**
     * Create a new notification instance.
     */
    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Company Created')
            ->greeting('Hello!')
            ->line("A new company named **{$this->company->name}** was just added.")
            ->line("Email: {$this->company->email}")
            ->line("Website: {$this->company->website}")
            ->action('View Company', url('/companies/' . $this->company->id))
            ->line('Thanks for using Creativa CRM!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
