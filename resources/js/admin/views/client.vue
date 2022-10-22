<template>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h4 class="card-title"> <i class="fa-solid mdi mdi-book-multiple"></i> Clients table</h4>
                </div>
                <div class="col-6 text-end">
                    <button type="button" class="btn btn-danger btn-rounded btn-icon p-2" data-bs-toggle="modal"
                        data-bs-target="#formModal" data-whatever="@mdo" @click="createClient()">Create New</button>
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
                                                <option value="delete">Delete Client</option>
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
                                            <input type="text" class="form-control w-100" placeholder="Search By Title..."
                                                name="searchVal" v-model="searchVal" @keyup="searchClient()"
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
                                                <th> Title </th>
                                                <th> Image </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="client in clients.data" :key="client.id">
                                                <td class="jsgrid-cell" style="width: 100px;">
                                                    <div class="form-check mt-0">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input check-item"
                                                            :value="client.id" v-model="multiAction.id" >
                                                            <i class="input-helper"></i>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td> {{ client.title.length > 20 ? client.title.slice(0, 20) + '...' :
                                                client.title }} </td>
                                                <td class="py-1">
                                                    <img :src=" '/images/clients/'+ client.img " alt="image">
                                                </td>
                                                <td>
                                                    <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#showDataModal" @click="showClient(client)"
                                                        class="btn btn-secondary btn-rounded btn-icon p-2">
                                                        <i class="mdi mdi-eye"></i>
                                                    </button>
                                                    &nbsp;
                                                    <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#formModal" @click="editClient(client)"
                                                        class="btn btn-primary btn-rounded btn-icon p-2">
                                                        <i class="ti-marker-alt"></i>
                                                    </button>
                                                    &nbsp;
                                                    <button type="button" @click="deletePost(client)"
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
                                        aria-live="polite">Showing {{ ( (clients.total + 1) - clients.from) }} to {{ (
                                        (clients.total + 1) - clients.to) }} of {{ clients.total }} entries</div>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers">
                                        <!-- pagination Component -->
                                        <!-- <Pagination :data="clients" @pagination-change-page="getClients" :limit="1"/> -->
                                        <pagination :data="clients" @pagination-change-page="getClients" :limit="2">
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
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ModalLabel">Show Client Data</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <span class="h4 fw-bold"> <i class="mdi mdi-format-title"></i> title : </span>
                                        <span class="h6"> {{ client.title }} </span>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <span class="h4 fw-bold"> <i class="mdi mdi-file-image"></i> img : </span>
                                        <span class="h6"> <img :src="'/images/clients/' + client.img "
                                                alt="client-img" width="160"> </span>
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



        <!---- Form Model ---->
        <div class="col-md-6 col-xl-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ModalLabel">{{ edit ? "Edit Client" : "Create Client"
                                    }}</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form @submit.prevent=" edit ? updateClient() :  storeClient() "
                                    enctype="multipart/form-data" method="POST">
                                    <div class="modal-body">


                                        <!-- title -->
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label"> <i
                                                    class="mdi mdi-format-title"></i> Title </label>
                                            <input type="text" name="title" v-model="client.title" class="form-control"
                                                :class=" errors.title ? 'border-danger' : ''  " id="recipient-name">
                                            <small class="text-danger" v-if="errors.title"> {{errors.title[0] }}
                                            </small>
                                        </div>

                                        <!-- Image -->
                                        <div class="form-group">
                                            <label> <i class="mdi mdi-file-image"></i> Upload Big Image
                                                <!-- &nbsp; &nbsp; <img :src=" '/images/clients/' + client.img " class="img-client" alt="img-client" height="60" v-if="edit" > -->
                                            </label>
                                            <input type="file" class="form-control" name="img" id="img" placeholder="Upload Icon"
                                                @change="getImageName( $event , 'img' )" :class=" errors.img ? 'border-danger' : ''  " >
                                            <small class="text-danger" v-if="errors.img"> {{errors.img[0] }} </small>
                                        </div>


                                    </div>
                                    <div class="modal-footer">
                                        <button @submit.prevent="storeClient()" class="btn btn-success">{{ edit ?
                                        'Edit' : 'Save'}}</button>
                                        <!-- <button class="btn btn-light" data-bs-dismiss="modal">Close</button> -->
                                    </div>
                                </form>
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
import { serialize } from 'object-to-formdata';

