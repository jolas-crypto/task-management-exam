<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles
        $adminRole = Role::create(['name' => 'admin']);
        $managerRole = Role::create(['name' => 'manager']);
        $userRole = Role::create(['name' => 'user']);

        // Create permissions
        $manageUsers = Permission::create(['name' => 'manage users']);
        $manageTasks = Permission::create(['name' => 'manage tasks']);

        // Assign permissions to roles
        $adminRole->givePermissionTo([$manageUsers, $manageTasks]);
        $managerRole->givePermissionTo($manageTasks);
    }
}
