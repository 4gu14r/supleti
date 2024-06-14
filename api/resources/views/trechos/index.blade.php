<div>
    <!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->

    @extends('layouts.app')

    @section('content')
        <div class="container">
            <h2>Listagem de Trechos</h2>


            <a href="{{ route('trechos.create') }}" class="btn btn-primary mb-2">Novo Trecho</a>


            <table class="table">
                <thead>
                    <tr>
                        <th>UF</th>
                        <th>Rodovia</th>
                        <th>KM Inicial</th>
                        <th>KM Final</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trechos as $trecho)
                        <tr>
                            <td>{{ $trecho->uf->sigla }}</td>
                            <td>{{ $trecho->rodovia->nome }}</td>
                            <td>{{ $trecho->quilometragem_inicial }}</td>
                            <td>{{ $trecho->quilometragem_final }}</td>
                            <td>
                                
                                <a href="{{ route('trechos.show', $trecho->id) }}" class="btn btn-info">Ver</a>

                                <a href="{{ route('trechos.edit', $trecho->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                
                                <form action="{{ route('trechos.destroy', $trecho->id) }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Tem certeza que deseja deletar este trecho?')">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $trechos->links() }}
        </div>
    @endsection

</div>
