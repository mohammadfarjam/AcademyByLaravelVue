<template>
    <div style="width: 50%;height: 50%;border: 1px solid;border-radius:35px;text-align: right;direction: rtl"
         class="mx-auto mt-5">
        <p class="p-4" style="font-size: 25px">سبد خرید من </p>

        <span>
<ul style="list-style-type: none;">
    <li class="mb-4">
        <div class="d-flex flex-row">
             <img :src="'/storage/photos/'+infos.image" class="img-fluid" alt="" width="160" height="30"/>
            <div style="width: 100%">
        <p class="m-0 pr-4 w-100" style="font-size: 16px">{{ infos }}</p>
        <p class="m-0 pr-4 w-100" style="font-size: 11px">مدرس : محمد فرجام</p>
                  <p style="float: left;direction: ltr;text-align: left;font-size: 20px"
                     class="pl-5 mt-4">{{infos.price }}تومان</p>
                <button class="mr-4 mt-3 btn btn-outline-danger"><i class="ml-2 far fa-trash-alt"></i>حذف</button>
        </div>
        </div>
    </li>
</ul>
</span>
    </div>
</template>

<script>
export default {

    data() {
        return {
            infos:[],
            // ids: [],
            // result: [],

        }
    },

    methods: {

    },

    mounted() {
        this.infos=localStorage.add_to_basket;
        // this.result = this.ids;
        // this.result = this.result.split("");
        // let value = ",";
        // this.result = this.result.filter(function (item) {
        //     return item !== value
        // });
        console.log(this.infos)
    }
}
</script>
