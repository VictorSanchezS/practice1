<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'Super Admin']);
        $admin = Role::create(['name' => 'Admin']);
        $assistant = Role::create(['name' => 'Assistant']);
        $teacher = Role::create(['name' => 'Teacher']);

        $admin->givePermissionTo([
            'create-role',
            'edit-role',
            'delete-role',
            'create-user',
            'edit-user',
            'delete-user',
            'create-course',
            'edit-course',
            'delete-course',
            'create-student',
            'edit-student',
            'delete-student'
        ]);

        $assistant->givePermissionTo([
            'create-course',
            'edit-course',
            'delete-course',
            'create-student',
            'edit-student',
            'delete-student'
        ]);

        $teacher->givePermissionTo([
            'edit-student',
        ]);

    }
}