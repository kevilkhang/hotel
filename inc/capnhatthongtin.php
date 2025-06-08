<?php
if (isset($_SESSION['khach_hang']) && (is_array($_SESSION['khach_hang']))) {
    extract($_SESSION['khach_hang']);
    $hinh_anh = "<img src='upload/" . $hinh . "' width='70' class='round-image'>";
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Hotel Booking</title>
    <!-- CSS only -->
    <?php require('inc/links.php'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" type="text/css" href="css/common.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <style>
        .box {
            border-top-color: var(--teal) !important;
        }

        .form-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            margin-top: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .form-group {
            margin-bottom: 10px;
        }

        .form-label {
            text-align: left;
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .form-input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .form-error {
            color: red;
        }

        .form-button-reset {
            padding: 10px 10px;
            background-color: #ccc;
            color: #333;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;

        }

        .form-button-reset:hover {
            background-color: #999;
        }

        .form-button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>

</head>

<body>

    <?php require('inc/header.php'); ?>
    <div class="form-container">
        <h1 class="form-title">CẬP NHẬT TÀI KHOẢN</h1>
        <form action="index.php?act=capnhat" method="POST" enctype="multipart/form-data" class="add-loai-hang-form">
            <div class="form-group">
                <label for="tenlh_bottom" class="form-label">Họ tên</label>
                <input type="text" name="ho_ten" class="form-input" value="<?= $ho_ten ?>" required>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="form-label">Tên đăng nhâp:</label>
                <input type="text" name="ten_dn" class="form-input" value="<?= $ten_dn ?>" required>
                <span class="form-error"><?php echo isset($loi["ten"]) ? $loi["ten"] : "" ?></span>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="form-label">Email:</label>
                <input type="email" placeholder="Email" name="email" class="form-input" value="<?= $email ?>" required>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="form-label">Số điện thoại:</label>
                <input type="tel" id="phone" name="phone" value="<?= $sdt ?>" class="form-input" required>
                <span id="error-message" style="color: red; display: none;">Số điện thoại không hợp lệ. Vui lòng nhập lại.</span>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="form-label">Ảnh đại điện:</label>
                <input type="file" name="hinh" class="form-input">
                <label class="form-label"><?php echo $hinh_anh; ?></label>
                <span class="form-error"><?php echo isset($loi["loianh"]) ? $loi["loianh"] : "" ?></span>
            </div>
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="hidden" name="ten_dncu" value="<?= $ten_dn ?>">
            <input type="hidden" name="mat_khau" value="<?= $mat_khau ?>">
            <span> <?php
                    if (isset($thongbao) && ($thongbao != "")) {
                        echo $thongbao;
                    }
                    ?></span> <br>
            <input onclick="kiemTraSoDienThoai()" type="submit" name="capnhatthongtin" class="form-button" value="Cập Nhật">
            <input type="reset" value="Nhập lại" class="form-button-reset">
            <span class="form-error"><?php echo isset($loi["thanhcong"]) ? $loi["thanhcong"] : "" ?></span>
        </form>
    </div>
    <script>
        function kiemTraSoDienThoai() {
            var input = document.getElementById("phone");
            var phoneNumber = input.value;
            var errorSpan = document.getElementById("error-message");
            // Sử dụng regex để kiểm tra số điện thoại
            var phoneRegex = /^0[0-9]{9}$/;

            if (phoneRegex.test(phoneNumber)) {
                errorSpan.style.display = "none"; // Ẩn thông báo lỗi
            } else {
                errorSpan.style.display = "block"; // Hiển thị thông báo lỗi
                input.value = ""; // Xóa nội dung không hợp lệ
            }
        }
    </script>


</body>

</html>