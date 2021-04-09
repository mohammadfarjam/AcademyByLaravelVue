<template>


    <div class="row d-flex flex-row justify-content-center mt-4">

        <div v-for="post in new_products" class="card col-lg-3 col-md-4 col-sm-12 m-2 p-0"
             style="border: none;max-width:350px;">
            <router-link :to="{name:'details',params:{slug:post.slug }}" >
                <img class="card-img-top" :src="'/storage/photos/'+post.image" alt="images/learn_js.jpg">
            </router-link>
            <div class="card-body text-right" style="position: relative">
                <h5 class="card-title">{{ post.title }}</h5>
                <h6 class="card-text">محمد فرجام</h6>
                <span class="d-flex flex-row justify-content-end">
                       <p class="text-success mb-3 ">تومان</p>
                    <p class="text-success mb-3">{{ post.price }} </p>
                    </span>

                <a href="#" class="btn btn-primary add_card">افزودن به سبد خرید</a>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    data() {
        return {
            new_products: [],
        }
    },
    methods: {
        get_new_products() {
            axios.get('/api/get_new_products').then(response => {
                this.new_products = response.data;
            }).catch((error) => {
                console.log(error)
            });
        }
    },
    mounted() {
        this.get_new_products()
    },

}
</script>
