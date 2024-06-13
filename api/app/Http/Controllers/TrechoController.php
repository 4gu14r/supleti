<?php

namespace App\Http\Controllers;

use App\Models\Trecho;
use Illuminate\Http\Request;
use App\Models\Uf;
use App\Models\Rodovia;
use Inertia\Inertia;

class TrechoController extends Controller
{
    //

    public function index()
    {
        $trechos = Trecho::paginate(10); // Paginação com 10 registros por página

        return view('trechos.index', compact('trechos'));
    }

    public function create()
    {
        $ufs = Uf::all();
        $rodovias = Rodovia::all();

        return view('trechos.create', compact('ufs', 'rodovias'));
    }

    public function show($id)
    {
        $trecho = Trecho::with(['uf', 'rodovia'])->findOrFail($id);
        return view('trechos.show', compact('trecho'));
    }
    

    public function edit($id)
    {
        $trecho = Trecho::findOrFail($id);
        $ufs = Uf::all();
        $rodovias = Rodovia::all();

        return view('trechos.edit', compact('trecho', 'ufs', 'rodovias'));
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
        $trecho->data_referencia = $request->data_referencia;
        $trecho->uf_id = $request->uf_id;
        $trecho->rodovia_id = $request->rodovia_id;
        $trecho->quilometragem_inicial = $request->quilometragem_inicial;
        $trecho->quilometragem_final = $request->quilometragem_final;

        // Salva as alterações no banco de dados
        $trecho->save();

        // Redireciona de volta para a página de listagem de trechos
        return redirect()->route('trechos.index');
    }

    public function destroy($id)
    {
        $trecho = Trecho::findOrFail($id);
        $trecho->delete();

        // Redireciona de volta para a página de listagem de trechos
        return redirect()->route('trechos.index')->with('success', 'Trecho deletado com sucesso.');
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
        $trecho = new Trecho();
        $trecho->data_referencia = $request->data_referencia;
        $trecho->uf_id = $request->uf_id;
        $trecho->rodovia_id = $request->rodovia_id;
        $trecho->quilometragem_inicial = $request->quilometragem_inicial;
        $trecho->quilometragem_final = $request->quilometragem_final;

        // Salva o trecho no banco de dados
        $trecho->save();

        // Redireciona de volta para a página de listagem de trechos
        return redirect()->route('trechos.index');
    }

}