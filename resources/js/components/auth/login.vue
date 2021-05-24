<template>
    <div>




    <div class="auth-wrapper">
        <div class="auth-content">
            <div class="auth-bg">
                <span class="r"></span>
                <span class="r s"></span>
                <span class="r s"></span>
                <span class="r"></span>
            </div>
            <div class="card">

                <div class="card-body text-center">
                    <div class="mb-4">
                 <img :src="'images/logo.png'" style="heigth:80px;width:80px">
                    </div>
                    <h3 class="mb-4"> </h3>
            <form action="#" @submit.prevent="login">
              
                  
                        <div class="input-group mb-3">
                            <input id="email" type="text" v-model="formData.email" placeholder="Saisier vote email .. " class="form-control " name="email" value="" required autocomplete="email">
                   
                            <span class="invalid-feedback" role="alert">
                                <strong> </strong>
                            </span>
              
                        </div>
             
                        <div class="input-group mb-4">
                            <input  id="password" type="password" v-model="formData.password"  placeholder="Saisier vote mot de passe .. " class="form-control " name="password" required autocomplete="new-password">
            
                            <span class="invalid-feedback" role="alert">
                                <strong>  </strong>
                            </span>
  
                        </div>
               
                    <button type="submit"  class="btn btn-primary shadow-2 mb-4">Connectez - vous  <i class="fas fa-sign-in-alt"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>
</template>

<script>
    export default {
        data(){
            return {
                formData: {
                    email: '',
                    password: '',
                    device_name: 'browser'
                },
                errors: {}
            }
        },
        methods: {
            login(){
                axios.post('api/login', this.formData).then((response) => {
                    localStorage.setItem('token', response.data)
                    this.$router.push('/')
                }).catch((errors) => {
                    this.errors = errors.response.data.errors
                })
            }
        }
    }
</script>