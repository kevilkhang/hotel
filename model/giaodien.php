<?php
function list_phong_giaodien()
{
    $sql = "SELECT * FROM phong WHERE trang_thai_phong = 0 ORDER BY id DESC LIMIT 3";
    $result = pdo_query($sql);
    return $result;
}
function list_tiennghi_giaodien()
{
    $sql = "SELECT * FROM tien_nghi order by id DESC LIMIT 5 ";
    $result = pdo_query($sql);
    return $result;
}
