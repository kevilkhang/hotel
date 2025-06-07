<?php
include "../model/pdo.php";
include "../model/loaiphong.php";
include "../model/tiennghi.php";
include "../model/coso.php";
include "../model/phong.php";
include "../model/taikhoan.php";
include "../model/donphong.php";
include "../model/danhgia.php";
include "../model/binhluan.php";
include "../model/tintuc.php";
include "../model/thongke.php";

include "header.php";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'danhs_loaiphong':
            $result = list_loaiphong();
            include "loaiphong/danhsachloaiphong.php";
            break;
        case 'themloaiphong':
            include "loaiphong/themloaiphong.php";
            break;
        case 'addloaiphong':
            // kiểm tra người dùng có kick vào thêm hay o
            if (isset($_POST['addloaiphong']) && ($_POST['addloaiphong'])) {
                $ten_loaiphong = $_POST['ten_loaiphong'];
                if (check_loaiphong($ten_loaiphong)) {
                    $loi["loi"] = "Tên Loại phòng đã tồn tại.";
                } else {
                    if (empty($loi)) {
                        them_loaiphong($ten_loaiphong);
                        $thongbao = 'Thêm thành công';
                    }
                }
            }
            $result = list_loaiphong();
            include "loaiphong/themloaiphong.php";
            break;
        case 'xoa_loaiphong':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $xoaId = $_GET['id'];
                xoa_loaiphong($xoaId);
            }
            $result = list_loaiphong();
            include "loaiphong/danhsachloaiphong.php";
            break;
        case 'sua_loaiphong':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
                $result = sua_loaiphong($id);
            }
            include "loaiphong/capnhat.php";
            break;
        case 'capnhatloaiphong':
            if (isset($_POST['capnhatloaiphong']) && ($_POST['capnhatloaiphong'])) {
                $id = $_POST["id"];
                $ten_loaiphong = $_POST["ten_loaiphong"];
                $loaiphong_check = $_POST["loai_phong"];
                if (empty($ten_loaiphong)) {
                    $loi["loi"] = "Nhập tên loại hàng";
                    $result = sua_loaiphong($id);
                    include "loaiphong/capnhat.php";
                }
                if (empty($loi)) {
                    if ($ten_loaiphong == $loaiphong_check) {
                        capnhat_loaiphong($ten_loaiphong, $id);
                        echo '<script>alert("Cập nhật thành công.");</script>';
                        $result = list_loaiphong();
                        include "loaiphong/danhsachloaiphong.php";
                    } else {
                        if (check_loaiphong($ten_loaiphong)) {
                            $loi["loi"] = "Tên Loại phòng đã tồn tại.";
                            $result = sua_loaiphong($id);
                            include "loaiphong/capnhat.php";
                        } else {
                            if (empty($loi)) {
                                capnhat_loaiphong($ten_loaiphong, $id);
                                echo '<script>alert("Cập nhật thành công.");</script>';
                                $result = list_loaiphong();
                                include "loaiphong/danhsachloaiphong.php";
                            }
                        }
                    }
                }
            }
            break;
        case 'danhs_tiennghi':
            $result = list_tiennghi();
            include "tiennghi/danhsachtiennghi.php";
            break;
        case 'themtiennghi':
            if (isset($_POST['addtiennghi']) && ($_POST['addtiennghi'])) {
                $ten_tiennghi = $_POST['ten_tiennghi'];
                if (check_tiennghi($ten_tiennghi)) {
                    $loi["ten"] = "Tên tiện nghi đã tồn tại.";
                }
                $mo_ta = $_POST['mota'];

                $target_dir = "../upload/";
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
                    $loi["loianh"] = "Vui lòng chọn hình ảnh.";
                }
                if (empty($loi)) {
                    them_tien_nghi($ten_tiennghi, $hinh, $mo_ta);
                    $loi["thanhcong"] = "Thêm thành công.";
                }
            }
            include "tiennghi/themtiennghi.php";
            break;
        case 'xoa_tiennghi':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $xoaId = $_GET['id'];
                xoa_tiennghi($xoaId);
            }
            $result = list_tiennghi();
            include "tiennghi/danhsachtiennghi.php";
            break;
        case 'sua_tiennghi':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
                $result = sua_tiennghi($id);
            }
            include "tiennghi/capnhat.php";
            break;
        case 'capnhattiennghi':
            if (isset($_POST['capnhattiennghi']) && ($_POST['capnhattiennghi'])) {
                $id = $_POST['id'];
                $ten_tiennghi = $_POST['ten_tiennghi'];
                $tiennghi_check = $_POST['tiennghi_check'];
                $mo_ta = $_POST['mota'];

                $target_dir = "../upload/";
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
                    $hinh = '';
                }
                if (empty($loi)) {
                    if ($ten_tiennghi == $tiennghi_check) {
                        capnhat_tiennghi($ten_tiennghi, $hinh, $mo_ta, $id);
                        echo '<script>alert("Cập nhật thành công.");</script>';
                        $result = list_tiennghi();
                        include "tiennghi/danhsachtiennghi.php";
                    } else {
                        if (check_tiennghi($ten_tiennghi)) {
                            $loi["ten"] = "Tên tiện nghi đã tồn tại.";
                            $result = sua_tiennghi($id);
                            include "tiennghi/capnhat.php";
                        } else {
                            if (empty($loi)) {
                                capnhat_tiennghi($ten_tiennghi, $hinh, $mo_ta, $id);
                                echo '<script>alert("Cập nhật thành công.");</script>';
                                $result = list_tiennghi();
                                include "tiennghi/danhsachtiennghi.php";
                            }
                        }
                    }
                }
            }
            break;
        case 'danhs_coso':
            $result = list_coso();
            include "coso/danhsachcoso.php";
            break;
        case 'themcoso':
            if (isset($_POST['addcoso']) && ($_POST['addcoso'])) {
                $ten_coso = $_POST['ten_coso'];
                if (check_coso($ten_coso)) {
                    $loi["ten"] = "Tên tiện nghi đã tồn tại.";
                }
                $mo_ta = $_POST['mota'];

                $target_dir = "../upload/";
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
                    $loi["loianh"] = "Vui lòng chọn hình ảnh.";
                }
                if (empty($loi)) {
                    them_co_so($ten_coso, $hinh, $mo_ta);
                    $loi["thanhcong"] = "Thêm thành công.";
                }
            }
            include "coso/themcoso.php";
            break;
        case 'xoa_coso':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $xoaId = $_GET['id'];
                xoa_coso($xoaId);
            }
            $result = list_coso();
            include "coso/danhsachcoso.php";
            break;
        case 'sua_coso':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
                $result = sua_coso($id);
            }
            include "coso/capnhat.php";
            break;
        case 'capnhatcoso':
            if (isset($_POST['capnhatcoso']) && ($_POST['capnhatcoso'])) {
                $id = $_POST['id'];
                $ten_coso = $_POST['ten_coso'];
                $coso_check = $_POST['coso_check'];
                $mo_ta = $_POST['mota'];

                $target_dir = "../upload/";
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
                    $hinh = '';
                }
                if (empty($loi)) {
                    if ($ten_coso == $coso_check) {
                        capnhat_coso($ten_coso, $hinh, $mo_ta, $id);
                        echo '<script>alert("Cập nhật thành công.");</script>';
                        $result = list_coso();
                        include "coso/danhsachcoso.php";
                    } else {
                        if (check_coso($ten_coso)) {
                            $loi["ten"] = "Tên tiện nghi đã tồn tại.";
                            $result = sua_coso($id);
                            include "coso/capnhat.php";
                        } else {
                            if (empty($loi)) {
                                capnhat_coso($ten_coso, $hinh, $mo_ta, $id);
                                echo '<script>alert("Cập nhật thành công.");</script>';
                                $result = list_coso();
                                include "coso/danhsachcoso.php";
                            }
                        }
                    }
                }
            }
            break;
        case 'phong':
            $result = list_loaiphong();
            $result_coso = list_coso();
            $result_tiennghi = list_tiennghi();
            include "phong/themphong.php";
            break;
        case 'themphong':
            if (isset($_POST['addphong']) && ($_POST['addphong'])) {
                $ma_loaiphong = $_POST['ma_loaiphong'];
                $gia = $_POST['gia'];
                $dien_tich = $_POST['dien_tich'];
                $nguoi_lon = $_POST['nguoilon'];
                $tre_em = $_POST['treem'];
                $mo_ta = $_POST['mota'];

                $target_dir = "../upload/";
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
                    $loi["loianh"] = "Vui lòng chọn hình ảnh.";
                }
                if (empty($loi)) {
                    $id_phong = them_phong($ma_loaiphong, $hinh, $mo_ta, $dien_tich, $gia, $nguoi_lon, $tre_em);
                    $loi["thanhcong"] = "Thêm thành công.";
                    if (isset($_POST['coso'])) {
                        foreach ($_POST['coso'] as $key => $id_coso) {
                            them_cosophong($id_phong, $id_coso);
                        }
                    }
                    if (isset($_POST['tiennghi'])) {
                        foreach ($_POST['tiennghi'] as $key => $id_tienngghi) {
                            them_tiennghiphong($id_phong, $id_tienngghi);
                        }
                    }
                }
            }
            $result = list_loaiphong();
            $result_coso = list_coso();
            $result_tiennghi = list_tiennghi();
            include "phong/themphong.php";
            break;
        case 'danhsachphong':
            $result = list_phong();
            include "phong/danhsachphong.php";
            break;
        case 'xoa_phong':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
                // xoa_tiennghi_idphong($id_phong);
                // xoa_coso_idphong($id_phong);
                xoa_phong($id);
                $result = list_phong();
                include "phong/danhsachphong.php";
            }
            break;
        case 'sua_phong':
            $result1 = list_loaiphong();
            $result_coso = list_coso();
            $result_tiennghi = list_tiennghi();
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
                $result = sua_phong($id);
                $result_phong_coso = lay_co_so_phong($id);
                $result_phong_tiennghi = lay_tien_nghi_phong($id);
            }
            include "phong/capnhat.php";
            break;
        case 'capnhatphong':
            if (isset($_POST['capnhatphong']) && ($_POST['capnhatphong'])) {
                $id_phong = $_POST['id'];
                $ma_loaiphong = $_POST['ma_loaiphong'];
                $trang_thaiphong = $_POST['trang_thaiphong'];
                $gia = $_POST['gia'];
                $dien_tich = $_POST['dien_tich'];
                $nguoi_lon = $_POST['nguoilon'];
                $tre_em = $_POST['treem'];
                $mo_ta = $_POST['mota'];

                $target_dir = "../upload/";
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
                    $hinh = '';
                }
                if (isset($_POST['coso'])) {
                    xoa_coso_idphong($id_phong);
                    foreach ($_POST['coso'] as $key => $id_coso) {
                        them_cosophong($id_phong, $id_coso);
                    }
                } else {
                    xoa_coso_idphong($id_phong);
                }
                if (isset($_POST['tiennghi'])) {
                    xoa_tiennghi_idphong($id_phong);
                    foreach ($_POST['tiennghi'] as $key => $id_tiennghi) {
                        them_tiennghiphong($id_phong, $id_tiennghi);
                    }
                } else {
                    xoa_tiennghi_idphong($id_phong);
                }
                if (empty($loi)) {
                    capnhat_phong($ma_loaiphong, $hinh, $mo_ta, $dien_tich, $gia, $nguoi_lon, $tre_em, $id_phong, $trang_thaiphong);
                    echo '<script>alert("Cập nhật thành công.");</script>';
                    $result = list_phong();
                    include "phong/danhsachphong.php";
                }
            }
            break;
        case 'danhsachkh':
            $result = list_khachhang();
            include "khachhang/danhsachkhachhang.php";
            break;
        case 'sua_khachhang':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
                $result = sua_khachhang($id);
            }
            include "khachhang/capnhat.php";
            break;
        case 'capnhatkhachhang':
            if (isset($_POST['capnhatkhachhang']) && ($_POST['capnhatkhachhang'])) {
                $id = $_POST['id'];
                $trang_thai = $_POST['trang_thai'];
                $vai_tro = $_POST['vai_tro'];
                capnhat_khachhang($vai_tro, $trang_thai, $id);
                $result = list_khachhang();
                include "khachhang/danhsachkhachhang.php";
            } else {
                $result = sua_khachhang($id);
                include "khachhang/capnhat.php";
            }
            break;
        case 'them_taikhoan':
            if (isset($_POST['them_tai_khoan']) && ($_POST['them_tai_khoan'])) {
                $ten_dn = $_POST['ten_dn'];
                $mat_khau = $_POST['mat_khau'];
                $ho_ten = $_POST['ho_ten'];
                $cccd = $_POST['cccd'];
                $email = $_POST['email'];
                $sdt = $_POST['tel'];
                $kich_hoat = $_POST['kich_hoat'];
                $vai_tro = $_POST['vai_tro'];
                $target_dir = "../upload/";
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
                    // Hình rỗng, không có tệp đã tải lên
                    $hinh = "anhdaidien.jpg";
                }
                if (check_tendangnhap($ten_dn)) {
                    $loi["ten"] = "Tên đăng nhập đã tồn tại.";
                    $loi["ten1"] = "Thêm không thành công.";
                }
                if (empty($loi)) {
                    them_tai_khoan2($ten_dn, $mat_khau, $ho_ten, $kich_hoat, $hinh, $email, $sdt, $vai_tro, $cccd);
                    $loi["ten1"] = "Thêm thành công.";
                }
            }
            include "khachhang/themkhachhang.php";
            break;
        case 'phongmoidat':
            $trang_thai = 0;
            $danhsach_donphong = list_donphong_trangthai($trang_thai);
            include "donphong/dansachdonphong.php";
            break;
        case 'hosodatphong':
            $danhsach_donphong = list_donphong_all();
            include "donphong/hosodatphong.php";
            break;
        case 'xacnhanthanhtoan':
            $trang_thai = 1;
            $danhsach_donphong = list_donphong_trangthai($trang_thai);
            include "donphong/dansachdonphong.php";
            break;
        case 'chotraphong':
            $trang_thai = 2;
            $danhsach_donphong = list_donphong_trangthai($trang_thai);
            include "donphong/dansachdonphong.php";
            break;
        case 'xac_nhan':
            if (isset($_POST['xac_nhan_donphong']) && $_POST['xac_nhan_donphong']) {
                $trang_thai = 1;
                $id_donphong = $_POST['id_donphong'];
                capnhat_trangthai($trang_thai, $id_donphong);
            }
            $trang_thai = 0;
            $danhsach_donphong = list_donphong_trangthai($trang_thai);
            include "donphong/dansachdonphong.php";
            break;
        case 'datraphong':
            if (isset($_POST['da_tra_phong']) && $_POST['da_tra_phong']) {
                $trang_thai = 3;
                $id_donphong = $_POST['id_donphong'];
                capnhat_trangthai($trang_thai, $id_donphong);
            }
            $trang_thai = 2;
            $danhsach_donphong = list_donphong_trangthai($trang_thai);
            include "donphong/dansachdonphong.php";
            break;
        case 'xac_nhan_thanh_toan':
            if (isset($_POST['xac_nhan_thanh_toan']) && $_POST['xac_nhan_thanh_toan']) {
                $trang_thai = 2;
                $id_donphong = $_POST['id_donphong'];
                capnhat_trangthai($trang_thai, $id_donphong);
            }
            $trang_thai = 1;
            $danhsach_donphong = list_donphong_trangthai($trang_thai);
            include "donphong/dansachdonphong.php";
            break;
        case 'huy_donphong':
            if (isset($_POST['huy_donphong']) && $_POST['huy_donphong']) {
                $trang_thai = 4;
                $id_donphong = $_POST['id_donphong'];
                capnhat_trangthai($trang_thai, $id_donphong);
            }
            $trang_thai = 0;
            $danhsach_donphong = list_donphong_trangthai($trang_thai);
            include "donphong/dansachdonphong.php";
            break;
        case 'danhgia':
            $list_danhgia = list_danhgia();
            include "danhgia/danhsachdanhgia.php";
            break;
        case 'an_danhgia':
            if (isset($_POST['an_danhgia']) && $_POST['an_danhgia']) {
                $trang_thai = 1;
                $id = $_POST['id_danhgia'];
                trangthai_danhgia($trang_thai, $id);
            }
            $list_danhgia = list_danhgia();
            include "danhgia/danhsachdanhgia.php";
            break;
        case 'hien_danhgia':
            if (isset($_POST['hien_danhgia']) && $_POST['hien_danhgia']) {
                $trang_thai = 0;
                $id = $_POST['id_danhgia'];
                trangthai_danhgia($trang_thai, $id);
            }
            $list_danhgia = list_danhgia();
            include "danhgia/danhsachdanhgia.php";
            break;
        case 'binhluan':
            $list_binhluan = list_binhluan();
            include "binhluan/danhsachbinhluan.php";
            break;
        case 'an_binhluan':
            if (isset($_POST['an_binhluan']) && $_POST['an_binhluan']) {
                $trang_thai = 1;
                $id = $_POST['id_binhluan'];
                trangthai_binhluan($trang_thai, $id);
            }
            $list_binhluan = list_binhluan();
            include "binhluan/danhsachbinhluan.php";
            break;
        case 'hien_binhluan':
            if (isset($_POST['hien_binhluan']) && $_POST['hien_binhluan']) {
                $trang_thai = 0;
                $id = $_POST['id_binhluan'];
                trangthai_binhluan($trang_thai, $id);
            }
            $list_binhluan = list_binhluan();
            include "binhluan/danhsachbinhluan.php";
            break;
        case 'them_tintuc':
            if (isset($_POST['addtintuc']) && ($_POST['addtintuc'])) {
                $tieu_de = $_POST['tieu_de'];
                $mo_ta = $_POST['mo_ta'];
                $noi_dung = $_POST['noi_dung'];
                $ngay_them_tin = date('d-m-Y'); // Lấy ngày hiện tại
                $target_dir = "../upload/";
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
                    $loi["loianh"] = "Vui lòng chọn hình ảnh.";
                }
                if (empty($loi)) {
                    them_tin_tuc($tieu_de, $mo_ta, $noi_dung, $hinh, $ngay_them_tin);
                    $loi["thanhcong"] = "Thêm thành công.";
                }
            }
            include "tintuc/themtintuc.php";
            break;
        case 'danhs_tintuc':
            $result = list_tintuc();
            include "tintuc/danhsachtintuc.php";
            break;
        case 'sua_tintuc':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
                $result = sua_tintuc($id);
            }
            include "tintuc/capnhat.php";
            break;
        case 'xoa_tintuc':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $xoaId = $_GET['id'];
                xoa_tintuc($xoaId);
            }
            $result = list_tintuc();
            include "tintuc/danhsachtintuc.php";
            break;
        case 'capnhat_tintuc':
            if (isset($_POST['capnhattintuc']) && ($_POST['capnhattintuc'])) {
                $id = $_POST['id'];
                $trang_thai = $_POST['trang_thai'];
                $tieu_de = $_POST['tieu_de'];
                $mo_ta = $_POST['mo_ta'];
                $noi_dung = $_POST['noi_dung'];
                $ngay_them_tin = date('d-m-Y'); // Lấy ngày hiện tại
                $target_dir = "../upload/";
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
                    $hinh = '';
                }
                if (empty($loi)) {
                    capnhat_tintuc($tieu_de, $mo_ta, $noi_dung, $hinh, $ngay_them_tin, $trang_thai, $id);
                    echo '<script>alert("Cập nhật thành công.");</script>';
                    $result = list_tintuc();
                    include "tintuc/danhsachtintuc.php";
                }else{
                    $result = sua_tintuc($id);
                    include "tintuc/capnhat.php";
                }
            }

            break;
        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}
include "footer.php";
