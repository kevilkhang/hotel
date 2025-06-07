<style>
	.containerloi {
		display: flex;
		flex-direction: column;
		/* Xếp các phần tử theo chiều dọc */
	}

	.image-info {
		display: flex;
		align-items: center;
		gap: 10px;
	}

	.image-info .image-container {
		display: flex;
		align-items: center;
	}


	.additional-links {
		display: flex;
		top: 50px;
		position: fixed;
		flex-direction: column;
		background-color: white;
		margin-top: 10px;
	}

	.additional-links-item {
		margin-bottom: 0px;
		padding: 0 5px 0 5px;
		/* Khoảng cách giữa các phần tử trong additional-links */
	}

	.additional-links-item a {
		color: #000;
		padding: 0 5px 0 5px;

		text-decoration: none;
		display: block;
		padding: 6px;
		background-color: #f0f0f0;
		border-radius: 2px;
		margin-bottom: 0px;
	}

	.additional-links-item a:hover {
		background-color: #ddd;
		/* Màu nền khi rê chuột vào liên kết */
	}

	.image-info .round-image {
		width: 40px;
		height: 40px;
		border-radius: 50%;
		object-fit: cover;
	}
</style>
<nav class="navbar navbar-expand-lg bg-light px-lg-3 py-lg-2 shadow-sm sticky-top">
	<div class="container-fluid">
		<a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">BL HOTEL</a>
		<button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="index.php">Trang Chủ</a>
				</li>
				<li class="nav-item">
					<a class="nav-link me-2" href="index.php?act=rooms">Phòng</a>
				</li>
				<li class="nav-item">
					<a class="nav-link me-2" href="index.php?act=news">Tin Tức</a>
				</li>
				<li class="nav-item">
					<a class="nav-link me-2" href="index.php?act=contact">Liên Hệ</a>
				</li>
				<li class="nav-item">
					<a class="nav-link me-2" href="index.php?act=about">Giới Thiệu</a>
				</li>
			</ul>
			<div class="d-flex" role="search">
				<?php if (isset($_SESSION['khach_hang'])) :
				?>
					<a href="index.php?act=confirm" style="padding-right: 30px;"><i class="fa fa-shopping-cart" style="font-size:36px; color:black"></i></a>
					<!-- Thư viện jQuery -->
					<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

					<div class="containerloi">
						<div class="image-info">
							<div class="image-container">
								<span><?= $_SESSION['khach_hang']['ho_ten'] ?></span>
							</div>
							<div class="image-container">
								<img src="upload/<?= $_SESSION['khach_hang']['hinh'] ?>" alt="Hình ảnh" class="round-image">
							</div>
						</div>
						<div class="additional-links">
							<?php if ($_SESSION['khach_hang']['vai_tro'] == 1) { ?>
								<div class="additional-links-item">
									<a href="admin/index.php" target="alo">Trang Quản Trị</a>
								</div>
							<?php } ?>
							<div class="additional-links-item">
								<a href="index.php?act=capnhat">Cập Nhật</a>
							</div>
							<div class="additional-links-item">
								<a href="index.php?act=doimk">Đổi Mật Khẩu</a>
							</div>
							<div class="additional-links-item">
								<a href="index.php?act=thoat" style="padding-right: 30px;">
									<i class="fa fa-sign-out" style="font-size:30px; color:black"></i>
								</a>
							</div>
						</div>
					</div>


					<!-- Script jQuery -->
					<script>
						$(document).ready(function() {
							$('.additional-links').hide(); // Ẩn phần các liên kết khi trang tải

							$('.image-info').click(function() {
								$('.additional-links').slideToggle(); // Di chuyển phần các liên kết lên/xuống khi click vào .image-info
							});
						});
					</script>

					<!-- Nếu session tồn tại --> <?php else : ?>
					<!-- Nếu session không tồn tại -->
					<a href="index.php?act=confirm" style="padding-right: 30px;"><i class="fa fa-shopping-cart" style="font-size:36px; color:black"></i></a>
					<button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#loginModel">Login </button>
					<button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal" data-bs-target="#registerModel">Register </button>
				<?php endif; ?>
			</div>

		</div>
	</div>
</nav>

<div class="modal fade" id="loginModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="index.php?act=login" method="POST">
				<div class="modal-header">
					<h5 class="modal-title d-flex align-items-center">
						<i class="bi bi-person-circle fs-3 me-2">Đăng Nhập</i>
					</h5>
					<button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="mb-3">
						<label class="form-label">Tên Đăng Nhập</label>
						<input type="text" class="form-control shadow-none" name="ten_dn">
					</div>
					<div class="mb-4">
						<label class="form-label">Mật Khẩu</label>
						<input type="password" class="form-control shadow-none" name="mat_khau">
					</div>
					<span class="text-danger"><?php echo isset($loi["dangnhap"]) ? $loi["dangnhap"] : "" ?></span>
					<div class="d-flex align-items-center justify-content-between mb-2">
						<input type="submit" class="btn btn-dark shadow-none" name="login" value="Đăng Nhập">
						<a href="JavaScript: void(0)" data-bs-toggle="modal" data-bs-target="#forgotPasswordModel" data-bs-dismiss="modal" class="text-secondary text-decoration-none">Quên Mật Khẩu?</a>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
					<!-- <button type="button" class="btn btn-primary">Understood</button> -->
				</div>
			</form>
		</div>
	</div>
