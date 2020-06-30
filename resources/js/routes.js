import AddContact from "./components/AddContact";
import Contacts from "./components/Contacts";

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Contacts
    },
    {
        name: 'add',
        path: '/add',
        component: AddContact
    }
];
