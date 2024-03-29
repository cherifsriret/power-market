<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
  //super admin
  $user = new User();
  $user->name = "Super Admin";
  $user->email =  'admin@gmail.com';
  $user->status =  'active';
  $user->password =  \Illuminate\Support\Facades\Hash::make('Admin123*');
  $user->role =  'admin';
  $user->assignRole('super_admin');
  $user->save();

    }
}
