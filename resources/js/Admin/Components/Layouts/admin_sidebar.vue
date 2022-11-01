<template>

    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item">
                <router-link to="/admin/dashboard" class="nav-link" >
                    <i class="mdi mdi-grid-large menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </router-link>
            </li>
            <li class="nav-item nav-category">Tables</li>

            <li class="nav-item">
                <router-link to="/admin/user" class="nav-link" >
                    <i class="icon-people menu-icon"></i>
                    <span class="menu-title">Users</span>
                </router-link>
            </li>
            <li class="nav-item">
                <router-link to="/admin/plan" class="nav-link" >
                    <i class="mdi mdi-cash-usd menu-icon"></i>
                    <span class="menu-title"> Pricing </span>
                </router-link>
            </li>
            <li class="nav-item">
                <router-link to="/admin/messege" class="nav-link" >
                    <i class="mdi mdi-message-text-outline menu-icon"></i>
                    <span class="menu-title">Messeges</span>
                </router-link>
            </li>
            <li class="nav-item">
                <router-link to="/admin/order" class="nav-link" >
                    <i class="mdi mdi-cards menu-icon"></i>
                    <span class="menu-title">Orders</span>
                </router-link>
            </li>
            <li class="nav-item nav-category">Help</li>
            <li class="nav-item">
                <router-link to="/admin/settings" class="nav-link" >
                    <i class="mdi mdi-settings menu-icon"></i>
                    <span class="menu-title"> Setting </span>
                </router-link>
            </li>
        </ul>
    </nav>

</template>
