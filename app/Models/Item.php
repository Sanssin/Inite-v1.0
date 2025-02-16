<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Item extends Model
{
    use HasFactory, Sluggable; 

    protected $table = 'items';
    protected $fillable = ['title', 'description', 'slug'];

    /**
     * Relasi dengan model Image
     */
    public function image()
    {
        return $this->hasOne(Image::class, 'item_id');
    }

    /**
     * Relasi dengan model Nuclearpedia
     */
    public function nuclearpedia()
    {
        return $this->hasOne(Nuclearpedia::class, 'item_id');
    }

    /**
     * Konfigurasi Sluggable
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title' // Membuat slug dari kolom 'title'
            ]
        ];
    }
}