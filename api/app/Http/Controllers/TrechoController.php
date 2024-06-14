<?php

namespace App\Http\Controllers;

use App\Models\Trecho;
use App\Models\Uf;
use App\Models\Rodovia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
class TrechoController extends Controller
{
    public function index()
    {
        $trechos = Trecho::with(['uf', 'rodovia'])->paginate(10); // Paginação com 10 registros por página
        return Inertia::render('trechos/Index', [
            'trechos' => $trechos
        ]);
    }

    public function create()
    {
        $ufs = Uf::all();
        $rodovias = Rodovia::all();
        return Inertia::render('trechos/Create', [
            'ufs' => $ufs,
            'rodovias' => $rodovias,
        ]);
    }

    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'data_referencia' => 'required|date',
            'uf_id' => 'required|exists:ufs,id',
            'rodovia_id' => 'required|exists:rodovias,id',
            'quilometragem_inicial' => 'required|numeric',
            'quilometragem_final' => 'required|numeric|gte:quilometragem_inicial',
        ]);

        // Cria um novo trecho com os dados do formulário
        Trecho::create($request->all());

        // Redireciona de volta para a página de listagem de trechos
        return Redirect::route('trechos.index')->with('success', 'Trecho criado com sucesso.');
    }

    public function show($id)
    {
        $trecho = Trecho::with(['uf', 'rodovia'])->findOrFail($id);
        return Inertia::render('trechos/Show', [
            'trecho' => $trecho
        ]);
    }

    public function edit($id)
    {
        $trecho = Trecho::findOrFail($id);
        $ufs = Uf::all();
        $rodovias = Rodovia::all();
        return Inertia::render('trechos/Edit', [
            'trecho' => $trecho,
            'ufs' => $ufs,
            'rodovias' => $rodovias,
        ]);
    }

    public function update(Request $request, $id)
    {
        // Validação dos dados do formulário
        $request->validate([
            'data_referencia' => 'required|date',
            'uf_id' => 'required|exists:ufs,id',
            'rodovia_id' => 'required|exists:rodovias,id',
            'quilometragem_inicial' => 'required|numeric',
            'quilometragem_final' => 'required|numeric|gte:quilometragem_inicial',
        ]);

        // Encontra o trecho existente e atualiza com os dados do formulário
        $trecho = Trecho::findOrFail($id);
        $trecho->update($request->all());

        // Redireciona de volta para a página de listagem de trechos
        return Redirect::route('trechos.index')->with('success', 'Trecho atualizado com sucesso.');
    }

    public function destroy($id)
    {

        $trecho = Trecho::findOrFail($id);
        $trecho->delete();

        
        return Redirect::route('trechos.index');
    }
}