export default {
    components: {
        'Pagination': LaravelVuePagination
    },
    data() {
        return {
            clients: {},
            client: {
                title: '',
                img: '',
            },
            errors: {},  // create empty object to insert errors in it to show
            edit: false, // set this var to know if modal for create or edit
            searchVal: '',
            multiAction: {
                id: [],
                action: ''
            },
        }
    },
    mounted() {
        this.getClients();
    },
    methods: {

        /*======================================================
        ====== CheckBox
        ======================================================*/
        ckeckboxClicked(event) {

            const checkItems = document.querySelectorAll(".check-item");
            if (event.target.checked) { // check if main checker checked

                // Push all serivces id multiAction object
                this.clients.data.forEach( client => {
                    this.multiAction.id.push(client.id)
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
        ====== Get Image Name Input File
        ======================================================*/
        getImageName(event, imgName) {  // at change input set client img name
            this.client[imgName] = event.target.files[0];
        },



        /*======================================================
        ====== GET Clients
        ======================================================*/
        getClients(page = 1) {
            axios.get('/api/admin/client?page=' + page)
                .then(
                    response => {
                        // console.log(response.data);
                        this.clients = response.data;
                    }
                )
                .catch(
                    error => console.log(error)
                )
        },



        /*======================================================
        ====== GET Client
        ======================================================*/
        showClient(client) {
            axios.get('/api/admin/client/' + client.id)
                .then(
                    response => {
                        // console.log(response.data);
                        if (response.data.status == "success") {
                            this.client = response.data.data
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
        ====== Create Client
        ======================================================*/
        createClient() {
            this.errors = {}, // empty error var
            this.edit = false, // set var edit equale 'false' to know that this modal for update
            this.client = {
                title: '',
                summary: '',
                content: '',
                seo: {
                    title: '',
                    keywords: '',
                    description: '',
                },
                icon: '',
                img: '',
            }
        },
        storeClient() {

            // Set Config var to send it with data request
            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                }
            }


            const formData = serialize(
                this.client,
            );


            // Send request with axios
            axios.post("/api/admin/client", formData, config)
                .then(
                    response => {  // if there success request

                        // if response status
                        if (response.data.status == "success") {

                            // Close Model
                            $("#formModal").modal('hide');

                            // reload getClients()
                            this.getClients();

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





        /*======================================================
        ====== Update Client
        ======================================================*/
        editClient(client) {
            this.errors = {}, // empty error var
            this.edit = true // set var edit equale 'true' to know that this modal for update

            axios.get('/api/admin/client/' + client.id)
                .then(
                    response => {
                        // console.log(response.data);
                        if (response.data.status == "success") {

                            // save response data in var
                            this.client = response.data.data

                            // empty img , icon to send empty if it was
                            this.client.img = ''

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
        updateClient() {


            // Set Config var to send it with data request
            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                }
            }

            const formData = serialize(
                this.client,
            );

            // Add method put in form field
            formData.append('_method', 'PUT');



            // Send request with axios
            axios.post("/api/admin/client/" + this.client.id, formData, config)
                .then(
                    response => {  // if there success request

                        // console.log(response.data);

                        // if response status
                        if (response.data.status == "success") {

                            // Close Model
                            $("#formModal").modal('hide');

                            // reload getClients()
                            this.getClients();

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
                        // if client not Found
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
        ====== Update Client
        ======================================================*/
        deletePost(client) {
            this.$swal({
                text: 'Are you sure delete client ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    // do delete response
                    axios.delete("/api/admin/client/" + client.id)
                        .then(
                            response => {  // if there success request

                                if (response.data.status == "success") {

                                    this.getClients(); // reload getClients()
                                    this.client = {}      // empty client var

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
        ====== Search Client
        ======================================================*/
        searchClient() {

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
            axios.post("/api/admin/client/search", formData, config)
                .then(
                    response => {  // if there success request

                        // console.log(response.data)

                        // if response status
                        if (response.data.status == "success") {
                            this.clients = response.data.data;
                        }

                        // if client not Found
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
                        axios.post("/api/admin/client/multiAction", formData, config)
                        .then(
                            response => {  // if there success request

                                if (response.data.status == "success") {

                                    const mainChecker = document.getElementById("main-ckecker");
                                    mainChecker.checked = false;

                                    this.getClients(); // reload getClients()
                                    this.client = {}      // empty client var

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
