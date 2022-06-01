@extends('app')
@section('head-title', 'Edit Hall')
@section('content')	
    <div class="container">
        <form action="{{ route('halls.update' , $hall->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="col-lg-8">
                    <div class="form-group">
                        <label for="">Hall Name</label>
                        <input type="text" class="form-control" name="hall_name" value="{{ $hall->hall_name }}">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="form-group">
                        <label for="">Description</label>
                        <input type="text" class="form-control" name="description" value="{{ $hall->description }}">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="form-group">
                        <label for="">Contact no</label>
                        <input type="text" class="form-control" name="contact_no" value="{{ $hall->contact_no }}" >
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email" value="{{ $hall->email }}" >
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="form-group">
                        <label for="">City</label>
                        <input type="text" class="form-control" name="city" value="{{ $hall->city }}" >
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="form-group">
                        <label for="">Profile Image</label>
                        <input type="file" class="form-control" name="profile_image">
                    </div>
                </div>
                <div class="col-lg-8">
            <button class="btn btn-primary mr-4"> Update</button>    
            
                </div>
        </form>
    </div>
@endsection