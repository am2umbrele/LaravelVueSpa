<template>
    <div class="container">
        <div class="row">
            <div class="col-2">
                <h3>Contacts</h3>
            </div>
            <div class="col-1">
                <h3 class="text-right"><router-link to="/add" class="btn">Add contact</router-link></h3>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Subject of inquiry</th>
                <th>Message</th>
                <th>Created at</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="contact in contacts" :key="contact.id">
                <td>{{ contact.id }}</td>
                <td>{{ contact.name }}</td>
                <td>{{ contact.email }}</td>
                <td>{{ contact.phone }}</td>
                <td>{{ contact.inquiry }}</td>
                <td>{{ contact.message }}</td>
                <td>{{ contact.created_at }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                contacts: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/contacts')
                .then(response => {
                    this.contacts = response.data;
                });
        }
    }
</script>
