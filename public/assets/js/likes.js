// like
$(document).on('click', '.like-btn', function(e) {
  e.preventDefault();
  var post = $(this).data('post'); 
  console.log(post);

  $.ajax({
      url: likePostUrl,
      type: 'POST',
      data: {
          post_id: post,
          _token: csrfToken 
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
      url: unlikePostUrl, 
      type: 'POST',
      data: {
          post_id: post,
          _token: csrfToken
      },
      success: function (response) {
          $('#category-'+post).html(response.like);
      },
      error: function (xhr, status, error) {
          console.error(xhr.responseText);
      }
  });
});
