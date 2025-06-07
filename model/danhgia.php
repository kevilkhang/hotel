<?php
function list_danhgia()
{
    $sql = "SELECT * FROM danh_gia order by id desc ";
    $result = pdo_query($sql);
    return $result;
}
function themdanh_gia($id_phong, $id_Khachhang, $so_sao, $noi_dung)
{
    $sql = "INSERT INTO danh_gia (id_phong,id_khachhang ,so_sao, noi_dung) 
            VALUES ('$id_phong','$id_Khachhang', '$so_sao', '$noi_dung')";
    pdo_execute($sql);
}

function lay_ten_khachhang($id_khachhang)
{
    $sql = "SELECT * FROM khach_hang WHERE id='$id_khachhang'";
    $result = pdo_query_one($sql);
    extract($result);
    return $ho_ten;
}
function trangthai_danhgia($trangthai, $id)
{
    $sql = "UPDATE danh_gia SET trang_thai = '$trangthai' WHERE id = '$id'";
    pdo_execute($sql);
}