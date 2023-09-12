<?php

namespace App\Http\Controllers;

use App\Mail\CustomerMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message')
        ];

        Mail::to('webadmin@blockbeatzofficial.com')->send(new CustomerMail($data));

        return redirect('/')->with('success', 'Email sent successfully!');
    }
}
