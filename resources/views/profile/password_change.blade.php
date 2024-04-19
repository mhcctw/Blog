@include('header')

<div id='top' class="main-banner">

    <div class="container col-lg-4 contact-us-content">
        
          <div class="row">
            
            <div class="col-lg-12">
                <div class="section-heading">
                  <h2 style="color: white;">Password Change</h2>
                </div>
            </div>
                       

            @if (isset($notification))
                <div class="alert" style="color:rgb(171, 14, 56)" >{{ $notification }}</div>
            @endif

            {{-- Form --}} 
            <form id="contact-form" action="/changePassword" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <fieldset>
                            <input type="password" name="password" id="password" placeholder="Old Password..." >
                        </fieldset>
                        @if ($errors->has('password'))
                            <div class="alert" style="margin-top: -30px; color:rgb(171, 14, 56)" >{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                    <div class="col-lg-12">
                        <fieldset>
                            <input type="password" name="newPassword" id="newPassword" placeholder="New Password..." >
                        </fieldset>
                        @if ($errors->has('newPassword'))
                            <div class="alert" style="margin-top: -30px; color:rgb(171, 14, 56)" >{{ $errors->first('newPassword') }}</div>
                        @endif
                    </div>
                    <div class="col-lg-12">
                        <fieldset>
                            <input type="password" name="newPassword2" id="newPassword2" placeholder="Repeat New Password..." >
                        </fieldset>
                        @if ($errors->has('newPassword2'))
                            <div class="alert" style="margin-top: -30px; color:rgb(171, 14, 56)" >{{ $errors->first('newPassword2') }}</div>
                        @endif
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-4">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="orange-button">Change</button>
                                </fieldset>
                            </div>
                            <div class="col-3 " style="margin-top:15px;">                          
                                <a href="/profile/{{Auth::user()->id}}" style="color:white;">Cancel</a>                          
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            {{-- End Form --}}

            
          </div>
        
      </div>




</div>

<script>
    $('#Profile').addClass('active');
</script>

@include('footer')