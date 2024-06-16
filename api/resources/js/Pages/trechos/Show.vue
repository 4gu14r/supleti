<template>
    <div class="container">
        <h2>Detalhes do Trecho</h2>

        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">UF: {{ trecho.uf.uf }}</h5>
                <p class="card-text">Rodovia: {{ trecho.rodovia.rodovia }}</p>
                <p class="card-text">KM Inicial: {{ trecho.quilometragem_inicial }}</p>
                <p class="card-text">KM Final: {{ trecho.quilometragem_final }}</p>

                <div>
                    <Link :href="'/trechos'" class="btn btn-info">Voltar para a lista</Link>
                    <Link :href="'/trechos/' + trecho.id + '/edit'" class="btn btn-primary">Editar</Link>

                    <form @submit.prevent="form.post(`/trechos/${trecho.id}`)" style="display: inline-block;">
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </div>
            </div>
        </div>

        <div id="map" style="height: 400px;"></div>
    </div>
</template>

<script setup>
import { defineProps, onMounted } from 'vue';
import L from 'leaflet';

const props = defineProps(['trecho']);



/* ------------- MAPA ----------------*/
onMounted(() => {
    const geoJSONData = JSON.parse(props.trecho.geo);

    const coordinates = geoJSONData.geometry.coordinates;
    const latLngs = coordinates.map(coord => [coord[1], coord[0]]);

    const bounds = L.latLngBounds(latLngs);

    const map = L.map('map');

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</Link>'
    }).addTo(map);

    const geoLayer = L.geoJSON(geoJSONData, {
        style: {
            color: 'red',
            weight: 3,
            opacity: 0.7
        }
    }).addTo(map);

    map.fitBounds(geoLayer.getBounds());
});

/* ------------- MAPA ----------------*/
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

<style>
#map {
    width: 100%;
}
</style>
