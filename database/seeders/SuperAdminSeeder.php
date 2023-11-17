<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creating Super Admin User
        $superAdmin = User::create([
            'name' => 'Juan Aguinaga', 
            'email' => 'juan@gmail.com',
            'password' => Hash::make('juan1234')
        ]);
        $superAdmin->assignRole('Super Admin');

        // Creating Admin User
        $admin = User::create([
            'name' => 'Victor Sanchez', 
            'email' => 'victor@gmail.com',
            'password' => Hash::make('victor1234')
        ]);
        $admin->assignRole('Admin');

        // Creating Assistant User
        $assistant = User::create([
            'name' => 'Luis Torres', 
            'email' => 'luis@gmail.com',
            'password' => Hash::make('luis1234')
        ]);
        $assistant->assignRole('Assistant');

        // Creating Teacher User
        $assistant = User::create([
            'name' => 'Manuel Linares', 
            'email' => 'manuel@gmail.com',
            'password' => Hash::make('manuel1234')
        ]);
        $assistant->assignRole('Teacher');
    }
}