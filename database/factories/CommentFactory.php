<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\ChatPost;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'user_id' => User::all()->random()->id,
            'post_id' => ChatPost::all()->random()->id,
            'body' =>  $this->faker->sentence,

        ];
    }


}
