<?php

namespace App\Http\Controllers;

use App\Events\ChatMessageSentEvent;
use App\Models\ChatMessage;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatMessageController extends Controller
{

    public function index()
    {
        return ChatMessage::with('user')->get();
    }

    public function store(Request $request)
    {
        $fromUser = Auth::user();
        $toUser = User::find($request->input('to_user'));

        $message = $fromUser->sentMessages()->create([
            'message' => $request->input('message'),
            'to_user' => $request->input('to_user'),
        ]);

        // send event to listeners
        broadcast(new ChatMessageSentEvent($message, $fromUser,$toUser))->toOthers();

        return [
            'message' => $message,
            'fromUser' => $fromUser,
            'toUser' => $toUser,
        ];
    }
}
