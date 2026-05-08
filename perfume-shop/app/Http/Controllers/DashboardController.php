<?php

namespace App\Http\Controllers;

use App\Models\Parfum;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $parfums = Parfum::latest()->take(3)->get();
        
        return view('dashboard', compact('parfums'));
    }
}