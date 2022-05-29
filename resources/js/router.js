import { createRouter, createWebHistory } from 'vue-router';

import BookingList from './components/BookingList';
import TourList from './components/TourList';
import createTour from './components/forms/CreateTour';
import EditTour from './components/forms/Tour/EditTour';
import BookingForm from './components/forms/booking/BookingForm';
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
    },
    {
        path: '/booking/:id',
        name: 'booking',
        component: BookingForm
    }
];


const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
});

export default router;