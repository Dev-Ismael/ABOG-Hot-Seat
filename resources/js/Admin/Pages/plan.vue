<template>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h4 class="card-title"> <i class="fa-solid mdi mdi-book-multiple"></i> Plans table</h4>
                </div>
                <div class="col-6 text-end">
                    <button type="button" class="btn btn-danger btn-rounded btn-icon p-2" data-bs-toggle="modal"
                        data-bs-target="#formModal" data-whatever="@mdo" @click="createPlan()">Create New</button>
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
                                                <option value="delete">Delete Plan</option>
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
                                                name="searchVal" v-model="searchVal" @keyup="searchPlan()"
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
                                                <th> Price </th>
                                                <th> Price discounted </th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="plan in plans.data" :key="plan.id">
                                                <td class="jsgrid-cell" style="width: 100px;">
                                                    <div class="form-check mt-0">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input check-item"
                                                            :value="plan.id" v-model="multiAction.id" >
                                                            <i class="input-helper"></i>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td> {{ plan.title.length > 20 ? plan.title.slice(0, 20) + '...' :
                                                plan.title }} </td>
                                                <td> ${{ plan.old_price }} </td>
                                                <td> ${{ plan.price }} </td>
                                                <td>
                                                    <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#showDataModal" @click="showPlan(plan)"
                                                        class="btn btn-secondary btn-rounded btn-icon p-2">
                                                        <i class="mdi mdi-eye"></i>
                                                    </button>
                                                    &nbsp;
                                                    <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#formModal" @click="editPlan(plan)"
                                                        class="btn btn-primary btn-rounded btn-icon p-2">
                                                        <i class="ti-marker-alt"></i>
                                                    </button>
                                                    &nbsp;
                                                    <button type="button" @click="deletePost(plan)"
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
                                        aria-live="polite">Showing {{ ( (plans.total + 1) - plans.from) }} to {{ (
                                        (plans.total + 1) - plans.to) }} of {{ plans.total }} entries</div>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers">
                                        <!-- pagination Component -->
                                        <!-- <Pagination :data="plans" @pagination-change-page="getPlans" :limit="1"/> -->
                                        <pagination :data="plans" @pagination-change-page="getPlans" :limit="2">
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
                                    <h5 class="modal-title" id="ModalLabel">Show Plan Data</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <span class="h4 fw-bold"> <i class="mdi mdi-format-title"></i> title : </span>
                                        <span class="h6"> {{ plan.title }} </span>
                                    </div>
                                    <div class="form-group">
                                        <span class="h4 fw-bold"> <i class="mdi mdi-cash-multiple"></i> Price : </span>
                                        <span class="h6"> ${{ plan.old_price }} </span>
                                    </div>
                                    <div class="form-group">
                                        <span class="h4 fw-bold"> <i class="mdi mdi-cash-multiple"></i> Price Discounted : </span>
                                        <span class="h6"> ${{ plan.price }} </span>
                                    </div>
                                    <div class="form-group">
                                        <span class="h4 fw-bold"> <i class="mdi mdi-format-align-left"></i> content :
                                        </span>
                                        <span class="h6" v-html="plan.content">  </span>
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
                        <div class="modal-dialog " role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ModalLabel">{{ edit ? "Edit Plan" : "Create Plan"
                                    }}</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form @submit.prevent=" edit ? updatePlan() :  storePlan() "
                                    enctype="multipart/form-data" method="POST">
                                    <div class="modal-body">

                                        <!-- title -->
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label"> <i
                                                    class="mdi mdi-format-title"></i> Title </label>
                                            <input type="text" name="title" v-model="plan.title" class="form-control"
                                                :class=" errors.title ? 'border-danger' : ''  " id="recipient-name">
                                            <small class="text-danger" v-if="errors.title"> {{errors.title[0] }}
                                            </small>
                                        </div>

                                        <!-- old_price -->
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label"> <i
                                                    class="mdi mdi-cash-multiple"></i> Price </label>
                                            <input type="number" name="old_price" v-model="plan.old_price" class="form-control"
                                                :class=" errors.old_price ? 'border-danger' : ''  " id="recipient-name">
                                            <small class="text-danger" v-if="errors.old_price"> {{errors.old_price[0] }}
                                            </small>
                                        </div>

                                        <!-- price -->
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label"> <i
                                                    class="mdi mdi-cash-multiple"></i> Price Discounted </label>
                                            <input type="number" name="price" v-model="plan.price" class="form-control"
                                                :class=" errors.price ? 'border-danger' : ''  " id="recipient-name">
                                            <small class="text-danger" v-if="errors.price"> {{errors.price[0] }}
                                            </small>
                                        </div>

                                        <!-- Recommended -->
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label"> <i
                                                    class="icon-star"></i> Recommended </label>
                                                <select name="recommended" id="recommended" v-model="plan.recommended" class="form-control" :class=" errors.recommended ? 'border-danger' : ''  " >
                                                    <option value="" disabled selected>Select your Recommendation</option>
                                                    <option value="0"> NO </option>
                                                    <option value="1"> YES </option>
                                                </select>
                                            <small class="text-danger" v-if="errors.recommended"> {{errors.recommended[0] }} </small>
                                        </div>

                                        <!-- content -->
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label"> <i
                                                    class="mdi mdi-format-align-left"></i> Content </label>
                                            <ckeditor :editor="editor" v-model="plan.content" name="content"></ckeditor>
                                            <small class="text-danger" v-if="errors.content"> {{errors.content[0] }}
                                            </small>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button @submit.prevent="storePlan()" class="btn btn-success">{{ edit ?
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
            plans: {},
            plan: {
                title: '',
                old_price: '',
                price: '',
                recommended: '',
                content: '',
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
        this.getPlans();
    },
    methods: {

        /*======================================================
        ====== CheckBox
        ======================================================*/
        ckeckboxClicked(event) {

            const checkItems = document.querySelectorAll(".check-item");
            if (event.target.checked) { // check if main checker checked

                // Push all serivces id multiAction object
                this.plans.data.forEach( plan => {
                    this.multiAction.id.push(plan.id)
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
        getImageName(event, imgName) {  // at change input set plan img name
            this.plan[imgName] = event.target.files[0];
        },



        /*======================================================
        ====== GET Plans
        ======================================================*/
        getPlans(page = 1) {
            axios.get('/api/admin/plan?page=' + page)
                .then(
                    response => {
                        // console.log(response.data);
                        this.plans = response.data;
                    }
                )
                .catch(
                    error => console.log(error)
                )
        },



        /*======================================================
        ====== GET Plan
        ======================================================*/
        showPlan(plan) {
            axios.get('/api/admin/plan/' + plan.id)
                .then(
                    response => {
                        // console.log(response.data);
                        if (response.data.status == "success") {
                            this.plan = response.data.data
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
        ====== Create Plan
        ======================================================*/
        createPlan() {
            this.errors = {}, // empty error var
            this.edit = false, // set var edit equale 'false' to know that this modal for update
            this.plan = {
                title: '',
                old_price: '',
                price: '',
                recommended: '',
                content: '',
            }
        },
        storePlan() {

            // Set Config var to send it with data request
            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                }
            }


            const formData = serialize(
                this.plan,
            );


            // Send request with axios
            axios.post("/api/admin/plan", formData, config)
                .then(
                    response => {  // if there success request

                        // if response status
                        if (response.data.status == "success") {

                            // Close Model
                            $("#formModal").modal('hide');

                            // reload getPlans()
                            this.getPlans();

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
        ====== Update Plan
        ======================================================*/
        editPlan(plan) {
            this.errors = {}, // empty error var
            this.edit = true // set var edit equale 'true' to know that this modal for update

            axios.get('/api/admin/plan/' + plan.id)
                .then(
                    response => {
                        // console.log(response.data);
                        if (response.data.status == "success") {

                            // save response data in var
                            this.plan = response.data.data

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
        updatePlan() {


            // Set Config var to send it with data request
            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                }
            }

            const formData = serialize(
                this.plan,
            );

            // Add method put in form field
            formData.append('_method', 'PUT');



            // Send request with axios
            axios.post("/api/admin/plan/" + this.plan.id, formData, config)
                .then(
                    response => {  // if there success request

                        // console.log(response.data);

                        // if response status
                        if (response.data.status == "success") {

                            // Close Model
                            $("#formModal").modal('hide');

                            // reload getPlans()
                            this.getPlans();

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
                        // if plan not Found
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
        ====== Delete Plan
        ======================================================*/
        deletePost(plan) {
            this.$swal({
                text: 'Are you sure delete plan ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    // do delete response
                    axios.delete("/api/admin/plan/" + plan.id)
                        .then(
                            response => {  // if there success request

                                if (response.data.status == "success") {

                                    this.getPlans(); // reload getPlans()
                                    this.plan = {}      // empty plan var

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
        ====== Search Plan
        ======================================================*/
        searchPlan() {

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
            axios.post("/api/admin/plan/search", formData, config)
                .then(
                    response => {  // if there success request

                        // console.log(response.data)

                        // if response status
                        if (response.data.status == "success") {
                            this.plans = response.data.data;
                        }

                        // if plan not Found
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
                        axios.post("/api/admin/plan/multiAction", formData, config)
                        .then(
                            response => {  // if there success request

                                if (response.data.status == "success") {

                                    const mainChecker = document.getElementById("main-ckecker");
                                    mainChecker.checked = false;

                                    this.getPlans(); // reload getPlans()
                                    this.plan = {}      // empty plan var

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
