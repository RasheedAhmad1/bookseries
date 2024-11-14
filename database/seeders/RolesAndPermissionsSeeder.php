<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
    }
}
