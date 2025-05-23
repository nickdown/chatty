<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Models\Message;

class MessageController extends Controller
{
    public function store(StoreMessageRequest $request)
    {
        logger()->info('Creating a new message', [
            'content' => $request->input('content'),
            'parent_id' => $request->input('parent_id'),
            'headers' => $request->headers->all(),
            'ip' => $request->ip(),
            'method' => $request->method(),
            'url' => $request->url(),
        ]);
        
        try {
            $message = Message::query()->create($request->validated());
            logger()->info('Message created successfully', ['message_id' => $message->id]);

            if ($message->parent_id) {
                return redirect()->to(route('messages.show', $message->parent_id));
            }
            return redirect()->to('/');
        } catch (\Exception $e) {
            logger()->error('Failed to create message', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            throw $e;
        }
    }

    public function show(Message $message)
    {
        $message->load('children');

        return view('messages.show', compact('message'));

    }
}
