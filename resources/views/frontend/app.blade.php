@include('frontend.style.style')
@include('frontend.partial.header')
<section id="hero" class="d-flex align-items-center">
  <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
    <div class="row">
      <div class="col-lg-8">
        <h1>Welcome to <span>Event Website</span></h1>
        <h2>Delivering services for more than 18 years!</h2>
      </div>
    </div>
  </div>
</section><!-- End Hero -->
<div id="app">
    <main id="main">
          @yield('content')
      </main><!-- End #main -->
    </div>
      @include('frontend.script.script')
      @include('frontend.partial.footer')
      