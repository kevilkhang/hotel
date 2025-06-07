<?php
function them_donphong($id_phong, $id_Khachhang, $hoTen, $soDienThoai, $soCccd, $ngayNhanPhongFormatted, $ngayTraPhongFormatted, $ngayDatPhong, $soNgay, $tong_tien)
{
    $sql = "INSERT INTO don_phong (id_phong,id_khachhang ,ho_ten, sdt, cccd, ngay_nhanphong,ngay_traphong, ngay_datphong ,so_ngay_o,tong_tien) 
            VALUES ('$id_phong','$id_Khachhang', '$hoTen', '$soDienThoai', '$soCccd', '$ngayNhanPhongFormatted', '$ngayTraPhongFormatted', '$ngayDatPhong','$soNgay', '$tong_tien')";
    pdo_execute($sql);
}
function list_donhang($id_Khachhang)
{
    $sql = "SELECT * FROM don_phong WHERE id_khachhang='$id_Khachhang'order by id desc";
    $result = pdo_query($sql);
    return $result;
}
function list_donphong_all()
{
    $sql = "SELECT * FROM don_phong ORDER BY id";
    $result = pdo_query($sql);
    return $result;
}
function capnhat_trangthai($trangthai, $id)
{
    $sql = "UPDATE don_phong SET trang_thai_don_phong = '$trangthai' WHERE id = '$id'";
    pdo_execute($sql);
}
function sua_donphong($id)
{
    $sql = "SELECT * FROM don_phong WHERE id='$id'";
    $result = pdo_query_one($sql);
    return $result;
}
function capnhat_donphong($hoTen, $soDienThoai, $soCccd, $ngayNhanPhongFormatted, $ngayTraPhongFormatted, $soNgay, $tong_tien, $id_donphong)
{
    $sql = "UPDATE don_phong SET ho_ten='$hoTen', sdt='$soDienThoai', cccd='$soCccd', ngay_nhanphong='$ngayNhanPhongFormatted',ngay_traphong='$ngayTraPhongFormatted',so_ngay_o='$soNgay',tong_tien='$tong_tien' WHERE id= '$id_donphong'";
    pdo_execute($sql);
}
function list_donphong_trangthai($trang_thai)
{
    $sql = "SELECT * FROM don_phong WHERE trang_thai_don_phong='$trang_thai'order by id desc";
    $result = pdo_query($sql);
    return $result;
}
function tinhSoNgayDenNgay($ngayTruyenVao)
{
    $ngayHienTai = new DateTime('now');

    $ngayNhapVao = DateTime::createFromFormat('d/m/Y', $ngayTruyenVao);

    $soNgayChenhLech = $ngayHienTai->diff($ngayNhapVao)->format('%r%a');

    return $soNgayChenhLech + 1;
}
function getTrangThaiMessageAndClass($trang_thai)
{
    switch ($trang_thai) {
        case 0:
            $span1 = '<span class="choxacnhan">Chờ xác nhận</span> <br>';
            $span2 = '';
            break;
        case 1:
            $span1 = '<span class="daxacnhan">Đã xác nhận</span> <br>';
            $span2 = '';
            break;
        case 2:
            $span1 = '<span class="dathanhtoan">Đã thanh toán</span> <br>';
            $span2 = '<span class="danhanphong">Đã nhận phòng</span> <br>';
            break;
        case 3:
            $span1 = '<span class="datraphong">Đã trả phòng</span> <br>';
            $span2 = '<span class="chodanhgia">Chờ đánh giá</span> <br>';
            break;
        case 4:
            $span1 = '<span class="dahuyphong">Hủy phòng</span> <br>';
            $span2 = '';
            break;
        case 5:
            $span1 = '<span class="dadanhgia">Đã đánh giá</span> <br>';
            $span2 = '';
            break;
        default:
            $span1 = '<span class="trangthaikoxacdinh">Trạng thái không xác định</span> <br>';
            $span2 = '';
            break;
    }
    return array('span1' => $span1, 'span2' => $span2);
}
