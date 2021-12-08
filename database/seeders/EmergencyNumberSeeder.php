<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class EmergencyNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin = Role::where(['name' => 'super_admin', 'display_name' => 'Super Admin', 'locked' => 1])->first();
        //Emergency Numbers
        $permission_all = Permission::create(['name' => '*_emergency_numbers', 'display_name' => 'Emergency Numbers']);
        $permission_read = Permission::create(['name' => 'read_emergency_numbers', 'display_name' => 'All emergency numbers']);
        $permission_create = Permission::create(['name' => 'create_emergency_numbers', 'display_name' => 'New emergency number']);
        $permission_update = Permission::create(['name' => 'update_emergency_numbers', 'display_name' => 'Edit emergency number']);
        $permission_delete = Permission::create(['name' => 'delete_emergency_numbers', 'display_name' => 'Delete emergency number']);
        $super_admin->givePermissionTo($permission_all);
        $super_admin->givePermissionTo($permission_read);
        $super_admin->givePermissionTo($permission_create);
        $super_admin->givePermissionTo($permission_update);
        $super_admin->givePermissionTo($permission_delete);
    }
}
