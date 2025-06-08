<?php
session_start();
if (isset($_SESSION['khach_hang'])) {
    $id_khachhang = $_SESSION['khach_hang']['id'];
}
include "../model/pdo.php";
include "../model/binhluan.php";
include "../model/danhgia.php";
$id_phong = $_REQUEST['idpro'];
$show_binhluan = list_binhluan_phong($id_phong);
?>

<div class="comment-container">
  <h3 class="mb-4">Nội Dung Bình Luận</h3>
  <?php
  $comment_count = 0;
  foreach ($show_binhluan as $binhluan2) {
      extract($binhluan2);
      $ten_khachhang = lay_ten_khachhang($id_khachhang);
      if ($trang_thai == 0) {
          echo "<div class='comment d-flex align-items-start mb-3 p-3 bg-light rounded'>";
          echo "<p class='text-muted me-3 mb-0'><small>($ngay_bl)</small></p>";
          echo "<div>";
          echo "<p class='fw-bold mb-1'>$ten_khachhang:</p>";
          echo "<p class='mb-0'>$noi_dung</p>";
          echo "</div>";
          echo "</div>";
      }
      $comment_count++;
  }
  if ($comment_count == 0) {
      echo "<p class='text-muted'>Sản phẩm chưa có bình luận.</p>";
  }
  ?>

  <?php
  if (isset($_SESSION['khach_hang'])) {
      echo '<form id="comment-form" action="' . $_SERVER['PHP_SELF'] . '" method="post" class="d-flex align-items-center mb-3">';
      echo '<input type="hidden" name="id_phong" value="' . $id_phong . '">';
      echo '<input type="hidden" name="id_khachhang" value="' . $id_khachhang . '">';
      echo '<input type="text" class="form-control me-2" id="comment" name="noidung" placeholder="Viết bình luận..." required>';
      echo '<input type="submit" name="gui_binhluan" value="Gửi" class="btn btn-primary">';
      echo '</form>';
  } else {
      echo 'Vui lòng <span class="text-primary fw-bold" data-bs-toggle="modal" data-bs-target="#loginModel">đăng nhập</span> để bình luận.';
  }
  ?>

  <?php
  if (isset($_POST['gui_binhluan']) && ($_POST['gui_binhluan'])) {
      $noi_dung = $_POST['noidung'];
      $id_phong = $_POST['id_phong'];
      $id_khachhang = $_POST['id_khachhang'];
      date_default_timezone_set('Asia/Ho_Chi_Minh');
      $ngay_bl = date('H:i:s d/m/Y');
      them_binhluan($noi_dung, $id_phong, $id_khachhang, $ngay_bl);
      header("location:" . $_SERVER['HTTP_REFERER']);
  }
  ?>
</div>

<style>
  .comment-container {
      width: 100%;
      max-width: 1300px;
      margin: 0 auto;
      padding: 20px;
  }

  .comment {
      border-bottom: 1px solid #eee;
  }

  .form-control {
      border-radius: 5px;
      border: 1px solid #ced4da;
      padding: 10px;
      font-size: 14px;
  }

  .form-control:focus {
      border-color: var(--secondary);
      box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
  }

  .btn-primary {
      padding: 10px 20px;
      border-radius: 5px;
  }
</style>