<!DOCTYPE html>
<html>

<head>
	<title>RamBoHotel</title>
	<!-- CSS only -->
	<?php require('inc/links.php'); ?>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/common.css">
	<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

	<style type="text/css">
		.availability-form {
			margin-top: -50px;
			z-index: 2;
			position: relative;
		}

		@media screen and (max-width: 575px) {
			.availability-form {
				margin-top: 25px;
				padding: 0 35px;
			}

		}
	</style>
</head>

<body>

	<?php require('inc/header.php'); ?>
	<!-- Swiper Carousal-->
	<div class="container-fluid px-lg-4 mt-4">
		<div class="swiper swiper-container">
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<img src="images/carousel/1.png" class="w-100 d-block" />
				</div>
				<div class="swiper-slide">
					<img src="images/carousel/2.png" class="w-100 d-block" />
				</div>
				<div class="swiper-slide">
					<img src="images/carousel/3.png" class="w-100 d-block" />
				</div>
				<div class="swiper-slide">
					<img src="images/carousel/4.png" class="w-100 d-block" />
				</div>
				<div class="swiper-slide">
					<img src="images/carousel/5.png" class="w-100 d-block" />
				</div>
				<div class="swiper-slide">
					<img src="images/carousel/6.png" class="w-100 d-block" />
				</div>

			</div>

		</div>
	</div>

	<!-- check avilability form-->
	<div class="container availability-form">
		<div class="row">
			<div class="col-lg-12 bg-white shadow p-4 rounded">
				<h5 class="col-lg-3">Tìm Phòng</h5>
				<form>
					<div class="row align-items-end">
						<div class="col-lg-3 mb-3">
							<label class="form-label" style="font-weight: 500;">Ngày Nhận Phòng</label>
							<input type="date" class="form-control shadow-none">
						</div>
						<div class="col-lg-3 mb-3">
							<label class="form-label" style="font-weight: 500;">Ngày Trả Phòng</label>
							<input type="date" class="form-control shadow-none">
						</div>
						<div class="col-lg-3 mb-3">
							<label class="form-label" style="font-weight: 500;">Người Lớn</label>
							<select class="form-select shadow-none">

								<option value="1">Một</option>
								<option value="2">Hai</option>
								<option value="3">Ba</option>
							</select>
						</div>
						<div class="col-lg-2 mb-3">
							<label class="form-label" style="font-weight: 500;">Trẻ Em</label>
							<select class="form-select shadow-none">

								<option value="1">Một</option>
								<option value="2">Hai</option>
								<option value="3">Ba</option>
							</select>
						</div>
						<div class="col-lg-1 mb-lg-3 mt-2">
							<button type="submit" class="btn text-white shadow-none custom-bg">Tìm Phòng</button>
						</div>

					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Our Rooms -->
	<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Phòng</h2>
	<div class="container">
		<div class="row">
			<?php if (!empty($list_rooms)) : ?>
				<?php
				foreach ($list_rooms as $rooms) {
					extract($rooms);
					if (is_file("upload/" . $hinh)) {
						$hinhxuat = "<img src='upload/" . $hinh . "' class='card-img-top' alt='...'>";
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
					// $ten_phong = $rooms['id'];
				?>
					<div class="col-lg-4 col-md-6 my-3">
						<div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
							<?php echo $hinhxuat; ?>
							<div class="card-body">
								<h5 class="card-title"><?php echo $ten_phong; ?></h5>
								<h6 class="mb-4"> <?php echo $gia; ?> VNĐ mỗi đêm </h6>
								<div class="features mb-4">
									<?php
									if (is_array($list_phong_coso)) { ?>
										<h6 class="mb-1">Cơ Sở</h6>
										<?php foreach ($list_coso as $coso) { ?>
											<?php foreach ($list_phong_coso as $phong_coso) {
												if ($coso['id'] == $phong_coso['id_coso']) { ?>
													<span class="badge rounded-pill bg-light text-dark text-wrap">
														<?php echo $coso['ten_coso']; ?>
													</span>
												<?php break;
												} ?>
											<?php } ?>
										<?php } ?>
									<?php } ?>
								</div>
								<div class="Facilities mb-4">
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
									<div class="guests mb-4">
										<h6 class="mb-1">Khách Hàng</h6>
										<?php if ($rooms['nguoi_lon'] > 0) { ?>
											<span class="badge rounded-pill bg-light text-dark text-wrap">
												<?php echo $rooms['nguoi_lon'] ?> Người Lớn
											</span>
										<?php } ?>
										<?php if ($rooms['tre_em'] > 0) { ?>
											<span class="badge rounded-pill bg-light text-dark text-wrap">
												<?php echo $rooms['tre_em'] ?> Trẻ em
											</span>
										<?php } ?>
									</div>
								<?php } ?>
								<div class="rating mb-4">

									<h6 class="mb-1">Xếp Hạng</h6>
									<span class="badge rounded-pill bg-light">
										<i class="bi bi-star-fill text-warning"></i>
										<i class="bi bi-star-fill text-warning"></i>
										<i class="bi bi-star-fill text-warning"></i>
										<i class="bi bi-star-fill text-warning"></i>
										<i class="bi bi-star-fill text-warning"></i>
									</span>
								</div>
								<div class="d-flex justify-content-evenly mb-2">
									<?php
									// Kiểm tra xem biến $_SESSION['khach_hang'] có tồn tại không
									if (isset($_SESSION['khach_hang'])) {
									?>
										<a href="<?php echo $dat_phong; ?>" class="btn btn-sm text-white custom-bg shadow-none">Đặt Ngay</a>
									<?php
									} else {
									?>
										<button type="button" class="btn btn-sm text-white custom-bg shadow-none" data-bs-toggle="modal" data-bs-target="#loginModel">Đặt Ngay</button>
									<?php
									}
									?>
									<a href="<?php echo $chi_tiet; ?>" class="btn btn-sm btn-outline-dark shadow-none">Chi Tiết</a>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			<?php else : ?>
				<!-- <p>Không có .</p> -->
			<?php endif; ?>
			<div class="col-lg-12 text-center mt-5">
				<!-- <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">Thêm</a> -->
			</div>
		</div>
	</div>


	<?php if (!empty($list_tiennghi_giaodien)) : ?>
		<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Tiện Nghi</h2>

		<div class="container">
			<div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
				<?php foreach ($list_tiennghi_giaodien as $tiennghi) {
					if (is_file("upload/" . $tiennghi['hinh'])) {
						$hinhxuat_tiennghi = "<img src='upload/" . $tiennghi['hinh'] . "' width='80'>";
					} else {
						$hinhxuat_tiennghi = "no photo";
					} ?>
					<div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
						<?php echo $hinhxuat_tiennghi; ?>
						<h5 class="mt-3"><?php echo $tiennghi['ten_tiennghi']; ?></h5>
					</div>
				<?php } ?>
			</div>
		</div>
	<?php else : ?>
		<!-- <p>Không có .</p> -->
	<?php endif; ?>
	<!-- Testimonials -->
	<?php if (!empty($list_danhgia)) : ?>
		<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">ĐÁNH GIÁ</h2>

		<div class="container mt-5">
			<!-- Swiper -->
			<div class="swiper swiper-testimonials">
				<div class="swiper-wrapper mb-5">
					<?php foreach ($list_danhgia as $danhgia) {
						$ten_danhgia = lay_ten_khachhang($danhgia['id_khachhang']);

						if ($danhgia['trang_thai'] == 0) { ?>
							<div class="swiper-slide bg-white p-4">
								<div class="profile d-flex align-items-center mb-3">
									<img src="images/facilities/stars.png" width="30px">
									<h6 class="m-0 ms-2"><?= $ten_danhgia; ?></h6>
								</div>
								<p>
									<?= $danhgia['noi_dung'] ?>
								</p>
								<div class="rating">
									<?php
									for ($i = 1; $i <= $danhgia['so_sao']; $i++) { ?>
										<i class="bi bi-star-fill text-warning"></i>
									<?php } ?>
								</div>
							</div>
						<?php } else { ?>
					<?php }
					} ?>

				</div>
				<div class="swiper-pagination"></div>
			</div>
		</div>
	<?php else : ?>
	<?php endif; ?>
	<!-- REach us-->

	<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">THÔNG TIN</h2>

	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
				<iframe class="w-100 rounded" height="320px" src="https://www.google.com/maps/place/22+Nguy%E1%BB%85n+Trung+Ng%E1%BA%A1n,+Khu%C3%AA+Trung,+C%E1%BA%A9m+L%E1%BB%87,+%C4%90%C3%A0+N%E1%BA%B5ng+550000/@16.0230304,108.2076938,17z/data=!3m1!4b1!4m6!3m5!1s0x314219897929a9af:0x580d06c2ad174ba9!8m2!3d16.0230304!4d108.2076938!16s%2Fg%2F11f1225nrc?entry=ttu&g_ep=EgoyMDI1MDQyMC4wIKXMDSoASAFQAw%3D%3D" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
			<div class="col-lg-4 col-md-4 ">
				<div class="bg-white p-4 rounded">
					<h5>Gọi cho chúng tôi</h5>
					<a href="tel: +0356743036" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-telephone-fill"></i> +84 356743036</a>
					<br>
					<a href="tel: +0356743036" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-telephone-fill"></i> +84 356743036</a>
				</div>
				<div class="bg-white p-4 rounded">
					<h5>Follow</h5>
					<a href="#" class="d-inline-block mb-3">
						<span class="badge bg-light text-dark fs-6 p-2">
							<i class="bi bi-twitter me-1"></i>Twitter
						</span>
					</a>
					<br>
					<a href="#" class="d-inline-block mb-3">
						<span class="badge bg-light text-dark fs-6 p-2">
							<i class="bi bi-facebook me-1"></i>Facebook
						</span>
					</a>
					<br>
					<a href="#" class="d-inline-block">
						<span class="badge bg-light text-dark fs-6 p-2">
							<i class="bi bi-instagram me-1"></i>Instagram
						</span>
					</a>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<?php require('inc/footer.php') ?>
	<!-- JavaScript Bundle with Popper -->


	<!-- Swiper JS -->
	<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

	<!-- Initialize Swiper -->
	<script>
		var swiper = new Swiper(".swiper-container", {
			spaceBetween: 30,
			effect: "fade",
			loop: true,
			autoplay: {
				delay: 3500,
				disableOnInteraction: false,
			}
		});

		var swiper = new Swiper(".swiper-testimonials", {
			effect: "coverflow",
			grabCursor: true,
			centeredSlides: true,
			slidesPerView: "auto",
			slidesPerView: "3",
			loop: true,
			coverflowEffect: {
				rotate: 50,
				stretch: 0,
				depth: 100,
				modifier: 1,
				slideShadows: false,
			},
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