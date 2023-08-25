<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RestoreEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The demo object instance.
     *
     * @var Demo
     */
    public $restore;
    public function __construct($restore)
    {
        $this->restore = $restore;
    }

    public function build()
    {
    return $this->from('publico@gmail.com')
    ->view('mails.restore')
    ->text('mails.restore_plain')
    ->with(
    [
    'testVarOne' => '1',
    'testVarTwo' => '2',
    ]);
    }
}
