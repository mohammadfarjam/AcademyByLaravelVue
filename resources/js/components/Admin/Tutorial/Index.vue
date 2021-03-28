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
            </tr>
            </thead>
            <tbody>
            <tr v-for="(post,index) in info_posts">
                <th scope="row">{{ index + 1 }}</th>
                <td>{{ post.title }}</td>
                <td>{{ post.price }}</td>
                <td v-if="post.description.length < 50 ">{{post.description}}</td>
                <td v-else>{{post.description.substring(0,80)+"..."}}</td>
                <td>
                    {{post.created_at | moment("YYYY")}}

                </td>
            </tr>

            </tbody>
        </table>
    </div>
</template>


<script>
export default {
    data() {
        return {
            info_posts: [],
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
    },


    mounted() {
        this.getPosts()
    },
}
</script>
