<template>
     <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
              <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                  <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                      <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Create New Account</p>
                      <form class="mx-1 mx-md-4" @submit.prevent="submit" method="POST"  nonvalidate ="nonvalidate"> 
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="name" id="form3Example3c" name="name" class="form-control" v-model="name"/>
                            <label class="form-label" for="form3Example3c">Enter Your Name</label>
                          </div>
                        </div>  
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="email" id="form3Example3c" name="email" class="form-control" v-model="email"/>
                            <label class="form-label" for="form3Example3c">Enter Email Address</label>
                          </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="password" name="password" id="form3Example4c" class="form-control" v-model="password"/>
                            <label class="form-label" for="form3Example4c">Password</label>
                          </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="confirm_password" name="confirm_password" id="form3Example4c" class="form-control" v-model="confirm_password"/>
                            <label class="form-label" for="form3Example4c">Confirm Password</label>
                          </div>
                        </div>
                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                          <button type="submit" class="btn btn-primary btn-lg">Register</button>
                        </div>
                        <a v-bind:href="'login'" class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">Already Have an Account Sign In</a>
                      </form>
                    </div>
                    <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                      <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp" class="img-fluid" alt="Sample image">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</template>
<script>
export default {
    data () {
            return {
            
            name: '',
            email: '',
            password: '',
            confirm_password: ''
            }
        },
        methods: {
          submit(){
               axios.post('/User/post-register', {
                   name: this.name,
                 email: this.email,
                 password: this.password,
                 confirm_password: this.password
               })
                    .then(( response ) => { 
                       this.credentials = response.data.data 
                        console.log(this.user)
                          window.location.href = '/User/login';       
                    })
                    .catch(error => {
                    })
              }
   }
                
}
</script>