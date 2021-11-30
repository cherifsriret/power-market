<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role','photo','status','provider','provider_id',
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
                    "uid" => $user->uuid,
                    "role" => $user->roles->pluck("display_name")->toArray(),
                    "roles" => $user->roles()->select(['locked', 'uuid'])->get()->makeHidden('pivot'),
                    "has_installation" => $user->has_instalation,
                    "has_troubleshooting" => $user->has_troubleshooting,
                ];
            }
        }

        return $display_users;
    }
}
