<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NuclearpediaController extends Controller
{
    public function showDetail()
    {
        return view('Template.nuclearpediaDetail');
    }
}
