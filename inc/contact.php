<!DOCTYPE html>
<html>

<head>
  <title>Hotel Booking</title>
  <?php require('inc/links.php'); ?>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
  <link rel="stylesheet" type="text/css" href="css/common.css">
  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
  <style>
    .contact-info {
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 20px;
    }

    .contact-info a {
      color: var(--dark);
      text-decoration: none;
      transition: color 0.3s;
    }

    .contact-info a:hover {
      color: var(--secondary);
    }

    .contact-info i {
      margin-right: 8px;
    }

    .contact-form {
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 20px;
    }

    .contact-form .form-label {
      font-weight: 500;
      color: var(--dark);
    }

    iframe {
      border-radius: 10px;
      border: none;
    }
  </style>
</head>

<body>
  <?php require('inc/header.php'); ?>

  <div class="my-5 px-4 section-padding">
    <h2 class="fw-bold h-font text-center">LIÊN HỆ</h2>
    <div class="h-line bg-dark"></div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 mb-5 px-4">
        <div class="contact-info">
          <iframe class="w-100 rounded mb-4" height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.3118980903823!2d108.1552256766271!3d16.04929670035895!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31421938d61a3ce5%3A0x29d80f3ebbdcb44a!2zxJDhuqFpIEjhu41jIER1eSBUw6JuIEjDsmEgS2jDoW5oIE5hbQ!5e0!3m2!1svi!2s!4v1746692348855!5m2!1svi!2s" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <h5 class="mb-3">Địa chỉ</h5>
          <a href="https://maps.app.goo.gl/uWyXPTN6BwWRwd8e9" target="_blank" class="d-inline-block text-decoration-none mb-2">
            <i class="bi bi-geo-alt-fill"></i> 120 Hoàng Minh Thảo, Hoà Khánh Nam, Liên Chiểu, Đà Nẵng, Việt Nam
          </a>
          <h5 class="mt-4 mb-3">Gọi tôi</h5>
          <a href="tel:+84123456789" class="d-inline-block mb-2 text-decoration-none"><i class="bi bi-telephone-fill"></i> +84123456789</a>
          <h5 class="mt-4 mb-3">Email</h5>
          <a href="mailto:cs445l_group5@gmail.com" class="d-inline-block mb-2 text-decoration-none"><i class="bi bi-envelope-fill"></i> cs445l_group5@gmail.com</a>
          <h5 class="mt-4 mb-3">Follow</h5>
          <a href="#" class="d-inline-block text-dark fs-5 me-2">
            <i class="bi bi-twitter me-1"></i>
          </a>
          <a href="#" class="d-inline-block text-dark fs-5 me-2">
            <i class="bi bi-facebook me-1"></i>
          </a>
          <a href="#" class="d-inline-block text-dark fs-5">
            <i class="bi bi-instagram me-1"></i>
          </a>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 mb-5 px-4">
        <div class="contact-form">
          <form action="index.php?act=send_contact" method="POST">
            <h5 class="mb-3">Gửi tin nhắn</h5>
            <div class="mb-3">
              <label class="form-label">Tên</label>
              <input type="text" name="ten" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Tiêu đề</label>
              <input type="text" name="tieude" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Nội dung</label>
              <textarea name="noidung" class="form-control" rows="5" style="resize: none;" required></textarea>
            </div>
            <button type="submit" name="send" class="btn-custom w-100">Gửi</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php require('inc/footer.php'); ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>