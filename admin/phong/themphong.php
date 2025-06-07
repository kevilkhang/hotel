<main class="admin__main1">
    <div class="form-container">
        <h1 class="form-title">THÊM PHÒNG</h1>
        <form action="index.php?act=themphong" method="POST" enctype="multipart/form-data" class="add-loai-hang-form">
            <div class="form-group">
                <label for="tenlh_bottom" class="formlabel">Loại phòng:</label>
                <select name="ma_loaiphong" class="forminput" required>
                    <option value="" selected>Loại Phòng</option>
                    <?php
                    foreach ($result as $loai_phong) {
                        extract($loai_phong);
                        echo '<option value="' . $ma_loai . '" >' . $ten_loai . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="formlabel">Giá phòng:</label>
                <input type="number" id="tenlh_bottom" name="gia" class="forminput" min="0" required>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="formlabel">Diện tích(m2):</label>
                <input type="number" id="tenlh_bottom" name="dien_tich" class="forminput" min="0" required>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="formlabel">Cơ sở:</label>
                <div class="allcoso">
                    <?php
                    foreach ($result_coso as $coso) {
                        extract($coso);
                        echo '<div class="coso">';
                        echo '<label for="">' . $ten_coso . '</label>';
                        echo '<input type="checkbox" id="tenlh_bottom" name="coso[]" class="checkbox" value="' . $id . '">';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="formlabel">Tiện nghi:</label>
                <div class="allcoso">
                    <?php
                    foreach ($result_tiennghi as $tiennghi) {
                        extract($tiennghi);
                        echo '<div class="coso">';
                        echo '<label for="">' . $ten_tiennghi . '</label>';
                        echo '<input type="checkbox" id="tenlh_bottom" name="tiennghi[]" class="checkbox" value="' . $id . '" >';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
            <div class="nlte">
                <div class="form-group1">
                    <label for="tenlh_bottom" class="formlabel">Người lớn:</label>
                    <select name="nguoilon" class="forminput1" required>
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="form-group1">
                    <label for="tenlh_bottom" class="formlabel">Trẻ em:</label>
                    <select name="treem" class="forminput1" required>
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="formlabel">Hình ảnh:</label>
                <input type="file" id="tenlh_bottom" name="hinh" class="forminput">
                <span class="form-error"><?php echo isset($loi["loianh"]) ? $loi["loianh"] : "" ?></span>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="formlabel">Mô tả:</label>
                <textarea id="editor1" name="mota" class="form-input"></textarea>
            </div>
            <span class="form-error"><?php echo isset($loi["thanhcong"]) ? $loi["thanhcong"] : "" ?></span>
            <br>
            <input type="submit" name="addphong" class="form-button" value="Lưu thông tin">
        </form>

        <p><a href="index.php?act=danhsachphong" class="form-link">Xem danh sách phòng</a></p>
    </div>
</main>
<script>
    // Replace the <textarea id="editor1"> with a CKEditor 4
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
</script>