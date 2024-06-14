<!-- resources/views/trechos/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Detalhes do Trecho</h1>

    <div>
        <strong>ID:</strong> {{ $trecho->id }}
    </div>
    <div>
        <strong>Data de Referência:</strong> {{ $trecho->data_referencia }}
    </div>
    <div>
        <strong>UF:</strong> {{ $trecho->uf->nome }}
    </div>
    <div>
        <strong>Rodovia:</strong> {{ $trecho->rodovia->nome }}
    </div>
    <div>
        <strong>Quilometragem Inicial:</strong> {{ $trecho->quilometragem_inicial }}
    </div>
    <div>
        <strong>Quilometragem Final:</strong> {{ $trecho->quilometragem_final }}
    </div>
    <div>
        <strong>Geometria (GeoJSON):</strong> {{ $trecho->geo }}
    </div>

    <a href="{{ route('trechos.index') }}" class="btn btn-secondary">Voltar</a>
    <a href="{{ route('trechos.edit', $trecho->id) }}" class="btn btn-primary">Editar</a>
    <form action="{{ route('trechos.destroy', $trecho->id) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar este trecho?')">Excluir</button>
    </form>
@endsection
