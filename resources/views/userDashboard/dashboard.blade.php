@extends('userDashboard.app')
@section('head-title', 'Home')
@section('content')
  <!-- Start content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
              <h4 class="page-title">Details</h4>                              
      </div>
   </div>
</div>
<!-- end row -->
<div class="page-content-wrapper">
 <div class="row">
       <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">     
                   <div class="table-responsive">  
                    <div class="">
                       @if (\Session::has('msg'))
                       <div class="text-success   ">
                          <h6><b>Success! </b>{!! \Session::get('msg') !!}</h6>
                       </div>
                       @endif
                    </div>                                   
                     <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
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
                            @foreach ($bookings as $booking)  
                            <tr>
                                <td>{{ $booking->name }}</td>
                                <td>{{$booking->theme->halls->hall_name}}</td>
                                <td>{{ $booking->theme->name }}</td>
                                <td>{{$booking->date}}</td>
                                <td>{{$booking->timeSlots}}</td>
                                <td>
                                 @if($booking->status == 0)
                                 <div  class="btn btn-secondary">Pending</div>
                                 <a href="{{route('cancel',['id'=>$booking->id,'status'=>'cancel'])}}" class="btn btn-danger">Cancel your Booking</a>
                                 @elseif($booking->status == 1)
                                 <div  class="btn btn-success">Approved</div>
                                 @else
                                   <div class="btn btn-danger">Cancelled</div>
                                 @endif
                                </td>
                                </tr>
                             @endforeach

                           </tbody>
                      </table>
                   </div>
               </div>
         </div> <!-- end col -->
    </div>
    <div> <!-- end row -->
  </div>
 </div>
@endsection