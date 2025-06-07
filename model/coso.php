<?php
function them_co_so($ten_coso, $hinh, $mo_ta)
{
    $sql = "INSERT INTO co_so (ten_coso,hinh,mo_ta) VALUES ('$ten_coso', '$hinh', '$mo_ta')";
    pdo_execute($sql);
}
function check_coso($ten_coso)
{
    $ten_coso = addslashes($ten_coso);
    $sql = "SELECT count(*) FROM co_so WHERE ten_coso = '$ten_coso'";
    return pdo_query_value($sql, $ten_coso) > 0;
}
function list_coso()
{
    $sql = "SELECT * FROM co_so order by id desc ";
    $result = pdo_query($sql);
    return $result;
}
function xoa_coso($xoaId)
{
    $sql = "DELETE FROM phong_coso WHERE id_coso = $xoaId";
    pdo_execute($sql);
    $sql = "DELETE FROM co_so WHERE id = $xoaId";
    pdo_execute($sql);
}
function sua_coso($id)
{
    $sql = "SELECT * FROM co_so WHERE id='$id'";
    $result = pdo_query_one($sql);
    return $result;
}
function capnhat_coso($ten_coso, $hinh, $mo_ta, $id)
{
    if ($hinh != "") {
        $sql = "UPDATE co_so SET ten_coso='$ten_coso', hinh='$hinh', mo_ta='$mo_ta' WHERE id='$id'";
    } else {
        $sql = "UPDATE co_so SET ten_coso='$ten_coso', mo_ta='$mo_ta' WHERE id='$id'";
    }
    pdo_execute($sql);
}
