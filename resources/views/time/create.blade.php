@extends('app')
@section('head-title', 'Add Time')
@section('content')
    <div class="container">
        <form action="{{ route('time.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="col-lg-8">
                    <div class="form-group">
                        <label for="">Time</label>
                        <input type="text" class="form-control" name="time" value="{{old('time')}}">
                        <span class="text-danger">
                            @error('time')
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