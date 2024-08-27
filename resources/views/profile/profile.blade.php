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

                  {{-- Subscription --}}
                  @if($user->id !== Auth::user()->id)
                    <div class="main-button">
                      <form id="follow">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user['id'] }}">
                        @if (Auth::user()->isSubscribedTo($user['id']))
                          <button type="submit" id='follow_btn' class="white-btn">                          
                              Unfollow
                          </button> 
                          @else
                            <button type="submit" id='follow_btn' class="violet-btn">                          
                              Follow
                            </button>                               
                          @endif 
                      </form>
                                        
                    </div>
                  @endif
                  {{-- End Subscription --}}

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

                {{-- Follows and Followers --}}
               
                <div class="main-button" style="margin-bottom: 20px">
                  <a href="/follows/{{$user['id']}}">{{ count($user->subscriptions) }} {{ count($user->subscriptions) === 1 ? 'Follow' : 'Follows' }}</a>
                </div>
                <div class="main-button" style="margin-bottom: 20px">
                  <a id='subscribers-count' href="/followers/{{$user['id']}}">{{count($user->subscribers) }} {{ count($user->subscribers) === 1 ? 'Follower' : 'Followers' }}</a>
                </div>
                {{-- End Follows and Followers --}}

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

  @if($user->id == Auth::user()->id)
    $('#Profile').addClass('active');
  @endif

  // Send Post
  $(document).ready(function () {

    //new post
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


    // Follow
    $('#follow').submit(function (e) {

      e.preventDefault();
      var formData = $(this).serialize();

      $.ajax({
        url: '{{ route("follow") }}', 
        type: 'POST', 
        data: formData,
        success: function (response) {

          // console.log(response);

          if(!response.error){

            $('#follow_btn').html(response.text);
            if(response.text=='Follow'){
              $('#follow_btn').addClass('violet-btn');
              $('#follow_btn').removeClass('white-btn');
            }else{
              $('#follow_btn').addClass('white-btn');
              $('#follow_btn').removeClass('violet-btn');
            }

            let num = response.count;
            num == 1 ? num+=' Follower' : num+=' Followers'

            $('#subscribers-count').html(num);

          }else{
            alert('Sorry, something went wrong... Try againt later.')
          }

          

        },
        error: function (xhr, status, error) {
          console.error(xhr.responseText); 
        }
      });

      });




    // like
    $(document).on('click', '.like-btn', function(e) {
      
      e.preventDefault();
      var post = $(this).data('post'); 
      console.log(post);

      $.ajax({
        url: '{{ route("likePost") }}', 
        type: 'POST', 
        data: {
            post_id: post,
            _token: '{{ csrf_token() }}'
        }, 
        success: function (response) {

          $('#category-'+post).html(response.like);

        },
        error: function (xhr, status, error) {
          console.error(xhr.responseText); 
        }
      });

    });

    // unlike
    $(document).on('click', '.unlike-btn', function(e) {
      
      e.preventDefault();
      var post = $(this).data('post'); 
      console.log(post);

      $.ajax({
        url: '{{ route("unlikePost") }}', 
        type: 'POST', 
        data: {
            post_id: post,
            _token: '{{ csrf_token() }}'
        }, 
        success: function (response) {

          $('#category-'+post).html(response.like);

        },
        error: function (xhr, status, error) {
          console.error(xhr.responseText); 
        }
      });

    });


  });


  
  

</script>

@include('footer')