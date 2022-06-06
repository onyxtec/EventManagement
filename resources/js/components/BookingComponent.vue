<template>
  <section id="book-a-table" class="book-a-table">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Reservation</h2>
          <p>Book Your Hall</p>
        </div>
         <div class="errorMessage" v-if = "errors.length" style="color: red;">    
          </div>
        <form class="" @submit.prevent="save" data-aos="fade-up" data-aos-delay="100">
          <div class="row">
            
            <div class="col-lg-8 col-md-8 form-group">
                <label for="">Hall Name</label>
              <span type="text" name="hall_name" class="form-control" id="hall_name" >{{theme[0].halls.hall_name}}</span> 
            </div>
            <label for="">Enter Your Name</label>
            <span style="color: red;">{{errors[0]}}</span>
            <div class="col-lg-8 col-md-8 form-group mt-6 mt-md-0">
              <input v-model="name" type="text" class="form-control" name="name" id="name" placeholder="Name" >
            </div>
            <div class="col-lg-8 col-md-8 form-group mt-6 mt-md-0">
                <label for="">Select Date</label>
                <span style="color: red;">{{errors[1]}}</span>
              <input v-model="date" @change="getSlots()" type="date" name="date" class="form-control check_date" id="date_picker" placeholder="Select Date" >
            </div>
            <div class="col-lg-8 col-md-8 form-group mt-6 mt-md-0">
                <label for="">Select Available Time</label>
                <span style="color: red;">{{errors[2]}}</span>
                <select v-model="time_id" type="text" name="time_id" class="form-control " id="time_id" >
                 <option value="" disabled selected>Select Time</option>
                    <option v-for = "re in res" :key = "re.id" :value="re.id" >{{re.time}}</option> 
                 </select>
    
            </div>
              <div class="col-lg-8 col-md-8 form-group mt-6 mt-md-0">
                  <label for="">Select Theme</label>
                  <span style="color: red;">{{errors[3]}}</span>
                   <select v-model="theme_name" type="text" name="theme_id" class="form-control" id="theme_id" >
                     <option value="" disabled selected>Select your Theme</option>
                    <option v-for = "item in theme" :key = "item.id" :value="item.id" >{{item.name}}</option>
                 </select>
            </div>
          </div>
          <button class="col-lg-2 col-md-2 form-group mt-2 mt-md-3" type="submit">Reserve</button>
        </form>
      </div>
    </section>
</template>
<script>

import { ValidationProvider } from 'vee-validate';
import $ from 'jquery';
 export default {
   data () {
    //  $hall_id = theme[0].halls.hall_id
            return {
              hall_id: this.theme[0].halls.id,
                name: '',
                date: '',
                time_id: '',
                theme_name: '',
                errors: [],
                res: [],
            }
        },
        props: ['theme'],
      
        mounted() {
                var today = new Date();
                var dd = String(today.getDate()).padStart(2, '0');
                var mm = String(today.getMonth() + 1).padStart(2, '0');
                var yyyy = today.getFullYear();
                today = yyyy + '-' + mm + '-' + dd;
                $('#date_picker').attr('min',today);
                console.dir(this.theme)
        },
         methods: {
           getSlots: function () {
            var check_date = this.date;
            var hall_id = this.hall_id;
            // var dates = ["2022-06-03", "2022-06-04", "2022-06-04"];
                  // pass value to controller through Ajax
                    $.ajax({
                              url: '/booking/available/' +check_date +'/' +hall_id,
                              dataType: 'json',
                              success:(response => {
                                this.res = response.bookings;
                                console.log(this.res);
                              })     
                    });
           },
            save () {
              if(this.name && this.date && this.time_id && this.theme_name){
               axios.post('/save', {
                 hall_id: this.hall_id,
                 name: this.name,
                 date: this.date,
                 time_id: this.time_id,
                 theme_name: this.theme_name,
               })
                Swal.fire({
                    icon: 'success',
                    title: 'Congrats!',
                    text: 'Your Booking Request Submitted Successfully',
                  })
                    .then(( response ) => { 
                      window.location.href = '/user/dashboard';
                        var attr = document.getElementById("text");
                        attr.innerHTML = response.data.message;  

                    })
              }
              else{
                if(!this.name) this.errors.push("Name is Required")
                if(!this.date) this.errors.push("Date is Required")
                if(!this.time_id) this.errors.push("Time is Required")
                if(!this.theme_name) this.errors.push("Theme is Required")
              }
               
              }
        }  

          }     
</script>