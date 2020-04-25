
//contenedor padre para todas las rutas
const master = () => import('Views/accounts/master');

//modulo de los clientes de accounts
const clientes = () => import('Views/accounts/clients');
const createClient = () => import('Views/accounts/clients/create');

export default {
        path: '/clientes',
        component: master,
        redirect: '/clientes/list',
        children: [
           {
            path: '/clientes/list',
            component: clientes,
            name: 'list_client',
            meta: {
                title: 'Listado'
            }
           },
           {
                path: '/clientes/create',
                component: createClient,
                name: 'create_client',
                meta: {
                    title: 'CreateClient'
                }
           }
        ]
   }