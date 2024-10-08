<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class FormCreationEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( public $data)
    {
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'New Form Registration',
            from: new Address('contact@otegeeconcepts.com', 'otegeeconcepts'),
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.formEmail',
            with:['data' => $this->data]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [
        //     Attachment::fromData(fn () => $this->data['resume'], 'resume.pdf')
        //             ->withMime('application/pdf'),
        //  Attachment::fromData(fn () => $this->data['document'], 'consentForm.pdf')
        //             ->withMime('application/pdf'),
        //  Attachment::fromData(fn () => $this->data['personal_statement'], 'personal_statement.pdf')
        //             ->withMime('application/pdf'),

        // Attachment::fromPath(public_path('images/'.$this->data['resume']))
        // ->as('resume.pdf'),
        // Attachment::fromPath(public_path('images/'.$this?->data['document']))
        // ->as('consentForm.pdf'),
        // Attachment::fromPath(public_path('images/'.$this->data['personal_statement']))
        // ->as('personal_statement.pdf'),
        // ];
        ];
    }
}
