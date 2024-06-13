<!-- resources/js/Pages/Trechos/Index.vue -->

<template>
    <app-layout>
        <h1>Listagem de Trechos</h1>

        <inertia-link href="/trechos/create" class="btn btn-primary mb-2">Novo Trecho</inertia-link>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Data de Referência</th>
                    <th>UF</th>
                    <th>Rodovia</th>
                    <th>Quilometragem Inicial</th>
                    <th>Quilometragem Final</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="trecho in trechos" :key="trecho.id">
                    <td>{{ trecho.id }}</td>
                    <td>{{ trecho.data_referencia }}</td>
                    <td>{{ trecho.uf.nome }}</td>
                    <td>{{ trecho.rodovia.nome }}</td>
                    <td>{{ trecho.quilometragem_inicial }}</td>
                    <td>{{ trecho.quilometragem_final }}</td>
                    <td>
                        <inertia-link :href="`/trechos/${trecho.id}`" class="btn btn-info">Ver</inertia-link>
                        <inertia-link :href="`/trechos/${trecho.id}/edit`" class="btn btn-primary">Editar</inertia-link>
                        <button @click="deleteTrecho(trecho.id)" class="btn btn-danger">Excluir</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </app-layout>
</template>

<script>
import { defineComponent } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import AppLayout from '@/Layouts/AppLayout';

export default defineComponent({
    name: 'TrechosIndex',
    components: {
        AppLayout,
    },
    props: {
        trechos: Array,
    },
    methods: {
        deleteTrecho(id) {
            if (confirm('Tem certeza que deseja deletar este trecho?')) {
                Inertia.delete(`/trechos/${id}`);
            }
        },
    },
});
</script>

<style scoped>
/* Adicione seus estilos aqui */
</style>
