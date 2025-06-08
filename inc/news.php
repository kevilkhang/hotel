<!DOCTYPE html>
<html>

<head>
  <title>Hotel Booking</title>
  <?php require('inc/links.php'); ?>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
  <link rel="stylesheet" type="text/css" href="css/common.css">
  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
  <style>
    .news-card {
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s, box-shadow 0.3s;
    }

    .news-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    .news-image {
      max-height: 200px;
      object-fit: cover;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
    }

    .news-content {
      padding: 15px;
    }

    .news-content h5 {
      color: var(--dark);
      font-size: 1.25rem;
    }

    .news-content p {
      color: #7f8c8d;
      line-height: 1.6;
      margin-bottom: 0;
    }

    a.tintuc {
      text-decoration: none;
      color: inherit;
    }

    a.tintuc:hover .news-card {
      text-decoration: none;
    }
  </style>
</head>

<body>
  <?php require('inc/header.php'); ?>

  <div class="my-5 px-4 section-padding">
    <h2 class="fw-bold h-font text-center">Tin Tức</h2>
    <div class="container mx-auto">
      <div class="row d-flex justify-content-center">
        <?php if (!empty($list_tintuc)) : ?>
          <?php
          foreach ($list_tintuc as $tintuc) {
            extract($tintuc);
            $chi_tiet_tintuc = "index.php?act=chi_tiet_tin_tuc&id=" . $tintuc["id"];
            if (is_file("upload/" . $hinh_mota)) {
              $hinhxuat = "<img src='upload/" . $hinh_mota . "' class='img-fluid news-image' alt='...'>";
            } else {
              $hinhxuat = "no photo";
            }
            if ($tintuc['trang_thai'] == 0) {
          ?>
              <div class="col-lg-9 col-md-12 px-4 mb-4">
                <a class="tintuc" href="<?php echo $chi_tiet_tintuc; ?>">
                  <div class="news-card">
                    <div class="row g-0">
                      <div class="col-md-5">
                        <?php echo $hinhxuat; ?>
                      </div>
                      <div class="col-md-7">
                        <div class="news-content">
                          <h5 class="mb-3"><?php echo $tintuc['tieu_de']; ?></h5>
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
          <p class="text-center text-muted">Tin tức trống!</p>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <?php require('inc/footer.php'); ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>