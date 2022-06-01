@include('frontend.style.styles')
@include('frontend.partial.header')
<section id="hero">
    <div id="app">
        <main id="main">
              @yield('content')
          </main><!-- End #main -->
        </div>
</section><!-- End Hero -->
      @include('frontend.script.script')
      @include('frontend.partial.footer')