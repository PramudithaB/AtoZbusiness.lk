<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PastPaperController extends Controller
{
    /**
     * Display the public Past Papers repository (No login required)
     */
    public function index()
    {
        return view('pastpapers.index');
    }
}
