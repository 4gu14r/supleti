<?php

namespace App\Http\Controllers;

use App\Models\Trecho;
use Illuminate\Http\Request;

class TrechoController extends Controller
{
    //

    public function index()
    {
        $trechos = Trecho::paginate(10); // Paginação com 10 registros por página

        return view('trechos.index', compact('trechos'));
    }

    public function create(){}

    public function show($id){}
    

    public function edit($id){}

    public function update(Request $request, $id){}

    public function destroy($id){}

    public function store(Request $request)
    {
        $data = $request->validate([
            'data_referencia' => 'required|date',
            'uf_id' => 'required|exists:ufs,id',
            'rodovia_id' => 'required|exists:rodovias,id',
            'tipo_trecho' => 'required|in:A,B', 
            'quilometragem_inicial' => 'required|numeric',
            'quilometragem_final' => 'required|numeric|gt:quilometragem_inicial',
        ]);
        
        $trecho = Trecho::create($data);
        
        return redirect()->back()->with('success', 'Trecho criado com sucesso!');
    }

}