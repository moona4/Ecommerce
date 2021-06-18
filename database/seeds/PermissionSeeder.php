<?php

use App\PermissionCategory;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions_by_categories = [
            'Users' => [
                'view-user',
                'create-user',
                'modify-user',
                'suspend-user'
            ],

            'Roles' => [
                'view-role',
                'create-role',
                'modify-role'
            ],

            'Customers' => [
                'view-customer',
                'create-customer',
                'modify-customer'
            ],
        ];

        foreach ($permissions_by_categories as $key => $permissions) {
            $permission_category = PermissionCategory::create([
                'name' => $key
            ]);
            foreach ($permissions as $permission_name) {
                $permission = new Permission();
                $permission->name = $permission_name;
                $permission->permission_category_id = $permission_category->id;
                $permission->save();
            }
        }
    }
}
