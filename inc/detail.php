<!DOCTYPE html>
<html>

<head>
  <title>RamBoHotel</title>
  <!-- CSS only -->
  <?php require('inc/links.php'); ?>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
  <link rel="stylesheet" type="text/css" href="css/common.css">
  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
  <style>
    .pop:hover {
      border-top-color: var(--teal) !important;
      transform: scale(1.03);
      transition: all 0.3s;
    }

    .cananhdetail {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-bottom: 20px;
    }

    .cananhdetail img {
      max-width: 1300px;
      height: auto;
    }
  </style>

</head>

<body>

  <?php require('inc/header.php'); ?>

  <div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center">Chi Tiết Phòng</h2>
    <?php if (!empty($list_chitietphong)) :
      extract($list_chitietphong);
      $ten_phong = lay_ten_loaiphong($list_chitietphong['ma_loaiphong']);
      if (is_file("upload/" . $list_chitietphong['hinh'])) {
        $hinhxuat = "<img src='upload/" . $list_chitietphong['hinh'] . "' style='max-width: 1300px;'>";
      } else {
        $hinhxuat = "no photo";
      }
    ?>
      <div class="container">
        <h4><?php echo $ten_phong; ?></h4>
        <!-- <img src="images/rooms/1.jpg" alt="" style="max-width: 1300px;"> -->
        <div class="cananhdetail">
          <?php echo $hinhxuat; ?>
        </div>
        <?php echo $list_chitietphong['mo_ta']; ?>
      </div>
  </div>
<?php else : ?>
  <p>chưa có thông tin chi tiết phòng</p>
<?php endif; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    $("#binh_luan").load("inc/binhluan.php", {
      idpro: <?= $list_chitietphong['id'] ?>
    });
  });
</script>
<div class="binhluan">
  <h3 style="width: 1300px;margin:0 auto;color:black;">Bình luận</h3>
  <div id="binh_luan">

  </div>
</div>
<?php require('inc/footer.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>