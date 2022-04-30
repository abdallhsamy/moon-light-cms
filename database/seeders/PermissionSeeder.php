<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            'users' => ['list', 'view', 'create', 'update', 'delete'],
            'roles' => ['list', 'view', 'create', 'update', 'delete'],
            'permissions' => ['list', 'view', 'create', 'update', 'delete'],
        ];

        $permission_ids = [];

        foreach($permissions as $module => $actions) {

            foreach($actions as $action) {
                $permission = Permission::firstOrCreate([
                    'group' => $module,
                    'name' => $action . '_' . $module
                ], []);

                $permission_ids[] = $permission->id;
            }
        }

        $admin = Role::firstOrCreate(['name' => 'admin'], []);

        $user = Role::firstOrCreate(['name' => 'user'], []);

        $admin->givePermissionTo($permission_ids);
    }
}
