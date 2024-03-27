@include('header')


<div id='top' class="main-banner">

    <div class="team section" id="team" style="margin-top: 0px;">
        <div class="container">
          <div class="row">
            {{-- Profile Information --}}
            <div class="col-lg-4 col-md-4 col-sm-8 order-sm-1 order-md-1 order-lg-1">
              <div class="team-member">
                <div class="main-content">
                  <img src="{{ (!empty($user['photo'])) ? url('assets/images/avatars/'.$user['photo']) : url('assets/images/no_image.png') }}" alt="Avatar">
                  <h4>{{$user['name']}}</h4>
                  
                </div>
              </div>
            </div>
            {{-- End Profile Information --}}

            {{-- Form --}}

            <div class="col-lg-6 col-md-12 col-sm-12 order-sm-3 order-md-3 order-lg-2">

              @if (isset($notification))
                <div class="alert" style="color:rgb(171, 14, 56)" >{{ $notification }}</div>
              @endif

              <div class="contact-us-content">
                <form id="contact-form" action="/editProfile" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="col-lg-12">
                      <fieldset>
                        <input type="name" name="name" id="name" placeholder="Your Name..." autocomplete="on" value="{{ $user['name'] }}">
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your E-mail..." value="{{ $user['email'] }}">
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <input type="file" name="photo" id="photo" placeholder="{{ $user['photo'] }}">
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                      <div class="row">
                        <div class="col-4">
                          <fieldset>
                            <button type="submit" id="form-submit" class="orange-button">Save Changes</button>
                          </fieldset>
                        </div>
                        <div class="col-3 " style="margin-top:15px;">                          
                          <a href="/profile" style="color:white;">Cancel</a>                          
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>            
            </div>

            {{-- End Form --}}

            <div class="col-lg-2 col-md-4 col-sm-4 order-sm-2 order-md-2 order-lg-3" >
              <div class="main-button" style="margin-bottom: 20px">
                  <a href="#">Change Password</a>
              </div>              
            </div>

            
          </div>
        </div>
      </div>





</div>

<script>
    $('#Profile').addClass('active');
</script>

@include('footer')