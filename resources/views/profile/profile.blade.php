@include('header')


<div id='top' class="main-banner">

    <div class="team section" id="team" style="margin-top: 0px;">
        <div class="container">
          <div class="row">
            {{-- Profile Information --}}
            <div class="col-lg-4 col-md-4 col-sm-8 order-sm-1 order-md-1 order-lg-1">
              <div class="team-member">
                <div class="main-content">
                  {{-- <img src="assets/images/member-01.jpg" alt=""> --}}
                  <img src="{{ (!empty($user['photo'])) ? url('assets/images/avatars/'.$user['photo']) : url('assets/images/no_image.png') }}" alt="Avatar">
                  <h4>{{$user['name']}}</h4>
                  
                </div>
              </div>
            </div>
            {{-- End Profile Information --}}
            {{-- Post --}}
            <div class="col-lg-6 col-md-12 col-sm-12 order-sm-3 order-md-3 order-lg-2">
                <div class="contact-us-content">
                  <form id="contact-form" action="" method="post">
                    <div class="row">
                      
                      <div class="col-lg-12">
                        <fieldset>
                          <textarea name="message" id="message" placeholder="Your Message"  style="height: 170px"></textarea>
                        </fieldset>
                      </div>
                      <div class="col-lg-12">
                        <fieldset>
                          <button type="submit" id="form-submit" class="orange-button">Send Post</button>
                        </fieldset>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            {{-- End Post --}}

            <div class="col-lg-2 col-md-4 col-sm-4 order-sm-2 order-md-2 order-lg-3" >
                <div class="main-button" style="margin-bottom: 20px">
                    <a href="#">Followers</a>
                </div>
                <div class="main-button" style="margin-bottom: 20px">
                  <a href="#">Follows</a>
                </div>
                <div class="main-button" style="margin-bottom: 20px">
                  <a href="/editProfile">Edit Profile</a>
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