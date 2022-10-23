<template>
    <form @submit.prevent="UpdateSeo()" enctype="multipart/form-data" method="POST">
    <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> <i class="fa-solid fa-house-user"></i> Home Page </h4>
                        <div class="form-group">
                            <label for="HomeSEOTitle">SEO Title</label>
                            <input type="text" class="form-control" id="HomeSEOTitle" v-model="seo.home.title" name="home[seo_title]"
                                placeholder="Type Home Page Seo Title..." autocomplete="off"  :class=" errors[`home.title`] ? 'border-danger' : ''  "  />
                            <small class="text-danger" v-if="errors[`home.title`]"> {{errors[`home.title`][0] }}
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="HomeSEOKeywords">SEO Keywords</label>
                            <textarea class="form-control" id="HomeSEOKeywords"  v-model="seo.home.keywords"  cols="30" rows="10"
                            name="home[seo_keywords]" placeholder="Type Home Page SEO Keywords..."
                                autocomplete="off" :class=" errors[`home.keywords`] ? 'border-danger' : ''  " ></textarea>
                            <small class="text-danger" v-if="errors[`home.keywords`]"> {{errors[`home.keywords`][0] }}
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="HomeSEODescription">SEO Description</label>
                            <textarea class="form-control" id="HomeSEODescription"  v-model="seo.home.description"  cols="30" rows="10"
                                name="home[seo_description]" placeholder="Type Home Page SEO Description..."
                                autocomplete="off"  :class=" errors[`home.description`] ? 'border-danger' : ''  "></textarea>
                            <small class="text-danger" v-if="errors[`home.description`]"> {{errors[`home.description`][0] }}
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> <i class="fa-solid fa-circle-info"></i> About Page </h4>
                        <div class="form-group">
                            <label for="AboutSEOTitle">SEO Title</label>
                            <input type="text" class="form-control" id="AboutSEOTitle" v-model="seo.about.title" name="about[seo_title]"
                                placeholder="Type About Page Seo Title..." autocomplete="off"  :class=" errors[`about.title`] ? 'border-danger' : ''  "  />
                            <small class="text-danger" v-if="errors[`about.title`]"> {{errors[`about.title`][0] }}
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="AboutSEOKeywords">SEO Keywords</label>
                            <textarea class="form-control" id="AboutSEOKeywords"  v-model="seo.about.keywords"  cols="30" rows="10"
                            name="about[seo_keywords]" placeholder="Type About Page SEO Keywords..."
                                autocomplete="off" :class=" errors[`about.keywords`] ? 'border-danger' : ''  " ></textarea>
                            <small class="text-danger" v-if="errors[`about.keywords`]"> {{errors[`about.keywords`][0] }}
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="AboutSEODescription">SEO Description</label>
                            <textarea class="form-control" id="AboutSEODescription"  v-model="seo.about.description"  cols="30" rows="10"
                                name="about[seo_description]" placeholder="Type About Page SEO Description..."
                                autocomplete="off"  :class=" errors[`about.description`] ? 'border-danger' : ''  "></textarea>
                            <small class="text-danger" v-if="errors[`about.description`]"> {{errors[`about.description`][0] }}
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> <i class="fa-solid fa-message"></i> Contact Page </h4>
                        <div class="form-group">
                            <label for="ContactSEOTitle">SEO Title</label>
                            <input type="text" class="form-control" id="ContactSEOTitle" v-model="seo.contact.title" name="contact[seo_title]"
                                placeholder="Type Contact Page Seo Title..." autocomplete="off"  :class=" errors[`contact.title`] ? 'border-danger' : ''  "  />
                            <small class="text-danger" v-if="errors[`contact.title`]"> {{errors[`contact.title`][0] }}
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="ContactSEOKeywords">SEO Keywords</label>
                            <textarea class="form-control" id="ContactSEOKeywords"  v-model="seo.contact.keywords"  cols="30" rows="10"
                            name="contact[seo_keywords]" placeholder="Type Contact Page SEO Keywords..."
                                autocomplete="off" :class=" errors[`contact.keywords`] ? 'border-danger' : ''  " ></textarea>
                            <small class="text-danger" v-if="errors[`contact.keywords`]"> {{errors[`contact.keywords`][0] }}
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="ContactSEODescription">SEO Description</label>
                            <textarea class="form-control" id="ContactSEODescription"  v-model="seo.contact.description"  cols="30" rows="10"
                                name="contact[seo_description]" placeholder="Type Contact Page SEO Description..."
                                autocomplete="off"  :class=" errors[`contact.description`] ? 'border-danger' : ''  "></textarea>
                            <small class="text-danger" v-if="errors[`contact.description`]"> {{errors[`contact.description`][0] }}
                            </small>
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
            seo: {
                home: {
                    title: '',
                    keywords: '',
                    description: ''
                },
                about: {
                    title: '',
                    keywords: '',
                    description: ''
                },
                contact: {
                    title: '',
                    keywords: '',
                    description: ''
                },
            },
        }
    },
    mounted() {
        this.showSeo();
    },
    methods: {


        /*======================================================
        ====== GET Seo
        ======================================================*/
        showSeo() {
            axios.get('/api/admin/seo-management')
                .then(
                    response => {
                        // console.log(response.data);
                        if (response.data.status == "success") {
                            this.seo = response.data.data
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
        ====== Update SEO
        ======================================================*/


        UpdateSeo() {

            // Set Config var to send it with data request
            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                }
            }

            const formData = serialize(
                this.seo,
            );

            // Send request with axios
            axios.post("/api/admin/seo-management", formData, config)
                .then(
                    response => {  // if there success request

                        console.log(response.data);

                        // if response status
                        if (response.data.status == "success") {

                            // reload showSeo()
                            this.showSeo();

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
