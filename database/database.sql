-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th1 06, 2022 lúc 01:03 PM
-- Phiên bản máy phục vụ: 5.7.31
-- Phiên bản PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quochoang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `role_id`) VALUES
(1, 'admin', '65efee2d9bf893a2dd79933ae2f74d1e', 1),
(2, 'user1', '81dc9bdb52d04dc20036dbd8313ed055', 2),
(3, 'user2', 'e10adc3949ba59abbe56e057f20f883e', 3),
(4, 'user3', 'e10adc3949ba59abbe56e057f20f883e', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufactures`
--

DROP TABLE IF EXISTS `manufactures`;
CREATE TABLE IF NOT EXISTS `manufactures` (
  `manu_id` int(11) NOT NULL AUTO_INCREMENT,
  `manu_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`manu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `manufactures`
--

INSERT INTO `manufactures` (`manu_id`, `manu_name`) VALUES
(1, 'Apple'),
(2, 'Lenovo'),
(3, 'Samsung'),
(4, 'Dell'),
(5, 'Sony'),
(11, 'Lê Thị ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manu_id` int(10) NOT NULL,
  `type_id` int(10) NOT NULL,
  `price` int(20) DEFAULT NULL,
  `image` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `feature` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `manu_id`, `type_id`, `price`, `image`, `description`, `feature`, `created_at`) VALUES
(1, '121212Samsung Galaxy S21 Ultra 5G 128GB', 3, 1, 25990000, '', 'Sự đẳng cấp được Samsung gửi gắm thông qua chiếc smartphone Galaxy S21 Ultra 5G với hàng loạt sự nâng cấp và cải tiến không chỉ ngoại hình bên ngoài mà còn sức mạnh bên trong, hứa hẹn đáp ứng trọn vẹn nhu cầu ngày càng cao của người dùng.', 100, '2020-07-07 17:00:00'),
(2, 'Điện thoại iPhone 12 Pro Max 128GB', 1, 1, 32990000, 'vi-vn-iphone-12-pro-max-1.jpg', 'iPhone 12 Pro Max 128 GB một siêu phẩm smartphone đến từ Apple. Máy có một hiệu năng hoàn toàn mạnh mẽ đáp ứng tốt nhiều nhu cầu đến từ người dùng và mang trong mình một thiết kế đầy vuông vức, sang trọng.', 50, '2021-03-11 17:00:00'),
(3, 'Laptop Apple MacBook Air M1 2020 16GB/512GB/7-core GPU', 1, 2, 39490000, 'apple-macbook-air-m1-2020-z12a00050-1-org.jpg', 'Laptop Apple MacBook Air M1 2020 (Z12A00050) mang nét thanh lịch sang trọng với thiết kế kim loại nguyên khối cùng hiệu năng vượt trội nhờ chip M1 độc quyền của “nhà Táo” sẽ mang đến cho bạn những trải nghiệm riêng biệt mà chỉ dòng máy MacBook mới có được.', 50, '2020-10-12 17:00:00'),
(4, 'Laptop Dell Vostro 3400 i5', 4, 2, 18490000, 'dell-vostro-3400-i5-70253900-1.jpg', 'Với hiệu năng vượt trội đến từ con chip Intel Gen 11 tân tiến ẩn bên trong vẻ ngoài mang phong cách tối giản, thanh lịch, laptop Dell Vostro 3400 i5 (70253900) sẽ là một trong những gợi ý đáng để bạn tìm hiểu và chọn mua.', 60, '2020-08-03 17:00:00'),
(5, 'Máy tính bảng Lenovo Tab P11 Plus', 2, 3, 8190000, 'lenovo-tab-p11-plus-gc.jpg', 'Lenovo Tab P11 Plus sẽ là một lựa chọn để làm việc thay thế laptop khi nhu cầu sử dụng không quá cao, máy được trang bị cấu hình mạnh mẽ, màn hình lớn cùng các chế độ tiện ích đa dạng, đáp ứng được hầu hết nhu cầu của một người sáng tạo với mức giá phải chăng đến từ Lenovo.', 70, '2019-12-11 17:00:00'),
(6, 'Máy tính bảng Samsung Galaxy Tab S7 FE', 3, 3, 12790000, 'samsung-galaxy-tab-s7-fe-green-1-org.jpg', 'Samsung chính thức trình làng mẫu máy tính bảng có tên Galaxy Tab S7 FE, máy trang bị cấu hình mạnh mẽ, màn hình giải trí siêu lớn và điểm ấn tượng nhất là viên pin siêu khủng được tích hợp bên trong, giúp tăng hiệu suất làm việc nhưng vẫn có tính di động cực cao.', 80, '2019-08-05 17:00:00'),
(7, 'Loa Bluetooth Sony SRS-XB13', 5, 4, 1290000, 'bluetooth-sony-srs-xb13-2.2-1-org.jpg', 'Thiết kế loa Bluetooth Sony đơn giản, gọn nhẹ chỉ 0.4 kg, đi kèm dây treo cho bạn dễ dàng đeo vào cổ tay của mình hoặc treo móc vào balo mang theo khi đi chơi, du lịch, đi học,... Chất liệu vỏ nhựa có thêm lớp UV coating cho độ bền cao, chống trầy xước, làm sạch nhẹ nhàng. ', 30, '2020-09-23 17:00:00'),
(8, 'Tai nghe Bluetooth AirPods Pro Wireless Charge Apple MWP22', 1, 4, 4990000, 'airpods-pro-wireless-charge-apple-mwp22-ava-1-org.jpg', 'AirPods Pro với thiết kế gọn gàng, đẹp và tinh tế, tai nghe được thiết kế theo dạng In-ear thay vì Earbuds như AirPods 2, cho phép chống ồn tốt hơn, khó rớt khi đeo và đặc biệt là êm tai hơn.', 45, '2020-11-21 17:00:00'),
(9, 'Samsung Galaxy Watch 3 45mm', 3, 5, 4990000, 'samsung-galaxy-watch-3-45mm-bac-2-org.jpg', 'Samsung Galaxy Watch 3 45mm viền thép bạc dây da với tấm nền Super AMOLED 1.4 inch và độ phân giải 360x360 pixels, đồng hồ có khả năng hiển thị xuất sắc với màu sắc rực rỡ, thông tin hiển thị đầy đủ, rõ ràng. Khung viền của đồng hồ được làm bằng thép không gỉ chắc chắn và chống ăn mòn.', 65, '2020-10-11 17:00:00'),
(17, 'Nguyễn Thị Hải Yến', 1, 1, 450000, 'exe.jpg', 'sdasdadd', NULL, '2020-07-07 17:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `protypes`
--

DROP TABLE IF EXISTS `protypes`;
CREATE TABLE IF NOT EXISTS `protypes` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `protypes`
--

INSERT INTO `protypes` (`type_id`, `type_name`) VALUES
(1, 'Điện thoại'),
(2, 'Laptop'),
(3, 'Máy tính bảng'),
(4, 'Loa'),
(5, 'Đồng hồ'),
(7, 'Lê Thị ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role_id`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 0),
(2, 'user1', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(3, 'hoang', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(4, 'huong', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(5, 'huy', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(9, 'trong', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(6, 'loi', '81dc9bdb52d04dc20036dbd8313ed055', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
