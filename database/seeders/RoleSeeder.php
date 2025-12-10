<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // crear el instructor rol
        $instructor = Role::create([
            'name' => 'instructor'
        ]);

        // permisos al instructor rol
        $instructor->syncPermissions([
            'manage_courses'
        ]);

        // crear el rol admin
        $admin = Role::create([
            'name' => 'admin'
        ]);

        // permisos al rol admin
        $admin->syncPermissions([
            'access_dashboard',
            'manage_users',
            'manage_roles',
            'manage_permissions'
        ]);

        // asignar user con id  los permisos de instructor y admin
        $user = User::find(1);

        $user->syncRoles([
            'instructor',
            'admin'
        ]);
    }
}
