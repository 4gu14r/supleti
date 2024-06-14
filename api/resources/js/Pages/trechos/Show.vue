<template>
    <div class="container">
        <h2>Detalhes do Trecho</h2>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">UF: {{ trecho.uf.sigla }}</h5>
                <p class="card-text">Rodovia: {{ trecho.rodovia.nome }}</p>
                <p class="card-text">KM Inicial: {{ trecho.quilometragem_inicial }}</p>
                <p class="card-text">KM Final: {{ trecho.quilometragem_final }}</p>

                <!-- Botões de Ação -->
                <div>
                    <a :href="route('trechos.index')" class="btn btn-primary">Voltar para Lista</a>
                    <a :href="route('trechos.edit', { id: trecho.id })" class="btn btn-sm btn-primary">Editar</a>

                    <!-- Formulário para exclusão -->
                    <form @submit.prevent="deleteTrecho(trecho.id)" style="display: inline-block;">
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { defineProps } from 'vue';
import { Inertia } from '@inertiajs/inertia';

const props = defineProps(['trecho']);

const route = (name, params = {}) => {
    switch (name) {
        case 'trechos.index':
            return '/trechos';
        case 'trechos.edit':
            return `/trechos/${params.id}/edit`;
        case 'trechos.destroy':
            return `/trechos/${params.id}`;
        default:
            return '/';
    }
};

const deleteTrecho = (id) => {
    if (confirm('Tem certeza que deseja deletar este trecho?')) {
        Inertia.delete(route('trechos.destroy', { id })).then(() => {
            // Após a exclusão, redireciona para a lista de trechos
            Inertia.visit(route('trechos.index'));
        });
    }
};
</script>