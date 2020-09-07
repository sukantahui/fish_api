<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail(Request $request)
    {
        $to_name = 'Sudipta Halder';
        $to_email = 'huisukanta77@gmail.com';
        $data = array('name'=>'Namita Halder', 'body' => 'This is body');
        Mail::send('emails.simple', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)->subject('This is a testing mail');
            $message->from('sreeparnadas@gmail.com','Oh! This is test mail');
        });
    }
}
