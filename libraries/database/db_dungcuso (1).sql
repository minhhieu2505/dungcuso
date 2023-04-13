-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 13, 2023 lúc 04:53 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_dungcuso`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_created` int(11) DEFAULT 0,
  `date_updated` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `slug`, `name`, `photo`, `status`, `date_created`, `date_updated`) VALUES
(3, 'may-thoi', 'Máy thổi', 'may-thoi-lo-100x100-3558.jpg', '', 1681390617, 1681390717),
(6, 'may-khoan', 'Máy Khoan', '2-1-100x100-3619.jpg', '', 1681391350, 0),
(7, 'may-cua', 'Máy Cưa', 'cuaxichacz-100x100-6595.png', '', 1681391364, 0),
(8, 'may-cat', 'Máy Cắt', 'may-cat-sat-oshima-modos2-5-100x100-8529.png', '', 1681391381, 0),
(9, 'may-mai', 'Máy Mài', 'may-mai-goc-100x100-5379.jpg', '', 1681391396, 0),
(10, 'may-bao', 'Máy Bào', 'may-bao-100x100-4902.png', '', 1681391410, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_user` int(11) DEFAULT 0,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_created` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_product` int(11) DEFAULT 0,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_created` int(11) DEFAULT 0,
  `date_updated` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `multi_media`
--

CREATE TABLE `multi_media` (
  `id` int(11) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_video` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_created` int(11) DEFAULT 0,
  `date_updated` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `multi_media`
--

INSERT INTO `multi_media` (`id`, `photo`, `description`, `name`, `link`, `link_video`, `type`, `status`, `date_created`, `date_updated`) VALUES
(38, 'untitled-120-2331-5900.png', '', '', '', '', 'logo', 'hienthi', 1681225465, 1681225794),
(45, 'anh-chup-man-hinh-2022-11-20-luc-131314-69591-65000.png', '', '', '', '', 'slide', 'hienthi', 1681392229, 0),
(46, '960x425-milwaukee-banner-5901-79900.jpg', '', '', '', '', 'slide', 'hienthi', 1681392241, 0),
(47, 'd34c48966208aa9dcd67db79bae6d1fc9bbbf74f-38700-53961.jpeg', '', '', '', '', 'slide', 'hienthi', 1681392241, 0),
(42, 'anh-chup-man-hinh-2022-11-20-luc-131424-89780-53460.png', '', '', '', '', 'slide', 'hienthi', 1681390004, 0),
(48, 'image1-17310-79960.png', '', '', '', '', 'slide', 'hienthi', 1681392256, 0),
(49, 'slideshow-720x385-94540-68761.png', '', '', '', '', 'slide', 'hienthi', 1681392257, 0),
(50, 'anh-chup-man-hinh-2022-11-20-luc-131424-89780-63030.png', '', '', '', '', 'slide', 'hienthi', 1681392276, 0),
(51, 'anh-chup-man-hinh-2022-11-20-luc-131314-69591-91951.png', '', '', '', '', 'slide', 'hienthi', 1681392276, 0),
(52, 'untitled-14-4068-63443.png', 'Cam kết tốt nhất thị trường', 'Giá siêu tốt', '', '', 'tieuchi', 'hienthi', 1681394434, 0),
(53, 'untitled-14-4068-14770.png', 'Cam kết tốt nhất thị trường', 'Giá siêu tốt', '', '', 'tieuchi', 'hienthi', 1681394893, 0),
(54, 'untitled-14-4775-42841.png', 'Cam kết tốt nhất thị trường', 'Giá siêu tốt', '', '', 'tieuchi', 'hienthi', 1681394893, 0),
(55, 'untitled-14-4775-44132.png', 'Cam kết tốt nhất thị trường', 'Giá siêu tốt', '', '', 'tieuchi', 'hienthi', 1681394894, 0),
(56, 'd34c48966208aa9dcd67db79bae6d1fc9bbbf74f-38700-89530.jpeg', '', '', '', '', 'advertise', 'hienthi', 1681395431, 0),
(57, 'anh-chup-man-hinh-2022-11-20-luc-131314-69591-92271.png', '', '', '', '', 'advertise', 'hienthi', 1681395431, 0),
(58, '960x425-milwaukee-banner-5901-59062.jpg', '', '', '', '', 'advertise', 'hienthi', 1681395431, 0),
(59, 'anh-chup-man-hinh-2022-11-20-luc-131424-89780-25853.png', '', '', '', '', 'advertise', 'hienthi', 1681395431, 0),
(60, 'youtube2-51218767-13110-50611-38420.png', '', '', '', '', 'social', 'hienthi', 1681396359, 0),
(61, 'zalo-icon-2475-48070-77411.png', '', '', '', '', 'social', 'hienthi', 1681396359, 0),
(62, 'facebookflogo2021svg-87720-14720.png', '', '', '', '', 'social', 'hienthi', 1681396368, 0),
(63, 'icon-for-skype-18-47420-46591.jpeg', '', '', '', '', 'social', 'hienthi', 1681396368, 0),
(64, '231-17621-55200.png', '', '', '', '', 'social', 'hienthi', 1681396375, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_created` int(11) DEFAULT 0,
  `date_updated` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_user` int(11) DEFAULT 0,
  `code` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_payment` int(11) DEFAULT 0,
  `total_price` double DEFAULT 0,
  `notes` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_created` int(11) DEFAULT 0,
  `order_status` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_order` int(11) DEFAULT 0,
  `id_product` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_category` int(11) DEFAULT 0,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regular_price` double DEFAULT 0,
  `discount` double DEFAULT 0,
  `sale_price` double DEFAULT 0,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_created` int(11) DEFAULT 0,
  `date_updated` int(11) DEFAULT 0,
  `view` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `id_category`, `photo`, `slug`, `content`, `description`, `name`, `sku`, `regular_price`, `discount`, `sale_price`, `status`, `date_created`, `date_updated`, `view`) VALUES
(52, 3, '191b2fc5896a84c4a8247ec81ef078c2clarge-1398.jpg', 'den-pin-cam-tay-led-90m-pretul-lire-200p', '&lt;h2&gt;&lt;b&gt;Đèn pin cầm tay LED 90m Pretul LIRE-200P – Dụng Cụ Số 1&lt;/b&gt;&lt;/h2&gt;\r\n\r\n&lt;p&gt;Dụng Cụ Số 1 chuyên cung cấp sỉ &amp; lẻ đèn pin cầm tay LED 90m Pretul LIRE-200P chất lượng ✓Giá rẻ nhất ✓Giao hàng nhanh chóng ✓Bảo hành chính hãng&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Đèn pin cầm tay LED 90m Pretul LIRE-200P&quot; src=&quot;http://dungcuso1.vn/upload/filemanager/2021/05/1_91b2fc5896a84c4a8247ec81ef078c2c_large.jpg&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Đèn pin cầm tay LED 90m Pretul LIRE-200P là một sản phẩm tốt của thương hiệu hàng đầu châu Mỹ. Pretul là một trong những thương hiệu được yêu thích nhất trên thị trường do sản phẩm chất lượng và được bảo hành đổi mới trong vòng từ 3 tháng. &lt;/p&gt;\r\n\r\n&lt;p&gt;Các loại đèn pin của hãng Pretul luôn được sử dụng trong việc leo núi, làm việc tại các khu hầm mỏ, công trường luôn được đánh giá cao. Trong môi trường ánh sáng yếu, đèn pin cầm tay LED 90m Pretul LIRE-200P hỗ trợ cực tốt với cột sáng mạnh mẽ.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Đèn pin cầm tay LED 90m Pretul LIRE-200P&quot; src=&quot;http://dungcuso1.vn/upload/filemanager/2021/05/2_b5734fd9d1794560969d44f808c92cfe_large.jpg&quot; /&gt; &lt;/p&gt;\r\n\r\n&lt;p&gt;Hiệu suất làm việc cao vì sử dụng pin nguồn pin Lithium-Ion là một kết hợp rất hoàn hảo với sản phẩm. Đèn pin cầm tay Pretul LIRE-200P có thể chiếu sáng với khoảng cách lên đến 90mm, thời gian sử dụng đèn từ 5 đến 7 giờ tùy thuộc vào chế độ đèn mà bạn sử dụng.&lt;/p&gt;\r\n\r\n&lt;p&gt;Nó có thiết kế nhỏ gọn, cầm tay vừa vặn và dễ di chuyển, chất liệu tạo vỏ cao cấp tạo độ bền cao. Đèn pin cầm tay LED 90m Pretul LIRE-200P có vẻ ngoài nổi bật, màu sắc hiện đại và mang tính thẩm mỹ cao đen vàng. Với sự phối hợp này giúp đèn vừa sang trọng vừa sạch dù sử dụng trong thời gian dài. &lt;/p&gt;\r\n', '&lt;p&gt;&lt;strong&gt;Đặc điểm nổi bật&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;&lt;strong&gt;Đèn pin cầm tay LED 90m Pretul LIRE-200P&lt;/strong&gt; làm từ chất liệu nhựa ABS rắn chắc, có độ bền, chịu được lực tốt hơn. Sản phẩm rất bền bỉ, chắc chắn, khó bị biến dạng, tránh cong vênh khi bị tác động mạnh, không dễ bị hư hỏng như các loại thông thường.&lt;/li&gt;\r\n	&lt;li&gt;Sử dụng đèn LED siêu sáng tiết kiệm điện năng. được thiết kế kiểu dạng nhỏ gọn, dễ dàng mang theo khi làm việc hoặc cất giữ 1 cách tiện lợi và nhanh chóng&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', 'Đèn Pin Cầm Tay LED 90m Pretul LIRE-200P', '', 0, 0, 0, 'banchay,hot,hienthi', 1681217410, 1681217437, 0),
(53, 3, 'main95e8d7130211420782b9702da50865d0-1-9560.jpg', 'den-pin-cam-tay-led-350m-truper-lare-300', '&lt;h2&gt;&lt;b&gt;Đèn pin cầm tay LED 350m Truper LARE-300 – Dụng Cụ Số 1&lt;/b&gt;&lt;/h2&gt;\r\n\r\n&lt;p&gt;Dụng Cụ Số 1 chuyên cung cấp sỉ &amp; lẻ đèn pin cầm tay LED 350m Truper LARE-300 chất lượng ✓Giá rẻ nhất ✓Giao hàng nhanh chóng ✓Bảo hành chính hãng&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Đèn pin cầm tay LED 350m Truper LARE-300&quot; height=&quot;800&quot; src=&quot;https://dungcuso1.vn/upload/filemanager/2021/05/2_a750e4dca453467cb46fa4aafc5dd7ef.jpg&quot; width=&quot;1200&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Truper là một trong những thương hiệu được yêu thích nhất trên thị trường do sản phẩm chất lượng và được bảo hành đổi mới trong vòng từ 3 tháng đến 2 năm. Đèn pin cầm tay LED 350m Truper LARE-300  là một sản phẩm tốt của thương hiệu Truper hàng đầu tại Mexico.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Đèn pin cầm tay LED 350m Truper LARE-300&quot; src=&quot;https://dungcuso1.vn/upload/filemanager/2021/05/3_ea137a36235c4e64ba78a1b15a4efbfc.jpg&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Đèn pin cầm tay LED 350m Truper LARE-300 có thể chiếu sáng với khoảng cách lên đến 350mm, thời gian sử dụng đèn từ 5 đến 7 giờ tùy thuộc vào chế độ đèn mà bạn sử dụng. Nó có thiết kế nhỏ gọn, cầm tay vừa vặn và dễ di chuyển, chất liệu tạo vỏ cao cấp tạo độ bền cao bởi hãng luôn bảo hành sản phẩm lên đến 02 năm kể từ ngày mua sản phẩm.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Đèn pin cầm tay LED 350m Truper LARE-300&quot; src=&quot;https://dungcuso1.vn/upload/filemanager/2021/05/1_69e144850eb445d8a2a070a4244ba2e7.jpg&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Đèn pin cầm tay LED 350m Truper LARE-300  có vẻ ngoài nổi bật, màu sắc hiện đại và mang tính thẩm mỹ cao đen đỏ. Với sự phối hợp này giúp đèn vừa sang trọng vừa sạch dù sử dụng trong thời gian dài. &lt;/p&gt;\r\n\r\n&lt;p&gt;Trong môi trường ánh sáng yếu, đèn pin cầm tay LED 350m Truper LARE-300  hỗ trợ cực tốt với cột sáng mạnh mẽ. Hiệu suất làm việc cao vì sử dụng pin nguồn pin Lithium-Ion là một kết hợp rất hoàn hảo với sản phẩm. &lt;/p&gt;\r\n', '&lt;p&gt;&lt;strong&gt;Đặc điểm nổi bật&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Là sản phẩm chính hãng Truper đạt tiêu chuẩn chất lượng cao&lt;/li&gt;\r\n	&lt;li&gt;Được sử dụng nhiều trong các môi trường thiếu ánh sáng&lt;/li&gt;\r\n	&lt;li&gt;Thiết kế chất liệu cao cấp, cho độ chắc chắn và khả năng chịu nhiệt tốt&lt;/li&gt;\r\n	&lt;li&gt;Kiểu dáng nhỏ gọn dễ dàng cất giữ&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', 'Đèn Pin Cầm Tay LED 350m Truper LARE-300', '', 300000, 17, 250000, 'banchay,hot,hienthi', 1681217488, 1681217527, 0),
(54, 3, 'gst-8000e-6250-2012.jpg', 'den-lam-viec-pin-20v-total-twli2001', '&lt;h2&gt;&lt;b&gt;Đèn làm việc pin 20V Total TWLI2001 – Dụng Cụ Số 1&lt;/b&gt;&lt;/h2&gt;\r\n\r\n&lt;p&gt;Dụng Cụ Số 1 chuyên cung cấp sỉ &amp; lẻ đèn làm việc pin 20V Total TWLI2001 chất lượng ✓Hàng chính hãng ✓Giá rẻ nhất ✓Giao hàng nhanh chóng ✓Bảo hành toàn quốc&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Đèn làm việc pin 20V Total TWLI2001&quot; src=&quot;https://dungcuso1.vn/upload/filemanager/2021/05/total_twli2001_1_aa8a9ca19177409c9ad6a91873292750.jpg&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Đèn làm việc pin 20V Total TWLI2001 là một sản phẩm tốt của thương hiệu hàng đầu Trung Quốc Total. Với vị thế không hề nhỏ trong lĩnh vực sản xuất dụng cụ cầm tay, dụng cụ dùng pin và các giải pháp an toàn khác, Total luôn nỗ lực giữ vững vị trí hiện tại, đồng thời định hướng phát triển hơn nữa về mặt số lượng cũng như chất lượng sản phẩm.&lt;/p&gt;\r\n\r\n&lt;p&gt;Đèn làm việc pin 20V Total TWLI2001 được hãng sản xuất theo công nghệ tiên tiến của EU, Mỹ và Úc nên tuổi thọ được đánh giá cao, tiết kiệm điện năng và an toàn với người sử dụng được đặt lên hàng đầu.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Đèn làm việc pin 20V Total TWLI2001&quot; src=&quot;https://dungcuso1.vn/upload/filemanager/2021/05/total_twli2001_3_352cbe8344384dd69747aaca55093bcf.jpg&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Đèn làm việc pin 20V Total TWLI2001 có vẻ ngoài nổi bật, màu sắc hiện đại và mang tính thẩm mỹ cao. Nó có thiết kế nhỏ gọn, cầm tay vừa vặn và dễ di chuyển, chất liệu tạo vỏ cao cấp tạo độ bền cao. Trong môi trường ánh sáng yếu, đèn làm việc pin 20V Total TWLI2001 hỗ trợ cực tốt với cột sáng mạnh mẽ. Hiệu suất làm việc cao vì sử dụng pin nguồn pin Lithium-Ion 20V là một kết hợp rất hoàn hảo với sản phẩm. &lt;/p&gt;\r\n', '&lt;p&gt;&lt;strong&gt;Đặc điểm nổi bật&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Total là thương hiệu nổi tiếng thế giới cung cấp dụng cụ dân dụng, dụng cụ cầm tay và các giải pháp, thiết bị an toàn. Nhãn hiệu Total có nguồn gốc ở Đức và được sản xuất tại Trung Quốc theo các tiêu chuẩn của Mỹ, EU và Úc.&lt;/li&gt;\r\n	&lt;li&gt;Thiết kế nhỏ gọn tiện dụng.&lt;/li&gt;\r\n	&lt;li&gt;Chiếu sáng mạnh mẽ.&lt;/li&gt;\r\n	&lt;li&gt;Làm từ chất liệu bền bỉ, tuổi thọ cao.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', 'Đèn Làm Việc Pin 20V Total TWLI2001', '', 470000, 2, 460000, 'banchay,hot,hienthi', 1681217596, 1681396193, 1),
(55, 3, 'anh-chup-man-hinh-2022-12-03-luc-220154-3767-1616.png', 'may-xit-rua-cao-ap-800w-ryobi-ajp-800', '&lt;h2&gt;Máy xịt rửa cao áp 800W Ryobi AJP-800 – Dụng Cụ Số 1&lt;/h2&gt;\r\n\r\n&lt;p&gt;Dụng Cụ Số 1 chuyên cung cấp sỉ &amp; lẻ Máy xịt rửa cao áp 800W Ryobi AJP-800 chính hãng ✓Giá rẻ nhất ✓Giao hàng nhanh chóng ✓Bảo hành toàn quốc&lt;/p&gt;\r\n\r\n&lt;p&gt;Ryobi là thương hiệu dụng cụ điện cầm tay của Nhật Bản xuất hiện vào năm 1943 tại thành phố Hiroshima. Đến nay hãng đã hơn 70 năm tuổi và có chặng đường phát triển lâu dài, đạt vị thế quan trọng trên thị trường và có sức cạnh tranh mạnh mẽ. Tại Việt Nam, Ryobi đã và đang khẳng định tầm ảnh hưởng với nhiều loại dụng cụ điện cầm tay thiết kế gọn gàng, tinh tế và bền bỉ.&lt;/p&gt;\r\n\r\n&lt;p&gt;Hãng cung cấp các loại máy khoan, máy cưa, máy thổi hơi nóng, thiết bị làm vệ sinh có kiểu dáng sang trọng và tiện dụng. Nhiều người còn ấn tượng với Ryobi bởi sự mới mẻ, thân thiện và giá bán phải chăng ở nhiều phân khúc.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Máy xịt rửa cao áp 800W Ryobi AJP-800 &lt;/strong&gt;của Ryobi nhấn mạnh tính chính xác, sự tiện dụng, thiết kế thẩm mỹ và hiệu năng tốt. Trải qua quy trình nghiên cứu, chế tạo công phu nên chất lượng và độ bền của sản phẩm Ryobi rất đảm bảo&lt;/p&gt;\r\n', '&lt;p&gt;&lt;strong&gt;Đặc điểm nổi bật&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Sản phẩm chính hãng Ryobi, đạt tiêu chuẩn chất lượng cao&lt;/li&gt;\r\n	&lt;li&gt;Thiết kế kiểu dáng hiện đại, nhỏ gọn dễ dàng sử dụng&lt;/li&gt;\r\n	&lt;li&gt;Trang bị động cơ mạnh mẽ xử lý tốt mọi công việcxX&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', 'Máy Xịt Rửa Cao Áp 800W Ryobi AJP-800', '', 0, 0, 0, 'banchay,hot,hienthi', 1681217803, 1681395868, 1),
(56, 3, 'dwh205dh-kr-0-7165.jpg', 'phu-kien-hut-bui-danh-cho-may-khoan-be-tong-dewalt-dwh205dh-kr', '&lt;h2&gt;Đặc điểm của Phụ kiện hút bụi dành cho máy khoan Dewalt DWH205DH-KR&lt;/h2&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Dewalt &lt;/strong&gt;được biết đến là thương hiệu cung cấp dụng cụ cầm tay nổi tiếng đến từ &lt;strong&gt;Mỹ&lt;/strong&gt;. Với lịch sử phát triển lâu đời, chất lượng sản phẩm tốt, độ bền cao giúp sản phẩm đến từ thương hiệu này luôn được người tiêu dùng ưu ái lựa chọn. Hiện tại dụng cụ vật tư Stanley cung cấp tại thị trường Việt Nam gồm: &lt;strong&gt;dụng cụ cầm tay&lt;/strong&gt;, dụng cụ điện cầm tay, dụng cụ đo lường,… vì vậy người dùng sẽ có thể dễ dàng lựa chọn được cho mình một sản phẩm ưng ý.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Phụ kiện hút bụi dành cho máy khoan bê tông DeWALT DWH205DH-KR&quot; height=&quot;400&quot; src=&quot;https://dungcuso1.vn/upload/filemanager/2021/05/DWH205DH-KR-1-600x400.jpg&quot; width=&quot;600&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Phụ kiện hút bụi dành cho máy khoan bê tông DeWALT DWH205DH-KR &lt;/strong&gt;là sản phẩm chính hãng của &lt;strong&gt;Dewalt &lt;/strong&gt;được sản xuất trên dây chuyền công nghệ hiện đại của &lt;strong&gt;Mỹ&lt;/strong&gt;. Luôn đảm bảo chất lượng, hoạt động mạnh mẽ, độ bền theo thời gian mà giá cả lại hợp lý.&lt;/p&gt;\r\n', '&lt;p&gt;&lt;strong&gt;Đặc điểm nổi bật&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Là một sản phẩm chất lượng cao của thương hiệu &lt;strong&gt;Dewalt&lt;/strong&gt;, một thương hiệu hàng đầu của Mỹ&lt;strong&gt;.&lt;/strong&gt;&lt;/li&gt;\r\n	&lt;li&gt;Được chế tạo từ những công nghệ tiên tiến hàng đầu, giúp người dùng có thể sử dụng thoải mái sản phẩm mà không lo về độ bền chất lượng.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', 'Phụ Kiện Hút Bụi Dành Cho Máy Khoan Bê Tông DeWALT DWH205DH-KR', '', 2600000, 0, 0, 'banchay,hot,hienthi', 1681217863, 1681395735, 0),
(57, 3, '45-100x100-6557-3028.jpeg', 'may-khoan-pin-12v-dca-adjz09-10-type-e', '&lt;h2&gt;Đặc điểm của máy khoan DCA ADJZ09-10 (TYPE E)&lt;/h2&gt;\r\n\r\n&lt;p&gt;Máy khoan pin 12V DCA ADJZ09-10 (TYPE E) là sản phẩm đến từ thương hiệu DCA đạt chuẩn quốc tế. DCA là hãng chuyên sản xuất các sản phẩm máy mài cầm tay, máy cắt, máy khoan,… từ dân dụng đến gia dụng. &lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Máy khoan pin 12V DCA ADJZ09-10 (TYPE E)&quot; src=&quot;https://dungcuso1.vn/upload/filemanager/2021/05/main_01ffb750416d4950bd0d14600ffb0622-1.jpg&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Trọng lượng máy nhẹ chỉ 1.0kg vô cùng tiện lợi, dễ dàng vận chuyển, không mất quá nhiều diện tích cất giữ. Máy khoan pin 12V DCA ADJZ09-10 (TYPE E) với khả năng khoan sắt 10mm, gỗ 20mm nên được nhiều công trình xây dựng chuyên nghiệp tin dùng. Được làm từ chất liệu cao cấp máy sở hữu cho mình sự rắn chắc, bền bỉ dù có va đập thì vẫn không biến dạng. &lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Máy khoan pin 12V DCA ADJZ09-10 (TYPE E)&quot; src=&quot;https://dungcuso1.vn/upload/filemanager/2021/05/1_db7d2ca78be54b82b921f9b93a2fcd42.jpg&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Ngoài ra, tay cầm được thiết kế thông minh có độ ma sát cao giúp cố định máy khoan một cách dễ dàng và chắc chắn. Tuổi thọ máy khoan siêu bền nên bạn có thể yên tâm sử dụng trong thời gian dài mà không bị hư hỏng như các loại máy cầm tay khác. &lt;/p&gt;\r\n', '&lt;p&gt;&lt;strong&gt;Đặc điểm nổi bật&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Sản phẩm làm từ chất liệu cao cấp cho độ bền cao cũng như hoạt động ổn định, cho tuổi thọ sản phẩm cao.&lt;/li&gt;\r\n	&lt;li&gt;Sản phẩm đến từ thương hiệu DCA là thương hiệu nổi tiếng chuyên cung cấp các dụng cụ dân dụng chất lượng cao giá thành phù hợp với người tiêu dùng.&lt;/li&gt;\r\n	&lt;li&gt;Thao tác nhanh chóng, dễ dàng.&lt;/li&gt;\r\n	&lt;li&gt;Kiểu dáng nhỏ gọn, tiện dụng.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', 'Máy Khoan Pin 12V DCA ADJZ09-10 (TYPE E)', '', 2600000, 0, 0, 'banchay,hot,hienthi', 1681217921, 1681396184, 0),
(58, 3, '48-100x100-3515-7440.jpeg', 'may-khoan-pin-18v-stanley-scd20d2k', '&lt;p&gt;Máy khoan pin 18v Stanley SCD20D2K – Stanley thương hiệu sở hữu công nghệ tiên tiến hàng đầu chuyên sản xuất dụng cụ cầm tay. Máy khoan pin 18V chuyên sử dụng để khoan và hỗ trợ cho việc bắt vít.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Máy khoan pin 18v Stanley SCD20D2K&quot; src=&quot;https://dungcuso1.vn/upload/filemanager/2021/05/stanley_sdc20d2kb1_2_b278791728014ca4acc835b42bdf1db1_large.jpg&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Máy khoan pin 18v Stanley SCD20D2K được làm từ chất liệu cao cấp cho độ bền cao cũng như hoạt động ổn định. Máy có tốc độ không tải lên đến 750 vòng/phút, cỡ vít tối đa 7mm, khả năng khoan gỗ 25mm và khoan sắt là 12mm.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Máy khoan pin 18v Stanley SCD20D2K&quot; src=&quot;https://dungcuso1.vn/upload/filemanager/2021/05/stanley_sdc20d2kb1_1_988363a3ab3241e7b6c761d4bf7f08ba_large.jpg&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Sản phẩm có thiết kế gọn nhẹ với trọng lượng 1.7kg, tiện lợi trong vận chuyển và tháo rời để thay thế, bảo trì khi có sự cố hỏng hóc. Khả năng khoan và bắt vít của máy mạnh mẽ, tuổi thọ máy cao.&lt;/p&gt;\r\n', '&lt;p&gt;&lt;strong&gt;Đặc điểm nổi bật&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Là một sản phẩm chất lượng cao được chế tạo từ những công nghệ tiên tiến hàng đầu, giúp người dùng có thể sử dụng thoải mái sản phẩm mà không lo về độ bền chất lượng.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', 'Máy Khoan Pin 18v Stanley SCD20D2K', '', 470000, 50, 233333, 'banchay,hot,hienthi', 1681217965, 1681396173, 0),
(59, 3, 'tidli20012-main-780x780-5725.jpg', 'may-khoan-bua-pin-20v-total-tidli20012', '&lt;h2&gt;&lt;strong&gt;Máy khoan búa pin 20V Total TIDLI20012 – Dụng Cụ Số 1&lt;/strong&gt;&lt;/h2&gt;\r\n\r\n&lt;p&gt;Máy khoan búa pin 20V Total TIDLI20012 thuộc bộ sưu tập dụng cụ gia công 2019 của Total. Đi đầu trong sử dụng năng lượng từ pin thế hệ mới, máy khoan chứng tỏ được ưu điểm vượt trội của công nghệ này. Lõi pin giúp tăng cường sự mạnh mẽ của đầu máy, lớp nhựa bên ngoài chịu nhiệt và lực cực tốt.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Máy khoan búa pin 20V Total TIDLI200212&quot; height=&quot;800&quot; src=&quot;https://dungcuso1.vn/upload/filemanager/2022/09/TIDLI20012.jpg&quot; width=&quot;800&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Máy khoan búa pin 20V Total TIDLI20012 giúp cảnh báo mức độ dự trữ điện năng, hỗ trợ sạc pin kịp thời, nhanh chóng. Sản phẩm kèm theo đế sạc điện chuyên dụng, phù hợp với mức điện thế và cường độ khác nhau (220 – 240V ~ 50/60 Hz).&lt;/p&gt;\r\n\r\n&lt;p&gt;Máy khoan búa pin 20V Total TIDLI20012 nhỏ gọn, tạo điều kiện thuận lợi để sử dụng và mang theo hằng ngày. Thân và đầu máy có kích thước hài hòa, đem lại sự cân bằng tuyệt đối, đảm bảo an toàn. Ngoài ra, Máy khoan búa pin P20S Total TIDLI20012 có lắp đặt nhông cơ khí 2 tốc độ, tạo nên sự thay đổi linh hoạt trong quá trình sử dụng.&lt;/p&gt;\r\n', '&lt;p&gt;&lt;strong&gt;Đặc điểm nổi bật&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Total là thương hiệu nổi tiếng thế giới cung cấp dụng cụ dân dụng, dụng cụ cầm tay và các giải pháp, thiết bị an toàn. Nhãn hiệu Total có nguồn gốc ở Đức và được sản xuất tại Trung Quốc theo các tiêu chuẩn của Mỹ, EU và Úc&lt;/li&gt;\r\n	&lt;li&gt;Thân máy thiết kế nhỏ gọn, dễ dàng thao tác.&lt;/li&gt;\r\n	&lt;li&gt;Tay cầm chắc chắn, chống trơn trượt.&lt;/li&gt;\r\n	&lt;li&gt;Tích hợp đèn Led hỗ trợ làm việc trong điều kiện thiếu ánh sáng.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', 'Máy Khoan Búa Pin 20V Total TIDLI20012', '', 0, 0, 0, 'banchay,hot,hienthi', 1681218015, 1681395725, 0),
(60, 3, 'boschgbh432dfrmain600cd99a7566bd34e69b826246ed72c11dc-1-8381.jpg', 'may-khoan-be-tong-3-chuc-nang-bosch-gbh-4-32-dfr', '&lt;h2&gt;Đặc trưng của máy khoan búa Bosch GBH 4-32 DFR&lt;/h2&gt;\r\n\r\n&lt;p&gt;Máy khoan bê tông 3 chức năng Bosch GBH 4-32 DFR là dòng sản phẩm được sản xuất bởi thương hiệu Bosch – thương hiệu dẫn đầu thị trường về sản phẩm dụng cụ tay cầm. Máy khoan bê tông 3 chức năng dùng để siết hai vật lại với nhau, đục hoặc khoan lỗ, khoan thép, bê tông và các vật liệu xây dựng khác tùy thuộc vào nhu cầu sử dụng.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Máy khoan bê tông 3 chức năng Bosch GBH 4-32 DFR&quot; src=&quot;https://dungcuso1.vn/upload/filemanager/2021/05/bosch_gbh432dfr_1_a0d140266178422bb377a67da7a8194a-1.jpg&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Máy khoan bê tông 3 chức năng Bosch GBH 4-32DFR có chức năng đảo và chức năng điều khiển điện tử giúp việc khoan dễ dàng tiện lợi. Ngoài ra sản phẩm có báng cầm mềm để thao tác tiện lợi hơn, không bị mỏi, khả năng kiểm soát tốc độ biến đổi vô cấp để điều chỉnh tốc độ dễ dàng. Công suất của máy cao 900W được tích hợp thêm chức năng đục, tốc độ không tải tối đa cao lên đến 760 vòng/phút, tốc độ dập lên đến 3600 vòng/phút. &lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Máy khoan bê tông 3 chức năng Bosch GBH 4-32 DFR&quot; src=&quot;https://dungcuso1.vn/upload/filemanager/2021/05/bosch_gbh432dfr_2_4cf064882a194c91b52e2297a32d5aed-1.jpg&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Sản phẩm được sản xuất từ vật liệu cao cấp vô cùng cứng cáp. Máy có khớp ly hợp an toàn cho người sử dụng. Đặc biệt còn có thiết kế nhỏ gọn với trọng lượng 4.7kg, không chiếm nhiều không gian, giúp tối ưu trong quá trình sử dụng.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Máy khoan bê tông 3 chức năng Bosch GBH 4-32 DFR&quot; src=&quot;https://dungcuso1.vn/upload/filemanager/2021/05/bosch_gbh432dfr_6_7abdbb59d1bc47c6b1ea021a1606431a-1.jpg&quot; /&gt;&lt;/p&gt;\r\n', '&lt;p&gt;&lt;strong&gt;Đặc điểm nổi bật&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Được sử dụng rộng dãi trong hàng loạt các công việc khoan và đục phá và khi làm việc với một dao cắt lõi&lt;/li&gt;\r\n	&lt;li&gt;Tốc độ khoan nhanh hơn 30% (đường kính khoan 25 mm) so với các máy khác trong cùng dòng&lt;/li&gt;\r\n	&lt;li&gt;Độ rung thấp chỉ 12 m/s² giúp làm việc ít mệt mỏi nhờ chức năng Bosch Vibration Control&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', 'Máy Khoan Bê Tông 3 Chức Năng Bosch GBH 4-32 DFR', '', 0, 0, 0, 'banchay,hot,hienthi', 1681218075, 1681395718, 4),
(61, 3, 'totaltp3202maine821422cdade4bcba044b6c56da58f1f-1-1855.jpg', 'may-bom-nuoc-xang-total-tp3202', '&lt;h2&gt;&lt;b&gt;Máy bơm nước xăng Total TP3202 – Dụng Cụ Số 1&lt;/b&gt;&lt;/h2&gt;\r\n\r\n&lt;p&gt;Dụng Cụ Số 1 chuyên cung cấp sỉ &amp; lẻ máy bơm nước xăng Total TP3202 chất lượng ✓Giá rẻ nhất ✓Giao hàng nhanh chóng ✓Bảo hành chính hãng&lt;/p&gt;\r\n\r\n&lt;p&gt;Trung Quốc – nơi có nguồn vật liệu, nhân công phong phú, dồi dào, giá rẻ là địa điểm lý tưởng để Total xây dựng nhà máy. Với dây chuyền công nghệ sản xuất hiện đại kết hợp với ưu thế nói trên, Total đã tạo ra những sản phẩm không những có độ bền, chất lượng cao mà giá cả cùng phù hợp, phải chăng.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Máy bơm nước xăng Total TP3202&quot; src=&quot;https://dungcuso1.vn/upload/filemanager/2021/05/total_tp3202_1_71c9ad36ccf84f528457ae10a843ded2.jpg&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Máy bơm nước xăng Total TP3202 là sản phẩm chất lượng của Total, dùng để tưới tiêu, bơm hút ao hồ, v.v. Total TP3202 được sử dụng nhiều trong nông nghiệp và có những ưu điểm, tính năng nổi bật như sau:&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Chạy bằng xăng, khởi động bằng tay, trọng lượng 26kg nên dễ di chuyển và sử dụng bất cứ ở đâu mà không lo nguồn điện cấp.&lt;/li&gt;\r\n	&lt;li&gt;Vỏ máy làm từ kim loại, có phủ lớp sơn tĩnh điện chống thấm nước nên chắc chắn, chống gỉ sét.&lt;/li&gt;\r\n	&lt;li&gt;Công suất hoạt động 7HP giúp đẩy nước lên cao tối đa là 28m, hút sâu tối đa 8m.&lt;/li&gt;\r\n	&lt;li&gt;Đường kính ống hút, xả có kích thước 50mm nên có thể bơm với hiệu suất 550 lít/phút.&lt;/li&gt;\r\n	&lt;li&gt;Động cơ được làm từ vật liệu cao cấp, hoạt động ổn định, êm, tiết kiệm nhiên liệu.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Máy bơm nước xăng Total TP3202&quot; src=&quot;https://dungcuso1.vn/upload/filemanager/2021/05/total_tp3202_2_0811ca07f0d94dd7afff5986ef4298a5.jpg&quot; /&gt;&lt;/p&gt;\r\n', '&lt;p&gt;&lt;strong&gt;Đặc điểm nổi bật&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Total là thương hiệu nổi tiếng thế giới cung cấp dụng cụ dân dụng, dụng cụ cầm tay và các giải pháp, thiết bị an toàn. Nhãn hiệu Total có nguồn gốc ở Đức và được sản xuất tại Trung Quốc theo các tiêu chuẩn của Mỹ, EU và Úc&lt;/li&gt;\r\n	&lt;li&gt;Thiết kế chắc chắn, tiện dụng.&lt;/li&gt;\r\n	&lt;li&gt;Sản phẩm làm từ chất liệu cao cấp cho độ bền cao và hoạt động ổn định.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', 'Máy Bơm Nước Xăng Total TP3202', '', 0, 0, 0, 'banchay,hot,hienthi', 1681218130, 1681395712, 0),
(62, 3, 'ingcogwp302mainaceef7edc31e4201aaec88c45c910656-1-5747.jpg', 'may-bom-nuoc-xang-ingco-gwp302', '&lt;p&gt;Dụng Cụ Số 1 chuyên cung cấp sỉ &amp; lẻ máy bơm nước xăng INGCO GWP302 chất lượng ✓Giá rẻ nhất ✓Giao hàng nhanh chóng ✓Bảo hành chính hãng&lt;/p&gt;\r\n\r\n&lt;p&gt;Trung Quốc – nơi có nguồn vật liệu, nhân công phong phú, dồi dào, giá rẻ là địa điểm lý tưởng để INGCO xây dựng nhà máy. Với dây chuyền công nghệ sản xuất hiện đại kết hợp với ưu thế nói trên, INGCO đã tạo ra những sản phẩm không những có độ bền, chất lượng cao mà giá cả cùng phù hợp, phải chăng.&lt;/p&gt;\r\n\r\n&lt;p&gt;Máy bơm nước xăng INGCO GWP302 là sản phẩm chất lượng của INGCO, dùng để tưới tiêu, bơm hút ao hồ, v.v. INGCO GWP302 được sử dụng nhiều trong nông nghiệp và có những ưu điểm, tính năng nổi bật như sau:&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Vỏ máy làm từ kim loại, có phủ lớp sơn tĩnh điện chống thấm nước nên chắc chắn, chống gỉ sét.&lt;/li&gt;\r\n	&lt;li&gt;Công suất hoạt động 7HP giúp đẩy nước lên cao tối đa là 32m, hút sâu tối đa 8m.&lt;/li&gt;\r\n	&lt;li&gt;Đường kính ống hút, xả có kích thước 80mm nên có thể bơm với hiệu suất 100 lít/phút.&lt;/li&gt;\r\n	&lt;li&gt;Chạy bằng xăng, khởi động bằng tay, trọng lượng 25kg nên dễ di chuyển và sử dụng bất cứ ở đâu mà không lo nguồn điện cấp.&lt;/li&gt;\r\n	&lt;li&gt;Động cơ được làm từ vật liệu cao cấp, hoạt động ổn định, êm, tiết kiệm nhiên liệu.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Máy bơm nước xăng INGCO GWP302&quot; src=&quot;https://dungcuso1.vn/upload/filemanager/2021/05/ingco_gwp302_1_072966bdfc2b4aa7811a35f0550decb2.jpg&quot; /&gt;&lt;/p&gt;\r\n', '&lt;p&gt;&lt;strong&gt;Đặc điểm nổi bật&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Sản phẩm làm từ chất liệu cao cấp cho độ bền cao cũng như hoạt động ổn định, cho tuổi thọ sản phẩm cao.&lt;/li&gt;\r\n	&lt;li&gt;Sản phẩm đến từ thương hiệu INGCO là thương hiệu nổi tiếng chuyên cung cấp các dụng cụ dân dụng chất lượng cao giá thành phù hợp với người tiêu dùng.&lt;/li&gt;\r\n	&lt;li&gt;Hoạt động mạnh mẽ, hiệu suất cao.&lt;/li&gt;\r\n	&lt;li&gt;Dễ điều khiển và kiểm soát.&lt;/li&gt;\r\n	&lt;li&gt;Thiết kế tiện dụng dễ dàng bảo quản và cất giữ.&lt;/li&gt;\r\n	&lt;li&gt;Đóng gói bằng thùng carton.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', 'Máy Bơm Nước Xăng INGCO GWP302', '', 2600000, 0, 0, 'banchay,hot,hienthi', 1681218175, 1681395957, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `setting`
--

INSERT INTO `setting` (`id`, `options`, `logo`) VALUES
(2, '{\"address\":\"223\\/6 L\\u00ea T\\u1ea5n B\\u00ea, KP2, P. An L\\u1ea1c, Qu\\u1eadn B\\u00ecnh T\\u00e2n, TP.HCM\",\"email\":\"sale2.dungcuso1@gmail.com\",\"hotline\":\"0367591865\",\"phone\":\"0868960694\",\"zalo\":\"0367591865\",\"website\":\"https:\\/\\/dungcuso1.vn\\/\",\"fanpage\":\"\",\"coords_iframe\":\"\"}', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fullname` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` tinyint(1) DEFAULT 0,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinyint(1) DEFAULT 1,
  `birthday` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fullname`, `phone`, `email`, `address`, `gender`, `status`, `role`, `birthday`) VALUES
(142, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Minh Hiếu', NULL, NULL, NULL, 0, NULL, 1, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `multi_media`
--
ALTER TABLE `multi_media`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `multi_media`
--
ALTER TABLE `multi_media`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT cho bảng `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
