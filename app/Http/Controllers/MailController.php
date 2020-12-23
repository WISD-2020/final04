<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send()
    {
        $name='會員';
        $content='您好. <br>這是一封測試郵件.<br>';
        $data = ['name' => $name, 'content'=> $content, ];
        Mail::send('mail.test', $data, function($message) use($name) {
            $message->subject('測試郵件');
            $message->to('onejun3096@gmail.com', $name);
            $message->from('pudun203@gmail.com', 'admin');
        });
        return 'mail sent!';

    }
}
