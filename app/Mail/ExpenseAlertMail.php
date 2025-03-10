<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ExpenseAlertMail extends Mailable
{
    use Queueable, SerializesModels;

    public $alert;
    public $expenses;
    public $percentage;

    /**
     * Create a new message instance.
     */
    public function __construct($alert, $percentage, $expenses)
    {
        $this->alert = $alert;
        $this->percentage = $percentage;
        $this->expenses = $expenses;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Expense Alert Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
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

    public function build()
    {
        $subject = $this->alert->alert_type === 'category'
            ? "Alerte: Dépenses {$this->alert->category->name}"
            : "Alerte: Dépenses totales";

        return $this->markdown('emails.expense-alert')
                    ->subject($subject);
    }
}
