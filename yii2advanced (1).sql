-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 21, 2017 lúc 12:53 CH
-- Phiên bản máy phục vụ: 5.7.14
-- Phiên bản PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `yii2advanced`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `status` smallint(6) NOT NULL DEFAULT '0',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `chitiethang`
-- (See below for the actual view)
--
CREATE TABLE `chitiethang` (
`id` int(11)
,`mahang` varchar(45)
,`tenhang` varchar(200)
,`tenloaihang` varchar(100)
,`tenthuonghieu` varchar(100)
,`tennhacungcap` varchar(100)
,`dongia` double
,`noibat` enum('noibat','khongnoibat')
,`banchay` enum('banchay','khongbanchay')
,`motangangon` varchar(500)
,`code` varchar(200)
,`motachitiet` text
,`tinhtrang` enum('conhang','hethang')
,`file` varchar(255)
);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucnang`
--

CREATE TABLE `chucnang` (
  `id` int(11) NOT NULL,
  `viettat` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mota` varchar(100) DEFAULT NULL,
  `nhom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `chucnang`
--

INSERT INTO `chucnang` (`id`, `viettat`, `name`, `mota`, `nhom`) VALUES
(1, 'delete_thuonghieu', 'xóa thương hiệu', NULL, 'Thương hiệu'),
(2, 'view_thuonghieu', 'xem thương hiệu', NULL, 'Thương hiệu'),
(3, 'create_thuonghieu', 'thêm thương hiệu', NULL, 'Thương hiệu'),
(4, 'update_thuonghieu', 'sửa thương hiệu', NULL, 'Thương hiệu'),
(5, 'create_loaihang', 'thêm loại hàng', NULL, 'Loại hàng'),
(6, 'update_loaihang', 'sửa loại hàng', NULL, 'Loại hàng'),
(7, 'delete_loaihang', 'xóa loại hàng', NULL, 'Loại hàng'),
(8, 'view_loaihang', 'xem loại hàng', NULL, 'Loại hàng'),
(9, 'create_hanghoa', 'thêm hàng hóa', NULL, 'Hàng hóa'),
(10, 'update_hanghoa', 'sửa hàng hóa', NULL, 'Hàng hóa'),
(11, 'delete_hanghoa', 'xóa hàng hóa', NULL, 'Hàng hóa'),
(12, 'view_hanghoa', 'xem hàng hóa', NULL, 'Hàng hóa'),
(13, 'create_nhacungcap', 'thêm nhà cung cấp', NULL, 'Nhà cung cấp'),
(14, 'update_nhacungcap', 'sửa nhà cung cấp', NULL, 'Nhà cung cấp'),
(15, 'delete_nhacungcap', 'xóa nhà cung cấp', NULL, 'Nhà cung cấp'),
(16, 'view_nhacungcap', 'xem nhà cung cấp', NULL, 'Nhà cung cấp'),
(17, 'view_donhang', 'Xem đơn hàng', NULL, 'đơn hàng'),
(18, 'update_donhang', 'sửa đơn hàng', NULL, 'đơn hàng'),
(19, 'delete_donhang', 'xóa đơn hàng', NULL, 'đơn hàng'),
(20, 'index_loaihang', 'xem danh sách loại hàng', NULL, 'Loại hàng'),
(21, 'index_hanghoa', 'xem danh sách hàng hóa', NULL, 'Hàng hóa'),
(22, 'index_nhacungcap', 'xem danh sách nhà cung cấp', NULL, 'Nhà cung cấp'),
(23, 'index_thuonghieu', 'xem danh sách thương hiệu', NULL, 'Thương hiệu'),
(24, 'index_donhang', 'xem danh sách đơn hàng', NULL, 'đơn hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(32) CHARACTER SET utf8 NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8 NOT NULL,
  `body` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `hoten` varchar(100) CHARACTER SET utf8 NOT NULL,
  `diachi` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `dienthoai` varchar(20) CHARACTER SET utf8 NOT NULL,
  `tongtien` double NOT NULL,
  `ngaylap` date NOT NULL,
  `soluong` int(11) NOT NULL,
  `ghichu` text CHARACTER SET utf8 NOT NULL,
  `tinhtrang` enum('dangchoxuly','dangxuly','danggiaohang','huydonhang','dagiaohang') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'dangchoxuly',
  `ngaygiaohang` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id`, `hoten`, `diachi`, `email`, `dienthoai`, `tongtien`, `ngaylap`, `soluong`, `ghichu`, `tinhtrang`, `ngaygiaohang`) VALUES
