<!-- resources/views/trechos/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Editar Trecho</h1>

    <form action="{{ route('trechos.update', $trecho->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="data_referencia">Data de Referência:</label>
            <input type="date" name="data_referencia" id="data_referencia" value="{{ old('data_referencia', $trecho->data_referencia) }}">
            @error('data_referencia')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="uf_id">Unidade da Federação:</label>
            <select name="uf_id" id="uf_id">
                @foreach ($ufs as $uf)
                    <option value="{{ $uf->id }}" {{ old('uf_id', $trecho->uf_id) == $uf->id ? 'selected' : '' }}>{{ $uf->nome }}</option>
                @endforeach
            </select>
            @error('uf_id')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="rodovia_id">Rodovia:</label>
            <select name="rodovia_id" id="rodovia_id">
                @foreach ($rodovias as $rodovia)
                    <option value="{{ $rodovia->id }}" {{ old('rodovia_id', $trecho->rodovia_id) == $rodovia->id ? 'selected' : '' }}>{{ $rodovia->nome }}</option>
                @endforeach
            </select>
            @error('rodovia_id')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="quilometragem_inicial">Quilometragem Inicial:</label>
            <input type="number" name="quilometragem_inicial" id="quilometragem_inicial" value="{{ old('quilometragem_inicial', $trecho->quilometragem_inicial) }}">
            @error('quilometragem_inicial')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="quilometragem_final">Quilometragem Final:</label>
            <input type="number" name="quilometragem_final" id="quilometragem_final" value="{{ old('quilometragem_final', $trecho->quilometragem_final) }}">
            @error('quilometragem_final')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Atualizar Trecho</button>
    </form>
@endsection
