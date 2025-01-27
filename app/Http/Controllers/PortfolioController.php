<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function showDetail()
    {
        return view('Template.portfolioDetail');
    }
}
