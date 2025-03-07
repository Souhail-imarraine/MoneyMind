<?php

namespace App\Mail;

use App\Models\SavingsGoal;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class GoalAchievedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $goal;

    /**
     * Create a new message instance.
     */
    public function __construct(SavingsGoal $goal)
    {
        $this->goal = $goal;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Félicitations! Objectif d\'épargne atteint 🎉',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.goal-achieved',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
