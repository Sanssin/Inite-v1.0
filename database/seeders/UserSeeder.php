<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Exception;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Buat atau temukan role 'User'
        $roleUser = Role::firstOrCreate(['name' => 'User']);

        // Buat atau temukan pengguna
        $user = User::firstOrCreate(
            ['email' => 'huseinkurnia123@gmail.com'], // Ganti dengan email pengguna yang diinginkan
            [
                'firstName' => 'Husein', // Ganti dengan nama pengguna yang diinginkan
                'lastName' => 'Kurnia',
                'username' => 'Husein Kurnia',
                'password' => Hash::make("password"), // Ganti dengan password yang diinginkan
            ]
        );

        // Tetapkan role 'User' ke pengguna
        if (!$user->hasRole('user')) {
            $user->assignRole($roleUser);
        }
    }
}


