<template>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h4 class="card-title"> <i class="fa-solid mdi mdi-book-multiple"></i> Users table</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <div id="order-listing_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer pt-3">
                            <div class="row">
                                <div class="col-sm-12 col-md-3">
                                    <div class="form-group multi-action">
                                        <div class="input-group">
                                            <select name="action" v-model="multiAction.action"
                                                class="js-example-basic-single" style="margin-left:5px">
                                                <option value="">Choose Action</option>
                                                <option value="delete">Delete User</option>
                                            </select>
                                            <div class="input-group-append">
                                                <button class="btn btn-facebook" type="button"
                                                    @click="ChooseMultiAction()">
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                        <small class="text-danger"> </small>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 offset-md-6 ml-auto">
                                    <div id="order-listing_filter" class="dataTables_filter">
                                        <label class="w-100">
                                            <input type="text" class="form-control w-100" placeholder="Search By Username..."
                                                name="searchVal" v-model="searchVal" @keyup="searchUser()"
                                                maxlength="55" aria-controls="order-listing" autocomplete="nope" />
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="order-listing" class="table dataTable no-footer"
                                        aria-describedby="order-listing_info">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="form-check mt-0 mb-0">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" id="main-ckecker" class="form-check-input"
                                                                @change="ckeckboxClicked($event)" />
                                                            <i class="input-helper"></i>
                                                        </label>
                                                    </div>
                                                </th>
                                                <th> Username </th>
                                                <th> Email </th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="user in users.data" :key="user.id">
                                                <td class="jsgrid-cell" style="width: 100px;">
                                                    <div class="form-check mt-0">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input check-item"
                                                            :value="user.id" v-model="multiAction.id" >
                                                            <i class="input-helper"></i>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td> {{ user.name.length > 20 ? user.name.slice(0, 20) + '...' :
                                                user.name }} </td>
                                                <td> {{ user.email.length > 50 ? user.email.slice(0, 50) +
                                                '...' : user.email }} </td>
                                                <td>
                                                    <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#showDataModal" @click="showUser(user)"
                                                        class="btn btn-secondary btn-rounded btn-icon p-2">
                                                        <i class="mdi mdi-eye"></i>
                                                    </button>
                                                    &nbsp;
                                                    <button type="button" @click="deletePost(user)"
                                                        class="btn btn-danger btn-rounded btn-icon p-2">
                                                        <i class="ti-close"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="order-listing_info" role="status"
                                        aria-live="polite">Showing {{ ( (users.total + 1) - users.from) }} to {{ (
                                        (users.total + 1) - users.to) }} of {{ users.total }} entries</div>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers">
                                        <!-- pagination Component -->
                                        <!-- <Pagination :data="users" @pagination-change-page="getUsers" :limit="1"/> -->
                                        <pagination :data="users" @pagination-change-page="getUsers" :limit="2">
                                            <template #prev-nav>
                                                <span>&lt; </span>
                                            </template>
                                            <template #next-nav>
                                                <span> &gt;</span>
                                            </template>
                                        </pagination>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <!------- Show Modal ------>
        <div class="col-md-6 col-xl-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="modal fade" id="showDataModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog " role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ModalLabel">Show User Data</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <span class="h4 fw-bold"> <i class="mdi mdi-file-document"></i> First Name : </span>
                                        <span class="h6"> {{ user.first_name }} </span>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <span class="h4 fw-bold"> <i class="mdi mdi-file-document"></i> Last Name : </span>
                                        <span class="h6"> {{ user.last_name }} </span>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <span class="h4 fw-bold"> <i class="mdi mdi-file-document"></i> Name : </span>
                                        <span class="h6"> {{ user.name }} </span>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <span class="h4 fw-bold"> <i class="mdi mdi-email"></i> Email :
                                        </span>
                                        <span class="h6"> {{ user.email }} </span>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>

</template>
<script>
import axios from 'axios';
import LaravelVuePagination from 'laravel-vue-pagination';

