<?php
function them_binhluan($noi_dung, $id_phong, $id_khachhang, $ngay_bl)
{
    $sql = "INSERT INTO binh_luan (noi_dung, id_phong, id_khachhang, ngay_bl) VALUES ('$noi_dung', '$id_phong', '$id_khachhang', '$ngay_bl')";
    pdo_execute($sql);
}
function list_binhluan()
{
    $sql = "SELECT * FROM binh_luan order by id desc ";
    $result = pdo_query($sql);
    return $result;
}
function list_binhluan_phong($id_phong)
{
    $sql = "SELECT * FROM binh_luan WHERE id_phong='" . $id_phong . "' order by id desc ";
    $result = pdo_query($sql);
    return $result;
}
function trangthai_binhluan($trangthai, $id)
{
    $sql = "UPDATE binh_luan SET trang_thai = '$trangthai' WHERE id = '$id'";
    pdo_execute($sql);
}