<!-- resources/views/trechos/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Criar Novo Trecho</h1>

    <!-- Formulário para criar novo trecho -->
    <form action="{{ route('trechos.store') }}" method="POST">
        @csrf

        <div>
            <label for="data_referencia">Data de Referência:</label>
            <input type="date" name="data_referencia" id="data_referencia" value="{{ old('data_referencia') }}">
            @error('data_referencia')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="uf_id">Unidade da Federação:</label>
            <select name="uf_id" id="uf_id">
                @foreach ($ufs as $uf)
                    <option value="{{ $uf->id }}" {{ old('uf_id') == $uf->id ? 'selected' : '' }}>{{ $uf->nome }}</option>
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
                    <option value="{{ $rodovia->id }}">{{ $rodovia->nome }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="quilometragem_inicial">Quilometragem Inicial:</label>
            <input type="number" name="quilometragem_inicial" id="quilometragem_inicial">
        </div>

        <div>
            <label for="quilometragem_final">Quilometragem Final:</label>
            <input type="number" name="quilometragem_final" id="quilometragem_final">
        </div>

        <button type="submit">Salvar Trecho</button>
    </form>
@endsection
