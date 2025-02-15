<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat atau ambil role user, admin, dan author
        $userRole = Role::firstOrCreate(['name' => 'user']);
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $authorRole = Role::firstOrCreate(['name' => 'author']);

        // Buat permission jika belum ada
        $deleteCommentPermission = Permission::firstOrCreate(['name' => 'delete comment']);

        // Berikan permission ke role admin
        $adminRole->givePermissionTo($deleteCommentPermission);
    }
}
