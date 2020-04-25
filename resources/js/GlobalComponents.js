import AddProductBtn from 'Components/products/AddToCartComponent';
import ProductsCounterComponent from 'Components/shopping_cart/CounterComponent';
import ProductsShoppingComponent from 'Components/shopping_cart/ProductShoppingCartComponent';
import ProductsComponent from 'Components/products/ProductsComponent';
import ProductCardComponent from 'Components/products/ProductCardComponent';
import MaterialTransitionGroup from 'Components/animations/MaterialCollection';

const GlobalComponents= {
  install(Vue){
    Vue.component('addproductbtn', AddProductBtn);
    Vue.component('productscountercomponent', ProductsCounterComponent);
    Vue.component('productsshoppingcomponent', ProductsShoppingComponent);
    Vue.component('ProductsComponent', ProductsComponent);
    Vue.component('productcardcomponent', ProductCardComponent);
    Vue.component('materialtransitiongroup', MaterialTransitionGroup);
  }
};

export default GlobalComponents;