<template>
  <div class="container">
    <h2>Listagem de Trechos</h2>

    <Link href="/trechos/create" class="btn btn-warning mb-3">Novo Trecho</Link>

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
          <td>{{ trecho.rodovia.rodovia }}</td>
          <td>{{ trecho.quilometragem_inicial }}</td>
          <td>{{ trecho.quilometragem_final }}</td>
          <td>
            <Link :href="'/trechos/' + trecho.id" class="btn btn-info">Ver</Link>
            <Link :href="'/trechos/' + trecho.id + '/edit'" class="btn btn-primary">Editar</Link>

            <form @submit.prevent="form.post(`/trechos/${trecho.id}`)" style="display: inline-block;">
              <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
import { defineProps } from 'vue';
const props = defineProps(['trechos']);

const route = (name, params = {}) => {
  switch (name) {
    case 'trechos.destroy':
      return `/trechos/${params.id}`;
    default:
      return '/trechos';
  }
};

</script>

<script>
import { Link, useForm } from '@inertiajs/vue3';

const form = useForm({
  _method: 'delete',
});

export default {
  components: {
    Link
  }
}
</script>
