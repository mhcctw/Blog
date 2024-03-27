@include('header')

  <div class="main-banner" id="top">
    <div class="container">
      
    </div>
  </div>



  @auth
    <script>
      $('#Feed').addClass('active');
    </script>
  @endauth

  @include('footer')

