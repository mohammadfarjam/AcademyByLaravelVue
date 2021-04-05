<template>
    <div class="col-8 offset-md-1">
        <div class="form-group">
            <label>عنوان</label>
            <input
                class="form-control"
                type="text"
                name="title"
                v-model="info_edit.title"
            />
        </div>
        <!--form-group-->

        <div class="form-group">
            <label>قیمت</label>
            <input
                class="form-control"
                type="text"
                name="price"
                v-model="info_edit.price"
            />
        </div>
        <!--form-group-->

        <div class="form-group">
            <label>درصد تخفیف</label>
            <input
                class="form-control"
                type="text"
                name="discount"
                v-model="info_edit.discount"
            />
        </div>
        <!--form-group-->

        <div class="form-group">
            <label>توضیحات</label>
            <textarea class="form-control" v-model="info_edit.description" />
        </div>
        <!--form-group-->

        <vue-dropzone
            ref="myVueDropzone"
            id="dropzone"
            :options="dropzoneOptions"
            @vdropzone-complete="afterUploadComplete"
        ></vue-dropzone>
        
        <img :src="'/storage/photos/'+info_edit.path_img" alt="" class="img-fluid" />
         <input type="hidden" v-model="info_edit.path_img"/>
        <button class="btn btn-warning" @click.prevent="edit">ویرایش</button>
    </div>
</template>

<script>
import vue2Dropzone from "vue2-dropzone";
import "vue2-dropzone/dist/vue2Dropzone.min.css";

export default {
    components: {
        vueDropzone: vue2Dropzone,
    },

    data() {
        return {

             info_edit: {
                title: "",
                price: "",
                discount: "",
                description: "",
                path_img:"",
            },

            info_edit:[],

            dropzoneOptions: {
                url: "/api/upload_photos",
                type: "json",
                maxFilesize: 1,
            },
        };
    },
    methods: {
        async afterUploadComplete(response) {
            if (response.status === "success") {
                this.info_edit.path_img = response.upload.filename;
            } else {
                console.log("uploaded failed");
            }
        },

        getData() {
           axios.get('/api/post/'+localStorage.id).then(response => {
                this.info_edit = (response.data);
            }).catch((error) => {
                console.log(error)

            });
        },




        edit(){
            axios.put("/api/post/"+localStorage.id,this.info_edit).then(response =>{
                if(response.data === ""){
                     this.$router.push({ name: 'index_tutorial'});
                     setTimeout(()=>{
                      this.$toaster.success('مطلب با موفقیت ویرایش شد.');
                      localStorage.clear();
                     },1500)
                }else{
                     this.$toaster.error('خطا در ویرایش مطلب  ');
                }
            }).catch((error)=>{
                console.log(error)
            })
        }


    },


    mounted() {
         this.getData();
    }
};
</script>
