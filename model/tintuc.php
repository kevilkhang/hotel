<?php
function them_tin_tuc($tieu_de, $mo_ta, $noi_dung,$hinh,$ngay_them_tin)
{
    $sql = "INSERT INTO tin_tuc (tieu_de,mo_ta,noi_dung,hinh_mota,ngay_dang) VALUES ('$tieu_de', '$mo_ta', '$noi_dung', '$hinh', '$ngay_them_tin')";
    pdo_execute($sql);
}
function list_tintuc()
{
    $sql = "SELECT * FROM tin_tuc order by id desc ";
    $result = pdo_query($sql);
    return $result;
}
function xoa_tintuc($xoaId)
{
    $sql = "DELETE FROM tin_tuc WHERE id = $xoaId";
    pdo_execute($sql);
}
function sua_tintuc($id)
{
    $sql = "SELECT * FROM tin_tuc WHERE id='$id'";
    $result = pdo_query_one($sql);
    return $result;
}
function capnhat_tintuc($tieu_de, $mo_ta, $noi_dung, $hinh, $ngay_them_tin,$trang_thai,$id)
{
    if ($hinh != "") {
        $sql = "UPDATE tin_tuc SET tieu_de='$tieu_de', hinh_mota='$hinh', mo_ta='$mo_ta', noi_dung='$noi_dung', trang_thai='$trang_thai' WHERE id='$id'";
    } else {
        $sql = "UPDATE tin_tuc SET tieu_de='$tieu_de', mo_ta='$mo_ta', noi_dung='$noi_dung', trang_thai='$trang_thai' WHERE id='$id'";
    }
    pdo_execute($sql);
}
function capnhat_luotxem($luot_xem, $id)
{
    $sql = "UPDATE tin_tuc SET so_luot_xem = '$luot_xem' WHERE id = '$id'";
    pdo_execute($sql);
}