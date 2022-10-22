<template>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h4 class="card-title"> <i class="fa-solid mdi mdi-book-multiple"></i> Services table</h4>
                </div>
                <div class="col-6 text-end">
                    <button type="button" class="btn btn-danger btn-rounded btn-icon p-2" data-bs-toggle="modal"
                        data-bs-target="#formModal" data-whatever="@mdo" @click="createService()">Create New</button>
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
                                                <option value="delete">Delete Service</option>
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
                                                name="searchVal" v-model="searchVal" @keyup="searchService()"
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
                                                <th> Image </th>
                                                <th> Title </th>
                                                <th> Summary </th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="service in services.data" :key="service.id">
                                                <td class="jsgrid-cell" style="width: 100px;">
                                                    <div class="form-check mt-0">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input check-item"
                                                            :value="service.id" v-model="multiAction.id" >
                                                            <i class="input-helper"></i>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td class="py-1">
                                                    <img :src=" '/images/services/'+ service.icon " alt="image">
                                                </td>
                                                <td> {{ service.title.length > 20 ? service.title.slice(0, 20) + '...' :
                                                service.title }} </td>
                                                <td> {{ service.summary.length > 50 ? service.summary.slice(0, 50) +
                                                '...' : service.summary }} </td>
                                                <td>
                                                    <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#showDataModal" @click="showService(service)"
                                                        class="btn btn-secondary btn-rounded btn-icon p-2">
                                                        <i class="mdi mdi-eye"></i>
                                                    </button>
                                                    &nbsp;
                                                    <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#formModal" @click="editService(service)"
                                                        class="btn btn-primary btn-rounded btn-icon p-2">
                                                        <i class="ti-marker-alt"></i>
                                                    </button>
                                                    &nbsp;
                                                    <button type="button" @click="deletePost(service)"
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
                                        aria-live="polite">Showing {{ ( (services.total + 1) - services.from) }} to {{ (
                                        (services.total + 1) - services.to) }} of {{ services.total }} entries</div>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers">
                                        <!-- pagination Component -->
                                        <!-- <Pagination :data="services" @pagination-change-page="getServices" :limit="1"/> -->
                                        <pagination :data="services" @pagination-change-page="getServices" :limit="2">
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
                                    <h5 class="modal-title" id="ModalLabel">Show Service Data</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <span class="h4 fw-bold"> <i class="mdi mdi-format-title"></i> title : </span>
                                        <span class="h6"> {{ service.title }} </span>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <span class="h4 fw-bold"> <i class="mdi mdi-format-align-left"></i> summary :
                                        </span>
                                        <span class="h6"> {{ service.summary }} </span>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <span class="h4 fw-bold"> <i class="mdi mdi-format-align-left"></i> content :
                                        </span>
                                        <span class="h6" v-html="service.content">  </span>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <span class="h4 fw-bold"> <i class="mdi mdi-file-image"></i> icon : </span>
                                        <span class="h6"> <img :src="'/images/services/' + service.icon "
                                                alt="service-icon" width="160"> </span>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <span class="h4 fw-bold"> <i class="mdi mdi-file-image"></i> img : </span>
                                        <span class="h6"> <img :src="'/images/services/' + service.img "
                                                alt="service-img" width="160"> </span>
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
                                    <h5 class="modal-title" id="ModalLabel">{{ edit ? "Edit Service" : "Create Service"
                                    }}</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form @submit.prevent=" edit ? updateService() :  storeService() "
                                    enctype="multipart/form-data" method="POST">
                                    <div class="modal-body">


                                        <!-- title -->
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label"> <i
                                                    class="mdi mdi-format-title"></i> Title </label>
                                            <input type="text" name="title" v-model="service.title" class="form-control"
                                                :class=" errors.title ? 'border-danger' : ''  " id="recipient-name">
                                            <small class="text-danger" v-if="errors.title"> {{errors.title[0] }}
                                            </small>
                                        </div>


                                        <!-- seo_title -->
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label"> <i class="ti-search"></i>
                                                SEO Title </label>
                                            <textarea name="seo[title]" v-model="service.seo.title" class="form-control"
                                                :class=" errors[`seo.title`] ? 'border-danger' : ''  " id="message-text"
                                                rows="4" cols="50"></textarea>
                                            <small class="text-danger" v-if="errors[`seo.title`]"> {{errors[`seo.title`][0] }}
                                            </small>
                                        </div>


                                        <!-- seo_keywords -->
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label"> <i class="ti-search"></i>
                                                SEO Keywords </label>
                                            <textarea name="seo[keywords]" v-model="service.seo.keywords" class="form-control"
                                                :class=" errors[`seo.keywords`] ? 'border-danger' : ''  " id="message-text"
                                                rows="4" cols="50"></textarea>
                                            <small class="text-danger" v-if="errors[`seo.keywords`]"> {{errors[`seo.keywords`][0] }}
                                            </small>
                                        </div>

                                        <!-- seo_description -->
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label"> <i class="ti-search"></i>
                                                SEO Description </label>
                                            <textarea name="seo[description]" v-model="service.seo.description" class="form-control"
                                                :class=" errors[`seo.description`] ? 'border-danger' : ''  " id="message-text"
                                                rows="4" cols="50"></textarea>
                                            <small class="text-danger" v-if="errors[`seo.description`]"> {{errors[`seo.description`][0] }}
                                            </small>
                                        </div>

                                        <!-- summary -->
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label"> <i
                                                    class="mdi mdi-format-align-left"></i> Summary </label>
                                            <textarea name="summary" v-model="service.summary" class="form-control"
                                                :class=" errors.summary ? 'border-danger' : ''  " id="message-text"
                                                rows="4" cols="50"></textarea>
                                            <small class="text-danger" v-if="errors.summary"> {{errors.summary[0] }}
                                            </small>
                                        </div>


                                        <!-- content -->
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label"> <i
                                                    class="mdi mdi-format-align-left"></i> Content </label>
                                            <ckeditor :editor="editor" v-model="service.content" name="content"></ckeditor>
                                            <small class="text-danger" v-if="errors.content"> {{errors.content[0] }}
                                            </small>
                                        </div>


                                        <!-- Icon -->
                                        <div class="form-group">
                                            <label> <i class="mdi mdi-file-image"></i> Upload Icon
                                                <!-- &nbsp; &nbsp; <img :src=" '/images/services/' + service.icon " class="img-service" alt="img-service" height="60" v-if="edit" > -->
                                            </label>
                                            <input type="file" class="form-control" name="icon" id="icon" placeholder="Upload Icon"
                                            @change="getImageName( $event , 'icon' )" :class=" errors.icon ? 'border-danger' : ''  " >
                                            <small class="text-danger" v-if="errors.icon"> {{errors.icon[0] }} </small>
                                        </div>


                                        <!-- Image -->
                                        <div class="form-group">
                                            <label> <i class="mdi mdi-file-image"></i> Upload Big Image
                                                <!-- &nbsp; &nbsp; <img :src=" '/images/services/' + service.img " class="img-service" alt="img-service" height="60" v-if="edit" > -->
                                            </label>
                                            <input type="file" class="form-control" name="img" id="img" placeholder="Upload Icon"
                                                @change="getImageName( $event , 'img' )" :class=" errors.img ? 'border-danger' : ''  " >
                                            <small class="text-danger" v-if="errors.img"> {{errors.img[0] }} </small>
                                        </div>


                                    </div>
                                    <div class="modal-footer">
                                        <button @submit.prevent="storeService()" class="btn btn-success">{{ edit ?
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
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import { serialize } from 'object-to-formdata';

export default {
    components: {
        'Pagination': LaravelVuePagination
    },
    data() {
        return {
            editor: ClassicEditor,   // import ClassicEditor theme to use in checkEditor package
            services: {},
            service: {
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
        this.getServices();
    },
    methods: {

        /*======================================================
        ====== CheckBox
        ======================================================*/
        ckeckboxClicked(event) {

            const checkItems = document.querySelectorAll(".check-item");
            if (event.target.checked) { // check if main checker checked

                // Push all serivces id multiAction object
                this.services.data.forEach( service => {
                    this.multiAction.id.push(service.id)
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
        getImageName(event, imgName) {  // at change input set service img name
            this.service[imgName] = event.target.files[0];
        },



        /*======================================================
        ====== GET Services
        ======================================================*/
        getServices(page = 1) {
            axios.get('/api/admin/service?page=' + page)
                .then(
                    response => {
                        // console.log(response.data);
                        this.services = response.data;
                    }
                )
                .catch(
                    error => console.log(error)
                )
        },



        /*======================================================
        ====== GET Service
        ======================================================*/
        showService(service) {
            axios.get('/api/admin/service/' + service.id)
                .then(
                    response => {
                        // console.log(response.data);
                        if (response.data.status == "success") {
                            this.service = response.data.data
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
        ====== Create Service
        ======================================================*/
        createService() {
            this.errors = {}, // empty error var
            this.edit = false, // set var edit equale 'false' to know that this modal for update
            this.service = {
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
        storeService() {

            // Set Config var to send it with data request
            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                }
            }


            const formData = serialize(
                this.service,
            );


            // Send request with axios
            axios.post("/api/admin/service", formData, config)
                .then(
                    response => {  // if there success request

                        // if response status
                        if (response.data.status == "success") {

                            // Close Model
                            $("#formModal").modal('hide');

                            // reload getServices()
                            this.getServices();

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
        ====== Update Service
        ======================================================*/
        editService(service) {
            this.errors = {}, // empty error var
            this.edit = true // set var edit equale 'true' to know that this modal for update

            axios.get('/api/admin/service/' + service.id)
                .then(
                    response => {
                        // console.log(response.data);
                        if (response.data.status == "success") {

                            // save response data in var
                            this.service = response.data.data

                            // empty img , icon to send empty if it was
                            this.service.img = ''
                            this.service.icon = ''

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
        updateService() {


            // Set Config var to send it with data request
            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                }
            }

            const formData = serialize(
                this.service,
            );

            // Add method put in form field
            formData.append('_method', 'PUT');



            // Send request with axios
            axios.post("/api/admin/service/" + this.service.id, formData, config)
                .then(
                    response => {  // if there success request

                        // console.log(response.data);

                        // if response status
                        if (response.data.status == "success") {

                            // Close Model
                            $("#formModal").modal('hide');

                            // reload getServices()
                            this.getServices();

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
                        // if service not Found
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
        ====== Update Service
        ======================================================*/
        deletePost(service) {
            this.$swal({
                text: 'Are you sure delete service ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    // do delete response
                    axios.delete("/api/admin/service/" + service.id)
                        .then(
                            response => {  // if there success request

                                if (response.data.status == "success") {

                                    this.getServices(); // reload getServices()
                                    this.service = {}      // empty service var

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
        ====== Search Service
        ======================================================*/
        searchService() {

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
            axios.post("/api/admin/service/search", formData, config)
                .then(
                    response => {  // if there success request

                        // console.log(response.data)

                        // if response status
                        if (response.data.status == "success") {
                            this.services = response.data.data;
                        }

                        // if service not Found
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
                        axios.post("/api/admin/service/multiAction", formData, config)
                        .then(
                            response => {  // if there success request

                                if (response.data.status == "success") {

                                    const mainChecker = document.getElementById("main-ckecker");
                                    mainChecker.checked = false;

                                    this.getServices(); // reload getServices()
                                    this.service = {}      // empty service var

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
