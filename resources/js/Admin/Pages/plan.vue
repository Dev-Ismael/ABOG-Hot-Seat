<template>
    <div class="row">
        <div class="col-md-12 col-xl-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Plan Plans</h4>

                    <form @submit.prevent="storePlan()" enctype="multipart/form-data" method="POST">
                        <div class="container">
                            <div class="row pt-3 pb-3">


                                <!------ Standard Box ------>
                                <div class="col-md-4 mt-2">
                                    <div class="plan-box standard">
                                        <h3 class="plan-title"> Standard </h3>
                                        <!-- US Price -->
                                        <div class="form-group">
                                            <label>
                                                <img src="/admin/images/icons/usa.png" alt="usa-flag" width="30">
                                                US Price
                                            </label>
                                            <input type="number" min="0" v-model="plan.standard.price.us.monthly" class="form-control" name="standard_price_us_monthly"
                                                id="standard_price_us_monthly" placeholder="Type Monthly Price...." :class=" errors[`standard.price.us.monthly`] ? 'border-danger' : ''  " >
                                            <small class="text-danger" v-if="errors[`standard.price.us.monthly`]"> {{errors[`standard.price.us.monthly`][0] }}
                                            </small>
                                            <br>
                                            <input type="number" min="0" v-model="plan.standard.price.us.yearly" class="form-control" name="standard_price_us_yearly"
                                                id="standard_price_us_yearly" placeholder="Type Yearly Price...." :class=" errors[`standard.price.us.yearly`] ? 'border-danger' : ''  " >
                                            <small class="text-danger" v-if="errors[`standard.price.us.yearly`]"> {{errors[`standard.price.us.yearly`][0] }}
                                            </small>
                                        </div>
                                        <!-- EG Price -->
                                        <div class="form-group">
                                            <label>
                                                <img src="/admin/images/icons/egypt.png" alt="egypt-flag" width="30">
                                                EG Price
                                            </label>
                                            <input type="number" min="0" v-model="plan.standard.price.eg.monthly" class="form-control" name="standard_price_eg_monthly"
                                                id="standard_price_eg_monthly" placeholder="Type Monthly Price...." :class=" errors[`standard.price.eg.monthly`] ? 'border-danger' : ''  " >
                                            <small class="text-danger" v-if="errors[`standard.price.eg.monthly`]"> {{errors[`standard.price.eg.monthly`][0] }}
                                            </small>
                                            <br>
                                            <input type="number" min="0" v-model="plan.standard.price.eg.yearly" class="form-control" name="standard_price_eg_yearly"
                                                id="standard_price_eg_yearly" placeholder="Type Yearly Price...." :class=" errors[`standard.price.eg.yearly`] ? 'border-danger' : ''  " >
                                            <small class="text-danger" v-if="errors[`standard.price.eg.yearly`]"> {{errors[`standard.price.eg.yearly`][0] }}
                                            </small>
                                        </div>
                                        <!-- Content -->
                                        <div class="form-group">
                                            <label for="standard_content" class="col-form-label"> <i
                                                    class="mdi mdi-format-align-left"></i> Content </label>
                                            <ckeditor :editor="editor" v-model="plan.standard.content" name="standard_content" id="standard_content"></ckeditor>
                                            <small class="text-danger" v-if="errors[`standard.content`]"> {{errors[`standard.content`][0] }}
                                            </small>
                                        </div>
                                    </div>
                                </div>



                                <!------ Premium Box ------>
                                <div class="col-md-4 mt-2">
                                    <div class="plan-box premium">
                                        <h3 class="plan-title"> Premium </h3>
                                        <!-- US Price -->
                                        <div class="form-group">
                                            <label>
                                                <img src="/admin/images/icons/usa.png" alt="usa-flag" width="30">
                                                US Price
                                            </label>
                                            <input type="number" min="0" v-model="plan.premium.price.us.monthly" class="form-control" name="premium_price_us_monthly"
                                                id="premium_price_us_monthly" placeholder="Type Monthly Price...." :class=" errors[`premium.price.us.monthly`] ? 'border-danger' : ''  " >
                                            <small class="text-danger" v-if="errors[`premium.price.us.monthly`]"> {{errors[`premium.price.us.monthly`][0] }}
                                            </small>
                                            <br>
                                            <input type="number" min="0" v-model="plan.premium.price.us.yearly" class="form-control" name="premium_price_us_yearly"
                                                id="premium_price_us_yearly" placeholder="Type Yearly Price...." :class=" errors[`premium.price.us.yearly`] ? 'border-danger' : ''  " >
                                            <small class="text-danger" v-if="errors[`premium.price.us.yearly`]"> {{errors[`premium.price.us.yearly`][0] }}
                                            </small>
                                        </div>
                                        <!-- EG Price -->
                                        <div class="form-group">
                                            <label>
                                                <img src="/admin/images/icons/egypt.png" alt="egypt-flag" width="30">
                                                EG Price
                                            </label>
                                            <input type="number" min="0" v-model="plan.premium.price.eg.monthly" class="form-control" name="premium_price_eg_monthly"
                                                id="premium_price_eg_monthly" placeholder="Type Monthly Price...." :class=" errors[`premium.price.eg.monthly`] ? 'border-danger' : ''  " >
                                            <small class="text-danger" v-if="errors[`premium.price.eg.monthly`]"> {{errors[`premium.price.eg.monthly`][0] }}
                                            </small>
                                            <br>
                                            <input type="number" min="0" v-model="plan.premium.price.eg.yearly" class="form-control" name="premium_price_eg_yearly"
                                                id="premium_price_eg_yearly" placeholder="Type Yearly Price...." :class=" errors[`premium.price.eg.yearly`] ? 'border-danger' : ''  " >
                                            <small class="text-danger" v-if="errors[`premium.price.eg.yearly`]"> {{errors[`premium.price.eg.yearly`][0] }}
                                            </small>
                                        </div>
                                        <!-- Content -->
                                        <div class="form-group">
                                            <label for="premium_content" class="col-form-label"> <i
                                                    class="mdi mdi-format-align-left"></i> Content </label>
                                            <ckeditor :editor="editor" v-model="plan.premium.content" name="premium_content" id="premium_content"></ckeditor>
                                            <small class="text-danger" v-if="errors[`premium.content`]"> {{errors[`premium.content`][0] }}
                                            </small>
                                        </div>
                                    </div>
                                </div>



                                <!------ Unlimited Box ------>
                                <div class="col-md-4 mt-2">
                                    <div class="plan-box unlimited">
                                        <h3 class="plan-title"> Unlimited </h3>
                                        <!-- US Price -->
                                        <div class="form-group">
                                            <label>
                                                <img src="/admin/images/icons/usa.png" alt="usa-flag" width="30">
                                                US Price
                                            </label>
                                            <input type="number" min="0" v-model="plan.unlimited.price.us.monthly" class="form-control" name="premium_price_us_monthly"
                                                id="unlimited_price_us_monthly" placeholder="Type Monthly Price...." :class=" errors[`unlimited.price.us.monthly`] ? 'border-danger' : ''  " >
                                            <small class="text-danger" v-if="errors[`unlimited.price.us.monthly`]"> {{errors[`unlimited.price.us.monthly`][0] }}
                                            </small>
                                            <br>
                                            <input type="number" min="0" v-model="plan.unlimited.price.us.yearly" class="form-control" name="unlimited_price_us_yearly"
                                                id="unlimited_price_us_yearly" placeholder="Type Yearly Price...." :class=" errors[`unlimited.price.us.yearly`] ? 'border-danger' : ''  " >
                                            <small class="text-danger" v-if="errors[`unlimited.price.us.yearly`]"> {{errors[`unlimited.price.us.yearly`][0] }}
                                            </small>
                                        </div>
                                        <!-- EG Price -->
                                        <div class="form-group">
                                            <label>
                                                <img src="/admin/images/icons/egypt.png" alt="egypt-flag" width="30">
                                                EG Price
                                            </label>
                                            <input type="number" min="0" v-model="plan.unlimited.price.eg.monthly" class="form-control" name="unlimited_price_eg_monthly"
                                                id="unlimited_price_eg_monthly" placeholder="Type Monthly Price...." :class=" errors[`unlimited.price.eg.monthly`] ? 'border-danger' : ''  " >
                                            <small class="text-danger" v-if="errors[`unlimited.price.eg.monthly`]"> {{errors[`unlimited.price.eg.monthly`][0] }}
                                            </small>
                                            <br>
                                            <input type="number" min="0" v-model="plan.unlimited.price.eg.yearly" class="form-control" name="unlimited_price_eg_yearly"
                                                id="unlimited_price_eg_yearly" placeholder="Type Yearly Price...." :class=" errors[`unlimited.price.eg.yearly`] ? 'border-danger' : ''  " >
                                            <small class="text-danger" v-if="errors[`unlimited.price.eg.yearly`]"> {{errors[`unlimited.price.eg.yearly`][0] }}
                                            </small>
                                        </div>
                                        <!-- Content -->
                                        <div class="form-group">
                                            <label for="unlimited_content" class="col-form-label"> <i
                                                    class="mdi mdi-format-align-left"></i> Content </label>
                                            <ckeditor :editor="editor" v-model="plan.unlimited.content" name="unlimited_content" id="unlimited_content"></ckeditor>
                                            <small class="text-danger" v-if="errors[`unlimited.content`]"> {{errors[`unlimited.content`][0] }}
                                            </small>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import { serialize } from 'object-to-formdata';

