<div class="form-container1">
    <h1 class="admin__list-title">DANH SÁCH KHÁCH HÀNG</h1>
    <div class="admin__list-table">
        <div class="admin__list-buttons">
            <a href="index.php?act=them_taikhoan" class="admin__button-link"><input type="button" value="Nhập thêm" class="admin__button"></a>
        </div>
        <?php if (!empty($result)) : ?>
            <table class="admin__table">
                <tr>
                    <th>STT</th>
                    <th>TÊN KHÁCH HÀNG</th>
                    <th>TRẠNG THÁI</th>
                    <th>HÌNH ẢNH</th>
                    <th>EMAIL</th>
                    <th>VAI TRÒ</th>
                    <th></th>
                </tr>
                <?php $soThuTu = 1; ?>
                <?php foreach ($result as $khachhang) {
                    extract($khachhang);
                    $sua_khachhang = "index.php?act=sua_khachhang&id=" . $khachhang["id"];
                    if (is_file("../upload/" . $hinh)) {
                        $hinhxuat = "<img src='../upload/" . $hinh . "' width='80'>";
                    } else {
                        $hinhxuat = "no photo";
                    }
                ?>
                    <tr>
                        <td><?php echo $soThuTu; ?></td>
                        <td><?php echo $khachhang['ho_ten']; ?><br>
                            <?php echo $khachhang['sdt']; ?></td>
                        <td><?php echo $khachhang['trang_thai'] == 0 ? 'Kích hoạt' : 'Block'; ?></td>
                        <td><?php echo $hinhxuat; ?></td>
                        <td><?php
                            if (isset($khachhang['email']) && !empty($khachhang['email'])) {
                                echo $khachhang['email'];
                            } else {
                                echo "Trống";
                            }
                            ?>
                        </td>
                        <td><?php echo $khachhang['vai_tro'] == 0 ? 'Khách hàng' : 'Admin'; ?></td>
                        <td>
                            <a href="<?php echo $sua_khachhang; ?>" class="admin__edit-button">Sửa</a>
                        </td>
                    </tr>
                    <?php $soThuTu++; ?>
                <?php } ?>
            </table>
        <?php else : ?>
            <p>Không có dữ liệu Khách hàng.</p>
        <?php endif; ?>
    </div>

</div>