<template>
    <div class="row">
        <div class="col-md-12 col-xl-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">ABOG Hot-Seat Settings</h4>
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="genral-tab" data-bs-toggle="tab" href="#genral-setting"
                                role="tab" aria-controls="genral-setting" aria-selected="true">Genral Setting</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="social-media-tab" data-bs-toggle="tab" href="#social-media"
                                role="tab" aria-controls="social-media" aria-selected="false">Social Media</a>
                        </li>
                    </ul>
                    <form @submit.prevent="updateSettings()" enctype="multipart/form-data" method="POST">
                        <div class="tab-content">
                            <!-------- Genral Setting -------->
                            <div class="tab-pane fade active show" id="genral-setting" role="tabpanel"
                                aria-labelledby="genral-tab">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" v-model="settings.email" class="form-control" name="email"
                                        id="email" placeholder="Type E-mail Address...." :class=" errors.email ? 'border-danger' : ''  " >
                                    <small class="text-danger" v-if="errors.email"> {{errors.email[0] }}
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" v-model="settings.phone" class="form-control" name="phone"
                                        id="phone" placeholder="Type Phone Number...." :class=" errors.phone ? 'border-danger' : ''  " >
                                    <small class="text-danger" v-if="errors.phone"> {{errors.phone[0] }}
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="phone_formatted">Phone Formatted</label>
                                    <input type="text" v-model="settings.phone_formatted" class="form-control" name="phone_formatted"
                                        id="phone_formatted" placeholder="Type Phone Formatted For Calls...." :class=" errors.phone_formatted ? 'border-danger' : ''  " >
                                    <small class="text-danger" v-if="errors.phone_formatted"> {{errors.phone_formatted[0] }}
                                    </small>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" v-model="settings.address" class="form-control" name="address"
                                        id="address" placeholder="Type Address...." :class=" errors.address ? 'border-danger' : ''  " >
                                    <small class="text-danger" v-if="errors.address"> {{errors.address[0] }}
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input type="text" v-model="settings.location" class="form-control" name="location"
                                        id="location" placeholder="Type Location...." :class=" errors.location ? 'border-danger' : ''  " >
                                    <small class="text-danger" v-if="errors.location"> {{errors.location[0] }}
                                    </small>
                                </div> -->
                                <div class="form-group">
                                    <label for="footer_content">Footer Content</label>
                                    <textarea v-model="settings.footer_content" class="form-control"
                                        name="footer_content" id="footer_content"
                                        placeholder="Footer Content...." :class=" errors.footer_content ? 'border-danger' : ''  " ></textarea>
                                    <small class="text-danger" v-if="errors.footer_content"> {{errors.footer_content[0] }}
                                    </small>
                                </div>
                            </div>
                            <!-------- social-media -------->
                            <div class="tab-pane fade" id="social-media" role="tabpanel"
                                aria-labelledby="social-media-tab">

                                <div class="form-group">
                                    <label for="instagram">Instagram</label>
                                    <input type="text" v-model="settings.instagram" class="form-control" name="instagram"
                                        id="instagram" placeholder="Type instagram...." :class=" errors.instagram ? 'border-danger' : ''  " >
                                    <small class="text-danger" v-if="errors.instagram"> {{errors.instagram[0] }}
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="facebook">facebook</label>
                                    <input type="text" v-model="settings.facebook" class="form-control" name="facebook"
                                        id="facebook" placeholder="Type Facebook Link...." :class=" errors.facebook ? 'border-danger' : ''  " >
                                    <small class="text-danger" v-if="errors.facebook"> {{errors.facebook[0] }}
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="twitter">Twitter</label>
                                    <input type="text" v-model="settings.twitter" class="form-control" name="twitter"
                                        id="twitter" placeholder="Type Twitter Link...." :class=" errors.twitter ? 'border-danger' : ''  " >
                                    <small class="text-danger" v-if="errors.twitter"> {{errors.twitter[0] }}
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="linkedin">Linkedin</label>
                                    <input type="text" v-model="settings.linkedin" class="form-control" name="linkedin"
                                        id="linkedin" placeholder="Type Linkedin Channel Link...." :class=" errors.linkedin ? 'border-danger' : ''  " >
                                    <small class="text-danger" v-if="errors.linkedin"> {{errors.linkedin[0] }}
                                    </small>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 me-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
export default {

    data() {
        return {
            settings: {
                address: '',
                location: '',
                footer_content: '',
                email: '',
                phone: '',
                phone_formatted: '',
                instagram: '',
                facebook: '',
                twitter: '',
                linkedin: '',
            },
            errors: {},     // create empty object to insert errors in it to show
        }
    },
    mounted() {
        this.showSettings();
    },
    methods: {


        /*======================================================
        ====== GET Settings
        ======================================================*/
        showSettings() {
            axios.get('/api/admin/settings/')
                .then(
                    response => {
                        // console.log(response.data);
                        if (response.data.status == "success") {
                            this.settings = response.data.data
                        } else if (response.data.status == "error") {
                            /*=== Sweet Alert ===*/
                            this.$swal({
                                position: 'top-end',
                                icon: response.data.status,
                                text: response.data.msg,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    }
                )
                .catch(
                    error => console.log(error)
                )
        },



        /*======================================================
        ====== Update Settings
        ======================================================*/

        updateSettings() {


            // Set Config var to send it with data request
            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                }
            }


            // set var from FormData Class
            let formData = new FormData();


            // Array of inputs
            const inputs = ['address', 'location', 'footer_content', 'email', 'phone', 'phone_formatted', 'instagram', 'facebook', 'twitter', 'linkedin'];


            // For Loop To append every item in inputs array
            inputs.forEach(input => {
                formData.append(String(input), this.settings[input]);
            });


            // Send request with axios
            axios.post("/api/admin/settings" , formData, config)
                .then(
                    response => {  // if there success request

                        // console.log(response.data);

                        // if response status
                        if (response.data.status == "success") {

                            // reload showSettings()
                            this.showSettings();

                            // empty error var
                            this.errors = {}

                            // Sweet Alert
                            this.$swal({
                                position: 'top-end',
                                icon: response.data.status,
                                text: response.data.msg,
                                showConfirmButton: false,
                                timer: 1500
                            });

                        }
                        // if response validation error
                        else if (response.data.status == "error" && response.data.msg == "validation failed") {

                            this.errors = response.data.errors

                        }
                        // if Settings not Found
                        else if (response.data.status == "error") {

                            // Sweet Alert
                            this.$swal({
                                position: 'top-end',
                                icon: response.data.status,
                                text: response.data.msg,
                                showConfirmButton: false,
                                timer: 1500
                            });

                        }

                    }
                )
                .catch(error => console.log(error));
        },





    },

}
</script>

