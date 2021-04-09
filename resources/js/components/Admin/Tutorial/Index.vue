<template>
  <div>
    <table class="table table-hover position-relative">
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
        <tr v-for="(post, index) in info_posts">
          <td scope="row">{{ index + 1 }}</td>
          <td>{{ post.title }}</td>
          <td>{{ post.price }}</td>
          <td v-if="post.description.length < 50">{{ post.description }}</td>
          <td v-else>{{ post.description.substring(0, 80) + "..." }}</td>
          <td>
            {{ moment(post.created_at).locale("fa").format("jYYYY/jM/jD") }}
          </td>
          <td class="d-flex">
            <router-link :to="{ name: 'edit_tutorial' }">
              <button class="btn btn-primary" @click.prevent="edit(post.id)">
                ویرایش
              </button>
            </router-link>
            <button class="btn btn-danger">حذف</button>
          </td>
        </tr>
      </tbody>

<!-- 
      <div class="loader" v-show="loading"></div> -->

 
    </table>
  <div class="loader" v-show="loading"></div>





  </div>
</template>


<script>
import MomentJalali from "moment-jalaali";

export default {
  data() {
    return {
      info_posts: [],
      moment: MomentJalali,
      loading: true,
    };
  },

  methods: {
    getPosts() {
     axios
        .get("/api/post")
        .then((response) => {
          if (response.data === "error") {
            console.log("no data");
            this.loading = true;
          } 
          else {
            console.log("data");
            this.info_posts = response.data;
            this.loading = false;
          }
          

         

        })
        .catch((error) => {
          console.log(error);
        });
    },

    edit(id) {
      this.$router.push({ name: "edit_tutorial" });
      localStorage.id = id;
    },
  },

  created() {
    this.getPosts();
  },
};
</script>



<style scoped>
.loader {
  border: 5px solid #f3f3f3; /* Light grey */
  border-top: 5px solid #3498db; /* Blue */
  border-radius: 50%;
  width: 40px;
  height: 40px;
  animation: spin 2s linear infinite;
  margin:0 auto;

}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
