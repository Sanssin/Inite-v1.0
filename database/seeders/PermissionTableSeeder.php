<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'upload-nuclearpedia',
            'manage-nuclearpedia',
            'manage-event',
        ];

        foreach ($permissions as $permission) {
            // Gunakan firstOrCreate untuk mencegah duplikasi permission
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        };

    }
}
