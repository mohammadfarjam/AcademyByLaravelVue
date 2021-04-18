<template>
    <div class="row mt-5 mb-5 justify-content-center">

        <div class="mr-3" style="border: 1px solid;border-radius:35px;text-align: right;direction: rtl">
            <p class="p-4" style="font-size: 17px">مبلغ قابل پرداخت {{ total_price }} تومان</p>
            <button class="btn btn-warning mx-auto">ادامه فرایند خرید</button>
        </div>


        <div style="border: 1px solid;border-radius:35px;text-align: right;direction: rtl"
             class="ml-3">
            <p class="p-4" style="font-size: 25px">سبد خرید من </p>

            <span>
<ul style="list-style-type: none;">
    <li class="mb-4" v-for="info in infos" :key="info.id">
        <div class="d-flex flex-row">
                      <img :src="'/storage/photos/'+info[0].image" class="img-fluid" alt="" width="160" height="30"/>
            <div style="width: 100%">
        <p class="m-0 pr-4 w-100" style="font-size: 16px">{{ info[0].title }}</p>
        <p class="m-0 pr-4 w-100" style="font-size: 11px">مدرس : محمد فرجام</p>
                  <p style="float: left;direction: ltr;text-align: left;font-size: 20px"
                     class="pl-5 mt-4">{{ info[0].price }}تومان</p>
                <button class="mr-4 mt-3 btn btn-outline-danger" @click.prevent="delete_product(info[0].id)"><i class="ml-2 far fa-trash-alt"></i>حذف</button>
        </div>
        </div>


    </li>

</ul>
</span>


        </div>


    </div>
</template>

<script>
export default {

    data() {
        return {
            infos: '',
            total_price: '',

        }
    },

    methods: {
        delete_product(id){
            localStorage.removeItem(id);
        }
    },

    mounted() {
        this.infos = (JSON.parse(localStorage.getItem('add_to_basket')));
        let prices = [];
        $.each(this.infos, function (key, value) {
            prices.push(value[0].price);
        });

        let sum = 0;
        for (let i = 0; i < prices.length; i++) {
            sum += prices[i];
        }
        this.total_price = sum;


    },


}
</script>
