@include('header')

<div class="main-banner" id="top">
    <div class="container">

        <div class="col-lg-12 text-center">
            <div class="section-heading">
              <h6 style="color: white">Results for your search:</h6>
              <h2>'{{$searchText}}'</h2>
            </div>
          </div>
      
    </div>
</div>


<div class="section events" id="events">
  <div class="container">
    <div class="row">

      {!!$foundUsers!!}

    </div>
  </div>
</div>

@include('footer')