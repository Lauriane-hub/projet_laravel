<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

// Fichier: app/Notifications/StandStatusUpdated.php

class StandStatusUpdated extends Notification
{
    use Queueable;

    protected $stand;

    public function __construct(Stand $stand)
    {
        $this->stand = $stand;
    }

    public function via(object $notifiable): array
    {
        return ['mail']; // On veut envoyer cette notif par email
    }

    public function toMail(object $notifiable): MailMessage
    {
        $statusText = $this->stand->status === 'approuve' ? 'approuvé' : 'rejeté';
        $subject = "Mise à jour du statut de votre stand : " . $this->stand->name;

        return (new MailMessage)
                    ->subject($subject)
                    ->line("Bonjour {$notifiable->name},")
                    ->line("Le statut de votre stand '{$this->stand->name}' a été mis à jour.")
                    ->line("Nouveau statut : " . ucfirst($statusText))
                    ->action('Voir mon tableau de bord', url('/dashboard'))
                    ->line('Merci de votre participation !');
    }
}
