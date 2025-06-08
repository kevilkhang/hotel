<?php
if (isset($_SESSION['khach_hang']) && (is_array($_SESSION['khach_hang']))) {
    extract($_SESSION['khach_hang']);
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
        <h1 class="form-title">ĐỔI MẬT KHẨU</h1>
        <form action="index.php?act=doimk" method="POST" class="add-loai-hang-form">
            <div class="form-group">
                <label for="tenlh_bottom" class="form-label">Nhập mât khẩu cũ:</label>
                <input type="text" name="mk_cu" class="form-input" required>
                <span class="form-error"><?php echo isset($loi["mkcu"]) ? $loi["mkcu"] : "" ?></span>

            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="form-label">Nhập mật khẩu mới:</label>
                <input type="password" name="mk_moi" class="form-input" required>
                <span class="form-error"><?php echo isset($loi["mk_cu==moi"]) ? $loi["mk_cu==moi"] : "" ?></span>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="form-label">Xác nhận mật khẩu mới:</label>
                <input type="password" name="xacnhan_mk_moi" class="form-input" required>
                <span class="form-error"><?php echo isset($loi["xacnhanmk"]) ? $loi["xacnhanmk"] : "" ?></span>
            </div>
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="hidden" name="mat_khaucu" value="<?= $mat_khau ?>">
            <input type="hidden" name="ten_dn" value="<?= $ten_dn ?>">
            <span> <?php
                    if (isset($thongbao) && ($thongbao != "")) {
                        echo $thongbao;
                    }
                    ?></span> <br>
            <input type="submit" name="doi_mk" class="form-button" value="Đổi Mật Khẩu">
            <input type="reset" value="Nhập lại" class="form-button-reset">
        </form>
    </div>


</body>

</html>