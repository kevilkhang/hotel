<?php
if (is_array($result)) {
    extract($result);
    if (is_file("../upload/" . $hinh_mota)) {
        $hinhxuat = "<img src='../upload/" . $hinh_mota . "' width='80'>";
    } else {
        $hinhxuat = "no photo";
    }
}
?>
<main class="admin__main1">
    <div class="form-container">
        <h1 class="form-title">CẬP NHẬT TIN TỨC</h1>
        <form action="index.php?act=capnhat_tintuc" method="POST" enctype="multipart/form-data" class="add-loai-hang-form">
            <div class="form-group1">
                <label for="kichhoat" class="formlabel">Trạng Thái:</label>
                <input type="radio" id="kichhoat" name="trang_thai" value="0" <?php echo ($trang_thai == 0) ? 'checked' : ''; ?>>
                <label for="kichhoat">Hiện</label>
                <input type="radio" id="choblock1" name="trang_thai" value="1" <?php echo ($trang_thai == 1) ? 'checked' : ''; ?>>
                <label for="choblock1">Ẩn</label>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="formlabel">Tiêu Đề:</label>
                <input type="text" id="tenlh_bottom" name="tieu_de" class="forminput" value="<?php echo $tieu_de; ?>" required>
                <span class="form-error"><?php echo isset($loi["ten"]) ? $loi["ten"] : "" ?></span>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="formlabel">Mô tả:</label>
                <!-- <input type="text" id="tenlh_bottom" name="mo_ta" class="forminput" required> -->
                <textarea class="forminput" name="mo_ta" id="" cols="20" rows="10" required><?php echo $mo_ta; ?></textarea>
                <span class="form-error"><?php echo isset($loi["ten"]) ? $loi["ten"] : "" ?></span>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="formlabel">Hình ảnh Mô tả:</label>
                <input type="file" id="tenlh_bottom" name="hinh" class="forminput">
                <span class="form-error"><?php echo isset($loi["loianh"]) ? $loi["loianh"] : "" ?></span>
                <label class="formlabel"><?php echo $hinhxuat; ?></label>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="formlabel">Nội Dung:</label>
                <textarea id="editor1" name="noi_dung" class="form-input"><?php echo $noi_dung; ?></textarea>
            </div>
            <span class="form-error"><?php echo isset($loi["thanhcong"]) ? $loi["thanhcong"] : "" ?></span>
            <br>
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="submit" name="capnhattintuc" class="form-button" value="Cập nhật thông tin">
        </form>

        <p><a href="index.php?act=danhs_tintuc" class="form-link">Xem danh sách tin tức</a></p>
    </div>
</main>
<script>
    CKEDITOR.replace('editor1');
</script>