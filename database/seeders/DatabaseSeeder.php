<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'Super Admin',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Admin',
                'guard_name' => 'web'
            ],
        ];

        $permissions = [
            [
                'name' => 'users',
                'guard_name' => 'web'
            ],
            [
                'name' => 'roles-and-permissions',
                'guard_name' => 'web'
            ],
            [
                'name' => 'products-and-features',
                'guard_name' => 'web'
            ],
        ];

        $users = [
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@gmail.com',
                'password' => Hash::make('123'),
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123'),
            ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }

        foreach ($users as $user) {
            User::create($user);
        }

        Role::where('name', 'Super Admin')->first()->givePermissionTo(Permission::where('name', 'users')->first());
        Role::where('name', 'Super Admin')->first()->givePermissionTo(Permission::where('name', 'roles-and-permissions')->first());
        Role::where('name', 'Super Admin')->first()->givePermissionTo(Permission::where('name', 'products-and-features')->first());
        Role::where('name', 'Admin')->first()->givePermissionTo(Permission::where('name', 'products-and-features')->first());

        User::where('name', 'Super Admin')->first()->assignRole(Role::where('name', 'Super Admin')->first());
        User::where('name', 'Admin')->first()->assignRole(Role::where('name', 'Admin')->first());
    }
}
