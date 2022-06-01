@extends('app')
@section('head-title', 'Home')
@section('content')
<ul class="box-info">
    <li>
        <i class='bx bxs-home' ></i>
        <span class="text">
            <h3>{{$totalHalls}}</h3>
            <p>Total Halls</p>
        </span>
    </li>
    @if(Auth::guard('admin')->check())         
    @if(Auth::guard('admin')->user()->role('admin')	)
    <li>
        <i class='bx bxs-basketball' ></i>
        <span class="text">
            <h3>{{$totalThemes}}</h3>
            <p>Total Themes</p>
        </span>
    </li>
    @endif
    @endif
    <li>
        <i class='bx bxs-calendar-check' ></i>
        <span class="text">
            <h3>{{$booking}}</h3>
            <p>Total Bookings</p>
        </span>
    </li>
      
    <li>
        <i class='bx bxs-calendar' ></i>
        <span class="text">
            <h3>{{$confirmedBooking}}</h3>
            <p>Confirmed Bookings</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-calendar' ></i>
        <span class="text">
            <h3>{{$pendingBooking}}</h3>
            <p>Pending Bookings</p>
        </span>
    </li>
</ul>
@endsection