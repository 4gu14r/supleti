<template>
  <div class="container">
    <h2>Novo Trecho</h2>
    
    <form @submit.prevent="submitForm">
      <div class="form-group">
        <label for="data_referencia">Data de Referência:</label>
        <input v-model="form.data_referencia" type="date" id="data_referencia" class="form-control">
      </div>
      <div class="form-group">
        <label for="uf_id">UF:</label>
        <select v-model="form.uf_id" id="uf_id" class="form-control">
          <option v-for="uf in ufs" :key="uf.id" :value="uf.id">{{ uf.uf }}</option>
        </select>
      </div>
      <div class="form-group">
        <label for="rodovia_id">Rodovia:</label>
        <select v-model="form.rodovia_id" id="rodovia_id" class="form-control">
          <option v-for="rodovia in filteredRodovias" :key="rodovia.id" :value="rodovia.id">{{ rodovia.rodovia }}</option>
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
import { defineProps, reactive, computed } from 'vue';
import { router } from '@inertiajs/vue3';

const props = defineProps({
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

// Computed property to filter rodovias based on the selected UF
const filteredRodovias = computed(() => {
  return props.rodovias.filter(rodovia => rodovia.uf_id === form.uf_id);
});

const route = (name, params = {}) => {
  switch (name) {
    case 'trechos.store':
      return '/trechos'; 
    default:
      return '/';
  }
};

const submitForm = () => {
  router.post(route('trechos.store'), form);
};
</script>
