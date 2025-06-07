-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `binh_luan` (
  `id` int(11) NOT NULL,
  `id_phong` int(11) DEFAULT NULL,
  `id_khachhang` int(11) DEFAULT NULL,
  `noi_dung` text DEFAULT NULL,
  `ngay_bl` varchar(25) DEFAULT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `binh_luan`
--

INSERT INTO `binh_luan` (`id`, `id_phong`, `id_khachhang`, `noi_dung`, `ngay_bl`, `trang_thai`) VALUES
(7, 6, 1, 'Cũng được chứ chưa được good job cho lắm', '15:44:24 12/12/2023', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `co_so`
--

CREATE TABLE `co_so` (
  `id` int(11) NOT NULL,
  `ten_coso` varchar(255) DEFAULT NULL,
  `hinh` varchar(255) DEFAULT NULL,
  `mo_ta` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `co_so`
--

INSERT INTO `co_so` (`id`, `ten_coso`, `hinh`, `mo_ta`) VALUES
(1, 'Ghế Sofa', 'sofa.png', ''),
(2, 'Bồn Tắm', 'phongtam.jpg', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_gia`
--

CREATE TABLE `danh_gia` (
  `id` int(11) NOT NULL,
  `id_phong` int(11) DEFAULT NULL,
  `id_khachhang` int(11) DEFAULT NULL,
  `so_sao` int(11) DEFAULT NULL,
  `noi_dung` text DEFAULT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_gia`
--

INSERT INTO `danh_gia` (`id`, `id_phong`, `id_khachhang`, `so_sao`, `noi_dung`, `trang_thai`) VALUES
(9, 5, 1, 5, 'Phòng xanh sạch đẹp,rộng ok\r\n', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_phong`
--

CREATE TABLE `don_phong` (
  `id` int(11) NOT NULL,
  `id_phong` int(11) DEFAULT NULL,
  `id_khachhang` int(11) DEFAULT NULL,
  `ngay_datphong` varchar(25) DEFAULT NULL,
  `ngay_nhanphong` varchar(25) DEFAULT NULL,
  `ngay_traphong` varchar(25) DEFAULT NULL,
  `so_luong` int(11) DEFAULT NULL,
  `ho_ten` varchar(100) DEFAULT NULL,
  `sdt` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `cccd` varchar(15) DEFAULT NULL,
  `so_ngay_o` int(11) DEFAULT NULL,
  `tong_tien` decimal(10,0) DEFAULT NULL,
  `trang_thai_don_phong` int(2) DEFAULT 0 COMMENT '0 chờ xac nhan 1 đã xác nhận 2 đã nhận phòng,thanh toan  3 đã trả phòng 4 hủy đặt phòng 5 đã đánh giá \r\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `don_phong`
--

INSERT INTO `don_phong` (`id`, `id_phong`, `id_khachhang`, `ngay_datphong`, `ngay_nhanphong`, `ngay_traphong`, `so_luong`, `ho_ten`, `sdt`, `email`, `cccd`, `so_ngay_o`, `tong_tien`, `trang_thai_don_phong`) VALUES
(20, 6, 1, '12/12/2025', '17/12/2025', '19/12/2025', NULL, 'Trần Văn Hóa', '0356743036', NULL, '049204001363', 2, 400000, 2),
(21, 5, 1, '12/12/2025', '14/12/2025', '20/12/2025', NULL, 'Trần Văn Hóa', '0356743036', NULL, '049204001363', 6, 900000, 5),
(22, 4, 1, '12/12/2025', '23/12/2025', '28/12/2025', NULL, 'Trần Văn Hóa', '0356743036', NULL, '049204001363', 5, 1500000, 0),
(23, 5, 1, '12/12/2025', '19/12/2025', '21/12/2025', NULL, 'Trần Văn Hóa', '0356743036', NULL, '049204001363', 2, 300000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `id` int(11) NOT NULL,
  `ten_dn` varchar(50) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `ho_ten` varchar(100) DEFAULT NULL,
  `hinh` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `vai_tro` int(1) DEFAULT 0,
  `sdt` varchar(15) DEFAULT NULL,
  `cccd` varchar(15) DEFAULT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`id`, `ten_dn`, `mat_khau`, `ho_ten`, `hinh`, `email`, `vai_tro`, `sdt`, `cccd`, `trang_thai`) VALUES
(1, 'vanhoa2k3@', '1234', 'Trần Văn Hóa', 'hoa3.jpg', 'tranvanhoa2341@gmail.com', 1, '0356743036', '049204001363', 0);


-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_phong`
--

CREATE TABLE `loai_phong` (
  `ma_loai` int(11) NOT NULL,
  `ten_loai` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_phong`
--

INSERT INTO `loai_phong` (`ma_loai`, `ten_loai`) VALUES
(2, 'Phòng thường'),
(3, 'Phòng VIP'),
(6, 'Phòng Bình Dân');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong`
--

CREATE TABLE `phong` (
  `id` int(11) NOT NULL,
  `ma_loaiphong` int(11) NOT NULL,
  `hinh` varchar(255) DEFAULT NULL,
  `mo_ta` text DEFAULT NULL,
  `dien_tich` decimal(10,0) DEFAULT NULL,
  `gia_phong` decimal(10,0) DEFAULT NULL,
  `nguoi_lon` int(11) DEFAULT NULL,
  `tre_em` int(11) DEFAULT NULL,
  `trang_thai_phong` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phong`
--

INSERT INTO `phong` (`id`, `ma_loaiphong`, `hinh`, `mo_ta`, `dien_tich`, `gia_phong`, `nguoi_lon`, `tre_em`, `trang_thai_phong`) VALUES
(4, 3, 'phong1.jpg', '<p>12</p>\r\n', 12, 300000, 2, 0, 0),
(5, 2, 'phong3.jpg', '', 12, 150000, 2, 3, 0),
(6, 3, 'phong2.jpg', '<p><span style=\"color:#000000\"><strong><u>M&ocirc; tả</u>&nbsp;:&nbsp;</strong>Ph&ograve;ng BLT được thiết kế tinh tế sang trọng nội thất đầy đủ tiện nghi hiện đại, cửa sổ k&iacute;nh rộng tho&aacute;ng bao qu&aacute;t to&agrave;n cảnh th&agrave;nh phố mang đến cho bạn một kh&ocirc;ng gian thanh b&igrave;nh v&agrave; dễ chịu sẽ l&agrave; sự lựa chọn cho những doanh nh&acirc;n v&agrave; kh&aacute;ch du lịch.</span></p>\r\n\r\n<p><span style=\"color:#000000\">Tầm nh&igrave;n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : đẹp, tho&aacute;ng bao qu&aacute;t th&agrave;nh phố&nbsp;&nbsp;&nbsp;Diện t&iacute;ch ph&ograve;ng&nbsp;: 35m<sup>2</sup></span></p>\r\n\r\n<p><span style=\"color:#000000\">Số lượng người&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 02-03 &nbsp;</span></p>\r\n\r\n<p style=\"text-align:left\"><span style=\"font-size:12px\"><span style=\"color:#4c4c4c\"><span style=\"font-family:Georgia,\"><span style=\"background-color:#ffffff\"><strong><span style=\"color:black\"><span style=\"font-family:Arial\"><span style=\"font-size:small\">C&aacute;c thiết bị theo ph&ograve;ng</span></span></span></strong></span></span></span></span></p>\r\n\r\n<table border=\"1\" bordercolor=\"#ccc\" cellpadding=\"5\" cellspacing=\"0\" style=\"border-collapse:collapse\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"background-color:#ffffff; width:265px\">\r\n			<p style=\"margin-right:28px\"><span style=\"color:#000000\"><span style=\"font-size:14px\"><span style=\"font-family:Arial\">+ Trang thiết bị hiện đại</span></span></span></p>\r\n\r\n			<p style=\"margin-right:28px\"><span style=\"color:#000000\"><span style=\"font-size:14px\"><span style=\"font-family:Arial\">+ Điều h&ograve;a 2 chiều</span></span></span></p>\r\n\r\n			<p style=\"margin-right:-7px\"><span style=\"color:#000000\"><span style=\"font-size:14px\"><span style=\"font-family:Arial\">+ Giường với thiết kế vải đệm mềm v&agrave; mượt</span></span></span></p>\r\n\r\n			<p style=\"margin-right:28px\"><span style=\"color:#000000\"><span style=\"font-size:14px\"><span style=\"font-family:Arial\">+ Thảm trải ph&ograve;ng&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span></span></p>\r\n\r\n			<p style=\"margin-right:28px\"><span style=\"color:#000000\"><span style=\"font-size:14px\"><span style=\"font-family:Arial\">+ R&egrave;m cửa 2 lớp</span></span></span></p>\r\n\r\n			<p style=\"margin-right:28px\"><span style=\"color:#000000\"><span style=\"font-size:14px\"><span style=\"font-family:Arial\">+ Tủ quần &aacute;o</span></span></span></p>\r\n\r\n			<p style=\"margin-right:28px\"><span style=\"color:#000000\"><span style=\"font-size:14px\"><span style=\"font-family:Arial\">+ B&agrave;n tiếp kh&aacute;ch</span></span></span></p>\r\n\r\n			<p style=\"margin-right:28px\"><span style=\"color:#000000\"><span style=\"font-size:14px\"><span style=\"font-family:Arial\">+ B&agrave;n l&agrave;m việc &ndash; gương trang điểm</span></span></span></p>\r\n\r\n			<p style=\"margin-right:28px\"><span style=\"color:#000000\"><span style=\"font-size:14px\"><span style=\"font-family:Arial\">+ Gi&aacute; để h&agrave;nh l&yacute;</span></span></span></p>\r\n\r\n			<p><span style=\"color:#000000\"><span style=\"font-size:14px\"><span style=\"font-family:Arial\">+ Tủ đầu giường</span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#ffffff; width:235px\">\r\n			<p style=\"margin-right:-12px\"><span style=\"color:#000000\"><span style=\"font-size:14px\"><span style=\"font-family:Arial\">+ Tủ lạnh</span></span></span></p>\r\n\r\n			<p style=\"margin-right:-12px\"><span style=\"color:#000000\"><span style=\"font-size:14px\"><span style=\"font-family:Arial\">+ Tivi LCD Sony 32 inchs&nbsp;</span></span></span></p>\r\n\r\n			<p style=\"margin-right:-12px\"><span style=\"color:#000000\"><span style=\"font-size:14px\"><span style=\"font-family:Arial\">+ Dịch vụ điện thoại trong nước v&agrave; quốc tế</span></span></span></p>\r\n\r\n			<p style=\"margin-right:28px\"><span style=\"color:#000000\"><span style=\"font-size:14px\"><span style=\"font-family:Arial\">+ Dịch vụ&nbsp; wifi trong ph&ograve;ng miễn ph&iacute;<br />\r\n			+ Ph&ograve;ng tắm rộng</span></span></span></p>\r\n\r\n			<p style=\"margin-right:28px\"><span style=\"color:#000000\"><span style=\"font-size:14px\"><span style=\"font-family:Arial\">+ Buồng tắm ri&ecirc;ng biệt v&agrave; c&acirc;y sen đứng</span></span></span></p>\r\n\r\n			<p><span style=\"color:#000000\"><span style=\"font-size:14px\"><span style=\"font-family:Arial\">+ Tiện nghi đồ d&ugrave;ng ph&ograve;ng tắm theo phong c&aacute;ch Hoa Đ&agrave;o</span></span></span></p>\r\n\r\n			<p style=\"margin-right:28px\"><span style=\"color:#000000\"><span style=\"font-size:14px\"><span style=\"font-family:Arial\">+ M&aacute;y sấy t&oacute;c</span></span></span></p>\r\n\r\n			<p style=\"margin-right:28px\"><span style=\"color:#000000\"><span style=\"font-size:14px\"><span style=\"font-family:Arial\">+ Bảng nội quy v&agrave; hướng dẫn sử dụng thiết bị v&agrave; dịch vụ</span></span></span></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 32, 200000, 4, 2, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong_coso`
--

CREATE TABLE `phong_coso` (
  `id` int(11) NOT NULL,
  `id_phong` int(11) DEFAULT NULL,
  `id_coso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phong_coso`
--

INSERT INTO `phong_coso` (`id`, `id_phong`, `id_coso`) VALUES
(54, 6, 2),
(55, 6, 1),
(58, 5, 2),
(59, 5, 1),
(61, 4, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong_tiennghi`
--

CREATE TABLE `phong_tiennghi` (
  `id` int(11) NOT NULL,
  `id_phong` int(11) DEFAULT NULL,
  `id_tiennghi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phong_tiennghi`
--

INSERT INTO `phong_tiennghi` (`id`, `id_phong`, `id_tiennghi`) VALUES
(55, 6, 3),
(57, 5, 3),
(60, 4, 3),
(61, 4, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tien_nghi`
--

CREATE TABLE `tien_nghi` (
  `id` int(11) NOT NULL,
  `ten_tiennghi` varchar(255) DEFAULT NULL,
  `hinh` varchar(255) DEFAULT NULL,
  `mo_ta` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tien_nghi`
--

INSERT INTO `tien_nghi` (`id`, `ten_tiennghi`, `hinh`, `mo_ta`) VALUES
(1, 'Wifi', 'wiffi.png', ''),
(3, 'Máy Lọc Không Khí', 'may-loc-khong-khi-icon-300x300.png', ''),
(4, 'Điều hòa', 'dieuhoa.jpg', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tin_tuc`
--

CREATE TABLE `tin_tuc` (
  `id` int(11) NOT NULL,
  `tieu_de` varchar(500) NOT NULL,
  `mo_ta` text NOT NULL,
  `hinh_mota` text NOT NULL,
  `noi_dung` longtext NOT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 0,
  `ngay_dang` varchar(25) NOT NULL,
  `so_luot_xem` int(12) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tin_tuc`
--

INSERT INTO `tin_tuc` (`id`, `tieu_de`, `mo_ta`, `hinh_mota`, `noi_dung`, `trang_thai`, `ngay_dang`, `so_luot_xem`) VALUES
(1, 'Du lịch Đà Nẵng: Top 5 hoạt động dành cho cặp đôi (26/10/2023)', 'Những bãi cát trắng mịn, cảnh quan thiên nhiên lãng mạn và không gian yên bình, Đà Nẵng đã trở thành một điểm đến ưa thích của các cặp đôi đang tìm kiếm không gian riêng tư. Với một loạt các hoạt động thú vị và những điểm đến hấp dẫn, Đà Nẵng chính là nơi lý tưởng để tận hưởng những khoảnh khắc lãng mạn và tạo thêm những kỷ niệm đáng nhớ. Trong bài viết này, khách sạn biển NALOD DA NANG sẽ gợi ý cho bạn qua 05 trải nghiệm đặc biệt dành riêng cho các cặp đôi đến du lịch tại Đà Nẵng, nơi tình yêu và kỷ niệm sẽ được thăng hoa.', '22Du-lich-cap-doi-tai-Da-Nang.jpg', '<h1>Du lịch Đ&agrave; Nẵng: Top 5 hoạt động d&agrave;nh cho cặp đ&ocirc;i (26/10/2023)</h1>\r\n\r\n<p>Những b&atilde;i c&aacute;t trắng mịn, cảnh quan thi&ecirc;n nhi&ecirc;n l&atilde;ng mạn v&agrave; kh&ocirc;ng gian y&ecirc;n b&igrave;nh, Đ&agrave; Nẵng đ&atilde; trở th&agrave;nh một điểm đến ưa th&iacute;ch của c&aacute;c cặp đ&ocirc;i đang t&igrave;m kiếm kh&ocirc;ng gian ri&ecirc;ng tư. Với một loạt c&aacute;c hoạt động th&uacute; vị v&agrave; những điểm đến hấp dẫn, Đ&agrave; Nẵng ch&iacute;nh l&agrave; nơi l&yacute; tưởng để tận hưởng những khoảnh khắc l&atilde;ng mạn v&agrave; tạo th&ecirc;m những kỷ niệm đ&aacute;ng nhớ. Trong b&agrave;i viết n&agrave;y, kh&aacute;ch sạn biển NALOD DA NANG sẽ gợi &yacute; cho bạn qua 05 trải nghiệm đặc biệt d&agrave;nh ri&ecirc;ng cho c&aacute;c cặp đ&ocirc;i đến du lịch tại Đ&agrave; Nẵng, nơi t&igrave;nh y&ecirc;u v&agrave; kỷ niệm sẽ được thăng hoa.<br />\r\n<br />\r\n<strong>1. Cầu t&igrave;nh y&ecirc;u </strong><br />\r\nĐ&agrave; Nẵng kh&ocirc;ng chỉ l&agrave; nơi của những b&atilde;i biển tuyệt vời, m&agrave; c&ograve;n l&agrave; nơi của những c&acirc;u chuyện t&igrave;nh y&ecirc;u đẹp nhất. Cầu t&igrave;nh y&ecirc;u l&agrave; một địa điểm hẹn h&ograve; l&atilde;ng mạn nổi tiếng. Sở dĩ c&acirc;y cầu huyền thoại n&agrave;y mang t&ecirc;n &ldquo;t&igrave;nh y&ecirc;u&rdquo; l&agrave; bởi v&igrave; khi du kh&aacute;ch đến đ&acirc;y c&oacute; thể mua cho m&igrave;nh một cặp kh&oacute;a, viết t&ecirc;n m&igrave;nh l&ecirc;n kh&oacute;a v&agrave; gắn ch&uacute;ng v&agrave;o c&acirc;y cầu t&igrave;nh y&ecirc;u, như l&agrave; một nh&acirc;n chứng cho t&igrave;nh y&ecirc;u đẹp của 2 người. D&agrave;nh cho bạn v&agrave; người y&ecirc;u những khoảnh khắc ngọt ng&agrave;o dưới bức tranh ho&agrave;ng h&ocirc;n lung linh, đặt bước ch&acirc;n l&ecirc;n cầu v&agrave; gửi đi những ước nguyện về tương lai hạnh ph&uacute;c.<br />\r\n<img alt=\"\" src=\"http://nalod.com.vn/uploads/image/Cau-tinh-yeu-tai-Da-Nang.jpg\" /><br />\r\n<strong>2. Ngắm b&igrave;nh minh tr&ecirc;n biển Mỹ Kh&ecirc; </strong><br />\r\nKhi mặt trời l&oacute; dạng sau đường ch&acirc;n trời v&agrave; mang theo những tia s&aacute;ng đầu ti&ecirc;n của ng&agrave;y, c&ugrave;ng ở b&ecirc;n người thương tận hưởng khoảnh khắc ngọt ng&agrave;o v&agrave; bắt đầu một ng&agrave;y mới chắc chắn l&agrave; trải nghiệm bạn kh&ocirc;ng thể bỏ lỡ trong chuyến du lịch của cả hai.<br />\r\n<img alt=\"\" src=\"http://nalod.com.vn/uploads/image/Ngam-binh-minh-tai-Da-Nang.jpg\" /><br />\r\n<strong>3. Bữa tối l&atilde;ng mạn tại nh&agrave; h&agrave;ng kh&ocirc;ng gian ấm &aacute;p </strong><br />\r\nC&ugrave;ng nhau trải qua một bữa tối l&atilde;ng mạn trong một kh&ocirc;ng gian ấm cũng v&agrave; ho&agrave;n to&agrave;n ri&ecirc;ng tư tại nh&agrave; h&agrave;ng Ocean của NALOD DA NANG sẽ l&agrave; cột mốc đ&aacute;ng nhớ để c&acirc;u chuyện t&igrave;nh của bản v&agrave; nửa kia ph&aacute;t triển hơn nữa. Đ&acirc;y l&agrave; nơi l&yacute; tưởng để bạn v&agrave; người y&ecirc;u thưởng thức những m&oacute;n ăn ngon, trong một kh&ocirc;ng gian y&ecirc;n b&igrave;nh v&agrave; l&atilde;ng mạn. Tại đ&acirc;y, bạn cũng c&oacute; thể c&ugrave;ng &ocirc;n lại những c&acirc;u chuyện kỷ niệm đ&aacute;ng nhớ.<br />\r\n<img alt=\"\" src=\"http://nalod.com.vn/uploads/image/Nha-hang-hen-ho-tai-Da-Nang.jpg\" width=\"1400\" /><br />\r\n<br />\r\n<strong><img alt=\"\" src=\"http://nalod.com.vn/uploads/image/Bua-toi-lang-man-tai-Da-Nang.jpg\" width=\"1400\" /><br />\r\n4. Hẹn h&ograve; ngắm th&agrave;nh phố về đ&ecirc;m </strong><br />\r\nTh&agrave;nh phố Đ&agrave; Nẵng về đ&ecirc;m l&agrave; một bức tranh với những &aacute;nh đ&egrave;n lấp l&aacute;nh. H&atilde;y t&igrave;m một qu&aacute;n cafe y&ecirc;n tĩnh hay chổ ngồi tr&ecirc;n du thuyền để c&ugrave;ng hẹn h&ograve; ngắm nh&igrave;n Đ&agrave; Nẵng buổi tối. L&agrave; th&agrave;nh phố của những c&acirc;y cầu, Đ&agrave; Nẵng về đ&ecirc;m tr&agrave;n ngập s&ocirc;i động v&agrave; n&aacute;o nhiệt ở hai b&ecirc;n bờ, h&ograve;a c&ugrave;ng sự lung linh của những c&acirc;y cầu nổi tiếng của th&agrave;nh phố khiến bao cặp đ&ocirc;i gh&eacute; thăm đều phải cho&aacute;ng ngợp. Đ&acirc;y sẽ l&agrave; khoảnh khắc đ&aacute;ng nhớ khi bạn v&agrave; người y&ecirc;u chia sẻ khoảnh khắc v&agrave; những cảm x&uacute;c dưới bức tranh về đ&ecirc;m của th&agrave;nh phố n&agrave;y.<br />\r\n<img alt=\"\" src=\"http://nalod.com.vn/uploads/image/Ngam-thanh-pho-ve-dem-tai-Da-Nang.jpg\" width=\"1400\" /><br />\r\n<strong>5. Rạp chiếu phim ri&ecirc;ng tư </strong><br />\r\nNếu bạn v&agrave; người y&ecirc;u l&agrave; những người y&ecirc;u th&iacute;ch điện ảnh, Đ&agrave; Nẵng cũng sở hữu h&agrave;ng loạt rạp chiếu phim ri&ecirc;ng tư, nơi bạn c&oacute; thể xem c&aacute;c bộ phim y&ecirc;u th&iacute;ch m&agrave; kh&ocirc;ng bị gi&aacute;n đoạn. Chia sẻ cảm x&uacute;c v&agrave; những tr&agrave;ng cười trong kh&ocirc;ng gian ri&ecirc;ng tư n&agrave;y sẽ l&agrave;m cho buổi hẹn h&ograve; của bạn trở n&ecirc;n đặc biệt v&agrave; đ&aacute;ng nhớ.<br />\r\n<img alt=\"\" src=\"http://nalod.com.vn/uploads/image/Hen-ho-rap-chieu-phim-tai-Da-Nang.jpg\" width=\"1400\" /><br />\r\nTại Đ&agrave; Nẵng, mỗi khoảnh khắc hẹn h&ograve; trở n&ecirc;n đặc biệt dưới bức m&agrave;n đ&ecirc;m lung linh hay dưới b&igrave;nh minh tĩnh lặng của biển cả. H&atilde;y để th&agrave;nh phố n&agrave;y trở th&agrave;nh nơi chứa đựng những chuyến phi&ecirc;u lưu t&igrave;nh y&ecirc;u kh&ocirc;ng ngừng v&agrave; những kỷ niệm đ&aacute;ng nhớ của bạn v&agrave; người ấy.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 0, '01-12-2023', 6);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_phong` (`id_phong`),
  ADD KEY `id_khachhang` (`id_khachhang`);

--
-- Chỉ mục cho bảng `co_so`
--
ALTER TABLE `co_so`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_phong` (`id_phong`),
  ADD KEY `id_khachhang` (`id_khachhang`);

--
-- Chỉ mục cho bảng `don_phong`
--
ALTER TABLE `don_phong`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_phong` (`id_phong`),
  ADD KEY `id_khachhang` (`id_khachhang`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loai_phong`
--
ALTER TABLE `loai_phong`
  ADD PRIMARY KEY (`ma_loai`);

--
-- Chỉ mục cho bảng `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ma_loaiphong` (`ma_loaiphong`);

--
-- Chỉ mục cho bảng `phong_coso`
--
ALTER TABLE `phong_coso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_phong` (`id_phong`),
  ADD KEY `id_coso` (`id_coso`);

--
-- Chỉ mục cho bảng `phong_tiennghi`
--
ALTER TABLE `phong_tiennghi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_phong` (`id_phong`),
  ADD KEY `id_tiennghi` (`id_tiennghi`);

--
-- Chỉ mục cho bảng `tien_nghi`
--
ALTER TABLE `tien_nghi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tin_tuc`
--
ALTER TABLE `tin_tuc`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `co_so`
--
ALTER TABLE `co_so`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `don_phong`
--
ALTER TABLE `don_phong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `loai_phong`
--
ALTER TABLE `loai_phong`
  MODIFY `ma_loai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `phong`
--
ALTER TABLE `phong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `phong_coso`
--
ALTER TABLE `phong_coso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT cho bảng `phong_tiennghi`
--
ALTER TABLE `phong_tiennghi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT cho bảng `tien_nghi`
--
ALTER TABLE `tien_nghi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tin_tuc`
--
ALTER TABLE `tin_tuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `binh_luan_ibfk_1` FOREIGN KEY (`id_phong`) REFERENCES `phong` (`id`),
  ADD CONSTRAINT `binh_luan_ibfk_2` FOREIGN KEY (`id_khachhang`) REFERENCES `khach_hang` (`id`);

--
-- Các ràng buộc cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD CONSTRAINT `danh_gia_ibfk_1` FOREIGN KEY (`id_phong`) REFERENCES `phong` (`id`),
  ADD CONSTRAINT `danh_gia_ibfk_2` FOREIGN KEY (`id_khachhang`) REFERENCES `khach_hang` (`id`);

--
-- Các ràng buộc cho bảng `don_phong`
--
ALTER TABLE `don_phong`
  ADD CONSTRAINT `don_phong_ibfk_1` FOREIGN KEY (`id_phong`) REFERENCES `phong` (`id`),
  ADD CONSTRAINT `don_phong_ibfk_2` FOREIGN KEY (`id_khachhang`) REFERENCES `khach_hang` (`id`);

--
-- Các ràng buộc cho bảng `phong`
--
ALTER TABLE `phong`
  ADD CONSTRAINT `phong_ibfk_1` FOREIGN KEY (`ma_loaiphong`) REFERENCES `loai_phong` (`ma_loai`);

--
-- Các ràng buộc cho bảng `phong_coso`
--
ALTER TABLE `phong_coso`
  ADD CONSTRAINT `phong_coso_ibfk_1` FOREIGN KEY (`id_phong`) REFERENCES `phong` (`id`),
  ADD CONSTRAINT `phong_coso_ibfk_2` FOREIGN KEY (`id_coso`) REFERENCES `co_so` (`id`);

--
-- Các ràng buộc cho bảng `phong_tiennghi`
--
ALTER TABLE `phong_tiennghi`
  ADD CONSTRAINT `phong_tiennghi_ibfk_1` FOREIGN KEY (`id_phong`) REFERENCES `phong` (`id`),
  ADD CONSTRAINT `phong_tiennghi_ibfk_2` FOREIGN KEY (`id_tiennghi`) REFERENCES `tien_nghi` (`id`);
COMMIT;


