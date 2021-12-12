<?php

namespace App;

use App\Models\ChatMessage;
use App\Models\ChatPost;
use App\Models\UserImage;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable,HasRoles, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role','governorate','city','region','building','stage','phone','apartment_number','user_type','photo','status','provider','provider_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders(){
        return $this->hasMany('App\Models\Order');
    }


    public static function getAvailableUsers()
    {
        $authUser = Auth::user();
        $authRoles = $authUser->roles->pluck("locked")->toArray();
        $users = User::with("roles")->where(function ($query) use ($authUser, $authRoles) {
            in_array(1, $authRoles) ? $query
                : $query->where("uuid", "<>", $authUser->uuid)->whereHas("roles", function ($query2) {
                    $query2->where("locked", 0);
                })->orWhere(function ($query3) {
                    $query3->whereDoesntHave("roles");
                });
        })->get();
        $authUserPermissions = $authUser->getAllPermissions()->pluck('name')->toArray();
        $display_users = [];

        foreach ($users as $user) {
            $userPermissions = $user->getAllPermissions()->pluck("name")->toArray();
            $lengthPermissions = count(array_diff($userPermissions, $authUserPermissions));

            if ($lengthPermissions === 0) {

                $display_users[] = [
                    "code" => $user->code,
                    "id_in_app" => $user->id_in_app,
                    "last_name" => $user->last_name,
                    "first_name" => $user->first_name,
                    "address" => $user->address,
                    "phone" => $user->phone,
                    "email" => $user->email,
                    "id" => $user->id,
                    "role" => $user->role,
                    "roles" => $user->roles()->select(['locked', 'uuid'])->get()->makeHidden('pivot'),
                ];
            }
        }

        return $display_users;
    }


    public function messages() {
        return $this->hasMany(ChatMessage::class,'from_user_id');
    }

    public function ownMessages() {
        return $this->hasMany(ChatMessage::class,'to_user_id');
    }
    public function friends()
    {
        return $this->belongsToMany(User::class, 'friends', 'friend_id', 'user_id');
    }

    public function likedPosts()
    {
        return $this->belongsToMany(ChatPost::class, 'likes', 'user_id', 'post_id');
    }

    public function posts()
    {
        return $this->hasMany(ChatPost::class);
    }



    public function images()
    {
        return $this->hasMany(UserImage::class);
    }

    public function coverImage()
    {
        return $this->hasOne(UserImage::class)
            ->orderByDesc('id')
            ->where('location', 'cover')
            ->withDefault(function ($userImage) {
                $userImage->path = '/user-images/cover-default-image.png';
            });
    }

    public function profileImage()
    {
        return $this->hasOne(UserImage::class)
            ->orderByDesc('id')
            ->where('location', 'profile')
            ->withDefault(function ($userImage) {
                $userImage->path = '/user-images/profile-default-image.jpeg';
            });
    }
}
