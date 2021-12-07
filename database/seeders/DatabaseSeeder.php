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
         $this->call(MeetingPermissionSeeder::class); ///php artisan db:seed --class=MeetingPermissionSeeder
         $this->call(PlacePermissionSeeder::class);///php artisan db:seed --class=PlacePermissionSeeder



    }
}
