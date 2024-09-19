
  <script>
    var likePostUrl = "{{ route('likePost') }}";
    var unlikePostUrl = "{{ route('unlikePost') }}";
    var csrfToken = "{{ csrf_token() }}";
  </script>
  
  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
  <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
  <script src="{{ asset('assets/js/counter.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>

  <script src="{{ asset('assets/js/likes.js') }}"></script>

</body>
</html>