<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OfficioController extends Controller
{
    public function index()
    {
        return view('officio.index');
    }
}
