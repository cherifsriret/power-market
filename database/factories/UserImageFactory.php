<?php

namespace Database\Factories;

use App\Models\UserImage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserImage::class;

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
            'width' => '350',
            'height' => '350',
            'path' =>  $this->faker->imageUrl(),
            'location' => 'profile',
       ];

    }


}

