<template>
    <div>

        <navbar></navbar>
        <p> Home Home Home Home Home Home Home Home Home Home Home Home </p>

        <!-------- Unique Business --------->
        <div class="rwt-about-area rn-section-gap">
            <div class="container">
                <div class="row row--30 align-items-center">
                    <div class="col-lg-5">
                        <div class="thumbnail" data-sal="slide-right" data-sal-duration="800">
                            <img class="w-100" src="assets/images/about/about-1.png" alt="About Images">
                        </div>
                    </div>
                    <div class="col-lg-7 mt_md--40 mt_sm--40">
                        <div class="content" data-sal="slide-left" data-sal-duration="800">
                            <div class="section-title">
                                <h2 class="title">Unique Business <br>
                                    <span class="header-caption">
                                        <span class="cd-headline clip is-full-width">
                                            <span class="cd-words-wrapper">
                                                <b class="is-visible theme-gradient">Finance.</b>
                                                <b class="is-hidden theme-gradient">Consulting.</b>
                                                <b class="is-hidden theme-gradient">Agency.</b>
                                            </span>
                                    </span>
                                    </span>
                                </h2>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                    Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right
                                    at the coast of the Semantics, a large language ocean. They live in Bookmarksgrove
                                    right at the coast of the Semantics, a large language ocean.</p>
                                <p>A small river named Duden flows by their place and supplies it with the necessary
                                    regelialia. It is a paradisematic country, in which roasted parts of sentences. A
                                    small river named Duden flows by their place and supplies it with the necessary
                                    regelialia. It is a paradisematic country, in which roasted parts of sentences </p>
                                <div class="read-more-btn mt--40">
                                    <a class="btn-default" href="#">
                                        <span>More About Us</span>
                                    </a>
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
import navbar from '../Components/Navbar.vue'
import axios from 'axios';
import { serialize } from 'object-to-formdata';

export default {
    components: {
        navbar
    },

}
</script>
