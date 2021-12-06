<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class MeetingPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin = Role::where(['name' => 'super_admin', 'display_name' => 'Super Admin', 'locked' => 1])->first();
        //Meetings
        $permission_all = Permission::create(['name' => '*_meetings', 'display_name' => 'Meetings']);
        $permission_read = Permission::create(['name' => 'read_meetings', 'display_name' => 'All Meetings']);
        $permission_create = Permission::create(['name' => 'create_meetings', 'display_name' => 'New Meeting']);
        $permission_update = Permission::create(['name' => 'update_meetings', 'display_name' => 'Edit Meeting']);
        $permission_delete = Permission::create(['name' => 'delete_meetings', 'display_name' => 'Delete Meeting']);
        $super_admin->givePermissionTo($permission_all);
        $super_admin->givePermissionTo($permission_read);
        $super_admin->givePermissionTo($permission_create);
        $super_admin->givePermissionTo($permission_update);
        $super_admin->givePermissionTo($permission_delete);

    }
}
