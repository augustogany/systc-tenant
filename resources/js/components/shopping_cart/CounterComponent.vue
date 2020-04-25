<template>
    <div>
        <a href="/carrito">Mi Carrito {{ productsCount}}</a>
    </div>
</template>
<script>
import { mapState, mapActions} from 'vuex'
export default {
   props: [
       'count'
   ],
   created(){
    window.store.commit('set',this.count);
   },
   computed: {
      productsCount() {
          return window.store.state.productsCount;
      }
   }

}
</script>