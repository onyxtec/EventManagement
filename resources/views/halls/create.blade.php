@extends('app')
@section('head-title', 'Add Hall')
@section('content')
    <div class="container">
        <form action="{{ route('halls.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="col-lg-8">
                    <div class="form-group">
                        <label for="">Hall Name</label>
                        <input type="text" class="form-control" name="hall_name" value="{{old('hall_name')}}">
                        <span class="text-danger">
                            @error('hall_name')
                            {{$message}}    
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="form-group">
                        <label for="">Description</label>
                        <input type="text" class="form-control" name="description" value="{{old('description')}}">
                        <span class="text-danger">
                            @error('description')
                            {{$message}}    
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="form-group">
                        <label for="">Contact no</label>
                        <input type="tel" class="form-control" name="contact_no" value="{{old('contact_no')}}">
                        <span class="text-danger">
                            @error('contact_no')
                            {{$message}}    
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" value="{{old('email')}}">
                        <span class="text-danger">
                            @error('email')
                            {{$message}}    
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="form-group">
                        <label for="">City</label>
                        <input type="text" class="form-control" name="city" value="{{old('city')}}">
                        <span class="text-danger">
                            @error('city')
                            {{$message}}    
                            @enderror
                        </span>
                    </div>
                </div>
                
                <div class="col-lg-8">
                    <div class="form-group">
                        <label for="">Profile Image</label>
                        <input type="file" class="form-control-file" name="profile_image">
                        <span class="text-danger">
                            @error('profile_image')
                            {{$message}}    
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-8">
            <button class="btn btn-primary mr-4"> Submit</button>
                </div>
        </form>
    </div>
@endsection