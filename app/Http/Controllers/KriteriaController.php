<?php

namespace App\Http\Controllers;

use App\Models\creteria;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriteria = Kriteria::all();

        return view('ahp.kriteria', ['kriteria' => $kriteria]);
    }
}
