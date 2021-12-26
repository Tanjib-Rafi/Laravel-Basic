<!DOCTYPE html>
<html lang="en">

@include('website.includes.head')

<body>

@include('website.includes.topbar')
@yield('content')
@include('website.includes.footer')

  <!-- Vendor JS Files -->
  <script src="{{ asset('website/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('website/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('website/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('website/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('website/assets/vendor/purecounter/purecounter.js') }}"></script>
  <script src="{{ asset('website/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('website/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('website/assets/js/main.js') }}"></script>

</body>

</html>