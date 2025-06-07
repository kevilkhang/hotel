<!DOCTYPE html>
<html>

<head>
  <title>RamBoHotel</title>
  <!-- CSS only -->
  <?php require('inc/links.php'); ?>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
  <link rel="stylesheet" type="text/css" href="css/common.css">
  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>


</head>

<body>

  <?php require('inc/header.php'); ?>

  <div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center">Phòng</h2>

    <div class="h-line bg-dark"></div>

  </div>

  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 px-0">

        <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
          <div class="container-fluid flex-lg-column align-items-stretch">
            <!-- <h4 class="mt-2">BỘ LỌC</h4> -->
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">

              <?php if (!empty($list_coso_tren)) : ?>
                <div class="border bg-light p-3 rounded mb-3">
                  <h5 class="mb-3" style="font-size: 18px;">Cở sở</h5>
                  <?php
                  foreach ($list_coso_tren as $coso_tren) {
                    extract($coso_tren);
                  ?>
                    <div class="mb-2">
                      <label class="form-check-label" for="f1"><?= $coso_tren['ten_coso']; ?></label>
                    </div>
                  <?php } ?>
                </div>
              <?php else : ?>
              <?php endif; ?>

              <?php if (!empty($list_tiennghi_tren)) : ?>
                <div class="border bg-light p-3 rounded mb-3">
                  <h5 class="mb-3" style="font-size: 18px;">Tiện Nghi</h5>
                  <?php
                  foreach ($list_tiennghi_tren as $tiennghi_tren) {
                    extract($tiennghi_tren);
                  ?>
                    <div class="mb-2">
                      <label class="form-check-label" for="f1"><?= $tiennghi_tren['ten_tiennghi']; ?></label>
                    </div>
                  <?php } ?>
                </div>
              <?php else : ?>
              <?php endif; ?>
            </div>
          </div>
        </nav>
      </div>

      <div class="col-lg-9 col-md-12 px-4">

        <?php if (!empty($list_rooms)) : ?>
          <?php
          foreach ($list_rooms as $rooms) {
            extract($rooms);
            if (is_file("upload/" . $hinh)) {
              $hinhxuat = "<img src='upload/" . $hinh . "' class='img-fluid rounded' alt='...'>";
            } else {
              $hinhxuat = "no photo";
            }
            $gia = number_format((int)$gia_phong, 0, '.', '.');
            $ten_phong = lay_ten_loaiphong($rooms['ma_loaiphong']);
            $list_phong_coso = lay_co_so_phong($rooms['id']);
            $list_coso = list_coso();
            $list_phong_tiennghi = lay_tien_nghi_phong($rooms['id']);
            $list_tiennghi = list_tiennghi();
            $dat_phong = "index.php?act=dat_phong&id=" . $rooms["id"];
            $chi_tiet = "index.php?act=chi_tiet&id=" . $rooms["id"];
            if ($rooms["trang_thai_phong"] == 0) {
              // $ten_phong = $rooms['id'];
          ?>
              <div class="card mb-4 border-0 shadow">
                <div class="row g-0 p-3 align-items-center">
                  <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                    <?php echo $hinhxuat; ?>
                  </div>
                  <div class="col-md-5 px-lg-3 px-md-3 px-0">
                    <h5 class="mb-3"><?php echo $ten_phong; ?></h5>
                    <div class="features mb-4">
                      <h6 class="mb-1">Cơ Sở</h6>
                      <span class="badge rounded-pill bg-light text-dark text-wrap">
                        2 Phòng Ngủ
                      </span>
                      <span class="badge rounded-pill bg-light text-dark text-wrap">
                        1 Phòng Tắm
                      </span>
                      <span class="badge rounded-pill bg-light text-dark text-wrap">
                        1 Ban Công
                      </span>
                      <span class="badge rounded-pill bg-light text-dark text-wrap">
                        3 Sofa
                      </span>
                    </div>
                    <div class="Facilities mb-3">
                      <?php
                      if (is_array($list_phong_tiennghi)) { ?>
                        <h6 class="mb-1">Tiện Nghi</h6>
                        <?php foreach ($list_tiennghi as $tiennghi) { ?>
                          <?php foreach ($list_phong_tiennghi as $phong_tiennghi) {
                            if ($tiennghi['id'] == $phong_tiennghi['id_tiennghi']) { ?>
                              <span class="badge rounded-pill bg-light text-dark text-wrap">
                                <?php echo $tiennghi['ten_tiennghi']; ?>
                              </span>
                            <?php break;
                            } ?>
                          <?php } ?>
                        <?php } ?>
                      <?php } ?>
                    </div>
                    <?php if ($rooms['nguoi_lon'] > 0 || $rooms['tre_em'] > 0) { ?>
                      <div class="guests">
                        <h6 class="mb-1">Khách Hàng</h6>
                        <?php if ($rooms['nguoi_lon'] > 0) { ?>
                          <span class="badge rounded-pill bg-light text-dark text-wrap">
                            <?php echo $rooms['nguoi_lon'] ?> Người Lớn
                          </span>
                        <?php } ?>
                        <?php if ($rooms['tre_em'] > 0) { ?>
                          <span class="badge rounded-pill bg-light text-dark text-wrap">
                            <?php echo $rooms['tre_em'] ?> Trẻ Em
                          </span>
                        <?php } ?>
                      </div>
                    <?php } ?>
                  </div>
                  <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                    <h6 class="mb-4"><?php echo $gia; ?> VNĐ mỗi đêm </h6>
                    <?php
                    // Kiểm tra xem biến $_SESSION['khach_hang'] có tồn tại không
                    if (isset($_SESSION['khach_hang'])) {
                    ?>
                      <a href="<?php echo $dat_phong; ?>" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Đặt Ngay</a>
                    <?php
                    } else {
                    ?>
                      <button type="button" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2" data-bs-toggle="modal" data-bs-target="#loginModel">Đặt Ngay</button>
                    <?php
                    }
                    ?>
                    <a href="<?php echo $chi_tiet; ?>" class="btn btn-sm w-100 btn-outline-dark shadow-none">Chi Tiết</a>
                  </div>
                </div>
              </div>
          <?php }
          } ?>
        <?php else : ?>
          <p>Không có phòng .</p>
        <?php endif; ?>

      </div>
    </div>
  </div>
  <?php require('inc/footer.php') ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>