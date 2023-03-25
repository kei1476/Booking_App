<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user_name;
    public $email;
    public $subject;
    public $contents;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($inputs)
    {
        $this->user_name = $inputs['user_name'];
        $this->email = $inputs['email'];
        $this->subject = $inputs['subject'];
        $this->contents = $inputs['contents'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
               ->from('kei1476to@gmail.com')
               ->subject($this->subject)
               ->view('managers.mail_content')
               ->with([
                'user_name' => $this->user_name,
                'contents' => $this->contents
               ]);
    }
}
