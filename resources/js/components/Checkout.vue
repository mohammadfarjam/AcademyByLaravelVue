<template>
<div style="width: 50%;height: 50%;border: 1px solid;border-radius:35px;text-align: right;direction: rtl" class="mx-auto mt-5">
<p class="p-4" style="font-size: 25px">سبد خرید من </p>

<span>
<ul v-for="info in infos" style="list-style-type: none;">
    <li  class="mb-4">
        <div class="d-flex flex-row" >
            <img :src="'/storage/photos/'+info.image" class="img-fluid" alt="" width="200" />
            <div style="width: 100%">
        <p class="m-0 pr-4 w-100" style="font-size: 16px">{{info.title}}</p>
        <p class="m-0 pr-4 w-100" style="font-size: 11px">مدرس : محمد فرجام</p>
                  <p style="float: left;direction: ltr;text-align: left;font-size: 20px" class="pl-5 mt-4">{{ info.price }} تومان</p>
                <button class="mr-4 mt-3 btn btn-outline-danger"><i class="ml-2 far fa-trash-alt"></i>حذف</button>
        </div>
        </div>

    </li>
</ul>
</span>
</div>
</template>

<script>
export default{

    data(){
        return{
            infos:[],
        }
    },

    methods:{

        get_info_to_add_basket() {
            axios.get('/api/get_info_to_add_basket/'+localStorage.id_toturial).then(response => {
                this.infos = (response.data);
            }).catch((error) => {
                console.log(error)

            });
        },


        // async get_info_to_add_basket() {
        //     try {
        //         const response= await axios.get('/api/get_info_to_add_basket/'+localStorage.id_toturial);
        //         this.infos= response.data;
        //         console.log(response)
        //
        //     } catch (error) {
        //         console.log(error);
        //     }
        // },
    },

    mounted() {
        this.get_info_to_add_basket()
    }
}
</script>
