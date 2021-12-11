<?php

namespace Database\Factories;

use App\Models\Friend;
use App\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class FriendFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Friend::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        static $user_id = 1;
        return [
            'user_id' => $user_id++,
            'friend_id' => User::all()->random()->id,
            'confirmed_at' => now(),
            'status' => '1',
        ];


    }


}
