<?php
if (is_array($result)) {
    extract($result);
    if (is_file("../upload/" . $hinh)) {
        $hinhxuat = "<img src='../upload/" . $hinh . "' width='70'>";
    } else {
        $hinh = "no photo";
    }
}
?>
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
<main class="admin__main1">
    <div class="form-container">
        <h1 class="form-title">CẬP NHẬT CƠ SỞ</h1>
        <form action="index.php?act=capnhatcoso" method="POST" enctype="multipart/form-data" class="add-loai-hang-form">
            <div class="form-group">
                <label for="tenlh_bottom" class="formlabel">Tên cơ sở:</label>
                <input type="text" id="tenlh_bottom" name="ten_coso" class="forminput" value="<?php if (isset($ten_coso) && ($ten_coso != '')) echo $ten_coso; ?>" required>
                <span class="form-error"><?php echo isset($loi["ten"]) ? $loi["ten"] : "" ?></span>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="formlabel">Hình ảnh:</label>
                <input type="file" id="tenlh_bottom" name="hinh" class="forminput">
                <label class="formlabel"><?php echo $hinhxuat; ?></label>
                <span class="form-error"><?php echo isset($loi["loianh"]) ? $loi["loianh"] : "" ?></span>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="formlabel">Mô tả:</label>
                <textarea id="editor" name="mota" class="form-input"><?php if (isset($mo_ta) && ($mo_ta != '')) echo $mo_ta; ?></textarea>
            </div>
            <span class="form-error"><?php echo isset($loi["thanhcong"]) ? $loi["thanhcong"] : "" ?></span>
            <br>
            <input type="hidden" id="malh_bottom" name="id" value="<?php if (isset($id) && ($id != '')) echo $id; ?>" class="forminput">
            <input type="hidden" id="malh_bottom" name="coso_check" value="<?php if (isset($ten_coso) && ($ten_coso != '')) echo $ten_coso; ?>" class="forminput">
            <input type="submit" name="capnhatcoso" class="form-button" value="Cập nhật">
        </form>
        <p><a href="index.php?act=danhs_coso" class="form-link">Xem danh sách cơ sở</a></p>
    </div>
</main>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>