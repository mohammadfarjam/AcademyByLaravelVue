<template>
    <div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">ردیف</th>
                <th scope="col">عنوان</th>
                <th scope="col">مبلغ</th>
                <th scope="col">توضیحات</th>
                <th scope="col">تاریخ ایجاد</th>
                <th scope="col">عملیات</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(post,index) in info_posts">
                <td scope="row">{{ index + 1 }}</td>
                <td>{{ post.title }}</td>
                <td>{{ post.price }}</td>
                <td v-if="post.description.length < 50 ">{{post.description}}</td>
                <td v-else>{{post.description.substring(0,80)+"..."}}</td>
                <td>{{ moment(post.created_at).locale('fa').format('jYYYY/jM/jD')}}</td>
                <td class="d-flex">
                    <button class="btn btn-primary" @click.prevent="edit">ویرایش</button>
                    <button class="btn btn-danger">حذف</button>
                </td>
            </tr>

            </tbody>
        </table>
    </div>
</template>


<script>
import MomentJalali from 'moment-jalaali';

export default {
    data() {
        return {
            info_posts: [],
            moment: MomentJalali,
        }
    },


    methods:{
        getPosts() {
            axios.get('/api/post').then(response => {
                this.info_posts= (response.data);
            }).catch((error) => {
                console.log(error)

            });
        },

        edit(){
            this.$router.push({ name: "edit_tutorial"})
        }
    },


    mounted() {
        this.getPosts();

    },

}
</script>
