-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 27, 2023 lúc 05:29 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tritongdoanbe1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL COMMENT 'id comment',
  `username` text NOT NULL,
  `email` text NOT NULL,
  `review` longtext NOT NULL,
  `assess` int(11) NOT NULL COMMENT 'danh gia',
  `time` datetime NOT NULL COMMENT 'ngày giờ đánh giá',
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id_comment`, `username`, `email`, `review`, `assess`, `time`, `id`) VALUES
(1, 'Tri Tổng', 'tritong302@gmail.com', 'oke', 2, '2023-11-24 12:34:56', 10),
(2, 'Duc Minh', 'john.doe@gmail.com', 'Great product!', 4, '2023-11-25 08:45:30', 6),
(3, 'Minh tấn', 'mary.smith@yahoo.com', 'Not satisfied with the service.', 2, '2023-11-26 15:20:00', 17),
(32, 'Tổng', 'h@gmail.com', 'dd', 4, '2023-12-03 02:34:07', 2),
(31, 'Tấn', '21211tt1535@mail.tdc.edu.vn', 'dd', 3, '2023-12-03 02:30:35', 2),
(8, 'Huy', 'tanhuy@gamil.com', 'ddd', 5, '2023-11-27 01:28:28', 17),
(34, 'Tổng', 'ngotan112@gmail.com', 'eeeee', 5, '2023-12-10 15:25:19', 6),
(40, 'ghg', 'tanhuy@gamil.com', 'ddddd', 3, '2023-12-26 21:30:05', 3),
(41, 'ghg', 'tritong302@gmail.com', 'ddddd', 3, '2023-12-26 21:30:07', 43),
(38, 'ghg', 'tritong302@gmail.com', 'a', 1, '2023-12-26 21:15:23', 6),
(39, 'tong', 'hdhdh@gmail.com', 'okeeee', 5, '0000-00-00 00:00:00', 3),
(37, 'Minh Tấn', 'ngotan112@gmail.com', 'Du', 5, '2023-12-26 20:26:10', 2),
(36, 'Tấn Huy', 'tanhuy@gamil.com', 'Du', 5, '2023-12-26 20:26:03', 2),
(35, 'ghg', 'tritong302@gmail.com', '', 5, '2023-12-10 15:25:35', 6),
(30, 'ghg', 'ngotan112@gmail.com', 'okeeee', 5, '2023-12-03 02:02:13', 2),
(29, 'Tấn Huy', 'ngotan112@gmail.com', 'okeeee', 5, '2023-12-03 02:02:04', 2),
(28, 'ghg', 'tritong302@gmail.com', 'tgg', 5, '2023-11-30 10:57:45', 15),
(27, 'Tấn Huy', 'tritong302@gmail.com', 'tgg', 5, '2023-11-30 10:57:26', 15),
(33, 'Minh Tấn', 'tanhuy@gamil.com', 'eeeee', 5, '2023-12-10 15:25:15', 6),
(42, 'Tấn Huy', 'ngotan112@gmail.com', 'dd', 1, '2023-12-26 21:33:59', 3),
(43, 'Chuyên gia săn sale', 'ngotan112@gmail.com', 'dd', 1, '2023-12-26 21:34:01', 3),
(44, 'tong', 'tanhuy@gamil.com', 'okeeee', 5, '0000-00-00 00:00:00', 11),
(45, 'Sư tử', 'tanngo@gmail.com', 'Dữuuuuuu', 4, '0000-00-00 00:00:00', 11),
(46, 'Mèo mun', 'tanngo@gmail.com', 'Dữuuuuuu', 4, '0000-00-00 00:00:00', 5),
(47, 'admin', 'gohan98sc1@gmail.com', 'a', 5, '2023-12-26 21:39:08', 5),
(48, 'admin', 'gohan98sc1@gmail.com', 'a', 5, '2023-12-26 21:39:20', 5),
(49, 'tong', 'tritong@gmail.com', 'a', 1, '2023-12-27 15:56:45', 5),
(50, 'tong', 'tritong@gmail.com', 'a', 1, '2023-12-27 15:56:50', 5),
(51, 'KenBenCam', 'kenluadao@hihi.com', 'Cũng dữ dữ', 3, '0000-00-00 00:00:00', 14),
(52, 'tong', 'tritong@gmail.com', 'a', 2, '2023-12-27 18:00:31', 14),
(53, 'HiepLuaDao', 'Hiepluadao@hihi.com', 'Cũng ghê ghê', 3, '0000-00-00 00:00:00', 4),
(54, 'MinhTan', 'tanluadao@hihi.com', 'Gớm', 3, '0000-00-00 00:00:00', 13),
(55, 'TriTongVjp', 'chanqua@hihi.com', 'Được được', 3, '0000-00-00 00:00:00', 20),
(56, 'TanHuy', 'tanhuy@gmail.com', 'hay', 5, '0000-00-00 00:00:00', 16),
(57, 'Minh Tấn', 'tan114@gmail.com', 'Nhìn cũng tamh', 5, '0000-00-00 00:00:00', 24),
(58, 'Tấn Huy', 'tanhuy@gmail.com', 'Đẹp đấy', 3, '2023-12-27 21:26:54', 24),
(59, 'KenBenCam', 'kenbencam@gamil.com', 'Quá xịn', 4, '0000-00-00 00:00:00', 41),
(61, 'hihi', 'heheam@gamil.com', 'Quá vjp', 4, '0000-00-00 00:00:00', 42);

--
-- Bẫy `comment`
--
DELIMITER $$
CREATE TRIGGER `after_insert_comment` AFTER INSERT ON `comment` FOR EACH ROW BEGIN
    -- Tăng số lượng comment trong bảng comment_count khi có comment mới
    UPDATE comment_count
    SET comment_count = comment_count + 1;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment_count`
--

