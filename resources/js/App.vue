<template>

    <main>
        <div class="container py-4">
            <header class="pb-3 mb-4 border-bottom">
                <h1>Eco Baltia book list</h1>
            </header>

            <router-view v-slot="{ Component, route }">
                <div :key="route.name">
                    <Component :is="Component" />
                </div>
            </router-view>
        </div>
    </main>

</template>