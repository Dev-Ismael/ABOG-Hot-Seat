<template>

    <div class="main-content">
        <div class="header bg-gradient-primary pb-5 pt-5 pt-md-8">
            <div class="container-fluid">
                <h2 class="mb-5 text-white"> Dashboard </h2>
                <div class="header-body">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h3 class="card-title text-uppercase text-muted mb-0 pb-4">Users</h3>
                                            <span class="h2 font-weight-bold mb-0">{{ statistics.users }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-danger shadow p-2">
                                                <i class="fas fa-chart-bar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h3 class="card-title text-uppercase text-muted mb-0 pb-4 mb-0">Messeges</h3>
                                            <span class="h2 font-weight-bold mb-0">{{ statistics.messeges }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-warning shadow p-2">
                                                <i class="fas fa-chart-pie"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h3 class="card-title text-uppercase text-muted mb-0 pb-4 mb-0">Plans</h3>
                                            <span class="h2 font-weight-bold mb-0">{{ statistics.plans }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-yellow  shadow p-2">
                                                <i class="fas fa-users"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h3 class="card-title text-uppercase text-muted mb-0 pb-4 mb-0">Orders</h3>
                                            <span class="h2 font-weight-bold mb-0">{{ statistics.orders }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-info  shadow p-2">
                                                <i class="fas fa-percent"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
    </div>

</template>
<script>
import axios from 'axios';
export default {

    data() {
        return {
            statistics: ''
        }
    },
    mounted() {
        this.showStatistics();
    },
    methods: {

        /*======================================================
        ====== GET Statistics
        ======================================================*/
        showStatistics() {
            axios.get('/api/admin/statistics/')
            .then(
                response => {
                    // console.log(response.data);
                    this.statistics = response.data;
                }
            )
            .catch(
                error => console.log(error)
            )
        },
    },

}
</script>
