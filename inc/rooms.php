<!DOCTYPE html>
<html>

<head>
  <title>Hotel Booking</title>
  <?php require('inc/links.php'); ?>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
  <link rel="stylesheet" type="text/css" href="css/common.css">
  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
</head>

<body>
  <?php require('inc/header.php'); ?>

  <div class="my-5 px-4 section-padding">
    <h2 class="fw-bold h-font text-center">Phòng Của Chúng Tôi</h2>
    <div class="h-line bg-dark"></div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 px-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow-sm">
          <div class="container-fluid flex-lg-column align-items-stretch">
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
              <?php if (!empty($list_coso_tren)) : ?>
                <div class="border bg-light p-3 rounded mb-3">
                  <h5 class="mb-3">Cơ Sở</h5>
                  <?php foreach ($list_coso_tren as $coso_tren) {
                    extract($coso_tren); ?>
                    <div class="form-check mb-2">
                      <input type="checkbox" class="form-check-input" id="coso_<?php echo $coso_tren['id']; ?>">
                      <label class="form-check-label" for="coso_<?php echo $coso_tren['id']; ?>"><?php echo $coso_tren['ten_coso']; ?></label>
                    </div>
                  <?php } ?>
                </div>
              <?php endif; ?>

              <?php if (!empty($list_tiennghi_tren)) : ?>
                <div class="border bg-light p-3 rounded mb-3">
                  <h5 class="mb-3">Tiện Nghi</h5>
                  <?php foreach ($list_tiennghi_tren as $tiennghi_tren) {
                    extract($tiennghi_tren); ?>
                    <div class="form-check mb-2">
                      <input type="checkbox" class="form-check-input" id="tiennghi_<?php echo $tiennghi_tren['id']; ?>">
                      <label class="form-check-label" for="tiennghi_<?php echo $tiennghi_tren['id']; ?>"><?php echo $tiennghi_tren['ten_tiennghi']; ?></label>
                    </div>
                  <?php } ?>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </nav>
      </div>

      <div class="col-lg-9 col-md-12 px-4">
        <?php if (!empty($list_rooms)) : ?>
          <?php foreach ($list_rooms as $rooms) {
            extract($rooms);
            if (is_file("upload/" . $hinh)) {
              $hinhxuat = "<img src='upload/" . $hinh . "' class='card-img-top img-fluid rounded' alt='...'>";
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
            if ($rooms["trang_thai_phong"] == 0) { ?>
              <div class="card mb-4 border-0 shadow-sm">
                <div class="row g-0 p-3 align-items-center">
                  <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                    <?php echo $hinhxuat; ?>
                  </div>
                  <div class="col-md-5 px-lg-3 px-md-3 px-0">
                    <h5 class="mb-3 fw-bold"><?php echo $ten_phong; ?></h5>
                    <div class="features mb-3">
                      <h6 class="mb-2 text-muted">Cơ Sở</h6>
                      <?php if (is_array($list_phong_coso)) {
                        foreach ($list_coso as $coso) {
                          foreach ($list_phong_coso as $phong_coso) {
                            if ($coso['id'] == $phong_coso['id_coso']) { ?>
                              <span class="badge bg-light text-dark me-1"><?php echo $coso['ten_coso']; ?></span>
                            <?php break;
                            }
                          }
                        }
                      } ?>
                    </div>
                    <div class="facilities mb-3">
                      <?php if (is_array($list_phong_tiennghi)) { ?>
                        <h6 class="mb-2 text-muted">Tiện Nghi</h6>
                        <?php foreach ($list_tiennghi as $tiennghi) {
                          foreach ($list_phong_tiennghi as $phong_tiennghi) {
                            if ($tiennghi['id'] == $phong_tiennghi['id_tiennghi']) { ?>
                              <span class="badge bg-light text-dark me-1"><?php echo $tiennghi['ten_tiennghi']; ?></span>
                            <?php break;
                            }
                          }
                        } ?>
                      <?php } ?>
                    </div>
                    <?php if ($rooms['nguoi_lon'] > 0 || $rooms['tre_em'] > 0) { ?>
                      <div class="guests mb-3">
                        <h6 class="mb-2 text-muted">Khách</h6>
                        <?php if ($rooms['nguoi_lon'] > 0) { ?>
                          <span class="badge bg-light text-dark me-1"><?php echo $rooms['nguoi_lon']; ?> Người Lớn</span>
                        <?php } ?>
                        <?php if ($rooms['tre_em'] > 0) { ?>
                          <span class="badge bg-light text-dark me-1"><?php echo $rooms['tre_em']; ?> Trẻ Em</span>
                        <?php } ?>
                      </div>
                    <?php } ?>
                  </div>
                  <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                    <h6 class="mb-4 text-primary"><?php echo $gia; ?> VNĐ/đêm</h6>
                    <?php if (isset($_SESSION['khach_hang'])) { ?>
                      <a href="<?php echo $dat_phong; ?>" class="btn btn-primary btn-sm w-100 mb-2">Đặt Ngay</a>
                    <?php } else { ?>
                      <button type="button" class="btn btn-primary btn-sm w-100 mb-2" data-bs-toggle="modal" data-bs-target="#loginModel">Đặt Ngay</button>
                    <?php } ?>
                    <a href="<?php echo $chi_tiet; ?>" class="btn btn-outline-primary btn-sm w-100">Chi Tiết</a>
                  </div>
                </div>
              </div>
          <?php }
          } ?>
        <?php else : ?>
          <p class="text-center text-muted">Không có phòng nào hiện tại.</p>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <?php require('inc/footer.php'); ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>