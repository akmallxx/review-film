<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pastikan role sudah tersedia
        $roles = ['user', 'admin', 'author'];
        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        // Buat user biasa
        $user = User::firstOrCreate([
            'name' => 'User Biasa',
            'email' => 'user@example.com',
            'password' => Hash::make('password123'),
        ]);
        $user->assignRole('user');

        // Buat admin
        $admin = User::firstOrCreate([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
        ]);
        $admin->assignRole('admin');

        // Buat author
        $author = User::firstOrCreate([
            'name' => 'Author',
            'email' => 'author@example.com',
            'password' => Hash::make('password123'),
        ]);
        $author->assignRole('author');
    }
}
