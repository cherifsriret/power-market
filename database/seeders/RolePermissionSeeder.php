<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin = Role::create(['name' => 'super_admin', 'display_name' => 'Super Admin', 'locked' => 1]);
        $tenant = Role::create(['name' => 'tenant', 'display_name' => 'مستأجر', 'locked' => 1]);
        $owner = Role::create(['name' => 'owner', 'display_name' => 'مالك', 'locked' => 1]);
        $owners_association_president = Role::create(['name' => 'owners_association_president', 'display_name' => 'رئيس اتحاد ملاك', 'locked' => 1]);


        //Settings
        $permission_all = Permission::create(['name' => '*_settings', 'display_name' => 'Settings']);
        $permission_read = Permission::create(['name' => 'read_settings', 'display_name' => 'Update Settings']);

        //Roles
        $permission_all = Permission::create(['name' => '*_roles', 'display_name' => 'Roles']);
        $permission_read = Permission::create(['name' => 'read_roles', 'display_name' => 'List roles']);
        $permission_create = Permission::create(['name' => 'create_roles', 'display_name' => 'New role']);
        $permission_update = Permission::create(['name' => 'update_roles', 'display_name' => 'Edit role']);
        $permission_delete = Permission::create(['name' => 'delete_roles', 'display_name' => 'Delete role']);
        $super_admin->givePermissionTo($permission_all);
        $super_admin->givePermissionTo($permission_read);
        $super_admin->givePermissionTo($permission_create);
        $super_admin->givePermissionTo($permission_update);
        $super_admin->givePermissionTo($permission_delete);





        //Coupons
        $permission_all = Permission::create(['name' => '*_coupons', 'display_name' => 'Coupons']);
        $permission_read = Permission::create(['name' => 'read_coupons', 'display_name' => 'List coupons']);
        $permission_create = Permission::create(['name' => 'create_coupons', 'display_name' => 'New coupon']);
        $permission_update = Permission::create(['name' => 'update_coupons', 'display_name' => 'Edit coupon']);
        $permission_delete = Permission::create(['name' => 'delete_coupons', 'display_name' => 'Delete coupon']);
        $super_admin->givePermissionTo($permission_all);
        $super_admin->givePermissionTo($permission_read);
        $super_admin->givePermissionTo($permission_create);
        $super_admin->givePermissionTo($permission_update);
        $super_admin->givePermissionTo($permission_delete);

        //Banners
        $permission_all = Permission::create(['name' => '*_banners', 'display_name' => 'Banners']);
        $permission_read = Permission::create(['name' => 'read_banners', 'display_name' => 'List banners']);
        $permission_create = Permission::create(['name' => 'create_banners', 'display_name' => 'New banner']);
        $permission_update = Permission::create(['name' => 'update_banners', 'display_name' => 'Edit banner']);
        $permission_delete = Permission::create(['name' => 'delete_banners', 'display_name' => 'Delete banner']);
        $super_admin->givePermissionTo($permission_all);
        $super_admin->givePermissionTo($permission_read);
        $super_admin->givePermissionTo($permission_create);
        $super_admin->givePermissionTo($permission_update);
        $super_admin->givePermissionTo($permission_delete);


        //Categories
        $permission_all = Permission::create(['name' => '*_categories', 'display_name' => 'Banners']);
        $permission_read = Permission::create(['name' => 'read_categories', 'display_name' => 'List categories']);
        $permission_create = Permission::create(['name' => 'create_categories', 'display_name' => 'New category']);
        $permission_update = Permission::create(['name' => 'update_categories', 'display_name' => 'Edit category']);
        $permission_delete = Permission::create(['name' => 'delete_categories', 'display_name' => 'Delete category']);
        $super_admin->givePermissionTo($permission_all);
        $super_admin->givePermissionTo($permission_read);
        $super_admin->givePermissionTo($permission_create);
        $super_admin->givePermissionTo($permission_update);
        $super_admin->givePermissionTo($permission_delete);

        //Products
        $permission_all = Permission::create(['name' => '*_products', 'display_name' => 'Products']);
        $permission_read = Permission::create(['name' => 'read_products', 'display_name' => 'List products']);
        $permission_create = Permission::create(['name' => 'create_products', 'display_name' => 'New product']);
        $permission_update = Permission::create(['name' => 'update_products', 'display_name' => 'Edit product']);
        $permission_delete = Permission::create(['name' => 'delete_products', 'display_name' => 'Delete product']);
        $super_admin->givePermissionTo($permission_all);
        $super_admin->givePermissionTo($permission_read);
        $super_admin->givePermissionTo($permission_create);
        $super_admin->givePermissionTo($permission_update);
        $super_admin->givePermissionTo($permission_delete);

        //Brands
        $permission_all = Permission::create(['name' => '*_brands', 'display_name' => 'Brands']);
        $permission_read = Permission::create(['name' => 'read_brands', 'display_name' => 'List brands']);
        $permission_create = Permission::create(['name' => 'create_brands', 'display_name' => 'New brand']);
        $permission_update = Permission::create(['name' => 'update_brands', 'display_name' => 'Edit brand']);
        $permission_delete = Permission::create(['name' => 'delete_brands', 'display_name' => 'Delete brand']);
        $super_admin->givePermissionTo($permission_all);
        $super_admin->givePermissionTo($permission_read);
        $super_admin->givePermissionTo($permission_create);
        $super_admin->givePermissionTo($permission_update);
        $super_admin->givePermissionTo($permission_delete);

        //Shippings
        $permission_all = Permission::create(['name' => '*_shippings', 'display_name' => 'Shippings']);
        $permission_read = Permission::create(['name' => 'read_shippings', 'display_name' => 'List shippings']);
        $permission_create = Permission::create(['name' => 'create_shippings', 'display_name' => 'New shipping']);
        $permission_update = Permission::create(['name' => 'update_shippings', 'display_name' => 'Edit shipping']);
        $permission_delete = Permission::create(['name' => 'delete_shippings', 'display_name' => 'Delete shipping']);
        $super_admin->givePermissionTo($permission_all);
        $super_admin->givePermissionTo($permission_read);
        $super_admin->givePermissionTo($permission_create);
        $super_admin->givePermissionTo($permission_update);
        $super_admin->givePermissionTo($permission_delete);


        //Orders
        $permission_all = Permission::create(['name' => '*_orders', 'display_name' => 'Orders']);
        $permission_read = Permission::create(['name' => 'read_orders', 'display_name' => 'List orders']);
        $permission_our = Permission::create(['name' => 'our_orders', 'display_name' => 'Our orders']);
        $permission_create = Permission::create(['name' => 'create_orders', 'display_name' => 'New order']);
        $permission_update = Permission::create(['name' => 'update_orders', 'display_name' => 'Edit order']);
        $permission_delete = Permission::create(['name' => 'delete_orders', 'display_name' => 'Delete order']);
        $super_admin->givePermissionTo($permission_all);
        $super_admin->givePermissionTo($permission_read);
        $super_admin->givePermissionTo($permission_our);
        $super_admin->givePermissionTo($permission_create);
        $super_admin->givePermissionTo($permission_update);
        $super_admin->givePermissionTo($permission_delete);


        //Reviews
        $permission_all = Permission::create(['name' => '*_reviews', 'display_name' => 'Reviews']);
        $permission_read = Permission::create(['name' => 'read_reviews', 'display_name' => 'List reviews']);
        $permission_our = Permission::create(['name' => 'our_reviews', 'display_name' => 'Our reviews']);
        $permission_create = Permission::create(['name' => 'create_reviews', 'display_name' => 'New review']);
        $permission_update = Permission::create(['name' => 'update_reviews', 'display_name' => 'Edit review']);
        $permission_delete = Permission::create(['name' => 'delete_reviews', 'display_name' => 'Delete review']);
        $super_admin->givePermissionTo($permission_all);
        $super_admin->givePermissionTo($permission_read);
        $super_admin->givePermissionTo($permission_our);
        $super_admin->givePermissionTo($permission_create);
        $super_admin->givePermissionTo($permission_update);
        $super_admin->givePermissionTo($permission_delete);


        //Posts
        $permission_all = Permission::create(['name' => '*_posts', 'display_name' => 'Posts']);
        $permission_read = Permission::create(['name' => 'read_posts', 'display_name' => 'List posts']);
        $permission_create = Permission::create(['name' => 'create_posts', 'display_name' => 'New post']);
        $permission_update = Permission::create(['name' => 'update_posts', 'display_name' => 'Edit post']);
        $permission_delete = Permission::create(['name' => 'delete_posts', 'display_name' => 'Delete post']);
        $super_admin->givePermissionTo($permission_all);
        $super_admin->givePermissionTo($permission_read);
        $super_admin->givePermissionTo($permission_create);
        $super_admin->givePermissionTo($permission_update);
        $super_admin->givePermissionTo($permission_delete);

        //PostCategories
        $permission_all = Permission::create(['name' => '*_post_categories', 'display_name' => 'PostCategories']);
        $permission_read = Permission::create(['name' => 'read_post_categories', 'display_name' => 'List post categories']);
        $permission_create = Permission::create(['name' => 'create_post_categories', 'display_name' => 'New post category']);
        $permission_update = Permission::create(['name' => 'update_post_categories', 'display_name' => 'Edit post category']);
        $permission_delete = Permission::create(['name' => 'delete_post_categories', 'display_name' => 'Delete post category']);
        $super_admin->givePermissionTo($permission_all);
        $super_admin->givePermissionTo($permission_read);
        $super_admin->givePermissionTo($permission_create);
        $super_admin->givePermissionTo($permission_update);
        $super_admin->givePermissionTo($permission_delete);


        //Tags
        $permission_all = Permission::create(['name' => '*_tags', 'display_name' => 'Tags']);
        $permission_read = Permission::create(['name' => 'read_tags', 'display_name' => 'List tags']);
        $permission_create = Permission::create(['name' => 'create_tags', 'display_name' => 'New tag']);
        $permission_update = Permission::create(['name' => 'update_tags', 'display_name' => 'Edit tag']);
        $permission_delete = Permission::create(['name' => 'delete_tags', 'display_name' => 'Delete tag']);
        $super_admin->givePermissionTo($permission_all);
        $super_admin->givePermissionTo($permission_read);
        $super_admin->givePermissionTo($permission_create);
        $super_admin->givePermissionTo($permission_update);
        $super_admin->givePermissionTo($permission_delete);


        //Comments
        $permission_all = Permission::create(['name' => '*_comments', 'display_name' => 'Comments']);
        $permission_read = Permission::create(['name' => 'read_comments', 'display_name' => 'List comments']);
        $permission_our = Permission::create(['name' => 'our_comments', 'display_name' => 'Our comments']);
        $permission_create = Permission::create(['name' => 'create_comments', 'display_name' => 'New comment']);
        $permission_update = Permission::create(['name' => 'update_comments', 'display_name' => 'Edit comment']);
        $permission_delete = Permission::create(['name' => 'delete_comments', 'display_name' => 'Delete comment']);
        $super_admin->givePermissionTo($permission_all);
        $super_admin->givePermissionTo($permission_read);
        $super_admin->givePermissionTo($permission_our);
        $super_admin->givePermissionTo($permission_create);
        $super_admin->givePermissionTo($permission_update);
        $super_admin->givePermissionTo($permission_delete);

       ///////

       //Users
        $permission_all = Permission::create(['name' => '*_users', 'display_name' => 'Users']);
        $permission_read = Permission::create(['name' => 'read_users', 'display_name' => 'List users']);
        $permission_our = Permission::create(['name' => 'our_users', 'display_name' => 'Our Users']);
        $permission_create = Permission::create(['name' => 'create_users', 'display_name' => 'New user']);
        $permission_update = Permission::create(['name' => 'update_users', 'display_name' => 'Edit user']);
        $permission_delete = Permission::create(['name' => 'delete_users', 'display_name' => 'Delete user']);
        $permission_activate = Permission::create(['name' => 'activate_users', 'display_name' => 'Activate user']);
        $permission_disactivate = Permission::create(['name' => 'disactivate_users', 'display_name' => 'Disactivate user']);
        $super_admin->givePermissionTo($permission_all);
        $super_admin->givePermissionTo($permission_read);
        $super_admin->givePermissionTo($permission_our);
        $super_admin->givePermissionTo($permission_create);
        $super_admin->givePermissionTo($permission_update);
        $super_admin->givePermissionTo($permission_delete);
        $super_admin->givePermissionTo($permission_activate);
        $super_admin->givePermissionTo($permission_disactivate);

        $owners_association_president->givePermissionTo($permission_our);
        $owners_association_president->givePermissionTo($permission_create);
        $owners_association_president->givePermissionTo($permission_update);
        $owners_association_president->givePermissionTo($permission_delete);
        $owners_association_president->givePermissionTo($permission_activate);
        $owners_association_president->givePermissionTo($permission_disactivate);



        //Invitations
        $permission_all = Permission::create(['name' => '*_invitations', 'display_name' => 'Invitations']);
        $permission_read = Permission::create(['name' => 'read_invitations', 'display_name' => 'All invitations']);
        $permission_our = Permission::create(['name' => 'our_invitations', 'display_name' => 'Our invitations']);
        $permission_create = Permission::create(['name' => 'create_invitations', 'display_name' => 'New invitation']);
        $permission_update = Permission::create(['name' => 'update_invitations', 'display_name' => 'Edit invitation']);
        $permission_delete = Permission::create(['name' => 'delete_invitations', 'display_name' => 'Delete invitation']);
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
        $tenant->givePermissionTo($permission_create);
        $tenant->givePermissionTo($permission_update);
        $tenant->givePermissionTo($permission_delete);

        $owner->givePermissionTo($permission_our);
        $owner->givePermissionTo($permission_create);
        $owner->givePermissionTo($permission_update);
        $owner->givePermissionTo($permission_delete);

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

        $owners_association_president->givePermissionTo($permission_read);
        $tenant->givePermissionTo($permission_read);
        $owner->givePermissionTo($permission_read);


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

        $owners_association_president->givePermissionTo($permission_read);
        $tenant->givePermissionTo($permission_read);
        $owner->givePermissionTo($permission_read);


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

        $owners_association_president->givePermissionTo($permission_read);
        $tenant->givePermissionTo($permission_read);
        $owner->givePermissionTo($permission_read);

        //Maps
        $permission_all = Permission::create(['name' => '*_maps', 'display_name' => 'Maps']);
        $permission_read = Permission::create(['name' => 'read_maps', 'display_name' => 'Maps']);
        $super_admin->givePermissionTo($permission_all);
        $super_admin->givePermissionTo($permission_read);


        $owners_association_president->givePermissionTo($permission_read);
        $tenant->givePermissionTo($permission_read);
        $owner->givePermissionTo($permission_read);
        //Static Complaints
        $permission_all = Permission::create(['name' => '*_static_complaints', 'display_name' => 'Static Complaints']);
        $permission_read = Permission::create(['name' => 'read_static_complaints', 'display_name' => 'All static complaints']);
        $permission_our = Permission::create(['name' => 'our_static_complaints', 'display_name' => 'Our static complaints']);
        $permission_customers = Permission::create(['name' => 'customers_static_complaints', 'display_name' => 'Customers static complaints']);
        $permission_create = Permission::create(['name' => 'create_static_complaints', 'display_name' => 'New static complaint']);
        $permission_update = Permission::create(['name' => 'update_static_complaints', 'display_name' => 'Edit static complaint']);
        $permission_delete = Permission::create(['name' => 'delete_static_complaints', 'display_name' => 'Delete static complaint']);
        $super_admin->givePermissionTo($permission_all);
        $super_admin->givePermissionTo($permission_read);
        $super_admin->givePermissionTo($permission_customers);
        $super_admin->givePermissionTo($permission_our);
        $super_admin->givePermissionTo($permission_create);
        $super_admin->givePermissionTo($permission_update);
        $super_admin->givePermissionTo($permission_delete);

        $owners_association_president->givePermissionTo($permission_our);
        $owners_association_president->givePermissionTo($permission_create);
        $owners_association_president->givePermissionTo($permission_update);
        $owners_association_president->givePermissionTo($permission_delete);

        $tenant->givePermissionTo($permission_our);
        $tenant->givePermissionTo($permission_create);
        $tenant->givePermissionTo($permission_update);
        $tenant->givePermissionTo($permission_delete);

        $owner->givePermissionTo($permission_our);
        $owner->givePermissionTo($permission_create);
        $owner->givePermissionTo($permission_update);
        $owner->givePermissionTo($permission_delete);


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

        $owners_association_president->givePermissionTo($permission_read);
        $tenant->givePermissionTo($permission_read);
        $owner->givePermissionTo($permission_read);


        //Meetings
        $permission_all = Permission::create(['name' => '*_meetings', 'display_name' => 'Meetings']);
        $permission_our = Permission::create(['name' => 'our_meetings', 'display_name' => 'Our Meetings']);
        $permission_read = Permission::create(['name' => 'read_meetings', 'display_name' => 'All Meetings']);
        $permission_create = Permission::create(['name' => 'create_meetings', 'display_name' => 'New Meeting']);
        $permission_update = Permission::create(['name' => 'update_meetings', 'display_name' => 'Edit Meeting']);
        $permission_delete = Permission::create(['name' => 'delete_meetings', 'display_name' => 'Delete Meeting']);
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
        $tenant->givePermissionTo($permission_create);
        $tenant->givePermissionTo($permission_update);
        $tenant->givePermissionTo($permission_delete);

        $owner->givePermissionTo($permission_our);
        $owner->givePermissionTo($permission_create);
        $owner->givePermissionTo($permission_update);
        $owner->givePermissionTo($permission_delete);

    }
}
