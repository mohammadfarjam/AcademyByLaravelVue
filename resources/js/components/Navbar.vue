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

                <router-link to="/checkout">
                    <i style="color: #fff;font-size: 25px;margin:10px 20px;" class="fas fa-shopping-bag"></i>
                </router-link>
                <div v-if="user_info" class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ user_info.name }}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a href="/logout" class="dropdown-item btn btn-outline-info nav-link custom_btn text-dark" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            خروج
                        </a>
                        <form id="logout-form" action="/logout" method="POST" style="display: none;">
                            <input type="hidden" name="_token" v-bind:value="csrf">
                        </form>
                    </div>
                </div>



                <ul v-if="!user_info" class="nav navbar-nav navbar-right">
                    <li><a href="/login" class="btn btn-outline-info nav-link text-light ml-3">ورود</a></li>
                    <li><a href="/register" class="btn btn-outline-info nav-link custom_btn text-light">ثبت نام</a></li>

                </ul>
            </div>
        </nav>

    </div>
</template>

<script>

export default {
    data() {
        return {
            //csrf token
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }
    },
    props : ['user_info'],


}
</script>

