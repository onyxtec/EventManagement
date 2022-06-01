<template>
      <section id="" class="">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <p>See Your Reservations</p>
        </div>
        <table id="dataTable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; color: white; width: 100%;">
                        <thead>
                                <tr>
                                    <th>Name</th>
                                     <th>Hall Name</th>
                                     <th>Theme Name</th>
                                     <th>Booking Date</th>
                                     <th>Booking Time</th>
                                     <th>Status</th>
                               </tr>
                        </thead>
                            <tbody>
                            <tr v-for ="booking in booking" :key ="booking.id">
                                <td>{{booking.name}}</td>
                                <td>{{booking.hall.hall_name}}</td>
                                <td>{{booking.theme.name}}</td>
                                <td>{{booking.date}}</td>
                                <td>{{booking.time.time}}</td>
                              <td>    
                                 <div v-if = "booking.status == 0" >
                                   <div class="btn btn-secondary">Pending</div>
                                  <a v-on:click ="goToCancel(booking.id , booking.status)" class="btn btn-danger">Cancel your Booking</a>
                                 </div>
                                 <div v-else-if = "booking.status == 1" class="btn btn-success">Approved</div>
                                   <div v-else class="btn btn-danger">Cancelled</div>
                                </td>
                             </tr>
                           </tbody> 
                      </table>
      </div>
    </section>
</template>
<script>
 export default {
        data() {
            return {
              
            }
        },
      props: ['booking'],
        mounted() {
            console.log(this.booking)
            // this.$toastr.success('Message', 'Title', options);
        },
         methods:{
              goToCancel(id,status){
                console.log(id, status);
                axios.post('/cancel', {
                  id: id,
                  status: status
                })
                .then(( response ) => { 
                       this.booking = response.data.data 
                        console.log(this.booking)
                          window.location.href = '/user/dashboard';       
                    })
                    .catch(error => {

                    })
      }
         }
    }
</script>
