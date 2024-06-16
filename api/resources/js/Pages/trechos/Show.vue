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
                    <a :href="route('trechos.index')" class="btn btn-info">Voltar para Lista</a>
                    <a :href="route('trechos.edit', { id: trecho.id })" class="btn btn-primary">Editar</a>

                    <form @submit.prevent="deleteTrecho(trecho.id)" style="display: inline-block;">
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
            Inertia.visit(route('trechos.index'));
        });
    }
};

onMounted(() => {
    const geoJSONData = JSON.parse(props.trecho.geo);

    const coordinates = geoJSONData.geometry.coordinates;
    const latLngs = coordinates.map(coord => [coord[1], coord[0]]);

    const bounds = L.latLngBounds(latLngs);

    const map = L.map('map');

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
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
</script>

<style>
#map {
    width: 100%;
}
</style>
