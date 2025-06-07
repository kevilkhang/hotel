<?php
function them_tien_nghi($ten_tiennghi, $hinh, $mo_ta)
{
    $sql = "INSERT INTO tien_nghi (ten_tiennghi,hinh,mo_ta) VALUES ('$ten_tiennghi', '$hinh', '$mo_ta')";
    pdo_execute($sql);
}
function check_tiennghi($ten_tiennghi)
{
    $ten_tiennghi = addslashes($ten_tiennghi);
    $sql = "SELECT count(*) FROM tien_nghi WHERE ten_tiennghi = '$ten_tiennghi'";
    return pdo_query_value($sql, $ten_tiennghi) > 0;
}
function list_tiennghi()
{
    $sql = "SELECT * FROM tien_nghi order by id desc ";
    $result = pdo_query($sql);
    return $result;
}
function xoa_tiennghi($xoaId)
{
    $sql = "DELETE FROM phong_tiennghi WHERE id_tiennghi = $xoaId";
    pdo_execute($sql);
    $sql = "DELETE FROM tien_nghi WHERE id = $xoaId";
    pdo_execute($sql);
}
function sua_tiennghi($id)
{
    $sql = "SELECT * FROM tien_nghi WHERE id='$id'";
    $result = pdo_query_one($sql);
    return $result;
}
function capnhat_tiennghi($ten_tiennghi, $hinh, $mo_ta, $id)
{
    if ($hinh != "") {
        $sql = "UPDATE tien_nghi SET ten_tiennghi='$ten_tiennghi', hinh='$hinh', mo_ta='$mo_ta' WHERE id='$id'";
    } else {
        $sql = "UPDATE tien_nghi SET ten_tiennghi='$ten_tiennghi', mo_ta='$mo_ta' WHERE id='$id'";
    }
    pdo_execute($sql);
}
