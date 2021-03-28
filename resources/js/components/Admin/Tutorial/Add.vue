<template>
    <div class="col-8 offset-md-1">
        <div class="form-group">
            <label>عنوان</label>
            <input
                class="form-control"
                type="text"
                name="title"
                v-model="form.title"
            />
        </div>
        <!--form-group-->

        <div class="form-group">
            <label>قیمت</label>
            <input
                class="form-control"
                type="text"
                name="price"
                v-model="form.price"
            />
        </div>
        <!--form-group-->

        <div class="form-group">
            <label>درصد تخفیف</label>
            <input
                class="form-control"
                type="text"
                name="discount"
                v-model="form.discount"
            />
        </div>
        <!--form-group-->

        <div class="form-group">
            <label>توضیحات</label>
            <textarea class="form-control" v-model="form.description"></textarea>
        </div>
        <!--form-group-->

        <vue-dropzone
            ref="myVueDropzone"
            id="dropzone"
            :options="dropzoneOptions"
            @vdropzone-complete="afterUploadComplete"
        ></vue-dropzone>
        <input type="hidden" v-model="form.photo_name"/>

        <button class="btn btn-success" @click.prevent="add_post">ثبت</button>
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
            form: {
                title: "",
                price: "",
                discount: "",
                description: "",
                photo_name: "",
            },

            dropzoneOptions: {
                url: "/api/upload_photos",
                type: "get",
                thumbnailWidth: 150,
                maxFilesize: 0.5,
            },
        };
    },
    methods: {
        async afterUploadComplete(response) {
            if (response.status === "success") {
                this.form.photo_name = response.upload.filename;
            } else {
                console.log("uploaded failed");
            }
        },

        add_post() {
            axios
                .post("/api/post", this.form)
                .then((response) => {
                    console.log(response);
                })
                .catch((error) => {
                    console.log(error.response);
                });
        },
    },
};
</script>
