<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\Image;
use App\Models\Nuclearpedia;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $item = Item::create([
            'title' => 'Reaksi Fisi dan Fusi ',
            'description' => 'Reaksi Fisi dan Fusi merupakan reaksi pada inti atom',
            'author' => 'Admin',
        ]);

        Image::create([
            'item_id' => $item->id,
            'image_path' => 'images/image.png', // Sesuaikan dengan path gambar di storage
        ]);

        Nuclearpedia::create([
            'item_id' => $item->id,
            'file_path' => 'nuclearpedia/ReaksiFisidanFusi.docx', // Sesuaikan dengan file materi di storage
        ]);

    }
}
