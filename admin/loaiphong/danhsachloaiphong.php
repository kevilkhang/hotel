<div class="form-container1">
    <h1 class="admin__list-title">DANH SÁCH LOẠI PHÒNG</h1>
    <div class="admin__list-buttons">
        <!-- <input type="button" value="Chọn tất cả" class="admin__button">
        <input type="button" value="Bỏ chọn tất cả" class="admin__button">
        <input type="button" value="Xóa các mục đã chọn" class="admin__button"> -->
        <a href="index.php?act=themloaiphong" class="admin__button-link"><input type="button" value="Nhập thêm" class="admin__button"></a>
    </div>
    <div class="admin__list-table">
        <?php if (!empty($result)) : ?>
            <table class="admin__table">
                <tr>
                   
                    <th>STT</th>
                    <th>MÃ LOẠI</th>
                    <th>TÊN LOẠI</th>
                    <th></th>
                </tr>
                <?php $soThuTu = 1; ?>
                <?php foreach ($result as $loaiphong) {
                    extract($loaiphong);
                    $sua_loaiphong = "index.php?act=sua_loaiphong&id=" . $loaiphong["ma_loai"];
                    $xoa_loaiphong = "index.php?act=xoa_loaiphong&id=" . $loaiphong["ma_loai"];
                ?>
                    <tr>
                       
                        <td><?php echo $soThuTu; ?></td>
                        <td>LPKS-<?php echo $loaiphong['ma_loai']; ?></td>
                        <td><?php echo $loaiphong['ten_loai']; ?></td>
                        <td>
                            <a href="<?php echo $sua_loaiphong; ?>" class="admin__edit-button">Sửa</a>
                            <a href="<?php echo $xoa_loaiphong; ?>" class="admin__delete-button">Xóa</a>
                        </td>
                    </tr>
                    <?php $soThuTu++; ?>
                <?php } ?>
            </table>
        <?php else : ?>
            <p>Không có dữ liệu loại phòng.</p>
        <?php endif; ?>
    </div>

</div>