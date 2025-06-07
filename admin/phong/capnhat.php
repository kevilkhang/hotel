<?php
if (is_array($result)) {
    extract($result);
    if (is_file("../upload/" . $hinh)) {
        $hinhxuat = "<img src='../upload/" . $hinh . "' width='80'>";
    } else {
        $hinhxuat = "no photo";
    }
    $mo_ta_phong = $mo_ta;
    $id_phong = $id;
}
?>
<main class="admin__main1">
    <div class="form-container">
        <h1 class="form-title">CẬP NHẬT PHÒNG</h1>
        <form action="index.php?act=capnhatphong" method="POST" enctype="multipart/form-data" class="add-loai-hang-form">
            <input type="hidden" id="malh_bottom" name="id" value="<?php if (isset($id_phong) && ($id_phong != '')) echo $id_phong; ?>" class="forminput">
            <div class="form-group1">
                <label for="kichhoat" class="formlabel">Trạng Thái:</label>
                <input type="radio" id="kichhoat" name="trang_thaiphong" value="0" <?php echo ($trang_thai_phong == 0) ? 'checked' : ''; ?>>
                <label for="kichhoat">Hoạt động</label>
                <input type="radio" id="choblock1" name="trang_thaiphong" value="1" <?php echo ($trang_thai_phong == 1) ? 'checked' : ''; ?>>
                <label for="choblock1">Không hoạt động</label>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="formlabel">Loại phòng:</label>
                <select name="ma_loaiphong" class="forminput" required>
                    <option value="" selected>Loại Phòng</option>
                    <?php
                    if (is_array($result1)) {
                        foreach ($result1 as $loai_phong) {
                            extract($loai_phong);
                            if ($ma_loaiphong == $ma_loai) {
                                echo '<option selected value="' . $ma_loai . '" >' . $ten_loai . '</option>';
                            } else {
                                echo '<option value="' . $ma_loai . '" >' . $ten_loai . '</option>';
                            }
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="formlabel">Giá phòng:</label>
                <input type="number" id="tenlh_bottom" name="gia" class="forminput" min="0" value="<?php if (isset($gia_phong) && ($gia_phong != '')) echo $gia_phong; ?>" required>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="formlabel">Diện tích(m2):</label>
                <input type="number" id="tenlh_bottom" name="dien_tich" class="forminput" min="0" value="<?php if (isset($dien_tich) && ($dien_tich != '')) echo $dien_tich; ?>" required>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="formlabel">Cơ sở:</label>
                <div class="allcoso">
                    <?php
                    if (is_array($result_coso)) {
                        foreach ($result_coso as $coso) {
                            extract($coso);
                            $id_goc_coso = $id;
                            $checked = false; // Biến để kiểm tra checkbox có nên checked hay không

                            foreach ($result_phong_coso as $phong_coso) {
                                extract($phong_coso);
                                if ($id_goc_coso == $id_coso) {
                                    $checked = true; // Nếu có trùng khớp, set biến $checked thành true và dừng vòng lặp
                                    break;
                                }
                            }

                            echo '<div class="coso">';
                            echo '<label for="">' . $ten_coso . '</label>';
                            echo '<input type="checkbox" id="tenlh_bottom" name="coso[]" class="checkbox" value="' . $id_goc_coso . '"';

                            if ($checked) {
                                echo ' checked'; // Thêm thuộc tính checked nếu $checked là true
                            }

                            echo '>';
                            echo '</div>';
                        }
                    }
                    ?>

                </div>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="formlabel">Tiện nghi:</label>
                <div class="allcoso">
                    <?php
                    if (is_array($result_tiennghi)) {
                        foreach ($result_tiennghi as $tiennghi) {
                            extract($tiennghi);
                            $id_goc_tiennghi = $id;
                            $checked = false; // Biến để kiểm tra checkbox có nên checked hay không

                            foreach ($result_phong_tiennghi as $phong_tiennghi) {
                                extract($phong_tiennghi);

                                if ($id_goc_tiennghi == $id_tiennghi) {
                                    $checked = true; // Nếu có trùng khớp, set biến $checked thành true và dừng vòng lặp
                                    break;
                                }
                            }

                            echo '<div class="coso">';
                            echo '<label for="">' . $ten_tiennghi . '</label>';
                            echo '<input type="checkbox" id="tenlh_bottom" name="tiennghi[]" class="checkbox" value="' . $id_goc_tiennghi . '"';

                            if ($checked) {
                                echo ' checked'; // Thêm thuộc tính checked nếu $checked là true
                            }

                            echo '>';
                            echo '</div>';
                        }
                    }
                    ?>

                </div>
            </div>
            <div class="nlte">
                <div class="form-group1">
                    <label for="tenlh_bottom" class="formlabel">Người lớn:</label>
                    <select name="nguoilon" class="forminput1" required>
                        <option value="0" <?php echo ($nguoi_lon == 0) ? 'selected' : ''; ?>>0</option>
                        <option value="1" <?php echo ($nguoi_lon == 1) ? 'selected' : ''; ?>>1</option>
                        <option value="2" <?php echo ($nguoi_lon == 2) ? 'selected' : ''; ?>>2</option>
                        <option value="3" <?php echo ($nguoi_lon == 3) ? 'selected' : ''; ?>>3</option>
                        <option value="4" <?php echo ($nguoi_lon == 4) ? 'selected' : ''; ?>>4</option>
                        <option value="5" <?php echo ($nguoi_lon == 5) ? 'selected' : ''; ?>>5</option>
                    </select>
                </div>
                <div class="form-group1">
                    <label for="tenlh_bottom" class="formlabel">Trẻ em:</label>
                    <select name="treem" class="forminput1" required>
                        <option value="0" <?php echo ($tre_em == 0) ? 'selected' : ''; ?>>0</option>
                        <option value="1" <?php echo ($tre_em == 1) ? 'selected' : ''; ?>>1</option>
                        <option value="2" <?php echo ($tre_em == 2) ? 'selected' : ''; ?>>2</option>
                        <option value="3" <?php echo ($tre_em == 3) ? 'selected' : ''; ?>>3</option>
                        <option value="4" <?php echo ($tre_em == 4) ? 'selected' : ''; ?>>4</option>
                        <option value="5" <?php echo ($tre_em == 5) ? 'selected' : ''; ?>>5</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="formlabel">Hình ảnh:</label>
                <input type="file" id="tenlh_bottom" name="hinh" class="forminput">
                <label class="formlabel"><?php echo $hinhxuat; ?></label>
                <span class="form-error"><?php echo isset($loi["loianh"]) ? $loi["loianh"] : "" ?></span>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="formlabel">Mô tả:</label>
                <textarea id="editor1" name="mota" class="form-input"><?php if (isset($mo_ta_phong) && ($mo_ta_phong != '')) echo $mo_ta_phong; ?></textarea>
            </div>
            <span class="form-error"><?php echo isset($loi["thanhcong"]) ? $loi["thanhcong"] : "" ?></span>
            <br>
            <input type="submit" name="capnhatphong" class="form-button" value="Lưu thông tin">
        </form>

        <p><a href="index.php?act=danhsachphong" class="form-link">Xem danh sách phòng</a></p>
    </div>
</main>
<script>
    // Replace the <textarea id="editor1"> with a CKEditor 4
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
</script>