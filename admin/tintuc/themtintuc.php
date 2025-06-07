<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

<main class="admin__main1">
    <div class="form-container">
        <h1 class="form-title">THÊM TIN TỨC</h1>
        <form action="index.php?act=them_tintuc" method="POST" enctype="multipart/form-data" class="add-loai-hang-form">
            <div class="form-group">
                <label for="tenlh_bottom" class="formlabel">Tiêu Đề:</label>
                <input type="text" id="tenlh_bottom" name="tieu_de" class="forminput" required>
                <span class="form-error"><?php echo isset($loi["ten"]) ? $loi["ten"] : "" ?></span>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="formlabel">Mô tả:</label>
                <!-- <input type="text" id="tenlh_bottom" name="mo_ta" class="forminput" required> -->
                <textarea class="forminput" name="mo_ta" id="" cols="20" rows="10" required></textarea>
                <span class="form-error"><?php echo isset($loi["ten"]) ? $loi["ten"] : "" ?></span>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="formlabel">Hình ảnh Mô tả:</label>
                <input type="file" id="tenlh_bottom" name="hinh" class="forminput">
                <span class="form-error"><?php echo isset($loi["loianh"]) ? $loi["loianh"] : "" ?></span>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="formlabel">Nội Dung:</label>
                <textarea id="editor1" name="noi_dung" class="form-input"></textarea>
            </div>
            <span class="form-error"><?php echo isset($loi["thanhcong"]) ? $loi["thanhcong"] : "" ?></span>
            <br>
            <input type="submit" name="addtintuc" class="form-button" value="Lưu thông tin">
        </form>

        <p><a href="index.php?act=danhs_tintuc" class="form-link">Xem danh sách tin tức</a></p>
    </div>
</main>
<script>
    CKEDITOR.replace('editor1');
</script>