<template>
<section>
    <material-transition-group  tag="div" class="row">
        <product-card-component :product="product" :data-index="index" v-for="(product, index) in products" :key="product.id"></product-card-component>
    </material-transition-group>
</section>
</template>
<script>
export default {
    name: 'productos',
    data() {
        return {
            products: [],
            endpoint: "/products"
        }
    },
    created() {
        this.fetchProducts();
    },
    methods: {
        fetchProducts() {
          axios.get(this.endpoint)
                  .then((res) => {
                      this.products = res.data.data;
                  })
        }
    }
}
</script>
