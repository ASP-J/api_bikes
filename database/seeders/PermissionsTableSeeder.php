<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;

use App\Support\PermissionsHelper;

class PermissionsTableSeeder extends Seeder
{
    private function getPermissions()
    {
        return config('permissions');
    }

    /**
     * Run the seed.
     *
     * @return void
     */
    public function run()
    {
        $permissions = $this->getPermissions();
        $permissions = PermissionsHelper::getFlattenPermissions($permissions);
        foreach ($permissions as $permission) {
            $model = Permission::firstOrNew(['name' => $permission]);
            $model->save();
        }
    }
}