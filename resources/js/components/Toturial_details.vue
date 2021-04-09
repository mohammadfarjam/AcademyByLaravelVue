<template>
    <div style="direction: rtl;text-align: right">
        <!-- Page Content -->
        <div class="container">

            <div class="row">

                <!-- Post Content Column -->
                <div class="col-lg-8">

                    <!-- Title -->
                    <h1 class="mt-4">{{details_product.title}}</h1>

                    <!-- Author -->
                    <p class="lead">
                        نوشته شده توسط:
                        {{details_product.user.name}}
                    </p>

                    <hr>

                    <!-- Date/Time -->
                    <p>منتشر شده در : {{ moment(details_product.created_at).locale("fa").format("jYYYY/jM/jD") }}</p>

                    <hr>

                    <!-- Preview Image -->
                    <img class="img-fluid rounded" :src="'/storage/photos/'+details_product.image" alt="">

                    <hr>

                    <!-- Post Content -->
                    <p class="lead">{{details_product.description}}</p>


                    <hr>

                    <!-- Comment with nested comments -->
                    <div class="media mb-4">
                        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                        <div class="media-body">
                            <h5 class="mt-0">Commenter Name</h5>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

                            <div class="media mt-4">
                                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                                <div class="media-body">
                                    <h5 class="mt-0">Commenter Name</h5>
                                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                </div>
                            </div>



                        </div>
                    </div>

                </div>


            </div>
            <!-- /.row -->
    </div>
    </div>



</template>

<script>

import MomentJalali from "moment-jalaali";
export default {

    props: ['slug'],
    data(){
        return{
            details_product:[],
            moment: MomentJalali,
        }
    },
    methods: {
        details_products() {
            axios.get("/api/details_products/"+this.slug).then(response => {
                this.details_product = response.data;
            }).catch((error) => {
                console.log(error)
            });
        }
    },
    mounted() {
        this.details_products()
    },



}
</script>
