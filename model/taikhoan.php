<?php
function them_tai_khoan($ho_ten, $ten_dn, $mat_khau, $email, $hinh)
{
    $sql = "INSERT INTO khach_hang (ho_ten, ten_dn,mat_khau,email,hinh) VALUES ('$ho_ten', '$ten_dn', '$mat_khau', '$email', '$hinh')";
    return pdo_execute_last_id($sql);
}
function them_tai_khoan2($ten_dn, $mat_khau, $ho_ten, $trang_thai, $hinh, $email, $sdt, $vai_tro, $cccd)
{
    $sql = "INSERT INTO khach_hang (ten_dn, mat_khau, ho_ten, trang_thai, hinh, email,sdt, vai_tro,cccd)
            VALUES ('$ten_dn', '$mat_khau', '$ho_ten', '$trang_thai', '$hinh', '$email','$sdt', '$vai_tro','$cccd')";
    pdo_execute($sql);
}
function check_tendangnhap($ten_dn)
{
    $ten_dn = addslashes($ten_dn);
    $sql = "SELECT count(*) FROM khach_hang WHERE ten_dn = '$ten_dn'";
    return pdo_query_value($sql, $ten_dn) > 0;
}
function check_taikhoan($ten_dn, $mat_khau, $trangthai)
{
    $sql = "SELECT * FROM khach_hang WHERE ten_dn='" . $ten_dn . "' AND mat_khau ='" . $mat_khau . "' AND trang_thai ='" . $trangthai . "'";
    $result = pdo_query_one($sql);
    return $result;
}
function list_khachhang()
{
    $sql = "SELECT * FROM khach_hang order by id desc ";
    $result = pdo_query($sql);
    return $result;
}
function sua_khachhang($id)
{
    $sql = "SELECT * FROM khach_hang WHERE id='$id'";
    $result = pdo_query_one($sql);
    return $result;
}
function capnhat_khachhang($vai_tro, $trang_thai, $id)
{
    $sql = "UPDATE khach_hang SET  vai_tro='$vai_tro', trang_thai='$trang_thai' WHERE id='$id'";
    pdo_execute($sql);
}
function capnhat_khachhang_giadien($ten_dn, $ho_ten, $hinh, $email, $sdt, $id)
{
    // Check if $hinh is not empty
    if (!empty($hinh)) {
        $sql = "UPDATE khach_hang SET ten_dn='$ten_dn', ho_ten='$ho_ten', hinh='$hinh', email='$email', sdt='$sdt' WHERE id='$id'";
    } else {
        $sql = "UPDATE khach_hang SET ten_dn='$ten_dn', ho_ten='$ho_ten', email='$email', sdt='$sdt' WHERE id='$id'";
    }

    pdo_execute($sql);
}
function capnhat_matkhau($mat_khau, $id)
{
    $sql = "UPDATE khach_hang SET   mat_khau='$mat_khau' WHERE id='$id'";
    pdo_execute($sql);
}
function check_email($email)
{
    $email = addslashes($email);
    $sql = "SELECT count(*) FROM khach_hang WHERE email = '$email'";
    return pdo_query_value($sql, $email) > 0;
}
function khachhang_email($email)
{
    $sql = "SELECT * FROM khach_hang WHERE email='$email'";
    $result = pdo_query_one($sql);
    return $result;
}