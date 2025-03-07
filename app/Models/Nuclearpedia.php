<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nuclearpedia extends Model
{
    use HasFactory;

    protected $table = 'nuclearpedias';
    protected $fillable = ['item_id', 'file_path'];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }

    public function image()
    {
        return $this->hasOne(Image::class, 'item_id', 'id');
    }
}
