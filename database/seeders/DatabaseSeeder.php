<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(SettingTableSeeder::class);
         $this->call(CouponSeeder::class);
         $this->call(RolePermissionSeeder::class);

         $this->call(UsersTableSeeder::class);
         $this->call(MeetingPermissionSeeder::class);
         $this->call(PlacePermissionSeeder::class);



    }
}
