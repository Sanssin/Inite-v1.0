<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NuclearpediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $files = Storage::disk('public')->files('nuclearpedia');

        foreach ($files as $file) {
            if (pathinfo($file, PATHINFO_EXTENSION) === 'docx') {
                DB::table('nuclearpedia')->insert([
                    'title' => pathinfo($file, PATHINFO_FILENAME),
                    'file_path' => $file,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
