@include('header')

<div class="main-banner" id="top">
    <div class="container">

        <div class="col-lg-12 text-center">
            <div class="section-heading">

              @if ($user->id == Auth::user()->id)

                <h6 style="color: white">followers</h6>
                <h2>You have {{ count($user->subscribers) }} {{ count($user->subscribers) === 1 ? 'follower' : 'followers' }}:</h2>

              @else

              <h6 style="color: white">follows</h6>
              <h2>{{ $user->name }} has {{ count($user->subscribers) }} {{ count($user->subscribers) === 1 ? 'follow' : 'follows' }}:</h2>

              @endif
              
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

@include('footer');