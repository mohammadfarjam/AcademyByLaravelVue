<template>
  <div class="row d-flex flex-row justify-content-center mt-4">
    <div
      v-for="post in new_products"
      :key="post.id"
      class="card col-lg-3 col-md-4 col-sm-12 m-2 p-0"
      style="border: none; max-width: 350px"
    >
      <router-link :to="{ name: 'details', params: { slug: post.slug } }">
        <img
          class="card-img-top"
          :src="'/storage/photos/' + post.image"
          alt="images/learn_js.jpg"
        />
      </router-link>
      <div class="card-body text-right" style="position: relative">
        <h5 class="card-title">{{ post.title }}</h5>
        <h6 class="card-text">محمد فرجام</h6>
        <span class="d-flex flex-row justify-content-end">
          <p class="text-success mb-3">تومان</p>
          <p class="text-success mb-3">{{ post.price }}</p>
        </span>

        <p
          class="btn btn-primary add_card"
          @click.prevent="add_to_basket(post.id)"
        >
          افزودن به سبد خرید
        </p>
      </div>
    </div>
  </div>
</template>

<script>
import NavbarVue from "./Navbar.vue";
export default {
  data() {
    return {
      new_products: [],
      datas: [],
      arrId: [],
      filterId: [],
    };
  },
  methods: {
    async get_new_products() {
      try {
        const response = await axios.get("/api/get_new_products");
        this.new_products = response.data;
      } catch (error) {
        console.log(error);
      }
    },

    async add_to_basket(id) {
      this.arrId.push(id);
        
      this.filterId = Array.from(new Set(this.arrId));
 
    for(let i=0; i < this.filterId.length;i++){
        console.log(this.filterId[i])
        if(this.filterId.length > 0 && id === this.filterId[i] ){
             try {
          const response = await axios.get("/api/get_info_to_add_basket/" + id);
          this.datas.push(response.data);
          localStorage.add_to_basket = JSON.stringify(this.datas);
        } catch (error) {
          console.log(error);
        }
    
        }else{
              
            }
            

    }
      
    // if($.inArray(id, filterId) !== -1){
    //      console.log("exist");
          
    //   } else {
    //      
       
         
    //   }
    },
  },

  mounted() {
    this.get_new_products();
  },
};
</script>
