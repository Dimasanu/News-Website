<!DOCTYPE html>
<html lang="en">

<x-head>Home</x-head>

<body>

  <!-- ======= Header ======= -->
  <x-header></x-header>

  <main id="main">
    {{ $slot }}
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <x-footer></x-footer>
  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>