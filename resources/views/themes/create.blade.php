@extends('app')
@section('head-title', 'Add Theme')
@section('content')
    <div class="container">
        <form action="{{ route('themes.store') }}" method="POST">
            @csrf
                <div class="col-lg-8">
                    <div class="form-group">
                        <label for="">Hall</label>
                        <select class="js-example-basic-single form-control" name="hall_id" style="width: 100%">
                            <option selected>Select Hall</option>
                            @foreach ($halls as $hall)
                            <option value="{{ $hall->id }}">{{ $hall->hall_name }}</option>
                             @endforeach
                        </select>
                        <span class="text-danger">
                            @error('hall_id')
                            {{$message}}    
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="form-group">
                        <label for="">Theme Name</label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}">
                        <span class="text-danger">
                            @error('name')
                            {{$message}}    
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="text" class="form-control" name="price" value="{{old('price')}}">
                        <span class="text-danger">
                            @error('price')
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