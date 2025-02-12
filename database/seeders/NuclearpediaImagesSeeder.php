<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Item;

class NuclearpediaImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pastikan ada item di tabel items
        $item = Item::first();

        if (!$item) {
            // Jika belum ada item, buat satu item terlebih dahulu
            $item = Item::create([
                'title' => 'Pembangkit Listrik Tenaga Nuklir',
                'description' => 'Pembangkit Listrik Tenaga Nuklir (PLTN) menghasilkan listrik dari reaksi inti atom',
            ]);
        }

        // Ambil file dari folder 'images' untuk gambar
        $imageFiles = Storage::disk('public')->files('images');

        foreach ($imageFiles as $file) {
            if (in_array(pathinfo($file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif'])) {
                DB::table('nuclearpedia_images')->insert([
                    'item_id'    => $item->id,  // Menautkan ke item yang sudah ada
                    'image_path' => $file,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
