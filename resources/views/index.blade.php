@include('header')

  <div class="main-banner" id="top">
    <div class="container">
      
      <div class="col-lg-12 text-center">
        <div class="section-heading">

            {{-- <h6 style="color: white">{!!$header!!}</h6> --}}
            <h2>{!!$header!!}</h2>
    
        </div>
      </div>

    </div>
  </div>

  <div class="section events" id="events">
    <div class="container">
      <div class="row" id="ShowPostsDiv">
        {!!$posts!!}
      </div>
    </div>
  </div>



  @auth
    <script>
      $('#Feed').addClass('active');
    </script>
  @endauth

  @include('footer')

