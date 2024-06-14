<template>
  <div class="container">
    <h2>Editar Trecho</h2>

    <form @submit.prevent="submitForm">
      <div class="form-group">
        <label for="data_referencia">Data de Referência:</label>
        <input v-model="form.data_referencia" type="date" id="data_referencia" class="form-control">
      </div>
      <div class="form-group">
        <label for="uf_id">UF:</label>
        <select v-model="form.uf_id" id="uf_id" class="form-control">
          <option v-for="uf in ufs" :key="uf.id" :value="uf.id">{{ uf.sigla }}</option>
        </select>
      </div>
      <div class="form-group">
        <label for="rodovia_id">Rodovia:</label>
        <select v-model="form.rodovia_id" id="rodovia_id" class="form-control">
          <option v-for="rodovia in rodovias" :key="rodovia.id" :value="rodovia.id">{{ rodovia.nome }}</option>
        </select>
      </div>
      <div class="form-group">
        <label for="quilometragem_inicial">KM Inicial:</label>
        <input v-model="form.quilometragem_inicial" type="text" id="quilometragem_inicial" class="form-control">
      </div>
      <div class="form-group">
        <label for="quilometragem_final">KM Final:</label>
        <input v-model="form.quilometragem_final" type="text" id="quilometragem_final" class="form-control">
      </div>

      <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
  </div>
</template>

<script setup>
import { defineProps, reactive, onMounted } from 'vue';
import { Inertia } from '@inertiajs/inertia';

const props = defineProps({
  trecho: Object,
  ufs: Array,
  rodovias: Array,
});

const form = reactive({
  data_referencia: null,
  uf_id: null,
  rodovia_id: null,
  quilometragem_inicial: null,
  quilometragem_final: null,
});

onMounted(() => {
  // Preenche o formulário com os dados do trecho que está sendo editado
  form.data_referencia = props.trecho.data_referencia;
  form.uf_id = props.trecho.uf_id;
  form.rodovia_id = props.trecho.rodovia_id;
  form.quilometragem_inicial = props.trecho.quilometragem_inicial;
  form.quilometragem_final = props.trecho.quilometragem_final;
});

const submitForm = () => {
  Inertia.put(route('trechos.update', { id: props.trecho.id }), form);
};

const route = (name, params = {}) => {
  switch (name) {
    case 'trechos.update':
      return `/trechos/${params.id}`;
    case 'trechos.index':
      return '/trechos';
    default:
      return '/';
  }
};
</script>
