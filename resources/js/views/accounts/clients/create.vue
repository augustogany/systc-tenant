<template>
    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Crear Cliente</h3>
                </div>
                <div class="col-4 text-right">
                    <input type="button" class="btn btn-sm btn-primary" value="atras" @click="toIndex">
                </div>
            </div>
              <div class="card-body">
                   <h6 class="heading-small text-muted mb-4">Informacion para los dominios</h6>
                   <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Subdominio</label>
                                    <input type="text" class="form-control" placeholder="example.systcarv.test">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Dominio(opcional)</label>
                                    <input type="text" class="form-control" placeholder="example.test">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-first-name">Seleccione Plan</label>
                                    <v-select
                                        @search="selectPlan"
                                        label="nickname"
                                        :options="arrayPlanes"
                                        placeholder="seleccione plan....."
                                        @input="getDatosPlanes"                                        
                                    >
                                    </v-select>
                                </div>
                            </div>
                        </div>
                        <input type="button" class="btn btn-primary" value="guardar">      
                    </div>
              </div>
        </div>
    </div>
</template>
<script>
import vSelect from 'vue-select'
export default {
     name: 'crear-cliente',
     components: {
         vSelect
     },
    data() {
        return {
            plan: {},
            arrayPlanes: []
        }
    },
    methods: {
        toIndex(){
            this.$router.push({name:'list_client'});
        },
         selectPlan(search,loading){
            let me=this;
            loading(true)
            var url= '/selectplanes?filtro='+search;
            axios.get(url).then(function (response) {
                let respuesta = response.data;
                q: search
                me.arrayPlanes=respuesta.planes;
                loading(false)
            })
            .catch(function (error) {
                console.log(error);
            });
      },
      getDatosPlanes(val){
            let me = this;
            me.loading = true;
            me.plan = val;
        }
    }
}
</script>