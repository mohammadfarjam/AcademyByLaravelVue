<template>


        <div class="row d-flex flex-row justify-content-center mt-4">

            <div class="card col-lg-3 col-md-4 col-sm-12 m-2 p-0" style="border: none;max-width:350px;">
                <img class="card-img-top" src="images/learn_js.jpg" alt="images/learn_js.jpg">
                <div class="card-body text-right" style="position: relative">
                    <h5 class="card-title">Card title</h5>
                    <h6 class="card-text">محمد فرجام</h6>
                    <p class="text-success mb-3"  >95000 تومان</p>
                    <a href="#" class="btn btn-primary add_card">افزودن به سبد خرید</a>
                </div>
            </div>


            <div class="card col-lg-3 col-md-4 col-sm-12 m-2 p-0 " style="border: none;max-width:350px;">
                <img class="card-img-top" src="images/php.png" alt="images/learn_js.jpg">
                <div class="card-body text-right" style="position: relative">
                    <h5 class="card-title">Card title</h5>
                    <h6 class="card-text">محمد فرجام</h6>
                    <p class="text-success mb-3"  >95000 تومان</p>
                    <a href="#" class="btn btn-primary add_card">افزودن به سبد خرید</a>
                </div>
            </div>

            <div class="card col-lg-3 col-md-4 col-sm-12 m-2 p-0" style="border: none;max-width:350px;">
                <router-link to="/details"><img class="card-img-top" src="images/bootstrap.png" alt="images/learn_js.jpg"></router-link>
                <div class="card-body text-right" style="position: relative">
                    <router-link to="/details"> <h5 class="card-title">Card title</h5></router-link>
                    <h6 class="card-text">محمد فرجام</h6>
                    <p class="text-success mb-3"  >95000 تومان</p>
                    <a href="#" class="btn btn-primary add_card">افزودن به سبد خرید</a>
                </div>
            </div>






        </div>

</template>

<script>
export default {}
</script>
