<?php

use App\Models\Role;
use Illuminate\Database\Seeder;
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


        //Admins
        $permission_all = Permission::create(['name' => '*_admins', 'display_name' => 'Admins']);
        $permission_read = Permission::create(['name' => 'read_admins', 'display_name' => 'List admins']);
        $permission_create = Permission::create(['name' => 'create_admins', 'display_name' => 'New admin']);
        $permission_update = Permission::create(['name' => 'update_admins', 'display_name' => 'Edit user']);
        $permission_delete = Permission::create(['name' => 'delete_admins', 'display_name' => 'Delete user']);
        $super_admin->givePermissionTo($permission_all);
        $super_admin->givePermissionTo($permission_read);
        $super_admin->givePermissionTo($permission_create);
        $super_admin->givePermissionTo($permission_update);
        $super_admin->givePermissionTo($permission_delete);

        //Users
        $permission_all = Permission::create(['name' => '*_users', 'display_name' => 'Users']);
        $permission_read = Permission::create(['name' => 'read_users', 'display_name' => 'List users']);
        $permission_create = Permission::create(['name' => 'create_users', 'display_name' => 'New user']);
        $permission_update = Permission::create(['name' => 'update_users', 'display_name' => 'Edit user']);
        $permission_delete = Permission::create(['name' => 'delete_users', 'display_name' => 'Delete user']);
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
        $permission_create = Permission::create(['name' => 'create_orders', 'display_name' => 'New order']);
        $permission_update = Permission::create(['name' => 'update_orders', 'display_name' => 'Edit order']);
        $permission_delete = Permission::create(['name' => 'delete_orders', 'display_name' => 'Delete order']);
        $super_admin->givePermissionTo($permission_all);
        $super_admin->givePermissionTo($permission_read);
        $super_admin->givePermissionTo($permission_create);
        $super_admin->givePermissionTo($permission_update);
        $super_admin->givePermissionTo($permission_delete);


        //Reviews
        $permission_all = Permission::create(['name' => '*_reviews', 'display_name' => 'Reviews']);
        $permission_read = Permission::create(['name' => 'read_reviews', 'display_name' => 'List reviews']);
        $permission_create = Permission::create(['name' => 'create_reviews', 'display_name' => 'New review']);
        $permission_update = Permission::create(['name' => 'update_reviews', 'display_name' => 'Edit review']);
        $permission_delete = Permission::create(['name' => 'delete_reviews', 'display_name' => 'Delete review']);
        $super_admin->givePermissionTo($permission_all);
        $super_admin->givePermissionTo($permission_read);
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
        $permission_create = Permission::create(['name' => 'create_comments', 'display_name' => 'New comment']);
        $permission_update = Permission::create(['name' => 'update_comments', 'display_name' => 'Edit comment']);
        $permission_delete = Permission::create(['name' => 'delete_comments', 'display_name' => 'Delete comment']);
        $super_admin->givePermissionTo($permission_all);
        $super_admin->givePermissionTo($permission_read);
        $super_admin->givePermissionTo($permission_create);
        $super_admin->givePermissionTo($permission_update);
        $super_admin->givePermissionTo($permission_delete);


    }
}
