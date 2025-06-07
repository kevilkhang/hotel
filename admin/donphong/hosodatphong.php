<style>
    .choxacnhan {
        display: inline-block;
        padding: 5px 10px;
        background-color: #3498db;
        color: #fff;
        border-radius: 4px;
        font-weight: bold;
        text-transform: uppercase;
        text-align: center;
        text-decoration: none;
        transition: background-color 0.3s ease-in-out;
    }

    .daxacnhan {
        background-color: #0033FF;
        display: inline-block;
        padding: 5px 10px;
        color: #fff;
        border-radius: 4px;
        font-weight: bold;
        text-transform: uppercase;
        text-align: center;
        text-decoration: none;
        transition: background-color 0.3s ease-in-out;
    }

    .danhanphong {
        margin-bottom: 5px;
        background-color: #00CC00;
        display: inline-block;
        padding: 5px 10px;
        color: #fff;
        border-radius: 4px;
        font-weight: bold;
        text-transform: uppercase;
        text-align: center;
        text-decoration: none;
        transition: background-color 0.3s ease-in-out;
    }

    .chodanhgia {
        background-color: #ff8800;
        display: inline-block;
        padding: 5px 10px;
        color: #fff;
        border-radius: 4px;
        font-weight: bold;
        text-transform: uppercase;
        text-align: center;
        text-decoration: none;
        transition: background-color 0.3s ease-in-out;
    }

    .datraphong {
        background-color: #33CCCC;
        display: inline-block;
        margin-bottom: 5px;
        padding: 5px 10px;
        color: #fff;
        border-radius: 4px;
        font-weight: bold;
        text-transform: uppercase;
        text-align: center;
        text-decoration: none;
        transition: background-color 0.3s ease-in-out;
    }

    .dahuyphong {
        background-color: red;
        display: inline-block;
        padding: 5px 10px;
        color: #fff;
        border-radius: 4px;
        font-weight: bold;
        text-transform: uppercase;
        text-align: center;
        text-decoration: none;
        transition: background-color 0.3s ease-in-out;
    }

    .dadanhgia {
        background-color: #008000;
        display: inline-block;
        padding: 5px 10px;
        color: #fff;
        border-radius: 4px;
        font-weight: bold;
        text-transform: uppercase;
        text-align: center;
        text-decoration: none;
        transition: background-color 0.3s ease-in-out;
    }

    .dathanhtoan {
        margin-bottom: 5px;
        background-color: #4CAF50;
        display: inline-block;
        padding: 5px 10px;
        color: #fff;
        border-radius: 4px;
        font-weight: bold;
        text-transform: uppercase;
        text-align: center;
        text-decoration: none;
        transition: background-color 0.3s ease-in-out;
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
                <th>TRẠNG THÁI</th>
                <th></th>
            </tr>
            <?php $soThuTu = 1; ?>
            <?php foreach ($danhsach_donphong as $donphong) {
                extract($donphong);
                $id_phong = $donphong['id_phong'];
                $phong = sua_phong($id_phong);
                extract($phong);
                $ten_phong = lay_ten_loaiphong($phong['ma_loaiphong']);
            ?>
                <tr>
                    <td><?php echo $soThuTu; ?></td>
                    <td>
                        <span>ID Đặt Phòng: BLT_000</span><?php echo $donphong['id']; ?><br>
                        <span>Tên :</span><?php echo $donphong['ho_ten']; ?><br>
                        <span>Điện thoại :</span><?php echo $donphong['sdt']; ?><br>
                    </td>
                    <td>
                        <span>Phòng :</span><?php echo $ten_phong; ?><br>
                        <span>Giá :</span><?php echo $phong['gia_phong']; ?><br>
                    </td>
                    <td>
                        <span>Ngày vào:</span><?php echo $donphong['ngay_nhanphong']; ?> <br>
                        <span>Ngày trả:</span><?php echo $donphong['ngay_traphong']; ?> <br>
                        <span>Ngày đặt phòng:</span><?php echo $donphong['ngay_datphong']; ?> <br>
                        <?php if ($donphong['trang_thai_don_phong'] == 2 || $donphong['trang_thai_don_phong'] == 3 || $donphong['trang_thai_don_phong'] == 5) : ?>
                            <span>Thanh toán:</span><?php echo $donphong['tong_tien']; ?> VNĐ <br>
                        <?php else : ?>
                            <span>Thanh toán:</span> 0 VNĐ <br>
                        <?php endif; ?>

                    </td>
                    <td>
                        <?php
                        $result = getTrangThaiMessageAndClass($donphong['trang_thai_don_phong']);
                        $span1 = $result['span1'];
                        $span2 = $result['span2'];
                        echo $span1;
                        if (!empty($span2)) {
                            echo $span2;
                        }
                        ?>

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