<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostCollection;
use App\User;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    public function index(User $user)
   {
    return new PostCollection($user->posts);

   }
}