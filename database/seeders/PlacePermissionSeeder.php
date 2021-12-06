<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PlacePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin = Role::where(['name' => 'super_admin', 'display_name' => 'Super Admin', 'locked' => 1])->first();
        //Places
        $permission_all = Permission::create(['name' => '*_places', 'display_name' => 'Places']);
        $permission_read = Permission::create(['name' => 'read_places', 'display_name' => 'All Places']);
        $permission_create = Permission::create(['name' => 'create_places', 'display_name' => 'New Place']);
        $permission_update = Permission::create(['name' => 'update_places', 'display_name' => 'Edit Place']);
        $permission_delete = Permission::create(['name' => 'delete_places', 'display_name' => 'Delete Place']);
        $super_admin->givePermissionTo($permission_all);
        $super_admin->givePermissionTo($permission_read);
        $super_admin->givePermissionTo($permission_create);
        $super_admin->givePermissionTo($permission_update);
        $super_admin->givePermissionTo($permission_delete);
    }
}
