<!DOCTYPE html>
<html>

<head>
	<title>Hotel Booking</title>
	<!-- CSS only -->
	<?php require('inc/links.php'); ?>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
	<link rel="stylesheet" type="text/css" href="css/common.css">
	<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
	<style>
		.pop:hover {
			border-top-color: var(--teal) !important;
			transform: scale(1.03);
			transition: all 0.3s;
		}
	</style>

</head>

<body>

	<?php require('inc/header.php'); ?>

	<!-- <div class="my-5 px-4"> -->
	<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Đơn Phòng</h2>
	<div class="container">
		<div class="row">
			<?php if (!empty($list_donphong)) : ?>
				<?php
				foreach ($list_donphong as $don_phong) {
					extract($don_phong);
					$gia_donphong = number_format((int)$tong_tien, 0, '.', '.');
					$sua_donphong = "index.php?act=sua_donphong&id=" . $don_phong["id"];
					$danh_giaphong = "index.php?act=danh_giaphong&id=" . $don_phong["id"];
					$id_phong = $don_phong['id_phong'];
					$phong = sua_phong($id_phong);
					extract($phong);
					$ten_phong = lay_ten_loaiphong($phong['ma_loaiphong']);
					$gia = number_format((int)$phong['gia_phong'], 0, '.', '.');
				?>
					<div class="col-lg-4 col-md-6 my-3">
						<div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
							<img src="images/rooms/1.jpg" class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title"><?= $ten_phong ?> </h5>
								<h6 class="mb-4"><?= $gia ?> VNĐ mỗi đêm </h6>
								<div class="mb-1">
									<h6>Ngày Vào:<p><?php echo $ngay_nhanphong; ?></p>
									</h6>
									<h6>Ngày Trả:<p><?php echo $ngay_traphong; ?></p>
									</h6>
								</div>
								<div>
									<h6>Tổng:<p><?php echo $gia_donphong; ?> VNĐ</p>
									</h6>
									<h6>ID Đơn:<p>BLT-000<?php echo $don_phong['id']; ?></p>
									</h6>
									<h6>Ngày Đặt:<p><?php echo $ngay_datphong; ?></p>
									</h6>
								</div>
								<div class="d-flex justify-content-evenly mb-2">

									<?php
									if ($don_phong['trang_thai_don_phong'] == 4) {
										// Nếu trạng thái là 4, hiển thị biểu mẫu đặt lại phòng
									?>
										<form action="index.php?act=dat_lai" method="post">
											<input type="hidden" name="id_donphong" value="<?php echo $don_phong['id']; ?>">
											<input type="submit" value="Đặt Lại Phòng" class="btn btn-sm text-white bg-danger shadow-none" name="datlai_donphong">
										</form>
									<?php
									} elseif ($don_phong['trang_thai_don_phong'] == 0 || $don_phong['trang_thai_don_phong'] == 1) {
										// Nếu trạng thái là 0 hoặc 1, hiển thị biểu mẫu hủy đặt phòng
									?>
										<form action="index.php?act=huydonphong" method="post">
											<input type="hidden" name="id_donphong" value="<?php echo $don_phong['id']; ?>">
											<input type="submit" value="Hủy Đặt Phòng" class="btn btn-sm text-white bg-danger shadow-none" name="huy_donphong">
										</form>
										<a href="<?php echo $sua_donphong; ?>">
											<p class="btn btn-sm text-white bg-primary shadow-none"> Sửa đơn phòng</p>
										</a>
									<?php
									} elseif ($don_phong['trang_thai_don_phong'] == 2) {
										// Nếu trạng thái là 0 hoặc 1, hiển thị biểu mẫu hủy đặt phòng
									?>
										<p class="btn btn-sm text-white bg-success shadow-none"> Đã xác nhận</p>
									<?php
									} elseif ($don_phong['trang_thai_don_phong'] == 3) {
										// Nếu trạng thái là 3, hiển thị liên kết đến trang đánh giá
									?>
										<p class="btn btn-sm text-white bg-success	 shadow-none">Đã Thanh Toán</p>

										<a href="<?php echo $danh_giaphong; ?>">
											<p class="btn btn-sm text-white bg-primary shadow-none">Đánh giá</p>
										</a>
									<?php
									} elseif ($don_phong['trang_thai_don_phong'] == 5) {
										// Nếu trạng thái là 3, hiển thị liên kết đến trang đánh giá
									?>
										<p class="btn btn-sm text-white bg-primary shadow-none">Đã Đánh giá</p>
									<?php
									}
									?>

								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			<?php else : ?>
				<p>Không có đơn phòng đã đặt.</p>
			<?php endif; ?>
		</div>
	</div>
	</div>
	</div>
	<!-- </div> -->


	<?php require('inc/footer.php'); ?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>