<div class="form-container1">
    <h1 class="admin__list-title">DANH SÁCH ĐÁNH GIÁ</h1>
    <div class="admin__list-table">
        <?php if (!empty($list_danhgia)) : ?>
            <table class="admin__table">
                <tr>
                    <th>STT</th>
                    <th>HỌ TÊN</th>
                    <th>TÊN PHÒNG</th>
                    <th>NỘI DUNG</th>
                    <th>SỐ SAO</th>
                    <th>TRẠNG THÁI</th>
                    <th>HÀNH ĐỘNG</th>
                </tr>

                <?php $soThuTu = 1; ?>
                <?php foreach ($list_danhgia as $danhgia) {
                    extract($danhgia);
                    $ten_danhgia = lay_ten_khachhang($danhgia['id_khachhang']);
                    $phong = sua_phong($id_phong);
                    extract($phong);
                    $ten_phong = lay_ten_loaiphong($phong['ma_loaiphong']);
                ?>
                    <tr>
                        <td><?php echo $soThuTu; ?></td>
                        <td><?php echo $ten_danhgia; ?></td>
                        <td><?php echo $ten_phong; ?></td>
                        <td class="mota"><?php echo $danhgia['noi_dung']; ?></td>
                        <td class="mota"><?php echo $danhgia['so_sao']; ?></td>
                        <td>
                            <?php
                            if ($danhgia['trang_thai'] == 0) { ?>
                                <span class="danghien">Đang hiện</span>
                            <?php } else { ?>
                                <span class="dangan">Đang Ẩn</span>
                            <?php } ?>
                        </td>
                        <td>
                            <?php
                            if ($danhgia['trang_thai'] == 0) { ?>
                                <form action="index.php?act=an_danhgia" method="post">
                                    <input type="hidden" name="id_danhgia" value="<?= $danhgia['id'] ?>">
                                    <input class="an_danhgia" type="submit" onclick="an_danhgia()" value="Ẩn Đánh Giá" name="an_danhgia">
                                </form>
                            <?php } else { ?>
                                <form action="index.php?act=hien_danhgia" method="post">
                                    <input type="hidden" name="id_danhgia" value="<?= $danhgia["id"] ?>">
                                    <input class="hien_danhgia" type="submit" onclick="hien_danhgia()" value="Hiện Đánh Giá" name="hien_danhgia">
                                </form>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php $soThuTu++; ?>
                <?php } ?>
            </table>
        <?php else : ?>
            <p>Không có dữ liệu ĐÁNH GIÁ.</p>
        <?php endif; ?>
    </div>
</div>
<script>
    function hien_danhgia() {
        alert("Đã hiện đánh giá.");
    }

    function an_danhgia() {
        alert("Đã ẩn đánh giá.");
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

    .an_danhgia {
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
    .an_danhgia:hover {
        background-color: #BB0000;
    }

    /* Active style */
    .an_danhgia:active {
        transform: translateY(1px);
    }

    .hien_danhgia {
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
    .hien_danhgia:hover {
        background-color: navy;
    }

    /* Active style */
    .hien_danhgia:active {
        transform: translateY(1px);
    }
</style>