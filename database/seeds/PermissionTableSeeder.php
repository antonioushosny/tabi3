<?php


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $permissions = [
           'role_list',
           'role_create',
           'role_edit',
           'role_delete',

           'admin_list',
           'admin_create',
           'admin_edit',
           'admin_delete',

           'user_list',
           'user_create',
           'user_edit',
           'user_delete',
           
           'client_list',
           'client_create',
           'client_edit',
           'client_delete',

           'classification_list',
           'classification_create',
           'classification_edit',
           'classification_delete',

           'departement_list',
           'departement_create',
           'departement_edit',
           'departement_delete',

           'product_list',
           'product_create',
           'product_edit',
           'product_delete',

           'advertisement_list',
           'advertisement_create',
           'advertisement_edit',
           'advertisement_delete',

           'subscription_list',
           'subscription_create',
           'subscription_edit',
           'subscription_delete',

           'contact_list',
           'contact_edit',
           'contact_delete',

           'order_list',
           'order_create',
           'order_edit',
           'order_delete',

           'send_message',
           'reports',   
        ];


        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}