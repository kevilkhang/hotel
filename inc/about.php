<!DOCTYPE html>
<html>

<head>
  <title>Hotel Booking</title>
  <?php require('inc/links.php'); ?>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
  <link rel="stylesheet" type="text/css" href="css/common.css">
  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
  <style>
    .intro-section {
      padding: 20px;
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .stats-box {
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 20px;
      text-align: center;
      transition: transform 0.3s;
    }

    .stats-box:hover {
      transform: translateY(-5px);
    }

    .team-image {
      height: 300px;
      object-fit: cover;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
    }

    .swiper-slide {
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      overflow: hidden;
    }

    .swiper-slide h5 {
      color: var(--dark);
      font-size: 1.25rem;
      margin-top: 10px;
    }
  </style>
</head>

<body>
  <?php require('inc/header.php'); ?>

  <div class="my-5 px-4 section-padding">
    <h2 class="fw-bold h-font text-center">GIỚI THIỆU</h2>
    <div class="h-line bg-dark"></div>
  </div>

  <div class="container">
    <div class="row justify-content-between align-items-center">
      <div class="col-lg-6 col-md-6 mb-4 order-lg-1 order-md-1 order-2">
        <div class="intro-section">
          <h3 class="mb-3">Hotel Booking</h3>
          <p>
            Chào mừng bạn đến với Hotel Booking, nơi chúng tôi tận tâm phục vụ và đem đến cho bạn trải nghiệm độc đáo và hoàn hảo tại trái tim của thành phố Đà Nẵng. Với vị trí tốt ngay tại trung tâm, chúng tôi tự hào là điểm đến lý tưởng cho du khách, người đi công tác và những người tìm kiếm sự thoải mái và tiện nghi.
          </p>
        </div>
      </div>
      <div class="col-lg-5 col-md-6 mb-4 order-lg-2 order-md-2 order-1">
        <img src="images/about/about.jpg" class="w-100 rounded shadow" alt="Hotel Image">
      </div>
    </div>
  </div>

  <div class="container mt-5">
    <div class="row">
      <div class="col-lg-3 col-md-6 mb-4 px-4">
        <div class="stats-box">
          <img src="images/about/hotel.svg" width="70px" alt="Rooms Icon">
          <h4 class="mt-3">100+ PHÒNG</h4>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4 px-4">
        <div class="stats-box">
          <img src="images/about/customers.svg" width="70px" alt="Customers Icon">
          <h4 class="mt-3">200+ KHÁCH HÀNG</h4>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4 px-4">
        <div class="stats-box">
          <img src="images/about/rating.svg" width="70px" alt="Reviews Icon">
          <h4 class="mt-3">150+ ĐÁNH GIÁ</h4>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4 px-4">
        <div class="stats-box">
          <img src="images/about/staff.svg" width="70px" alt="Staffs Icon">
          <h4 class="mt-3">200+ NHÂN VIÊN</h4>
        </div>
      </div>
    </div>
  </div>

  <h3 class="my-5 fw-bold h-font text-center">NHÓM QUẢN LÝ</h3>

  <div class="container px-4">
    <div class="swiper mySwiper">
      <div class="swiper-wrapper mb-5">
        <div class="swiper-slide">
          <img src="images/about/member1.jpg" class="w-100 team-image" alt="Trần Văn Hóa">
          <h5 class="mt-2 text-center">Trần Văn Hóa</h5>
        </div>
        <div class="swiper-slide">
          <img src="images/about/member2.jpg" class="w-100 team-image" alt="Nguyễn Bảo">
          <h5 class="mt-2 text-center">Nguyễn Bảo</h5>
        </div>
        <div class="swiper-slide">
          <img src="images/about/member3.jpg" class="w-100 team-image" alt="Bùi Quang Khang">
          <h5 class="mt-2 text-center">Bùi Quang Khang</h5>
        </div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>

  <?php require('inc/footer.php'); ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".mySwiper", {
      spaceBetween: 30,
      pagination: {
        el: ".swiper-pagination",
      },
      breakpoints: {
        320: {
          slidesPerView: 1,
        },
        640: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        },
      }
    });
  </script>
</body>

</html>