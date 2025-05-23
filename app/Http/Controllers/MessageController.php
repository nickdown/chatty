<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Models\Message;

class MessageController extends Controller
{
    public function store(StoreMessageRequest $request)
    {
        logger()->info('Creating a new message');
        $message = Message::query()->create($request->validated());

        if ($message->parent_id) {
            return redirect()->to(route('messages.show', $message->parent_id));
        }
        return redirect()->to('/');
    }

    public function show(Message $message)
    {
        $message->load('children');

        return view('messages.show', compact('message'));

    }
}
