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

    .features p {
      margin-right: 0;
    }

    a.tintuc {
      text-decoration: none;
      color: #333;
    }
  </style>

</head>

<body>

  <?php require('inc/header.php'); ?>

  <div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center">Tin Tức</h2>
    <div class="container mx-auto">
      <div class="row d-flex justify-content-center">
        <?php if (!empty($list_tintuc)) : ?>
          <?php
          foreach ($list_tintuc as $tintuc) {
            extract($tintuc);
            $chi_tiet_tintuc = "index.php?act=chi_tiet_tin_tuc&id=" . $tintuc["id"];
            if (is_file("upload/" . $hinh_mota)) {
              $hinhxuat = "<img src='upload/" . $hinh_mota . "' class='img-fluid rounded' alt='...'>";
            } else {
              $hinhxuat = "no photo";
            }
            if ($tintuc['trang_thai'] == 0) {
          ?>
              <div class="col-lg-9 col-md-12 px-4">
                <a class="tintuc" href="<?php echo $chi_tiet_tintuc; ?>">
                  <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                      <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                        <?php echo $hinhxuat; ?>
                      </div>
                      <div class="col-md-7 px-lg-3 px-md-3 px-0">
                        <h5 class="mb-3"><?php echo $tintuc['tieu_de']; ?></h5>
                        <div class="features mb-4">
                          <p><?php echo $tintuc['mo_ta']; ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
          <?php }
          } ?>
        <?php else : ?>
          <p>Tin tức trống!</p>
        <?php endif; ?>




      </div>
    </div>
  </div>

  <?php require('inc/footer.php'); ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>