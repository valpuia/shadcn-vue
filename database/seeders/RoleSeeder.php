<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'admin']);

        $permissionsLists = [
            'view_any_role',
            'view_role',
            'create_role',
            'edit_role',
            'update_role',
            'delete_role',

            'view_any_language',
            'create_language',
            'update_language',
            'delete_language',
        ];

        $permission = collect($permissionsLists)
            ->map(fn ($perName) => Permission::firstOrCreate([
                'name' => $perName,
            ]))
            ->all();

        $role->syncPermissions($permission);
    }
}
