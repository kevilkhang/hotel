<?php
if(is_array($result)){
    extract($result);
}
?>
<main class="admin__main1">
    <div class="form-container">
        <h1 class="form-title">CẬP NHẬT LOẠI PHÒNG</h1>
        <form action="index.php?act=capnhatloaiphong" method="POST" class="add-loai-hang-form">
            <div class="form-group">
                <input type="hidden" id="malh_bottom" name="ma_lh" class="forminput">
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="formlabel">Tên loại phong:</label>
                <input type="text" id="tenlh_bottom" name="ten_loaiphong"  class="forminput" value="<?php if(isset($ten_loai)&&($ten_loai!='')) echo $ten_loai; ?>" required>
                <span class="form-error"><?php echo isset($loi["loi"]) ? $loi["loi"] : "" ?></span>
            </div>
            <input type="hidden" name="id" value="<?php echo $ma_loai; ?>">
            <input type="hidden" name="loai_phong" value="<?php echo $ten_loai; ?>">
            <input type="submit" name="capnhatloaiphong" class="form-button" value="Lưu thông tin">
        </form>
        <p><a href="index.php?act=danhs_loaiphong" class="form-link">Xem danh sách Loại phòng</a></p>
    </div>
</main>