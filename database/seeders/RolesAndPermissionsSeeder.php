<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    // Run the database seeds
    public function run(): void
    {
        // Create permissions if they doesn't already exist
        Permission::firstOrCreate(['name' => 'edit_books', 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'edit books', 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'delete books', 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'publish books', 'guard_name' => 'web']);

        // Create roles if they doesn't already exist
        $writerRole = Role::firstOrCreate(['name' => 'writer', 'guard_name' => 'web']);
        $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);

        // Assign permissions to roles
        $writerRole->givePermissionTo('edit books');
        $adminRole->givePermissionTo(['edit books', 'delete books', 'publish books']);
    }
}
