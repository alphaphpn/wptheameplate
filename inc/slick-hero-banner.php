<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Slick Slider with Bootstrap 5</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Slick Slider CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css">
  <style>
    .slick-slide img {
      width: 100%;
      height: auto;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <h2 class="text-center mb-4">Slick Slider with Bootstrap 5</h2>
    <div class="slider">
      <div>
        <img src="https://via.placeholder.com/800x400?text=Slide+1" alt="Slide 1" class="img-fluid">
      </div>
      <div>
        <img src="https://via.placeholder.com/800x400?text=Slide+2" alt="Slide 2" class="img-fluid">
      </div>
      <div>
        <img src="https://via.placeholder.com/800x400?text=Slide+3" alt="Slide 3" class="img-fluid">
      </div>
      <div>
        <img src="https://via.placeholder.com/800x400?text=Slide+4" alt="Slide 4" class="img-fluid">
      </div>
    </div>
  </div>

  <!-- Bootstrap 5 JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Slick Slider JS -->
  <script src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>
  <script>
    $(document).ready(function () {
      $('.slider').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: true,
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: true,
        responsive: [
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
      });
    });
  </script>
</body>
</html>
