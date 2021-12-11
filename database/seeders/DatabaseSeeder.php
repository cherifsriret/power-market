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

        //  $this->call(UsersTableSeeder::class);
         $this->call(MeetingPermissionSeeder::class); ///php artisan db:seed --class=MeetingPermissionSeeder
         $this->call(PlacePermissionSeeder::class);///php artisan db:seed --class=PlacePermissionSeeder

         $this->call(CleaningCompaniesSeeder::class); ///php artisan db:seed --class=CleaningCompaniesSeeder
         $this->call(MaintenanceCompaniesSeeder::class); ///php artisan db:seed --class=MaintenanceCompaniesSeeder
         $this->call(EmergencyNumberSeeder::class); ///php artisan db:seed --class=EmergencyNumberSeeder
         $this->call(StaticComplaintSeeder::class); ///php artisan db:seed --class=StaticComplaintSeeder

         $this->call(UsersSeeder::class);
         $this->call(PostsSeeder::class);
         $this->call(UserImageSeeder::class);
         $this->call(LikeSeeder::class);
         $this->call(CommentSeeder::class);
         $this->call(FriendSeeder::class);

    }
}
