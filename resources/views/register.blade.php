@include('header')


<div id='top' class="main-banner">
    <div class="container col-lg-4 contact-us-content">

        <div class="col-lg-12 text-center">
            <div class="section-heading">
              <h2 style="color: white;">Create your account</h2>
            </div>
        </div>

        <form id="contact-form" action="/register" method="post">
            @csrf

            <div class="row">

                <div class="col-lg-12">
                    <fieldset>
                        <input type="text" name="name" id="name" placeholder="Your Name...">
                    </fieldset>
                    @if ($errors->has('name'))
                        <div class="alert" style="margin-top: -30px; color:rgb(171, 14, 56)" >{{ $errors->first('name') }}</div>
                    @endif
                </div>
                

                <div class="col-lg-12">
                    <fieldset>
                        <input type="email" name="email" id="email" placeholder="Your Email..." >
                    </fieldset>
                    @if ($errors->has('email'))
                        <div class="alert" style="margin-top: -30px; color:rgb(171, 14, 56)" >{{ $errors->first('email') }}</div>
                    @endif
                </div>

                <div class="col-lg-12">
                    <fieldset>
                        <input type="password" name="password" id="password" placeholder="Your Password..." >
                    </fieldset>
                    @if ($errors->has('password'))
                        <div class="alert" style="margin-top: -30px; color:rgb(171, 14, 56)" >{{ $errors->first('password') }}</div>
                    @endif
                </div>

                <div class="col-lg-12">
                    <fieldset>
                        <input type="password" name="password2" id="password2" placeholder="Confirm Your Password..." >
                    </fieldset>
                    @if ($errors->has('password2'))
                        <div class="alert" style="margin-top: -30px; color:rgb(171, 14, 56)" >{{ $errors->first('password2') }}</div>
                    @endif

                </div>
                <div class="col-lg-12" align="center">
                    <fieldset>
                        <button type="submit" id="form-submit" class="orange-button col-lg-12">Register</button>
                    </fieldset>
                </div>
                              
            </div>

            <div class="main-button" align="center" style="margin-top: 50px; color: white;">
                Already have an account? <br>
                <a href="/login" style="margin-top: 20px;">Log In</a>
            </div>


            



        </form>
      </div>
</div>




@include('footer')
