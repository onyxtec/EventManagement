<template>
<div>
  <section id="events" class="events">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>About Us</h2>
          <p>Organize Your Events in our Halls</p>
        </div>
        <div class="events-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img src="images/aboutus.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>About Us</h3>
                  <p class="fst-italic">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                    magna aliqua.
                  </p>
                  <ul>
                    <li><i class="bi bi-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                    <li><i class="bi bi-check-circled"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                    <li><i class="bi bi-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                  </ul>
                  <p>
                    Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                    velit esse cillum dolore eu fugiat nulla pariatur
                  </p>
                </div>
              </div>
            </div>
              </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section>
  
    <section id="chefs" class="chefs">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <p>Our Halls</p>
        </div>
        <div class="row"  >
          <div class="col-lg-4 col-md-6"  v-for ="hall in halls" :key ="hall.id"> 
            <div class="member" data-aos="zoom-in" data-aos-delay="200">
              <img :src="`storage/images/${hall.profile_image}`" class="img-fluid" alt=""/>
              <h3>{{hall.hall_name}}</h3>
              <div class="member-info">
                <div class="member-info-content">
                  <button class="btn btn-warning" v-on:click ="goToBook(hall.id)">Book Now</button>
                </div>
              </div>
            </div>
         </div>
        </div>
      </div>
    </section>
</div>
</template>
<script>
       export default {
        data() {
            return {
            }
        },
        
        props: ['halls'],
        
     mounted() {

        },
         methods:{
              goToBook(id){
                window.location.href = '/booking/' + id ;        
      }
         }
         
  }
</script>
