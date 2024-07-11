<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AllController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function field_place()
    {
        return view('ahp.field_place');
    }

    public function contact()
    {
        return view('layouts.contact');
    }
}
