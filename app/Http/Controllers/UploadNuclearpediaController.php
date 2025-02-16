<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Nuclearpedia;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadNuclearpediaController extends Controller
{
    public function create()
    {
        return view('admin.upload'); // Pastikan file 'upload.blade.php' ada di 'resources/views'
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'file' => 'required|mimes:docx,pdf|max:2048',
            'gambar' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        // Simpan data ke tabel `item`
        $item = Item::create([
            'title' => $request->judul,
            'description' => $request->deskripsi,
            'slug' => Str::slug($request->title),
        ]);

        // Simpan file materi ke storage
        $filePath = $request->file('file')->store('nuclearpedia', 'public');

        // Simpan data ke tabel `nuclearpedia`
        Nuclearpedia::create([
            'item_id' => $item->id, // Foreign key ke item
            'file_path' => Storage::url($filePath),
        ]);

        // Simpan gambar ke storage
        $imagePath = $request->file('gambar')->store('images', 'public');

        // Simpan data ke tabel `image`
        Image::create([
            'item_id' => $item->id, // Foreign key ke item
            'image_path' => Storage::url($imagePath),
        ]);

        return redirect()->route('nuclearpedia.create')->with('success', 'Materi berhasil diupload!');
    }
}
