<?php

namespace Database\Seeders;

use App\Enums\PermissionType;
use App\Enums\RoleType;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Reset cache
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        // Create all permissions
        foreach (PermissionType::asArray() as $display_name => $name) {
            Permission::updateOrCreate(
                [
                    'name'         => $name,
                    'display_name' => Str::singular($display_name),
                ]
            );
        }

        // Create admin role
        $adminRole = Role::updateOrCreate([
            'name'         => RoleType::ADMIN,
            'display_name' => RoleType::getKey(RoleType::ADMIN),
        ]);
        $adminRole->syncPermissions(Permission::all());
        // Create manager role
        $managerRole = Role::updateOrCreate([
            'name'         => 'manager',
            'display_name' => 'MANAGER',
        ]);
        $managerRole->syncPermissions(Permission::query()
                                                ->where('name', 'like', 'VIEW-USER')
                                                ->get());
    }
}
