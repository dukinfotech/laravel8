<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create Super Admin role
        Role::create(['name' => 'Super Admin']);
        $user = User::find(1);
        $user->assignRole(['Super Admin']);

        // Create Teacher role
        Role::create(['name' => 'Teacher']);
    }
}
