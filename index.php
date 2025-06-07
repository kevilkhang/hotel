<?php
session_start();
include "model/pdo.php";
include "model/phong.php";
include "model/tiennghi.php";
include "model/coso.php";
include "model/loaiphong.php";
include "model/giaodien.php";
include "model/taikhoan.php";
include "model/donphong.php";
include "model/danhgia.php";
include "model/tintuc.php";
include './process_send_mail.php';
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        // case 'home':
        //     $list_rooms = list_phong_giaodien();
        //     $list_tiennghi_giaodien = list_tiennghi_giaodien();
        //     $list_danhgia = list_danhgia();
        //     include "inc/home.php";
        //     break;
        case 'rooms':
            $list_coso_tren = list_coso();
            $list_tiennghi_tren = list_tiennghi();
            $list_rooms = list_phong();
            include "inc/rooms.php";
            break;
        case 'singin':
            if (isset($_POST['singin']) && ($_POST['singin'])) {
                $ho_ten = $_POST['name'];
                $ten_dn = $_POST['ten_dn'];
                $mat_khau = $_POST['password'];
                $nhap_lai_password = $_POST['nhap_lai_password'];
                $email = $_POST['email'];
                $target_dir = "upload/";
                $hinh = basename($_FILES["hinh"]["name"]);
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (!empty($hinh)) {
                    // Hình không rỗng, có tệp đã tải lên
                    if (file_exists($target_file)) {
                        $hinh = basename($_FILES["hinh"]["name"]);
                    } else {
                        if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                            // Tải lên tệp tin mới thành công
                            $newFileName = basename($_FILES["hinh"]["name"]);
                            $hinh = $newFileName;
                        } else {
                            $loi["loianh"] = "Xin lỗi, tải ảnh lên không thành công.";
                        }
                    }
                } else {
                    $hinh = "anhdaidien.jpg";
                }
                if (check_tendangnhap($ten_dn)) {
                    $loi["ten"] = "Tên đăng nhập đã tồn tại.";
                }
                if ($mat_khau != $nhap_lai_password) {
                    $loi["mk"] = "Mật khẩu không khớp. Vui lòng nhập lại!";
                }
                if (empty($loi)) {
                    $id_khachhang = them_tai_khoan($ho_ten, $ten_dn, $mat_khau, $email, $hinh);
                    $khach_hang = array(
                        'id' => $id_khachhang,
                        'vai_tro' => $vai_tro = 0,
                        'ho_ten' => $ho_ten,
                        'sdt' => $sdt = "",
                        'ten_dn' => $ten_dn,
                        'mat_khau' => $mat_khau,
                        'email' => $email,
                        'hinh' => $hinh
                    );
                    $_SESSION['khach_hang'] = $khach_hang;
                    echo '<meta http-equiv="refresh" content="0;url=index.php">';
                }
            }
            $list_rooms = list_phong_giaodien();
            $list_tiennghi_giaodien = list_tiennghi_giaodien();
            include "inc/home.php";
            break;
        case 'login':
            if (isset($_POST['login']) && ($_POST['login'])) {
                $ten_dn = $_POST['ten_dn'];
                $mat_khau = $_POST['mat_khau'];
                $trang_thai = 0;
                $check_dn = check_taikhoan($ten_dn, $mat_khau, $trang_thai);
                if (is_array($check_dn)) {
                    $_SESSION['khach_hang'] = $check_dn;
                    echo '<meta http-equiv="refresh" content="0;url=index.php">';
                } else {
                    $loi["dangnhap"] = "Đăng Nhập Không Thành Công.";
                }
                $list_rooms = list_phong_giaodien();
                $list_tiennghi_giaodien = list_tiennghi_giaodien();
                include "inc/home.php";
            }
            break;
        case 'thoat':
            if (isset($_SESSION['khach_hang'])) {
                unset($_SESSION['khach_hang']);
            }
            echo '<meta http-equiv="refresh" content="0;url=index.php">';
            break;
        case 'dat_phong':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
                $dat_phong = sua_phong($id);
                include "inc/confirm.php";
            } else {
                $list_rooms = list_phong_giaodien();
                $list_tiennghi_giaodien = list_tiennghi_giaodien();
                include "inc/home.php";
            }
            break;
        case 'ok_datphong':
            if (isset($_POST['chot_datphong']) && $_POST['chot_datphong']) {
                $hoTen = $_POST['ho_ten'];
                $soDienThoai = $_POST['sdt'];
                $soCccd = $_POST['cccd'];
                $ngayNhanPhong = $_POST['ngay_nhanphong'];
                $ngayTraPhong = $_POST['ngay_traphong'];
                $id_Phong = $_POST['id_phong'];
                $id_Khachhang = $_POST['id_kh'];
                $gia_phong = $_POST['gia_phong'];
                $dateTimeNhanPhong = date_create($ngayNhanPhong);
                $dateTimeTraPhong = date_create($ngayTraPhong);
                // Định dạng lại ngày tháng nếu cần
                $ngayNhanPhongFormatted = date_format($dateTimeNhanPhong, 'd/m/Y');
                $ngayTraPhongFormatted = date_format($dateTimeTraPhong, 'd/m/Y');
                $ngayDatPhong = date('d/m/Y'); // Lấy ngày hiện tại
                $soNgay = date_diff($dateTimeNhanPhong, $dateTimeTraPhong)->format("%a");
                $tong_tien = $gia_phong * $soNgay; // Tính tổng số tiền
                them_donphong($id_Phong, $id_Khachhang, $hoTen, $soDienThoai, $soCccd, $ngayNhanPhongFormatted, $ngayTraPhongFormatted, $ngayDatPhong, $soNgay, $tong_tien);
                echo '<script>alert("Đặt Phòng thành công.");</script>';

                if (isset($_SESSION['khach_hang'])) {
                    $id_Khachhang = $_SESSION['khach_hang']['id'];
                    $list_donphong = list_donhang($id_Khachhang);
                }
                include "inc/bookings.php";
            }
            break;
        case 'news':
            $list_tintuc = list_tintuc();
            include "inc/news.php";
            break;
        case 'contact':
            include "inc/contact.php";
            break;
        case 'about':
            include "inc/about.php";
            break;
        case 'confirm':
            if (isset($_SESSION['khach_hang'])) {
                $id_Khachhang = $_SESSION['khach_hang']['id'];
                $list_donphong = list_donhang($id_Khachhang);
            }
            include "inc/bookings.php";
            break;
        case 'huydonphong':
            if (isset($_POST['huy_donphong']) && $_POST['huy_donphong']) {
                $trang_thai = 4;
                $id = $_POST['id_donphong'];
                capnhat_trangthai($trang_thai, $id);
                echo '<script>alert("Hủy đơn Phòng thành công.");</script>';
            }
            if (isset($_SESSION['khach_hang'])) {
                $id_Khachhang = $_SESSION['khach_hang']['id'];
                $list_donphong = list_donhang($id_Khachhang);
            }
            include "inc/bookings.php";
            break;
        case 'dat_lai':
            if (isset($_POST['datlai_donphong']) && $_POST['datlai_donphong']) {
                $trang_thai = 0;
                $id = $_POST['id_donphong'];
                capnhat_trangthai($trang_thai, $id);
                echo '<script>alert("Đặt lại Phòng thành công.");</script>';
            }
            if (isset($_SESSION['khach_hang'])) {
                $id_Khachhang = $_SESSION['khach_hang']['id'];
                $list_donphong = list_donhang($id_Khachhang);
            }
            include "inc/bookings.php";
            break;
        case 'danh_giaphong':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
                $list_danhgia = sua_donphong($id);
                include "inc/danhgia.php";
            }
            break;
        case 'danhgia_gui':
            if (isset($_POST['danh_gia']) && $_POST['danh_gia']) {
                $id_phong = $_POST['id_phong'];
                $id_Khachhang = $_POST['id_Khachhang'];
                $so_sao = $_POST['rate'];
                $noi_dung = $_POST['noidung'];
                themdanh_gia($id_phong, $id_Khachhang, $so_sao, $noi_dung);
                $trang_thai = 5;
                $id_donphong = $_POST['id_donphong'];
                capnhat_trangthai($trang_thai, $id_donphong);
                echo '<script>alert("Đánh giá thành công.");</script>';
                if (isset($_SESSION['khach_hang'])) {
                    $id_Khachhang = $_SESSION['khach_hang']['id'];
                    $list_donphong = list_donhang($id_Khachhang);
                }
                include "inc/bookings.php";
            }
            break;
        case 'sua_donphong':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
                $list_donphong = sua_donphong($id);
                include "inc/sua_donphong.php";
            }
            break;
        case 'capnhat_donphong':
            if (isset($_POST['sua_datphong']) && $_POST['sua_datphong']) {
                $id_donphong = $_POST['id_donphong'];
                $hoTen = $_POST['ho_ten'];
                $soDienThoai = $_POST['sdt'];
                $soCccd = $_POST['cccd'];
                $ngayNhanPhong = $_POST['ngay_nhanphong'];
                $ngayTraPhong = $_POST['ngay_traphong'];
                $gia_phong = $_POST['gia_phong'];
                $dateTimeNhanPhong = date_create($ngayNhanPhong);
                $dateTimeTraPhong = date_create($ngayTraPhong);
                // Định dạng lại ngày tháng nếu cần
                $ngayNhanPhongFormatted = date_format($dateTimeNhanPhong, 'd/m/Y');
                $ngayTraPhongFormatted = date_format($dateTimeTraPhong, 'd/m/Y');
                $soNgay = date_diff($dateTimeNhanPhong, $dateTimeTraPhong)->format("%a");
                $tong_tien = $gia_phong * $soNgay; // Tính tổng số tiền
                capnhat_donphong($hoTen, $soDienThoai, $soCccd, $ngayNhanPhongFormatted, $ngayTraPhongFormatted, $soNgay, $tong_tien, $id_donphong);

                if (isset($_SESSION['khach_hang'])) {
                    $id_Khachhang = $_SESSION['khach_hang']['id'];
                    $list_donphong = list_donhang($id_Khachhang);
                }
                include "inc/bookings.php";
            }
            break;
        case 'chi_tiet':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
                $list_chitietphong = sua_phong($id);
                include "inc/detail.php";
            }
            break;
        case 'chi_tiet_tin_tuc':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
                $listchitiet_tintuc = sua_tintuc($id);
                extract($listchitiet_tintuc);
                $luot_xem = $so_luot_xem + 1;
                capnhat_luotxem($luot_xem, $id);
                include "inc/chitiettintuc.php";
            }
            break;
        case 'capnhat':
            if (isset($_POST['capnhatthongtin']) && ($_POST['capnhatthongtin'])) {
                $id = $_POST['id'];
                $ten_dn = $_POST['ten_dn'];
                $ten_dncu = $_POST['ten_dncu'];
                $mat_khau = $_POST['mat_khau'];
                $sdt = $_POST['phone'];
                $ho_ten = $_POST['ho_ten'];
                $email = $_POST['email'];
                $target_dir = "upload/";
                $hinh = basename($_FILES["hinh"]["name"]);
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (!empty($hinh)) {

                    if (file_exists($target_file)) {
                        $hinh = basename($_FILES["hinh"]["name"]);
                    } else {
                        if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                            // Tải lên tệp tin mới thành công
                            $newFileName = basename($_FILES["hinh"]["name"]);
                            $hinh = $newFileName;
                        } else {
                            $loi["loianh"] = "Xin lỗi, tải ảnh lên không thành công.";
                        }
                    }
                } else {
                    // Hình rỗng, không có tệp đã tải lên
                    $hinh = "";
                }
                if ($ten_dncu == $ten_dn) {
                    capnhat_khachhang_giadien($ten_dn, $ho_ten, $hinh, $email, $sdt, $id);
                    $trang_thai = 0;
                    $_SESSION['khach_hang'] = check_taikhoan($ten_dn, $mat_khau, $trang_thai);

                    echo '<meta http-equiv="refresh" content="0;url=index.php">';
                } else {
                    if (check_tendangnhap($ten_dn)) {
                        $loi["ten"] = "Tên đăng nhập đã tồn tại.";
                    }
                    if (empty($loi)) {
                        capnhat_khachhang_giadien($ten_dn, $mat_khau, $ho_ten, $hinh, $email, $id, $sdt);
                        $trang_thai = 0;
                        $_SESSION['khach_hang'] = check_taikhoan($ten_dn, $mat_khau, $trang_thai);
                        echo '<meta http-equiv="refresh" content="0;url=index.php">';
                    }
                }
            }
            include "inc/capnhatthongtin.php";
            break;
        case 'doimk':
            if (isset($_POST['doi_mk']) && ($_POST['doi_mk'])) {
                $id = $_POST['id'];
                $ten_dn = $_POST['ten_dn'];
                $mk_cu = $_POST['mk_cu'];
                $mat_khaucu = $_POST['mat_khaucu'];
                $mk_moi = $_POST['mk_moi'];
                $xacnhan_mk_moi = $_POST['xacnhan_mk_moi'];
                if ($mk_cu !== $mat_khaucu) {
                    $loi["mkcu"] = "Mật khẩu cũ không chính xác";
                } else {
                    if ($mk_moi !== $xacnhan_mk_moi) {
                        $loi["xacnhanmk"] = "Mật khẩu xác nhận không khớp";
                    } else {
                        if ($mk_moi == $mat_khaucu && $mat_khaucu == $xacnhan_mk_moi) {
                            $loi["mk_cu==moi"] = "Mật khẩu mới không được giống mật khẩu cũ";
                        }
                    }
                }
                if (empty($loi)) {
                    capnhat_matkhau($mk_moi, $id);
                    $trang_thai = 0;
                    $_SESSION['khach_hang'] = check_taikhoan($ten_dn, $mk_moi, $trang_thai);
                    echo '<script>alert("Cập nhật thành công.");</script>';
                    echo '<meta http-equiv="refresh" content="0;url=index.php">';
                }
            }
            include "inc/doimk.php";
            break;
        case 'forgot_password':
            if (isset($_POST['forgot_password']) && ($_POST['forgot_password'])) {
                $email = $_POST['email'];
                if (check_email($email)) {
                    $khach_hang = khachhang_email($email);
                    extract($khach_hang);
                    $noi_dung = "Chào $ho_ten,

                    Chúng tôi hy vọng bạn đang có một ngày tốt lành.
                    
                    Thông qua thư này, chúng tôi xin gửi đến bạn thông tin liên quan đến tài khoản của bạn:
                    
                    Tên đăng nhập: $ten_dn
                    Mật khẩu: $mat_khau
                    
                    Vui lòng lưu ý rằng thông tin trên là quan trọng và cần được bảo mật. Chúng tôi khuyến nghị bạn không chia sẻ thông tin này với bất kỳ ai khác và đảm bảo rằng chỉ bạn mới có quyền truy cập vào tài khoản của mình.";
                    // echo '<script>alert("có email.");</script>';
                    send_email($email, $noi_dung, $ho_ten);
                    echo '<script>alert("Thông tin tài khoản đã được gửi vào mail bạn.");</script>';
                    echo '<meta http-equiv="refresh" content="0;url=index.php">';
                } else {
                    $loi["email"] = "Email chưa đăng ký tài khoản!";
                    $list_rooms = list_phong_giaodien();
                    $list_tiennghi_giaodien = list_tiennghi_giaodien();
                    include "inc/home.php";
                }
            }
            break;
        default:
            $list_danhgia = list_danhgia();
            $list_rooms = list_phong_giaodien();
            $list_tiennghi_giaodien = list_tiennghi_giaodien();
            include "inc/home.php";
            break;
    }
} else {
    $list_danhgia = list_danhgia();
    $list_rooms = list_phong_giaodien();
    $list_tiennghi_giaodien = list_tiennghi_giaodien();
    include "inc/home.php";
}
