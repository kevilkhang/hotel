<?php
function them_loaiphong($ten_loaiphong)
{
    $sql = "INSERT INTO loai_phong (ten_loai) VALUES ('$ten_loaiphong')";
    pdo_execute($sql);
}
function xoa_loaiphong($xoaId)
{
    $sql = "SELECT * FROM phong WHERE ma_loaiphong='$xoaId'";
    $result = pdo_query_one($sql);
    extract($result);
    $sql = "DELETE FROM don_phong WHERE id_phong = $id";
    pdo_execute($sql);
    $sql = "DELETE FROM phong_coso WHERE id_phong = $id";
    pdo_execute($sql);
    $sql = "DELETE FROM phong_tiennghi WHERE id_phong = $id";
    pdo_execute($sql);
    $sql = "DELETE FROM binh_luan WHERE id_phong = $id";
    pdo_execute($sql);
    $sql = "DELETE FROM danh_gia WHERE id_phong = $id";
    pdo_execute($sql);
    $sql = "DELETE FROM phong WHERE ma_loaiphong = $xoaId";
    pdo_execute($sql);
    $sql = "DELETE FROM loai_phong WHERE ma_loai = $xoaId";
    pdo_execute($sql);
}
function list_loaiphong()
{
    $sql = "SELECT * FROM loai_phong order by ma_loai desc ";
    $result = pdo_query($sql);
    return $result;
}
function sua_loaiphong($id)
{
    $sql = "SELECT * FROM loai_phong WHERE ma_loai='$id'";
    $result = pdo_query_one($sql);
    return $result;
}
function capnhat_loaiphong( $ten_loaiphong, $id)
{
    $sql = "UPDATE loai_phong SET ten_loai='$ten_loaiphong' WHERE ma_loai= '$id'";
    pdo_execute($sql);
}

function check_loaiphong($ten_loaiphong)
{
    $ten_loaiphong = addslashes($ten_loaiphong);
    $sql = "SELECT count(*) FROM loai_phong WHERE ten_loai = '$ten_loaiphong'";
    return pdo_query_value($sql, $ten_loaiphong) > 0;
}
