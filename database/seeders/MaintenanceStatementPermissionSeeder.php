<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class MaintenanceStatementPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin = Role::where(['name' => 'super_admin', 'display_name' => 'Super Admin', 'locked' => 1])->first();
        $tenant = Role::where(['name' => 'tenant', 'display_name' => 'مستأجر', 'locked' => 1])->first();
        $owner = Role::where(['name' => 'owner', 'display_name' => 'مالك', 'locked' => 1])->first();
        $owners_association_president = Role::where(['name' => 'owners_association_president', 'display_name' => 'رئيس اتحاد ملاك', 'locked' => 1])->first();


          //Maintenance Statement
          $permission_all = Permission::create(['name' => '*_maintenance_statements', 'display_name' => 'Maintenance Statements']);
          $permission_our = Permission::create(['name' => 'our_maintenance_statements', 'display_name' => 'Our Maintenance Statements']);
          $permission_read = Permission::create(['name' => 'read_maintenance_statements', 'display_name' => 'All Maintenance Statements']);
          $permission_create = Permission::create(['name' => 'create_maintenance_statements', 'display_name' => 'New Maintenance Statement']);
          $permission_update = Permission::create(['name' => 'update_maintenance_statements', 'display_name' => 'Edit Maintenance Statement']);
          $permission_delete = Permission::create(['name' => 'delete_maintenance_statements', 'display_name' => 'Delete Maintenance Statement']);
          $super_admin->givePermissionTo($permission_all);
          $super_admin->givePermissionTo($permission_read);
          $super_admin->givePermissionTo($permission_our);
          $super_admin->givePermissionTo($permission_create);
          $super_admin->givePermissionTo($permission_update);
          $super_admin->givePermissionTo($permission_delete);

          $owners_association_president->givePermissionTo($permission_our);
          $owners_association_president->givePermissionTo($permission_create);
          $owners_association_president->givePermissionTo($permission_update);
          $owners_association_president->givePermissionTo($permission_delete);

          $tenant->givePermissionTo($permission_our);

          $owner->givePermissionTo($permission_our);


    }
}
