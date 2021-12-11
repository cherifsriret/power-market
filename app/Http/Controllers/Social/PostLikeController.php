<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;
use App\Http\Resources\LikeCollection;
use App\Models\ChatPost;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    public function store(ChatPost $post)
    {
        $post->likes()->toggle(auth()->user());
        return new LikeCollection($post->likes);

    }
}
