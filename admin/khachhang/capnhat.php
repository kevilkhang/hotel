<?php
if (is_array($result)) {
    extract($result);
}
?>
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
<main class="admin__main1">
    <div class="form-container">
        <h1 class="form-title">CẬP NHẬT KHÁCH HÀNG</h1>
        <form action="index.php?act=capnhatkhachhang" method="POST" class="add-loai-hang-form">

            <div class="form-group1">
                <label for="tenlh_bottom" class="formlabel">Trạng Thái:</label>
                <input type="radio" id="kichhoat" name="trang_thai" value="0" <?php if ($trang_thai == 0) echo "checked"; ?>>
                <label for="kichhoat">Kích hoạt</label>
                <input type="radio" id="choblock1" name="trang_thai" value="1" <?php if ($trang_thai == 1) echo "checked"; ?>>
                <label for="choblock1">Chặn</label>
            </div>
            <div class="form-group1">
                <label for="tenlh_bottom" class="formlabel">Vai Trò:</label>
                <input type="radio" id="vaitro" name="vai_tro" value="0" <?php if ($vai_tro == 0) echo "checked"; ?>>
                <label for="vaitro">Khách hàng</label>
                <input type="radio" id="choblock2" name="vai_tro" value="1" <?php if ($vai_tro == 1) echo "checked"; ?>>
                <label for="choblock2">Quản trị</label>
            </div>
            <br>
            <input type="hidden" id="malh_bottom" name="id" value="<?php if (isset($id) && ($id != '')) echo $id; ?>" class="forminput">
            <input type="submit" name="capnhatkhachhang" class="form-button" value="Cập nhật">
        </form>
        <p><a href="index.php?act=danhsachkh" class="form-link">Xem danh sách Khách hàng</a></p>
    </div>
</main>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>