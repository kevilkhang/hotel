<div class="form-container1">
    <h1 class="admin__list-title">DANH SÁCH PHÒNG</h1>
    <div class="admin__list-buttons">
        <!-- <input type="button" value="Chọn tất cả" class="admin__button">
        <input type="button" value="Bỏ chọn tất cả" class="admin__button">
        <input type="button" value="Xóa các mục đã chọn" class="admin__button"> -->
        <a href="index.php?act=themphong" class="admin__button-link"><input type="button" value="Nhập thêm" class="admin__button"></a>
    </div>
    <div class="admin__list-table">
        <?php if (!empty($result)) : ?>
            <table class="admin__table">
                <tr>
                    <th>STT</th>
                    <th>TÊN PHÒNG</th>
                    <th>HÌNH ẢNH</th>
                    <th>DIỆN TÍCH</th>
                    <th>KHÁCH HÀNG</th>
                    <th>GIÁ</th>
                    <th>TRẠNG THÁI</th>
                    <th></th>
                </tr>

                <?php $soThuTu = 1; ?>
                <?php foreach ($result as $phong) {
                    extract($phong);
                    $sua_phong = "index.php?act=sua_phong&id=" . $phong["id"];
                    $xoa_phong = "index.php?act=xoa_phong&id=" . $phong["id"];
                    $ten_phong = lay_ten_loaiphong($phong['ma_loaiphong']);
                    $gia = number_format((int)$phong['gia_phong'], 0, '.', '.');
                    if (is_file("../upload/" . $hinh)) {
                        $hinhxuat = "<img src='../upload/" . $hinh . "' width='80'>";
                    } else {
                        $hinhxuat = "no photo";
                    }
                ?>
                    <tr>
                        <!-- <td><input type="checkbox" name=""></td> -->
                        <td><?php echo $soThuTu; ?></td>
                        <td><?php echo $ten_phong; ?></td>
                        <td><?php echo $hinhxuat; ?></td>
                        <td class="mota"><?php echo $phong['dien_tich']; ?> m2</td>
                        <td class="mota"> Người lớn: <?php echo $phong['nguoi_lon']; ?> <br> Trẻ em: <?php echo $phong['tre_em']; ?></td>
                        <td class="mota"><?php echo $gia; ?> VNĐ</td>
                        <td class="mota">
                            <?php echo ($trang_thai_phong == 1) ? "Không hoạt động" : "Hoạt động"; ?>
                        </td>
                        <td>
                            <a href="<?php echo $sua_phong; ?>" class="admin__edit-button">Sửa</a>
                            <a href="<?php echo $xoa_phong; ?>" class="admin__delete-button">Xóa</a>
                        </td>
                    </tr>
                    <?php $soThuTu++; ?>
                <?php } ?>
            </table>
        <?php else : ?>
            <p>Không có dữ liệu Phòng.</p>
        <?php endif; ?>
    </div>

</div>