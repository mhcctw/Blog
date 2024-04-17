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

            {{-- Post --}}
            @if($user->id == Auth::user()->id)
            <div class="col-lg-6 col-md-12 col-sm-12 order-sm-3 order-md-3 order-lg-2">
                <div class="contact-us-content">

                  <form id="contact-form" >
                    @csrf
                    <div class="row">
                      
                      <div class="col-lg-12">
                        <fieldset>
                          <textarea name="text" id="text" placeholder="Type Something"  style="height: 170px"></textarea>
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
            @endif
            {{-- End Post --}}

            <div class="col-lg-2 col-md-4 col-sm-4 order-sm-2 order-md-2 order-lg-3" >
                <div class="main-button" style="margin-bottom: 20px">
                    <a href="#">Followers</a>
                </div>
                <div class="main-button" style="margin-bottom: 20px">
                  <a href="#">Follows</a>
                </div>

                @if($user->id == Auth::user()->id)
                  <div class="main-button" style="margin-bottom: 20px">
                    <a href="/editProfile">Edit Profile</a>
                  </div>
                @endif

            </div>
            
          </div>
        </div>
      </div>


</div>

{{-- USER'S POSTS --}}

<div class="section events" id="events">
  <div class="container">
    <div class="row" id="ShowPostsDiv">
      {!!$posts!!}
    </div>
  </div>
</div>

{{-- END OF USER'S POSTS --}}


<script type="text/javascript">
  $('#Profile').addClass('active');



  $(document).ready(function () {
    $('#contact-form').submit(function (e) {
      e.preventDefault();     

      var formData = $(this).serialize(); 

      $.ajax({
        url: '{{ route("sendPost") }}', 
        type: 'POST', 
        data: formData, 
        success: function (response) {

          $('#contact-form')[0].reset();

          $('#ShowPostsDiv').html(response.posts);

        },
        error: function (xhr, status, error) {
          console.error(xhr.responseText); 
        }
      });

     
    });
  });

</script>

@include('footer')