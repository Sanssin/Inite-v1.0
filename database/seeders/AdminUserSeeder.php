<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        // Cek dan buat pengguna admin jika belum ada
        $user = User::firstOrCreate(
            ['email' => 'udinihsan604@gmail.com'],// Kondisi unik
            [
                'firstName' => 'Nur',
                'lastName' => 'Ihsanudin',
                'username' => 'Nur Ihsanudin',
                'password' => Hash::make("password123"),
            ]
            );
        
        // Cek dan buat role Admin jika belum ada
        $roleAdmin = Role::firstOrCreate(['name' => 'Admin']);
        $roleUser = Role::firstOrCreate(['name' => 'User']);
               
        // Ambil semua permissions dan asosiasikan dengan role Admin
        $permissions = Permission::all();
        $roleAdmin->syncPermissions($permissions);

        // Tetapkan role Admin ke pengguna yang baru dibuat
        if (!$user->hasRole('Admin')) {
            $user->assignRole($roleAdmin);
        };

        // Jika ingin membuat dummy users, gunakan factory
        // User::factory()->count(5)->create();
    }
}
