<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentCollection;
use App\Models\ChatPost;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    public function store(ChatPost $post)
    {
        $data = request()->validate([
            'body' => 'required',
        ]);

        $post->comments()->create(array_merge($data, [
            'user_id' => auth()->user()->id,
        ]));

        return new CommentCollection($post->comments);

    }
}
