<?php

namespace App\Http\Controllers;


use App\Models\Uf;
use Illuminate\Http\Request;

class UfController extends Controller
{
    public function index()
    {
        $ufs = Uf::all();
        return view('ufs.index', compact('ufs'));
    }


}
