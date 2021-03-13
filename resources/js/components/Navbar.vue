<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-right"
             style="direction: rtl">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav ml-auto text-right">
                    <li class="nav-item active">
                        <router-link to="/" class="nav-link">خانه</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/about" class="nav-link">درباره ما</router-link>
                    </li>
                </ul>
<!--                <p>{{ user.name }}</p>-->
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/login" class="btn nav-link text-light ml-3">ورود</a></li>
                    <li><a href="/register" class="btn btn-outline-info nav-link custom_btn text-light">ثبت نام</a></li>
                    <li><a href="/logout" class="btn btn-outline-info nav-link custom_btn text-light"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        خروج
                        </a>
                        <form id="logout-form" action="/logout" method="POST" style="display: none;">
                            <input type="hidden" name="_token" v-bind:value="csrf">
                        </form>
                    </li>
                </ul>
            </div>
        </nav>

    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            //csrf token
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }
    },
    props : ['userInfo'],

    mounted() {
        console.log(this.userInfo);
    }


}
</script>
