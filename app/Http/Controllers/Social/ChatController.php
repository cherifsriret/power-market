<?php

namespace App\Http\Controllers\Social;

use App\Events\ChatMessage as EventsChatMessage;
use App\Http\Controllers\Controller;
use App\Models\ChatMessage;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
    	return view('backend.social-media.chat');
    }

    public function fetchAllMessages()
    {
    	return ChatMessage::with('user')->get();
    }

    public function sendMessage(Request $request)
    {
    	$chat = auth()->user()->messages()->create([
            'message' => $request->message
        ]);

    	broadcast(new EventsChatMessage($chat->load('user')))->toOthers();

    	return ['status' => 'success'];
    }
}
