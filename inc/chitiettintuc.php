<!DOCTYPE html>
<html>

<head>
  <title>Hotel Booking</title>
  <?php require('inc/links.php'); ?>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
  <link rel="stylesheet" type="text/css" href="css/common.css">
  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
  <style>
    .news-detail {
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 20px;
      margin-bottom: 20px;
    }

    .news-detail h2 {
      color: var(--dark);
      font-size: 1.75rem;
      margin-bottom: 10px;
    }

    .news-detail p {
      color: #7f8c8d;
      line-height: 1.6;
      margin-bottom: 15px;
    }
  </style>
</head>

<body>
  <?php require('inc/header.php'); ?>

  <div class="my-5 px-4 section-padding">
    <h2 class="fw-bold h-font text-center">Tin Tức</h2>
    <div class="container mx-auto">
      <?php if (!empty($listchitiet_tintuc)) :
        extract($listchitiet_tintuc);
      ?>
        <div class="news-detail">
          <h2 class="mb-3"><?php echo $listchitiet_tintuc['tieu_de']; ?></h2>
          <p><?php echo nl2br($listchitiet_tintuc['noi_dung']); ?></p>
        </div>
      <?php else : ?>
        <p class="text-center text-muted">Chưa có bài viết!</p>
      <?php endif; ?>
    </div>
  </div>

  <?php require('inc/footer.php'); ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>