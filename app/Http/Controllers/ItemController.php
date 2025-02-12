<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Item;
use app\Models\Image;
use app\Models\Nuclearpedia;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with('image')->get();
        return view('landing page.nuclearpedia', compact('items'));
    }

    public function show($id)
    {
        $item = Item::with(['image', 'nuclearpedia'])->findOrFail($id);
        return view('Template.nuclearpediaDetail', compact('item'));
    }
}
