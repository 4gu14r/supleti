<template>
    <div>
      <FormularioCadastroTrecho :ufs="ufs" :rodovias="rodovias" />
    </div>
  </template>
  
  <script>
  import FormularioCadastroTrecho from './Trecho/FormularioCadastroTrecho.vue';
  import { usePage } from '@inertiajs/inertia-vue3';
  
  export default {
    components: {
      FormularioCadastroTrecho,
    },
    props: {
      ufs: Array,
      rodovias: Array,
    },
    setup() {
      const { props } = usePage();
      
      return {
        ufs: props.ufs,
        rodovias: props.rodovias,
      };
    },
  };
  </script>
  