<!DOCTYPE html>
<html>

<head>
    <title>Hotel Booking Website</title>
    <?php require('inc/links.php'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" type="text/css" href="css/common.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>


</head>

<body>
    <?php require('inc/header.php'); ?>
    <?php
    if (is_array($list_danhgia)) {
        extract($list_danhgia);
        $id_phong = $list_danhgia['id_phong'];
        $phong = sua_phong($id_phong);
        extract($phong);
        if (is_file("upload/" . $hinh)) {
            $hinhxuat = "<img src='upload/" . $hinh . "' alt='Main Image' class='card-img-top'>";
        } else {
            $hinhxuat = "no photo";
        }
        $ten_phong = lay_ten_loaiphong($phong['ma_loaiphong']);
        $gia = number_format((int)$phong['gia_phong'], 0, '.', '.');
        if (isset($_SESSION['khach_hang'])) {
            $id_Khachhang = $_SESSION['khach_hang']['id'];
        }
    } ?>
    <div class="danhgia">
        <div class="card border-0 shadow" style="max-width: 430px; margin: auto;">
            <?= $hinhxuat ?>
            <div class="card-body">
                <h5 class="card-title"><?= $ten_phong ?> </h5>
                <h6 class="mb-4"><?= $gia ?> VNĐ mỗi đêm </h6>
            </div>
        </div>
        <form action="index.php?act=danhgia_gui" method="post">
            <label for="">Đánh Giá:</label> <br>
            <div class="rating">
                <input value="5" name="rate" id="star5" type="radio" checked>
                <label title="text" for="star5"></label>
                <input value="4" name="rate" id="star4" type="radio">
                <label title="text" for="star4"></label>
                <input value="3" name="rate" id="star3" type="radio">
                <label title="text" for="star3"></label>
                <input value="2" name="rate" id="star2" type="radio">
                <label title="text" for="star2"></label>
                <input value="1" name="rate" id="star1" type="radio">
                <label title="text" for="star1"></label>
            </div>
            <br>
            <label for="">Ghi Chú:</label> <br>
            <textarea name="noidung" id="" cols="50" rows="0"></textarea> <br>
            <input type="hidden" name="id_phong" value="<?= $phong['id'] ?>">
            <input type="hidden" name="id_Khachhang" value="<?= $id_Khachhang ?>">
            <input type="hidden" name="id_donphong" value="<?= $list_danhgia['id']; ?>">
            <input type="submit" value="Gửi" name="danh_gia" class="btn btn-sm text-white bg-primary shadow-none">
        </form>
    </div>
</body>

</html>
<style>
    .danhgia {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        /* height: 80vh; */
        margin-top: 20px;
    }

    .rating {
        position: relative;
        display: inline-block;
        font-size: 0;
    }

    .rating:not(:checked)>input {
        position: absolute;
        appearance: none;
    }

    .rating:not(:checked)>label {
        float: right;
        cursor: pointer;
        font-size: 30px;
        color: #666;
    }

    .rating:not(:checked)>label:before {
        content: '★';
    }

    .rating>input:checked+label:hover,
    .rating>input:checked+label:hover~label,
    .rating>input:checked~label:hover,
    .rating>input:checked~label:hover~label,
    .rating>label:hover~input:checked~label {
        color: #e58e09;
    }

    .rating:not(:checked)>label:hover,
    .rating:not(:checked)>label:hover~label {
        color: #ff9e0b;
    }

    .rating>input:checked~label {
        color: #ffa723;
    }
</style>