<?php

namespace App\Http\Controllers;

use App\Models\Rodovia;
use Illuminate\Http\Request;

class RodoviaController extends Controller
{
    public function index()
    {
        $rodovias = Rodovia::all();
        return view('rodovias.index', compact('rodovias'));
    }
}
