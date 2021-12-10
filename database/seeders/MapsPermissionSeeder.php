<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class MapsPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin = Role::where(['name' => 'super_admin', 'locked' => 1])->first();
        //Maps
        $permission_all = Permission::create(['name' => '*_maps', 'display_name' => 'Maps']);
        $permission_read = Permission::create(['name' => 'read_maps', 'display_name' => 'Maps']);
        $super_admin->givePermissionTo($permission_all);
        $super_admin->givePermissionTo($permission_read);
    }
}
