@extends('app')
@section('head-title', 'Themes')
@section('content')
  <!-- Start content -->
  <div class="content">
     <div class="container-fluid">
       <div class="row">
         <div class="col-sm-12">
             <div class="page-title-box">
               <h4 class="page-title">Themes List</h4>
                  <a class="btn btn-primary float-right mb-4" href="{{route('themes.create')}}" >Add Theme</a>                                    
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
                                      <th>Theme Name</th>
                                      <th>Price</th>
                                      <th>Action</th>
                                </tr>
                         </thead>
                              <tbody>
                                @foreach ($themes as $theme)
                                 <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $theme->halls->hall_name }}</td>
                                    <td>{{ $theme->name }}</td>
                                    <td>{{ $theme->price }}</td>
                                    <td class="d-flex">
                                       <a  href="{{ route('themes.edit', $theme->id) }}">
                                              <i class="bx bxs-edit"></i>
                                      </a>
                                      <form action="{{ route('themes.destroy', $theme->id ) }}" method="post">
                                       @csrf
                                      @method('DELETE')
                                      <button type="submit" class="bg-transparent text-danger border-0 ml-3" onclick="return confirm('Are you sure to delete this theme?')">
                                          <i class="bx bxs-trash"></i>
                                      </button>                                                                </form>
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

        