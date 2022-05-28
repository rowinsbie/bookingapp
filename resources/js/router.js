import { createRouter, createWebHistory } from 'vue-router';

import BookingList from './components/BookingList';
import TourList from './components/TourList';
import createTour from './components/forms/CreateTour';
import EditTour from './components/forms/Tour/EditTour';
const routes = [{
        path: '/',
        name: "BookingList",
        component: BookingList
    },
    {
        path: '/tour-list',
        name: 'TourList',
        component: TourList
    },
    {
        path: '/create-tour',
        name: 'createTour',
        component: createTour
    },
    {
        path: '/edit-tour/:id',
        name: 'editTour',
        component: EditTour
    }
];


const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
});

export default router;