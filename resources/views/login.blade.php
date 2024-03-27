@include('header')

<div id='top' class="main-banner">
    <div class="container col-lg-4 contact-us-content">

        <div class="col-lg-12 text-center">
            <div class="section-heading">
              <h2 style="color: white;">Sign In</h2>
            </div>
        </div>

        <form id="contact-form" action="/login" method="post">
            @csrf

            <div class="row">
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
                        <input type="password" name="password" id="password" placeholder="Your password..." >
                    </fieldset>
                    @if ($errors->has('password'))
                        <div class="alert" style="margin-top: -30px; color:rgb(171, 14, 56)" >{{ $errors->first('password') }}</div>
                    @endif
                </div>
                <div class="col-lg-12" align="center">
                    <fieldset>
                        <button type="submit" id="form-submit" class="orange-button col-lg-12">Sign In</button>
                    </fieldset>
                    @if ($errors->has('LogError'))
                        <div class="alert" style="color:rgb(171, 14, 56)" >{{ $errors->first('LogError') }}</div>
                    @endif
                </div>
                              
            </div>

            <div class="main-button" align="center" style="margin-top: 50px; color: white;">
                Don't have an account? <br>
                <a href="/register" style="margin-top: 20px;">Create account</a>
            </div>
        </form>
      </div>
</div>

<script>
    $('#LogIn').addClass('active');
</script>


@include('footer')
