<?php
namespace Database\Seeders;

use App\Models\UserImage;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class UserImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $faker = Faker::create();

        $data = [];
        for ($i=1;$i<=12;$i++)
        array_push($data, [
            'user_id' => $i,
            'width' => '850',
            'height' => '350',
            'path' =>  $faker->imageUrl(),
            'location' => 'cover',
        ]);

        DB::table('user_images')->insert($data);

        UserImage::factory(12)->create();
    }
}
