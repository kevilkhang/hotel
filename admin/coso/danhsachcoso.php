<div class="form-container1">
    <h1 class="admin__list-title">DANH SÁCH CƠ SỞ</h1>
    <div class="admin__list-buttons">
        <!-- <input type="button" value="Chọn tất cả" class="admin__button">
        <input type="button" value="Bỏ chọn tất cả" class="admin__button">
        <input type="button" value="Xóa các mục đã chọn" class="admin__button"> -->
        <a href="index.php?act=themcoso" class="admin__button-link"><input type="button" value="Nhập thêm" class="admin__button"></a>
    </div>
    <div class="admin__list-table">
        <?php if (!empty($result)) : ?>
            <table class="admin__table">
                <tr>
                    <th>STT</th>
                    <th>TÊN CƠ SỞ</th>
                    <th>HÌNH ẢNH</th>
                    <th>MÔ TẢ</th>
                    <th></th>
                </tr>

                <?php $soThuTu = 1; ?>
                <?php foreach ($result as $coso) {
                    extract($coso);
                    $sua_coso = "index.php?act=sua_coso&id=" . $coso["id"];
                    $xoa_coso = "index.php?act=xoa_coso&id=" . $coso["id"];
                    if (is_file("../upload/" . $hinh)) {
                        $hinhxuat = "<img src='../upload/" . $hinh . "' width='80'>";
                    } else {
                        $hinhxuat = "no photo";
                    }
                ?>
                    <tr>
                        <!-- <td><input type="checkbox" name=""></td> -->
                        <td><?php echo $soThuTu; ?></td>
                        <td><?php echo $coso['ten_coso']; ?></td>
                        <td><?php echo $hinhxuat; ?></td>
                        <td class="mota"><?php echo $coso['mo_ta']; ?></td>
                        <td>
                            <a href="<?php echo $sua_coso; ?>" class="admin__edit-button">Sửa</a>
                            <a href="<?php echo $xoa_coso; ?>" class="admin__delete-button">Xóa</a>
                        </td>
                    </tr>
                    <?php $soThuTu++; ?>
                <?php } ?>
            </table>
        <?php else : ?>
            <p>Không có dữ liệu cơ sở.</p>
        <?php endif; ?>
    </div>

</div>