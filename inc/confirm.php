<!DOCTYPE html>
<html lang="en">

<head>
  <title>Hotel Booking</title>
  <?php require('inc/links.php'); ?>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
  <link rel="stylesheet" type="text/css" href="css/common.css">
  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

  <style>
    .product {
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 20px;
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .thumbnails {
      display: flex;
      gap: 10px;
      margin-top: 10px;
    }

    .thumbnail {
      max-width: 100px;
      cursor: pointer;
      border: 2px solid transparent;
      border-radius: 5px;
      transition: border-color 0.3s;
    }

    .thumbnail:hover {
      border-color: var(--secondary);
    }

    .main-image img {
      max-width: 100%;
      height: auto;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .booking-details {
      padding: 20px;
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .form-label {
      font-weight: 500;
      color: var(--dark);
    }

    .btn-custom {
      background-color: var(--secondary);
      color: #fff;
      border: none;
      border-radius: 5px;
      padding: 10px 20px;
      transition: background-color 0.3s;
    }

    .btn-custom:hover {
      background-color: #2874a6; /* Replace darken with a valid hex color */
    }
  </style>
</head>

<body>
  <?php require('inc/header.php'); ?>

  <?php
  if (is_array($dat_phong)) {
    extract($dat_phong);
    if (is_file("upload/" . $hinh)) {
      $hinhxuat = "<img src='upload/" . $hinh . "' alt='Main Image'>";
    } else {
      $hinhxuat = "no photo";
    }
    $ten_phong = lay_ten_loaiphong($dat_phong['ma_loaiphong']);
    $gia = number_format((int)$dat_phong['gia_phong'], 0, '.', '.');
    $giajs = $dat_phong['gia_phong'];
  }
  if (isset($_SESSION['khach_hang'])) {
    $ten_kh = $_SESSION['khach_hang']['ho_ten'];
    $sdt = $_SESSION['khach_hang']['sdt'];
    $id_kh = $_SESSION['khach_hang']['id'];
    $cccd = $_SESSION['khach_hang']['cccd'];
  } else {
    $ten_kh = "";
    $sdt = "";
    $id_kh = "";
    $cccd = "";
  }
  ?>

  <div class="my-5 px-4 section-padding">
    <h2 class="fw-bold h-font text-center">Xác Nhận Đặt Phòng</h2>
    <div class="h-line bg-dark"></div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 mb-4 px-4">
        <div class="product">
          <div class="main-image">
            <?php echo $hinhxuat; ?>
          </div>
          <div class="thumbnails">
            <img class="thumbnail" src="images/rooms/IMG_11892.png" alt="Thumbnail 1">
            <img class="thumbnail" src="images/rooms/IMG_39782.png" alt="Thumbnail 2">
            <img class="thumbnail" src="images/rooms/IMG_11892.png" alt="Thumbnail 3">
            <img class="thumbnail" src="images/rooms/IMG_11892.png" alt="Thumbnail 4">
          </div>
          <div class="mt-3 text-center">
            <h5 class="fw-bold"><?php echo $ten_phong; ?></h5>
            <p class="text-primary"><?php echo $gia; ?> VNĐ</p>
          </div>
        </div>
      </div>

      <div class="col-lg-6 col-md-6 mb-4 px-4">
        <div class="booking-details">
          <form action="index.php?act=ok_datphong" method="POST">
            <h5 class="fw-bold mb-4">Chi Tiết Đặt Phòng</h5>
            <div class="mb-3">
              <label class="form-label">Tên</label>
              <input type="text" name="ho_ten" value="<?php echo $ten_kh; ?>" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Số Điện Thoại</label>
              <input type="tel" name="sdt" value="<?php echo $sdt; ?>" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Số CCCD</label>
              <input type="text" name="cccd" value="<?php echo $cccd; ?>" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Ngày Nhận Phòng</label>
              <input type="date" name="ngay_nhanphong" class="form-control" id="check-in-date" oninput="calculateStayAndPrice()" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Ngày Trả Phòng</label>
              <input type="date" name="ngay_traphong" class="form-control" id="check-out-date" oninput="calculateStayAndPrice()" required>
            </div>
            <div class="mb-4">
              <p id="stay-days" class="text-muted">Số ngày đặt: 0 ngày</p>
              <p id="total-price" class="text-muted">Tổng số tiền phải trả: 0 VNĐ</p>
            </div>
            <input type="hidden" name="id_phong" value="<?php echo $dat_phong['id']; ?>">
            <input type="hidden" name="id_kh" value="<?php echo $id_kh; ?>">
            <input type="hidden" name="gia_phong" value="<?php echo $dat_phong['gia_phong']; ?>">
            <button type="submit" name="chot_datphong" class="btn-custom w-100">Đặt Ngay</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    function calculateStayAndPrice() {
      const checkInDate = new Date(document.getElementById("check-in-date").value);
      const checkOutDate = new Date(document.getElementById("check-out-date").value);
      if (checkInDate && checkOutDate && checkOutDate > checkInDate) {
        const oneDay = 24 * 60 * 60 * 1000;
        const stayDays = Math.round((checkOutDate - checkInDate) / oneDay);

        const roomPrice = <?php echo $giajs; ?>;
        const totalPrice = roomPrice * stayDays;

        document.getElementById("stay-days").textContent = `Số ngày đặt: ${stayDays} ngày`;
        document.getElementById("total-price").textContent = `Tổng số tiền phải trả: ${totalPrice.toLocaleString()} VNĐ`;
      } else {
        document.getElementById("stay-days").textContent = "Số ngày đặt: 0 ngày";
        document.getElementById("total-price").textContent = "Tổng số tiền phải trả: 0 VNĐ";
      }
    }

    const thumbnails = document.querySelectorAll(".thumbnail");
    const mainImage = document.querySelector(".main-image img");

    thumbnails.forEach(thumbnail => {
      thumbnail.addEventListener("click", () => {
        mainImage.src = thumbnail.src;
      });
    });
  </script>

  <?php require('inc/footer.php'); ?>
</body>

</html>