<?php

namespace Database\Seeders;

use App\Support\PermissionsHelper;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the seed.
     *
     * @return void
     */
    public function run()
    {
        $profiles = config('profile-permissions');

        foreach ($profiles as $profile => $permissions) {
            $rolePermissions = PermissionsHelper::getFlattenPermissions($permissions);
            $role = Role::firstOrCreate([
                'name' => $profile,
                'guard_name' => 'web',
            ]);
            $role->syncPermissions($rolePermissions);
        }
    }
}