import {createRouter, createWebHistory} from 'vue-router'

const router = createRouter({

    history: createWebHistory(),
    routes: [
        {
              path: '/v1/notebook/',
              component: () => import('./components/Notebook'),
              name: 'notebook.index'
        },
        {
            path: '/v1/notebook/create',
            component: () => import('./components/Create'),
            name: 'notebook.create'
        },
        {
            path: '/v1/notebook/:id',
            component: ()=> import('./components/Edit'),
            name: 'notebook.edit'
        },


    ]

})

export default router
