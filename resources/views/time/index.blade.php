@extends('app')
@section('head-title', 'Time')
@section('content')
  <!-- Start content -->
  <div class="content">
     <div class="container-fluid">
       <div class="row">
         <div class="col-sm-12">
             <div class="page-title-box">
               <h4 class="page-title">Time List</h4>
               <h3>Every Hall Must Have These TimeSlots</h3>
               @if(Auth::guard('admin')->check())
               @if(Auth::guard('admin')->user()->role('admin')	)
                  <a class="btn btn-primary float-right mb-4" href="{{route('time.create')}}" >Add New TimeSlot</a>   
                  @endif
                  @endif                                 
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
                                    <th>#</th>
                                      <th>Time</th>
                                      @if(Auth::guard('admin')->check())
                                      @if(Auth::guard('admin')->user()->role('admin')	)

                                      <th>Status</th>
                                      @endif
                                      @endif
                                </tr>
                         </thead>
                              <tbody>
                                @foreach ($time as $time)
                                 <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $time->time }}</td>
                                    
                     
                                       
                                    @if(Auth::guard('admin')->check())
                                    @if(Auth::guard('admin')->user()->role('admin')	)
                                    <td class="d-flex">
                                    <form action="{{route('time.destroy',$time->id)}}" method="post">
                                     @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-transparent text-danger border-0 ml-3" onclick="return confirm('Are you sure to delete this user?')">
                                        <i class="bx bxs-trash"></i>
                                    </button>                                                                </form>
                                   </td>
                                   @endif
                                   @endif
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
</div>
 @endsection

        