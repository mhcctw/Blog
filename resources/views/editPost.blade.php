@include('header')

<div id='top' class="main-banner">

<div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="contact-us-content">
          <form id="contact-form" action="{{ route('updatePost', ['post' => $post->id]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="row">

                <div class="col-lg-12">
                    <fieldset>
                        <textarea name="text" id="text" placeholder="Your Post">{{$post->text}}</textarea>
                    </fieldset>
                </div>
                <div class="col-lg-12">
                    <fieldset>
                        <button type="submit" id="form-submit" class="orange-button">Save</button>
                
                        <button type="reset" id="form-submit" class="orange-button" style="color:white; background:#7a6ad8;">Cancel</button>
                    </fieldset>
                </div>

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>

  @include('footer')