export default {

    data() {
        return {
            editor: ClassicEditor,   // import ClassicEditor theme to use in checkEditor package
            errors: {},     // create empty object to insert errors in it to show
            plan: {
                standard: {
                    price: {
                        us: {
                            monthly: '',
                            yearly: '',
                        },
                        eg: {
                            monthly: '',
                            yearly: '',
                        }
                    },
                    content: ''
                },
                premium: {
                    price: {
                        us: {
                            monthly: '',
                            yearly: '',
                        },
                        eg: {
                            monthly: '',
                            yearly: '',
                        }
                    },
                    content: ''
                },
                unlimited: {
                    price: {
                        us: {
                            monthly: '',
                            yearly: '',
                        },
                        eg: {
                            monthly: '',
                            yearly: '',
                        }
                    },
                    content: ''
                },
            },
        }
    },
    mounted() {
        this.showPlan();
    },
    methods: {


        /*======================================================
        ====== GET Plan
        ======================================================*/
        showPlan() {
            axios.get('/api/admin/plan/')
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
        ====== Update Settings
        ======================================================*/


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
            axios.post("/api/admin/plan" , formData, config)
                .then(
                    response => {  // if there success request

                        console.log(response.data);

                        // if response status
                        if (response.data.status == "success") {

                            // reload showPlan()
                            this.showPlan();

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

