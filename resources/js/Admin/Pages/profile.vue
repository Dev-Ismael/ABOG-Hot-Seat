<template>
    <form @submit.prevent="UpdateAdminInfo()" enctype="multipart/form-data" method="POST">
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title"> <i class="fa-solid fa-house-user"></i> Admin Info </h4>

                        <div class="form-group">
                            <label for="name"> Name </label>
                            <input type="text" class="form-control" id="name" v-model="admin.name" name="name"
                                placeholder="Type Admin name..." autocomplete="new-password"
                                :class=" errors.name ? 'border-danger' : ''  " />
                            <small class="text-danger" v-if="errors.name"> {{ errors.name[0] }} </small>
                        </div>


                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" v-model="admin.email" name="email"
                                placeholder="Type Admin Email..." autocomplete="new-password"
                                :class=" errors.email ? 'border-danger' : ''  " />
                            <small class="text-danger" v-if="errors.email"> {{ errors.email[0] }} </small>
                        </div>


                        <div class="form-group">
                            <label for="password"> New Password </label>
                            <input type="password" class="form-control" id="password" name="password"  v-model="admin.password"
                                placeholder="Type New Password..." autocomplete="new-password"
                                :class=" errors.password ? 'border-danger' : ''  " />
                            <small class="text-danger" v-if="errors.password"> {{ errors.password[0] }} </small>
                        </div>


                    </div>
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary me-2">Submit</button>
            </div>
        </div>
    </form>
</template>
<script>

import axios from 'axios';
import { serialize } from 'object-to-formdata';

export default {

    data() {
        return {
            errors: {},     // create empty object to insert errors in it to show
            admin: {
                name: '',
                email: '',
                password: '',
            },
        }
    },
    mounted() {
        this.getAdminInfo();
    },
    methods: {


        /*======================================================
        ====== Get Admin Information
        ======================================================*/
        getAdminInfo() {
            axios.get("/api/admin/info")
                .then(
                    response => {
                        // console.log(response.data.admin[0]);
                        this.admin = response.data.admin
                    }
                )
                .catch(error => console.log(error))
        },


        /*======================================================
        ====== Update Admin Information
        ======================================================*/
        UpdateAdminInfo() {

            // Set Config var to send it with data request
            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                }
            }


            const formData = serialize(
                this.admin,
            );


            // Send request with axios
            axios.post("/api/admin/update-info", formData, config)
                .then(
                    response => {  // if there success request

                        console.log(response);

                        // if response status
                        if (response.data.status == "success") {

                            // reload getServices()
                            this.getAdminInfo();

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
                        // if response validation failed
                        else if (response.data.status == "error" && response.data.msg == "validation failed") {

                            this.errors = response.data.errors

                        } else if (response.data.status == "error") {

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
