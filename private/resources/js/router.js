import Vue from 'vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);

import Home from './pages/Home.vue';
import About from './pages/About.vue';
import StudentList from './components/student/List.vue';
import StudentAdd from './components/student/Add.vue';
import StudentEdit from './components/student/Edit.vue';

Vue.use(VueRouter);

const router = new VueRouter({
    made: 'history',
    linkExactActiveClass: 'active',
    routes: [
        {
            path: 'home',
            name: 'home',
            component: Home
        },
        {
            path: 'about',
            name: 'about',
            component: About
        },
        {
            path: 'student-list',
            name: 'student-list',
            component: StudentList
        },
        {
            path: 'student-add',
            name: 'student-add',
            component: StudentAdd
        },
        {
            path: 'student-edit/:id',
            name: 'student-edit',
            component: StudentEdit
        }
    ]
});

export default router;