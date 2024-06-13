<!-- resources/js/Layouts/AppLayout.vue -->

<template>
    <div>
        <header>
            <nav>
                <ul>
                    <li><inertia-link href="/">Home</inertia-link></li>
                    <li><inertia-link href="/trechos">Trechos</inertia-link></li>
                </ul>
            </nav>
        </header>
        <main>
            <slot></slot>
        </main>
    </div>
</template>

<script>
export default {
    name: 'AppLayout',
};
</script>

<style scoped>
/* Adicione seus estilos aqui */
</style>
