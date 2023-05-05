-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 15, 2023 lúc 06:27 PM
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
(10, 'may-bao', 'Máy Bào', 'may-bao-100x100-4902.png', '', 1681391410, 1681568761);

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

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `photo`, `slug`, `content`, `description`, `name`, `status`, `type`, `date_created`, `date_updated`) VALUES
(36, 'anh-chup-man-hinh-2022-11-20-luc-21936-ch-2061-5533.png', 'bo-san-pham-makita-lua-chon-toi-uu-cua-ban', '&lt;h2&gt;&lt;strong&gt;&lt;a href=&quot;https://dungcuvang.com/collections/bo-san-pham-dung-pin&quot;&gt;Bộ sản phẩm&lt;/a&gt; Makita – Lựa chọn tối ưu của bạn!!&lt;/strong&gt;&lt;/h2&gt;\r\n\r\n&lt;p&gt;Ngày nay, xã hội ngày một phát triển, đồng thời các ngành công nghiệp hiện đại cũng có những yêu cầu khắt khe trong kỹ thuật chuyên môn cũng như đảm bảo năng suất làm việc hiệu quả. Để đáp ứng các nhu cầu đó, những hãng sản xuất về dụng cụ cầm tay đã cho ra đời những sản phẩm tiên tiến với chất lượng cao như các loại máy khoan pin, máy đục dụng pin….&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Banner&quot; data-lazy-sizes=&quot;(max-width: 800px) 100vw, 800px&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/banner-1.jpg&quot; data-lazy-srcset=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/banner-1.jpg 800w, https://dungcuvang.com/wp-content/uploads/2022/10/banner-1-400x400.jpg 400w, https://dungcuvang.com/wp-content/uploads/2022/10/banner-1-300x300.jpg 300w, https://dungcuvang.com/wp-content/uploads/2022/10/banner-1-600x600.jpg 600w, https://dungcuvang.com/wp-content/uploads/2022/10/banner-1-100x100.jpg 100w&quot; data-was-processed=&quot;true&quot; height=&quot;800&quot; sizes=&quot;(max-width: 800px) 100vw, 800px&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/banner-1.jpg&quot; srcset=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/banner-1.jpg 800w, https://dungcuvang.com/wp-content/uploads/2022/10/banner-1-400x400.jpg 400w, https://dungcuvang.com/wp-content/uploads/2022/10/banner-1-300x300.jpg 300w, https://dungcuvang.com/wp-content/uploads/2022/10/banner-1-600x600.jpg 600w, https://dungcuvang.com/wp-content/uploads/2022/10/banner-1-100x100.jpg 100w&quot; width=&quot;800&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Vậy để đáp ứng cho nhu cầu công việc, thì người dùng bắt buộc phải mua nhiều loại máy khác nhau trong nhiều lần đi mua sắm sao? Không!!! Để tiết kiệm khoản thời gian đó, hãng Makita đã cho ra mắt các “bộ sản phẩm” được bán đi kèm với nhau và được trang bị đầy đủ những vật dụng cần thiết để xử lý cho công việc, chúng ta hãy cùng tìm hiểu xem các bộ sản phẩm đó bao gồm những gì nhé.&lt;/p&gt;\r\n\r\n&lt;ol&gt;\r\n	&lt;li&gt;&lt;strong&gt;Bộ Sản Phẩm Máy Vặn Vít, Máy Mài Góc Dùng Pin 18V Makita &lt;a href=&quot;https://dungcuvang.com/products/bo-san-pham-may-van-vit-may-mai-goc-dung-pin-18v-makita-dlx2395j&quot;&gt;DLX2395J&lt;/a&gt;&lt;/strong&gt;&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Đây được xem là một trong các bộ sản phẩm mới đến từ thương hiệu Makita, với bộ combo này người dùng sẽ sở hữu cho mình: 1 chiếc máy vặn vít DTD156Z ; 1 chiếc máy mài góc DGA 404Z ; 1 sạc nhanh ; 2 pin 18V 3.0Ah ; 1 thùng đựng Makpac.&lt;/li&gt;\r\n	&lt;li&gt;Bộ sản phẩm này thích hợp cho nhu cầu sử dụng trong công việc cũng như nhu cầu sử dụng trong gia đình của mỗi người, với combo này chúng ta sẽ dễ dàng bắt ốc vít khi tháo lắp các vật dụng…. cũng như mài cắt các vật liệu như gỗ, ống sắt, thép…. Và đặc biệt hơn là các sản phẩm này đều sử dụng pin 18V của hãng, điều này sẽ giúp việc di chuyển trong khi làm việc linh hoạt hơn và tiện lợi hơn.&lt;/li&gt;\r\n	&lt;li&gt;Bộ sản phẩm &lt;a href=&quot;https://dungcuvang.com/products/bo-san-pham-may-van-vit-may-mai-goc-dung-pin-18v-makita-dlx2395j&quot;&gt;Makita DLX2395J&lt;/a&gt; đang được bán với giá khá tốt tại website &lt;a href=&quot;https://dungcuvang.com/&quot;&gt;dungcuvang.com&lt;/a&gt; , việc mua 1 combo sẽ tiết kiệm kha khá chi phí cho bạn bởi vì những sản phẩm của Makita không chỉ nổi tiếng về chất lượng mà giá cả cũng sẽ không hề thấp, cho nên những bộ sản phẩm với đầy đủ máy, pin, sạc sẽ là lựa chọn tối ưu cho mọi nhu cầu của bạn&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Bộ sản phẩm Makita - Lựa chọn tối ưu của bạn!!&quot; data-lazy-sizes=&quot;(max-width: 800px) 100vw, 800px&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/1-1.jpg&quot; data-lazy-srcset=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/1-1.jpg 800w, https://dungcuvang.com/wp-content/uploads/2022/10/1-1-400x400.jpg 400w, https://dungcuvang.com/wp-content/uploads/2022/10/1-1-300x300.jpg 300w, https://dungcuvang.com/wp-content/uploads/2022/10/1-1-600x600.jpg 600w, https://dungcuvang.com/wp-content/uploads/2022/10/1-1-100x100.jpg 100w&quot; data-was-processed=&quot;true&quot; height=&quot;800&quot; sizes=&quot;(max-width: 800px) 100vw, 800px&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/1-1.jpg&quot; srcset=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/1-1.jpg 800w, https://dungcuvang.com/wp-content/uploads/2022/10/1-1-400x400.jpg 400w, https://dungcuvang.com/wp-content/uploads/2022/10/1-1-300x300.jpg 300w, https://dungcuvang.com/wp-content/uploads/2022/10/1-1-600x600.jpg 600w, https://dungcuvang.com/wp-content/uploads/2022/10/1-1-100x100.jpg 100w&quot; width=&quot;800&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;ol start=&quot;2&quot;&gt;\r\n	&lt;li&gt;&lt;strong&gt;Bộ Sản Phẩm Máy Hút, Máy Thổi Bụi Dùng Pin 12VMax Makita &lt;a href=&quot;https://dungcuvang.com/products/bo-san-pham-may-hut-may-thoi-bui-dung-pin-12vmax-makita-clx246sax2&quot;&gt;CLX246SAX2&lt;/a&gt;&lt;/strong&gt;&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Để đáp ứng các nhu cầu vệ sinh trong công việc cũng như dọn dẹp trong gia đình, Makita đã cho ra mắt bộ sản phẩm CLX246SAX2 bao gồm 1 máy hút bụi, 1 máy thổi dùng pin, đi kèm đó là 1 viên pin 12V 2.0Ah, 1 sạc nhanh, và các phụ kiện đi kèm như túi giấy chứa bụi, túi vải chứa bụi, ống hút mềm, giá đỡ, túi lọc, đầu chổi tròn, tất cả sản phẩm được sắp xếp ngăn nắp trong chiếc túi xách Makita khi mua sản phẩm.&lt;/li&gt;\r\n	&lt;li&gt;Vậy với bộ dụng cụ dùng pin này, người dùng sẽ dễ dàng vệ sinh môi trường làm việc cũng như khuôn viên gia đình một cách tốt hơn, tiết kiệm thời gian và sức lực mà vẫn đảm bảo an toàn sức khỏe của các thành viên trong gia đình. Vậy thì còn chờ gì nữa mà không sở hữu ngay cho mình một bộ sản phẩm Makita &lt;a href=&quot;https://dungcuvang.com/products/bo-san-pham-may-hut-may-thoi-bui-dung-pin-12vmax-makita-clx246sax2&quot;&gt;CLX246SAX2&lt;/a&gt; tại website &lt;a href=&quot;https://dungcuvang.com/&quot;&gt;dungcuvang.com&lt;/a&gt; với giá thành ưu đãi và đi kèm nhiều chương trình hấp dẫn.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Bộ sản phẩm Makita - Lựa chọn tối ưu của bạn!!&quot; data-lazy-sizes=&quot;(max-width: 800px) 100vw, 800px&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2022/09/1.jpg&quot; data-lazy-srcset=&quot;https://dungcuvang.com/wp-content/uploads/2022/09/1.jpg 800w, https://dungcuvang.com/wp-content/uploads/2022/09/1-400x400.jpg 400w, https://dungcuvang.com/wp-content/uploads/2022/09/1-300x300.jpg 300w, https://dungcuvang.com/wp-content/uploads/2022/09/1-600x600.jpg 600w, https://dungcuvang.com/wp-content/uploads/2022/09/1-100x100.jpg 100w&quot; data-was-processed=&quot;true&quot; height=&quot;800&quot; sizes=&quot;(max-width: 800px) 100vw, 800px&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2022/09/1.jpg&quot; srcset=&quot;https://dungcuvang.com/wp-content/uploads/2022/09/1.jpg 800w, https://dungcuvang.com/wp-content/uploads/2022/09/1-400x400.jpg 400w, https://dungcuvang.com/wp-content/uploads/2022/09/1-300x300.jpg 300w, https://dungcuvang.com/wp-content/uploads/2022/09/1-600x600.jpg 600w, https://dungcuvang.com/wp-content/uploads/2022/09/1-100x100.jpg 100w&quot; width=&quot;800&quot; /&gt;&lt;/p&gt;\r\n', 'Bộ sản phẩm Makita – Lựa chọn tối ưu của bạn!! Ngày nay, xã hội ngày một phát triển, đồng thời các ngành công nghiệp hiện đại cũng có những yêu cầu khắt khe trong kỹ thuật chuyên môn cũng như đảm bảo năng suất làm việc hiệu quả. Để đáp ứng các nhu cầu hiện nay', 'Bộ sản phẩm Makita – Lựa chọn tối ưu của bạn!!', 'noibat,hienthi', 'tin-tuc', 1681570510, 1681570603),
(37, 'anh-chup-man-hinh-2022-11-20-luc-22123-ch-3668-3997.png', 'may-phun-xit-rua-cao-ap-ronix', '&lt;h2&gt;&lt;strong&gt;Máy phun rửa áp lực là gì?&lt;/strong&gt;&lt;/h2&gt;\r\n\r\n&lt;p&gt;&lt;a href=&quot;https://dungcuvang.com/collections/may-phun-xit-rua-cao-ap&quot;&gt;Máy phun rửa cao áp&lt;/a&gt; là một công cụ bạn có thể sử dụng để làm sạch các bề mặt khác nhau. Để làm cho dụng cụ hoạt động hiệu quả, bạn cần hai loại nguồn chính: nguồn nước cho lượng nước bạn cần để làm sạch; nguồn điện để tạo ra năng lượng cần thiết cho công việc. Nếu bạn nắm được hai điều đó, phần còn lại là tùy thuộc vào máy phun rửa áp lực của bạn. Nó hút nước từ nguồn nước và bằng cách chạy trên nguồn điện thông qua động cơ, nó sẽ đẩy nước ra ngoài với áp suất cao để loại bỏ những thứ không mong muốn như tảo, nấm mốc, bụi bẩn, v.v. khỏi bề mặt mà bạn hướng máy phun rửa áp lực của mình vào.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Máy phun xịt rửa cao áp RONIX&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2022/07/RPC-U100C.jpg&quot; data-was-processed=&quot;true&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2022/07/RPC-U100C.jpg&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Bây giờ, nếu chúng ta muốn phân loại các loại máy phun rửa áp lực khác nhau, chúng ta có thể làm điều đó theo cách phân loại của hai nguồn nước và điện. Một số máy phun rửa áp lực cần nguồn nước chảy liên tục để làm sạch bề mặt trong khi một số máy có thể thực hiện công việc này ngay cả khi chỉ cần một xô nước nhỏ. Còn về nguồn điện, một số máy được cấp nguồn bằng khí đốt hoặc dòng điện một chiều, trong khi một số máy khác được cấp nguồn bằng pin lithium-ion và các dòng máy đó được gọi là máy phun rửa áp lực dùng pin hoặc máy phun rửa áp lực cao không dây.&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;&lt;strong&gt;Các tính năng khi chọn &lt;a href=&quot;https://dungcuvang.com/collections/may-phun-xit-rua-cao-ap&quot;&gt;máy phun xịt rửa áp lực cao:&lt;/a&gt;&lt;/strong&gt;&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;Khi nói đến những chiếc máy phun xịt rửa không dây, thì tính năng hữu hình nhất nổi bật là pin. Và điều quan trọng nhất đối với pin là các tính năng như tuổi thọ pin, thời gian chạy pin, thời gian sạc cùng với năng lượng mà nó tạo ra. Tiếp theo, bạn cần quan tâm đến nhu cầu sử dụng nước nghĩa là nguồn nước cần dùng là bao nhiêu và nguồn nước cung cấp như thế nào. Tính di động và chức năng, đi kèm chi phí hoạt động sẽ là những tính năng khác mà bạn cần tìm kiếm ở máy phun rửa áp lực không dây, để mua được sản phẩm tốt nhất có thể đáp ứng hiệu quả nhu cầu sử dụng của bạn.&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;&lt;strong&gt;RONIX &lt;a href=&quot;https://dungcuvang.com/products/may-xit-rua-ap-luc-1-400w-ronix-rp-u100c&quot;&gt;RP-U100C&lt;/a&gt; – Máy xịt rửa áp lực cao 1400W&lt;/strong&gt;&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;Đây là dòng máy phun xịt rửa cao áp mới được &lt;strong&gt;Công Ty TNHH TM Trực Tuyến Skytool&lt;/strong&gt; phân phối tại thị trường Việt Nam. Với chiếc máy xịt rửa này, bạn sẽ dễ dàng vệ sinh mọi loại vết bẩn trên mọi bề mặt như nền nhà, vật dụng và trên bề mặt xe hơi, xe gắn máy…&lt;/p&gt;\r\n\r\n&lt;p&gt;Máy xịt rửa áp lực cao &lt;a href=&quot;https://dungcuvang.com/products/may-xit-rua-ap-luc-1-400w-ronix-rp-u100c&quot;&gt;RONIX RP-U100C&lt;/a&gt; được trang bị động cơ tự hút giúp người dùng dễ dàng sử dụng xịt rửa khi cách xa nguồn nước, tuy nhiên hãng vẫn cung cấp đầu nối ống dây với nguồn nước khi người dùng cần xịt rửa, vệ sinh trong khoảng thời gian dài.&lt;/p&gt;\r\n\r\n&lt;p&gt;Được trang bị động cơ 1.400W mạnh mẽ, Ronix RP-U100C sẽ tạo ra áp lực nước cao với công suất làm sạch tối ưu nhất. Với hệ thống tự động dừng khi không hoạt động và bộ bảo vệ nhiệt tích hợp bên trong máy sẽ giúp kiểm soát khả năng vận hành máy.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Rpc U100c 1&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2022/07/RPC-U100C-1.jpg&quot; data-was-processed=&quot;true&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2022/07/RPC-U100C-1.jpg&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Về thiết kế, máy được hãng chăm chút tỉ mỉ từ vỏ máy cho đến các phụ kiện đi kèm, dễ dàng tháo lắp và thuận tiện cho việc di chuyển hơn với quai xách chắc chắn. Thiết kế gọn nhẹ sẽ mang đến sự linh hoạt khi sử dụng sản phẩm, phần súng cao áp với các khớp nối chắc chắn sẽ hạn chế sự rò rỉ nước khi sử dụng. Máy sử dụng pít tông bằng thép không gỉ dễ dàng loại bỏ bụi bẩn mắc kẹt bên trong vòi phun.&lt;/p&gt;\r\n\r\n&lt;p&gt;Với đầy đủ các phụ kiện đi kèm khi mua máy như, đầu phun, ống nối, khớp nối, dây áp…, người dùng sẽ không cần phải trang bị thêm các vật dụng bên ngoài để máy hoạt động. Ngoài ra, khi mua sản phẩm máy xịt rửa RONIX RP-U100C bạn sẽ nhận được thêm bình chứa chất tẩy rửa, dễ dàng kết nối với đầu súng cho khả năng vệ sinh linh hoạt hơn bao giờ hết.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Rpc U100c 2&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2022/07/RPC-U100C-2.jpg&quot; data-was-processed=&quot;true&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2022/07/RPC-U100C-2.jpg&quot; /&gt;&lt;/p&gt;\r\n', 'Máy phun rửa cao áp là một công cụ bạn có thể sử dụng để làm sạch các bề mặt khác nhau. Để làm cho dụng cụ hoạt động hiệu quả, bạn cần hai loại nguồn chính: nguồn nước cho lượng nước bạn cần để làm sạch;', 'Máy phun xịt rửa cao áp RONIX', 'noibat,hienthi', 'tin-tuc', 1681570667, 0),
(38, '3-8464.png', 'uu-diem-cua-dung-cu-cam-tay-do-nghe', '&lt;p&gt;Có thể nói dụng cụ cầm tay và đồ nghề là những công cụ vô cùng hữu ích và cần thiết trong đời sống hằng ngày và trong công việc của mỗi người. Nhờ các sản phẩm đồ nghề, dụng cụ cầm tay mà các công việc chế tạo, lắp ráp, sửa chữa máy móc trong ngành cơ khí, xây dựng hay việc sửa chữa những thiết bị hỏng hóc sẽ trở nên đơn giản hơn bao giờ hết, giúp con người tiết kiệm được thời gian và sức lực cho những công việc tưởng chừng như bất khả thi&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Ưu điểm của dụng cụ cầm tay - đồ nghề&quot; data-lazy-sizes=&quot;(max-width: 800px) 100vw, 800px&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/2.jpg&quot; data-lazy-srcset=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/2.jpg 800w, https://dungcuvang.com/wp-content/uploads/2022/10/2-400x400.jpg 400w, https://dungcuvang.com/wp-content/uploads/2022/10/2-300x300.jpg 300w, https://dungcuvang.com/wp-content/uploads/2022/10/2-600x600.jpg 600w, https://dungcuvang.com/wp-content/uploads/2022/10/2-100x100.jpg 100w&quot; data-was-processed=&quot;true&quot; height=&quot;800&quot; sizes=&quot;(max-width: 800px) 100vw, 800px&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/2.jpg&quot; srcset=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/2.jpg 800w, https://dungcuvang.com/wp-content/uploads/2022/10/2-400x400.jpg 400w, https://dungcuvang.com/wp-content/uploads/2022/10/2-300x300.jpg 300w, https://dungcuvang.com/wp-content/uploads/2022/10/2-600x600.jpg 600w, https://dungcuvang.com/wp-content/uploads/2022/10/2-100x100.jpg 100w&quot; width=&quot;800&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Dụng cụ cầm tay và đồ nghề:&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Dụng cụ cầm tay và đồ nghề là cách gọi để chỉ cả những dụng cụ có động cơ hay không có động cơ, được sử dụng để hỗ trợ người dùng tạo ra hoặc hoàn thiện sản phẩm theo mong muốn. Hiện các dụng cụ cầm tay và đồ nghề ngày càng được ứng dụng rộng rãi trong nhiều ngành nghề, lĩnh vực sản xuất cũng như đời sống.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Ưu điểm của các dụng cụ cầm tay và đồ nghề&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Mang lại sự chính xác cao trong công việc&lt;/li&gt;\r\n	&lt;li&gt;Tiết kiệm tối đa thời gian và sức lao động trong công việc, đảm bảo nhu cầu sử dụng cao&lt;/li&gt;\r\n	&lt;li&gt;Đa dạng chủng loại, mẫu mã đem đến nhiều sự lựa chọn hơn trong công việc và đời sống&lt;/li&gt;\r\n	&lt;li&gt;Dễ bảo quản và cất giữ nhờ vào thiết kế hiện đại, gọn nhẹ&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Thương hiệu dụng cụ đồ nghề nổi tiếng&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Do cơ cấu thị trường ngày càng phát triển nên có khá nhiều thương hiệu nổi tiếng trong lĩnh vực sản xuất và kinh doanh các mặt hàng dụng cụ cầm tay và đồ nghề, có thể kể đến một số thương hiệu như: TRUPER, Pretul, Sata… Những thương hiệu này được đánh giá là một trong những thương hiệu hàng đầu về sản xuất dụng cụ cầm tay đồ nghề.&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;&lt;strong&gt;Thương hiệu &lt;a href=&quot;https://dungcuvang.com/collections/dung-cu-cam-tay-do-nghe?filter_thuong-hieu=truper&amp;amp;wpf_count=24&quot;&gt;TRUPER&lt;/a&gt;&lt;/strong&gt;&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;TRUPER là thương hiệu dụng cụ cầm tay và đồ nghề hàng đầu Châu Mỹ Latin, đặt trụ sở chính tại Mexico. Với hơn 50 năm kinh nghiệm trong ngành sản xuất thiết bị công nghiệp, dụng cụ cầm tay đồ nghề, TRUPER tự hào là công ty hàng đầu thế giới về sản xuất, phân phối các công cụ và sản phẩm cho ngành công nghiệp và dân dụng. Những sản phẩm chất lượng như thước cuốn thép, cờ lê, mỏ lết, dao rọc giấy, búa, kìm, kéo cắt cành, máy vặn mở bu lông và thùng- túi đựng đồ nghề… do TRUPER sản xuất, hiện cũng đã được phân phối chính hãng tại thị trường Việt Nam với giá thành hấp dẫn&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Ưu điểm của dụng cụ cầm tay - đồ nghề&quot; data-lazy-sizes=&quot;(max-width: 800px) 100vw, 800px&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/3.jpg&quot; data-lazy-srcset=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/3.jpg 800w, https://dungcuvang.com/wp-content/uploads/2022/10/3-400x400.jpg 400w, https://dungcuvang.com/wp-content/uploads/2022/10/3-300x300.jpg 300w, https://dungcuvang.com/wp-content/uploads/2022/10/3-600x600.jpg 600w, https://dungcuvang.com/wp-content/uploads/2022/10/3-100x100.jpg 100w&quot; data-was-processed=&quot;true&quot; height=&quot;800&quot; sizes=&quot;(max-width: 800px) 100vw, 800px&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/3.jpg&quot; srcset=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/3.jpg 800w, https://dungcuvang.com/wp-content/uploads/2022/10/3-400x400.jpg 400w, https://dungcuvang.com/wp-content/uploads/2022/10/3-300x300.jpg 300w, https://dungcuvang.com/wp-content/uploads/2022/10/3-600x600.jpg 600w, https://dungcuvang.com/wp-content/uploads/2022/10/3-100x100.jpg 100w&quot; width=&quot;800&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;&lt;strong&gt;Thương hiệu &lt;a href=&quot;https://dungcuvang.com/collections/dung-cu-cam-tay-do-nghe?wpf_count=24&amp;amp;filter_thuong-hieu=pretul&quot;&gt;PRETUL&lt;/a&gt;&lt;/strong&gt;&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;PRETUL là thương hiệu liên kết với TRUPER, các sản phẩm của PRETUL được cho là có giá thành cạnh tranh nhất trên thị trường dụng cụ cầm tay đồ nghề tại Việt Nam. Để tiếp cận đến nhiều phân khúc người dùng, PRETUL luôn phát triển và sản xuất đa dạng chủng loại sản phẩm để đáp ứng tốt nhu cầu sử dụng cũng như đảm bảo chất lượng sản phẩm&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;&lt;strong&gt;Thương hiệu &lt;a href=&quot;https://dungcuvang.com/collections/dung-cu-cam-tay-do-nghe?wpf_count=24&amp;amp;filter_thuong-hieu=sata&quot;&gt;SATA&lt;/a&gt;&lt;/strong&gt;&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;SATA là thương hiệu chuyên sản xuất lĩnh vực dụng cụ sửa chữa cầm tay số 1 của Mỹ. Dụng cụ cầm tay SATA như: Kìm, búa, mỏ lết, tuốc nơ vít, bộ lục giác, cờ lê vòng miệng, cần kéo, cần nối,… đều được sản xuất dựa trên dây chuyền công nghệ tiên tiến với quy trình nghiệm ngặt, tiêu chuẩn kỹ thuật cao và độ chính xác tuyệt đối. Đặc biệt, nhóm dụng cụ đồ nghề SATA có khả năng chịu ma sát tốt, chống ăn mòn, chống gỉ lại chịu nhiệt, chịu lực hàng đầu nên được ứng dụng linh hoạt không chỉ trong dân dụng mà còn trong cả ngành cơ khí và điện tử.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Ưu điểm của dụng cụ cầm tay - đồ nghề&quot; data-lazy-sizes=&quot;(max-width: 800px) 100vw, 800px&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/4.jpg&quot; data-lazy-srcset=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/4.jpg 800w, https://dungcuvang.com/wp-content/uploads/2022/10/4-400x400.jpg 400w, https://dungcuvang.com/wp-content/uploads/2022/10/4-300x300.jpg 300w, https://dungcuvang.com/wp-content/uploads/2022/10/4-600x600.jpg 600w, https://dungcuvang.com/wp-content/uploads/2022/10/4-100x100.jpg 100w&quot; data-was-processed=&quot;true&quot; height=&quot;800&quot; sizes=&quot;(max-width: 800px) 100vw, 800px&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/4.jpg&quot; srcset=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/4.jpg 800w, https://dungcuvang.com/wp-content/uploads/2022/10/4-400x400.jpg 400w, https://dungcuvang.com/wp-content/uploads/2022/10/4-300x300.jpg 300w, https://dungcuvang.com/wp-content/uploads/2022/10/4-600x600.jpg 600w, https://dungcuvang.com/wp-content/uploads/2022/10/4-100x100.jpg 100w&quot; width=&quot;800&quot; /&gt;&lt;/p&gt;\r\n', 'Có thể nói dụng cụ cầm tay và đồ nghề là những công cụ vô cùng hữu ích và cần thiết trong đời sống hằng ngày và trong công việc của mỗi người. ', ' Ưu điểm của dụng cụ cầm tay – đồ nghề', 'noibat,hienthi', 'tin-tuc', 1681570822, 0),
(39, 'may-khoan-pin-cam-tay-tu-thuong-hieu-makita-3654.png', 'cach-nhan-biet-may-khoan-chinh-hang', '&lt;h2&gt;&lt;strong&gt;Cách nhận biết máy khoan chính hãng&lt;/strong&gt;&lt;/h2&gt;\r\n\r\n&lt;p&gt;– Với nhu cầu sử dụng các sản phẩm dụng cụ, thiết bị cầm tay, máy khoan chính hãng ngày một tăng cao, nên các dòng sản phẩm mang thương hiệu Makita đã và đang bị làm giả, làm nhái với ngoại hình hết sức tinh vi và lưu hành với số lượng khá nhiều trên thị trường và đặc biệt là các dòng máy khoan sử dụng pin.&lt;/p&gt;\r\n\r\n&lt;p&gt;– Các loại máy khoan pin hàng giả, hàng nhái có ngoại hình giống 80 – 90% với máy chính hãng, nhưng về chất lượng thì sau một thời gian ngắn sử dụng, động cơ bên trong những sản phẩm kém chất lượng đó sẽ ngày càng giảm nhanh như: Khoan yếu, mau hết pin hoặc hư pin, hỏng hóc…&lt;/p&gt;\r\n\r\n&lt;p&gt;Cho nên, để đảm bảo sự an toàn cũng như quyền lợi của khách hàng khi mua các sản phẩm máy khoan pin, chúng ta nên tìm hiểu những cách nhận biết cơ bản về máy khoan chính hãng Makita.&lt;/p&gt;\r\n\r\n&lt;ol&gt;\r\n	&lt;li&gt;&lt;strong&gt;Nguồn gốc xuất xứ:&lt;/strong&gt;&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;p&gt;Tập đoàn Makita có trụ sở chính đặt tại Nhật Bản, tuy nhiên để thuận tiện cho việc sản xuất và xuất khẩu hàng hóa đến các nước Đông Nam Á, Makita đã cho xây dựng các nhà máy sản xuất chuyên một số loại sản phẩm tại Thái Lan, Trung Quốc. Hầu hết các sản phẩm của Makita chính hãng được phân phối tại Việt Nam đa số sẽ có xuất xứ từ Trung Quốc, một số dòng máy khoan điện riêng biệt sẽ được sản xuất tại Thái Lan như: M8100B, M6000B…. Thị trường Việt Nam có rất ít dòng sản phẩm “Made in Japan”, vì vậy chúng ta cũng cần phải cảnh giác và kiểm chứng kỹ càng trước khi mua các sản phẩm đó&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Cách phân biệt máy khoan chính hãng&quot; data-lazy-sizes=&quot;(max-width: 600px) 100vw, 600px&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/Makita-made-in-600x400.jpg&quot; data-lazy-srcset=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/Makita-made-in-600x400.jpg 600w, https://dungcuvang.com/wp-content/uploads/2022/10/Makita-made-in-300x200.jpg 300w, https://dungcuvang.com/wp-content/uploads/2022/10/Makita-made-in.jpg 1200w&quot; data-was-processed=&quot;true&quot; height=&quot;400&quot; sizes=&quot;(max-width: 600px) 100vw, 600px&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/Makita-made-in-600x400.jpg&quot; srcset=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/Makita-made-in-600x400.jpg 600w, https://dungcuvang.com/wp-content/uploads/2022/10/Makita-made-in-300x200.jpg 300w, https://dungcuvang.com/wp-content/uploads/2022/10/Makita-made-in.jpg 1200w&quot; width=&quot;600&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;ol start=&quot;2&quot;&gt;\r\n	&lt;li&gt;&lt;strong&gt;Kiểm tra tem&lt;/strong&gt;&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;p&gt;Để đề phòng hàng giả nhái xâm chiếm thị trường, cũng như bảo vệ thương hiệu, các sản phẩm của Makita đều được dán tem chống giả 7 màu, với độ phản quang và đường nét in trên tem sắc sảo và bên dưới mỗi tem 7 màu đều mang dãy 16 số để kiểm tra tại website hãng. Mỗi máy Makita đều sẽ mang 1 số Seri riêng biệt, không trùng lặp, vì vậy người dùng cần kiểm tra tem, số seri, thông số máy… trước khi quyết định mua sản phẩm.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Cách phân biệt máy khoan chính hãng&quot; data-lazy-sizes=&quot;(max-width: 800px) 100vw, 800px&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/makita.jpg&quot; data-lazy-srcset=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/makita.jpg 800w, https://dungcuvang.com/wp-content/uploads/2022/10/makita-400x400.jpg 400w, https://dungcuvang.com/wp-content/uploads/2022/10/makita-300x300.jpg 300w, https://dungcuvang.com/wp-content/uploads/2022/10/makita-600x600.jpg 600w, https://dungcuvang.com/wp-content/uploads/2022/10/makita-100x100.jpg 100w&quot; data-was-processed=&quot;true&quot; height=&quot;800&quot; sizes=&quot;(max-width: 800px) 100vw, 800px&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/makita.jpg&quot; srcset=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/makita.jpg 800w, https://dungcuvang.com/wp-content/uploads/2022/10/makita-400x400.jpg 400w, https://dungcuvang.com/wp-content/uploads/2022/10/makita-300x300.jpg 300w, https://dungcuvang.com/wp-content/uploads/2022/10/makita-600x600.jpg 600w, https://dungcuvang.com/wp-content/uploads/2022/10/makita-100x100.jpg 100w&quot; width=&quot;800&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;ol start=&quot;3&quot;&gt;\r\n	&lt;li&gt;&lt;strong&gt;Ngoại quan, kiểu dáng, trọng lượng&lt;/strong&gt;&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;p&gt;Tuy có ngoại hình giống 80 – 90% máy Makita chính hãng, nhưng các sản phẩm đạo nhái vẫn sẽ có những lỗi nhỏ mà người dùng có thể nhận biết khi cầm nắm trong tay. Các đặc điểm như màu sắc hoặc các vị trí nối, bắt ốc liên kết sẽ không được chỉnh chu như hàng chính hãng, cảm giác cầm nắm không chắc chắn, đầm tay….&lt;/p&gt;\r\n\r\n&lt;ol start=&quot;4&quot;&gt;\r\n	&lt;li&gt;&lt;strong&gt;Phiếu bảo hành&lt;/strong&gt;&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;p&gt;Mỗi sản phẩm được bán ra của Makita luôn đi kèm phiếu bảo hành do hãng cung cấp, khi bạn mua sản phẩm, người bán sẽ điền thông tin như: Ngày mua, Model máy, Series máy… Các sản phẩm khoan Makita đều được bảo hành 6 tháng tại các đại lý Makita trên toàn quốc. Nếu bạn mua sản phẩm Makita mà không được cung cấp phiếu bảo hành đúng chuẩn của hãng hoặc chỉ được báo bảo hành qua tem riêng dán trên máy thì 99% bạn đã mua phải hàng giả.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Cách phân biệt máy khoan chính hãng&quot; data-lazy-sizes=&quot;(max-width: 600px) 100vw, 600px&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/PBH-Makita-600x800.jpg&quot; data-lazy-srcset=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/PBH-Makita.jpg 600w, https://dungcuvang.com/wp-content/uploads/2022/10/PBH-Makita-300x400.jpg 300w&quot; data-was-processed=&quot;true&quot; height=&quot;800&quot; sizes=&quot;(max-width: 600px) 100vw, 600px&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/PBH-Makita-600x800.jpg&quot; srcset=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/PBH-Makita.jpg 600w, https://dungcuvang.com/wp-content/uploads/2022/10/PBH-Makita-300x400.jpg 300w&quot; width=&quot;600&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;ol start=&quot;5&quot;&gt;\r\n	&lt;li&gt;&lt;strong&gt;Lựa chọn địa chỉ mua hàng chính hãng&lt;/strong&gt;&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;p&gt;Với những đặc điểm trên thì bạn chỉ có thể phân biệt được chiếc máy bạn đang cầm có phải chính hãng hay hàng giả thôi, điều quan trọng hơn cả là bạn cần phải tìm đến những địa chỉ uy tín, chuyên kinh doanh các sản phẩm Makita chính hãng.&lt;/p&gt;\r\n\r\n&lt;p&gt;Với nhiều năm kinh nghiệm trong lĩnh vực thiết bị, dụng cụ cầm tay, Công ty TNHH TM Trực Tuyến Skytool – Dụng Cụ Vàng đã và đang kinh doanh đa dạng mẫu mã sản phẩm của các hãng lớn như: Makita, Bosch, Stanley, Sata, Dewalt…. Với cung cách chăm sóc khách hàng nhiệt tình, hệ thống bảo hành rõ ràng, sản phẩm rõ nguồn gốc xuất xứ, đảm bảo chất lượng sản phẩm bán ra, người tiêu dùng có thể hoàn toàn yên tâm khi mua hàng tại đây.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;máy khoan chính hãng&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2021/10/may-khoan-pin-cam-tay-tu-thuong-hieu-makita.jpg&quot; data-was-processed=&quot;true&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2021/10/may-khoan-pin-cam-tay-tu-thuong-hieu-makita.jpg&quot; /&gt;&lt;/p&gt;\r\n', ' Với nhu cầu sử dụng các sản phẩm dụng cụ, thiết bị cầm tay, máy khoan chính hãng ngày một tăng cao, nên các dòng sản phẩm mang thương hiệu Makita đã và đang bị làm giả, làm nhái với ngoại hình hết sức tinh vi và lưu hành với số lượng khá nhiều trên thị trường và đặc biệt là các dòng máy khoan sử dụng pin.', 'Cách nhận biết máy khoan chính hãng', 'noibat,hienthi', 'tin-tuc', 1681570952, 1681570959),
(40, '', 'chinh-sach-van-chuyen', '&lt;h2&gt;&lt;strong&gt;hính sách vận chuyển khi mua hàng tại Dụng Cụ Vàng được triển khai như sau:&lt;/strong&gt;&lt;/h2&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;\r\n	&lt;h4&gt;Khi giao nhận hàng hóa, quý khách vui lòng kiểm tra và đối chiếu với chứng từ, phiếu bảo hành để hạn chế tối đa các sai sót. Sau khi giao hàng thành công, chúng tôi chỉ chịu trách nhiệm về lỗi của nhà sản xuất, không chịu trách nhiệm về bất kỳ lý do nào khác.&lt;/h4&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;h4&gt;Vì một số lý do như địa chỉ giao hàng sai, nhân viên không liên hệ được với người nhận,… thời gian giao hàng có thể chậm trễ hơn dự kiến.&lt;/h4&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;h4&gt;Để đảm bảo quyền lợi khách hàng trong việc bảo hành và đổi trả sản phẩm, quý khách có quyền từ chối nhận hàng khi thiếu một trong số các chứng từ sau: Hóa đơn bán hàng, biên bản giao hàng, phiếu giao hàng, hóa đơn tài chính.&lt;/h4&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;h4&gt;Trường hợp khách hàng không nhận được sản phẩm dù đã quá thời gian dự kiến hoặc có nhu cầu thay đổi đơn hàng trong thời gian đợi phát hàng, hãy nhanh chóng thông báo với chúng tôi để được hỗ trợ kịp thời.&lt;/h4&gt;\r\n	&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;h2&gt;&lt;strong&gt;Dưới đây là một số phương thức vận chuyển hiện hành tại Dụng Cụ Vàng.&lt;/strong&gt;&lt;/h2&gt;\r\n\r\n&lt;h3&gt;1. Nhân viên Dụng Cụ Vàng giao hàng tại nhà&lt;/h3&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Nếu khách hàng yêu cầu, nhân viên Dụng Cụ Vàng sẽ hỗ trợ giao hàng tận nhà đối với khách hàng cư trú tại khu vực TP.HCM, Hà Nội, Cần Thơ, Đà Nẵng, Buôn Mê Thuột.&lt;/li&gt;\r\n	&lt;li&gt;Chúng tôi cũng hỗ trợ giao hàng các sản phẩm yêu cầu lắp đặt và có giá trị lớn đối với các trường hợp khách hàng ở lân cận khu vực TP.HCM, Hà Nội.&lt;/li&gt;\r\n	&lt;li&gt;Hàng hóa sẽ được giao cùng ngày hoặc vào ngày hôm sau nếu đơn hàng đặt vào cuối giờ chiều.&lt;/li&gt;\r\n	&lt;li&gt;Quý khách kiểm tra sản phẩm tại chỗ, ký nhận và thanh toán cho nhân viên giao nhận giá trị đơn hàng, phí vận chuyển và phí lắp dặt (nếu có).&lt;/li&gt;\r\n	&lt;li&gt;Trường hợp phát hiện bất kỳ lỗi nào trong lúc kiểm tra, quý khách có thể từ chối nhận hàng và thông báo ngay với chúng tôi để được hỗ trợ kịp thời.&lt;/li&gt;\r\n	&lt;li&gt;Nếu nhân viên Dụng Cụ Vàng không thể giao hàng đúng hẹn, chúng tôi sẽ thông báo sớm đến quý khách.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;h3&gt;2. Nhân viên chuyển phát nhanh giao hàng tận nhà&lt;/h3&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Đối với những khách hàng ở xa, chúng tôi áp dụng phương thức vận chuyển thông qua các đơn vị chuyển phát nhanh như Viettel Post, TNT, VNPT, Giao hàng nhanh, Giao hàng tiết kiệm,…&lt;/li&gt;\r\n	&lt;li&gt;Quý khách vui lòng điền đầy đủ các thông tin nhận hàng để chúng tôi thực hiện công tác vận chuyển nhanh chóng. Nếu bất kỳ vấn đề nào phát sinh vì thông tin quý khách cung cấp không chính xác, chúng tôi không chịu bất kỳ trách nhiệm nào.&lt;/li&gt;\r\n	&lt;li&gt;Thời gian giao hàng chỉ mang tính chất tương đối và còn phụ thuộc vào gói dịch vụ khách hàng lựa chọn:\r\n	&lt;ul&gt;\r\n		&lt;li&gt;Chuyển phát nhanh: Từ 2 đến 3 ngày.&lt;/li&gt;\r\n		&lt;li&gt;Chuyển phát thường: Từ 5 đến 10 ngày.&lt;/li&gt;\r\n	&lt;/ul&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;Ngay khi giao nhận hàng hóa, quý khách vui lòng kiểm tra kỹ lưỡng và thông báo chúng tôi bất kỳ vấn đề nào liên quan đến chất lượng, số lượng, chủng loại để đưa ra hướng giải quyết kịp thời.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;h3&gt;3. Giao hàng qua các xe khách tại bến xe&lt;/h3&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Phương thức giao hàng này được áp dụng đối với những khách hàng ở tỉnh thành xa và có quen biết với các hãng xe uy tín.&lt;/li&gt;\r\n	&lt;li&gt;Theo yêu cầu khách hàng, Dụng Cụ Vàng sẽ thực hiện chuyển hàng đến đúng bến xe, nhà xe.&lt;/li&gt;\r\n	&lt;li&gt;Quý khách vui lòng cung cấp tất cả các thông tin liên quan đến xe và người nhận gồm: Tên nhà xe, tên tài xe và phụ xe, biển số xe, thời gian xe chạy,…&lt;/li&gt;\r\n	&lt;li&gt;Toàn bộ giá trị đơn hàng phải được thanh toán trước khi chúng tôi chuyển hàng đến xe bởi khách hàng hoặc chủ xe. Đồng thời, quý khách nên yêu cầu chủ xe kiểm tra hàng hóa cẩn thận khi nhận hàng để tránh những sai sót về sau.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;h3&gt;4. Phí giao hàng&lt;/h3&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Giao nội thành HCM: Freeship đơn hàng từ 500.000 đồng&lt;/li&gt;\r\n	&lt;li&gt;Giao ngoại thành: Freeship đơn hàng từ 2.000.000 đồng ( trừ các loại hàng hóa cồng kềnh)&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;&lt;em&gt;* Phí vận chuyển tùy thuộc vào mức phí của các bên vận chuyển.&lt;/em&gt;&lt;br /&gt;\r\n&lt;em&gt;* Đối với các hàng hóa cồng kềnh: Nhân viên chúng tôi sẽ báo phí vận chuyển khi có đơn hàng đến quý khách.&lt;/em&gt;&lt;/p&gt;\r\n', '', 'Chính sách vận chuyển', 'hienthi', 'chinh-sacha', 1681573498, 0),
(41, '', 'thong-tin-ve-van-chuyen-va-giao-nhan', '&lt;p&gt;&lt;strong&gt;Thông tin về vận chuyển và giao nhận (Chi tiết: Điều 33)&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Chào bạn!&lt;/p&gt;\r\n\r\n&lt;p&gt;Hiện tại Dungcuso1.vn có chính sách giao hàng tất cả sản phẩm tận nơi cho khách hàng trong TP.HCM và giao hàng toàn quốc ( có tính phí ship ) qua nhà xe/ chành xe hoặc bưu điện cụ thể như sau:&lt;/p&gt;\r\n\r\n&lt;h3 id=&quot;doi-voi-nhung-khach-hang-trong-tphcm&quot;&gt;&lt;strong&gt;* Đối với những khách hàng trong TP.HCM&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Dungcuso1.vn&lt;/strong&gt; sẽ giao sản phẩm cho bạn trong TP.HCM với hai phương thức &lt;em&gt;( Bạn có thể chọn 1 trong 2 phương thức tuỳ theo nhu cầu )&lt;/em&gt;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;&lt;em&gt;&lt;strong&gt;GIAO ĐẾN TRONG 1 – 3 NGÀY LÀM VIỆC :&lt;/strong&gt;&lt;/em&gt; từ lúc nhận được đơn hàng và xác nhận từ bạn . Với phương thức này bạn sẽ chỉ thanh toán tiền mua + phí ship ngay khi nhận hàng. ( Phí ship 30.000đ – 100.000đ/ 1 đơn hàng tuỳ vào vị trí của bạn và loại lều bạn mua lớn hay nhỏ )&lt;/li&gt;\r\n	&lt;li&gt;&lt;em&gt;&lt;strong&gt;GIAO NGAY CÓ LIỀN :&lt;/strong&gt;&lt;/em&gt; Dungcuso1.vn sẽ đặt giao ngay cho bạn qua grab hoặc giao hàng hoả tốc đối với bạn muốn có lều cắm trại gấp để bắt đầu chuyến đi. Với phương thức này, bạn sẽ phải chuyển khoản tiền mua hàng trước cho Công Ty và tự trả phí ship cho grab hoặc dịch vụ hoả tốc.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;&lt;em&gt;Thông tin chuyển khoản &lt;/em&gt;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Thanh toán bằng cách chuyển khoản:&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Hình thức được áp dụng đối với khách hàng ở các tỉnh thành xa hoặc có nhu cầu thanh toán bằng cách này. Quý khách có thể chọn một trong hai tài khoản ngân hàng sau:&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Ngân hàng ACB – Chi nhánh: Phú Định&lt;/strong&gt;&lt;br /&gt;\r\nTên tài khoản: CTY TNHH DỊCH VỤ CÔNG NGHÊ ĐỨC KHANG&lt;br /&gt;\r\nSố tài khoản: 25124697&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Ngân hàng Vietcombank – Chi nhánh Bến Thành&lt;/strong&gt;&lt;br /&gt;\r\nTên tài khoản: Trần Minh Tâm&lt;br /&gt;\r\nSố tài khoản: 007 100 2121 451&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Vui lòng ghi chú số đơn hàng để chúng tôi dễ dàng theo dõi. Xin cảm ơn. &lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;h3 id=&quot;doi-voi-nhung-khach-hang-tinh-khac-tphcm&quot;&gt;&lt;strong&gt;* Đối với những khách hàng tỉnh khác TP.HCM&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Dungcuso1.vn&lt;/strong&gt; sẽ chuyển sản phẩm đến cho bạn trên toàn quốc với 2 phương thức&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;+ Qua nhà xe/ chành xe :&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Với phương án &lt;em&gt;&lt;strong&gt;giao hàng qua chành xe/ nhà xe thì bắt buộc phải chuyển khoản tiền mua hàng trước theo thông tin chuyển khoản phía trên&lt;/strong&gt;&lt;/em&gt;. Khi nào nhận được tiền thì &lt;strong&gt;Dungcuso1.vn&lt;/strong&gt; sẽ chuyển hàng ra nhà xe cụ thể như sau :&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Nếu chỗ của bạn có hệ thống nhà xe phổ biến &lt;em&gt;( Phương Trang, Thành Bưởi,…)&lt;/em&gt; đi từ TP.HCM thì Shop sẽ chuyển lều đến cho nhà xe, khi nào lều cắm trại đến nơi thì bạn chạy ra nhà xe để nhận lều cắm trại và trả phí ship cho nhà xe.&lt;/li&gt;\r\n	&lt;li&gt;Nếu chỗ bạn ở không có nhà xe phổ biến thì hãy gởi cho Shop số điện thoại và tên nhà xe quen đến gần nhà bạn và bạn có thể nhận được lều cắm trại, phương án này bạn cũng sẽ trả phí ship cho nhà xe ngay khi nhận lều nhé!&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;+ Gửi qua đường bưu điện và thu hộ (COD) :&lt;/strong&gt; Sau khi xác nhận đơn hàng thì Shop sẽ tiến hành gởi lều đến cho bạn qua bưu điện. Khi nhận hàng bạn sẽ trả tiền mua hàng + phí ship ( hoặc đóng gói nếu có ) cho nhân viên bưu điện. Thời gian chuyển hàng phụ thuộc vào bưu điện, nên phương án này không khả thi nếu bạn muốn có hàng gấp hoặc có ngay.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;em&gt;&lt;strong&gt;Update :&lt;/strong&gt;&lt;/em&gt; Với phương thức giao lều qua đường bưu điện có thu hộ COD bạn sẽ &lt;strong&gt;KHÔNG ĐƯỢC KIỂM TRA LỀU NHÉ&lt;/strong&gt;. Bởi vì bộ lều cắm trại là 1 bộ lều mới được nhà sản xuất đóng gói kĩ càng, nếu bạn gỡ ra kiểm tra thì sẽ không còn là bộ lều mới nữa. Thế nên, nếu bạn chọn phương thức giao lều này hãy chắc chắn là đã tìm hiểu kĩ lưỡng về loại lều, tìm hiểu về &lt;strong&gt;Dungcuso1.vn&lt;/strong&gt; thật kĩ để thật tin tưởng rồi hẳn đặt mua – Nếu không tin thì không mua, nếu đã tin rồi thì không kiểm tra lều khi nhận.&lt;/p&gt;\r\n\r\n&lt;p&gt;+ Nhưng bạn chắc sẽ có thắc mắc rằng nếu như nhận lều rồi mà lều bị lủng rách, thì sao ? Về điều này, Shop Lều đảm bảo rằng nếu lều bị lủng rách thì hãy chụp ảnh ( quay clip ) lỗi và gởi lại cho &lt;strong&gt;Dungcuso1.vn&lt;/strong&gt;trong vòng 24h từ lúc bạn nhận lều đến Hotline: 0963.289.290 - 0908.464.552. Shop sẽ có biện pháp xử lí dành riêng cho bạn. Nếu quá 24h tính từ lúc bạn nhận mà không có  phản hổi nào thì xem như là lều đã ok 100% nhé!&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;PS :&lt;/strong&gt; Khi mua hàng hãy cung cấp số điện thoại, địa chỉ ( số nhà, đường, phường, quận, thành phố), tên đầy đủ một cách RÕ RÀNG và TRUNG THỰC. Shop sẽ từ chối giao hàng nếu phát hiện có dấu hiệu không trung thực. Cám ơn bạn đã hợp tác!&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;CÁM ƠN BẠN! VÀ RẤT VUI ĐƯỢC PHỤC VỤ BẠN!&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;b&gt;Chia sẻ:&lt;/b&gt;&lt;/p&gt;\r\n', '', 'Thông tin về vận chuyển và giao nhận', 'hienthi', 'chinh-sacha', 1681573523, 0);

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
(57, 3, 'may-khoan-be-tong-26mm-ken-2526e-300x300-10820-5574.gif', 'may-khoan-pin-12v-dca-adjz09-10-type-e', '&lt;h2&gt;Đặc điểm của máy khoan DCA ADJZ09-10 (TYPE E)&lt;/h2&gt;\r\n\r\n&lt;p&gt;Máy khoan pin 12V DCA ADJZ09-10 (TYPE E) là sản phẩm đến từ thương hiệu DCA đạt chuẩn quốc tế. DCA là hãng chuyên sản xuất các sản phẩm máy mài cầm tay, máy cắt, máy khoan,… từ dân dụng đến gia dụng. &lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Máy khoan pin 12V DCA ADJZ09-10 (TYPE E)&quot; src=&quot;https://dungcuso1.vn/upload/filemanager/2021/05/main_01ffb750416d4950bd0d14600ffb0622-1.jpg&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Trọng lượng máy nhẹ chỉ 1.0kg vô cùng tiện lợi, dễ dàng vận chuyển, không mất quá nhiều diện tích cất giữ. Máy khoan pin 12V DCA ADJZ09-10 (TYPE E) với khả năng khoan sắt 10mm, gỗ 20mm nên được nhiều công trình xây dựng chuyên nghiệp tin dùng. Được làm từ chất liệu cao cấp máy sở hữu cho mình sự rắn chắc, bền bỉ dù có va đập thì vẫn không biến dạng. &lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Máy khoan pin 12V DCA ADJZ09-10 (TYPE E)&quot; src=&quot;https://dungcuso1.vn/upload/filemanager/2021/05/1_db7d2ca78be54b82b921f9b93a2fcd42.jpg&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Ngoài ra, tay cầm được thiết kế thông minh có độ ma sát cao giúp cố định máy khoan một cách dễ dàng và chắc chắn. Tuổi thọ máy khoan siêu bền nên bạn có thể yên tâm sử dụng trong thời gian dài mà không bị hư hỏng như các loại máy cầm tay khác. &lt;/p&gt;\r\n', '&lt;p&gt;&lt;strong&gt;Đặc điểm nổi bật&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Sản phẩm làm từ chất liệu cao cấp cho độ bền cao cũng như hoạt động ổn định, cho tuổi thọ sản phẩm cao.&lt;/li&gt;\r\n	&lt;li&gt;Sản phẩm đến từ thương hiệu DCA là thương hiệu nổi tiếng chuyên cung cấp các dụng cụ dân dụng chất lượng cao giá thành phù hợp với người tiêu dùng.&lt;/li&gt;\r\n	&lt;li&gt;Thao tác nhanh chóng, dễ dàng.&lt;/li&gt;\r\n	&lt;li&gt;Kiểu dáng nhỏ gọn, tiện dụng.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', 'Máy Khoan Pin 12V DCA ADJZ09-10 (TYPE E)', '', 2600000, 0, 0, 'banchay,hot,hienthi', 1681217921, 1681569406, 0),
(58, 3, 'may-khoan-bua-ingco-300x300-12590-6199.png', 'may-khoan-pin-18v-stanley-scd20d2k', '&lt;p&gt;Máy khoan pin 18v Stanley SCD20D2K – Stanley thương hiệu sở hữu công nghệ tiên tiến hàng đầu chuyên sản xuất dụng cụ cầm tay. Máy khoan pin 18V chuyên sử dụng để khoan và hỗ trợ cho việc bắt vít.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Máy khoan pin 18v Stanley SCD20D2K&quot; src=&quot;https://dungcuso1.vn/upload/filemanager/2021/05/stanley_sdc20d2kb1_2_b278791728014ca4acc835b42bdf1db1_large.jpg&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Máy khoan pin 18v Stanley SCD20D2K được làm từ chất liệu cao cấp cho độ bền cao cũng như hoạt động ổn định. Máy có tốc độ không tải lên đến 750 vòng/phút, cỡ vít tối đa 7mm, khả năng khoan gỗ 25mm và khoan sắt là 12mm.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Máy khoan pin 18v Stanley SCD20D2K&quot; src=&quot;https://dungcuso1.vn/upload/filemanager/2021/05/stanley_sdc20d2kb1_1_988363a3ab3241e7b6c761d4bf7f08ba_large.jpg&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Sản phẩm có thiết kế gọn nhẹ với trọng lượng 1.7kg, tiện lợi trong vận chuyển và tháo rời để thay thế, bảo trì khi có sự cố hỏng hóc. Khả năng khoan và bắt vít của máy mạnh mẽ, tuổi thọ máy cao.&lt;/p&gt;\r\n', '&lt;p&gt;&lt;strong&gt;Đặc điểm nổi bật&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Là một sản phẩm chất lượng cao được chế tạo từ những công nghệ tiên tiến hàng đầu, giúp người dùng có thể sử dụng thoải mái sản phẩm mà không lo về độ bền chất lượng.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', 'Máy Khoan Pin 18v Stanley SCD20D2K', '', 470000, 50, 233333, 'banchay,hot,hienthi', 1681217965, 1681569423, 1),
(59, 3, 'tidli20012-main-780x780-5725.jpg', 'may-khoan-bua-pin-20v-total-tidli20012', '&lt;h2&gt;&lt;strong&gt;Máy khoan búa pin 20V Total TIDLI20012 – Dụng Cụ Số 1&lt;/strong&gt;&lt;/h2&gt;\r\n\r\n&lt;p&gt;Máy khoan búa pin 20V Total TIDLI20012 thuộc bộ sưu tập dụng cụ gia công 2019 của Total. Đi đầu trong sử dụng năng lượng từ pin thế hệ mới, máy khoan chứng tỏ được ưu điểm vượt trội của công nghệ này. Lõi pin giúp tăng cường sự mạnh mẽ của đầu máy, lớp nhựa bên ngoài chịu nhiệt và lực cực tốt.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Máy khoan búa pin 20V Total TIDLI200212&quot; height=&quot;800&quot; src=&quot;https://dungcuso1.vn/upload/filemanager/2022/09/TIDLI20012.jpg&quot; width=&quot;800&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Máy khoan búa pin 20V Total TIDLI20012 giúp cảnh báo mức độ dự trữ điện năng, hỗ trợ sạc pin kịp thời, nhanh chóng. Sản phẩm kèm theo đế sạc điện chuyên dụng, phù hợp với mức điện thế và cường độ khác nhau (220 – 240V ~ 50/60 Hz).&lt;/p&gt;\r\n\r\n&lt;p&gt;Máy khoan búa pin 20V Total TIDLI20012 nhỏ gọn, tạo điều kiện thuận lợi để sử dụng và mang theo hằng ngày. Thân và đầu máy có kích thước hài hòa, đem lại sự cân bằng tuyệt đối, đảm bảo an toàn. Ngoài ra, Máy khoan búa pin P20S Total TIDLI20012 có lắp đặt nhông cơ khí 2 tốc độ, tạo nên sự thay đổi linh hoạt trong quá trình sử dụng.&lt;/p&gt;\r\n', '&lt;p&gt;&lt;strong&gt;Đặc điểm nổi bật&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Total là thương hiệu nổi tiếng thế giới cung cấp dụng cụ dân dụng, dụng cụ cầm tay và các giải pháp, thiết bị an toàn. Nhãn hiệu Total có nguồn gốc ở Đức và được sản xuất tại Trung Quốc theo các tiêu chuẩn của Mỹ, EU và Úc&lt;/li&gt;\r\n	&lt;li&gt;Thân máy thiết kế nhỏ gọn, dễ dàng thao tác.&lt;/li&gt;\r\n	&lt;li&gt;Tay cầm chắc chắn, chống trơn trượt.&lt;/li&gt;\r\n	&lt;li&gt;Tích hợp đèn Led hỗ trợ làm việc trong điều kiện thiếu ánh sáng.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', 'Máy Khoan Búa Pin 20V Total TIDLI20012', '', 0, 0, 0, 'banchay,hot,hienthi', 1681218015, 1681395725, 1),
(60, 3, 'boschgbh432dfrmain600cd99a7566bd34e69b826246ed72c11dc-1-8381.jpg', 'may-khoan-be-tong-3-chuc-nang-bosch-gbh-4-32-dfr', '&lt;h2&gt;Đặc trưng của máy khoan búa Bosch GBH 4-32 DFR&lt;/h2&gt;\r\n\r\n&lt;p&gt;Máy khoan bê tông 3 chức năng Bosch GBH 4-32 DFR là dòng sản phẩm được sản xuất bởi thương hiệu Bosch – thương hiệu dẫn đầu thị trường về sản phẩm dụng cụ tay cầm. Máy khoan bê tông 3 chức năng dùng để siết hai vật lại với nhau, đục hoặc khoan lỗ, khoan thép, bê tông và các vật liệu xây dựng khác tùy thuộc vào nhu cầu sử dụng.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Máy khoan bê tông 3 chức năng Bosch GBH 4-32 DFR&quot; src=&quot;https://dungcuso1.vn/upload/filemanager/2021/05/bosch_gbh432dfr_1_a0d140266178422bb377a67da7a8194a-1.jpg&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Máy khoan bê tông 3 chức năng Bosch GBH 4-32DFR có chức năng đảo và chức năng điều khiển điện tử giúp việc khoan dễ dàng tiện lợi. Ngoài ra sản phẩm có báng cầm mềm để thao tác tiện lợi hơn, không bị mỏi, khả năng kiểm soát tốc độ biến đổi vô cấp để điều chỉnh tốc độ dễ dàng. Công suất của máy cao 900W được tích hợp thêm chức năng đục, tốc độ không tải tối đa cao lên đến 760 vòng/phút, tốc độ dập lên đến 3600 vòng/phút. &lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Máy khoan bê tông 3 chức năng Bosch GBH 4-32 DFR&quot; src=&quot;https://dungcuso1.vn/upload/filemanager/2021/05/bosch_gbh432dfr_2_4cf064882a194c91b52e2297a32d5aed-1.jpg&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Sản phẩm được sản xuất từ vật liệu cao cấp vô cùng cứng cáp. Máy có khớp ly hợp an toàn cho người sử dụng. Đặc biệt còn có thiết kế nhỏ gọn với trọng lượng 4.7kg, không chiếm nhiều không gian, giúp tối ưu trong quá trình sử dụng.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Máy khoan bê tông 3 chức năng Bosch GBH 4-32 DFR&quot; src=&quot;https://dungcuso1.vn/upload/filemanager/2021/05/bosch_gbh432dfr_6_7abdbb59d1bc47c6b1ea021a1606431a-1.jpg&quot; /&gt;&lt;/p&gt;\r\n', '&lt;p&gt;&lt;strong&gt;Đặc điểm nổi bật&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Được sử dụng rộng dãi trong hàng loạt các công việc khoan và đục phá và khi làm việc với một dao cắt lõi&lt;/li&gt;\r\n	&lt;li&gt;Tốc độ khoan nhanh hơn 30% (đường kính khoan 25 mm) so với các máy khác trong cùng dòng&lt;/li&gt;\r\n	&lt;li&gt;Độ rung thấp chỉ 12 m/s² giúp làm việc ít mệt mỏi nhờ chức năng Bosch Vibration Control&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', 'Máy Khoan Bê Tông 3 Chức Năng Bosch GBH 4-32 DFR', '', 0, 0, 0, 'banchay,hot,hienthi', 1681218075, 1681395718, 15),
(61, 3, 'totaltp3202maine821422cdade4bcba044b6c56da58f1f-1-1855.jpg', 'may-bom-nuoc-xang-total-tp3202', '&lt;h2&gt;&lt;b&gt;Máy bơm nước xăng Total TP3202 – Dụng Cụ Số 1&lt;/b&gt;&lt;/h2&gt;\r\n\r\n&lt;p&gt;Dụng Cụ Số 1 chuyên cung cấp sỉ &amp; lẻ máy bơm nước xăng Total TP3202 chất lượng ✓Giá rẻ nhất ✓Giao hàng nhanh chóng ✓Bảo hành chính hãng&lt;/p&gt;\r\n\r\n&lt;p&gt;Trung Quốc – nơi có nguồn vật liệu, nhân công phong phú, dồi dào, giá rẻ là địa điểm lý tưởng để Total xây dựng nhà máy. Với dây chuyền công nghệ sản xuất hiện đại kết hợp với ưu thế nói trên, Total đã tạo ra những sản phẩm không những có độ bền, chất lượng cao mà giá cả cùng phù hợp, phải chăng.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Máy bơm nước xăng Total TP3202&quot; src=&quot;https://dungcuso1.vn/upload/filemanager/2021/05/total_tp3202_1_71c9ad36ccf84f528457ae10a843ded2.jpg&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Máy bơm nước xăng Total TP3202 là sản phẩm chất lượng của Total, dùng để tưới tiêu, bơm hút ao hồ, v.v. Total TP3202 được sử dụng nhiều trong nông nghiệp và có những ưu điểm, tính năng nổi bật như sau:&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Chạy bằng xăng, khởi động bằng tay, trọng lượng 26kg nên dễ di chuyển và sử dụng bất cứ ở đâu mà không lo nguồn điện cấp.&lt;/li&gt;\r\n	&lt;li&gt;Vỏ máy làm từ kim loại, có phủ lớp sơn tĩnh điện chống thấm nước nên chắc chắn, chống gỉ sét.&lt;/li&gt;\r\n	&lt;li&gt;Công suất hoạt động 7HP giúp đẩy nước lên cao tối đa là 28m, hút sâu tối đa 8m.&lt;/li&gt;\r\n	&lt;li&gt;Đường kính ống hút, xả có kích thước 50mm nên có thể bơm với hiệu suất 550 lít/phút.&lt;/li&gt;\r\n	&lt;li&gt;Động cơ được làm từ vật liệu cao cấp, hoạt động ổn định, êm, tiết kiệm nhiên liệu.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Máy bơm nước xăng Total TP3202&quot; src=&quot;https://dungcuso1.vn/upload/filemanager/2021/05/total_tp3202_2_0811ca07f0d94dd7afff5986ef4298a5.jpg&quot; /&gt;&lt;/p&gt;\r\n', '&lt;p&gt;&lt;strong&gt;Đặc điểm nổi bật&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Total là thương hiệu nổi tiếng thế giới cung cấp dụng cụ dân dụng, dụng cụ cầm tay và các giải pháp, thiết bị an toàn. Nhãn hiệu Total có nguồn gốc ở Đức và được sản xuất tại Trung Quốc theo các tiêu chuẩn của Mỹ, EU và Úc&lt;/li&gt;\r\n	&lt;li&gt;Thiết kế chắc chắn, tiện dụng.&lt;/li&gt;\r\n	&lt;li&gt;Sản phẩm làm từ chất liệu cao cấp cho độ bền cao và hoạt động ổn định.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', 'Máy Bơm Nước Xăng Total TP3202', '', 0, 0, 0, 'banchay,hot,hienthi', 1681218130, 1681395712, 0),
(62, 3, 'ingcogwp302mainaceef7edc31e4201aaec88c45c910656-1-5747.jpg', 'may-bom-nuoc-xang-ingco-gwp302', '&lt;p&gt;Dụng Cụ Số 1 chuyên cung cấp sỉ &amp; lẻ máy bơm nước xăng INGCO GWP302 chất lượng ✓Giá rẻ nhất ✓Giao hàng nhanh chóng ✓Bảo hành chính hãng&lt;/p&gt;\r\n\r\n&lt;p&gt;Trung Quốc – nơi có nguồn vật liệu, nhân công phong phú, dồi dào, giá rẻ là địa điểm lý tưởng để INGCO xây dựng nhà máy. Với dây chuyền công nghệ sản xuất hiện đại kết hợp với ưu thế nói trên, INGCO đã tạo ra những sản phẩm không những có độ bền, chất lượng cao mà giá cả cùng phù hợp, phải chăng.&lt;/p&gt;\r\n\r\n&lt;p&gt;Máy bơm nước xăng INGCO GWP302 là sản phẩm chất lượng của INGCO, dùng để tưới tiêu, bơm hút ao hồ, v.v. INGCO GWP302 được sử dụng nhiều trong nông nghiệp và có những ưu điểm, tính năng nổi bật như sau:&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Vỏ máy làm từ kim loại, có phủ lớp sơn tĩnh điện chống thấm nước nên chắc chắn, chống gỉ sét.&lt;/li&gt;\r\n	&lt;li&gt;Công suất hoạt động 7HP giúp đẩy nước lên cao tối đa là 32m, hút sâu tối đa 8m.&lt;/li&gt;\r\n	&lt;li&gt;Đường kính ống hút, xả có kích thước 80mm nên có thể bơm với hiệu suất 100 lít/phút.&lt;/li&gt;\r\n	&lt;li&gt;Chạy bằng xăng, khởi động bằng tay, trọng lượng 25kg nên dễ di chuyển và sử dụng bất cứ ở đâu mà không lo nguồn điện cấp.&lt;/li&gt;\r\n	&lt;li&gt;Động cơ được làm từ vật liệu cao cấp, hoạt động ổn định, êm, tiết kiệm nhiên liệu.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Máy bơm nước xăng INGCO GWP302&quot; src=&quot;https://dungcuso1.vn/upload/filemanager/2021/05/ingco_gwp302_1_072966bdfc2b4aa7811a35f0550decb2.jpg&quot; /&gt;&lt;/p&gt;\r\n', '&lt;p&gt;&lt;strong&gt;Đặc điểm nổi bật&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Sản phẩm làm từ chất liệu cao cấp cho độ bền cao cũng như hoạt động ổn định, cho tuổi thọ sản phẩm cao.&lt;/li&gt;\r\n	&lt;li&gt;Sản phẩm đến từ thương hiệu INGCO là thương hiệu nổi tiếng chuyên cung cấp các dụng cụ dân dụng chất lượng cao giá thành phù hợp với người tiêu dùng.&lt;/li&gt;\r\n	&lt;li&gt;Hoạt động mạnh mẽ, hiệu suất cao.&lt;/li&gt;\r\n	&lt;li&gt;Dễ điều khiển và kiểm soát.&lt;/li&gt;\r\n	&lt;li&gt;Thiết kế tiện dụng dễ dàng bảo quản và cất giữ.&lt;/li&gt;\r\n	&lt;li&gt;Đóng gói bằng thùng carton.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', 'Máy Bơm Nước Xăng INGCO GWP302', '2222', 260000, 0, 0, 'banchay,hot,hienthi', 1681218175, 1681571919, 0);

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
(2, '{\"address\":\"223\\/6 L\\u00ea T\\u1ea5n B\\u00ea, KP2, P. An L\\u1ea1c, Qu\\u1eadn B\\u00ecnh T\\u00e2n, TP.HCM\",\"email\":\"sale2.dungcuso1@gmail.com\",\"hotline\":\"0367591865\",\"phone\":\"0868960694\",\"zalo\":\"0367591865\",\"website\":\"https:\\/\\/dungcuso1.vn\\/\",\"fanpage\":\"https:\\/\\/www.facebook.com\\/LienquanMobile\",\"coords_iframe\":\"\"}', '');

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

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