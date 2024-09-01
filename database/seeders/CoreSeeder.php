<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin_role = Role::create(['name' => 'admin']);
        $user_role = Role::create(['name' => 'user']);

        $permission_array = [
            // Listing permissions
            ['name' => 'view listing'],
            ['name' => 'view_any listing'],
            ['name' => 'create listing'],
            ['name' => 'update listing'],
            ['name' => 'restore listing'],
            ['name' => 'restore_any listing'],
            ['name' => 'replicate listing'],
            ['name' => 'reorder listing'],
            ['name' => 'delete listing'],
            ['name' => 'delete_any listing'],
            ['name' => 'force_delete listing'],
            ['name' => 'force_delete_any listing'],
            ['name' => 'lock listing'],

            // Item permissions
            ['name' => 'view item'],
            ['name' => 'view_any item'],
            ['name' => 'create item'],
            ['name' => 'update item'],
            ['name' => 'restore item'],
            ['name' => 'restore_any item'],
            ['name' => 'replicate item'],
            ['name' => 'reorder item'],
            ['name' => 'delete item'],
            ['name' => 'delete_any item'],
            ['name' => 'force_delete item'],
            ['name' => 'force_delete_any item'],
            ['name' => 'lock item'],

            // Tag permissions
            ['name' => 'view tag'],
            ['name' => 'view_any tag'],
            ['name' => 'create tag'],
            ['name' => 'update tag'],
            ['name' => 'restore tag'],
            ['name' => 'restore_any tag'],
            ['name' => 'replicate tag'],
            ['name' => 'reorder tag'],
            ['name' => 'delete tag'],
            ['name' => 'delete_any tag'],
            ['name' => 'force_delete tag'],
            ['name' => 'force_delete_any tag'],
            ['name' => 'lock tag'],

            // User permissions
            ['name' => 'view user'],
            ['name' => 'view_any user'],
            ['name' => 'create user'],
            ['name' => 'update user'],
            ['name' => 'restore user'],
            ['name' => 'restore_any user'],
            ['name' => 'replicate user'],
            ['name' => 'reorder user'],
            ['name' => 'delete user'],
            ['name' => 'delete_any user'],
            ['name' => 'force_delete user'],
            ['name' => 'force_delete_any user'],
            ['name' => 'lock user'],
        ];
        foreach ($permission_array as $permission) {
            $permission_model = Permission::create($permission);
            $admin_role->givePermissionTo($permission_model);
        }
    }
}
