<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user_name;
    public $shop_name;
    public $email;
    public $book_date;
    public $book_time;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($book_time)
    {
        $this->user_name = $book_time->user_name;
        $this->shop_name = $book_time->shop_name;
        $this->email = $book_time->email;
        $this->book_date = $book_time->book_date;
        $this->book_time = $book_time->book_time;
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
                    ->view('managers.notify_mail')
                    ->subject('予約のお知らせ')
                    ->with([
                        'user_name' => $this->user_name,
                        'shop_name' => $this->shop_name,
                        'book_date' => $this->book_date,
                        'book_time' => $this->book_time,
                    ]);
    }
}
