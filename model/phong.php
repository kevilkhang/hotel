<?php
function them_phong($ma_loaiphong, $hinh, $mo_ta, $dien_tich, $gia, $nguoi_lon, $tre_em)
{
    $sql = "INSERT INTO phong (ma_loaiphong, hinh, mo_ta,dien_tich,gia_phong,nguoi_lon,tre_em)
            VALUES ('$ma_loaiphong', '$hinh', '$mo_ta', '$dien_tich', '$gia', '$nguoi_lon', '$tre_em')";
    return pdo_execute_last_id($sql);
}
function them_cosophong($id_phong, $id_coso)
{
    $sql = "INSERT INTO phong_coso (id_phong, id_coso) 
            VALUES ('$id_phong', '$id_coso')";
    pdo_execute($sql);
}
function them_tiennghiphong($id_phong, $id_tienngghi)
{
    $sql = "INSERT INTO phong_tiennghi (id_phong, id_tiennghi) 
            VALUES ('$id_phong', '$id_tienngghi')";
    pdo_execute($sql);
}
function list_phong()
{
    $sql = "SELECT * FROM phong order by id desc ";
    $result = pdo_query($sql);
    return $result;
}

function lay_ten_loaiphong($ma_loaiphong)
{
    $sql = "SELECT * FROM loai_phong WHERE ma_loai='$ma_loaiphong'";
    $result = pdo_query_one($sql);
    extract($result);
    return $ten_loai;
}
function sua_phong($id)
{
    $sql = "SELECT * FROM phong WHERE id='$id'";
    $result = pdo_query_one($sql);
    return $result;
}
function lay_co_so_phong($id_phong)
{
    $sql = "SELECT * FROM phong_coso WHERE id_phong='$id_phong'";
    $result = pdo_query($sql);
    return $result;
}
function lay_tien_nghi_phong($id_phong)
{
    $sql = "SELECT * FROM phong_tiennghi WHERE id_phong='$id_phong'";
    $result = pdo_query($sql);
    return $result;
}
function capnhat_phong($ma_loaiphong, $hinh, $mo_ta, $dien_tich, $gia, $nguoi_lon, $tre_em, $id_phong,$trang_thaiphong)
{
    if ($hinh != "") {
        $sql = "UPDATE phong SET ma_loaiphong='$ma_loaiphong', hinh='$hinh', mo_ta='$mo_ta', dien_tich='$dien_tich', gia_phong='$gia' , nguoi_lon='$nguoi_lon',tre_em='$tre_em',trang_thai_phong='$trang_thaiphong' WHERE id= '$id_phong'";
    } else {
        $sql = "UPDATE phong SET ma_loaiphong='$ma_loaiphong', mo_ta='$mo_ta', dien_tich='$dien_tich', gia_phong='$gia', nguoi_lon='$nguoi_lon',tre_em='$tre_em',trang_thai_phong='$trang_thaiphong' WHERE id= '$id_phong'";
    }
    pdo_execute($sql);
}
function xoa_coso_idphong($id_phong)
{
    $sql = "DELETE FROM phong_coso WHERE id_phong = $id_phong";
    pdo_execute($sql);
}
function xoa_tiennghi_idphong($id_phong)
{
    $sql = "DELETE FROM phong_tiennghi WHERE id_phong = $id_phong";
    pdo_execute($sql);
}
function xoa_phong($id)
{
    $sql = "DELETE FROM phong_tiennghi WHERE id_phong = $id";
    pdo_execute($sql);
    $sql = "DELETE FROM phong_coso WHERE id_phong = $id";
    pdo_execute($sql);
    $sql = "DELETE FROM binh_luan WHERE id_phong = $id";
    pdo_execute($sql);
    $sql = "DELETE FROM danh_gia WHERE id_phong = $id";
    pdo_execute($sql);
    $sql = "DELETE FROM don_phong WHERE id_phong = $id";
    pdo_execute($sql);
    $sql = "DELETE FROM phong WHERE id = $id";
    pdo_execute($sql);
}
