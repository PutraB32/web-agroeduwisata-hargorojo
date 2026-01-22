<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index(Request $request)
    {
        // Logic for displaying the dashboard
        return view('welcome');
    }
}
