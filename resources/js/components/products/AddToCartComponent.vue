<template>
    <div>
        <button @click="addToCart" class="btn btn-primary">{{message}}</button>
    </div>
</template>
<script>
export default {
    data() {
        return {
            message: 'agregar al carrito',
            endpoint: '/in_shopping_carts'
        }
    },
    props: {
      product: {
          type: Object
      }
    },
    methods: {
         addToCart() {
           axios({
               method: 'POST',
               url: this.endpoint,
               data: {
                   product_id: this.product.id
               },
               headers: {
                   'Accept': 'application/json',
                   'Content-Type': 'application/json'
               }
           }).then(()=>{
               window.store.commit("incremen")
           })
         }   
    }
}
</script>