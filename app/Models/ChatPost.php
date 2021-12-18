<?php

namespace App\Models;

use App\Scopes\ReverseScope;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatPost extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ReverseScope());
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes','post_id', 'user_id');

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class,'post_id');
    }
}
