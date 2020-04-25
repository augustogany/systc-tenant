<template>
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card bg-default shadow">
                    <!-- Card header -->
                    <div class="card-header bg-transparent border-0 d-flex justify-content-between">
                     <h3 class="text-white mb-0">List Clientes</h3>
                     <input type="button" class="btn btn-sm btn-neutral" @click="goToCreate" value="Nuevo">
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-dark table-flush">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col" class="sort">ID</th>
                                    <th scope="col" class="sort">Plan</th>
                                    <th scope="col" class="sort">Intervalo</th>
                                    <th scope="col" class="sort">Dominios</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                <tr v-if="!loading" v-for="item in clientes" :key="item.id">
                                    <td class="budget">
                                        {{item.data.id}}
                                    </td>
                                    <td class="budget">
                                        {{item.data.plan}}
                                    </td>
                                    <td class="budget">
                                        {{item.data.interval}}
                                    </td>
                                    <td class="budget">
                                        {{item.domains}}
                                    </td>
                                    <td class="table-actions">
                                        <a href="#!" class="table-action" data-toggle="tooltip" data-original-title="Edit product">
                                            <i class="fas fa-user-edit"></i>
                                        </a>
                                        <a href="#!" class="table-action table-action-delete" data-toggle="tooltip" data-original-title="Delete product">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td  v-if="loading" :colspan="clientes">
                                        <loading :loading="loading"></loading>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Card footer -->
                    <div class="card-footer py-4">
                        <nav aria-label="...">
                            <ul class="pagination justify-content-end mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">
                                    <i class="fas fa-angle-left"></i>
                                    <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">
                                    <i class="fas fa-angle-right"></i>
                                    <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Loading from 'Components/common/loading'
    export default {
        data() {
            return {
                headings: [
                    'ID',
                    'Plan',
                    'Persiste'
                ],
                clientes: [],
                loading: true
            }
        },
        components: {
            Loading
        },
        mounted() {
           this.fetchClients();
        },
        methods: {
            async fetchClients() {
                 try{
                    let response = await axios.get('/fetchclients')
                    this.clientes = response.data;
                    }catch(err){
                    console.log(err)
                    }
               this.loading = false;
            },
            goToCreate() {
                this.$router.push({name: 'create_client'});
            },
            editRecord(record) {
                this.$router.push(`/clientes/${record.id}/edit`);
            }
        }
    }
</script>

<style scoped>

</style>