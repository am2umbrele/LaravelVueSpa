<template>
    <div class="container">
        <!-- debug only -->
        <div class="error-message" v-if="errors.exception">{{ errors.message }}</div>
        <!-- end debug only -->
        <div v-if="formSuccess" class="form-success">
            <p>Form submitted successfully!</p>
        </div>
        <div class="row">
            <div class="column">
                <h1>Contact Form Demo Project</h1>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <div class="card">
                    <div>
                        <img src="/images/ivi-form-desktop_03.png" alt=""/>
                        <span>Text + Right Aligned Image in Two Lines</span>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <div>
                        <img src="/images/ivi-form-desktop_05.png" alt=""/>
                        <span>Text + Right Aligned Image</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <form class="form" @submit.prevent="addContact">
                <div class="row">
                    <div class="column">
                        <label for="name">Name <span class="danger">*</span> </label>
                        <input v-model="contact.name" type="text" id="name" class="form-input"
                               v-bind:class="{ error: errors.name }"
                               placeholder="Enter your name">
                        <div class="error-message" v-if="errors.name">{{ errors.name[0] }}</div>
                    </div>
                    <div class="column">
                        <label for="email">Email <span class="danger">*</span></label>
                        <input v-model="contact.email" type="text" id="email" class="form-input"
                               v-bind:class="{ error: errors.email }"
                               placeholder="Enter your email">
                        <div class="error-message" v-if="errors.email">{{ errors.email[0] }}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="column">
                        <label for="phone">Phone <span class="danger">*</span></label>
                        <input v-model="contact.phone" type="text" id="phone" class="form-input"
                               v-bind:class="{ error: errors.phone }"
                               placeholder="Enter your phone number">
                        <div class="error-message" v-if="errors.phone">{{ errors.phone[0] }}</div>
                    </div>
                    <div class="column">
                        <label for="inquiry">Subject of inquiry</label>
                        <select v-model="contact.inquiry" id="inquiry" class="form-input">
                            <option value="" disabled selected>- Please select one -</option>
                            <option value="Lorem ipsum">Lorem ipsum</option>
                            <option value="Proin ac nulla">Proin ac nulla</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="column">
                        <label for="message">Your message</label>
                        <textarea v-model="contact.message" id="message" rows="5" class="form-input"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="column col-1">
                        <button type="submit" class="btn">SUBMIT</button>
                    </div>
                    <div class="column col-2">
                        <span class="required-text">
                            <span class="danger">* Required fields.</span> Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit. Praesent eget eros ut magna. Proin ac nulla porttitor, vehicula ante vitae,
                            varius nibh. Fusce libero lacus eget.
                        </span>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="column col-4">
                <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget eros ut magna vestibulum
                    lobortis. Proin ac nulla porttitor, vehicula ante vitae, varius nibh. Fusce libero lacus,
                    pellentesque eget scelerisque eleifend, gravida at ligula. Aliquam vel sem risus. Nullam nulla leo,
                    interdum et sollicitudin sed, ultrices eu tellus. <br><br>Duis facilisis lacus sapien, vel maximus
                    eros
                    consectetur ac. Quisque dapibus tellus lacinia mi fringilla, sit amet maximus tellus mollis. Duis
                    sollicitudin, lectus et suscipit dapibus, dolor turpis suscipit sapien, a hendrerit leo nisl eu
                    erat. Sed tincidunt lacus non pellentesque scelerisque. Donec non mi eget erat consectetur viverra.
                    Curabitur sed sapien elit.</span>
            </div>
            <div class="column col-1">
                <img v-lazy="imgUrl" class="img" alt=""/>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                imgUrl: '/images/ivi-form-desktop_10.png',
                formSuccess: false,
                errors: [],
                contact: {}
            }
        },
        methods: {
            addContact() {
                this.axios
                    .post('http://localhost:8000/api/contact/store', this.contact)
                    .then(response => {
                        this.formSuccess = true;
                        setTimeout(() => this.$router.push({name: 'home'}), 2000);
                    })
                    .catch(error => {
                        this.errors = (error.response.data.errors === undefined)
                            ? error.response.data
                            : error.response.data.errors;
                    })
            }
        }
    }
</script>
