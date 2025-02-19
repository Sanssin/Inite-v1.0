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
            'slug' => Str::slug($request->judul),
        ]);

        // Simpan file materi dengan nama asli
        $fileName = time() . '-' . $request->file('file')->getClientOriginalName(); // Tambah timestamp agar unik
        $filePath = $request->file('file')->storeAs('nuclearpedia', $fileName, 'public');

        // Simpan data ke tabel `nuclearpedia`
        Nuclearpedia::create([
            'item_id' => $item->id,
            'file_path' => $filePath, // Simpan path relatif
        ]);

        // Simpan gambar dengan nama asli
        $imageName = time() . '-' . $request->file('gambar')->getClientOriginalName();
        $imagePath = $request->file('gambar')->storeAs('images', $imageName, 'public');

        // Simpan data ke tabel `image`
        Image::create([
            'item_id' => $item->id,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('nuclearpedia.create')->with('success', 'Materi berhasil diupload!');
    }

}