CREATE TABLE `comment_count` (
  `id_comment_count` int(11) NOT NULL,
  `comment_count` int(11) DEFAULT 0,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment_count`
--

INSERT INTO `comment_count` (`id_comment_count`, `comment_count`, `id`) VALUES
(1, 40, 0),
(2, 42, 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `email`
--

CREATE TABLE `email` (
  `email_id` int(11) NOT NULL COMMENT 'id email',
  `name_email` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `email`
--

INSERT INTO `email` (`email_id`, `name_email`) VALUES
(1, 'fffdd@gmail.com'),
(2, 'tritong302@gmail.com'),
(3, 'ngotan112@gamil.com'),
(4, 'tanhuy113@mail.com'),
(5, 'gohan98sc1@gmail.com'),
(6, 'dddd@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufactures`
--

CREATE TABLE `manufactures` (
  `manu_id` int(11) NOT NULL,
  `manu_name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `manufactures`
--

INSERT INTO `manufactures` (`manu_id`, `manu_name`) VALUES
(1, 'Sony'),
(2, 'Sennheiser'),
(3, 'Apple'),
(4, 'MSI'),
(5, 'Logitech'),
(12, 'Marshall'),
(11, 'JBL');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `addressid` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL DEFAULT '',
  `total` double NOT NULL DEFAULT 0,
  `time` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `user_id`, `name`, `addressid`, `email`, `telephone`, `note`, `total`, `time`) VALUES
('#735053', 0, 'Tri Tổng', '493 Nơ Trang Long,  Phường 13, Quận Bình Thạnh, Thành Phố Hồ Chí Minh', 'tritong302@gamil.com', '394866302', 'Đắt quá', 437552000, '26/12/2023 21:40:50'),
('#964869', 73, 'Nguyễn Hiệp', 'Bu Gia Phuc, Phu Nghia, Bu Gia Map, Binh Phuoc Binh Phuoc Vietnam', 'gohan98sc1@gmail.com', '0949985409', 'ff', 152192000, '10/12/2023 1:24:05'),
('#401777', 0, 'Tấn Huy', 'Lào', 'tanhuy@gmail.com', '114', 'Mua hết cái web', 437552000, '26/12/2023 21:40:50'),
('#994967', 0, 'Minh Tấn', '195/7E Đình Phong Phú, Tăng Nhơn Phú B, Quận 9', 'ngotan@gmail.com', '949985409', 'Rẻ', 437552000, '26/12/2023 21:40:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_product`
--

CREATE TABLE `order_product` (
  `order_id` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount` int(11) NOT NULL DEFAULT 0,
  `amount` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_product`
--

INSERT INTO `order_product` (`order_id`, `product_id`, `price`, `quantity`, `discount`, `amount`) VALUES
('#811355', 25, 2249000, 1, 0, 2249000),
('#811355', 24, 1759000, 1, 20, 1407200),
('#735053', 4, 76900000, 1, 0, 76900000),
('#735053', 3, 15700000, 1, 0, 15700000),
('#983939', 4, 76900000, 1, 0, 76900000),
('#983939', 3, 15700000, 1, 0, 15700000),
('#983939', 2, 33900000, 1, 20, 27120000),
('#983939', 6, 250000, 1, 20, 200000),
('#214314', 2, 33900000, 1, 20, 27120000),
('#964869', 7, 23780000, 8, 20, 152192000),
('#401777', 2, 33900000, 1, 20, 27120000),
('#994967', 7, 23780000, 23, 20, 437552000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `manu_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `product_type_id` int(11) NOT NULL COMMENT 'id product_type',
  `price` int(11) NOT NULL,
  `image` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `feature` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_view` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `manu_id`, `type_id`, `product_type_id`, `price`, `image`, `description`, `feature`, `created_at`, `product_view`) VALUES
(3, 'Smart Tivi 4K Sony KD-43X75 43 inch 4K HDR Android TV', 1, 1, 1, 15700000, 'tivi-3.jpg', 'Hình ảnh 4K sắc nét từ Bộ xử lý 4K X1™ cùng công nghệ X-Reality™ PRO\r\nTái tạo dải màu rộng hơn, chính xác hơn với công nghệ Live Colour™\r\nHỗ trợ định dạng âm thanh Dolby Audio\r\nTìm kiếm bằng giọng nói, HĐH Android tích hợp trợ lý ảo Google Assistant', 0, '2023-12-27 10:41:55', 23),
(4, 'Smart Tivi 4K Sony KD-85X86J 85 inch Google TV', 1, 1, 1, 76900000, 'tivi-4.jpg', 'TV trí tuệ nhân tạo AI nhận thức đầu tiên trên thế giới\r\nBộ xử lý X1™ nâng cấp lên hình ảnh 4K với độ phân giải gấp 4 lần Full HD\r\nChuyển động mượt Motionflow XR 800\r\nĐộ tương phản chân thực nhờ 4K Triluminos Pro™\r\nMàu sắc và độ tương phản trung thực hơn nữa\r\nÂm thanh, hình ảnh hài hòa, loa gắn vào khung viền, âm thanh phát ra từ đúng vị trí trong cảnh', 0, '2023-12-27 15:30:05', 22),
(5, 'Tivi Sony 32 inch 32R300E, HD Ready, MXR 100Hz', 1, 1, 1, 6300000, 'tivi-5.jpg', 'Độ phân giải màn hình HD hình ảnh sắc nét, màu sắc rực rỡ.\r\nCông nghệ Clear Resolution Enhancer cho hình ảnh mượt mà, sắc nét.\r\nBộ 4 bảo vệ X-Protection PRO bảo vệ tivi tránh hư hỏng do các yếu tố bên ngoài.\r\nHỗ trợ các kết nối USB , kết nối HDMI, Tích hợp bộ thu DVB-T2', 0, '2023-12-27 11:01:46', 15),
(6, 'Tai nghe Sennheiser MX 400 II (đen, trắng, xám)', 2, 2, 2, 250000, 'tai-nghe-1.jpg', 'Nếu bạn đang tìm kiếm một dòng tai nghe giá rẻ, đáp ứng nhu cầu âm thanh mà một dòng tai nghe thông thường có thể làm được thì Sennheiser MX 400 II chính là sản phẩm hữu dụng mà bạn đang tìm kiếm. Tai nghe nhạc MX 400 II trang bị cho mình dải tần trải dài 55Hz - 15000Hz, đáp ứng chi tiết âm thanh vượt trội nhất. Tuy với mức giá \"hạt dẻ\" nhưng MX400 II cao cấp co chế độ bảo hành lên tới 2 năm đáp ứng nhu cầu sử dụng người dùng. Dây dài 1,2m giúp bạn nghe nhạc thoải mái hơn. Chỉ cần cắm Jack cắm 3,5m vào điện thoại là bạn đã có thể vô tư nghe nhạc, và bạn cũng có thể cho điện thoại vào túi xách, túi quần rất tiện dụng.', 1, '2023-12-27 14:34:06', 95),
(7, 'Bếp từ Kangaroo sở hữu nhiều tính năng an toàn, đảm bảo yên tâm khi sử dụng:\n- Cảnh báo khi không có', 2, 8, 2, 23780000, 'tai-nghe-2.jpg', 'Tai nghe Sennheiser IE 800 là 1 trong những sản phẩm tai nghe công nghệ hot và đắt nhất trên thị trường hiện nay. Tuy đắt nhưng sản phẩm này lại được rất nhiều anh em săn đón. Tại sao lại như vậy? Chắc hẳn chiếc tai nghe nhạc này không phải dạng vừa. Hãy cùng META đi tìm hiểu chi tiết sản phẩm trong bài viết này nhé!', 1, '2023-12-27 11:23:23', 55),
(8, 'Tai nghe EPOS Sennheiser PC 7 USB', 2, 8, 3, 1200000, 'tai-nghe-3.jpg', 'Kết nối với máy tính qua cổng USB, cắm là chạy, thật đơn giản\r\nÂm thanh khi nghe và nói rất rõ ràng với giả cả phải chăng.\r\nMicrophone hạn chế , giảm thiểu tiếng ồn xung quanh\r\nTai nghe khá nhẹ và thoải mái', 0, '2023-12-27 11:04:11', 5),
(9, 'Tai nghe Sennheiser HDR165', 2, 8, 0, 3630000, 'tai-nghe-4.jpg', 'Tai nghe không dây Sennheiser HDR 165 có kiểu dáng đẹp mắt với tông màu đen sang trọng, kích thước nhỏ gọn, trọng lượng nhẹ khoảng 300g giúp bạn dễ dàng mang theo tới bất kỳ đâu để thỏa mãn niềm đam mê âm nhạc của mình. Tai nghe Sennheiser HDR165 truyền tín hiệu digital rất tốt và ổn định với khoảng cách lên đến tối đa 30m.', 1, '2023-12-05 09:07:56', 18),
(10, 'Tai nghe Sennheiser MX 375', 2, 8, 0, 529000, 'tai-nghe-5.jpg', 'Tai nghe Sennheiser MX 375 với âm bass mạnh mẽ, chất lượng âm thanh trong sáng, trung thực, rõ ràng, đem đến cho người dùng những trải nghiệm âm thanh hoàn hảo, đáp ứng dải tần 20Hz - 22kHz cho âm thanh trầm bổng theo từng nốt nhạc.', 1, '2023-12-27 08:28:39', 34),
(11, 'Apple iphone 11 128GB', 3, 3, 0, 899000, 'smartphone1.jpg', 'LCD cỡ 6,1 inch, tốc độ làm mới 60Hz\r\nFace ID góc rộng\r\nApple A13 Bionic 6 lõi, tốc độ 2,66 Ghz; Quy trình công nghệ 7nm thế hệ thứ 2 của TSMC\r\nNgâm dưới nước ở độ sâu 2m trong 30 phút\r\n128GB', 1, '2023-12-26 17:01:08', 7),
(12, 'iPhone SE 2022 64GB', 3, 3, 0, 12990000, 'smartphone2.jpg', 'Màn hình: Kích thước 4.7 inch, độ sáng 625 nit\r\nHệ điều hành: iOS 15.\r\nCamera sau: Độ phân giải 12 MP.\r\nCamera trước: Độ phân giải 7 MP.\r\nChip: Apple A15 Bionic.', 0, '2022-10-28 11:59:15', 0),
(13, 'Apple Iphone 14 Pro 512GB Space Black', 3, 3, 0, 36990000, 'smartphone3.jpg', 'Công nghệ màn hình LTPO Super Retina XDR OLED, 120Hz, HDR10, Dolby Vision, 1000 nits (typ), 2000 nits (HBM)\r\nCamera chính 48MP + Phụ 12MP + 12MP, camera selfie 12MP ở mặt trước\r\nVi xử lý Apple A16 Bionic 4nm với Apple GPU (5-core graphics)\r\nPin Li-Ion 3200mAh, Sạc không dây MagSafe', 0, '2023-12-27 11:04:38', 3),
(14, 'Apple Iphone 13 Pro 128G Silver', 3, 3, 0, 23990000, 'smartphone4.jpg', 'Công nghệ màn hình OLED Super Retina\r\nCamera 12MP + 12MP + 12MP, camera selfie 12MP ở mặt trước\r\nVi xử lý Apple A15 5nm với RAM 6GB\r\nSử dụng cả ngày, hỗ trợ sạc nhanh 20W\r\n128GB', 1, '2023-12-27 11:00:44', 7),
(15, 'APPLE iPhone 12 64G Green', 3, 3, 0, 14990000, 'smartphone5.jpg', 'Công nghệ màn hình OLED Super Retina\r\nCamera kép 12MP + 12MP, camera selfie 12MP ở mặt trước\r\nVi xử lý Apple A14 5nm với RAM 4GB\r\nSử dụng cả ngày, hỗ trợ sạc nhanh 20W', 1, '2023-12-26 14:34:41', 62),
(16, 'Laptop MSI Modern 14 B5M R5 5500U/8GB/512GB/Túi/Chuột/Win11 (203VN) ', 4, 4, 0, 13690000, 'laptop-1.jpg', 'Laptop MSI Modern 14 B5M R5 5500U (203VN) sở hữu kiểu dáng thanh lịch với thiết kế màn hình viền mỏng cùng cấu hình ổn định, sẵn sàng đồng hành cùng bạn trong mọi tác vụ xử lý công việc hay giải trí.', 0, '2023-12-27 15:29:56', 6),
(17, 'Laptop MSI Modern 14 i7-1195G7/8GB/512GB/Win11 B11MOU-1065VN', 4, 4, 0, 20590000, 'laptop-2.jpg', 'Thiết kế thời thượng, kiểu dáng nhỏ gọn với trọng lượng chỉ 1.3kg\r\nHiệu suất mạnh mẽ, xử lý mượt mà mọi tác vụ nhờ CPU i7-1195G7\r\nRAM 8GB đa nhiệm có thể làm việc với nhiều Tab mà không giật, lag\r\nỔ cứng 512GB cho không gian lưu trữ lớn, mở các ứng dụng nhanh chóng\r\nCó đủ các cổng kết nối hiện đại, thông dụng giúp nhận và truyền dữ liệu\r\nMàn hình Full HD, độ phân giải 1920x1080 hiển thị hình ảnh sắc nét', 1, '2023-12-27 11:04:41', 116),
(18, 'Laptop MSI GF66 i7-12650H/8GB/512GB/Win11 12UCK-804VN', 4, 4, 0, 26990000, 'laptop-3.jpg', 'Ngoại hình mạnh mẽ, phong cách thiết kế chuẩn Gaming với bàn phím tuyệt đẹp\r\nVi xử lý Intel Core i7-12650H Gen 12 cho hiệu năng mạnh mẽ chạy mượt mọi tựa game\r\nTrang bị Card đồ họa NVIDIA GeForce RTX đem lại đồ họa ray-tracing siêu chân thực\r\nRAM DDR4 8GB đa nhiệm cho phép Laptop làm việc với nhiều Tab mà không giật, lag\r\nỔ cứng 512GB lưu trữ được nhiều dữ liệu, khởi động máy và các ứng dụng nhanh hơn\r\nMàn hình 144Hz cho hình ảnh ấn tượng và mượt mà để bạn luôn bắt kịp mọi chuyển động\r\nBàn phím gaming RGB có thể cài đặt màu theo sở thích người dùng: đỏ, xanh, vàng,...\r\nCụm tản nhiệt cho CPU và GPU đảm bảo hiệu năng tối đa ngay cả khi chơi các game nặng', 1, '2022-10-28 11:59:15', 0),
(19, 'Laptop MSI Modern 15 A5M R7-5700U/8GB/512GB/Win11 (239VN)', 4, 4, 0, 45990000, 'laptop-4.jpg', 'Trải nghiệm hình ảnh rõ nét, chân thực trên màn hình 15.6 inch FHD\r\nCPU AMD Ryzen™ 7 5700U mạnh mẽ giải quyết công việc nhanh chóng\r\nRAM 8GB DDR4 giúp laptop đa nhiệm mượt mà, ổn định hạn chế giật lag\r\nỔ cứng SSD 512GB giúp khởi động máy nhanh, không gian lưu trữ tốt\r\nÂm thanh Hi-res Audio cho trải nghiệm âm thanh giải trí cực sống động\r\nThời lượng pin lên đến 10 giờ đáp ứng tốt nhu cầu học tập, làm việc\r\nĐèn nền bàn phím hỗ trợ người dùng khi làm việc ở môi trường thiếu sáng', 0, '2022-10-28 11:59:15', 0),
(20, 'Laptop MSI Crosshair 15 B12UEZ-460VN', 4, 4, 0, 36990000, 'laptop-5.jpg', 'Laptop MSI Crosshair 15 B12UEZ 460VN chạy trên con chip xử lý Intel Core H-series thế hệ thứ 12 mới nhất. Chip 14 nhân, 24 luồng đảm bảo hiệu suất phát huy tối đa trong quá trình chơi game. Dung lượng RAM 16GB cùng ổ cứng SSD 1TB PCle cho khả năng lưu trữ lớn, không bị giật lag trong quá trình sử dụng.', 1, '2023-12-27 11:04:45', 14),
(21, 'Chuột Gaming không dây Logitech G304', 5, 5, 0, 890000, 'chuot-1.jpg', 'Đem đến sự lựa chọn có giá thành phù hợp dành cho các game thủ, chuột Logitech G304 được nâng cấp toàn diện so với các thế hệ trước nhờ sở hữu thiết kế đột phá, cảm biến HERO 12.000 mức DPI, hệ thống 6 nút lập trình để tùy chỉnh tính năng và công nghệ tương tác không dây vượt trội LIGHTSPEED.', 1, '2023-12-05 09:26:47', 10),
(22, 'Chuột Bluetooth Logitech M650', 5, 5, 0, 849000, 'chuot-2.jpg', 'Với thiết kế tập trung vào người dùng, chuột không dây Logitech Signature M650 sẽ hứa hẹn cung cấp những trải nghiệm sử dụng thoải mái nhất. Sản phẩm nổi bật với tính năng cuộn SmartWheel, kết nối không dây liền mạch, nút bấm yên tĩnh và nút bên có thể tùy chỉnh.', 0, '2023-12-26 14:39:32', 1),
(23, 'Chuột có dây Logitech M90', 5, 5, 0, 119000, 'chuot-3.jpg', 'Chuột Logitech M90 là giải pháp bền bỉ, đơn giản và hiệu quả để dùng cho văn phòng, góc làm việc hoặc góc học tập. Thiết bị được thiết kế theo phong cách nhẹ nhàng với hai tone màu xám – đen. Chiều dài dây 1,8 mét linh hoạt kết hợp cùng độ nhạy 1000 DPI chắc chắn sẽ giúp M90 phục vụ bạn một cách hiệu quả.', 1, '2022-10-28 11:59:15', 0),
(24, 'Chuột Gaming Logitech G502 Hero High Performance', 5, 5, 0, 1759000, 'chuot-5.jpg', 'Với thiết kế đậm chất gaming và những nét cắt xẻ cực cá tính, chuột Logitech G502 HERO High Performance sẽ là trợ thủ đắc lực để game thủ có điều kiện phô diễn kỹ năng thượng thừa trong từng pha giao tranh gay cấn. Mọi chi tiết của sản phẩm như cảm biến quang học, hệ thống nút bấm, trọng lượng và đèn RGB đều được tối ưu hợp lý nhằm tạo điều kiện tốt nhất khi chơi game.', 1, '2023-12-27 14:34:02', 9),
(25, 'Chuột không dây Logitech MX Master 3', 5, 5, 0, 2249000, 'chuot-4.jpg', 'Chuột không dây Logitech MX Master 3 được thiết kế với kiểu dáng hỗ trợ cử động cổ tay và bàn tay thoải mái nhất, có thể vận hành mượt mà trên nhiều bề mặt nhờ độ phân giải cảm biến lên tới 4000 DPI và hỗ trợ công nghệ Logitech Flow giúp duy trì tương tác với ba máy tính hoặc laptop riêng biệt.', 0, '2023-12-27 12:42:58', 5),
(30, 'Loa Jbl', 0, 0, 1, 1232122312, 'OIP.jpg', 'Loa JBL chính hãng, trả góp 0%, giao hàng nhanh\r\nLoa JBL là một trong những sự lựa chọn hàng đầu cho những tín đồ âm nhạc không chỉ tại Việt Nam mà còn trên nhiều thị trường khác trên toàn thế giới. Hãng JBL không chỉ cung cấp nhiều dòng loa với mẫu mã đa dạng mà công suất cũng rất mạnh mẽ, kết hợp nhiều công nghệ âm thanh tiên tiến, hứa hẹn mang đến cho người dùng những phút giây giải trí chất lượng vượt trội.\r\n\r\nGiới thiệu thương hiệu JBL\r\nJBL (James Bullough Lansing) được thành lập bởi James Bullough Lansing vào năm 1946 tại Los Angeles, California, Hoa Kỳ và hiện thuộc sở hữu của tập đoàn Harman International. Đây là một trong những thương hiệu điện tử âm thanh nổi tiếng không chỉ tại Việt Nam mà còn ở nhiều thị trường khác trên toàn thế giới.\r\n\r\nJBL là thương hiệu loa của tập đoàn Harman International\r\n\r\nJBL là thương hiệu loa của tập đoàn Harman International\r\n\r\nTrong những năm đầu hoạt động, doanh nghiệp tập trung vào việc sản xuất loa và các loại linh kiện âm thanh dành cho các hệ thống công suất lớn như loa hội trường, loa phim trường,... Hiện nay, JBL đã trở thành một trong những cái tên hàng đầu trong việc sản xuất và cung cấp ra thị trường các dòng loa bluetooth, loa thanh, tai nghe,... sử dụng cho hệ thống âm thanh gia đình và những dàn âm thanh chuyên nghiệp.\r\n\r\nLoa JBL được người dùng đánh giá cao nhờ có chất lượng bền bỉ, công suất đa dạng và mạnh mẽ kết hợp cùng nhiều công nghệ tiên tiến, mang đến chất âm lôi cuốn và đắm chìm cho không gian.\r\n\r\nĐặc điểm loa JBL\r\nThiết kế\r\nVề thiết kế, các sản phẩm của JBL luôn được chăm chút rất tỉ mỉ, mức độ hoàn thiện cũng như độ bền của vật liệu sử dụng cao. Loa JBL có thiết kế với dạng hình hộp chữ nhật ngang hoặc đứng, lấy màu đen làm tông màu chủ đạo và điểm xuyết thêm một số họa tiết màu xanh, hồng, vàng,... hoặc thiết kế mặt lưới gợn sóng giúp tổng thể thiết bị thêm phần nổi bật.\r\n\r\nThiết kế gợn sóng đẹp mắt của loa JBL\r\n\r\nThiết kế gợn sóng đẹp mắt của loa JBL\r\n\r\nMột số dòng loa của hãng cũng được trang bị hệ thống đèn LED nhấp nháy theo nhạc cực kỳ ấn tượng cùng khả năng chống nước chuẩn IPX2, IPX4,... để khách hàng có thể sử dụng tại nhiều không gian hơn, kể cả ở bên hồ bơi hoặc bờ biển.\r\n\r\nCó thể sử dụng loa JBL ở bên hồ bơi nhờ có khả năng chống nước tốt\r\n\r\nCó thể sử dụng loa JBL ở bên hồ bơi nhờ có khả năng chống nước tốt\r\n\r\nCông suất và chất lượng âm thanh\r\nLoa JBL được trang bị hệ thống củ loa đa dạng tùy vào mỗi dòng loa khác nhau như loa toàn dải 2 chiều, loa tweeter, loa bass,... có thể tái tạo chất âm tuyệt vời ở dải tần số rộng, vừa sâu lắng vừa trong trẻo và ít bị méo tiếng.\r\n\r\nLoa JBL có thể trình diễn những dòng âm thanh chất lượng, mạnh mẽ\r\n\r\nLoa JBL có thể trình diễn những dòng âm thanh chất lượng, mạnh mẽ\r\n\r\nLoa của hãng này có khả năng trình diễn âm nhạc mới mức công suất cực kỳ mạnh mẽ và đa dạng như 150W, 600W, 800W, 1100W,... mang đến trải nghiệm chân thật như bạn đang được tận tai lắng nghe buổi trình diễn âm nhạc sống động. Với mức công suất đa dạng, khách hàng có thể sử dụng loa tại nhiều không gian khác nhau từ trong nhà ra ngoài trời.\r\n\r\nCông nghệ và tính năng\r\nLoa JBL được nhà sản xuất trang bị nhiều công nghệ và tính năng tiên tiến như PSL (Passive Sound Lighting), DJ Launch-Pad, cổng kết nối micro để hát karaoke,... để mang đến trải nghiệm sử dụng tuyệt vời hơn cho người dùng.\r\n\r\nKinh nghiệm chọn mua loa JBL\r\nNếu đang có ý định mua một chiếc loa, bạn có thể xem xét các yếu tố sau đây để đảm bảo bạn chọn được sản phẩm chất lượng, phù hợp với nhu cầu và ngân sách của mình:\r\n\r\n- Chọn loa theo kích thước và thiết kế: Loa JBL được sản xuất với nhiều mẫu mã và kích thước khác nhau. Bạn có thể dựa vào không gian mà bạn sẽ bố trí loa để lựa chọn được sản phẩm có kích thước phù hợp với diện tích phòng, giúp bạn thưởng thức chất âm hay hơn mà không khiến gian phòng trở nên chật chội.\r\n\r\nChọn loa JBL có kích thước phù hợp với không gian sử dụng\r\n\r\nChọn loa JBL có kích thước phù hợp với không gian sử dụng\r\n\r\n- Chọn loa theo công suất âm thanh: Tùy thuộc vào diện tích không gian sử dụng mà bạn có thể lựa chọn sản phẩm có mức công suất phù hợp. Nếu không có kiến thức trong chuyện này, bạn có thể tham khảo bảng chọn công suất loa theo diện tích phòng như sau:\r\n\r\nDiện tích không gian	Công suất phù hợp\r\nDưới 10m2	Dưới 30W\r\n10 - 15m2	30 - 45W\r\n15 - 25m2	45 - 75W\r\n25 - 35m2	75 - 105W\r\n35 - 45m2	105 - 135W\r\n45 - 55m2	135 - 165W\r\nTrên 55m2	Tăng thêm 3W/m2\r\n- Chọn loa có giá phù hợp với điều kiện tài chính: Hãy xác định mức ngân sách mà bạn có thể chi trả cho việc mua loa. Các dòng loa JBL hiện nay được bán với mức giá đa dạng từ vài triệu đến vài chục triệu đồng. Việc biết được khả năng chi trả của mình sẽ giúp bạn tìm được chiếc loa phù hợp nhanh hơn. Ngoài ra, bạn cũng có thể tìm kiếm những đơn vị cung cấp loa theo hình thức trả góp để sở hữu chiếc loa yêu thích mà không cần lo lắng về gánh nặng tài chính.\r\n\r\n- Kiểm tra chất lượng âm thanh trước khi mua: Nếu mua loa trực tiếp từ cửa hàng, bạn có thể yêu cầu đơn bị bán cho bạn nghe thử âm thanh phát ra từ chiếc loa định mua. Việc nghe thử âm thanh trực tiếp giúp bạn quyết định xem loa có phù hợp với sở thích âm nhạc của bạn hay không.\r\n\r\n- Chính sách bảo hành sau mua: Kiểm tra kỹ chính sách bảo hành của nhà sản xuất hoặc đơn vị phân phối đối với sản phẩm để đảm bảo bạn có một dịch vụ hỗ trợ xử lý chuyên nghiệp nếu gặp vấn đề với loa trong quá trình sử dụng sau này.\r\n\r\nMua loa JBL chính hãng, giá tốt tại Siêu Thị Điện Máy - Nội Thất Chợ Lớn\r\nSiêu Thị Điện Máy - Nội Thất Chợ Lớn là một trong những đơn vị cung cấp các sản phẩm loa JBL chính hãng hàng đầu tại Việt Nam hiện nay. Đến đây, quý khách hàng sẽ có cơ hội trải nghiệm mua sắm thoải mái với các dòng loa JBL đa dạng chủng loại và mức giá. Đồng thời, không chỉ mua được chiếc loa ưng ý mà người mua sẽ nhận được sự tư vấn nhiệt tình của đội ngũ nhân viên để đảm bảo bạn chọn được sản phẩm phù hợp với nhu cầu của mình.\r\n\r\nSiêu Thị Điện Máy - Nội Thất Chợ Lớn\r\n\r\nSiêu Thị Điện Máy - Nội Thất Chợ Lớn\r\n\r\nBên cạnh loa JBL, Điện Máy - Nội Thất Chợ Lớn cũng là nơi cung cấp nhiều dòng loa của các thương hiệu nổi tiếng khác như loa Jamo, Paramax, Nanomax, Bose, Samsung,... Vì vậy, bạn có thể đến đây để tham khảo, trải nghiệm sản phẩm của nhiều hãng khác nhau để tìm ra sản phẩm ưng ý nhất.\r\n\r\nĐừng bỏ lỡ cơ hội sở hữu những sản phẩm âm thanh chất lượng vượt trội với giá ưu đãi tại Điện Máy - Nội Thất Chợ Lớn. Hãy truy cập ngay vào website https://dienmaycholon.vn/ hoặc đi đến cửa hàng gần nhất để lựa chọn cho mình chiếc loa JBL yêu thích.\r\n\r\n', 1, '2023-12-27 11:27:53', 0),
(40, 'Loa JBL Partybox Ultimate', 0, 0, 0, 3990000, 'jbl39.jpg', 'Thiết kế trẻ trung với hiệu ứng ánh sáng đẹp mất\r\nChất âm bùng nổ\r\nCông nghệ âm thanh JBL Original Pro Sound đa hướng\r\nKháng nước IPX4\r\nDễ dàng sử dụng, điều khiển', 0, '2023-12-27 11:28:27', 1),
(109, 'Loa Jbl', 1, 20, 11, 222, 'OIP.jpg', 'Loa JBL chính hãng, trả góp 0%, giao hàng nhanh\r\nLoa JBL là một trong những sự lựa chọn hàng đầu cho những tín đồ âm nhạc không chỉ tại Việt Nam mà còn trên nhiều thị trường khác trên toàn thế giới. Hãng JBL không chỉ cung cấp nhiều dòng loa với mẫu mã đa dạng mà công suất cũng rất mạnh mẽ, kết hợp nhiều công nghệ âm thanh tiên tiến, hứa hẹn mang đến cho người dùng những phút giây giải trí chất lượng vượt trội.\r\n\r\nGiới thiệu thương hiệu JBL\r\nJBL (James Bullough Lansing) được thành lập bởi James Bullough Lansing vào năm 1946 tại Los Angeles, California, Hoa Kỳ và hiện thuộc sở hữu của tập đoàn Harman International. Đây là một trong những thương hiệu điện tử âm thanh nổi tiếng không chỉ tại Việt Nam mà còn ở nhiều thị trường khác trên toàn thế giới.\r\n\r\nJBL là thương hiệu loa của tập đoàn Harman International\r\n\r\nJBL là thương hiệu loa của tập đoàn Harman International\r\n\r\nTrong những năm đầu hoạt động, doanh nghiệp tập trung vào việc sản xuất loa và các loại linh kiện âm thanh dành cho các hệ thống công suất lớn như loa hội trường, loa phim trường,... Hiện nay, JBL đã trở thành một trong những cái tên hàng đầu trong việc sản xuất và cung cấp ra thị trường các dòng loa bluetooth, loa thanh, tai nghe,... sử dụng cho hệ thống âm thanh gia đình và những dàn âm thanh chuyên nghiệp.\r\n\r\nLoa JBL được người dùng đánh giá cao nhờ có chất lượng bền bỉ, công suất đa dạng và mạnh mẽ kết hợp cùng nhiều công nghệ tiên tiến, mang đến chất âm lôi cuốn và đắm chìm cho không gian.\r\n\r\nĐặc điểm loa JBL\r\nThiết kế\r\nVề thiết kế, các sản phẩm của JBL luôn được chăm chút rất tỉ mỉ, mức độ hoàn thiện cũng như độ bền của vật liệu sử dụng cao. Loa JBL có thiết kế với dạng hình hộp chữ nhật ngang hoặc đứng, lấy màu đen làm tông màu chủ đạo và điểm xuyết thêm một số họa tiết màu xanh, hồng, vàng,... hoặc thiết kế mặt lưới gợn sóng giúp tổng thể thiết bị thêm phần nổi bật.\r\n\r\nThiết kế gợn sóng đẹp mắt của loa JBL\r\n\r\nThiết kế gợn sóng đẹp mắt của loa JBL\r\n\r\nMột số dòng loa của hãng cũng được trang bị hệ thống đèn LED nhấp nháy theo nhạc cực kỳ ấn tượng cùng khả năng chống nước chuẩn IPX2, IPX4,... để khách hàng có thể sử dụng tại nhiều không gian hơn, kể cả ở bên hồ bơi hoặc bờ biển.\r\n\r\nCó thể sử dụng loa JBL ở bên hồ bơi nhờ có khả năng chống nước tốt\r\n\r\nCó thể sử dụng loa JBL ở bên hồ bơi nhờ có khả năng chống nước tốt\r\n\r\nCông suất và chất lượng âm thanh\r\nLoa JBL được trang bị hệ thống củ loa đa dạng tùy vào mỗi dòng loa khác nhau như loa toàn dải 2 chiều, loa tweeter, loa bass,... có thể tái tạo chất âm tuyệt vời ở dải tần số rộng, vừa sâu lắng vừa trong trẻo và ít bị méo tiếng.\r\n\r\nLoa JBL có thể trình diễn những dòng âm thanh chất lượng, mạnh mẽ\r\n\r\nLoa JBL có thể trình diễn những dòng âm thanh chất lượng, mạnh mẽ\r\n\r\nLoa của hãng này có khả năng trình diễn âm nhạc mới mức công suất cực kỳ mạnh mẽ và đa dạng như 150W, 600W, 800W, 1100W,... mang đến trải nghiệm chân thật như bạn đang được tận tai lắng nghe buổi trình diễn âm nhạc sống động. Với mức công suất đa dạng, khách hàng có thể sử dụng loa tại nhiều không gian khác nhau từ trong nhà ra ngoài trời.\r\n\r\nCông nghệ và tính năng\r\nLoa JBL được nhà sản xuất trang bị nhiều công nghệ và tính năng tiên tiến như PSL (Passive Sound Lighting), DJ Launch-Pad, cổng kết nối micro để hát karaoke,... để mang đến trải nghiệm sử dụng tuyệt vời hơn cho người dùng.\r\n\r\nKinh nghiệm chọn mua loa JBL\r\nNếu đang có ý định mua một chiếc loa, bạn có thể xem xét các yếu tố sau đây để đảm bảo bạn chọn được sản phẩm chất lượng, phù hợp với nhu cầu và ngân sách của mình:\r\n\r\n- Chọn loa theo kích thước và thiết kế: Loa JBL được sản xuất với nhiều mẫu mã và kích thước khác nhau. Bạn có thể dựa vào không gian mà bạn sẽ bố trí loa để lựa chọn được sản phẩm có kích thước phù hợp với diện tích phòng, giúp bạn thưởng thức chất âm hay hơn mà không khiến gian phòng trở nên chật chội.\r\n\r\nChọn loa JBL có kích thước phù hợp với không gian sử dụng\r\n\r\nChọn loa JBL có kích thước phù hợp với không gian sử dụng\r\n\r\n- Chọn loa theo công suất âm thanh: Tùy thuộc vào diện tích không gian sử dụng mà bạn có thể lựa chọn sản phẩm có mức công suất phù hợp. Nếu không có kiến thức trong chuyện này, bạn có thể tham khảo bảng chọn công suất loa theo diện tích phòng như sau:\r\n\r\nDiện tích không gian	Công suất phù hợp\r\nDưới 10m2	Dưới 30W\r\n10 - 15m2	30 - 45W\r\n15 - 25m2	45 - 75W\r\n25 - 35m2	75 - 105W\r\n35 - 45m2	105 - 135W\r\n45 - 55m2	135 - 165W\r\nTrên 55m2	Tăng thêm 3W/m2\r\n- Chọn loa có giá phù hợp với điều kiện tài chính: Hãy xác định mức ngân sách mà bạn có thể chi trả cho việc mua loa. Các dòng loa JBL hiện nay được bán với mức giá đa dạng từ vài triệu đến vài chục triệu đồng. Việc biết được khả năng chi trả của mình sẽ giúp bạn tìm được chiếc loa phù hợp nhanh hơn. Ngoài ra, bạn cũng có thể tìm kiếm những đơn vị cung cấp loa theo hình thức trả góp để sở hữu chiếc loa yêu thích mà không cần lo lắng về gánh nặng tài chính.\r\n\r\n- Kiểm tra chất lượng âm thanh trước khi mua: Nếu mua loa trực tiếp từ cửa hàng, bạn có thể yêu cầu đơn bị bán cho bạn nghe thử âm thanh phát ra từ chiếc loa định mua. Việc nghe thử âm thanh trực tiếp giúp bạn quyết định xem loa có phù hợp với sở thích âm nhạc của bạn hay không.\r\n\r\n- Chính sách bảo hành sau mua: Kiểm tra kỹ chính sách bảo hành của nhà sản xuất hoặc đơn vị phân phối đối với sản phẩm để đảm bảo bạn có một dịch vụ hỗ trợ xử lý chuyên nghiệp nếu gặp vấn đề với loa trong quá trình sử dụng sau này.\r\n\r\nMua loa JBL chính hãng, giá tốt tại Siêu Thị Điện Máy - Nội Thất Chợ Lớn\r\nSiêu Thị Điện Máy - Nội Thất Chợ Lớn là một trong những đơn vị cung cấp các sản phẩm loa JBL chính hãng hàng đầu tại Việt Nam hiện nay. Đến đây, quý khách hàng sẽ có cơ hội trải nghiệm mua sắm thoải mái với các dòng loa JBL đa dạng chủng loại và mức giá. Đồng thời, không chỉ mua được chiếc loa ưng ý mà người mua sẽ nhận được sự tư vấn nhiệt tình của đội ngũ nhân viên để đảm bảo bạn chọn được sản phẩm phù hợp với nhu cầu của mình.\r\n\r\nSiêu Thị Điện Máy - Nội Thất Chợ Lớn\r\n\r\nSiêu Thị Điện Máy - Nội Thất Chợ Lớn\r\n\r\nBên cạnh loa JBL, Điện Máy - Nội Thất Chợ Lớn cũng là nơi cung cấp nhiều dòng loa của các thương hiệu nổi tiếng khác như loa Jamo, Paramax, Nanomax, Bose, Samsung,... Vì vậy, bạn có thể đến đây để tham khảo, trải nghiệm sản phẩm của nhiều hãng khác nhau để tìm ra sản phẩm ưng ý nhất.\r\n\r\nĐừng bỏ lỡ cơ hội sở hữu những sản phẩm âm thanh chất lượng vượt trội với giá ưu đãi tại Điện Máy - Nội Thất Chợ Lớn. Hãy truy cập ngay vào website https://dienmaycholon.vn/ hoặc đi đến cửa hàng gần nhất để lựa chọn cho mình chiếc loa JBL yêu thích.\r\n\r\n', 0, '2023-12-27 11:31:53', 3),
(31, 'Tivi mới', 0, 0, 0, 12000000, 'tivi-3.jpg', 'Dữ lắm á', 0, '2023-12-27 11:28:04', 1),
(32, 'Loa JBL GO3', 0, 0, 0, 690000, 'jbpgo3.webp', 'Đặc điểm nổi bật của loa JBL Go Essential:\r\nJBL Go Essential có kiểu dáng đẹp mắt, thiết kế nhỏ và nằm gọn trong lòng bàn tay\r\nMàu đen tối giản, sang trọng thích hợp mang đi cùng trong chuyến du dịch, dã ngoại\r\nƯu việt kháng nước IPX7, tối ưu bảo vệ thiết bị khỏi trời mưa hay bị rơi xuống nước\r\nCông suất loa hoạt động mạnh mẽ 3 W cho bạn thoải mái phát nhạc trong nhiều giờ \r\nPin Lithium-ion polymer (730 mAh) cho thời gian sử dụng tới 5 h và sạc nhanh 2,5 h\r\nCông nghệ Bluetooth cho khả năng kết nối không dây ổn định ở khoảng cách 10 m.', 0, '2023-12-27 14:22:44', 10),
(42, 'Loa Sony không dây', 1, 21, 12, 3690000, 'loasony1.avif', 'Thưởng thức âm thanh mạnh mẽ ở mọi nơi\r\nThưởng thức âm thanh sâu lắng, mạnh mẽ ở bất cứ đâu bạn thích với loa EXTRA BASS™2. Bộ tản âm thụ động kép kết hợp cùng với loa toàn dải sẽ nâng cao chất lượng của các âm sắc thấp, cho âm trầm mạnh mẽ hơn.', 0, '2023-12-27 15:29:48', 1),
(41, 'Loa Sony', 1, 21, 12, 690000, 'jbl39.jpg', 'Loa chôm của nhà thằng bạn', 0, '2023-12-27 15:04:06', 6),
(43, 'Loa Marshall', 12, 21, 12, 5890000, '67709_loa_marshall_acton_iii_mau_kem_5.jpg', 'Loa Marshall Stanmore 2 (II) được người chơi âm thanh biết đến là loa để bàn HiFi, kết nối không dây, đặc biệt là có thiết kế cực kì đẹp mắt, độc quyền từ thương hiệu Marshall của Anh Quốc với kích thước nhỏ gọn.\r\n\r\nNối tiếp sự thành công của phiên bản đời đầu, thì đầu năm 2019 Marshall đã trình làng mẫu loa mới với tên mã Stanmore II, phiên bản mới kế thừa những điểm mạnh và thành công của phiên bản cũ, cùng với đó là những nâng cấp rất đáng giá về cấu hình bên trong.', 1, '2023-12-27 15:29:59', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products_user`
--

CREATE TABLE `products_user` (
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products_user`
--

INSERT INTO `products_user` (`product_id`, `user_id`) VALUES
(2, 69),
(2, 73),
(2, 80),
(3, 73),
(6, 53),
(7, 52),
(7, 71),
(9, 52),
(9, 71),
(10, 52),
(11, 52),
(14, 53),
(15, 73),
(17, 53),
(17, 73),
(21, 53),
(24, 52),
(24, 71),
(25, 52),
(100, 53),
(119, 80);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_type`
--

CREATE TABLE `product_type` (
  `product_type_id` int(11) NOT NULL COMMENT 'id loai san pham',
  `name_product_type` text NOT NULL COMMENT 'ten loai san pham '
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_type`
--

INSERT INTO `product_type` (`product_type_id`, `name_product_type`) VALUES
(12, 'Sập Sình');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_user_cart`
--

CREATE TABLE `product_user_cart` (
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_user_cart`
--

INSERT INTO `product_user_cart` (`product_id`, `user_id`, `quantity`) VALUES
(4, 73, 1),
(2, 73, 1),
(6, 53, 1),
(2, 53, 1),
(98, 53, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `protypes`
--

CREATE TABLE `protypes` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(100) NOT NULL,
  `product_type_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `protypes`
--

INSERT INTO `protypes` (`type_id`, `type_name`, `product_type_id`) VALUES
(1, 'Tivi', 0),
(2, 'Tai nghe', 0),
(3, 'Smartphone', 0),
(4, 'LapTop', 0),
(5, 'Chuột', 0),
(21, 'Loa', 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `telephone` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`, `telephone`, `address`, `role_id`) VALUES
(80, 'tong', 'c4ca4238a0b923820dcc509a6f75849b', 'fffdd@gmail.com', 949985409, 'Paris', 0),
(53, 'tritong', '202cb962ac59075b964b07152d234b70', 'tritong302@gmail.com', 0, NULL, 1),
(73, 'hi', '49f68a5c8493ec2c0bf489821c21fc3b', '3', 3, '3', 0),
(68, 'aa', '202cb962ac59075b964b07152d234b70', 'yaongw@gmail.com', 12312, 'thôn 15, Hòa Đông,  Krông Pắc, Đắk Lắk', 0),
(71, 'hiep', '202cb962ac59075b964b07152d234b70', '3', 1233, '123', 0),
(70, '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, NULL, 0),
(81, 'phudeptrai', 'c4ca4238a0b923820dcc509a6f75849b', 'tritong@gmail.com', 394866302, '493 Nơ Trang Long', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `user_id` (`id`);

--
-- Chỉ mục cho bảng `comment_count`
--
ALTER TABLE `comment_count`
  ADD PRIMARY KEY (`id_comment_count`);

--
-- Chỉ mục cho bảng `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`email_id`);

--
-- Chỉ mục cho bảng `manufactures`
--
ALTER TABLE `manufactures`
  ADD PRIMARY KEY (`manu_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products_user`
--
ALTER TABLE `products_user`
  ADD PRIMARY KEY (`product_id`,`user_id`);

--
-- Chỉ mục cho bảng `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`product_type_id`);

--
-- Chỉ mục cho bảng `product_user_cart`
--
ALTER TABLE `product_user_cart`
  ADD PRIMARY KEY (`product_id`,`user_id`);

--
-- Chỉ mục cho bảng `protypes`
--
ALTER TABLE `protypes`
  ADD PRIMARY KEY (`type_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id comment', AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT cho bảng `comment_count`
--
ALTER TABLE `comment_count`
  MODIFY `id_comment_count` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `email`
--
ALTER TABLE `email`
  MODIFY `email_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id email', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `manufactures`
--
ALTER TABLE `manufactures`
  MODIFY `manu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT cho bảng `product_type`
--
ALTER TABLE `product_type`
  MODIFY `product_type_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id loai san pham', AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `protypes`
--
ALTER TABLE `protypes`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
