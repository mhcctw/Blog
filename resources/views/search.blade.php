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

        {{-- @foreach ($foundUsers as $foundUser) 
        
            <div class="col-lg-12 col-md-6">
            <div class="item" style="margin-bottom: 96px; min-height:165px;">
                <div class="row">

                <div class="col-lg-3">
                    <div class="image">
                    <img src="{{ (!empty($foundUser['photo'])) ? url('assets/images/avatars/'.$foundUser['photo']) : url('assets/images/no_image.png') }}" alt="Avatar">
                    </div>
                </div>

                <div class="col-lg-9">
                    <ul>
                    <li>
                        <h4>{{$foundUser->name}}</h4>
                    </li>
                    <li>
                        <span>Posts:</span>
                        <h6>{{count($foundUser->UsersPosts)}}</h6>
                    </li>
                    <li>
                        <span>Followers:</span>
                        <h6>22</h6>
                    </li>
                    <li>
                        <span>Follows:</span>
                        <h6>120</h6>
                    </li>
                    </ul>
                    <a href="/profile/{{$foundUser->id}}"><i class="fa fa-angle-right"></i></a>
                </div>

                </div>
            </div>
            </div>

        @endforeach --}}

      </div>
    </div>
  </div>

  <script type="text/javascript">
    console.log('foundUsers - '+{{$foundUsers}});
  </script>

@include('footer')