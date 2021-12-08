<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class StaticComplaintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin = Role::where(['name' => 'super_admin', 'display_name' => 'Super Admin', 'locked' => 1])->first();
        //Static Complaints
        $permission_all = Permission::create(['name' => '*_static_complaints', 'display_name' => 'Static Complaints']);
        $permission_read = Permission::create(['name' => 'read_static_complaints', 'display_name' => 'All static complaints']);
        $permission_create = Permission::create(['name' => 'create_static_complaints', 'display_name' => 'New static complaint']);
        $permission_update = Permission::create(['name' => 'update_static_complaints', 'display_name' => 'Edit static complaint']);
        $permission_delete = Permission::create(['name' => 'delete_static_complaints', 'display_name' => 'Delete static complaint']);
        $super_admin->givePermissionTo($permission_all);
        $super_admin->givePermissionTo($permission_read);
        $super_admin->givePermissionTo($permission_create);
        $super_admin->givePermissionTo($permission_update);
        $super_admin->givePermissionTo($permission_delete);
    }
}
