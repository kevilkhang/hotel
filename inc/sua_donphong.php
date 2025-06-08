<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hotel Booking</title>
    <!-- CSS only -->
    <?php require('inc/links.php'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" type="text/css" href="css/common.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <style>
        .product {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .thumbnails {
            display: flex;
        }

        .thumbnail {
            padding-top: 10px;
            max-width: 137px;
            cursor: pointer;
        }

        .main-image img {
            max-width: 560px;
        }

        .main-image .prev,
        .main-image .next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .main-image .prev {
            left: 10px;
        }

        .main-image .next {
            right: 10px;
        }
    </style>
</head>

<body>
    <?php
    if (is_array($list_donphong)) {
        extract($list_donphong);
        $dateString1 = $list_donphong['ngay_nhanphong'];
        $dateTime = DateTime::createFromFormat('d/m/Y', $dateString1);
        $newDateFormat1 = $dateTime->format('Y-m-d');

        $dateString2 = $list_donphong['ngay_traphong'];
        $dateTime = DateTime::createFromFormat('d/m/Y', $dateString2);
        $newDateFormat2 = $dateTime->format('Y-m-d');

        $id_phong = $list_donphong['id_phong'];
        $phong = sua_phong($id_phong);
        extract($phong);
        if (is_file("upload/" . $hinh)) {
            $hinhxuat = "<img src='upload/" . $hinh . "' alt='Main Image'>";
        } else {
            $hinh = "no photo";
        }
        $ten_phong = lay_ten_loaiphong($phong['ma_loaiphong']);
        $gia = number_format((int)$phong['gia_phong'], 0, '.', '.');
        $giajs = $phong['gia_phong'];
    }
    ?>
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">SỬA ĐƠN PHÒNG PHÒNG</h2>

        <div class="h-line bg-dark"></div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4">
                    <div class="product">
                        <div class="main-image">
                            <?php echo $hinhxuat ?>
                        </div>
                        <div class="image-gallery">
                            <img class="thumbnail" src="images/rooms/IMG_11892.png" alt="Thumbnail 1">
                            <img class="thumbnail" src="images/rooms/IMG_39782.png" alt="Thumbnail 2">
                            <img class="thumbnail" src="images/rooms/IMG_11892.png" alt="Thumbnail 3">
                            <img class="thumbnail" src="images/rooms/IMG_11892.png" alt="Thumbnail 4">
                        </div>
                    </div>
                    <div id="room">
                        <h5 id="name-room"><?php echo $ten_phong ?></h5>
                        <p id="price"><?php echo $gia ?> VNĐ</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4">
                    <form action="index.php?act=capnhat_donphong" method="POST">
                        <h5>CHI TIẾT PHÒNG ĐẶT</h5>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 500;">Tên</label>
                            <input type="text" name="ho_ten" value="<?= $ho_ten ?>" class="form-control shadow-none">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 500;">Số Điện Thoại</label>
                            <input type="tel" name="sdt" value="<?= $sdt ?>" class="form-control shadow-none">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 500;">Số CCCD</label>
                            <input type="text" name="cccd" value="<?= $cccd ?>" class="form-control shadow-none">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 500;">Ngày Nhận Phòng</label>
                            <p class="form-label"><?= $ngay_nhanphong ?></p>
                            <input type="date"  value="<?= $newDateFormat1 ?>" name="ngay_nhanphong" class="form-control shadow-none" id="check-in-date" oninput="calculateStayAndPrice()">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 500;">Ngày Trả Phòng</label>
                            <p class="form-label"><?= $ngay_traphong ?></p>
                            <input type="date" value="<?= $newDateFormat2 ?>" name="ngay_traphong" class="form-control shadow-none" id="check-out-date" oninput="calculateStayAndPrice()">
                        </div>
                        <div>
                            <p id="stay-days">Số ngày đặt: <?= $so_ngay_o ?></p>
                            <p id="total-price">Tổng số tiền phải trả: <?= $tong_tien ?></p>
                        </div>
                        <input type="hidden" name="id_donphong" value="<?php echo $list_donphong['id']; ?>">
                        <input type="hidden" name="gia_phong" value="<?php echo $phong['gia_phong']; ?>">
                        <input type="submit" class="" name="sua_datphong" style="width: 565px; height:35px; border:none; border-radius:7px; color:white; background-color:#2cc9c9; " value="Cập Nhật">
                    </form>
                </div>
            </div>
        </div>
        <script>
            function calculateStayAndPrice() {
                const checkInDate = new Date(document.getElementById("check-in-date").value);
                const checkOutDate = new Date(document.getElementById("check-out-date").value);
                const oneDay = 24 * 60 * 60 * 1000;
                const stayDays = Math.round((checkOutDate - checkInDate) / oneDay);

                const roomPrice = <?php echo $giajs; ?>;
                // const roomPrice = document.querySelector('.price');
                const totalPrice = roomPrice * stayDays;

                document.getElementById("stay-days").textContent = `Số ngày đặt: ${stayDays} ngày`;
                document.getElementById("total-price").textContent = `Tổng số tiền phải trả: ${totalPrice} VNĐ`;
            }
        </script>
        <script>
            const thumbnails = document.querySelectorAll(".thumbnail");
            const mainImage = document.querySelector(".main-image img");

            thumbnails.forEach(thumbnail => {
                thumbnail.addEventListener("click", () => {
                    mainImage.src = thumbnail.src;
                });
            });
        </script>
</body>

</html>