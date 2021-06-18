<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = Permission::get('name');

        $superAdministratorRole = Role::create([
            'name' => 'Super Administrator',
            'guard_name' => 'web'
        ]);

        // foreach ($permissions as $permission) {
        //     $superAdministratorRole->givePermissionTo($permission->name);
        // }

        $administratorRole = Role::create([
            'name' => 'Administrator',
            'guard_name' => 'web'
        ]);

        foreach ($permissions as $permission) {
            $administratorRole->givePermissionTo($permission->name);
        }
    }
}
