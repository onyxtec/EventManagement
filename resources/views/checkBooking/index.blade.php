@extends('app')
@section('Home')
@section('content')
  <!-- Start content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
              <h4 class="page-title">Booking Details</h4>                              
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
                                    <th>Booking Name</th>
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
                                <td>{{$booking->time->time}}</td>
                                <td>
                                  <div class="dropdown-container " tabindex="-1">
                                     @if(Auth::guard('owner')->check())
                                     @if(Auth::guard('owner')->user()->role('owner'))
                                     @if($booking->status == 0)
                                           <a class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Approve" href="{{route('approval',['id'=>$booking->id,'status'=>'approve'])}}"><i class='bx bx-check'></i></a>
                                           <a class="btn btn-danger ml-2" data-toggle="tooltip" data-placement="bottom" title="Cancel" href="{{route('approval',['id'=>$booking->id,'status'=>'cancel'])}}"><i class='bx bx-x'></i></a> 
                                         @elseif($booking->status == 1)
                                         <div  class="btn btn-success">Approved</div>
                                         @else
                                           <div class="btn btn-danger">Cancelled</div>
                                         @endif
                                         @endif
                                         @endif
                                         @if(Auth::guard('admin')->check())
                                         @if(Auth::guard('admin')->user()->role('admin'))
                                         @if($booking->status == 0)
                                         <div  class="btn btn-secondary">Pending</div>
                                         @elseif($booking->status == 1)
                                         <div  class="btn btn-success">Approved</div>
                                         @else
                                           <div class="btn btn-danger">Cancelled</div>
                                         @endif
                                         @endif
                                         @endif
                                  </div>
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