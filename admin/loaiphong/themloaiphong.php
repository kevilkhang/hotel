
<main class="admin__main1">
    <div class="form-container">
        <h1 class="form-title">THÊM LOẠI PHÒNG</h1>
        <form action="index.php?act=addloaiphong" method="POST" class="add-loai-hang-form">
            <div class="form-group">
                <label for="tenlh_bottom" class="formlabel">Tên loại phong:</label>
                <input type="text" id="tenlh_bottom" name="ten_loaiphong" class="forminput" required>
                <span class="form-error"><?php echo isset($loi["loi"]) ? $loi["loi"] : "" ?></span>
            </div>
            <span> <?php
                    if (isset($thongbao) && ($thongbao != "")) {
                        echo $thongbao;
                    }
                    ?></span> <br>
            <input type="submit" name="addloaiphong" class="form-button" value="Lưu thông tin">

        </form>


        <p><a href="index.php?act=danhs_loaiphong" class="form-link">Xem danh sách Loại phòng</a></p>
    </div>
</main>