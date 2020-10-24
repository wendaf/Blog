<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $input)
    {
        $this->input = $input;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('charlesbeasse1@gmail.com', 'Mailtrap')
        ->subject('Mailtrap Confirmation')
        ->markdown('mails.contact')
        ->with([
            'name' => $this->input["name"],
            'email' => $this->input["email"],
            'phone' => $this->input["phone"],
            'subject' => $this->input["subject"]
        ]);
    }
}
