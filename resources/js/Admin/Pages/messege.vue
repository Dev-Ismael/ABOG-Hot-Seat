<template>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h4 class="card-title"> <i class="fa-solid mdi mdi-book-multiple"></i> Messeges table</h4>
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
                                                <option value="delete">Delete Messege</option>
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
                                            <input type="text" class="form-control w-100" placeholder="Search By Subject..."
                                                name="searchVal" v-model="searchVal" @keyup="searchMessege()"
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
                                                <th> Subject </th>
                                                <th> Email </th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="messege in messeges.data" :key="messege.id">
                                                <td class="jsgrid-cell" style="width: 100px;">
                                                    <div class="form-check mt-0">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input check-item"
                                                            :value="messege.id" v-model="multiAction.id" >
                                                            <i class="input-helper"></i>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td> {{ messege.subject.length > 20 ? messege.subject.slice(0, 20) + '...' :
                                                messege.subject }} </td>
                                                <td> {{ messege.email.length > 50 ? messege.email.slice(0, 50) +
                                                '...' : messege.email }} </td>
                                                <td>
                                                    <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#showDataModal" @click="showMessege(messege)"
                                                        class="btn btn-secondary btn-rounded btn-icon p-2">
                                                        <i class="mdi mdi-eye"></i>
                                                    </button>
                                                    &nbsp;
                                                    <button type="button" @click="deletePost(messege)"
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
                                        aria-live="polite">Showing {{ ( (messeges.total + 1) - messeges.from) }} to {{ (
                                        (messeges.total + 1) - messeges.to) }} of {{ messeges.total }} entries</div>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers">
                                        <!-- pagination Component -->
                                        <!-- <Pagination :data="messeges" @pagination-change-page="getMesseges" :limit="1"/> -->
                                        <pagination :data="messeges" @pagination-change-page="getMesseges" :limit="2">
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
                                    <h5 class="modal-title" id="ModalLabel">Show Messege Data</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <span class="h4 fw-bold"> <i class="icon-user"></i> Name : </span>
                                        <span class="h6"> {{ messege.name }} </span>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <span class="h4 fw-bold"> <i class="mdi mdi-cellphone-android"></i> Phone :
                                        </span>
                                        <span class="h6"> {{ messege.phone }} </span>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <span class="h4 fw-bold"> <i class="mdi mdi-email"></i> Email :
                                        </span>
                                        <span class="h6"> {{ messege.email }} </span>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <span class="h4 fw-bold"> <i class="icon-menu"></i> Subject :
                                        </span>
                                        <span class="h6"> {{ messege.subject }} </span>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <span class="h4 fw-bold"> <i class="mdi mdi-format-align-left"></i> Messege :
                                        </span>
                                        <span class="h6"> {{ messege.body }} </span>
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
            messeges: {},
            messege: {},
            searchVal: '',
            multiAction: {
                id: [],
                action: ''
            },
        }
    },
    mounted() {
        this.getMesseges();
    },
    methods: {

        /*======================================================
        ====== CheckBox
        ======================================================*/
        ckeckboxClicked(event) {

            const checkItems = document.querySelectorAll(".check-item");
            if (event.target.checked) { // check if main checker checked

                // Push all serivces id multiAction object
                this.messeges.data.forEach( messege => {
                    this.multiAction.id.push(messege.id)
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
        ====== GET Messeges
        ======================================================*/
        getMesseges(page = 1) {
            axios.get('/api/admin/messege?page=' + page)
                .then(
                    response => {
                        // console.log(response.data);
                        this.messeges = response.data;
                    }
                )
                .catch(
                    error => console.log(error)
                )
        },



        /*======================================================
        ====== GET Messege
        ======================================================*/
        showMessege(messege) {
            axios.get('/api/admin/messege/' + messege.id)
                .then(
                    response => {
                        // console.log(response.data);
                        if (response.data.status == "success") {
                            this.messege = response.data.data
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
        ====== Update Messege
        ======================================================*/
        deletePost(messege) {
            this.$swal({
                text: 'Are you sure delete messege ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    // do delete response
                    axios.delete("/api/admin/messege/" + messege.id)
                        .then(
                            response => {  // if there success request

                                if (response.data.status == "success") {

                                    this.getMesseges(); // reload getMesseges()
                                    this.messege = {}      // empty messege var

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
        ====== Search Messege
        ======================================================*/
        searchMessege() {

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
            axios.post("/api/admin/messege/search", formData, config)
                .then(
                    response => {  // if there success request

                        // console.log(response.data)

                        // if response status
                        if (response.data.status == "success") {
                            this.messeges = response.data.data;
                        }

                        // if messege not Found
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
                        axios.post("/api/admin/messege/multiAction", formData, config)
                        .then(
                            response => {  // if there success request

                                if (response.data.status == "success") {

                                    const mainChecker = document.getElementById("main-ckecker");
                                    mainChecker.checked = false;

                                    this.getMesseges(); // reload getMesseges()
                                    this.messege = {}      // empty messege var

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
