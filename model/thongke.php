<?php
function so_loaiphong()
{
    $sql = "SELECT COUNT(*) AS SoLuongLoaiPhong FROM loai_phong;";
    $so_loaiphong = pdo_query_one($sql);
    return $so_loaiphong;
}
function so_phong()
{
    $sql = "SELECT COUNT(*) AS SoLuongPhong FROM phong;";
    $so_phong = pdo_query_one($sql);
    return $so_phong;
}
function so_binhluan()
{
    $sql = "SELECT COUNT(*) AS SoLuongBinhLuan FROM binh_luan;";
    $so_binhluan = pdo_query_one($sql);
    return $so_binhluan;
}
function so_danhgia()
{
    $sql = "SELECT COUNT(*) AS SoLuongDanhGia FROM danh_gia;";
    $so_danhgia = pdo_query_one($sql);
    return $so_danhgia;
}
function so_khachhang()
{
    $sql = "SELECT COUNT(*) AS SoLuongKhachHang FROM khach_hang;";
    $so_khachhang = pdo_query_one($sql);
    return $so_khachhang;
}
function so_donphong()
{
    $sql = "SELECT COUNT(*) AS SoLuongDonPhong FROM don_phong;";
    $so_donphong = pdo_query_one($sql);
    return $so_donphong;
}
function so_donphonghuy()
{
    $sql = "SELECT COUNT(*) AS SoLuongDonPhongHuy FROM don_phong WHERE trang_thai_don_phong = 4;";
    $so_donphonghuy = pdo_query_one($sql);
    return $so_donphonghuy;
}
function tong_tien_donphong()
{
    $sql = "SELECT SUM(tong_tien) AS TongTien FROM don_phong WHERE trang_thai_don_phong IN (2, 3, 5);";
    $tong_tien = pdo_query_one($sql);
    return $tong_tien;
}
