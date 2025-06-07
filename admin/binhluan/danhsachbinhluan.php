<div class="form-container1">
    <h1 class="admin__list-title">DANH SÁCH Bình Luận</h1>
    <div class="admin__list-table">
        <?php if (!empty($list_binhluan)) : ?>
            <table class="admin__table">
                <tr>
                    <th>STT</th>
                    <th>HỌ TÊN</th>
                    <th>TÊN PHÒNG</th>
                    <th>NỘI DUNG</th>
                    <th>TRẠNG THÁI</th>
                    <th>HÀNH ĐỘNG</th>
                </tr>

                <?php $soThuTu = 1; ?>
                <?php foreach ($list_binhluan as $binhluan) {
                    extract($binhluan);
                    $ten_binhluan = lay_ten_khachhang($binhluan['id_khachhang']);
                    $phong = sua_phong($id_phong);
                    extract($phong);
                    $ten_phong = lay_ten_loaiphong($phong['ma_loaiphong']);
                ?>
                    <tr>
                        <td><?php echo $soThuTu; ?></td>
                        <td>
                            <span style=" font-weight: bold;">Ngày bình luận: </span><span><?php echo $binhluan['ngay_bl']; ?></span> <br>
                            <span style=" font-weight: bold;">Tên khách hàng: </span><span><?php echo $ten_binhluan; ?></span>
                        </td>
                        <td><?php echo $ten_phong; ?></td>
                        <td class="mota"><?php echo $binhluan['noi_dung']; ?></td>
                        <td>
                            <?php
                            if ($binhluan['trang_thai'] == 0) { ?>
                                <span class="danghien">Đang hiện</span>
                            <?php } else { ?>
                                <span class="dangan">Đang Ẩn</span>
                            <?php } ?>
                        </td>
                        <td>
                            <?php
                            if ($binhluan['trang_thai'] == 0) { ?>
                                <form action="index.php?act=an_binhluan" method="post">
                                    <input type="hidden" name="id_binhluan" value="<?= $binhluan['id'] ?>">
                                    <input class="an_binhluan" type="submit" onclick="an_binhluan()" value="Ẩn Bình Luận" name="an_binhluan">
                                </form>
                            <?php } else { ?>
                                <form action="index.php?act=hien_binhluan" method="post">
                                    <input type="hidden" name="id_binhluan" value="<?= $binhluan["id"] ?>">
                                    <input class="hien_binhluan" type="submit" onclick="hien_binhluan()" value="Hiện Bình Luận" name="hien_binhluan">
                                </form>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php $soThuTu++; ?>
                <?php } ?>
            </table>
        <?php else : ?>
            <p>Không có dữ liệu Bình Luận.</p>
        <?php endif; ?>
    </div>
</div>
<script>
    function hien_binhluan() {
        alert("Đã hiện Bình Luận.");
    }

    function an_binhluan() {
        alert("Đã ẩn Bình Luận.");
    }
</script>
<style>
    .danghien {
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

    .dangan {
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

    .an_binhluan {
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

    /* Hover style */
    .an_binhluan:hover {
        background-color: #BB0000;
    }

    /* Active style */
    .an_binhluan:active {
        transform: translateY(1px);
    }

    .hien_binhluan {
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

    /* Hover style */
    .hien_binhluan:hover {
        background-color: navy;
    }

    /* Active style */
    .hien_binhluan:active {
        transform: translateY(1px);
    }
</style>