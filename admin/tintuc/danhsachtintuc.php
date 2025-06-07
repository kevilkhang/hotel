<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<div class="form-container1">
    <h1 class="admin__list-title">DANH SÁCH TIN TỨC</h1>
    <div class="admin__list-table">
        <?php if (!empty($result)) : ?>
            <table class="admin__table">
                <tr>
                    <th>Số TT</th>
                    <th>Danh sách các tin</th>
                    <th style='width:200px'>Thông tin</th>
                    <th style='width:60px'>
                        <a class="btn btn-warning px-3 py-1" href="index.php?act=them_tintuc">Thêm</a>
                    </th>
                </tr>

                <?php $soThuTu = 1; ?>
                <?php foreach ($result as $tintuc) {
                    extract($tintuc);
                    $sua_tintuc = "index.php?act=sua_tintuc&id=" . $tintuc["id"];
                    $xoa_tintuc = "index.php?act=xoa_tintuc&id=" . $tintuc["id"];
                    if (is_file("../upload/" . $hinh_mota)) {
                        $hinhxuat = "                        <img src='../upload/" . $hinh_mota . "' width='200' height='150' align='left' class='mr-3'>";
                    } else {
                        $hinhxuat = "no photo";
                    }
                ?>
                    <tr>
                        <td><?php echo $soThuTu; ?></td>
                        <td>
                            <?php echo $hinhxuat; ?>
                            <h4><?php echo $tintuc["tieu_de"]; ?></h4>
                            <div style="text-align: left;"><?php echo $tintuc["mo_ta"]; ?></div>
                            <span class='text-success'>
                                Ngày đăng: <?php echo $tintuc["ngay_dang"]; ?> .
                                Số lần xem: <?php echo $tintuc["so_luot_xem"]; ?>
                            </span>
                        </td>
                        <td>Trạng thái: <?php echo ($tintuc["trang_thai"] == 0) ? "Đang Hiện" : "Đang ẩn"; ?> <br>
                        </td>
                        <td>
                            <div>
                                <a href='<?php echo $sua_tintuc; ?>'><button class='btn btn-warning'><i class='bx bx-edit-alt'></i></button></a>
                            </div>
                            <div class='mt-1'>
                            <a href='<?php echo $xoa_tintuc; ?>'><button class='btn btn-danger'><i class='bx bx-trash'></i></button></a>
                            </div>
                        </td>
                    </tr>
                    <?php $soThuTu++; ?>
                <?php } ?>
            </table>
        <?php else : ?>
            <p>Không có dữ liệu TIN TỨC.</p>
        <?php endif; ?>
    </div>

</div>