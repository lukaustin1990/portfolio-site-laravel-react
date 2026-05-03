<script setup>
import { ref, onMounted } from "vue";

const products = ref([]);
const loading = ref(true);
const error = ref(null);

onMounted(async () => {
    try {
        const res = await fetch("/api/products");

        if (!res.ok) {
            throw new Error("Failed to fetch");
        }

        const data = await res.json();
        products.value = data;
    } catch (err) {
        error.value = err.message;
    } finally {
        loading.value = false;
    }
});
</script>
<template>
    <p v-if="loading">Loading...</p>

    <p v-else-if="error">Error: {{ error }}</p>

    <p v-else-if="products.length === 0">Nothing listed</p>

    <div v-else>
        <div
            v-for="product in products"
            :key="`product_card_${product.id}`"
            class="card mb-3"
        >
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-lg-auto">
                        <img
                            :src="
                                product.image ||
                                'https://placehold.co/100?text=No+Image'
                            "
                            :alt="product.name"
                            class="img-fluid"
                            loading="lazy"
                        />
                    </div>

                    <div class="col-12 col-lg">
                        <h2 class="card-title">{{ product.name }}</h2>
                        <span class="text-muted w-100 text-truncate">{{
                            product.description_short
                        }}</span>
                    </div>

                    <div class="col-12 col-lg-3 text-end">
                        <h3 class="mb-3">
                            £{{ Number(product.price).toFixed(2) }}
                        </h3>
                        <button class="btn btn-primary w-100">
                            Add to Basket
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
