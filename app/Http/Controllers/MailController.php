<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function contact(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            "phone" => '',
            'message' => 'required'
        ]); 

        return ['message' => 'Mail Sent!'];
    }
}
