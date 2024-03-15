<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    //


    public function store(MessageRequest $request)
    {
        Message::create($request->all());

        return back()->withMessage(__('message.success'));
    }
}
