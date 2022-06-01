@extends('app')
@section('head-title', 'Edit Theme')
@section('content')	
    <div class="container">
        <form action="{{ route('themes.update' , $theme->id)}}" method="POST">
            @csrf
            @method('PUT')
                <div class="col-lg-8">
                    <div class="form-group">
                        <label for="">Theme Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $theme->name }}">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="text" class="form-control" name="price" value="{{ $theme->price }}">
                    </div>
                </div>
                <div class="col-lg-8">
            <button class="btn btn-primary mr-4"> Update</button>    
            
                </div>
        </form>
    </div>
@endsection