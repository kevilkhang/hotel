<style>
    /* Đặt các nút cùng một hàng ngang */
    .xacnhanhuy form {
        display: inline-block;
        margin-right: 10px;
    }

    /* Định dạng cho nút Xác nhận */
    .xac_nhan {
        background-color: green;
        color: white;
        border: none;
        padding: 8px 16px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        cursor: pointer;
    }

    /* Định dạng cho nút Hủy đơn phòng */
    .huy_donphong {
        background-color: red;
        color: white;

        border: none;
        padding: 8px 16px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        cursor: pointer;
    }

    /* Định dạng cho nút Xác nhận thanh toán */
    .xac_nhan_thanh_toan {
        background-color: blue;
        color: white;
        border: none;
        padding: 8px 16px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        cursor: pointer;
    }

    .da_tra_phong:hover {
        background-color: #45a049;
    }

    /* Active style */
    .da_tra_phong:active {
        transform: translateY(1px);
    }

    .da_tra_phong {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 8px 16px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        cursor: pointer;
    }

    /* Hover style */
    .xac_nhan_thanh_toan:hover {
        background-color: navy;
    }

    /* Active style */
    .xac_nhan_thanh_toan:active {
        transform: translateY(1px);
    }
</style>
<div class="form-container1">
    <h1 class="admin__list-title">DANH SÁCH ĐƠN PHÒNG</h1>
    <div class="admin__list-table">
        <table class="admin__table">
            <tr>
                <th>STT</th>
                <th>THÔNG TIN KHÁCH HÀNG</th>
                <th>PHÒNG</th>
                <th>THÔNG TIN PHÒNG ĐẶT</th>
                <th>CẬP NHẬT TRẠNG THÁI</th>
                <th></th>
            </tr>
            <?php $soThuTu = 1; ?>
            <?php foreach ($danhsach_donphong as $donphong) {
                extract($donphong);
                $id_phong = $donphong['id_phong'];
                $tong = number_format((int)$donphong['tong_tien'], 0, '.', '.');
                $phong = sua_phong($id_phong);
                extract($phong);
                $ten_phong = lay_ten_loaiphong($phong['ma_loaiphong']);
                $gia = number_format((int)$phong['gia_phong'], 0, '.', '.');

            ?>
                <tr>
                    <td><?php echo $soThuTu; ?></td>
                    <td>
                        <span style=" font-weight: bold;" style=" font-weight: bold;">ID Đặt Phòng: </span>BLT_000<?php echo $donphong['id']; ?><br>
                        <span style=" font-weight: bold;">Tên: </span><?php echo $donphong['ho_ten']; ?><br>
                        <span style=" font-weight: bold;">Điện thoại: </span><?php echo $donphong['sdt']; ?><br>
                        <span style=" font-weight: bold;">Số CCCD: </span><?php echo $donphong['cccd']; ?><br>
                    </td>
                    <td>
                        <span style=" font-weight: bold;">Phòng: </span><?php echo $ten_phong; ?><br>
                        <span style=" font-weight: bold;">Giá: </span><?php echo $gia; ?> VNĐ<br>
                        <span style=" font-weight: bold;">Tổng tiền: </span><?php echo $tong; ?> VNĐ<br>
                    </td>
                    <td>
                        <span style=" font-weight: bold;">Ngày vào: </span><?php echo $donphong['ngay_nhanphong']; ?> <br>
                        <span style=" font-weight: bold;">Ngày trả: </span><?php echo $donphong['ngay_traphong']; ?> <br>
                        <span style=" font-weight: bold;">Thời gian ở: </span><?php echo $donphong['so_ngay_o']; ?> Ngày<br>
                        <?php if ($donphong['trang_thai_don_phong'] == 0) : ?>
                            <span style=" font-weight: bold;">Ngày đặt: </span><?php echo $donphong['ngay_datphong']; ?> <br>
                        <?php elseif ($donphong['trang_thai_don_phong'] == 1) : ?>
                            <span style=" font-weight: bold;">Thời gian còn lại: </span><?php
                                                                                        $soNgayDenNgay = tinhSoNgayDenNgay($donphong['ngay_traphong']);
                                                                                        if ($soNgayDenNgay <= 0) {
                                                                                            echo "Đã hết hạn";
                                                                                        } else {
                                                                                            echo $soNgayDenNgay . ' ngày';
                                                                                        }
                                                                                        ?>
                            <br>
                        <?php endif; ?>

                    </td>
                    <td>
                        <?php if ($donphong['trang_thai_don_phong'] == 0) : ?>
                            <div class="xacnhanhuy">
                                <form action="index.php?act=xac_nhan" method="post">
                                    <input type="hidden" name="id_donphong" value="<?= $donphong["id"] ?>">
                                    <input class="xac_nhan" type="submit" onclick="xacnhandonphong()" value="Xác nhận" name="xac_nhan_donphong">
                                </form>
                                <form action="index.php?act=huy_donphong" method="post">
                                    <input type="hidden" name="id_donphong" value="<?= $donphong["id"] ?>">
                                    <input class="huy_donphong" type="submit" onclick="huy_donphong()" value="Hủy đơn phòng" name="huy_donphong">
                                </form>
                            </div>
                        <?php elseif ($donphong['trang_thai_don_phong'] == 1) : ?>
                            <div class="xacnhanhuy">
                                <form action="index.php?act=xac_nhan_thanh_toan" method="post">
                                    <input type="hidden" name="id_donphong" value="<?= $donphong["id"] ?>">
                                    <input class="xac_nhan_thanh_toan" type="submit" onclick="xacnhanthanhtoan()" value="Xác nhận thanh toán" name="xac_nhan_thanh_toan">
                                </form>
                                <form action="index.php?act=huy_donphong" method="post">
                                    <input type="hidden" name="id_donphong" value="<?= $donphong["id"] ?>">
                                    <input class="huy_donphong" type="submit" onclick="huydatphong()" value="Hủy đặt phòng" name="huy_dat_phong">
                                </form>
                            </div>
                        <?php elseif ($donphong['trang_thai_don_phong'] == 2) : ?>
                            <div class="xacnhanhuy">
                                <form action="index.php?act=datraphong" method="post">
                                    <input type="hidden" name="id_donphong" value="<?= $donphong["id"] ?>">
                                    <input class="da_tra_phong" type="submit" onclick="datraphong()" value="Đã trả phòng" name="da_tra_phong">
                                </form>
                            </div>
                        <?php endif; ?>

                    </td>
                </tr>
                <?php $soThuTu++; ?>
            <?php } ?>
        </table>
        <script>
            function xacnhandonphong() {
                alert("Đã xác nhận ĐƠN PHÒNG.");
            }

            function huy_donphong() {
                alert("Đã hủy ĐƠN PHÒNG.");
            }

            function xacnhanthanhtoan() {
                alert("Đã xác nhận thanh toán.");
            }

            function datraphong() {
                alert("Đã trả phòng.");
            }
        </script>
    </div>
</div>