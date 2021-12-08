<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class CleaningCompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin = Role::where(['name' => 'super_admin', 'display_name' => 'Super Admin', 'locked' => 1])->first();
        //Cleaning companies
        $permission_all = Permission::create(['name' => '*_cleaning_companies', 'display_name' => 'Cleaning companies']);
        $permission_read = Permission::create(['name' => 'read_cleaning_companies', 'display_name' => 'All cleaning companies']);
        $permission_create = Permission::create(['name' => 'create_cleaning_companies', 'display_name' => 'New cleaning company']);
        $permission_update = Permission::create(['name' => 'update_cleaning_companies', 'display_name' => 'Edit cleaning company']);
        $permission_delete = Permission::create(['name' => 'delete_cleaning_companies', 'display_name' => 'Delete cleaning company']);
        $super_admin->givePermissionTo($permission_all);
        $super_admin->givePermissionTo($permission_read);
        $super_admin->givePermissionTo($permission_create);
        $super_admin->givePermissionTo($permission_update);
        $super_admin->givePermissionTo($permission_delete);
    }
}
