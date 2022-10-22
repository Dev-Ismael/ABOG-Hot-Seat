<template>
    <header class="rn-header header-default header-left-align header-transparent header-sticky">
        <div class="container position-relative">
            <div class="row align-items-center">
                <div class="col-lg-9 col-md-6 col-4 position-static">
                    <div class="header-left d-flex">
                        <div class="logo">
                            <a href="index.html">
                                <img class="logo-light" src="assets/images/logo/logo.png" alt="Corporate Logo">
                                <img class="logo-dark" src="assets/images/logo/logo-dark.png" alt="Corporate Logo">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-8">
                    <div class="header-right">
                        <nav class="mainmenu-nav d-none d-lg-block">
                            <ul class="mainmenu">
                                <li><a href="/">Home</a></li>
                                <li><a href="contact.html">About</a></li>
                                <li><a href="contact.html">Pricing</a></li>
                                <li><a href="contact.html">Contact</a></li>
                                <li><a href="/register">Register</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>
<script>
import axios from 'axios';
import { serialize } from 'object-to-formdata';

export default {
    name: 'Header',
    components: {

    },
    data() {
        return {

        }
    },
    mounted() {

    },
    methods: {



    },
}
</script>