</div>
<?php
if (isset($loi["dangnhap"]) && !empty($loi["dangnhap"])) {
	echo '<script>
  // Đoạn mã JavaScript để hiển thị modal khi trang web được tải
  window.onload = function() {
	  var modal = new bootstrap.Modal(document.getElementById(\'loginModel\'), {
		  backdrop: \'static\',
		  keyboard: false
	  });
	  modal.show();
  };
  </script>';
}
?>
<!-- Modal for Forgot Password -->


<div class="modal fade" id="forgotPasswordModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="index.php?act=forgot_password" method="POST">
				<div class="modal-header">
					<h5 class="modal-title d-flex align-items-center">
						<i class="bi bi-person-circle fs-3 me-2">Quên Mật Khẩu</i>
					</h5>
					<button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="mb-3">
						<label class="form-label">Email</label>
						<input type="email" id="emailInput" class="form-control shadow-none" name="email">
						<span class="text-danger"><?php echo isset($loi["email"]) ? $loi["email"] : "" ?></span>

					</div>
					<!-- Add additional fields or customization for forgot password form if needed -->
					<!-- Example: <div class="mb-4">...</div> -->
					<div class="d-flex align-items-center justify-content-between mb-2">
						<input type="submit" class="btn btn-dark shadow-none" name="forgot_password" value="Gửi Yêu Cầu">
						<a href="JavaScript: void(0)" class="text-secondary text-decoration-none" data-bs-toggle="modal" data-bs-target="#loginModel" data-bs-dismiss="modal">Đăng Nhập</a>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php
if (isset($loi["email"]) && !empty($loi["email"])) {
	echo '<script>
  // Đoạn mã JavaScript để hiển thị modal khi trang web được tải
  window.onload = function() {
	  var modal = new bootstrap.Modal(document.getElementById(\'forgotPasswordModel\'), {
		  backdrop: \'static\',
		  keyboard: false
	  });
	  modal.show();
  };
  </script>';
}
?>

<div class="modal fade" id="registerModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<form action="index.php?act=singin" method="POST" enctype="multipart/form-data">
				<div class="modal-header">
					<h5 class="modal-title d-flex align-items-center">
						<i class="bi bi-person-lines-fill fs-3 me-2">Đăng Ký Khách Hàng</i>
					</h5>
					<button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<!-- <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">Lưu ý: Thông tin chi tiết của bạn phải khớp với ID của bạn (thẻ cccd, hộ chiếu, giấy phép lái xe, v.v.) sẽ được yêu cầu trong khi nhận phòng.
    			</span> -->
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-6 ps-0 mb-3">
								<label class="form-label">Họ & Tên</label>
								<input type="text" class="form-control shadow-none" name="name">
							</div>
							<div class="col-md-6 ps-0 mb-3">
								<label class="form-label">Tên Đăng Nhập</label>
								<input type="text" class="form-control shadow-none" name="ten_dn">
								<span class="text-danger"><?php echo isset($loi["ten"]) ? $loi["ten"] : "" ?></span>
							</div>
							<div class="col-md-6 ps-0 mb-3">
								<label class="form-label">Email</label>
								<input type="email" class="form-control shadow-none" name="email">
							</div>
							<div class="col-md-6 ps-0 mb-3">
								<label class="form-label">Mật Khẩu</label>
								<input type="passport" class="form-control shadow-none" name="password">
							</div>
							<div class="col-md-6 ps-0">
								<label class="form-label">Nhập Lại Mật Khẩu</label>
								<input type="passport" class="form-control shadow-none" name="nhap_lai_password">
								<span class="text-danger"><?php echo isset($loi["mk"]) ? $loi["mk"] : "" ?></span>
							</div>
							<div class="col-md-6 ps-0 mb-3">
								<label class="form-label">Hình</label>
								<input type="file" class="form-control shadow-none" name="hinh">
							</div>
							<div class="text-center my-1">
								<input type="submit" class="btn btn-dark shadow-none" value="Đăng Ký" name="singin">
							</div>
						</div>
					</div>
			</form>
		</div>
	</div>
</div>
<?php
if (isset($loi["loianh"]) && !empty($loi["loianh"]) || isset($loi["ten"]) && !empty($loi["ten"]) || isset($loi["mk"]) && !empty($loi["mk"])) {
	echo '<script>
  // Đoạn mã JavaScript để hiển thị modal khi trang web được tải
  window.onload = function() {
	  var modal = new bootstrap.Modal(document.getElementById(\'registerModel\'), {
		  backdrop: \'static\',
		  keyboard: false
	  });
	  modal.show();
  };
  </script>';
}
?>
</div>