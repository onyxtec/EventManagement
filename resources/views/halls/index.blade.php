@extends('app')
@section('head-title', 'Halls')
@section('content')
  <!-- Start content -->
  <div class="content">
     <div class="container-fluid">
       <div class="row">
         <div class="col-sm-12">
             <div class="page-title-box">
               <h4 class="page-title">Halls List</h4>
               @if(Auth::guard('owner')->check())
               @if(Auth::guard('owner')->user()->role('owner')	)
                  <a class="btn btn-primary float-right mb-4" href="{{route('halls.create')}}" >Add Hall</a>  
                  <div class="">
                     <div class="text-secondary  ">
                        <h6><b>Check Available TimeSlots and then Add Your Hall</b></h6>
                     </div>
                  </div> 
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
                                      <th>Hall Name</th>
                                      <th>Contact No</th>
                                      <th>City</th>
                                      <th>Action</th>
                                      <th>Status</th>

                                </tr>
                         </thead>
                              <tbody>
                                @foreach ($halls as $hall)
                                 <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $hall->hall_name }}</td>
                                    <td>{{ $hall->contact_no }}</td>
                                    <td>{{ $hall->city }}</td>
                                    <td class="d-flex">
                                     <a  href="{{ route('halls.edit', $hall->id) }}">
                                            <i class="bx bxs-edit"></i>
                                    </a>
                                    <form action="{{route('halls.destroy',$hall->id)}}" method="post">
                                     @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-transparent text-danger border-0 ml-3" onclick="return confirm('Are you sure to delete this user?')">
                                        <i class="bx bxs-trash"></i>
                                    </button>                                                                </form>
                                   </td>
                                   <td>
                                    <div class="dropdown-container " tabindex="-1">
                                       @if(Auth::guard('admin')->check())
                                       @if(Auth::guard('admin')->user()->role('admin'))
                                       @if($hall->status == 0)
                                             <a class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Approve" href="{{route('approved',['id'=>$hall->id,'status'=>'approve'])}}"><i class='bx bx-check'></i></a>
                                             <a class="btn btn-danger ml-2" data-toggle="tooltip" data-placement="bottom" title="Cancel" href="{{route('approved',['id'=>$hall->id,'status'=>'cancel'])}}"><i class='bx bx-x'></i></a> 
                                           @elseif($hall->status == 1)
                                           <div  class="btn btn-success">Approved</div>
                                           @else
                                             <div class="btn btn-danger">Cancelled</div>
                                           @endif
                                           @endif
                                           @endif
                                           @if(Auth::guard('owner')->check())
                                           @if(Auth::guard('owner')->user()->role('owner'))
                                           @if($hall->status == 0)
                                           <div  class="btn btn-secondary">Pending</div>
                                           @elseif($hall->status == 1)
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
</div>
 @endsection

        