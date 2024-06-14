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
        $request->validate([
            'data_referencia' => 'required|date',
            'uf_id' => 'required|exists:ufs,id',
            'rodovia_id' => 'required|exists:rodovias,id',
            'quilometragem_inicial' => 'required|numeric',
            'quilometragem_final' => 'required|numeric|gte:quilometragem_inicial',
        ]);

        Trecho::create($request->all());

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

        try {
            $request->validate([
                'data_referencia' => 'required|date',
                'uf_id' => 'required|exists:ufs,id',
                'rodovia_id' => 'required|exists:rodovias,id',
                'quilometragem_inicial' => 'required|numeric',
                'quilometragem_final' => 'required|numeric|gte:quilometragem_inicial',
            ]);

            $trecho = Trecho::findOrFail($id);
            $trecho->update($request->all());

            return Redirect::route('trechos.index')->with('success', 'Trecho atualizado com sucesso.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return Redirect::route('trechos.index')->with('error', 'Trecho não encontrado.');
        } catch (\Exception $e) {
            return Redirect::route('trechos.index')->with('error', 'Erro ao atualizar o trecho.');
        }

    }

    public function destroy($id)
    {

        try {
            $trecho = Trecho::findOrFail($id);
            $trecho->delete();

            return Redirect::route('trechos.index')->with('success', 'Trecho deletado com sucesso.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return Redirect::route('trechos.index')->with('error', 'Trecho não encontrado.');
        } catch (\Exception $e) {
            return Redirect::route('trechos.index')->with('error', 'Erro ao deletar o trecho.');
        }
    }
}