(12, 'Trương Tuấn Đạt', 'An Dương - Hải Phòng', 'kiepsongthua18@gmai.com', '01695210389', 4725000, '2017-04-04', 15, '', 'dangchoxuly', NULL),
(13, 'Trương Tuấn Đạt', 'An Dương - Hải Phòng', 'kiepsongthua18@gmai.com', '01695210389', 2205000, '2017-04-05', 7, '', 'dangchoxuly', NULL),
(14, 'Trương Tuấn Đạt', 'An Dương - Hải Phòng', 'kiepsongthua18@gmai.com', '01695210389', 340, '2017-04-05', 33, '', 'dangchoxuly', NULL),
(15, 'Trương Tuấn Đạt', 'An Dương - Hải Phòng', 'kiepsongthua18@gmai.com', '01695210389', 315000, '2017-04-05', 1, '', 'dangchoxuly', NULL),
(16, 'Trương Tuấn Đạt', 'An Dương - Hải Phòng', 'kiepsongthua18@gmai.com', '01695210389', 945000, '2017-04-05', 3, '', 'dangchoxuly', NULL),
(17, 'Trương Tuấn Đạt', 'An Dương - Hải Phòng', 'kiepsongthua18@gmai.com', '01695210389', 1200000, '2017-04-05', 4, '', 'dangchoxuly', NULL),
(18, 'Trương Tuấn Đạt', 'An Dương - Hải Phòng', 'kiepsongthua18@gmai.com', '01695210389', 945000, '2017-04-05', 3, '', 'dangchoxuly', NULL),
(19, 'Trương Tuấn Đạt', 'An Dương - Hải Phòng', 'kiepsongthua18@gmai.com', '01695210389', 945000, '2017-04-05', 3, '', 'dangchoxuly', NULL),
(20, 'Trương Tuấn Đạt', 'An Dương - Hải Phòng', 'kiepsongthua18@gmai.com', '01695210389', 630000, '2017-04-05', 2, '', 'dangchoxuly', NULL),
(21, 'Trương Tuấn Đạt', 'An Dương - Hải Phòng', 'kiepsongthua18@gmai.com', '01695210389', 3477643, '2017-04-21', 12, '', 'dangchoxuly', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhangchitiet`
--

CREATE TABLE `donhangchitiet` (
  `id` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` double NOT NULL,
  `thanhtien` double NOT NULL,
  `hanghoa_id` int(11) DEFAULT NULL,
  `donhang_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhangchitiet`
--

INSERT INTO `donhangchitiet` (`id`, `soluong`, `dongia`, `thanhtien`, `hanghoa_id`, `donhang_id`) VALUES
(31, 15, 315000, 4725000, 1, 12),
(32, 4, 315000, 1260000, 1, 13),
(34, 2, 315000, 630000, 2, 13),
(35, 1, 315000, 315000, 3, 13),
(37, 34, 10, 340, 5, 14),
(38, 1, 315000, 315000, 1, 15),
(39, 1, 315000, 315000, 1, 16),
(40, 1, 315000, 315000, 2, 16),
(41, 1, 315000, 315000, 3, 16),
(42, 1, 255000, 255000, 4, 17),
(43, 1, 315000, 315000, 1, 17),
(44, 1, 315000, 315000, 2, 17),
(45, 1, 315000, 315000, 3, 17),
(46, 1, 315000, 315000, 1, 18),
(47, 1, 315000, 315000, 2, 18),
(48, 1, 315000, 315000, 3, 18),
(49, 1, 315000, 315000, 1, 19),
(50, 1, 315000, 315000, 2, 19),
(51, 1, 315000, 315000, 3, 19),
(52, 2, 315000, 630000, 3, 20),
(53, 1, 255000, 255000, 4, 21),
(54, 2, 180355, 360710, 11, 21),
(55, 4, 338152, 1352608, 17, 21),
(56, 2, 342983, 685966, 15, 21),
(57, 1, 315000, 315000, 3, 21),
(58, 1, 156519, 156519, 14, 21),
(59, 1, 351840, 351840, 43, 21);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanghoa`
--

CREATE TABLE `hanghoa` (
  `id` int(11) NOT NULL,
  `mahang` varchar(45) CHARACTER SET utf8 NOT NULL,
  `tenhang` varchar(200) CHARACTER SET utf8 NOT NULL,
  `soluong` tinyint(4) NOT NULL,
  `dongia` double NOT NULL,
  `tinhtrang` enum('conhang','hethang') CHARACTER SET utf8 NOT NULL,
  `noibat` enum('noibat','khongnoibat') CHARACTER SET utf8 NOT NULL,
  `banchay` enum('banchay','khongbanchay') CHARACTER SET utf8 NOT NULL,
  `motangangon` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `motachitiet` text CHARACTER SET utf8,
  `luotxem` int(11) DEFAULT '0',
  `loaihang_id` int(11) NOT NULL,
  `nhacungcap_id` int(11) NOT NULL,
  `thuonghieu_id` int(11) NOT NULL,
  `code` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `created` date DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `ngaynhap` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hanghoa`
--

INSERT INTO `hanghoa` (`id`, `mahang`, `tenhang`, `soluong`, `dongia`, `tinhtrang`, `noibat`, `banchay`, `motangangon`, `motachitiet`, `luotxem`, `loaihang_id`, `nhacungcap_id`, `thuonghieu_id`, `code`, `created`, `updated`, `ngaynhap`) VALUES
(1, 'TS58', 'Áo Thun 2 in 1 Labelle TS58 - Xanh Ngọc', 7, 315000, 'conhang', 'khongnoibat', 'khongbanchay', '<p><strong>&Aacute;o Thun 2 in 1 Labelle TS58 - Xanh Ngọc&nbsp;</strong>sử dụng t&ocirc;ng m&agrave;u xanh ngọc đẹp mắt sẽ g&oacute;p phần l&agrave;m nổi bật vẻ ngo&agrave;i duy&ecirc;n d&aacute;ng, thanh lịch cho c&aacute;c bạn nữ. &Aacute;o c&oacute; thiết kế 2 trong 1 độc đ&aacute;o&nbsp; kết hợp c&ugrave;ng kiểu xẻ t&agrave;, cố tr&ograve;n v&agrave; tay d&agrave;i sẽ gi&uacute;p bạn g&aacute;i trở n&ecirc;n tự tin hơn, thu h&uacute;t mọi &aacute;nh nh&igrave;n.</p>\r\n', '<p><strong>&Aacute;o Thun 2 in 1 Labelle TS58 - Xanh Ngọc</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>&Aacute;o Thun 2 in 1 Labelle TS58 - Xanh Ngọc&nbsp;</strong>sử dụng t&ocirc;ng m&agrave;u xanh ngọc đẹp mắt sẽ g&oacute;p phần l&agrave;m nổi bật vẻ ngo&agrave;i duy&ecirc;n d&aacute;ng, thanh lịch cho c&aacute;c bạn nữ. &Aacute;o c&oacute; thiết kế 2 trong 1 độc đ&aacute;o&nbsp; kết hợp c&ugrave;ng kiểu xẻ t&agrave;, cố tr&ograve;n v&agrave; tay d&agrave;i sẽ gi&uacute;p bạn g&aacute;i trở n&ecirc;n tự tin hơn, thu h&uacute;t mọi &aacute;nh nh&igrave;n.</p>\r\n\r\n<p><img alt="https://tikicdn.com/media/catalog/product/t/s/ts58-3.1.jpg" src="https://tikicdn.com/media/catalog/product/t/s/ts58-3.1.jpg" style="height:600px; width:400px" /></p>\r\n\r\n<p><strong>Th&ocirc;ng tin sản phẩm</strong></p>\r\n\r\n<p><strong>Chất liệu thun cao cấp</strong></p>\r\n\r\n<p>&Aacute;o được may từ chất liệu vải thun mềm mại, co gi&atilde;n tốt, thấm h&uacute;t mồ h&ocirc;i, mang đến cảm gi&aacute;c thoải m&aacute;i trong từng hoạt động. Chất liệu n&agrave;y dễ giặt sạch, nhanh kh&ocirc;, &iacute;t nhăn tạo sự tiện lợi khi sử dụng.</p>\r\n\r\n<p><strong>Thiết kế 2 in 1 độc đ&aacute;o, hợp thời trang</strong></p>\r\n\r\n<p><strong>&Aacute;o Thun 2 in 1 Labelle TS58 - Xanh Ngọc&nbsp;</strong>2 trong 1 rất độc đ&aacute;o với vạt ngang, cổ tr&ograve;n v&agrave; phần tay &aacute;o d&agrave;i sẽ t&ocirc;n l&ecirc;n vẻ đẹp duy&ecirc;n d&aacute;ng của ph&aacute;i đẹp. M&agrave;u sắc trang nh&atilde;, th&iacute;ch hợp để mặc khi đi l&agrave;m v&agrave; cả những l&uacute;c đi chơi, dạo phố với bạn b&egrave;.</p>\r\n\r\n<p><img alt="https://tikicdn.com/media/catalog/product/t/s/ts58-3.3.jpg" src="https://tikicdn.com/media/catalog/product/t/s/ts58-3.3.jpg" style="height:600px; width:400px" /></p>\r\n\r\n<p><strong>Dễ phối trang phục v&agrave; phụ kiện</strong></p>\r\n\r\n<p>&Aacute;o c&oacute; t&ocirc;ng m&agrave;u xanh ngọc phối trắng l&agrave;m to&aacute;t l&ecirc;n thần th&aacute;i tinh tế v&agrave; thanh lịch cho người mặc. Bạn c&oacute; thể phối &aacute;o với quần jean hoặc quần shorts, legging v&agrave; một số phụ kiện thời trang kh&aacute;c để thể hiện phong c&aacute;ch thời trang đa dạng, đơn giản nhưng vẫn xinh đẹp, nữ t&iacute;nh.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Th&ocirc;ng tin sản phẩm n&agrave;y c&oacute; hữu &iacute;ch cho bạn kh&ocirc;ng ?</p>\r\n\r\n<p>&nbsp;Ho&agrave;n to&agrave;n hữu &iacute;ch&nbsp;Kh&aacute; hữu &iacute;ch&nbsp;B&igrave;nh thường&nbsp;Kh&ocirc;ng hẳn&nbsp;Ho&agrave;n to&agrave;n kh&ocirc;ng</p>\r\n\r\n<h3>Th&ocirc;ng Tin Chi Tiết</h3>\r\n\r\n<table cellspacing="0">\r\n	<tbody>\r\n		<tr>\r\n			<td>Thương hiệu</td>\r\n			<td><a href="http://tiki.vn/thuong-hieu/la-belle.html">La Belle</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sản xuất tại</td>\r\n			<td>Việt Nam</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Model</td>\r\n			<td>TS58</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Trọng lượng vận chuyển (gram)</td>\r\n			<td>400</td>\r\n		</tr>\r\n		<tr>\r\n			<td>SKU</td>\r\n			<td>5106500854053</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 24, 6, 1, 5, 'Ao-Thun-2-in-1-Labelle-TS58---Xanh-Ngoc-1480752300', '2016-12-03', '2017-03-20', '2017-03-19'),
(2, '5102816196245', 'Áo Thun Form Dài 3 Tầng Màu Labelle TS68 - Café', 5, 315000, 'conhang', 'noibat', 'khongbanchay', '<p><strong>&Aacute;o Thun&nbsp; Form D&agrave;i 3 Tầng M&agrave;u&nbsp;</strong><strong>Labelle</strong><strong>&nbsp;- Caf&eacute;&nbsp;</strong>với gam m&agrave;u c&agrave; ph&ecirc; chủ đạo lạ mắt sẽ gi&uacute;p c&aacute;c c&ocirc; n&agrave;ng th</p>\r\n', '<p><strong>&Aacute;o Thun&nbsp; Form D&agrave;i 3 Tầng M&agrave;u Labelle - Caf&eacute;</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>&Aacute;o Thun&nbsp; Form D&agrave;i 3 Tầng M&agrave;u&nbsp;</strong><strong>Labelle</strong><strong>&nbsp;- Caf&eacute;&nbsp;</strong>với gam m&agrave;u c&agrave; ph&ecirc; chủ đạo lạ mắt sẽ gi&uacute;p c&aacute;c c&ocirc; n&agrave;ng th&ecirc;m thanh lịch v&agrave; tự tin thu h&uacute;t mọi &aacute;nh nh&igrave;n. Kiểu &aacute;o form d&agrave;i kh&aacute; trẻ trung v&agrave; s&agrave;nh điệu đang l&agrave; một trong những xu hướng thời trang được ưa chuộng hiện nay. &Aacute;o được may từ chất liệu vải thun cao cấp, bền m&agrave;u, cho thời gian sử dụng l&acirc;u d&agrave;i.</p>\r\n\r\n<p><img alt="https://tikicdn.com/media/catalog/product/c/1/c1_1.jpg" src="https://tikicdn.com/media/catalog/product/c/1/c1_1.jpg" style="height:600px; width:400px" /></p>\r\n\r\n<p><strong>Th&ocirc;ng tin sản ph&acirc;̉m</strong></p>\r\n\r\n<p><strong>Chất liệu vải thun &ecirc;m &aacute;i, bền m&agrave;u</strong></p>\r\n\r\n<p><strong>&Aacute;o Thun&nbsp; Form D&agrave;i 3 Tầng M&agrave;u&nbsp;</strong><strong>Labelle</strong><strong>&nbsp;TS68 - Caf&eacute;&nbsp;</strong>được may từ chất liệu vải thun &ecirc;m &aacute;i, thấm h&uacute;t nhanh, tạo cảm gi&aacute;c thoải m&aacute;i dễ chịu cho người mặc, kể cả trong điều kiện thời tiết n&oacute;ng bức. &Aacute;o dễ giặt, bền m&agrave;u v&agrave; ho&agrave;n to&agrave;n kh&ocirc;ng xảy ra t&igrave;nh trạng nhăn nh&uacute;m, x&ugrave; l&ocirc;ng sau khi giặt.</p>\r\n\r\n<p><strong>Kiểu d&aacute;ng trẻ trung, năng động</strong></p>\r\n\r\n<p>&Aacute;o thun c&oacute; kiểu form d&agrave;i, cổ tr&ograve;n kh&aacute; trẻ trung, gi&uacute;p mang đến vẻ năng động v&agrave; thanh lịch cho mọi c&ocirc; g&aacute;i. &Aacute;o được cắt may kh&aacute; tỉ mỉ, tinh tế trong từng đường kim mũi chỉ, chắc chắn sẽ gi&uacute;p bạn th&ecirc;m đẹp v&agrave; nổi bật hơn ở bất cứ đ&acirc;u.</p>\r\n\r\n<p><img alt="https://tikicdn.com/media/catalog/product/c/2/c2_1.jpg" src="https://tikicdn.com/media/catalog/product/c/2/c2_1.jpg" style="height:600px; width:400px" /></p>\r\n\r\n<p><strong>M&agrave;u sắc thanh lịch, đẹp mắt</strong></p>\r\n\r\n<p>Với sự kết hợp h&agrave;i h&ograve;a, đẹp mắt giữa ba t&ocirc;ng m&agrave;u l&agrave; m&agrave;u trắng, m&agrave;u đen v&agrave; m&agrave;u c&agrave; ph&ecirc;<strong>&nbsp;&Aacute;o Thun&nbsp; Form D&agrave;i 3 Tầng M&agrave;u TS68&nbsp;</strong><strong>Labelle</strong><strong>&nbsp;- Caf&eacute;&nbsp;</strong>ch&iacute;nh l&agrave; một lựa chọn kh&aacute; ho&agrave;n hảo để gi&uacute;p hiện gu thẩm mỹ tinh tế của bạn. Với kiểu &aacute;o n&agrave;y c&aacute;c c&ocirc; g&aacute;i c&oacute; thể tha hồ phối c&ugrave;ng mọi kiểu quần d&agrave;i để th&ecirc;m tự tin, s&agrave;nh điệu hơn mỗi khi ra ngo&agrave;i.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Th&ocirc;ng tin sản phẩm n&agrave;y c&oacute; hữu &iacute;ch cho bạn kh&ocirc;ng ?</p>\r\n\r\n<p>&nbsp;Ho&agrave;n to&agrave;n hữu &iacute;ch&nbsp;Kh&aacute; hữu &iacute;ch&nbsp;B&igrave;nh thường&nbsp;Kh&ocirc;ng hẳn&nbsp;Ho&agrave;n to&agrave;n kh&ocirc;ng</p>\r\n\r\n<h3>Th&ocirc;ng Tin Chi Tiết</h3>\r\n\r\n<table cellspacing="0">\r\n	<tbody>\r\n		<tr>\r\n			<td>Thương hiệu</td>\r\n			<td><a href="http://tiki.vn/thuong-hieu/la-belle.html">La Belle</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sản xuất tại</td>\r\n			<td>Việt Nam</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Model</td>\r\n			<td>TS68</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Trọng lượng vận chuyển (gram)</td>\r\n			<td>400</td>\r\n		</tr>\r\n		<tr>\r\n			<td>SKU</td>\r\n			<td>5102816196245</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', NULL, 6, 1, 5, 'Ao-Thun-Form-Dai-3-Tang-Mau-Labelle-TS68---Cafe-1480752612', '2016-12-03', NULL, '2016-12-03'),
(3, 'D196', 'Đầm Baby Doll Labelle D196 - Xanh (Free Size)', 7, 315000, 'conhang', 'noibat', 'banchay', '<p><strong>Đầm Baby Doll Labelle D196 - Xanh (Free Size)</strong>&nbsp;có màu xanh thanh lịch, kh&ocirc;ng kén màu da phù hợp với phong cách trẻ trung, năng đ&ocirc;̣ng mà mọi c&ocirc; nàng lu&ocirc;n theo đu&ocirc;̉i.</p>\r\n', '<p><strong>Đầm Baby Doll Labelle D196 - Xanh (Free Size)</strong></p>\r\n\r\n<p><strong>Đầm Baby Doll Labelle D196 - Xanh (Free Size)</strong>&nbsp;có màu xanh thanh lịch, kh&ocirc;ng kén màu da phù hợp với phong cách trẻ trung, năng đ&ocirc;̣ng mà mọi c&ocirc; nàng lu&ocirc;n theo đu&ocirc;̉i. Đ&acirc;̀m thi&ecirc;́t k&ecirc;́ tay áo ph&ocirc;̀ng nhẹ, x&ecirc;́p bèo, ph&acirc;̀n eo x&ecirc;́p ly tạo đi&ecirc;̉m nh&acirc;́n n&ocirc;̉i b&acirc;̣t. V&acirc;̃n là m&acirc;̃u Baby Doll truy&ecirc;̀n th&ocirc;́ng, đ&acirc;̀m mang lại vẻ nữ tính, thanh lịch cho bạn gái khi xu&acirc;́t hi&ecirc;̣n ở b&acirc;́t cứ đ&acirc;u.</p>\r\n\r\n<p><img alt="Đầm Baby Doll Labelle D196 - Xanh (Free Size)" src="https://tikicdn.com/media/catalog/product/d/1/d196xanh_4_fileminimizer_.jpg" style="height:974px; width:650px" /></p>\r\n\r\n<p><strong>Th&ocirc;ng tin sản ph&acirc;̉m</strong></p>\r\n\r\n<p><strong>Th&ocirc;ng tin sản ph&acirc;̉m</strong></p>\r\n\r\n<p><strong>Ch&acirc;́t li&ecirc;̣u kaki mỏng cao c&acirc;́p</strong></p>\r\n\r\n<p>Sản ph&acirc;̉m được may từ vải kaki mỏng cao c&acirc;́p, vừa giữ form dáng vừa m&ecirc;̀m mại, d&ecirc;̃ chịu khi mặc. Ch&acirc;́t li&ecirc;̣u này b&ecirc;̀n màu, d&ecirc;̃ giặt sạch và nhanh kh&ocirc; cho bạn thoải mái sử dụng.</p>\r\n\r\n<p><strong>Thi&ecirc;́t k&ecirc;́ đ&acirc;̀m Baby Doll nữ tính, màu xanh trẻ trung</strong></p>\r\n\r\n<p><strong>Labelle D196&nbsp;</strong>được thi&ecirc;́t k&ecirc;́ theo đúng ki&ecirc;̉u dáng truy&ecirc;̀n th&ocirc;́ng của m&acirc;̃u Baby Doll mang đ&ecirc;́n vẻ ngọt ngào, nữ tính cho phái đẹp. Tay áo ph&ocirc;̀ng nhẹ, x&ecirc;́p bèo. Ph&acirc;̀n eo x&ecirc;́p ly tạo đi&ecirc;̉m nh&acirc;́n n&ocirc;̉i b&acirc;̣t. Form v&aacute;y giấu eo v&agrave; ngắn tr&ecirc;n đ&acirc;̀u gối sẽ giúp khoe trọn đ&ocirc;i ch&acirc;n thon dài cho vóc dáng th&ecirc;m thanh mảnh, duy&ecirc;n dáng. Đ&acirc;̀m có màu xanh kh&ocirc;ng kén màu da phù hợp với phong cách trẻ trung, năng đ&ocirc;̣ng mà mọi c&ocirc; nàng lu&ocirc;n theo đu&ocirc;̉i.</p>\r\n\r\n<p><img alt="Đầm Baby Doll Labelle D196 - Xanh (Free Size)" src="https://tikicdn.com/media/catalog/product/d/1/d196xanh_2_fileminimizer_.jpg" style="height:938px; width:650px" /></p>\r\n\r\n<p><strong>D&ecirc;̃ ph&ocirc;́i phụ ki&ecirc;̣n</strong></p>\r\n\r\n<p>Đầm Baby Doll<strong>&nbsp;</strong>là m&acirc;̃u street style phổ biến, vừa trẻ trung nữ t&iacute;nh, vừa l&atilde;ng mạn vintage, cũng là món phục trang hữu dụng cho c&aacute;c c&ocirc; n&agrave;ng nấm l&ugrave;n. Bạn có th&ecirc;̉ thả tóc tự nhi&ecirc;n hay tết buộc kiểu vintage, mang gi&agrave;y b&uacute;p b&ecirc; hoặc gi&agrave;y thể thao cùng tất cổ ngắn khi mặc cùng đ&acirc;̀m đ&ecirc;̉ t&ocirc;n l&ecirc;n dáng vẻ thanh lịch, ngọt ngào. Những chiếc v&ograve;ng đeo tay xinh xắn bằng đ&aacute; hoặc gỗ cũng sẽ giúp bạn trở n&ecirc;n n&ocirc;̉i b&acirc;̣t hơn khi ph&ocirc;́i cùng m&acirc;̃u babydoll này.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Th&ocirc;ng tin sản phẩm n&agrave;y c&oacute; hữu &iacute;ch cho bạn kh&ocirc;ng ?</p>\r\n\r\n<p>&nbsp;Ho&agrave;n to&agrave;n hữu &iacute;ch&nbsp;Kh&aacute; hữu &iacute;ch&nbsp;B&igrave;nh thường&nbsp;Kh&ocirc;ng hẳn&nbsp;Ho&agrave;n to&agrave;n kh&ocirc;ng</p>\r\n\r\n<h3>Th&ocirc;ng Tin Chi Tiết</h3>\r\n\r\n<table cellspacing="0">\r\n	<tbody>\r\n		<tr>\r\n			<td>Thương hiệu</td>\r\n			<td><a href="http://tiki.vn/thuong-hieu/la-belle.html">La Belle</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sản xuất tại</td>\r\n			<td>Việt Nam</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Model</td>\r\n			<td>D196</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Trọng lượng vận chuyển (gram)</td>\r\n			<td>300</td>\r\n		</tr>\r\n		<tr>\r\n			<td>SKU</td>\r\n			<td>3809973351167</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Giới t&iacute;nh</td>\r\n			<td>Nữ</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', NULL, 6, 1, 3, 'Dam-Baby-Doll-Labelle-D196---Xanh-(Free-Size)-1480752705', '2016-12-03', NULL, '2016-12-03'),
(4, 'S27', 'Áo Sơ Mi Lưng Vạt Chéo Labelle S27_Xanh', 9, 255000, 'conhang', 'khongnoibat', 'banchay', '<p><strong>&Aacute;o Sơ Mi Lưng Vạt Ch&eacute;o Labelle S27_Xanh&nbsp;</strong>sẽ l&agrave; sự lựa chọn ho&agrave;n hảo cho những c&ocirc; n&agrave;ng y&ecirc;u th&iacute;ch phong c&aacute;ch thanh lịch nhưng vẫn rất hiện đại v&agrave; hợp thời trang</p>\r\n', '<p><strong><strong><strong><strong>&Aacute;o Sơ Mi Lưng Vạt Ch&eacute;o Labelle S27_Xanh</strong></strong></strong></strong></p>\r\n\r\n<p><strong>&Aacute;o Sơ Mi Lưng Vạt Ch&eacute;o Labelle S27_Xanh&nbsp;</strong>sẽ l&agrave; sự lựa chọn ho&agrave;n hảo cho những c&ocirc; n&agrave;ng y&ecirc;u th&iacute;ch phong c&aacute;ch thanh lịch nhưng vẫn rất hiện đại v&agrave; hợp thời trang. Thiết kế tay ngắn, cổ sơ mi với điểm nhấn l&agrave; phần vạt ch&eacute;o ph&iacute;a sau &aacute;o. Chất vải cotton pha mịn đẹp, &iacute;t bị nhăn khi mặc.</p>\r\n\r\n<p><img alt="https://tikicdn.com/media/catalog/product/s/2/s27_2_fileminimizer_.jpg" src="https://tikicdn.com/media/catalog/product/l/a/labelle%20s27_xanh%20(1).u699.d20160530.t152039.jpg" style="height:840px; width:600px" /></p>\r\n\r\n<p><strong>Thiết kế thanh lịch, hợp thời trang</strong></p>\r\n\r\n<p>&Aacute;o c&oacute; thiết kế kiểu tay ngắn, cổ sơ mi truyền thống với điểm nhấn nằm ở phần vạt ch&eacute;o c&aacute;ch điệu mặt sau &aacute;o. Họa tiết hoa l&aacute; sinh động c&ugrave;ng m&agrave;u xanh l&aacute; c&acirc;y tươi s&aacute;ng của &aacute;o c&ograve;n tạo n&ecirc;n sự tươi trẻ cho người mặc.</p>\r\n\r\n<p><strong>Chất liệu cotton pha cao cấp</strong></p>\r\n\r\n<p>Sản phẩm được may bằng chất liệu vải cotton pha cao cấp, mịn đẹp. Ngo&agrave;i ra, chất liệu vải n&agrave;y c&ograve;n c&oacute; ưu điểm l&agrave; rất dễ giặt v&agrave; &iacute;t bị nhăn</p>\r\n\r\n<p><strong>Th&iacute;ch hợp mặc đi l&agrave;m, đi chơi</strong></p>\r\n\r\n<p>Với thiết kế thanh lịch nhưng vẫn rất duy&ecirc;n d&aacute;ng v&agrave; hợp thời trang, bạn c&oacute; thể phối &aacute;o với nhiều loại trang phục v&agrave; phụ kiện kh&aacute;c nhau để tr&ocirc;ng thật nổi bật nơi c&ocirc;ng sở hay khi dạo phố c&ugrave;ng bạn b&egrave;.</p>\r\n\r\n<p><img alt="https://tikicdn.com/media/catalog/product/s/2/s27_11_fileminimizer_.jpg" src="https://tikicdn.com/media/catalog/product/s/2/s27_11_fileminimizer_.jpg" style="height:600px; width:400px" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Th&ocirc;ng tin sản phẩm n&agrave;y c&oacute; hữu &iacute;ch cho bạn kh&ocirc;ng ?</p>\r\n\r\n<p>&nbsp;Ho&agrave;n to&agrave;n hữu &iacute;ch&nbsp;Kh&aacute; hữu &iacute;ch&nbsp;B&igrave;nh thường&nbsp;Kh&ocirc;ng hẳn&nbsp;Ho&agrave;n to&agrave;n kh&ocirc;ng</p>\r\n\r\n<h3>Th&ocirc;ng Tin Chi Tiết</h3>\r\n\r\n<table cellspacing="0">\r\n	<tbody>\r\n		<tr>\r\n			<td>Thương hiệu</td>\r\n			<td><a href="http://tiki.vn/thuong-hieu/la-belle.html">La Belle</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sản xuất tại</td>\r\n			<td>Việt Nam</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Model</td>\r\n			<td>S27</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Trọng lượng vận chuyển (gram)</td>\r\n			<td>100</td>\r\n		</tr>\r\n		<tr>\r\n			<td>SKU</td>\r\n			<td>5105167022546</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Giới t&iacute;nh</td>\r\n			<td>Nữ</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', NULL, 7, 1, 2, 'Ao-So-Mi-Lung-Vat-Cheo-Labelle-S27_Xanh-1480752857', '2016-12-03', '2017-03-19', '2016-12-03'),
(5, 'D158', 'Set Đầm Body Ren Xuyên Thấu Labelle D158', 9, 10, 'conhang', 'noibat', 'banchay', '<p><strong>Set Đầm Body Ren Xuy&ecirc;n Thấu Labelle D158&nbsp;</strong>sở hữu thiết kế gợi cảm với phần ren xuy&ecirc;n thấu, t&ocirc;n l&ecirc;n v&oacute;c d&aacute;ng thanh mảnh, những đường cong đầy sức h&uacute;t</p>\r\n', '<p><strong>Set Đầm Body Ren Xuy&ecirc;n Thấu Labelle D158&nbsp;</strong>sở hữu thiết kế gợi cảm với phần ren xuy&ecirc;n thấu, t&ocirc;n l&ecirc;n v&oacute;c d&aacute;ng thanh mảnh, những đường cong đầy sức h&uacute;t. Lớp l&oacute;t b&ecirc;n trong &ocirc;m s&aacute;t cơ thể, lớp ren b&ecirc;n ngo&agrave;i mỏng manh thể hiện vẻ đẹp nữ t&iacute;nh đầy duy&ecirc;n d&aacute;ng. T&ocirc;ng m&agrave;u đen huyền b&iacute; l&agrave;m nổi bật phong th&aacute;i quyến rũ cho người mặc.</p>\r\n\r\n<p><img alt="Set Đầm Body Ren Xuyên Thấu Labelle D158" src="https://tikicdn.com/media/catalog/product/d/1/d158_3__1_1.jpg" style="height:800px; width:800px" /></p>\r\n\r\n<p><strong>Th&ocirc;ng tin sản phẩm</strong></p>\r\n\r\n<p><strong>Chất liệu ren phối thun mềm mại</strong></p>\r\n\r\n<p>Sản phẩm được may từ chất liệu ren phối thun mềm mại, co gi&atilde;n tốt, t&ocirc;n l&ecirc;n v&oacute;c d&aacute;ng ho&agrave;n hảo của người mặc. Chất liệu vải dễ giặt sạch, &iacute;t nhăn, kh&ocirc;ng tốn qu&aacute; nhiều c&ocirc;ng sức để ủi thẳng.</p>\r\n\r\n<p><strong>Thiết kế gợi cảm</strong></p>\r\n\r\n<p><strong>Set Đầm Body Ren Xuy&ecirc;n Thấu Labelle D158&nbsp;</strong>sở hữu thiết kế gợi cảm với phần ren xuy&ecirc;n thấu, t&ocirc;n l&ecirc;n v&oacute;c d&aacute;ng thanh mảnh, những đường cong đầy sức h&uacute;t. Lớp l&oacute;t b&ecirc;n trong &ocirc;m s&aacute;t cơ thể, lớp ren b&ecirc;n ngo&agrave;i mỏng manh thể hiện vẻ đẹp nữ t&iacute;nh đầy duy&ecirc;n d&aacute;ng.</p>\r\n\r\n<p><img alt="Set Đầm Body Ren Xuyên Thấu Labelle D158" src="https://tikicdn.com/media/catalog/product/d/1/d158_5__1_1.jpg" style="height:800px; width:800px" /></p>\r\n\r\n<p><strong>M&agrave;u đen huyền b&iacute;, dễ phối đồ</strong></p>\r\n\r\n<p>T&ocirc;ng m&agrave;u đen huyền b&iacute; của đầm sẽ l&agrave;m nổi bật phong th&aacute;i quyến rũ cho người mặc. Bạn c&oacute; thể phối đầm c&ugrave;ng gi&agrave;y cao g&oacute;t, d&acirc;y phụ kiện bản mảnh để th&ecirc;m duy&ecirc;n d&aacute;ng hơn khi đi chơi, dự tiệc.</p>\r\n\r\n<p><strong>Hướng dẫn sử dụng:</strong></p>\r\n\r\n<p>- Giặt ở nhiệt độ trung b&igrave;nh với sản phẩm c&ugrave;ng m&agrave;u</p>\r\n\r\n<p>- Kh&ocirc;ng d&ugrave;ng chất tẩy</p>\r\n\r\n<p>- Sấy nhẹ bằng m&aacute;y ủ hơi nếu cần thiết</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Th&ocirc;ng tin sản phẩm n&agrave;y c&oacute; hữu &iacute;ch cho bạn kh&ocirc;ng ?</p>\r\n\r\n<p>&nbsp;Ho&agrave;n to&agrave;n hữu &iacute;ch&nbsp;Kh&aacute; hữu &iacute;ch&nbsp;B&igrave;nh thường&nbsp;Kh&ocirc;ng hẳn&nbsp;Ho&agrave;n to&agrave;n kh&ocirc;ng</p>\r\n\r\n<h3>Th&ocirc;ng Tin Chi Tiết</h3>\r\n\r\n<table cellspacing="0">\r\n	<tbody>\r\n		<tr>\r\n			<td>Thương hiệu</td>\r\n			<td><a href="http://tiki.vn/thuong-hieu/la-belle.html">La Belle</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Xuất xứ thương hiệu</td>\r\n			<td>Việt Nam</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sản xuất tại</td>\r\n			<td>Việt Nam</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Trọng lượng vận chuyển (gram)</td>\r\n			<td>300</td>\r\n		</tr>\r\n		<tr>\r\n			<td>SKU</td>\r\n			<td>5108559371871</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Giới t&iacute;nh</td>\r\n			<td>Nữ</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', NULL, 1, 4, 1, 'Set-Dam-Body-Ren-Xuyen-Thau-Labelle-D158-1480752947', '2016-12-03', '2017-03-24', '2017-03-24'),
(6, 'MH001', 'Hàng hóa 1', 18, 269038, 'conhang', 'noibat', 'khongbanchay', NULL, NULL, 2, 39, 7, 7, 'Hang-hoa-1-1492335201', '2017-04-16', NULL, '2017-04-16'),
(7, 'MH002', 'Hàng hóa 2', 4, 230047, 'conhang', 'khongnoibat', 'banchay', NULL, NULL, 1, 40, 8, 8, 'Hang-hoa-2-1492335201', '2017-04-16', NULL, '2017-04-16'),
(8, 'MH003', 'Hàng hóa 3', 14, 220522, 'conhang', 'khongnoibat', 'khongbanchay', NULL, NULL, 0, 41, 9, 9, 'Hang-hoa-3-1492335201', '2017-04-16', NULL, '2017-04-16'),
(9, 'MH004', 'Hàng hóa 4', 11, 187694, 'conhang', 'noibat', 'banchay', NULL, NULL, 0, 42, 10, 10, 'Hang-hoa-4-1492335201', '2017-04-16', NULL, '2017-04-16'),
(10, 'MH005', 'Hàng hóa 5', 19, 354293, 'conhang', 'khongnoibat', 'khongbanchay', NULL, NULL, 4, 43, 11, 7, 'Hang-hoa-5-1492335201', '2017-04-16', NULL, '2017-04-16'),
(11, 'MH006', 'Hàng hóa 6', 12, 180355, 'conhang', 'khongnoibat', 'banchay', NULL, NULL, 0, 39, 7, 9, 'Hang-hoa-6-1492335202', '2017-04-16', NULL, '2017-04-16'),
(12, 'MH007', 'Hàng hóa 7', 20, 199286, 'conhang', 'khongnoibat', 'khongbanchay', NULL, NULL, 0, 41, 7, 8, 'Hang-hoa-7-1492335202', '2017-04-16', NULL, '2017-04-16'),
(13, 'MH008', 'Hàng hóa 8', 9, 344924, 'conhang', 'khongnoibat', 'khongbanchay', NULL, NULL, 0, 42, 11, 7, 'Hang-hoa-8-1492335202', '2017-04-16', NULL, '2017-04-16'),
(14, 'MH009', 'Hàng hóa 9', 8, 156519, 'conhang', 'khongnoibat', 'banchay', NULL, NULL, 0, 39, 11, 8, 'Hang-hoa-9-1492335202', '2017-04-16', NULL, '2017-04-16'),
(15, 'MH010', 'Hàng hóa 10', 8, 342983, 'conhang', 'noibat', 'khongbanchay', NULL, NULL, 14, 43, 7, 9, 'Hang-hoa-10-1492335202', '2017-04-16', NULL, '2017-04-16'),
(16, 'MH011', 'Hàng hóa 11', 12, 338836, 'conhang', 'noibat', 'khongbanchay', NULL, NULL, 0, 43, 9, 7, 'Hang-hoa-11-1492335202', '2017-04-16', NULL, '2017-04-16'),
(17, 'MH012', 'Hàng hóa 12', 11, 338152, 'conhang', 'noibat', 'banchay', NULL, NULL, 0, 41, 10, 8, 'Hang-hoa-12-1492335202', '2017-04-16', NULL, '2017-04-16'),
(18, 'MH013', 'Hàng hóa 13', 4, 303239, 'conhang', 'khongnoibat', 'banchay', NULL, NULL, 0, 43, 7, 9, 'Hang-hoa-13-1492335202', '2017-04-16', NULL, '2017-04-16'),
(19, 'MH014', 'Hàng hóa 14', 14, 278562, 'conhang', 'khongnoibat', 'khongbanchay', NULL, NULL, 0, 41, 9, 7, 'Hang-hoa-14-1492335202', '2017-04-16', NULL, '2017-04-16'),
(20, 'MH015', 'Hàng hóa 15', 1, 146923, 'conhang', 'noibat', 'banchay', NULL, NULL, 0, 42, 11, 7, 'Hang-hoa-15-1492335202', '2017-04-16', NULL, '2017-04-16'),
(21, 'MH016', 'Hàng hóa 16', 9, 136784, 'conhang', 'noibat', 'khongbanchay', NULL, NULL, 0, 43, 10, 8, 'Hang-hoa-16-1492335202', '2017-04-16', NULL, '2017-04-16'),
(22, 'MH017', 'Hàng hóa 17', 2, 184724, 'conhang', 'khongnoibat', 'banchay', NULL, NULL, 0, 39, 7, 9, 'Hang-hoa-17-1492335202', '2017-04-16', NULL, '2017-04-16'),
(23, 'MH018', 'Hàng hóa 18', 2, 381460, 'conhang', 'noibat', 'banchay', NULL, NULL, 0, 43, 9, 7, 'Hang-hoa-18-1492335202', '2017-04-16', NULL, '2017-04-16'),
(24, 'MH019', 'Hàng hóa 19', 7, 369030, 'conhang', 'noibat', 'khongbanchay', NULL, NULL, 0, 41, 10, 9, 'Hang-hoa-19-1492335202', '2017-04-16', NULL, '2017-04-16'),
(25, 'MH001', 'Hàng hóa 1', 12, 231855, 'conhang', 'noibat', 'khongbanchay', NULL, NULL, 0, 39, 7, 7, 'Hang-hoa-1-1492335210', '2017-04-16', NULL, '2017-04-16'),
(26, 'MH002', 'Hàng hóa 2', 19, 252130, 'conhang', 'khongnoibat', 'banchay', NULL, NULL, 0, 40, 8, 8, 'Hang-hoa-2-1492335210', '2017-04-16', NULL, '2017-04-16'),
(27, 'MH003', 'Hàng hóa 3', 4, 108701, 'conhang', 'khongnoibat', 'khongbanchay', NULL, NULL, 0, 41, 9, 9, 'Hang-hoa-3-1492335210', '2017-04-16', NULL, '2017-04-16'),
(28, 'MH004', 'Hàng hóa 4', 18, 117026, 'conhang', 'noibat', 'banchay', NULL, NULL, 0, 42, 10, 10, 'Hang-hoa-4-1492335210', '2017-04-16', NULL, '2017-04-16'),
(29, 'MH005', 'Hàng hóa 5', 15, 281992, 'conhang', 'khongnoibat', 'khongbanchay', NULL, NULL, 0, 43, 11, 7, 'Hang-hoa-5-1492335210', '2017-04-16', NULL, '2017-04-16'),
(30, 'MH006', 'Hàng hóa 6', 3, 267152, 'conhang', 'khongnoibat', 'banchay', NULL, NULL, 0, 39, 7, 9, 'Hang-hoa-6-1492335210', '2017-04-16', NULL, '2017-04-16'),
(31, 'MH007', 'Hàng hóa 7', 18, 267453, 'conhang', 'khongnoibat', 'khongbanchay', NULL, NULL, 0, 41, 7, 8, 'Hang-hoa-7-1492335210', '2017-04-16', NULL, '2017-04-16'),
(32, 'MH008', 'Hàng hóa 8', 1, 111875, 'conhang', 'khongnoibat', 'khongbanchay', NULL, NULL, 0, 42, 11, 7, 'Hang-hoa-8-1492335211', '2017-04-16', NULL, '2017-04-16'),
(33, 'MH009', 'Hàng hóa 9', 9, 168095, 'conhang', 'khongnoibat', 'banchay', NULL, NULL, 0, 39, 11, 8, 'Hang-hoa-9-1492335211', '2017-04-16', NULL, '2017-04-16'),
(34, 'MH010', 'Hàng hóa 10', 13, 284749, 'conhang', 'noibat', 'khongbanchay', NULL, NULL, 0, 43, 7, 9, 'Hang-hoa-10-1492335211', '2017-04-16', NULL, '2017-04-16'),
(35, 'MH011', 'Hàng hóa 11', 2, 125128, 'conhang', 'noibat', 'khongbanchay', NULL, NULL, 0, 43, 9, 7, 'Hang-hoa-11-1492335211', '2017-04-16', NULL, '2017-04-16'),
(36, 'MH012', 'Hàng hóa 12', 19, 196791, 'conhang', 'noibat', 'banchay', NULL, NULL, 0, 41, 10, 8, 'Hang-hoa-12-1492335211', '2017-04-16', NULL, '2017-04-16'),
(37, 'MH013', 'Hàng hóa 13', 7, 284251, 'conhang', 'khongnoibat', 'banchay', NULL, NULL, 0, 43, 7, 9, 'Hang-hoa-13-1492335211', '2017-04-16', NULL, '2017-04-16'),
(38, 'MH014', 'Hàng hóa 14', 13, 320480, 'conhang', 'khongnoibat', 'khongbanchay', NULL, NULL, 0, 41, 9, 7, 'Hang-hoa-14-1492335211', '2017-04-16', NULL, '2017-04-16'),
(39, 'MH015', 'Hàng hóa 15', 7, 167253, 'conhang', 'noibat', 'banchay', NULL, NULL, 0, 42, 11, 7, 'Hang-hoa-15-1492335211', '2017-04-16', NULL, '2017-04-16'),
(40, 'MH016', 'Hàng hóa 16', 3, 294082, 'conhang', 'noibat', 'khongbanchay', NULL, NULL, 0, 43, 10, 8, 'Hang-hoa-16-1492335211', '2017-04-16', NULL, '2017-04-16'),
(41, 'MH017', 'Hàng hóa 17', 12, 266942, 'conhang', 'khongnoibat', 'banchay', NULL, NULL, 0, 39, 7, 9, 'Hang-hoa-17-1492335211', '2017-04-16', NULL, '2017-04-16'),
(42, 'MH018', 'Hàng hóa 18', 4, 360863, 'conhang', 'noibat', 'banchay', NULL, NULL, 0, 43, 9, 7, 'Hang-hoa-18-1492335211', '2017-04-16', NULL, '2017-04-16'),
(43, 'MH019', 'Hàng hóa 19', 1, 351840, 'conhang', 'noibat', 'khongbanchay', NULL, NULL, 0, 41, 10, 9, 'Hang-hoa-19-1492335211', '2017-04-16', NULL, '2017-04-16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhanh`
--

CREATE TABLE `hinhanh` (
  `id` int(11) NOT NULL,
  `file` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `hanghoa_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hinhanh`
--

INSERT INTO `hinhanh` (`id`, `file`, `hanghoa_id`) VALUES
(1, '1480752300ast10fmk_1.u579.d20160521.t083247.jpg', 1),
(2, '1480752300ast10fsn_1.u579.d20160521.t090037.jpg', 1),
(3, '1480752300ast10fst_2.u579.d20160521.t100451.jpg', 1),
(4, '14807526124025_tim1.u699.d20160628.t092404.jpg', 2),
(5, '14807526124027_xam1.u503.d20160719.t154110.jpg', 2),
(6, '1480752612a_tihds_s001fs_1.u696.d20160414.t001621.jpg', 2),
(7, '1480752706cf0001-003_1.u628.d20160607.t085514.jpg', 3),
(8, '1480752706cf0001-004_1.u628.d20160606.t234638.jpg', 3),
(9, '1480752706cf0001-005_1.u628.d20160606.t232858.jpg', 3),
(10, '1480752857fa83_xanh-bich_1.u696.d20160421.t113705.jpg', 4),
(11, '1480752857fa94_hong-neon_1.u696.d20160414.t143426.jpg', 4),
(12, '1480752857fa94_hong-sen_1.u696.d20160414.t131939.jpg', 4),
(22, '149034472615578889_628171910689313_2200338280464528952_n.jpg', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaihang`
--

CREATE TABLE `loaihang` (
  `id` int(11) NOT NULL,
  `tenloaihang` varchar(100) CHARACTER SET utf8 NOT NULL,
  `code` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `created` date DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `parent` int(11) DEFAULT '0',
  `stt` int(11) DEFAULT NULL,
  `trangthai` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaihang`
--

INSERT INTO `loaihang` (`id`, `tenloaihang`, `code`, `created`, `updated`, `parent`, `stt`, `trangthai`) VALUES
(1, 'Thời Trang - Phụ Kiện', 'Thoi-Trang---Phu-Kien', '2016-12-03', NULL, 0, 50, 1),
(2, 'Thời trang nữ', 'Thoi-trang-nu', '2016-12-03', NULL, 1, 5, 1),
(3, 'Thời trang nam', 'Thoi-trang-nam', '2016-12-03', NULL, 1, NULL, 1),
(4, 'Áo Nam', 'Ao-Nam', '2016-12-03', NULL, 3, NULL, 1),
(5, 'Quần nam', 'Quan-nam', '2016-12-03', NULL, 3, NULL, 1),
(6, 'Áo nữ', 'Ao-nu', '2016-12-03', NULL, 2, NULL, 1),
(7, 'Quần nữ', 'Quan-nu', '2016-12-03', NULL, 2, NULL, 1),
(16, 'menu 1', 'menu-1', NULL, NULL, 0, NULL, 1),
(17, 'menu 2', 'menu-2', NULL, NULL, 0, NULL, 1),
(18, 'menu 1.1', 'menu-1.1', NULL, NULL, 16, NULL, 1),
(19, 'menu 1.2', 'menu-1.2', NULL, NULL, 16, NULL, 1),
(20, 'menu 1.2.1', 'menu-1.2.1', NULL, NULL, 19, NULL, 1),
(21, 'menu 1.1.1', 'menu-1.1.1', NULL, NULL, 18, NULL, 1),
(22, 'menu 1.3', 'menu-1.3', NULL, NULL, 16, NULL, 1),
(23, 'menu 2.1', 'menu-2.1', NULL, NULL, 17, NULL, 1),
(24, 'menu 1.2.2', 'menu-1.2.2', NULL, NULL, 19, NULL, 1),
(25, 'menu 2.2', 'menu-2.2', NULL, NULL, 17, NULL, 1),
(26, 'menu 2.3', 'menu-2.3', NULL, NULL, 17, NULL, 1),
(27, 'menu 1.2.3', 'menu-1.2.3', NULL, NULL, 19, NULL, 1),
(35, 'test 1', 'test-1', NULL, NULL, 0, NULL, 0),
(36, 'test 1.2', 'test-1.2', NULL, NULL, 35, NULL, 1),
(37, 'test 1.1', 'test-1.1', NULL, NULL, 35, NULL, 1),
(38, 'Loại hàng', 'Loai-hang', NULL, NULL, 0, 0, 1),
(39, 'Loại hàng 1', 'Loai-hang-1', NULL, NULL, 0, 0, 1),
(40, 'Loại hàng 2', 'Loai-hang-2', NULL, NULL, 0, 0, 1),
(41, 'Loại hàng 3', 'Loai-hang-3', NULL, NULL, 0, 0, 1),
(42, 'Loại hàng 4', 'Loai-hang-4', NULL, NULL, 0, 0, 1),
(43, 'Loại hàng 5', 'Loai-hang-5', NULL, NULL, 0, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) CHARACTER SET utf8 NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `id` int(11) NOT NULL,
  `tennhacungcap` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `code` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`id`, `tennhacungcap`, `code`) VALUES
(1, 'La Belle', 'La-Belle'),
(2, 'Việt Nam', 'Viet-Nam'),
(3, 'Pháp', 'Phap'),
(4, 'mỹ', 'my'),
(5, 'Đức', 'Duc'),
(6, 'Nhà cung cấp', 'Nha-cung-cap'),
(7, 'Nhà cung cấp 1', 'Nha-cung-cap-1'),
(8, 'Nhà cung cấp 2', 'Nha-cung-cap-2'),
(9, 'Nhà cung cấp 3', 'Nha-cung-cap-3'),
(10, 'Nhà cung cấp 4', 'Nha-cung-cap-4'),
(11, 'Nhà cung cấp 5', 'Nha-cung-cap-5');

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `phanquyen`
-- (See below for the actual view)
--
CREATE TABLE `phanquyen` (
`iduser` int(11)
,`idvaitro` int(11)
,`idchucnang` int(11)
,`username` varchar(255)
,`vaitro` varchar(100)
,`chucnang` varchar(100)
,`viettat` varchar(100)
,`nhom` varchar(100)
,`mota` varchar(100)
);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `testsum`
-- (See below for the actual view)
--
CREATE TABLE `testsum` (
`hanghoa_id` int(11)
,`hoten` varchar(100)
,`id` int(11)
);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuonghieu`
--

CREATE TABLE `thuonghieu` (
  `id` int(11) NOT NULL,
  `tenthuonghieu` varchar(100) CHARACTER SET utf8 NOT NULL,
  `code` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `logo` varchar(100) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thuonghieu`
--

INSERT INTO `thuonghieu` (`id`, `tenthuonghieu`, `code`, `logo`) VALUES
(1, 'Acer', 'Acer', '1480746673Brands-43.jpg'),
(2, 'APPLE', 'APPLE', '1480746699Brands-16.jpg'),
(3, 'Archos', 'Archos', '1480746718Brands-53.jpg'),
(4, 'ASUS', 'ASUS', '1480746743Brands-15.jpg'),
(5, 'Bavapen', 'Bavapen', '1480746772Brands-512.jpg'),
(6, 'Acer1', 'Acer1', ''),
(7, 'Thương hiệu 1', 'Thuong-hieu-1', ''),
(8, 'Thương hiệu 2', 'Thuong-hieu-2', ''),
(9, 'Thương hiệu 3', 'Thuong-hieu-3', ''),
(10, 'Thương hiệu 4', 'Thuong-hieu-4', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `vaitro` enum('quanly','nhanvien') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'nhanvien'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `vaitro`) VALUES
(6, 'admin', 'Cf0ecL4rS3qXNs_59CDlWuFquvux3MaT', '$2y$13$vYadNg8VxFtBW.B1ETj2LOY4trUnCkhjZHTWJ/GoeXhRuliMTpZi2', NULL, 'kiep@adf.com123123', 10, 1490550779, 1490943002, 'nhanvien'),
(7, 'superadmin', 'ExVNbj3Yu5_xSiezY_ZSvgHhM3-UBjDk', '$2y$13$Oxn6dXm0WG6J5szCBApgQO5RlkXE3p7IPiwqp7LSOizf8OPkCj5wi', NULL, 'kiepsn@asdf.c', 10, 1490695193, 1490942511, 'quanly'),
(9, 'nhanvien', 'MgBkmkVzuAPaUXk0xWqNcc6cOSBaf49S', '$2y$13$7OrRsdGGX3YBFKZKeqy6zuuqGxJiCj9hx643VZnxL78UAxwzapTHO', NULL, 'kiep@adf.com', 10, 1490697987, 1490943671, 'nhanvien'),
(10, 'quanly1', 'A-ePllHYe_FTqBfQSJFEUVcWkV3GmMfO', '$2y$13$IUnHK1nDJVKF2gvEmbprCOCxKmIQf1VJxYbLWBQ6uZkxlK2zHrbRq', NULL, 'kie@gmail.com', 10, 1490888743, 1490888743, 'nhanvien'),
(11, 'quản lý thương hiệu', '9nJoYVNUUybU_WyEofksLF33JkYp-Knm', '$2y$13$ALPiBwvP4Ah4uBnrr5VfbOSshK/kOj.GwAFXwR6vkaBpGIEPKaDxu', NULL, 'kiep1@adf.com', 10, 1490941674, 1490941674, 'nhanvien'),
(12, 'quản lý hàng hóa', 'GUZ4-cTA2tl7hHkDk1gbK-Yx9sXl7bkA', '$2y$13$aBXWxWkfxcNLNNI/4I90kOJNmxsdJbrY/y9oLmpzAQ0Wq3C8aj0Du', NULL, 'kiep2@adf.com', 10, 1490941701, 1490941701, 'nhanvien'),
(13, 'quản lý loại hàng', 'n9aeRiTqc7pd1wUvfh8rYRwqOgaDwUZI', '$2y$13$TknYWlTHMUGniw8XJ3wyIOF1IuFqY7nbEqfyOqhkCGCvWgjyPflTm', NULL, 'kiep1@adf.com3', 10, 1490941723, 1490941723, 'nhanvien');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vaitro`
--

CREATE TABLE `vaitro` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `vaitro`
--

INSERT INTO `vaitro` (`id`, `name`) VALUES
(1, 'Loại hàng'),
(2, 'Hàng hóa'),
(3, 'Thương hiệu'),
(4, 'bossssssssssssssss');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vaitronguoidung`
--

CREATE TABLE `vaitronguoidung` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vaitro_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `vaitronguoidung`
--

INSERT INTO `vaitronguoidung` (`id`, `user_id`, `vaitro_id`) VALUES
(8, 10, 1),
(18, 11, 3),
(19, 12, 2),
(20, 13, 1),
(21, 7, 1),
(22, 7, 2),
(23, 7, 3),
(24, 7, 4),
(25, 6, 1),
(27, 9, 1),
(28, 9, 2),
(29, 9, 3),
(30, 9, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vaitro_chucnang`
--

CREATE TABLE `vaitro_chucnang` (
  `id` int(11) NOT NULL,
  `vaitro_id` int(11) NOT NULL,
  `chucnang_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `vaitro_chucnang`
--

INSERT INTO `vaitro_chucnang` (`id`, `vaitro_id`, `chucnang_id`) VALUES
(156, 2, 9),
(157, 4, 9),
(158, 2, 10),
(159, 4, 10),
(160, 2, 11),
(161, 4, 11),
(162, 2, 12),
(163, 4, 12),
(164, 2, 21),
(165, 4, 21),
(166, 1, 5),
(167, 4, 5),
(168, 1, 6),
(169, 4, 6),
(170, 1, 7),
(171, 4, 7),
(172, 1, 8),
(173, 4, 8),
(174, 1, 20),
(175, 4, 20),
(176, 4, 13),
(177, 4, 14),
(178, 4, 15),
(179, 4, 16),
(180, 4, 22),
(181, 3, 1),
(182, 4, 1),
(183, 3, 2),
(184, 4, 2),
(185, 3, 3),
(186, 4, 3),
(187, 3, 4),
(188, 4, 4),
(189, 4, 23),
(190, 4, 17),
(191, 4, 18),
(192, 4, 19),
(193, 4, 24);

-- --------------------------------------------------------

--
-- Cấu trúc cho view `chitiethang`
--
DROP TABLE IF EXISTS `chitiethang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `chitiethang`  AS  select distinct `hh`.`id` AS `id`,`hh`.`mahang` AS `mahang`,`hh`.`tenhang` AS `tenhang`,`lh`.`tenloaihang` AS `tenloaihang`,`th`.`tenthuonghieu` AS `tenthuonghieu`,`ncc`.`tennhacungcap` AS `tennhacungcap`,`hh`.`dongia` AS `dongia`,`hh`.`noibat` AS `noibat`,`hh`.`banchay` AS `banchay`,`hh`.`motangangon` AS `motangangon`,`hh`.`code` AS `code`,`hh`.`motachitiet` AS `motachitiet`,`hh`.`tinhtrang` AS `tinhtrang`,`ha`.`file` AS `file` from ((((`hanghoa` `hh` join `loaihang` `lh` on((`hh`.`loaihang_id` = `lh`.`id`))) join `thuonghieu` `th` on((`hh`.`thuonghieu_id` = `th`.`id`))) join `nhacungcap` `ncc` on((`hh`.`nhacungcap_id` = `ncc`.`id`))) join `hinhanh` `ha` on((`hh`.`id` = `ha`.`hanghoa_id`))) ;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `phanquyen`
--
DROP TABLE IF EXISTS `phanquyen`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `phanquyen`  AS  select `u`.`id` AS `iduser`,`vt`.`id` AS `idvaitro`,`cn`.`id` AS `idchucnang`,`u`.`username` AS `username`,`vt`.`name` AS `vaitro`,`cn`.`name` AS `chucnang`,`cn`.`viettat` AS `viettat`,`cn`.`nhom` AS `nhom`,`cn`.`mota` AS `mota` from ((((`user` `u` join `vaitronguoidung` `vtnd` on((`u`.`id` = `vtnd`.`user_id`))) join `vaitro` `vt` on((`vtnd`.`vaitro_id` = `vt`.`id`))) join `vaitro_chucnang` `vtcn` on((`vt`.`id` = `vtcn`.`vaitro_id`))) join `chucnang` `cn` on((`vtcn`.`chucnang_id` = `cn`.`id`))) ;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `testsum`
--
DROP TABLE IF EXISTS `testsum`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `testsum`  AS  select `dhct`.`hanghoa_id` AS `hanghoa_id`,`dh`.`hoten` AS `hoten`,`dh`.`id` AS `id` from (`donhang` `dh` join `donhangchitiet` `dhct` on((`dh`.`id` = `dhct`.`donhang_id`))) group by `dhct`.`hanghoa_id` ;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Chỉ mục cho bảng `chucnang`
--
ALTER TABLE `chucnang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `donhangchitiet`
--
ALTER TABLE `donhangchitiet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hanghoa_id` (`hanghoa_id`),
  ADD KEY `donhang_id` (`donhang_id`);

--
-- Chỉ mục cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loaihang_id` (`loaihang_id`),
  ADD KEY `nhacungcap_id` (`nhacungcap_id`),
  ADD KEY `thuonghieu_id` (`thuonghieu_id`);

--
-- Chỉ mục cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hanghoa_id` (`hanghoa_id`);

--
-- Chỉ mục cho bảng `loaihang`
--
ALTER TABLE `loaihang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thuonghieu`
--
ALTER TABLE `thuonghieu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Chỉ mục cho bảng `vaitro`
--
ALTER TABLE `vaitro`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vaitronguoidung`
--
ALTER TABLE `vaitronguoidung`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_vaitronguoidung_user1_idx` (`user_id`),
  ADD KEY `fk_vaitronguoidung_vaitro1_idx` (`vaitro_id`);

--
-- Chỉ mục cho bảng `vaitro_chucnang`
--
ALTER TABLE `vaitro_chucnang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_vaitro_chucnang_vaitro1_idx` (`vaitro_id`),
  ADD KEY `fk_vaitro_chucnang_chucnang1_idx` (`chucnang_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `chucnang`
--
ALTER TABLE `chucnang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT cho bảng `donhangchitiet`
--
ALTER TABLE `donhangchitiet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT cho bảng `loaihang`
--
ALTER TABLE `loaihang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT cho bảng `thuonghieu`
--
ALTER TABLE `thuonghieu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT cho bảng `vaitro`
--
ALTER TABLE `vaitro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `vaitronguoidung`
--
ALTER TABLE `vaitronguoidung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT cho bảng `vaitro_chucnang`
--
ALTER TABLE `vaitro_chucnang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;
--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `donhangchitiet`
--
ALTER TABLE `donhangchitiet`
  ADD CONSTRAINT `donhangchitiet_ibfk_1` FOREIGN KEY (`hanghoa_id`) REFERENCES `hanghoa` (`id`),
  ADD CONSTRAINT `donhangchitiet_ibfk_2` FOREIGN KEY (`donhang_id`) REFERENCES `donhang` (`id`);

--
-- Các ràng buộc cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `hanghoa_ibfk_1` FOREIGN KEY (`loaihang_id`) REFERENCES `loaihang` (`id`),
  ADD CONSTRAINT `hanghoa_ibfk_2` FOREIGN KEY (`nhacungcap_id`) REFERENCES `nhacungcap` (`id`),
  ADD CONSTRAINT `hanghoa_ibfk_3` FOREIGN KEY (`thuonghieu_id`) REFERENCES `thuonghieu` (`id`);

--
-- Các ràng buộc cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD CONSTRAINT `hinhanh_ibfk_1` FOREIGN KEY (`hanghoa_id`) REFERENCES `hanghoa` (`id`);

--
-- Các ràng buộc cho bảng `vaitronguoidung`
--
ALTER TABLE `vaitronguoidung`
  ADD CONSTRAINT `fk_vaitronguoidung_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vaitronguoidung_vaitro1` FOREIGN KEY (`vaitro_id`) REFERENCES `vaitro` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `vaitro_chucnang`
--
ALTER TABLE `vaitro_chucnang`
  ADD CONSTRAINT `fk_vaitro_chucnang_chucnang1` FOREIGN KEY (`chucnang_id`) REFERENCES `chucnang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vaitro_chucnang_vaitro1` FOREIGN KEY (`vaitro_id`) REFERENCES `vaitro` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
