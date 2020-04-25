/**
 * ShoppingCart Module
 */

const state = {
    productsCount: 0
}


// actions
const actions = {

}

// mutations
const mutations = {
    increment(state){
         state.productsCount++;
      }
}

export default {
   state,
   actions,
   mutations
}
