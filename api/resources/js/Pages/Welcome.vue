<template>
  <div class="container card mt-3">
    <h3>Aviso</h3>
    <p>Antes eu ter começado a desenvolver eu não tinha lido direito as instruções, quando fui ver já era tarde de mais, tinha terminado projeto. Era só a questao dos requistos de ser laravel 9, php 7 e etc. rsrs e deixe o mapa na parte da visualização, pois tinha visto somente depois a imagem na parte de baixo do PDF.</p>
    <p>Para começar é só clicar em <b>Trechos</b> que ele vai te entrar e redirecionar para a página. </p>

  </div>

  <div class="row d-flex justify-content-center mt-3">
    <Link href="/trechos" class="btn btn-warning col-2">Trechos</Link>
  </div>
</template>

<script>
import { Link } from '@inertiajs/vue3';

export default {
  components: {
    Link
  }
}
</script>
