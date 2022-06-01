<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function send(Request $request)
    {
        $details = $request->input();
        $mail = Mail::to('ggpuz@mail.ru')->send(new SendMail($details));
        return "Message is send successfully";
    }
}
