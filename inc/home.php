<!DOCTYPE html>
<html>

<head>
	<title>Hotel Booking</title>
	<?php require('inc/links.php'); ?>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/common.css">
	<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
	<style type="text/css">
		.availability-form {
			margin-top: -60px;
			z-index: 2;
			position: relative;
			background: #ffffff;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
		}

		.card-img-top {
			height: 250px; /* Fixed height for all images */
			object-fit: cover; /* Crops the image to fill the container while maintaining aspect ratio */
			border-top-left-radius: 10px;
			border-top-right-radius: 10px;
		}

		@media screen and (max-width: 575px) {
			.availability-form {
				margin-top: 20px;
				padding: 15px;
			}
			.card-img-top {
				height: 200px; /* Adjusted height for smaller screens */
			}
		}
	</style>
</head>

<body>
	<?php require('inc/header.php'); ?>
	<!-- Swiper Carousel -->
	<div class="container-fluid px-lg-4 mt-4">
		<div class="swiper swiper-container">
			<div class="swiper-wrapper">
				<div class="swiper-slide"><img src="images/carousel/1.png" class="w-100 d-block" /></div>
				<div class="swiper-slide"><img src="images/carousel/2.png" class="w-100 d-block" /></div>
				<div class="swiper-slide"><img src="images/carousel/3.png" class="w-100 d-block" /></div>
				<div class="swiper-slide"><img src="images/carousel/4.png" class="w-100 d-block" /></div>
				<div class="swiper-slide"><img src="images/carousel/5.png" class="w-100 d-block" /></div>
				<div class="swiper-slide"><img src="images/carousel/6.png" class="w-100 d-block" /></div>
			</div>
		</div>
	</div>

	<!-- Availability Form -->
	<div class="container availability-form">
		<div class="row">
			<div class="col-12">
				<h4 class="text-center mb-4">Tìm Phòng Của Bạn</h4>
				<form class="row g-3 align-items-end">
					<div class="col-md-3 mb-3">
						<label class="form-label fw-bold">Ngày Nhận Phòng</label>
						<input type="date" class="form-control border-0 bg-light" required>
					</div>
					<div class="col-md-3 mb-3">
						<label class="form-label fw-bold">Ngày Trả Phòng</label>
						<input type="date" class="form-control border-0 bg-light" required>
					</div>
					<div class="col-md-2 mb-3">
						<label class="form-label fw-bold">Người Lớn</label>
						<select class="form-select border-0 bg-light" required>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
						</select>
					</div>
					<div class="col-md-2 mb-3">
						<label class="form-label fw-bold">Trẻ Em</label>
						<select class="form-select border-0 bg-light" required>
							<option value="0">0</option>
							<option value="1">1</option>
							<option value="2">2</option>
						</select>
					</div>
					<div class="col-md-2 mb-3">
						<button type="submit" class="btn btn-primary w-100">Tìm Phòng</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Our Rooms -->
	<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Phòng Của Chúng Tôi</h2>
	<div class="container">
		<div class="row">
			<?php if (!empty($list_rooms)) : ?>
				<?php foreach ($list_rooms as $rooms) {
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
				?>
					<div class="col-lg-4 col-md-6 mb-4">
						<div class="card border-0 shadow-sm h-100">
							<?php echo $hinhxuat; ?>
							<div class="card-body">
								<h5 class="card-title fw-bold"><?php echo $ten_phong; ?></h5>
								<h6 class="text-muted mb-3"><?php echo $gia; ?> VNĐ/đêm</h6>
								<div class="features mb-3">
									<?php if (is_array($list_phong_coso)) { ?>
										<h6 class="mb-2">Cơ Sở</h6>
										<?php foreach ($list_coso as $coso) {
											foreach ($list_phong_coso as $phong_coso) {
												if ($coso['id'] == $phong_coso['id_coso']) { ?>
													<span class="badge bg-light text-dark me-1"><?php echo $coso['ten_coso']; ?></span>
												<?php break;
												}
											}
										} ?>
									<?php } ?>
								</div>
								<div class="facilities mb-3">
									<?php if (is_array($list_phong_tiennghi)) { ?>
										<h6 class="mb-2">Tiện Nghi</h6>
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
										<h6 class="mb-2">Khách</h6>
										<?php if ($rooms['nguoi_lon'] > 0) { ?>
											<span class="badge bg-light text-dark me-1"><?php echo $rooms['nguoi_lon']; ?> Người Lớn</span>
										<?php } ?>
										<?php if ($rooms['tre_em'] > 0) { ?>
											<span class="badge bg-light text-dark me-1"><?php echo $rooms['tre_em']; ?> Trẻ Em</span>
										<?php } ?>
									</div>
								<?php } ?>
								<div class="rating mb-3">
									<h6 class="mb-2">Xếp Hạng</h6>
									<span class="text-warning">
										<i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
									</span>
								</div>
								<div class="d-flex justify-content-between">
									<?php if (isset($_SESSION['khach_hang'])) { ?>
										<a href="<?php echo $dat_phong; ?>" class="btn btn-primary btn-sm">Đặt Ngay</a>
									<?php } else { ?>
										<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#loginModel">Đặt Ngay</button>
									<?php } ?>
									<a href="<?php echo $chi_tiet; ?>" class="btn btn-outline-primary btn-sm">Chi Tiết</a>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			<?php else : ?>
				<p class="text-center">Không có phòng nào hiện tại.</p>
			<?php endif; ?>
		</div>
	</div>

	<?php if (!empty($list_tiennghi_giaodien)) : ?>
		<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Tiện Nghi Của Chúng Tôi</h2>
		<div class="container">
			<div class="row justify-content-center">
				<?php foreach ($list_tiennghi_giaodien as $tiennghi) {
					if (is_file("upload/" . $tiennghi['hinh'])) {
						$hinhxuat_tiennghi = "<img src='upload/" . $tiennghi['hinh'] . "' width='80' class='img-fluid'>";
					} else {
						$hinhxuat_tiennghi = "no photo";
					} ?>
					<div class="col-lg-2 col-md-3 col-6 text-center bg-white rounded shadow-sm p-3 mb-4">
						<?php echo $hinhxuat_tiennghi; ?>
						<h6 class="mt-2"><?php echo $tiennghi['ten_tiennghi']; ?></h6>
					</div>
				<?php } ?>
			</div>
		</div>
	<?php endif; ?>

	<?php if (!empty($list_danhgia)) : ?>
		<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Đánh Giá Khách Hàng</h2>
		<div class="container mt-5">
			<div class="swiper swiper-testimonials">
				<div class="swiper-wrapper">
					<?php foreach ($list_danhgia as $danhgia) {
						$ten_danhgia = lay_ten_khachhang($danhgia['id_khachhang']);
						if ($danhgia['trang_thai'] == 0) { ?>
							<div class="swiper-slide bg-white p-4 rounded shadow-sm">
								<div class="profile d-flex align-items-center mb-3">
									<img src="images/facilities/stars.png" width="30px" class="me-2">
									<h6 class="m-0"><?php echo $ten_danhgia; ?></h6>
								</div>
								<p class="text-muted"><?php echo $danhgia['noi_dung']; ?></p>
								<div class="rating mt-2">
									<?php for ($i = 1; $i <= $danhgia['so_sao']; $i++) { ?>
										<i class="bi bi-star-fill text-warning"></i>
									<?php } ?>
								</div>
							</div>
						<?php } ?>
					<?php } ?>
				</div>
				<div class="swiper-pagination"></div>
			</div>
		</div>
	<?php endif; ?>

	<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Thông Tin Liên Hệ</h2>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-8 p-4 mb-4 bg-white rounded shadow-sm">
				<iframe class="w-100 rounded" height="350px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.3118980903823!2d108.1552256766271!3d16.04929670035895!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31421938d61a3ce5%3A0x29d80f3ebbdcb44a!2zxJDhuqFpIEjhu41jIER1eSBUw6JuIEjDsmEgS2jDoW5oIE5hbQ!5e0!3m2!1svi!2s!4v1746692348855!5m2!1svi!2s" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
			<div class="col-lg-4 col-md-4">
				<div class="bg-white p-4 rounded shadow-sm mb-4">
					<h5 class="mb-3">Liên Hệ</h5>
					<a href="tel:+84123456789" class="d-block mb-2 text-dark text-decoration-none"><i class="bi bi-telephone-fill me-2"></i>+84123456789</a>
					<a href="mailto:cs445l_group5@gmail.com" class="d-block text-dark text-decoration-none"><i class="bi bi-envelope-fill me-2"></i>cs445l_group5@gmail.com</a>
				</div>
				<div class="bg-white p-4 rounded shadow-sm">
					<h5 class="mb-3">Theo Dõi Chúng Tôi</h5>
					<a href="#" class="d-block mb-2 text-dark text-decoration-none"><i class="bi bi-twitter me-2"></i>Twitter</a>
					<a href="#" class="d-block mb-2 text-dark text-decoration-none"><i class="bi bi-facebook me-2"></i>Facebook</a>
					<a href="#" class="d-block text-dark text-decoration-none"><i class="bi bi-instagram me-2"></i>Instagram</a>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<?php require('inc/footer.php'); ?>
	<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
	<script>
		var swiper = new Swiper(".swiper-container", {
			spaceBetween: 30,
			effect: "fade",
			loop: true,
			autoplay: { delay: 3500, disableOnInteraction: false }
		});
		var swiper = new Swiper(".swiper-testimonials", {
			effect: "coverflow",
			grabCursor: true,
			centeredSlides: true,
			slidesPerView: "auto",
			slidesPerView: 3,
			loop: true,
			coverflowEffect: { rotate: 50, stretch: 0, depth: 100, modifier: 1, slideShadows: false },
			pagination: { el: ".swiper-pagination" },
			breakpoints: {
				320: { slidesPerView: 1 },
				640: { slidesPerView: 1 },
				768: { slidesPerView: 2 },
				1024: { slidesPerView: 3 }
			}
		});
	</script>
</body>

</html>