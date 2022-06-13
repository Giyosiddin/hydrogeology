<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SendFormRequest;
use App\Mail\SendMail;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function send(SendFormRequest $request)
    {
        $details = $request->input();
        $mail = Mail::to('ggpuz@mail.ru')->send(new SendMail($details));
        return "Message is send successfully";
    }

    public function slides()
    {
        $slides = Slide::all();
        $data = [
          'data' => $slides
        ];
        return response()->json($data);
    }
}
