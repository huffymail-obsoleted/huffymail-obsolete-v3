<?php

namespace App\Http\Controllers;

use App\Http\Resources\MessageResource;
use App\Models\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function index(Request $request)
    {
        $validated = $request->validate([
            'to' => ['required', 'email'],
        ]);

        $messages = Message::select(Message::COLUMNS_FOR_LIST)
            ->where('to', $validated['to'])
            ->orderBy('id', 'desc')
            ->take(100)
            ->get();

        return MessageResource::collection($messages);
    }

    public function show(Request $request, string $id) {
        $message = Message::select()
            ->where('message_id', $id)
            ->firstOrFail();

        return new MessageResource($message);
    }
}
