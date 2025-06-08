<!DOCTYPE html>
<html>

<head>
  <title>Hotel Booking</title>
  <?php require('inc/links.php'); ?>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
  <link rel="stylesheet" type="text/css" href="css/common.css">
  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
  <style>
    .room-detail {
      padding: 20px;
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
    }

    .cananhdetail {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-bottom: 20px;
    }

    .cananhdetail img {
      max-width: 100%;
      height: auto;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .pop:hover {
      transform: scale(1.03);
      transition: all 0.3s;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    .description {
      color: #7f8c8d;
      line-height: 1.6;
    }
  </style>
</head>

<body>
  <?php require('inc/header.php'); ?>

  <div class="my-5 px-4 section-padding">
    <h2 class="fw-bold h-font text-center">Chi Tiết Phòng</h2>
    <?php if (!empty($list_chitietphong)) :
      extract($list_chitietphong);
      $ten_phong = lay_ten_loaiphong($list_chitietphong['ma_loaiphong']);
      if (is_file("upload/" . $list_chitietphong['hinh'])) {
        $hinhxuat = "<img src='upload/" . $list_chitietphong['hinh'] . "' class='img-fluid rounded'>";
      } else {
        $hinhxuat = "no photo";
      }
    ?>
      <div class="container">
        <div class="room-detail">
          <h4 class="fw-bold mb-4"><?php echo $ten_phong; ?></h4>
          <div class="cananhdetail">
            <?php echo $hinhxuat; ?>
          </div>
          <p class="description"><?php echo $list_chitietphong['mo_ta']; ?></p>
        </div>
      </div>
    <?php else : ?>
      <p class="text-center text-muted">Chưa có thông tin chi tiết phòng.</p>
    <?php endif; ?>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#binh_luan").load("inc/binhluan.php", {
        idpro: <?= $list_chitietphong['id'] ?>
      });
    });
  </script>

  <div class="container">
    <h3 class="fw-bold mb-4">Bình Luận</h3>
    <div id="binh_luan" class="bg-white p-4 rounded shadow-sm"></div>
  </div>

  <?php require('inc/footer.php'); ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>