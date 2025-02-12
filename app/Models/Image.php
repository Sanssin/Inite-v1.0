<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'nuclearpedia_images';
    protected $fillable = ['item_id', 'image_path'];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
