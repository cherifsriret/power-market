<?php

namespace App\Http\Controllers\Social;

use App\Events\ChatMessage as EventsChatMessage;
use App\Http\Controllers\Controller;
use App\Models\ChatMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
    	return view('backend.social-media.chat');
    }

    public function fetchAllMessages()
    {
        $building_id= Auth::user()->building_id;
    	return ChatMessage::where(function($q) use($building_id){
            return $q->whereHas('user',function($user) use($building_id) {
                return $user->where('building_id',$building_id);
            });
        })->with('user')->get();
    }

    public function sendMessage(Request $request)
    {
    	$chat = auth()->user()->messages()->create([
            'message' => $request->message
        ]);

    	broadcast(new EventsChatMessage("test"))->toOthers();

    	return ['status' => 'success'];
    }
}
