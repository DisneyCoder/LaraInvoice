import { createRouter, createWebHistory } from "vue-router";
import InvoiceIndex from '../components/invoices/index.vue';
import NewInvoice from '../components/invoices/new.vue';
import InvoiceShow from '../components/invoices/Show.vue';
import Edit from '../components/invoices/edit.vue';
import NotFound from "../components/NotFound.vue";

const routes = [
    {
        path:'/',
        component: InvoiceIndex,
    },
    {
        path:'/invoice/new',
        component:NewInvoice,
    },
    {
        path:'/invoice/show/:id',
        component:InvoiceShow,
        props:true
    },
    {
        path:'/invoice/edit/:id',
        component:Edit,
        props:true,
    },
    {
        path:'/:pathMatch(.*)*',
        component: NotFound,
    }
]

const router = createRouter({
    history:createWebHistory(),
    routes,
})

export default router;