<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function contact(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            "phone" => '',
            'message' => 'required'
        ]); 

        Mail::send(
            'emails.contact', 
            ['data' => ['email' => $request->input('email'), 'phone' => $request->input('phone'), 'message' => $request->input('message')]], 
            function ($m) {
                $m->from(env('MAIL_USERNAME'), env('APP_NAME'));

                $m->to('saneock19@gmail.com')->subject('Получено сообщение');
            }
        );

        return ['message' => 'Mail Sent!'];
    }
}
