<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

<main class="admin__main1">
    <div class="form-container">
        <h1 class="form-title">THÊM TIỆN NGHI</h1>
        <form action="index.php?act=themtiennghi" method="POST" enctype="multipart/form-data" class="add-loai-hang-form">
            <div class="form-group">
                <label for="tenlh_bottom" class="formlabel">Tên tiện nghi:</label>
                <input type="text" id="tenlh_bottom" name="ten_tiennghi" class="forminput" required>
                <span class="form-error"><?php echo isset($loi["ten"]) ? $loi["ten"] : "" ?></span>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="formlabel">Hình ảnh:</label>
                <input type="file" id="tenlh_bottom" name="hinh" class="forminput">
                <span class="form-error"><?php echo isset($loi["loianh"]) ? $loi["loianh"] : "" ?></span>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="formlabel">Mô tả:</label>
                <textarea id="editor" name="mota" class="form-input"></textarea>
            </div>
            <span class="form-error"><?php echo isset($loi["thanhcong"]) ? $loi["thanhcong"] : "" ?></span>
            <br>
            <input type="submit" name="addtiennghi" class="form-button" value="Lưu thông tin">
        </form>


        <p><a href="index.php?act=danhs_tiennghi" class="form-link">Xem danh sách Tiện nghi</a></p>
    </div>
</main>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>