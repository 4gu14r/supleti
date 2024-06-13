<template>
    <div>
        <h1>Lista de Trechos</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Data de Referência</th>
                    <th>UF</th>
                    <th>Rodovia</th>
                    <th>Quilometragem Inicial</th>
                    <th>Quilometragem Final</th>
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
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { Inertia } from '@inertiajs/inertia';

const trechos = ref([]);

onMounted(() => {
    Inertia.get('/trechos').then(response => {
        trechos.value = response.props.trechos;
    });
});
</script>
