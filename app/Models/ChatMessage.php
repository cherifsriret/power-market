<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'message'
    ];

    public function user() {
        return $this->belongsTo(User::class,'from_user_id');
    }

    public function toUser() {
        return $this->belongsTo(User::class,'to_user_id');
    }

}
