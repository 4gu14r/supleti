<template>

  <div class="container">
  </div>
  <div class="container">
    <h2>Listagem de Trechos</h2>

    <a :href="route('trechos.create')" class="btn btn-warning mb-3">Novo Trecho</a>

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
        <tr v-for="trecho in trechos.data" :key="trecho.id">
          <td>{{ trecho.uf.uf }}</td> 
          <td>{{ trecho.rodovia.rodovia}}</td> 
          <td>{{ trecho.quilometragem_inicial }}</td>
          <td>{{ trecho.quilometragem_final }}</td>
          <td>
            <a :href="route('trechos.show', { id: trecho.id })" class="btn btn-info">Ver</a>
            <a :href="route('trechos.edit', { id: trecho.id })" class="btn btn-primary">Editar</a>
            
            <!-- Formulário para exclusão -->
            <form @submit.prevent="deleteTrecho(trecho.id)" style="display: inline-block;">
              <button type="submit" class="btn btn-danger" >Excluir</button>
            </form>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
import { defineProps } from 'vue';
import { router } from '@inertiajs/vue3';

const props = defineProps(['trechos']);

const route = (name, params = {}) => {
  switch (name) {
    case 'trechos.create':
      return '/trechos/create'; 
    case 'trechos.show':
      return `/trechos/${params.id}`; 
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
    router.delete(route('trechos.destroy', { id }))
  }
};
</script>
