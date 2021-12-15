<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;
use App\Http\Resources\Post;
use App\Http\Resources\PostCollection;
use App\Models\ChatPost;
use App\Models\Friend;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class PostController extends Controller
{
    public function index()
    {

        return new PostCollection(
            ChatPost::get()
            );


    }

    public function store()
    {
        $data = request()->validate([
           'body' => '',
            'image' => '',
            'width' => '',
            'height' => '',
        ]);


        if (isset($data['image'])) {
            $image = $data['image']->store('post-images','public');

            Image::make($data['image'])->fit($data['width'],$data['height'])
                ->save(storage_path('app/public/post-images/'.$data['image']->hashName()));
            $post = request()->user()->posts()->create([
                'body' => $data['body'],
                'image' => $image!=null? url('/storage/').'/'. $image : null,
            ]);


        }
        else{
            $post = request()->user()->posts()->create([
                'body' => $data['body'],
                'image' =>  null,
            ]);
        }



        return new Post($post);


    }
}