export default {
    components: {
        'Pagination': LaravelVuePagination
    },
    data() {
        return {
            users: {},
            user: {},
            searchVal: '',
            multiAction: {
                id: [],
                action: ''
            },
        }
    },
    mounted() {
        this.getUsers();
    },
    methods: {

        /*======================================================
        ====== CheckBox
        ======================================================*/
        ckeckboxClicked(event) {

            const checkItems = document.querySelectorAll(".check-item");
            if (event.target.checked) { // check if main checker checked

                // Push all serivces id multiAction object
                this.users.data.forEach( user => {
                    this.multiAction.id.push(user.id)
                });

                // add checked to checkbox
                for (var i = 0; i < checkItems.length; i++) {
                    checkItems[i].checked = true;
                }

            } else {

                // empty Multi Action Id
                this.multiAction.id = [];

                // remove checked to checkbox
                for (var i = 0; i < checkItems.length; i++) {
                    checkItems[i].checked = false;
                }

            }

        },



        /*======================================================
        ====== GET Users
        ======================================================*/
        getUsers(page = 1) {
            axios.get('/api/admin/user?page=' + page)
                .then(
                    response => {
                        // console.log(response.data);
                        this.users = response.data;
                    }
                )
                .catch(
                    error => console.log(error)
                )
        },



        /*======================================================
        ====== GET User
        ======================================================*/
        showUser(user) {
            axios.get('/api/admin/user/' + user.id)
                .then(
                    response => {
                        // console.log(response.data);
                        if (response.data.status == "success") {
                            this.user = response.data.data
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
        ====== Update User
        ======================================================*/
        deletePost(user) {
            this.$swal({
                text: 'Are you sure delete user ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    // do delete response
                    axios.delete("/api/admin/user/" + user.id)
                        .then(
                            response => {  // if there success request

                                if (response.data.status == "success") {

                                    this.getUsers(); // reload getUsers()
                                    this.user = {}      // empty user var

                                    /*======== Sweet Alert ============*/
                                    this.$swal({
                                        position: 'top-end',
                                        icon: response.data.status,
                                        text: response.data.msg,
                                        showConfirmButton: false,
                                        timer: 1500
                                    });

                                } else if (response.data.status == "error") {

                                    /*======== Sweet Alert ============*/
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
                }
            })
        },






        /*======================================================
        ====== Search User
        ======================================================*/
        searchUser() {

            // Set Config var to send it with data request
            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                }
            }

            // set var from FormData Class
            let formData = new FormData();

            // Add method put in form field
            formData.append('searchVal', this.searchVal);

            // Send request with axios
            axios.post("/api/admin/user/search", formData, config)
                .then(
                    response => {  // if there success request

                        // console.log(response.data)

                        // if response status
                        if (response.data.status == "success") {
                            this.users = response.data.data;
                        }

                        // if user not Found
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







        /*======================================================
        ====== Multi Action
        ======================================================*/
        ChooseMultiAction() {

            if (this.multiAction.action == '') {
                /*=== Sweet Alert ===*/
                this.$swal({
                    position: 'top-end',
                    icon: 'error',
                    text: 'Please Choose Action to do.',
                    showConfirmButton: false,
                    timer: 1500
                });
            } else if (this.multiAction.id == '' ) {
                /*=== Sweet Alert ===*/
                this.$swal({
                    position: 'top-end',
                    icon: 'error',
                    text: 'Please select rows.',
                    showConfirmButton: false,
                    timer: 50000
                });
            } else {

                this.$swal({
                    text: 'Are you sure ?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, do it!'
                }).then((result) => {
                    if (result.value) {

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
                        const inputs = ['id', 'action'];

                        // For Loop To append every item in inputs array
                        inputs.forEach(input => {
                            formData.append(String(input), this.multiAction[input]);
                        });

                        // Send request with axios
                        axios.post("/api/admin/user/multiAction", formData, config)
                        .then(
                            response => {  // if there success request

                                if (response.data.status == "success") {

                                    const mainChecker = document.getElementById("main-ckecker");
                                    mainChecker.checked = false;

                                    this.getUsers(); // reload getUsers()
                                    this.user = {}      // empty user var

                                    /*======== Sweet Alert ============*/
                                    this.$swal({
                                        position: 'top-end',
                                        icon: response.data.status,
                                        text: response.data.msg,
                                        showConfirmButton: false,
                                        timer: 1500
                                    });

                                } else if (response.data.status == "error") {

                                    /*======== Sweet Alert ============*/
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

                    }
                });

            }

        }







    },

}
</script>
