<style>
	.navbar {
		background-color: var(--primary);
	}

	.navbar-brand, .nav-link {
  color: #fff;
  transition: color 0.3s;
	}

	.nav-link:hover {
		color: var(--secondary) !important;
	}

	.dropdown-menu {
		background-color: #fff;
		border: none;
		box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
	}

	.dropdown-item {
		color: var(--dark);
	}

	.dropdown-item:hover {
		background-color: var(--light);
	}

	.round-image {
		width: 40px;
		height: 40px;
		border-radius: 50%;
		object-fit: cover;
	}

	@media (max-width: 768px) {
  .navbar-collapse {
    display: none;
  }
  .navbar-toggler {
    display: block;
  }
</style>
<nav class="navbar navbar-expand-lg navbar-dark px-lg-3 py-lg-2 shadow-sm sticky-top">
	<div class="container-fluid">
		<a class="navbar-brand fw-bold fs-3 h-font" href="index.php">Hotel Booking</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item"><a class="nav-link" href="index.php">Trang Chủ</a></li>
				<li class="nav-item"><a class="nav-link" href="index.php?act=rooms">Phòng</a></li>
				<li class="nav-item"><a class="nav-link" href="index.php?act=news">Tin Tức</a></li>
				<li class="nav-item"><a class="nav-link" href="index.php?act=contact">Liên Hệ</a></li>
				<li class="nav-item"><a class="nav-link" href="index.php?act=about">Giới Thiệu</a></li>
			</ul>
			<div class="d-flex align-items-center">
				<?php if (isset($_SESSION['khach_hang'])) : ?>
					<a href="index.php?act=confirm" class="text-white me-3"><i class="fa fa-shopping-cart fs-4"></i></a>
					<div class="dropdown">
						<a class="dropdown-toggle text-white d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<span class="me-2"><?php echo $_SESSION['khach_hang']['ho_ten']; ?></span>
							<img src="upload/<?php echo $_SESSION['khach_hang']['hinh']; ?>" alt="Profile" class="round-image">
						</a>
						<ul class="dropdown-menu">
							<?php if ($_SESSION['khach_hang']['vai_tro'] == 1) { ?>
								<li><a class="dropdown-item" href="admin/index.php" target="alo">Trang Quản Trị</a></li>
							<?php } ?>
							<li><a class="dropdown-item" href="index.php?act=capnhat">Cập Nhật</a></li>
							<li><a class="dropdown-item" href="index.php?act=doimk">Đổi Mật Khẩu</a></li>
							<li><a class="dropdown-item" href="index.php?act=thoat"><i class="fa fa-sign-out me-2"></i>Đăng Xuất</a></li>
						</ul>
					</div>
				<?php else : ?>
					<a href="index.php?act=confirm" class="text-white me-3"><i class="fa fa-shopping-cart fs-4"></i></a>
					<button type="button" class="btn btn-outline-light me-2" data-bs-toggle="modal" data-bs-target="#loginModel">Đăng Nhập</button>
					<button type="button" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#registerModel">Đăng Ký</button>
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
					<h5 class="modal-title"><i class="bi bi-person-circle fs-4 me-2"></i>Đăng Nhập</h5>
					<button type="reset" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="mb-3"><label class="form-label">Tên Đăng Nhập</label><input type="text" class="form-control" name="ten_dn"></div>
					<div class="mb-3"><label class="form-label">Mật Khẩu</label><input type="password" class="form-control" name="mat_khau"></div>
					<span class="text-danger"><?php echo isset($loi["dangnhap"]) ? $loi["dangnhap"] : ""; ?></span>
					<div class="d-flex justify-content-between">
						<input type="submit" class="btn btn-primary" name="login" value="Đăng Nhập">
						<a href="#" data-bs-toggle="modal" data-bs-target="#forgotPasswordModel" data-bs-dismiss="modal" class="text-primary">Quên Mật Khẩu?</a>
					</div>
				</div>
				<div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button></div>
			</form>
		</div>
	</div>
</div>
<?php if (isset($loi["dangnhap"]) && !empty($loi["dangnhap"])) { echo '<script>window.onload = function() { new bootstrap.Modal(document.getElementById(\'loginModel\')).show(); };</script>'; } ?>

<div class="modal fade" id="forgotPasswordModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="index.php?act=forgot_password" method="POST">
				<div class="modal-header">
					<h5 class="modal-title"><i class="bi bi-person-circle fs-4 me-2"></i>Quên Mật Khẩu</h5>
					<button type="reset" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="mb-3"><label class="form-label">Email</label><input type="email" class="form-control" name="email"><span class="text-danger"><?php echo isset($loi["email"]) ? $loi["email"] : ""; ?></span></div>
					<div class="d-flex justify-content-between">
						<input type="submit" class="btn btn-primary" name="forgot_password" value="Gửi Yêu Cầu">
						<a href="#" data-bs-toggle="modal" data-bs-target="#loginModel" data-bs-dismiss="modal" class="text-primary">Đăng Nhập</a>
					</div>
				</div>
				<div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button></div>
			</form>
		</div>
	</div>
</div>
<?php if (isset($loi["email"]) && !empty($loi["email"])) { echo '<script>window.onload = function() { new bootstrap.Modal(document.getElementById(\'forgotPasswordModel\')).show(); };</script>'; } ?>

<div class="modal fade" id="registerModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form action="index.php?act=singin" method="POST" enctype="multipart/form-data">
				<div class="modal-header">
					<h5 class="modal-title"><i class="bi bi-person-lines-fill fs-4 me-2"></i>Đăng Ký</h5>
					<button type="reset" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="row g-3">
						<div class="col-md-6"><label class="form-label">Họ & Tên</label><input type="text" class="form-control" name="name"></div>
						<div class="col-md-6"><label class="form-label">Tên Đăng Nhập</label><input type="text" class="form-control" name="ten_dn"><span class="text-danger"><?php echo isset($loi["ten"]) ? $loi["ten"] : ""; ?></span></div>
						<div class="col-md-6"><label class="form-label">Email</label><input type="email" class="form-control" name="email"></div>
						<div class="col-md-6"><label class="form-label">Mật Khẩu</label><input type="password" class="form-control" name="password"></div>
						<div class="col-md-6"><label class="form-label">Nhập Lại Mật Khẩu</label><input type="password" class="form-control" name="nhap_lai_password"><span class="text-danger"><?php echo isset($loi["mk"]) ? $loi["mk"] : ""; ?></span></div>
						<div class="col-md-6"><label class="form-label">Hình</label><input type="file" class="form-control" name="hinh"></div>
						<div class="col-12 text-center"><input type="submit" class="btn btn-primary" value="Đăng Ký" name="singin"></div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php if ((isset($loi["loianh"]) && !empty($loi["loianh"])) || (isset($loi["ten"]) && !empty($loi["ten"])) || (isset($loi["mk"]) && !empty($loi["mk"]))) { echo '<script>window.onload = function() { new bootstrap.Modal(document.getElementById(\'registerModel\')).show(); };</script>'; } ?>