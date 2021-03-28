<template>
    <div>
        <button class="btn btn-outline-success" @click.prevent="modal_add_user">کاربر جدید</button>

        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">ردیف</th>
                <th scope="col">نام کاربر</th>
                <th scope="col">ایمیل</th>
                <th scope="col">نقش کاربر</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(user,index) in info_users">
                <th scope="row">{{ index + 1 }}</th>
                <td>{{ user.name }}</td>
                <td>{{ user.email }}</td>
                <td>
                    <span v-for="role in user.roles" class="d-block">{{ role.title }}</span>
                </td>
            </tr>

            </tbody>
        </table>


        <!-- Modal -->
        <div
            :style="{backgroundColor:'rgba(0,0,0,.6)',display:'table',width:'100vw',height:'100vh',position:'fixed',zIndex:'9998',top:'0',left:'0'}"
            v-if="open_modal" class=" p-0 " id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">کاربر جدید</h5>
                    </div>
                    <div class="modal-body">

<form>
                        <div class="form-group">
                            <label>نام کاربری</label>
                            <input class="form-control" name="text" placeholder="نام کاربری" v-model="form.name" autocomplete="off" />
                            <div class="error" v-for="key in error_form_validate.name" v-html="key"></div>
                        </div>
                        <!--form-group-->


                        <div class="form-group">
                            <label>ایمیل</label>
                            <input class="form-control" name="email" placeholder="ایمیل" v-model="form.email" autocomplete="off" />
                            <div class="error" v-for="key in error_form_validate.email" v-html="key"></div>
                        </div>
                        <!--form-group-->


                        <div class="form-group">
                            <label>رمز عبور</label>
                            <input class="form-control" placeholder="********" type="password" name="password" v-model="form.password"  id="password"/>
                            <div class="error" v-for="key in error_form_validate.password" v-html="key"></div>
                        </div>
                        <!-- form-group-->


    <div class="form-group">
        <label> نقش کاربر</label>
   <select class="form-group form-control" v-model="form.role" multiple>
       <option  v-for="role in info_roles"  :value="role.id">{{role.title}}</option>
   </select>
        <div class="error" v-for="key in error_form_validate.role" v-html="key"></div>

    </div>
    <!-- form-group-->

</form>

                    </div>
                    <div class="modal-footer">
                        <button @click.prevent="close_modal" type="button" class="btn btn-light"
                                data-dismiss="modal">لغو
                        </button>
                        <button type="button" class="btn btn-success" @click.prevent="add_user">ثبت</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
</template>

<script>


export default {
    data() {
        return {
            info_users: [],
            info_roles: [],
            open_modal: false,
            error_form_validate:[],

            form: {
                name: '',
                email: '',
                password: '',
                role:[],
            }

        }
    },
    methods: {
        getUser() {
            axios.get('/api/get_info_users').then(response => {
                this.info_users = (response.data);
            }).catch((error) => {
                console.log(error)

            });
        },

        modal_add_user() {
            this.open_modal = true;
            axios.get('/api/get_roles').then(response => {
                this.info_roles = (response.data);
            }).catch((error) => {
                    console.log(error)
            });
        },

        close_modal() {
            this.open_modal = false;
        },


        add_user(){
            axios.post('/api/add_user',this.form).then(response => {
                // console.log(response)
                if (response.status === 200){
                    this.open_modal = false;
                    this.$toaster.success('کاربر با موفقیت ایجاد شد.');
                    this.getUser();
                }else{
                    this.open_modal = false;
                    this.$toaster.error('ثبت کاربر با خطا مواجه شده است.');
                }
            }).catch((error) => {
                this.error_form_validate=error.response.data;
                this.$toaster.error('ثبت کاربر با خطا مواجه شده است.');
            });
        }


    },

    mounted() {
        this.getUser()
    },

}
</script>
