<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QuizAssignmentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $candidateName;
    public $username;
    public $password;
    public $link;

    public function __construct($candidateName, $username, $password, $link)
    {
        $this->candidateName = $candidateName;
        $this->username = $username;
        $this->password = $password;
        $this->link = $link;
    }

    public function build()
    {
        return $this->view('emails.quizAssignment')
            ->subject('Quiz Assignment')
            ->with([
                'candidateName' => $this->candidateName,
                'username' => $this->username,
                'password' => $this->password,
                'link' => $this->link,
            ]);
    }
}
