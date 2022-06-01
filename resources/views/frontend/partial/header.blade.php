<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-flex align-items-center fixed-top">
  <div class="container d-flex justify-content-center justify-content-md-between">

    <div class="contact-info d-flex align-items-center">
      <i class="bi bi-phone d-flex align-items-center"><span>+92 3017769901</span></i>
      <i class="bi bi-clock d-flex align-items-center ms-4"><span> Mon-Sat: 11AM - 23PM</span></i>
    </div>
  </div>
</div>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-cente">
  <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

    <h1 class="logo me-auto me-lg-0"><a href="index.html">Event System</a></h1>

    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li><a class="nav-link scrollto " href="{{route('index')}}">Home</a></li>
        <li><a class="nav-link scrollto" href="#">About</a></li>
        <li><a class="nav-link scrollto" href="{{route('ownerLogin')}}">HallOwner</a></li>
        <li><a class="nav-link scrollto" href="#">Contact</a></li>
         @if(!Auth::guard()->check())
          <li><a class="nav-link scrollto" href="{{route('UserLogin')}}">LogIn</a></li>  
        @elseif(Auth::guard()->check())
          <li><a class="nav-link scrollto" href="{{route('userDashboard')}}">Dashboard</a></li>
          <li><a class="nav-link scrollto" href="{{route('user.logout')}}">Logout</a></li>
        @endif
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>

  </div>
</header><!-- End Header -->