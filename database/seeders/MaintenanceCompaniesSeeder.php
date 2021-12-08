<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class MaintenanceCompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin = Role::where(['name' => 'super_admin', 'display_name' => 'Super Admin', 'locked' => 1])->first();
        //Maintenance companies
        $permission_all = Permission::create(['name' => '*_maintenance_companies', 'display_name' => 'Maintenance companies']);
        $permission_read = Permission::create(['name' => 'read_maintenance_companies', 'display_name' => 'All maintenance companies']);
        $permission_create = Permission::create(['name' => 'create_maintenance_companies', 'display_name' => 'New maintenance company']);
        $permission_update = Permission::create(['name' => 'update_maintenance_companies', 'display_name' => 'Edit maintenance company']);
        $permission_delete = Permission::create(['name' => 'delete_maintenance_companies', 'display_name' => 'Delete maintenance company']);
        $super_admin->givePermissionTo($permission_all);
        $super_admin->givePermissionTo($permission_read);
        $super_admin->givePermissionTo($permission_create);
        $super_admin->givePermissionTo($permission_update);
        $super_admin->givePermissionTo($permission_delete);
    }
}
