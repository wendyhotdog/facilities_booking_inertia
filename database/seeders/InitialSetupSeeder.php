<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InitialSetupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,
        ]);

        $superAdmin = \App\Models\User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@test.com',
            'password' => bcrypt('password')
        ]);
        $superAdmin->assignRole('super-admin');

        // assign all permissions to superadmin and admin
        $superAdminRole = \Spatie\Permission\Models\Role::where('name', 'super-admin')->first();
        $adminRole = \Spatie\Permission\Models\Role::where('name', 'admin')->first();
        $permissions = \Spatie\Permission\Models\Permission::all();
        $superAdminRole->syncPermissions($permissions);
        $adminRole->syncPermissions($permissions);
    }
}
