<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'add-facility',
            'edit-facility',
            'delete-facility',
            'view-facility',
            'add-user',
            'edit-user',
            'delete-user',
            'view-user',
            'add-role',
            'edit-role',
            'delete-role',
            'view-role',
            'add-permission',
            'edit-permission',
            'delete-permission',
            'view-permission',
            'view-reservations',
            'update-reservations',
            'cancel-reservations',
            'view-users',
            'edit-users',
            'delete-users',
            'add-users',
            'add-facility-type',
            'edit-facility-type',
            'delete-facility-type',
            'deactivate-facility-type'
        ];
        foreach ($permissions as $permission) {
            \Spatie\Permission\Models\Permission::create(['name' => $permission]);
        }
    }
}
