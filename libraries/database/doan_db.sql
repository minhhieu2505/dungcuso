-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 01, 2023 lúc 03:23 PM
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
-- Cơ sở dữ liệu: `doan_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_news`
--

CREATE TABLE `table_news` (
  `id` int(11) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slugvi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contentvi` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descvi` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namevi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numb` int(11) DEFAULT 0,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_created` int(11) DEFAULT 0,
  `date_updated` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `table_news`
--

INSERT INTO `table_news` (`id`, `photo`, `slugvi`, `contentvi`, `descvi`, `namevi`, `numb`, `status`, `type`, `date_created`, `date_updated`) VALUES
(2, '', 'phuong-thuc-thanh-toan', '', '', 'Phương thức thanh toán', 1, 'hienthi', 'chinh-sach', 1668951353, 0),
(3, '', 'chinh-sach-bao-mat-thong-tin', '', '', 'Chính sách bảo mật thông tin', 2, 'hienthi', 'chinh-sach', 1668951361, 0),
(4, '', 'dieu-khoan-dich-vu', '', '', 'Điều khoản dịch vụ', 3, 'hienthi', 'chinh-sach', 1668951370, 0),
(5, '', 'chinh-sach-van-chuyen', '', '', 'Chính sách vận chuyển', 4, 'hienthi', 'chinh-sach', 1668951378, 0),
(6, '', 'chinh-sach-doi-tra', '', '', 'Chính sách đổi trả', 5, 'hienthi', 'chinh-sach', 1668951386, 0),
(7, '', 'chinh-sach-thanh-vien', '', '', 'Chính sách thành viên', 6, 'hienthi', 'chinh-sach', 1668951395, 0),
(8, '', 'khieu-nai-boi-thuong', '', '', 'Khiếu nại bồi thường', 7, 'hienthi', 'chinh-sach', 1668951411, 0),
(9, '', '', '', 'Bồi thường gấp 20 lần nếu hàng không chính hãng', 'HÀNG CHÍNH HÃNG 100%', 1, 'hienthi', 'cam-ket', 1668951496, 1668951526),
(10, '', '', '', '', 'MIỄN PHÍ SHIP ĐƠN TỪ 500K', 2, 'hienthi', 'cam-ket', 1668951536, 0),
(11, '', '', '', '', 'BẢO HÀNH CHÍNH HÃNG', 3, 'hienthi', 'cam-ket', 1668951544, 0),
(12, '', '', '', '', 'ĐỔI MỚI TRONG 7 NGÀY', 4, 'hienthi', 'cam-ket', 1668951552, 0),
(13, '', 'chinh-sach-doi-tra1', '', '', 'Chính Sách Đổi Trả', 1, 'hienthi', 'chinh-sach2', 1668951596, 1668951634),
(14, '', 'chinh-sach-van-chuyen1', '', '', 'Chính Sách Vận Chuyển', 2, 'hienthi', 'chinh-sach2', 1668951616, 1668951645),
(15, '', 'chinh-sach-thanh-vien1', '', '', 'Chính Sách Thành Viên', 3, 'hienthi', 'chinh-sach2', 1668951670, 0),
(16, '', 'chinh-sach-khuyen-mai1', '', '', 'Chính Sách Khuyễn Mãi', 4, 'hienthi', 'chinh-sach2', 1668951686, 0),
(17, '', '', '', '', 'Thanh Toán Khi Nhận Hàng', 1, 'hienthi', 'hinh-thuc-thanh-toan', 1668951708, 0),
(18, '', '', '', '', 'Thanh Toán Chuyển Khoản', 1, 'hienthi', 'hinh-thuc-thanh-toan', 1668951714, 0),
(19, 'lam-the-nao-de-mua-hang-dat-hang-tai-chiaki-vn-09062015104551-2974.png', 'lam-the-nao-de-mua-hangdat-hang-tai-dungcuso1vn', '', '', 'Làm thế nào để mua hàng/đặt hàng tại DUNGCUSO1.VN', 1, 'hienthi', 'cau-hoi', 1668953649, 1668953668),
(20, 'lam-the-nao-de-kiem-tra-tinh-trang-don-hang-cua-toi-11062015164710-1088.png', 'lam-the-nao-de-kiem-tra-tinh-trang-don-hang-cua-toi', '', '', ' Làm thế nào để kiểm tra tình trạng đơn hàng của tôi?', 2, 'hienthi', 'cau-hoi', 1668953727, 0),
(21, 'khi-nao-toi-nhan-duoc-hang-11062015164957-8169.png', 'khi-nao-toi-nhan-duoc-hang', '', '', 'Khi nào tôi nhận được hàng?', 3, 'hienthi', 'cau-hoi', 1668953748, 0),
(22, 'lam-the-nao-de-doi-hoac-tra-mot-san-pham-11062015165040-3388.png', 'lam-the-nao-de-doi-hoac-tra-mot-san-pham', '', '', ' Làm thế nào để đổi hoặc trả một sản phẩm?', 4, 'hienthi', 'cau-hoi', 1668953772, 0),
(23, 'bao-lau-thi-toi-duoc-hoan-tien-khi-da-tra-lai-san-pham-11062015165214-3654.png', 'bao-lau-thi-toi-duoc-hoan-tien-khi-da-tra-lai-san-pham', '', '', ' Bao lâu thì tôi được hoàn tiền khi đã trả lại sản phẩm?', 5, 'hienthi', 'cau-hoi', 1668953791, 0),
(24, 'lam-the-nao-de-toi-lien-he-duoc-voi-bo-phan-cskh-11062015165311-8584.png', 'lam-the-nao-de-toi-lien-he-duoc-voi-bo-phan-cskh', '', '', 'Làm thế nào để tôi liên hệ được với bộ phận CSKH?', 6, 'hienthi', 'cau-hoi', 1668953817, 0),
(25, 'toi-muon-lam-dai-ly-ban-si-cho-cong-ty-thi-lam-the-nao-11062015165639-2282.png', 'toi-muon-lam-dai-ly-ban-si-cho-cong-ty-thi-lam-the-nao', '', '', 'Tôi muốn làm đại lý bán sỉ cho Công ty thì làm thế nào?', 7, 'hienthi', 'cau-hoi', 1668953838, 0),
(26, 'huong-dan-kiem-tra-ma-vach-san-pham-18062015142926-2445.png', 'huong-dan-kiem-tra-ma-vach-san-pham', '', '', 'Hướng dẫn kiểm tra mã vạch sản phẩm', 8, 'hienthi', 'cau-hoi', 1668953859, 0),
(27, 'anh-chup-man-hinh-2022-11-20-luc-21936-ch-2061.png', 'bo-san-pham-makita-lua-chon-toi-uu-cua-ban', '&lt;p&gt;Vậy để đáp ứng cho nhu cầu công việc, thì người dùng bắt buộc phải mua nhiều loại máy khác nhau trong nhiều lần đi mua sắm sao? Không!!! Để tiết kiệm khoản thời gian đó, hãng Makita đã cho ra mắt các “bộ sản phẩm” được bán đi kèm với nhau và được trang bị đầy đủ những vật dụng cần thiết để xử lý cho công việc, chúng ta hãy cùng tìm hiểu xem các bộ sản phẩm đó bao gồm những gì nhé.&lt;/p&gt;\r\n\r\n&lt;ol&gt;\r\n	&lt;li&gt;Bộ Sản Phẩm Máy Vặn Vít, Máy Mài Góc Dùng Pin 18V Makita DLX2395J&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Đây được xem là một trong các bộ sản phẩm mới đến từ thương hiệu Makita, với bộ combo này người dùng sẽ sở hữu cho mình: 1 chiếc máy vặn vít DTD156Z ; 1 chiếc máy mài góc DGA 404Z ; 1 sạc nhanh ; 2 pin 18V 3.0Ah ; 1 thùng đựng Makpac.&lt;/li&gt;\r\n	&lt;li&gt;Bộ sản phẩm này thích hợp cho nhu cầu sử dụng trong công việc cũng như nhu cầu sử dụng trong gia đình của mỗi người, với combo này chúng ta sẽ dễ dàng bắt ốc vít khi tháo lắp các vật dụng…. cũng như mài cắt các vật liệu như gỗ, ống sắt, thép…. Và đặc biệt hơn là các sản phẩm này đều sử dụng pin 18V của hãng, điều này sẽ giúp việc di chuyển trong khi làm việc linh hoạt hơn và tiện lợi hơn.&lt;/li&gt;\r\n	&lt;li&gt;Bộ sản phẩm Makita DLX2395J đang được bán với giá khá tốt tại website dungcusoo1.vn, việc mua 1 combo sẽ tiết kiệm kha khá chi phí cho bạn bởi vì những sản phẩm của Makita không chỉ nổi tiếng về chất lượng mà giá cả cũng sẽ không hề thấp, cho nên những bộ sản phẩm với đầy đủ máy, pin, sạc sẽ là lựa chọn tối ưu cho mọi nhu cầu của bạn&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Bộ sản phẩm Makita - Lựa chọn tối ưu của bạn!!&quot; data-lazy-sizes=&quot;(max-width: 800px) 100vw, 800px&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/1-1.jpg&quot; data-lazy-srcset=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/1-1.jpg 800w, https://dungcuvang.com/wp-content/uploads/2022/10/1-1-400x400.jpg 400w, https://dungcuvang.com/wp-content/uploads/2022/10/1-1-300x300.jpg 300w, https://dungcuvang.com/wp-content/uploads/2022/10/1-1-780x780.jpg 780w, https://dungcuvang.com/wp-content/uploads/2022/10/1-1-100x100.jpg 100w&quot; data-was-processed=&quot;true&quot; sizes=&quot;(max-width: 800px) 100vw, 800px&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/1-1.jpg&quot; srcset=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/1-1.jpg 800w, https://dungcuvang.com/wp-content/uploads/2022/10/1-1-400x400.jpg 400w, https://dungcuvang.com/wp-content/uploads/2022/10/1-1-300x300.jpg 300w, https://dungcuvang.com/wp-content/uploads/2022/10/1-1-780x780.jpg 780w, https://dungcuvang.com/wp-content/uploads/2022/10/1-1-100x100.jpg 100w&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;ol start=&quot;2&quot;&gt;\r\n	&lt;li&gt;Bộ Sản Phẩm Máy Hút, Máy Thổi Bụi Dùng Pin 12VMax Makita CLX246SAX2&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Để đáp ứng các nhu cầu vệ sinh trong công việc cũng như dọn dẹp trong gia đình, Makita đã cho ra mắt bộ sản phẩm CLX246SAX2 bao gồm 1 máy hút bụi, 1 máy thổi dùng pin, đi kèm đó là 1 viên pin 12V 2.0Ah, 1 sạc nhanh, và các phụ kiện đi kèm như túi giấy chứa bụi, túi vải chứa bụi, ống hút mềm, giá đỡ, túi lọc, đầu chổi tròn, tất cả sản phẩm được sắp xếp ngăn nắp trong chiếc túi xách Makita khi mua sản phẩm.&lt;/li&gt;\r\n	&lt;li&gt;Vậy với bộ dụng cụ dùng pin này, người dùng sẽ dễ dàng vệ sinh môi trường làm việc cũng như khuôn viên gia đình một cách tốt hơn, tiết kiệm thời gian và sức lực mà vẫn đảm bảo an toàn sức khỏe của các thành viên trong gia đình. Vậy thì còn chờ gì nữa mà không sở hữu ngay cho mình một bộ sản phẩm Makita CLX246SAX2 tại website dungcusoo1.vn  với giá thành ưu đãi và đi kèm nhiều chương trình hấp dẫn.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Bộ sản phẩm Makita - Lựa chọn tối ưu của bạn!!&quot; data-lazy-sizes=&quot;(max-width: 800px) 100vw, 800px&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2022/09/1.jpg&quot; data-lazy-srcset=&quot;https://dungcuvang.com/wp-content/uploads/2022/09/1.jpg 800w, https://dungcuvang.com/wp-content/uploads/2022/09/1-400x400.jpg 400w, https://dungcuvang.com/wp-content/uploads/2022/09/1-300x300.jpg 300w, https://dungcuvang.com/wp-content/uploads/2022/09/1-780x780.jpg 780w, https://dungcuvang.com/wp-content/uploads/2022/09/1-100x100.jpg 100w&quot; data-was-processed=&quot;true&quot; sizes=&quot;(max-width: 800px) 100vw, 800px&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2022/09/1.jpg&quot; srcset=&quot;https://dungcuvang.com/wp-content/uploads/2022/09/1.jpg 800w, https://dungcuvang.com/wp-content/uploads/2022/09/1-400x400.jpg 400w, https://dungcuvang.com/wp-content/uploads/2022/09/1-300x300.jpg 300w, https://dungcuvang.com/wp-content/uploads/2022/09/1-780x780.jpg 780w, https://dungcuvang.com/wp-content/uploads/2022/09/1-100x100.jpg 100w&quot; /&gt;&lt;/p&gt;\r\n', 'Vậy để đáp ứng cho nhu cầu công việc, thì người dùng bắt buộc phải mua nhiều loại máy khác nhau trong nhiều lần đi mua sắm sao? Không!!! Để tiết kiệm khoản thời gian đó, hãng Makita đã cho ra mắt các “bộ sản phẩm” được bán đi kèm với nhau và được trang bị đầy đủ những vật dụng cần thiết để xử lý cho công việc, chúng ta hãy cùng tìm hiểu xem các bộ sản phẩm đó bao gồm những gì nhé.', 'Bộ sản phẩm Makita – Lựa chọn tối ưu của bạn!!', 1, 'noibat,hienthi', 'kinh-nghiem', 1668954048, 0),
(28, 'anh-chup-man-hinh-2022-11-20-luc-22123-ch-3668.png', 'uu-diem-cua-dung-cu-cam-tay-do-nghe', '&lt;p&gt;Dụng cụ cầm tay và đồ nghề:&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Dụng cụ cầm tay và đồ nghề là cách gọi để chỉ cả những dụng cụ có động cơ hay không có động cơ, được sử dụng để hỗ trợ người dùng tạo ra hoặc hoàn thiện sản phẩm theo mong muốn. Hiện các dụng cụ cầm tay và đồ nghề ngày càng được ứng dụng rộng rãi trong nhiều ngành nghề, lĩnh vực sản xuất cũng như đời sống.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;Ưu điểm của các dụng cụ cầm tay và đồ nghề&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Mang lại sự chính xác cao trong công việc&lt;/li&gt;\r\n	&lt;li&gt;Tiết kiệm tối đa thời gian và sức lao động trong công việc, đảm bảo nhu cầu sử dụng cao&lt;/li&gt;\r\n	&lt;li&gt;Đa dạng chủng loại, mẫu mã đem đến nhiều sự lựa chọn hơn trong công việc và đời sống&lt;/li&gt;\r\n	&lt;li&gt;Dễ bảo quản và cất giữ nhờ vào thiết kế hiện đại, gọn nhẹ&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;Thương hiệu dụng cụ đồ nghề nổi tiếng&lt;/p&gt;\r\n\r\n&lt;p&gt;Do cơ cấu thị trường ngày càng phát triển nên có khá nhiều thương hiệu nổi tiếng trong lĩnh vực sản xuất và kinh doanh các mặt hàng dụng cụ cầm tay và đồ nghề, có thể kể đến một số thương hiệu như: TRUPER, Pretul, Sata… Những thương hiệu này được đánh giá là một trong những thương hiệu hàng đầu về sản xuất dụng cụ cầm tay đồ nghề.&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Thương hiệu &lt;a href=&quot;https://dungcuvang.com/collections/dung-cu-cam-tay-do-nghe?filter_thuong-hieu=truper&amp;amp;wpf_count=24&quot;&gt;TRUPER&lt;/a&gt;&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;TRUPER là thương hiệu dụng cụ cầm tay và đồ nghề hàng đầu Châu Mỹ Latin, đặt trụ sở chính tại Mexico. Với hơn 50 năm kinh nghiệm trong ngành sản xuất thiết bị công nghiệp, dụng cụ cầm tay đồ nghề, TRUPER tự hào là công ty hàng đầu thế giới về sản xuất, phân phối các công cụ và sản phẩm cho ngành công nghiệp và dân dụng. Những sản phẩm chất lượng như thước cuốn thép, cờ lê, mỏ lết, dao rọc giấy, búa, kìm, kéo cắt cành, máy vặn mở bu lông và thùng- túi đựng đồ nghề… do TRUPER sản xuất, hiện cũng đã được phân phối chính hãng tại thị trường Việt Nam với giá thành hấp dẫn&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Ưu điểm của dụng cụ cầm tay - đồ nghề&quot; data-lazy-sizes=&quot;(max-width: 800px) 100vw, 800px&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/3.jpg&quot; data-lazy-srcset=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/3.jpg 800w, https://dungcuvang.com/wp-content/uploads/2022/10/3-400x400.jpg 400w, https://dungcuvang.com/wp-content/uploads/2022/10/3-300x300.jpg 300w, https://dungcuvang.com/wp-content/uploads/2022/10/3-780x780.jpg 780w, https://dungcuvang.com/wp-content/uploads/2022/10/3-100x100.jpg 100w&quot; data-was-processed=&quot;true&quot; sizes=&quot;(max-width: 800px) 100vw, 800px&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/3.jpg&quot; srcset=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/3.jpg 800w, https://dungcuvang.com/wp-content/uploads/2022/10/3-400x400.jpg 400w, https://dungcuvang.com/wp-content/uploads/2022/10/3-300x300.jpg 300w, https://dungcuvang.com/wp-content/uploads/2022/10/3-780x780.jpg 780w, https://dungcuvang.com/wp-content/uploads/2022/10/3-100x100.jpg 100w&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Thương hiệu &lt;a href=&quot;https://dungcuvang.com/collections/dung-cu-cam-tay-do-nghe?wpf_count=24&amp;amp;filter_thuong-hieu=pretul&quot;&gt;PRETUL&lt;/a&gt;&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;PRETUL là thương hiệu liên kết với TRUPER, các sản phẩm của PRETUL được cho là có giá thành cạnh tranh nhất trên thị trường dụng cụ cầm tay đồ nghề tại Việt Nam. Để tiếp cận đến nhiều phân khúc người dùng, PRETUL luôn phát triển và sản xuất đa dạng chủng loại sản phẩm để đáp ứng tốt nhu cầu sử dụng cũng như đảm bảo chất lượng sản phẩm&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Thương hiệu &lt;a href=&quot;https://dungcuvang.com/collections/dung-cu-cam-tay-do-nghe?wpf_count=24&amp;amp;filter_thuong-hieu=sata&quot;&gt;SATA&lt;/a&gt;&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;SATA là thương hiệu chuyên sản xuất lĩnh vực dụng cụ sửa chữa cầm tay số 1 của Mỹ. Dụng cụ cầm tay SATA như: Kìm, búa, mỏ lết, tuốc nơ vít, bộ lục giác, cờ lê vòng miệng, cần kéo, cần nối,… đều được sản xuất dựa trên dây chuyền công nghệ tiên tiến với quy trình nghiệm ngặt, tiêu chuẩn kỹ thuật cao và độ chính xác tuyệt đối. Đặc biệt, nhóm dụng cụ đồ nghề SATA có khả năng chịu ma sát tốt, chống ăn mòn, chống gỉ lại chịu nhiệt, chịu lực hàng đầu nên được ứng dụng linh hoạt không chỉ trong dân dụng mà còn trong cả ngành cơ khí và điện tử.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Ưu điểm của dụng cụ cầm tay - đồ nghề&quot; data-lazy-sizes=&quot;(max-width: 800px) 100vw, 800px&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/4.jpg&quot; data-lazy-srcset=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/4.jpg 800w, https://dungcuvang.com/wp-content/uploads/2022/10/4-400x400.jpg 400w, https://dungcuvang.com/wp-content/uploads/2022/10/4-300x300.jpg 300w, https://dungcuvang.com/wp-content/uploads/2022/10/4-780x780.jpg 780w, https://dungcuvang.com/wp-content/uploads/2022/10/4-100x100.jpg 100w&quot; data-was-processed=&quot;true&quot; sizes=&quot;(max-width: 800px) 100vw, 800px&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/4.jpg&quot; srcset=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/4.jpg 800w, https://dungcuvang.com/wp-content/uploads/2022/10/4-400x400.jpg 400w, https://dungcuvang.com/wp-content/uploads/2022/10/4-300x300.jpg 300w, https://dungcuvang.com/wp-content/uploads/2022/10/4-780x780.jpg 780w, https://dungcuvang.com/wp-content/uploads/2022/10/4-100x100.jpg 100w&quot; /&gt;&lt;/p&gt;\r\n', 'Dụng cụ cầm tay và đồ nghề là cách gọi để chỉ cả những dụng cụ có động cơ hay không có động cơ, được sử dụng để hỗ trợ người dùng tạo ra hoặc hoàn thiện sản phẩm theo mong muốn. Hiện các dụng cụ cầm tay và đồ nghề ngày càng được ứng dụng rộng rãi trong nhiều ngành nghề, lĩnh vực sản xuất cũng như đời sống.', 'Ưu điểm của dụng cụ cầm tay – đồ nghề', 1, 'noibat,hienthi', 'kinh-nghiem', 1668954110, 0),
(29, 'anh-chup-man-hinh-2022-11-20-luc-22300-ch-4528.png', 'cach-phan-biet-may-khoan-chinh-hang', '&lt;h2&gt;Cách nhận biết máy khoan Makita chính hãng&lt;/h2&gt;\r\n\r\n&lt;p&gt;– Với nhu cầu sử dụng các sản phẩm dụng cụ, thiết bị cầm tay ngày một tăng cao, nên các dòng sản phẩm mang thương hiệu Makita đã và đang bị làm giả, làm nhái với ngoại hình hết sức tinh vi và lưu hành với số lượng khá nhiều trên thị trường và đặc biệt là các dòng máy khoan sử dụng pin.&lt;/p&gt;\r\n\r\n&lt;p&gt;– Các loại máy khoan pin hàng giả, hàng nhái có ngoại hình giống 80 – 90% với máy chính hãng, nhưng về chất lượng thì sau một thời gian ngắn sử dụng, động cơ bên trong những sản phẩm kém chất lượng đó sẽ ngày càng giảm nhanh như: Khoan yếu, mau hết pin hoặc hư pin, hỏng hóc…&lt;/p&gt;\r\n\r\n&lt;p&gt;Cho nên, để đảm bảo sự an toàn cũng như quyền lợi của khách hàng khi mua các sản phẩm máy khoan pin, chúng ta nên tìm hiểu những cách nhận biết cơ bản về máy khoan chính hãng Makita.&lt;/p&gt;\r\n\r\n&lt;ol&gt;\r\n	&lt;li&gt;Nguồn gốc xuất xứ:&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;p&gt;Tập đoàn Makita có trụ sở chính đặt tại Nhật Bản, tuy nhiên để thuận tiện cho việc sản xuất và xuất khẩu hàng hóa đến các nước Đông Nam Á, Makita đã cho xây dựng các nhà máy sản xuất chuyên một số loại sản phẩm tại Thái Lan, Trung Quốc. Hầu hết các sản phẩm của Makita chính hãng được phân phối tại Việt Nam đa số sẽ có xuất xứ từ Trung Quốc, một số dòng máy khoan điện riêng biệt sẽ được sản xuất tại Thái Lan như: M8100B, M6000B…. Thị trường Việt Nam có rất ít dòng sản phẩm “Made in Japan”, vì vậy chúng ta cũng cần phải cảnh giác và kiểm chứng kỹ càng trước khi mua các sản phẩm đó&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Cách phân biệt máy khoan chính hãng&quot; data-lazy-sizes=&quot;(max-width: 600px) 100vw, 600px&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/Makita-made-in-600x400.jpg&quot; data-lazy-srcset=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/Makita-made-in-600x400.jpg 600w, https://dungcuvang.com/wp-content/uploads/2022/10/Makita-made-in-1200x800.jpg 1200w, https://dungcuvang.com/wp-content/uploads/2022/10/Makita-made-in-300x200.jpg 300w, https://dungcuvang.com/wp-content/uploads/2022/10/Makita-made-in-780x520.jpg 780w, https://dungcuvang.com/wp-content/uploads/2022/10/Makita-made-in.jpg 1600w&quot; data-was-processed=&quot;true&quot; sizes=&quot;(max-width: 600px) 100vw, 600px&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/Makita-made-in-600x400.jpg&quot; srcset=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/Makita-made-in-600x400.jpg 600w, https://dungcuvang.com/wp-content/uploads/2022/10/Makita-made-in-1200x800.jpg 1200w, https://dungcuvang.com/wp-content/uploads/2022/10/Makita-made-in-300x200.jpg 300w, https://dungcuvang.com/wp-content/uploads/2022/10/Makita-made-in-780x520.jpg 780w, https://dungcuvang.com/wp-content/uploads/2022/10/Makita-made-in.jpg 1600w&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;ol start=&quot;2&quot;&gt;\r\n	&lt;li&gt;Kiểm tra tem&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;p&gt;Để đề phòng hàng giả nhái xâm chiếm thị trường, cũng như bảo vệ thương hiệu, các sản phẩm của Makita đều được dán tem chống giả 7 màu, với độ phản quang và đường nét in trên tem sắc sảo và bên dưới mỗi tem 7 màu đều mang dãy 16 số để kiểm tra tại website hãng. Mỗi máy Makita đều sẽ mang 1 số Seri riêng biệt, không trùng lặp, vì vậy người dùng cần kiểm tra tem, số seri, thông số máy… trước khi quyết định mua sản phẩm.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Cách phân biệt máy khoan chính hãng&quot; data-lazy-sizes=&quot;(max-width: 800px) 100vw, 800px&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/makita.jpg&quot; data-lazy-srcset=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/makita.jpg 800w, https://dungcuvang.com/wp-content/uploads/2022/10/makita-400x400.jpg 400w, https://dungcuvang.com/wp-content/uploads/2022/10/makita-300x300.jpg 300w, https://dungcuvang.com/wp-content/uploads/2022/10/makita-780x780.jpg 780w, https://dungcuvang.com/wp-content/uploads/2022/10/makita-100x100.jpg 100w&quot; data-was-processed=&quot;true&quot; sizes=&quot;(max-width: 800px) 100vw, 800px&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/makita.jpg&quot; srcset=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/makita.jpg 800w, https://dungcuvang.com/wp-content/uploads/2022/10/makita-400x400.jpg 400w, https://dungcuvang.com/wp-content/uploads/2022/10/makita-300x300.jpg 300w, https://dungcuvang.com/wp-content/uploads/2022/10/makita-780x780.jpg 780w, https://dungcuvang.com/wp-content/uploads/2022/10/makita-100x100.jpg 100w&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;ol start=&quot;3&quot;&gt;\r\n	&lt;li&gt;Ngoại quan, kiểu dáng, trọng lượng&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;p&gt;Tuy có ngoại hình giống 80 – 90% máy Makita chính hãng, nhưng các sản phẩm đạo nhái vẫn sẽ có những lỗi nhỏ mà người dùng có thể nhận biết khi cầm nắm trong tay. Các đặc điểm như màu sắc hoặc các vị trí nối, bắt ốc liên kết sẽ không được chỉnh chu như hàng chính hãng, cảm giác cầm nắm không chắc chắn, đầm tay….&lt;/p&gt;\r\n\r\n&lt;ol start=&quot;4&quot;&gt;\r\n	&lt;li&gt;Phiếu bảo hành&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;p&gt;Mỗi sản phẩm được bán ra của Makita luôn đi kèm phiếu bảo hành do hãng cung cấp, khi bạn mua sản phẩm, người bán sẽ điền thông tin như: Ngày mua, Model máy, Series máy… Các sản phẩm khoan Makita đều được bảo hành 6 tháng tại các đại lý Makita trên toàn quốc. Nếu bạn mua sản phẩm Makita mà không được cung cấp phiếu bảo hành đúng chuẩn của hãng hoặc chỉ được báo bảo hành qua tem riêng dán trên máy thì 99% bạn đã mua phải hàng giả.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Cách phân biệt máy khoan chính hãng&quot; data-lazy-sizes=&quot;(max-width: 600px) 100vw, 600px&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/PBH-Makita-600x800.jpg&quot; data-lazy-srcset=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/PBH-Makita-600x800.jpg 600w, https://dungcuvang.com/wp-content/uploads/2022/10/PBH-Makita-300x400.jpg 300w, https://dungcuvang.com/wp-content/uploads/2022/10/PBH-Makita.jpg 720w&quot; data-was-processed=&quot;true&quot; sizes=&quot;(max-width: 600px) 100vw, 600px&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/PBH-Makita-600x800.jpg&quot; srcset=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/PBH-Makita-600x800.jpg 600w, https://dungcuvang.com/wp-content/uploads/2022/10/PBH-Makita-300x400.jpg 300w, https://dungcuvang.com/wp-content/uploads/2022/10/PBH-Makita.jpg 720w&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;ol start=&quot;5&quot;&gt;\r\n	&lt;li&gt;Lựa chọn địa chỉ mua hàng chính hãng&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;p&gt;Với những đặc điểm trên thì bạn chỉ có thể phân biệt được chiếc máy bạn đang cầm có phải chính hãng hay hàng giả thôi, điều quan trọng hơn cả là bạn cần phải tìm đến những địa chỉ uy tín, chuyên kinh doanh các sản phẩm Makita chính hãng.&lt;/p&gt;\r\n\r\n&lt;p&gt;Với nhiều năm kinh nghiệm trong lĩnh vực thiết bị, dụng cụ cầm tay, Công ty TNHH TM Trực Tuyến Skytool – Dụng Cụ Vàng đã và đang kinh doanh đa dạng mẫu mã sản phẩm của các hãng lớn như: Makita, Bosch, Stanley, Sata, Dewalt…. Với cung cách chăm sóc khách hàng nhiệt tình, hệ thống bảo hành rõ ràng, sản phẩm rõ nguồn gốc xuất xứ, đảm bảo chất lượng sản phẩm bán ra, người tiêu dùng có thể hoàn toàn yên tâm khi mua hàng tại đây.&lt;/p&gt;\r\n', '– Với nhu cầu sử dụng các sản phẩm dụng cụ, thiết bị cầm tay ngày một tăng cao, nên các dòng sản phẩm mang thương hiệu Makita đã và đang bị làm giả, làm nhái với ngoại hình hết sức tinh vi và lưu hành với số lượng khá nhiều trên thị trường và đặc biệt là các dòng máy khoan sử dụng pin.', 'Cách phân biệt máy khoan chính hãng', 1, 'noibat,hienthi', 'kinh-nghiem', 1668954190, 0),
(30, 'anh-chup-man-hinh-2022-11-20-luc-22409-ch-2983.png', 'gioi-thieu-ve-may-khoan-dien', '&lt;p&gt;Trong cuộc sống hàng ngày, các loại dụng cụ, thiết bị cầm tay ngày được sử dụng phổ biến ở các công trình xây dựng, nhà xưởng hay chính ngôi nhà ở của chúng ta. Và đặc biệt phải kể đến “Máy Khoan” – Dòng sản phẩm vượt trội trong ngành dụng cụ điện cầm tay mà bất cứ người nào cũng cần phải có. Để tìm hiểu rõ hơn về thiết bị này thì bài viết dưới đây sẽ phân tích về những đặc điểm và một số loại máy khoan điện thông dụng trên thị trường hiện nay.&lt;/p&gt;\r\n\r\n&lt;p&gt;Cấu tạo của máy khoan&lt;/p&gt;\r\n\r\n&lt;p&gt;Về cấu tạo của một chiếc máy khoan thì bao gồm các bộ phận cơ bản như sau:&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Giới thiệu về máy khoan điện&quot; data-lazy-sizes=&quot;(max-width: 800px) 100vw, 800px&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/Untitled-4.jpg&quot; data-lazy-srcset=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/Untitled-4.jpg 800w, https://dungcuvang.com/wp-content/uploads/2022/10/Untitled-4-400x400.jpg 400w, https://dungcuvang.com/wp-content/uploads/2022/10/Untitled-4-300x300.jpg 300w, https://dungcuvang.com/wp-content/uploads/2022/10/Untitled-4-780x780.jpg 780w, https://dungcuvang.com/wp-content/uploads/2022/10/Untitled-4-100x100.jpg 100w&quot; data-was-processed=&quot;true&quot; sizes=&quot;(max-width: 800px) 100vw, 800px&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/Untitled-4.jpg&quot; srcset=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/Untitled-4.jpg 800w, https://dungcuvang.com/wp-content/uploads/2022/10/Untitled-4-400x400.jpg 400w, https://dungcuvang.com/wp-content/uploads/2022/10/Untitled-4-300x300.jpg 300w, https://dungcuvang.com/wp-content/uploads/2022/10/Untitled-4-780x780.jpg 780w, https://dungcuvang.com/wp-content/uploads/2022/10/Untitled-4-100x100.jpg 100w&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Thân máy và tay cầm&lt;/li&gt;\r\n	&lt;li&gt;Bộ khởi động máy khoan điện&lt;/li&gt;\r\n	&lt;li&gt;Chổi than&lt;/li&gt;\r\n	&lt;li&gt;Rotor&lt;/li&gt;\r\n	&lt;li&gt;Stator&lt;/li&gt;\r\n	&lt;li&gt;Quạt gió&lt;/li&gt;\r\n	&lt;li&gt;Trục khoan&lt;/li&gt;\r\n	&lt;li&gt;Bộ truyền động&lt;/li&gt;\r\n	&lt;li&gt;Đầu cặp mũi khoan trên trục khoan&lt;/li&gt;\r\n	&lt;li&gt;Vòng bi&lt;/li&gt;\r\n	&lt;li&gt;Nguồn cấp điện&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;Nguyên lý hoạt động máy khoan điện cầm tay&lt;/p&gt;\r\n\r\n&lt;p&gt;Cơ chế vận hành của máy khoan điện cầm tay không quá phức tạp, hoạt động bằng điện năng, nguồn điện cung cấp sẽ thực hiện nhiệm vụ tạo ra dòng điện một chiều làm chổi than và động cơ quay. Lúc này, bánh răng truyền động sẽ tiếp nhận chuyển động quay từ động cơ rồi truyền cho trục khoan. Khi đó, mũi khoan gắn trục sẽ xoay tròn và có thể khoan dâu vào vật thể để mà nó tiếp xúc.&lt;/p&gt;\r\n\r\n&lt;p&gt;Bên cạnh đó, động cơ cũng gián tiếp làm quạt gió hoạt động và đảm nhận vai trò làm mát cũng như bảo vệ máy.&lt;/p&gt;\r\n\r\n&lt;p&gt;Các loại máy khoan điện cầm tay phổ biến hiện nay&lt;/p&gt;\r\n\r\n&lt;p&gt;Máy khoan điện cầm tay rất đa dạng về chủng loại. Mỗi kiểu máy sẽ sở hữu những ưu điểm và nhược điểm riêng của nó. Vì vậy để lựa chọn mua máy khoan điện thì bạn nên xem xét sao cho phù hợp với mục đích sử dụng của mình.&lt;/p&gt;\r\n\r\n&lt;p&gt;Máy khoan điện&lt;/p&gt;\r\n\r\n&lt;p&gt;Thường được gọi là máy khoan xoay, chuyên dùng để khoan kim loại và gỗ. Là một trong những dòng máy khoan cầm tay được nhiều người ưa chuộng và sử dụng. Máy khoan này giúp khoan sâu hơn mà không tạo ra lực đập, mũi khoan sắc bén, đường khoan nhẹ nhàng và dứt khoát.&lt;/p&gt;\r\n\r\n&lt;p&gt;Ưu điểm:&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Kích cỡ máy vừa vặn với thiết kế gọn nhẹ, giúp người dùng có thể cầm nắm một cách thoải mái và linh hoạt.&lt;/li&gt;\r\n	&lt;li&gt;Tốc độ không tải cao, được ứng dụng trong những công việc đòi hỏi độ chính xác cao như ngành nghề thủ công mỹ nghệ, kim khí…&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;Nhược điểm:&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Do thiết kế chuyên dụng cho khoan gỗ và kim loại nên sẽ hạn chế trong các công việc trong gia đình vì không có chức năng khoan tường.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;Máy khoan động lực&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Giới thiệu về máy khoan điện&quot; data-lazy-sizes=&quot;(max-width: 547px) 100vw, 547px&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/May-khoan-dien-547x400.jpg&quot; data-lazy-srcset=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/May-khoan-dien-547x400.jpg 547w, https://dungcuvang.com/wp-content/uploads/2022/10/May-khoan-dien.jpg 600w&quot; data-was-processed=&quot;true&quot; sizes=&quot;(max-width: 547px) 100vw, 547px&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/May-khoan-dien-547x400.jpg&quot; srcset=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/May-khoan-dien-547x400.jpg 547w, https://dungcuvang.com/wp-content/uploads/2022/10/May-khoan-dien.jpg 600w&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Đây Là loại máy dùng điện trực tiếp được sử dụng phổ biến trong đời sống hiện nay….Máy khoan động lực sở hữu những ưu điểm và hạn chế như sau:&lt;/p&gt;\r\n\r\n&lt;p&gt;Ưu điểm:&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Đáp ứng được nhu cầu sử dụng đa dạng và có thể sử dụng máy khoan động lực để vặn vít, khoan gỗ, kim loại và khoan tường.&lt;/li&gt;\r\n	&lt;li&gt;Máy khoan động lực sở hữu công suất hoạt động ấn tượng hơn so với các loại máy khoan dùng pin.&lt;/li&gt;\r\n	&lt;li&gt;Giá thành phải chăng, thích hợp với đông đảo người dùng.&lt;/li&gt;\r\n	&lt;li&gt;Máy khoan động lực đa dạng về chủng loại và mẫu mã, được kèm theo các phụ kiện khá phổ biến trên thị trường.&lt;/li&gt;\r\n	&lt;li&gt;Với loại máy điện cầm tay này, khi sử dụng không cần phải lo lắng về tình trạng hết pin bất ngờ xảy ra trong quá trình làm việc.&lt;/li&gt;\r\n	&lt;li&gt;Máy khoan động lực có thiết kế nhỏ gọn, trọng lượng và kích thước phù hợp, linh hoạt khi sử dụng.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;Nhược điểm:&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Sử dụng phụ thuộc trực tiếp vào nguồn điện, vì vậy phải làm việc gần nơi có nguồn hiện hoặc sử dụng bộ dây, ổ chia điện.&lt;/li&gt;\r\n	&lt;li&gt;Máy có trọng lượng tương đối đầm tay nên việc cầm nắm sẽ cần phải sử dụng cả 2 tay để giữ nhằm tạo lực lên vị trí khoan chính xác hơn&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;Máy khoan bê tông&lt;/p&gt;\r\n\r\n&lt;p&gt;Máy khoan bê tông cầm tay thường được sử dụng cho các công việc nặng như khoan đập bê tông, tường gạch, cốt thép… Ví dụ như các dòng máy khoan bê tông thông dụng như: Máy khoan bê tông Bosch &lt;a href=&quot;https://dungcuvang.com/products/bosch-gbh-2-26dre&quot;&gt;GBH 2-26DRE&lt;/a&gt;, Máy khoan bê tông 18mm Makita &lt;a href=&quot;https://dungcuvang.com/products/may-khoan-be-tong-18mm-makita-hr1841fj&quot;&gt;HR1841FJ&lt;/a&gt;….&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Giới thiệu về máy khoan điện&quot; data-lazy-sizes=&quot;(max-width: 600px) 100vw, 600px&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/May-khoan-be-tong-600x400.jpg&quot; data-lazy-srcset=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/May-khoan-be-tong.jpg 600w, https://dungcuvang.com/wp-content/uploads/2022/10/May-khoan-be-tong-300x200.jpg 300w&quot; data-was-processed=&quot;true&quot; sizes=&quot;(max-width: 600px) 100vw, 600px&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/May-khoan-be-tong-600x400.jpg&quot; srcset=&quot;https://dungcuvang.com/wp-content/uploads/2022/10/May-khoan-be-tong.jpg 600w, https://dungcuvang.com/wp-content/uploads/2022/10/May-khoan-be-tong-300x200.jpg 300w&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Ưu điểm:&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Công suất máy lớn nhằm đảm bảo khả năng làm việc một cách mạnh mẽ.&lt;/li&gt;\r\n	&lt;li&gt;Đáp ứng cùng lúc nhiều nhu cầu sử dụng khoan và đục bê tông.&lt;/li&gt;\r\n	&lt;li&gt;Chất liệu vỏ bên ngoài của thiết bị được làm bằng nhựa cao cấp, đảm bảo khả năng chịu nhiệt và va đập mạnh cho máy.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;Nhược điểm:&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Giá thành khá cao.&lt;/li&gt;\r\n	&lt;li&gt;Do kích thước và trọng lượng của máy khá lớn sẽ làm giảm đi độ linh hoạt khi sử dụng, đòi hỏi người dùng phải có sức khỏe và độ bền bỉ cao.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;Mua máy khoan điện ở đâu uy tín?&lt;/p&gt;\r\n\r\n&lt;p&gt;Với thị trường du nhập quá nhiều hàng hóa phức tạp hiện nay, việc mua máy khoan điện cầm tay chắc chắn và bền vỉ, giá cả phải chăng và đặc biệt là “Chính Hãng” trở nên vô cùng khó khăn. Để tìm được một nơi kinh doanh các mặt hàng phân phối chính hãng khiến người dùng phải đau đầu khi tìm kiếm khắp nơi trong suốt thời gian qua. Vì vậy, để thuận tiện mang đến những sản phẩm chính hãng đảm bảo chất lượng đến tay người tiêu dùng, Siêu Thị Trực Tuyến Dụng Cụ Vàng đã và đang cập nhật những mẫu mã sản phẩm mới nhất đến từ nhiều thương hiệu nổi tiếng trên thế giới như: Makita, Bosch, Dewalt, Stanley, Milwaukee… Với nhiều chính sách ưu đãi hấp dẫn, cũng như chế độ chăm sóc khách hàng nhiệt tình, “Siêu Thị &lt;a href=&quot;https://dungcuvang.com/&quot;&gt;Dụng Cụ Vàng&lt;/a&gt;” sẽ là nơi bạn gửi gắm trọn niềm tin khi tìm đến.&lt;/p&gt;\r\n', 'Trong cuộc sống hàng ngày, các loại dụng cụ, thiết bị cầm tay ngày được sử dụng phổ biến ở các công trình xây dựng, nhà xưởng hay chính ngôi nhà ở của chúng ta.', ' Giới thiệu về máy khoan điện', 1, 'noibat,hienthi', 'kinh-nghiem', 1668954253, 0),
(31, 'anh-chup-man-hinh-2022-11-20-luc-22532-ch-6367.png', 'may-phun-xit-rua-cao-ap-ronix', '&lt;h2&gt;Máy phun rửa áp lực là gì?&lt;/h2&gt;\r\n\r\n&lt;p&gt;Máy phun rửa áp lực là một công cụ bạn có thể sử dụng để làm sạch các bề mặt khác nhau. Để làm cho dụng cụ hoạt động hiệu quả, bạn cần hai loại nguồn chính: nguồn nước cho lượng nước bạn cần để làm sạch; nguồn điện để tạo ra năng lượng cần thiết cho công việc. Nếu bạn nắm được hai điều đó, phần còn lại là tùy thuộc vào máy phun rửa áp lực của bạn. Nó hút nước từ nguồn nước và bằng cách chạy trên nguồn điện thông qua động cơ, nó sẽ đẩy nước ra ngoài với áp suất cao để loại bỏ những thứ không mong muốn như tảo, nấm mốc, bụi bẩn, v.v. khỏi bề mặt mà bạn hướng máy phun rửa áp lực của mình vào.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Máy phun xịt rửa cao áp RONIX&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2022/07/RPC-U100C.jpg&quot; data-was-processed=&quot;true&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2022/07/RPC-U100C.jpg&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Bây giờ, nếu chúng ta muốn phân loại các loại máy phun rửa áp lực khác nhau, chúng ta có thể làm điều đó theo cách phân loại của hai nguồn nước và điện. Một số máy phun rửa áp lực cần nguồn nước chảy liên tục để làm sạch bề mặt trong khi một số máy có thể thực hiện công việc này ngay cả khi chỉ cần một xô nước nhỏ. Còn về nguồn điện, một số máy được cấp nguồn bằng khí đốt hoặc dòng điện một chiều, trong khi một số máy khác được cấp nguồn bằng pin lithium-ion và các dòng máy đó được gọi là máy phun rửa áp lực dùng pin hoặc máy phun rửa áp lực cao không dây.&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Các tính năng khi chọn &lt;a href=&quot;https://dungcuvang.com/collections/may-phun-xit-rua-cao-ap&quot;&gt;máy phun xịt rửa áp lực cao:&lt;/a&gt;&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;Khi nói đến những chiếc máy phun xịt rửa không dây, thì tính năng hữu hình nhất nổi bật là pin. Và điều quan trọng nhất đối với pin là các tính năng như tuổi thọ pin, thời gian chạy pin, thời gian sạc cùng với năng lượng mà nó tạo ra. Tiếp theo, bạn cần quan tâm đến nhu cầu sử dụng nước nghĩa là nguồn nước cần dùng là bao nhiêu và nguồn nước cung cấp như thế nào. Tính di động và chức năng, đi kèm chi phí hoạt động sẽ là những tính năng khác mà bạn cần tìm kiếm ở máy phun rửa áp lực không dây, để mua được sản phẩm tốt nhất có thể đáp ứng hiệu quả nhu cầu sử dụng của bạn.&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;RONIX &lt;a href=&quot;https://dungcuvang.com/products/may-xit-rua-ap-luc-1-400w-ronix-rp-u100c&quot;&gt;RP-U100C&lt;/a&gt; – Máy xịt rửa áp lực cao 1400W&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;Đây là dòng máy xịt rửa mới được Công Ty TNHH TM Trực Tuyến Skytool phân phối tại thị trường Việt Nam. Với chiếc máy xịt rửa này, bạn sẽ dễ dàng vệ sinh mọi loại vết bẩn trên mọi bề mặt như nền nhà, vật dụng và trên bề mặt xe hơi, xe gắn máy…&lt;/p&gt;\r\n\r\n&lt;p&gt;Máy xịt rửa áp lực cao &lt;a href=&quot;https://dungcuvang.com/products/may-xit-rua-ap-luc-1-400w-ronix-rp-u100c&quot;&gt;RONIX RP-U100C&lt;/a&gt; được trang bị động cơ tự hút giúp người dùng dễ dàng sử dụng xịt rửa khi cách xa nguồn nước, tuy nhiên hãng vẫn cung cấp đầu nối ống dây với nguồn nước khi người dùng cần xịt rửa, vệ sinh trong khoảng thời gian dài.&lt;/p&gt;\r\n\r\n&lt;p&gt;Được trang bị động cơ 1.400W mạnh mẽ, Ronix RP-U100C sẽ tạo ra áp lực nước cao với công suất làm sạch tối ưu nhất. Với hệ thống tự động dừng khi không hoạt động và bộ bảo vệ nhiệt tích hợp bên trong máy sẽ giúp kiểm soát khả năng vận hành máy.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Rpc U100c 1&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2022/07/RPC-U100C-1.jpg&quot; data-was-processed=&quot;true&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2022/07/RPC-U100C-1.jpg&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Về thiết kế, máy được hãng chăm chút tỉ mỉ từ vỏ máy cho đến các phụ kiện đi kèm, dễ dàng tháo lắp và thuận tiện cho việc di chuyển hơn với quai xách chắc chắn. Thiết kế gọn nhẹ sẽ mang đến sự linh hoạt khi sử dụng sản phẩm, phần súng cao áp với các khớp nối chắc chắn sẽ hạn chế sự rò rỉ nước khi sử dụng. Máy sử dụng pít tông bằng thép không gỉ dễ dàng loại bỏ bụi bẩn mắc kẹt bên trong vòi phun.&lt;/p&gt;\r\n\r\n&lt;p&gt;Với đầy đủ các phụ kiện đi kèm khi mua máy như, đầu phun, ống nối, khớp nối, dây áp…, người dùng sẽ không cần phải trang bị thêm các vật dụng bên ngoài để máy hoạt động. Ngoài ra, khi mua sản phẩm máy xịt rửa RONIX RP-U100C bạn sẽ nhận được thêm bình chứa chất tẩy rửa, dễ dàng kết nối với đầu súng cho khả năng vệ sinh linh hoạt hơn bao giờ hết.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Rpc U100c 2&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2022/07/RPC-U100C-2.jpg&quot; data-was-processed=&quot;true&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2022/07/RPC-U100C-2.jpg&quot; /&gt;&lt;/p&gt;\r\n', 'Máy phun rửa áp lực là một công cụ bạn có thể sử dụng để làm sạch các bề mặt khác nhau. Để làm cho dụng cụ hoạt động hiệu quả, bạn cần hai loại nguồn chính: nguồn nước cho lượng nước bạn cần để làm sạch; nguồn điện để tạo ra năng lượng cần thiết cho công việc. ', 'Máy phun xịt rửa cao áp RONIX', 1, 'noibat,hienthi', 'kinh-nghiem', 1668954340, 0),
(32, 'anh-chup-man-hinh-2022-11-20-luc-22649-ch-9998.png', 'co-nen-mua-may-khoan-bosch-chinh-hang-duc-hay-khong', '', 'Bosch là một thương hiệu máy khoan khá nổi tiếng trên toàn thế giới. Vậy máy khoan Bosch của Đức có tốt không? Có nên mua máy khoan Bosch chính hãng Đức để sử dụng hay không? Xem ngay bài viết dưới đây của Dụng cụ vàng để giải đáp tất cả các thắc mắc này nhé.\r\n\r\n', 'Có Nên Mua Máy Khoan Bosch Chính Hãng Đức Hay Không?', 1, 'noibat,hienthi', 'kinh-nghiem', 1668954412, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_newsletter`
--

CREATE TABLE `table_newsletter` (
  `id` int(11) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirm_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_created` int(11) DEFAULT 0,
  `date_updated` int(11) DEFAULT 0,
  `numb` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_order`
--

CREATE TABLE `table_order` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_user` int(11) DEFAULT 0,
  `code` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_payment` int(11) DEFAULT 0,
  `temp_price` double DEFAULT 0,
  `total_price` double DEFAULT 0,
  `notes` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_created` int(11) DEFAULT 0,
  `order_status` int(11) DEFAULT 0,
  `numb` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `table_order`
--

INSERT INTO `table_order` (`id`, `id_user`, `code`, `fullname`, `phone`, `address`, `email`, `order_payment`, `temp_price`, `total_price`, `notes`, `date_created`, `order_status`, `numb`) VALUES
(1, 1, 'D0KUOJ', 'NGUYỄN HOÀI NAM', '0932341358', 'dhdhfh, Xã Thượng Hà, Huyện Bảo Lạc, Tỉnh Cao Bằng', 'namdungcuong.nina@gmail.com', 18, 2436000, 2436000, '', 1668955215, 1, 1),
(4, 0, 'LP6ILA', 'tâm', '0908464552', 'Lê Tấn Bê, Phường  An Lạc, Quận Bình Tân, Thành phố Hồ Chí Minh', 'tamtm@gmail.com', 17, 4322000, 4322000, '', 1669132623, 1, 1),
(3, 0, '48KSOF', 'Tam', '0908464552', '., Phường Bình Trị Đông, Quận Bình Tân, Thành phố Hồ Chí Minh', 'tamtm@gmail.com', 17, 2436000, 2436000, '', 1669059807, 1, 1),
(6, 1, '1JWQZF', 'NGUYỄN HOÀI NAM', '0932341358', 'ads, Phường Trúc Bạch, Quận Ba Đình, Thành phố Hà Nội', '', 18, 886000, 886000, '', 1669148542, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_order_detail`
--

CREATE TABLE `table_order_detail` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_order` int(11) DEFAULT 0,
  `id_product` int(11) DEFAULT 0,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regular_price` double DEFAULT 0,
  `sale_price` double DEFAULT 0,
  `quantity` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `table_order_detail`
--

INSERT INTO `table_order_detail` (`id`, `id_order`, `id_product`, `photo`, `name`, `code`, `regular_price`, `sale_price`, `quantity`) VALUES
(1, 1, 20, '3412-6231-3807-2599-6425-2301-4534-4876-1556-6484-1018.jpeg', 'Máy cắt rãnh tường 2 lưỡi 125mm Ronix 3412', 'D0KUOJ', 2700000, 2436000, 1),
(4, 4, 33, 'gst-8000e-2011.jpg', 'Máy cưa gỗ, cưa lọng Bosch GST 8000E', 'LP6ILA', 2377000, 2161000, 2),
(3, 3, 21, '3412-6231-3807-2599-6425-2301-4534-4876-1556-6484-1018-5057.jpeg', 'Máy cắt rãnh tường 2 lưỡi 125mm Ronix 3412', '48KSOF', 2700000, 2436000, 1),
(6, 6, 32, 'gws-0601-4172.jpg', 'Máy mài góc Bosch GWS 060', '1JWQZF', 974000, 886000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_photo`
--

CREATE TABLE `table_photo` (
  `id` int(11) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contentvi` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descvi` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namevi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_video` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `act` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numb` int(11) DEFAULT 0,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_created` int(11) DEFAULT 0,
  `date_updated` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `table_photo`
--

INSERT INTO `table_photo` (`id`, `photo`, `contentvi`, `descvi`, `namevi`, `link`, `link_video`, `type`, `act`, `numb`, `status`, `date_created`, `date_updated`) VALUES
(1, 'logo-dungcuso1-3638.png', '', '', '', '', '', 'logo', 'photo_static', 0, 'hienthi', 1668784747, 1669194581),
(2, 'untitled-120-2331.png', '', '', '', '', '', 'logo2', 'photo_static', 0, 'hienthi', 1668784753, 1669149640),
(3, '1untitled-20-3918.png', '', '', '', '', '', 'favicon', 'photo_static', 0, 'hienthi', 1668784763, 1669149860),
(4, 'slideshow-720x385-94540.png', '', '', '', 'http://demo42.ninavietnam.com.vn/T11_2022/duckhang_2014322w/dung-cu-dien', '', 'slide', 'photo_multi', 1, 'hienthi', 1668784776, 1668955676),
(5, 'image1-17310.png', '', '', '', 'http://demo42.ninavietnam.com.vn/T11_2022/duckhang_2014322w/dung-cu-dien', '', 'advertise1', 'photo_multi', 2, 'hienthi', 1668786114, 1668955688),
(6, 'untitled-2-6972.png', '', '', '', 'http://demo42.ninavietnam.com.vn/T11_2022/duckhang_2014322w/dung-cu-dien', '', 'advertise1', 'photo_multi', 1, 'hienthi', 1668786114, 1668955684),
(7, 'anh-chup-man-hinh-2022-11-20-luc-131424-15400.png', '', '', '', '', '', 'advertise2', 'photo_multi', 3, 'hienthi', 1668950076, 0),
(8, 'anh-chup-man-hinh-2022-11-20-luc-131314-69591.png', '', '', '', '', '', 'advertise2', 'photo_multi', 1, 'hienthi', 1668950076, 0),
(9, 'makita-banner-9366.jpg', '', '', '', 'http://demo42.ninavietnam.com.vn/T11_2022/duckhang_2014322w/dung-cu-dien', '', 'slide', 'photo_multi', 1, 'hienthi', 1668950272, 1669112475),
(10, '960x425-milwaukee-banner-5901.jpg', '', '', '', '', '', 'advertise2', 'photo_multi', 2, 'hienthi', 1668950396, 1669188464),
(19, 'facebookflogo2021svg-87720.png', '', '', '', '', '', 'social', 'photo_multi', 1, 'hienthi', 1668953841, 0),
(12, 'untitled-1-2142.png', '', '', '', 'http://demo42.ninavietnam.com.vn/T11_2022/duckhang_2014322w/', '', 'slide', 'photo_multi', 1, 'hienthi', 1668950414, 1668955661),
(13, 'd34c48966208aa9dcd67db79bae6d1fc9bbbf74f-38700.jpeg', '', '', '', '', '', 'advertise3', 'photo_multi', 1, 'hienthi', 1668950917, 0),
(14, 'anh-chup-man-hinh-2022-11-20-luc-131424-89780.png', '', '', '', '', '', 'advertise3', 'photo_multi', 1, 'hienthi', 1668950929, 0),
(15, 'untitled-14-4068.png', '', 'Freeship đơn trên 500K', 'Giao siêu tốc', '', '', 'criteria', 'photo_multi', 1, 'hienthi', 1668951340, 1668954376),
(16, 'untitled-14-9679.png', '', 'Cam kết tốt nhất thị trường', 'Giá siêu tốt', '', '', 'criteria', 'photo_multi', 2, 'hienthi', 1668951368, 1668954367),
(17, 'untitled-14-4775.png', '', 'Hơn 10.000 sản phẩm', 'Đa dạng hàng hóa', '', '', 'criteria', 'photo_multi', 3, 'hienthi', 1668951390, 1668954358),
(18, 'untitled-14-6102.png', '', 'Đổi trả trong vòng 7 ngày', 'Bảo hành chính hãng', '', '', 'criteria', 'photo_multi', 4, 'hienthi', 1668951413, 1668954250),
(20, '231-17621.png', '', '', '', '', '', 'social', 'photo_multi', 1, 'hienthi', 1668953841, 0),
(21, 'icon-for-skype-18-47420.jpeg', '', '', '', '', '', 'social', 'photo_multi', 1, 'hienthi', 1668953864, 0),
(22, 'youtube2-51218767-13110-50611.png', '', '', '', '', '', 'social', 'photo_multi', 1, 'hienthi', 1668953864, 0),
(23, 'zalo-icon-2475-48070.png', '', '', '', '', '', 'social', 'photo_multi', 1, 'hienthi', 1668953877, 0),
(24, '2-1-300x300-54010.jpeg', '', '', 'Máy Khoan', 'http://demo42.ninavietnam.com.vn/T11_2022/duckhang_2014322w/may-khoan', '', 'category', 'photo_multi', 1, 'hienthi', 1668955174, 0),
(25, 'may-khoan-be-tong-26mm-ken-2526e-300x300-10820.gif', '', '', 'Máy Khoan Bê Tông', 'http://demo42.ninavietnam.com.vn/T11_2022/duckhang_2014322w/may-khoan-be-tong', '', 'category', 'photo_multi', 2, 'hienthi', 1668955233, 0),
(26, 'may-khoan-be-tong-26mm-ken-2526e-300x300-62550.gif', '', '', 'Máy Vặn Vít', '', '', 'category', 'photo_multi', 3, 'hienthi', 1668955325, 0),
(27, '317184704ed70b15419d4a0147ecaaa9-300x300-50190.png', '', '', 'Máy Cưa Lọng', 'http://demo42.ninavietnam.com.vn/T11_2022/duckhang_2014322w/may-cua-long', '', 'category', 'photo_multi', 4, 'hienthi', 1668955399, 0),
(28, 'may-cat-gach-300x300-19060.jpeg', '', '', 'Máy Cắt Gạch', 'http://demo42.ninavietnam.com.vn/T11_2022/duckhang_2014322w/may-cat-gach', '', 'category', 'photo_multi', 5, 'hienthi', 1668955456, 0),
(29, 'may-mai-goc-300x300-43560.jpeg', '', '', 'Máy Mài', '', '', 'category', 'photo_multi', 6, 'hienthi', 1668955478, 0),
(30, '1-2-300x300-34670.jpeg', '', '', 'Máy Khoan Pin', '', '', 'category', 'photo_multi', 1, 'hienthi', 1668955535, 0),
(31, 'may-khoan-bua-ingco-300x300-12590.png', '', '', 'Máy Khoan Búa', '', '', 'category', 'photo_multi', 1, 'hienthi', 1668955581, 0),
(32, 'may-khoan-bua-va-van-vit-makita-10mm-hp0300-1-300x300-79710.png', '', '', 'MÁY VẶN VÍT', '', '', 'category', 'photo_multi', 1, 'hienthi', 1668955616, 0),
(33, 'unnamed-300x300-89270.png', '', '', ' MÁY CẮT SẮT', '', '', 'category', 'photo_multi', 1, 'hienthi', 1668955644, 0),
(34, 'may-cua-kiem-aeg-us900xe-267636302589-300x300-40450.png', '', '', 'Máy Cưa Kiếm', '', '', 'category', 'photo_multi', 1, 'hienthi', 1668955680, 0),
(35, 'may-cua-go-300x300-50180.jpeg', '', '', 'Máy Cưa Gỗ', '', '', 'category', 'photo_multi', 1, 'hienthi', 1668955709, 0),
(36, 'may-cua-xich-300x300-29910.jpeg', '', '', 'Máy Cưa Xích', '', '', 'category', 'photo_multi', 1, 'hienthi', 1668955738, 0),
(37, 'bosch-banner-44440.jpg', '', '', '', '', '', 'slide', 'photo_multi', 1, 'hienthi', 1669112606, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_product`
--

CREATE TABLE `table_product` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_list` int(11) DEFAULT 0,
  `id_cat` int(11) DEFAULT 0,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slugvi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contentvi` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descvi` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namevi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regular_price` double DEFAULT 0,
  `discount` double DEFAULT 0,
  `sale_price` double DEFAULT 0,
  `numb` int(11) DEFAULT 0,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_created` int(11) DEFAULT 0,
  `date_updated` int(11) DEFAULT 0,
  `view` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `table_product`
--

INSERT INTO `table_product` (`id`, `id_list`, `id_cat`, `photo`, `slugvi`, `contentvi`, `descvi`, `namevi`, `code`, `regular_price`, `discount`, `sale_price`, `numb`, `status`, `type`, `date_created`, `date_updated`, `view`) VALUES
(6, 0, 0, '', '', '', '', '0₫ - 1.000.000₫', '', 1000000, 0, 0, 1, 'hienthi', 'filter-price', 1668951007, 0, 0),
(7, 0, 0, '', '', '', '', '1.000.000₫ - 3.000.000₫', '', 3000000, 0, 1000000, 1, 'hienthi', 'filter-price', 1668951049, 0, 0),
(8, 0, 0, '', '', '', '', '3.000.000₫ - 10.000.000₫', '', 10000000, 0, 3000000, 1, 'hienthi', 'filter-price', 1668951137, 0, 0),
(9, 0, 0, '', '', '', '', '10.000.000₫ - 60.762.000₫', '', 61000000, 0, 10000000, 1, 'hienthi', 'filter-price', 1668951162, 0, 0),
(26, 3, 52, 'chp20x-9499.jpg', 'thung-do-nghe-20in-51-x-25-x-27cm-truper-chp-20x-10380', '&lt;h2&gt;&lt;b&gt;Thùng đồ nghề 20in Truper CHP-20X &lt;/b&gt;&lt;/h2&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Thùng đồ nghề 20in Truper CHP-20X&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/truper_10380_2_8c156b97a90947deb23b0e82845ff665-1.jpg&quot; data-was-processed=&quot;true&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/truper_10380_2_8c156b97a90947deb23b0e82845ff665-1.jpg&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Tại Việt Nam, các sản phẩm của Truper chỉ mới có mặt vài năm trở lại đây nhưng đã nhanh chóng nhận được sự tin tưởng của nhiều người dùng bởi hoàn thiện tốt, chất lượng đảm bảo, độ bền cao và giá thành tương đối hợp lý. Thùng đồ nghề 20in Truper CHP-20X là một phụ kiện được sản xuất và phân phối chính hãng bởi Truper, một thương hiệu uy tín có nguồn gốc từ Mexico. &lt;/p&gt;\r\n\r\n&lt;p&gt;Sản phẩm khi mua tại Dụng Cụ Vàng có giá cực kỳ cạnh tranh và bảo hành đổi mới sản phẩm chính hãng trong vòng 07 ngày. Với chất liệu làm bằng nhựa Polypropylen giúp thùng đựng Truper CHP-20X có trọng lượng nhẹ nhưng dẻo dai và chịu va đập tốt, giúp bảo vệ các vật dụng ở bên trong một cách hiệu quả. Bên cạnh đó, phụ kiện này cũng giúp việc di chuyển trọn bộ đồ nghề cầm tay từ vị trí này đến vị trí khác một cách dễ dàng hơn để phục vụ cho công việc. &lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Thùng đồ nghề 20in Truper CHP-20X&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/truper_10380_1_3c9190628a2e471596075b64b394a6a3-1.jpg&quot; data-was-processed=&quot;true&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/truper_10380_1_3c9190628a2e471596075b64b394a6a3-1.jpg&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Thùng đồ nghề 20in Truper CHP-20X giúp người dùng có thể bảo quản các loại dụng cụ như kìm, tua vít, cờ lê, mỏ lết, đèn pin, thước dây và các thiết bị cầm tay khác sau khi sử dụng xong. Thùng đồ nghề 20in Truper CHP-20X có không gian chứa rộng rãi giúp người dùng có thể chứa được nhiều dụng cụ hơn. Móc khóa và tay cầm chắc chắn giúp người dùng có thể di chuyển thùng đồ nghề Truper CHP-20X một cách dễ dàng và tự tin. &lt;/p&gt;\r\n', '&lt;h2&gt;&lt;strong&gt;Đặc điểm nổi bật&lt;/strong&gt;&lt;/h2&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Truper là Thương hiệu Dụng cụ cầm tay và đồ nghề số 1 của Mexico.&lt;/li&gt;\r\n	&lt;li&gt;Tính chịu nhiệt và chịu lực cao tăng tuổi thọ sản phẩm cũng như chất lượng trong công việc.&lt;/li&gt;\r\n	&lt;li&gt;Tay cầm có mặt cao su, hạn chế trơn trượt.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', 'Thùng đồ nghề 20in - (51 x 25 x 27cm), Truper CHP-20X - 10380', 'CHP-20X', 430000, 9, 390000, 10, 'banchay,khuyenmai,hot,noibat,hienthi,moi', 'san-pham', 1669110463, 1669133723, 51),
(27, 3, 52, 'chp20x-1943.jpg', 'thung-do-nghe-23in-59-x-25-x-27cm-truper-chp-23x-11506', '&lt;h2&gt;&lt;b&gt;Thùng đồ nghề 23in Truper CHP-23X – Dụng Cụ Số 1&lt;/b&gt;&lt;/h2&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Thùng đồ nghề 23in Truper CHP-23X&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/truper_11506_2_598a68be6e89483da186c969dcf38488-1.webp&quot; data-was-processed=&quot;true&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/truper_11506_2_598a68be6e89483da186c969dcf38488-1.webp&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Tại Việt Nam, các sản phẩm của Truper chỉ mới có mặt vài năm trở lại đây nhưng đã nhanh chóng nhận được sự tin tưởng của nhiều người dùng bởi hoàn thiện tốt, chất lượng đảm bảo, độ bền cao và giá thành tương đối hợp lý. Thùng đồ nghề 23in Truper CHP-23X là một phụ kiện được sản xuất và phân phối chính hãng bởi Truper, một thương hiệu uy tín có nguồn gốc từ Mexico. &lt;/p&gt;\r\n\r\n&lt;p&gt;Với chất liệu làm bằng nhựa Polypropylen giúp thùng đựng Truper CHP-23X có trọng lượng nhẹ nhưng dẻo dai và chịu va đập tốt, giúp bảo vệ các vật dụng ở bên trong một cách hiệu quả. Thùng đồ nghề 23in Truper CHP-23X có không gian chứa rộng rãi giúp người dùng có thể chứa được nhiều dụng cụ hơn. Móc khóa và tay cầm chắc chắn giúp người dùng có thể di chuyển thùng đồ nghề Truper CHP-23X một cách dễ dàng và tự tin. &lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Thùng đồ nghề 23in Truper CHP-23X&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/truper_11506_1_32dff05aa2844703a28f7ac21a7c3cdc-1.jpg&quot; data-was-processed=&quot;true&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/truper_11506_1_32dff05aa2844703a28f7ac21a7c3cdc-1.jpg&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Thùng đồ nghề 23in Truper CHP-23X giúp người dùng có thể bảo quản các loại dụng cụ như kìm, tua vít, cờ lê, mỏ lết, đèn pin, thước dây và các thiết bị cầm tay khác sau khi sử dụng xong. Sản phẩm khi mua tại Dụng Cụ Vàng có giá cực kỳ cạnh tranh và bảo hành đổi mới sản phẩm chính hãng trong vòng 07 ngày. &lt;/p&gt;\r\n', '&lt;p&gt;&lt;strong&gt;Đặc điểm nổi bật&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Truper là Thương hiệu Dụng cụ cầm tay và đồ nghề số 1 của Mexico.&lt;/li&gt;\r\n	&lt;li&gt;Tính chịu nhiệt và chịu lực cao tăng tuổi thọ sản phẩm cũng như chất lượng trong công việc.&lt;/li&gt;\r\n	&lt;li&gt;Tay cầm có mặt cao su, hạn chế trơn trượt.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', 'Thùng đồ nghề 23in - (59 x 25 x 27cm), Truper CHP-23X - 11506', 'CHP-23X', 520000, 7, 485000, 9, 'banchay,hot,noibat,hienthi', 'san-pham', 1669113009, 1669133730, 5),
(28, 1, 1, 'gbh-2-18-re-7380.jpg', 'may-khoan-bua-bosch-gbh-2-18re', '&lt;p&gt;Hiện nay, nhu cầu &lt;a href=&quot;https://dungcuvang.com/collections/may-khoan-bosch#c%E1%BA%A7m_tay_gi%C3%A1_r%E1%BA%BB&quot;&gt;mua khoan Bosch&lt;/a&gt; của khách hàng rất lớn. Bởi &lt;a href=&quot;https://dungcuvang.com/collections/may-khoan-be-tong#c%E1%BA%A7m_tay_ch%E1%BA%A5t_l%C6%B0%E1%BB%A3ng&quot;&gt;máy khoan bê tông&lt;/a&gt; 2 chức năng Bosch GBH 2-18 RE là dòng sản phẩm được sản xuất bởi thương hiệu Bosch, đây là thương hiệu dẫn đầu thị trường về sản phẩm dụng cụ điện cầm tay và các thiết bị đo kỹ thuật số. Máy khoan Bosch có hai chức năng dùng để siết hai vật lại với nhau hoặc khoan lỗ, khoan thép, bê tông và các vật liệu xây dựng khác tùy thuộc vào nhu cầu sử dụng.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Máy khoan bê tông 2 chức năng Bosch GBH 2-18 RE&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/bosch_gbh2-18re_1_55628dfc1c894aea909aa5f16505bfc0-1.jpg&quot; data-was-processed=&quot;true&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/bosch_gbh2-18re_1_55628dfc1c894aea909aa5f16505bfc0-1.jpg&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Máy khoan bê tông 2 chức năng Bosch GBH 2-18 RE được trang bị báng mềm trên tay nắm chính và vỏ hộp số, má đỡ đấm sau để khoan gỗ và thép. Máy có công suất lớn 550w, tốc độ không tải tối đa cao lên đến 1550 vòng/phút. Khoan thép 4 – 13mm, khoan gỗ 30mm, khoan bê tông 4 – 18mm,&lt;br /&gt;\r\n&lt;img alt=&quot;Máy khoan bê tông 2 chức năng Bosch GBH 2-18 RE&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/bosch_gbh2-18re_2_a7e1b44e3c1f41f3b55f1b3dbaf5f0b1-1.jpg&quot; data-was-processed=&quot;true&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/bosch_gbh2-18re_2_a7e1b44e3c1f41f3b55f1b3dbaf5f0b1-1.jpg&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Sản phẩm được sản xuất từ vật liệu cao cấp vô cùng cứng cáp. Máy có khớp ly hợp an toàn cho người sử dụng. Đặc biệt còn có thiết kế nhỏ gọn, không chiếm nhiều không gian, giúp tối ưu trong quá trình sử dụng.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Máy khoan bê tông 2 chức năng Bosch GBH 2-18 RE&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/bosch_gbh2-18re_4_dc7f06afafe54faea15d6362f73048ff-1.jpg&quot; data-was-processed=&quot;true&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/bosch_gbh2-18re_4_dc7f06afafe54faea15d6362f73048ff-1.jpg&quot; /&gt;&lt;/p&gt;\r\n', '&lt;p&gt;Máy khoan bê tông 2 chức năng Bosch GBH 2-18 RE được trang bị báng mềm trên tay nắm chính và vỏ hộp số, má đỡ đấm sau để khoan gỗ và thép. Máy có công suất lớn 550w, tốc độ không tải tối đa cao lên đến 1550 vòng/phút. Khoan thép 4 – 13mm, khoan gỗ 30mm, khoan bê tông 4 – 18mm.&lt;/p&gt;\r\n', 'Máy khoan búa Bosch GBH 2-18RE', 'GBH 2-18 RE', 2680000, 23, 2062000, 8, 'banchay,hot,noibat,hienthi,moi', 'san-pham', 1669115131, 1669133609, 11),
(29, 1, 1, 'gbm-10-re-9448.png', 'may-khoan-sat-bosch-gbm-10re', '&lt;p&gt;&lt;strong&gt;Sản phẩm được mua bao gồm&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;– Hộp giấy&lt;/p&gt;\r\n\r\n&lt;p&gt;– Chìa vặn&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Đặc điểm nổi bật&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Được thiết kế nhỏ gọn, chiều dài thân máy ngắn nhất để thao tác dễ dàng và liên tục&lt;/li&gt;\r\n	&lt;li&gt;Máy có trọng lượng nhẹ với báng cầm mềm liền khối thoải mái, giúp công việc ít mỏi hơn&lt;/li&gt;\r\n	&lt;li&gt;Chất lượng và độ bền của Bosch cùng mức giá hấp dẫn hỗ trợ những người thợ dễ dàng sở hữu sản phẩm khi có nhu cầu.&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;Máy khoan sắt 10mm Bosch GBM 10 RE là dòng máy khoan được thiết kế nhỏ gọn chỉ 1.3kg dễ dàng mang đến nhiều nơi làm việc, không gây mỏi tay khi cầm nắm thời gian dài. Máy là sản phẩm chính hãng của thương hiệu Bosch với công suất 450W chuyên dụng cho việc khoan tường, gỗ, bê tông,…&lt;/p&gt;\r\n\r\n	&lt;p&gt;&lt;img alt=&quot;Máy khoan sắt 10mm Bosch GBM 10RE&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/bosch_gbm10re_1_5ed88ddb9f494ba79b820d40f6076f35-1.webp&quot; data-was-processed=&quot;true&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/bosch_gbm10re_1_5ed88ddb9f494ba79b820d40f6076f35-1.webp&quot; /&gt;&lt;/p&gt;\r\n\r\n	&lt;p&gt;Tốc độ không tải lớn 2600 vòng/phút giúp hoạt động nhanh chóng, tiết kiệm thời gian. Với dây chuyền sản xuất hiện đại theo tiêu chuẩn của Đức, máy khoan đem lại mũi khoan có độ chuẩn xác cao, đảm bảo hiệu quả tối ưu, duy trì tuổi thọ của máy.&lt;/p&gt;\r\n\r\n	&lt;p&gt;Chất lượng của máy khoan sắt 10mm Bosch GBM 10RE đã tốt mà giá thành lại còn ưu đãi rất phù hợp với đa số người dùng đang có nhu cầu. Cấu tạo máy từ chất liệu hợp kim thép với vỏ bọc xung quanh là nhựa cao cấp, bền bỉ chịu được va đập tốt dù ở môi trường khắc nghiệt&lt;/p&gt;\r\n	&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', '&lt;p&gt;&lt;strong&gt;Sản phẩm được mua bao gồm&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;– Hộp giấy&lt;/p&gt;\r\n\r\n&lt;p&gt;– Chìa vặn&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Đặc điểm nổi bật&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Được thiết kế nhỏ gọn, chiều dài thân máy ngắn nhất để thao tác dễ dàng và liên tục&lt;/li&gt;\r\n	&lt;li&gt;Máy có trọng lượng nhẹ với báng cầm mềm liền khối thoải mái, giúp công việc ít mỏi hơn&lt;/li&gt;\r\n	&lt;li&gt;Chất lượng và độ bền của Bosch cùng mức giá hấp dẫn hỗ trợ những người thợ dễ dàng sở hữu sản phẩm khi có nhu cầu.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', 'Máy khoan sắt Bosch GBM 10RE', 'GBM 10RE', 1256000, 9, 1142000, 7, 'banchay,khuyenmai,hot,noibat,hienthi,moi', 'san-pham', 1669115479, 1669133516, 15),
(30, 1, 4, 'gco-14-24-5238.jpg', 'may-cat-sat-bosch-gco-14-24', '&lt;ul&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;Máy cắt sắt 355mm Bosch GCO 14-24 là máy cắt có độ sắc thuộc dòng “cực phẩm” đến từ thương hiệu Bosch đình đám tại Đức. Sản phẩm là sự kết hợp của công nghệ hiện đại hàng đầu thế giới cùng kinh nghiệm lâu năm trong ngành chế tạo của thương hiệu. Với khả năng đáp ứng nhu cầu công việc tốt chắc chắn sản phẩm sẽ chiều lòng cả những khách hàng khó tính.&lt;/p&gt;\r\n\r\n	&lt;p&gt;&lt;img alt=&quot;Máy cắt sắt 355mm Bosch GCO 14-24&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/bosch_gco14_24_1_eb4ad4b1c91940ccb13f6254728a8c95-1.jpg&quot; data-was-processed=&quot;true&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/bosch_gco14_24_1_eb4ad4b1c91940ccb13f6254728a8c95-1.jpg&quot; /&gt;&lt;/p&gt;\r\n\r\n	&lt;p&gt;Máy cắt sắt 355mm Bosch GCO 14-24 thường được dùng để cắt sắt, kim loại cùng các vật liệu cứng và dày khác. Máy GCO 14-24 có thiết kế thông minh với tay cầm nhỏ gọn. Sản phẩm đem đến sự an toàn tuyệt đối cho người sử dụng với lớp cao su chống trượt ở đế cùng lò xo đàn hồi và vỏ bọc cách điện hoàn hảo.  &lt;img alt=&quot;Máy cắt sắt 355mm Bosch GCO 14-24&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/bosch_gco14_24_3_570a79e92fe64a3ab154d86e82b7ca17-1.jpg&quot; data-was-processed=&quot;true&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/bosch_gco14_24_3_570a79e92fe64a3ab154d86e82b7ca17-1.jpg&quot; /&gt;&lt;/p&gt;\r\n\r\n	&lt;p&gt;Sở hữu công suất 2400W cùng lưỡi cắt có đường kính 355mm, GCO 14-24 giúp nâng cao hiệu quả công việc, hỗ trợ cắt chuẩn xác đến từng mm. Máy luôn hoạt động êm ái nhờ hệ thống bảo vệ an toàn và khả năng kiểm soát độ rung. Máy còn được đánh giá có độ bền cao vừa với túi tiền đảm bảo sẽ khiến quý khách không hối tiếc khi đầu tư.&lt;/p&gt;\r\n\r\n	&lt;p&gt;&lt;img alt=&quot;Máy cắt sắt 355mm Bosch GCO 14-24&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/bosch_gco14_24_4_b750882202ef4da99037a9e700f3aaab-1.webp&quot; data-was-processed=&quot;true&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/bosch_gco14_24_4_b750882202ef4da99037a9e700f3aaab-1.webp&quot; /&gt;&lt;/p&gt;\r\n\r\n	&lt;p&gt;&lt;img alt=&quot;Máy cắt sắt 355mm Bosch GCO 14-24&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/bosch_gco14_24_5_edafa74f39c24204a0527c2c3009dbbc-1.jpg&quot; data-was-processed=&quot;true&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/bosch_gco14_24_5_edafa74f39c24204a0527c2c3009dbbc-1.jpg&quot; /&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', '&lt;p&gt;&lt;strong&gt;Sản phẩm được mua bao gồm&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;– Đĩa mài&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Đặc điểm nổi bật&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Công suất định nghĩa lại trong dòng máy cưa cắt đứt 14’’&lt;/li&gt;\r\n	&lt;li&gt;Khả năng chịu quá tải cao cho các công việc khó khăn nhất&lt;/li&gt;\r\n	&lt;li&gt;Nâng đỡ thêm để cắt vật liệu&lt;/li&gt;\r\n	&lt;li&gt;Bảo vệ tối đa cho người sử dụng và giảm thiểu rung lắc&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', 'Máy cắt sắt Bosch GCO 14-24', ' GCO 14-24', 3764000, 9, 3422000, 6, 'banchay,hot,noibat,hienthi,moi', 'san-pham', 1669115724, 1669133831, 15),
(31, 1, 83, 'ghg-20-63-8321.jpg', 'may-thoi-nong-bosch-ghg-20-63', '&lt;p&gt;&lt;strong&gt;Sản phẩm được mua bao gồm&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;1 Máy thổi&lt;/li&gt;\r\n	&lt;li&gt;5 mũi khò&lt;/li&gt;\r\n	&lt;li&gt;Sách HD + phiếu BH&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Đặc điểm nổi bật&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Khi quá nhiệt, máy sẽ tự động ngừng cấp nhiệt và làm mát, giúp đảm bảo tuổi thọ lâu dài&lt;/li&gt;\r\n	&lt;li&gt;Ba mức thiết lập nhiệt độ hoạt động&lt;/li&gt;\r\n	&lt;li&gt;Cơ chế kiểm soát luồng khí và nhiệt theo mười bước giúp hoạt động chính xác&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;Máy thổi bụi Bosch GHG 20-63 được biết đến là một trong những sản phẩm có chất lượng vượt trội của Bosch – thương hiệu nổi tiếng thế giới trong ngành dụng cụ điện cầm tay. Không chỉ gây ấn tượng bởi chất lượng, các sản phẩm của Bosch còn được hàng triệu khách hàng trên khắp 5 châu tin dùng bởi độ bền cao và có thiết kế tiện lợi nhưng vẫn bảo đảm được hiệu quả công việc.&lt;/p&gt;\r\n\r\n	&lt;p&gt;&lt;img alt=&quot;Máy thổi hơi nóng Bosch GHG 20-63&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/bosch_ghg20_63_2_963044274bf54bfb8274cc6ee27b6993-1.jpg&quot; data-was-processed=&quot;true&quot; height=&quot;800&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/bosch_ghg20_63_2_963044274bf54bfb8274cc6ee27b6993-1.jpg&quot; width=&quot;1200&quot; /&gt;&lt;/p&gt;\r\n\r\n	&lt;p&gt;Đặc biệt, ở những góc khó sử dụng máy hút bụi, thiết bị thổi này càng phát huy thế mạnh. Người dùng còn có thể sử dụng Bosch GHG 20-63 khi muốn vệ sinh nhà kho,nội thất ô tô hay sàn nhà một cách dễ dàng. Máy thổi bụi Bosch GHG 20-63 được sử dụng thường xuyên trong gia đình hay các công trình, các nhà xưởng sản xuất sản phẩm… nhằm mục đích làm sạch các chi tiết nhỏ trên bề mặt.&lt;/p&gt;\r\n\r\n	&lt;p&gt;&lt;img alt=&quot;Máy thổi hơi nóng Bosch GHG 20-63&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/bosch_ghg20_63_5_e428a4eff0b14df8baab2610c9f20582-1.jpg&quot; data-was-processed=&quot;true&quot; height=&quot;800&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/bosch_ghg20_63_5_e428a4eff0b14df8baab2610c9f20582-1.jpg&quot; width=&quot;1200&quot; /&gt;&lt;/p&gt;\r\n\r\n	&lt;p&gt;Ngoài ra xuất hiện đối lưu hai luồng khí giúp tác dụng của thiết bị thể hiện tốt hơn. Sản phẩm có thiết kế nhỏ gọn, dễ sử dụng đi cùng với độ bền bỉ được đánh giá là khá nổi bật. Với công suất 2.00W cho khả năng thổi nóng nhanh chóng và hiệu quả, máy thổi bụi Bosch GHG 20-63 tạo ra luồng gió mạnh hơn hẳn những sản phẩm cùng loại khác.&lt;/p&gt;\r\n\r\n	&lt;p&gt;&lt;img alt=&quot;Máy thổi hơi nóng Bosch GHG 20-63&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/bosch_ghg20_63_3_e7d0f602e5a44656a7e68057164b5ee3-1.jpg&quot; data-was-processed=&quot;true&quot; height=&quot;800&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/bosch_ghg20_63_3_e7d0f602e5a44656a7e68057164b5ee3-1.jpg&quot; width=&quot;1200&quot; /&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', '&lt;p&gt;&lt;strong&gt;Sản phẩm được mua bao gồm&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;1 Máy thổi&lt;/li&gt;\r\n	&lt;li&gt;5 mũi khò&lt;/li&gt;\r\n	&lt;li&gt;Sách HD + phiếu BH&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Đặc điểm nổi bật&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Khi quá nhiệt, máy sẽ tự động ngừng cấp nhiệt và làm mát, giúp đảm bảo tuổi thọ lâu dài&lt;/li&gt;\r\n	&lt;li&gt;Ba mức thiết lập nhiệt độ hoạt động&lt;/li&gt;\r\n	&lt;li&gt;Cơ chế kiểm soát luồng khí và nhiệt theo mười bước giúp hoạt động chính xác&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', 'Máy thổi nóng Bosch GHG 20-63', 'GHG 20-63', 2381000, 9, 2165000, 5, 'banchay,noibat,hienthi', 'san-pham', 1669116866, 1669135250, 19),
(32, 0, 0, 'gws-0601-4172.jpg', 'may-mai-goc-bosch-gws-060', '&lt;h3&gt;Máy mài góc 100mm Bosch GWS 060 dùng để mài, cắt các vật liệu trong công nghiệp.&lt;/h3&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Máy mài góc 100mm Bosch GWS 060 được sản xuất với quy trình hiện đại, kiểm soát nghiêm ngặt đảm bảo đạt tiêu chuẩn chất lượng trước khi đến tay người dùng&lt;/li&gt;\r\n	&lt;li&gt;Máy trang bị động cơ 670W và có tốc độ cao lên đến 12.000 vòng/phút&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Máy mài góc 100mm Bosch GWS 060&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/bosch_gws060_1_5ab3216516b9409a921dec4e13c446f9-1.jpg&quot; data-was-processed=&quot;true&quot; height=&quot;800&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/bosch_gws060_1_5ab3216516b9409a921dec4e13c446f9-1.jpg&quot; width=&quot;1200&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;h3&gt;Ưu điểm của máy mài góc 100mm Bosch GWS 060&lt;/h3&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Máy có trọng lượng  nhẹ nhàng, kết cấu nhỏ gọn, đẹp mắt&lt;/li&gt;\r\n	&lt;li&gt;Vỏ máy được làm từ chất liệu nhựa cao cấp, có độ bền và chịu lực tốt giúp bảo vệ động cơ bên trong tránh hư hỏng khi bị va đập mạnh.&lt;/li&gt;\r\n	&lt;li&gt;Thân máy thon gọn, thiết kế dạng nhựa có độ nhám cao có khả năng chống trượt đảm bảo an toàn khi làm việc. &lt;/li&gt;\r\n	&lt;li&gt;Máy sử dụng công tắc trượt đặt bên thân máy và có chốt giữ tiện lợi giúp người dùng điều khiển máy tốt hơn.&lt;/li&gt;\r\n	&lt;li&gt;Máy sử dụng ren trục M10 dễ dàng tháo lắp nhờ vào phụ kiện khóa vặn đi kèm&lt;/li&gt;\r\n	&lt;li&gt;Đường kính đĩa sử dụng cho máy có kích thước 100mm, hỗ trợ tốt cho công việc mài, cắt tại các góc cạnh nhỏ.&lt;/li&gt;\r\n	&lt;li&gt;Có khả năng hoạt động mạnh mẽ, xử lý tốt công việc một cách nhanh chóng, tiết kiệm thời gian và sức lao động của người dùng.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Máy mài góc 100mm Bosch GWS 060&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/bosch_gws060_2_6eb0969fa03d4a459e631a16082972d4-1.jpg&quot; data-was-processed=&quot;true&quot; height=&quot;800&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/bosch_gws060_2_6eb0969fa03d4a459e631a16082972d4-1.jpg&quot; width=&quot;1200&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;h3&gt;Cách sử dụng và bảo quản sản phẩm&lt;/h3&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;An toàn khi dùng với thiết kế gọn nhẹ, tính di động cao&lt;/li&gt;\r\n	&lt;li&gt;Trước khi dùng nên kiểm tra máy để tránh trường hợp có bộ phận bị hỏng, gây hại khi dùng&lt;/li&gt;\r\n	&lt;li&gt;Sau khi sử dụng, cần làm vệ sinh máy và bảo quản tại nơi thoáng mát&lt;/li&gt;\r\n	&lt;li&gt;Nên kiểm tra máy định kỳ thường xuyên để kéo dài tuổi thọ cho máy.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Máy mài góc 100mm Bosch GWS 060&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/bosch_gws060_3_3bd30735f943479db51448cd71fd0420-1.jpg&quot; data-was-processed=&quot;true&quot; height=&quot;800&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/bosch_gws060_3_3bd30735f943479db51448cd71fd0420-1.jpg&quot; width=&quot;1200&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;h3&gt;Thông tin về thương hiệu  Bosch&lt;/h3&gt;\r\n\r\n&lt;p&gt;Bosch là một trong những thương hiệu hàng đầu trên thế giới về ngành dụng cụ điện cầm tay. Các sản phẩm của Bosch luôn được người dùng tin tưởng và lựa chọn dựa trên những tiêu chí như: Độ bền cao, khả năng hoạt động mạnh mẽ, ổn định. Với những tiêu chí trên, Bosch đã đem đến cho người dùng những thiết bị, dụng cụ đạt tiêu chuẩn chất lượng cao, hỗ trợ tối ưu công việc từ dân dụng đến chuyên nghiệp.&lt;/p&gt;\r\n', '&lt;p&gt;&lt;strong&gt;Sản phẩm được mua bao gồm&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;01 Máy mài góc 100mm.&lt;/li&gt;\r\n	&lt;li&gt;01 Tán kẹp.&lt;/li&gt;\r\n	&lt;li&gt;01 Chìa vặn.&lt;/li&gt;\r\n	&lt;li&gt;01 Vành chắn.&lt;/li&gt;\r\n	&lt;li&gt;Hộp giấy.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Đặc điểm nổi bật&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Máy mài góc 100mm Bosch GWS 060 là sản phẩm chính hãng Bosch.&lt;/li&gt;\r\n	&lt;li&gt;Chất lượng đạt tiêu chuẩn Châu Âu cho khả năng làm việc mạnh mẽ cùng độ bền theo thời gian.&lt;/li&gt;\r\n	&lt;li&gt;Công suất lớn cho hiệu quả công việc cao&lt;/li&gt;\r\n	&lt;li&gt;Giá thành hợp lý phù hợp với người tiêu dùng.&lt;/li&gt;\r\n	&lt;li&gt;Thiết kế nhỏ gọn, hiện đại, dễ dàng cầm sử dụng&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', 'Máy mài góc Bosch GWS 060', '', 974000, 9, 886000, 4, 'moi,hot,khuyenmai,banchay,noibat,hienthi', 'san-pham', 1669121102, 1669133313, 5),
(33, 1, 3, 'gst-8000e-2011.jpg', 'may-cua-go-cua-long-bosch-gst-8000e', '&lt;p&gt;Máy cưa lọng 80mm Bosch GST 8000E là một sản phẩm chất lượng cao đến từ nhà Bosch mặc dù mang đến nhiều tiện ích nhưng giá thành rất phải chăng và ưu đãi, phù hợp với nhu cầu của người tiêu dùng. Được gia công tỉ mỉ, chế tạo từ những vật liệu cao cấp, chắc chắn nên máy cưa có khả năng chịu lực, chịu nhiệt rất tốt, hoạt động ổn định và tuổi thọ sản phẩm cao.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Máy cưa lọng 80mm Bosch GST 8000E&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/bosch_gst8000e_2_0401726532ca4e158283f3180214d055-1.jpg&quot; data-was-processed=&quot;true&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/bosch_gst8000e_2_0401726532ca4e158283f3180214d055-1.jpg&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Làm việc với tốc độ không tải lên đến 800 – 3100 spm, máy cưa có thể giúp người dùng có được hiệu suất công việc cực kỳ cao nhưng vẫn đảm bảo về mặt chất lượng. Trong lượng máy chỉ với 2.5kg cùng thiết kế nhỏ gọn nên đảm bảo linh hoạt cho việc di chuyển và sử dụng.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Máy cưa lọng 80mm Bosch GST 8000E&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/bosch_gst8000e_7_84a8fa85bfce46d9b9013194c962428e-1.jpg&quot; data-was-processed=&quot;true&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/bosch_gst8000e_7_84a8fa85bfce46d9b9013194c962428e-1.jpg&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Máy cưa lọng 80mm Bosch GST 8000E có công suất 710W, cho phép điều chỉnh tốc độ cưa với 4 cấp độ để phù hợp với các vật liệu cần cắt. Máy còn được trang bị nhiều tính năng tối ưu giúp gia tăng tuổi thọ của sản phẩm, không bị hư hỏng như các loại máy khác thông dụng trên thị trường hiện nay.&lt;/p&gt;\r\n', '&lt;p&gt;&lt;strong&gt;Sản phẩm được mua bao gồm&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;– Tấm hạn chế dăm vụn (số hiệu phụ tùng 2 601 016 065)&lt;/p&gt;\r\n\r\n&lt;p&gt;– 1 x lưỡi cưa xoi T 144 D, Speed for Wood (có sẵn bộ riêng 3 cái: 2 608 630 560)&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Đặc điểm nổi bật&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Cưa xoi chuyên nghiệp Bosch với tỷ lệ chi phí/công suất tốt nhất&lt;/li&gt;\r\n	&lt;li&gt;Mô-tơ 710 W mạnh mẽ để cắt nhanh cho mọi loại ứng dụng&lt;/li&gt;\r\n	&lt;li&gt;Chế độ thay lưỡi một tay không cần dụng cụ&lt;/li&gt;\r\n	&lt;li&gt;Lựa chọn bốn quỹ đạo cho các ứng dụng khác nhau từ cắt trơn tru đến mạnh mẽ&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', 'Máy cưa gỗ, cưa lọng Bosch GST 8000E', 'GST 8000E', 2377000, 9, 2161000, 3, 'banchay,khuyenmai,hot,noibat,hienthi,moi', 'san-pham', 1669121348, 1669132671, 27),
(34, 2, 13, 'cl108fdsyw1-5262.jpg', 'may-hut-bui-dung-pin12v-max-makita-cl108fdsyw', '&lt;p&gt;Máy hút bụi pin 12V Makita CL108FDSYW là sản phẩm đến từ nhãn hàng của Nhật Bản. Ông lớn Makita đề cao việc đem đến những trải nghiệm tốt nhất cho người tiêu dùng. Với sự nổi tiếng về thiết kế, mẫu mã đa dạng thì chất lượng sản phẩm cũng không thể chê vào đâu được khi nhãn hàng đưa ra quy trình chế tạo nghiêm ngặt, đạt chuẩn quốc tế. &lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Máy hút bụi pin 12V Makita CL108FDSYW&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/makita_cl108fdsyw_1_839212de94054516b48c3c6529ac693a.jpg&quot; data-was-processed=&quot;true&quot; height=&quot;800&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/makita_cl108fdsyw_1_839212de94054516b48c3c6529ac693a.jpg&quot; width=&quot;1200&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Máy hút bụi pin 12V Makita CL108FDSYW có động cơ hoạt động cao, áp suất hút 4.4kPa và với dung tích chứa lên đến 600ml. Với thiết kế đầu hút hình chữ T hút được chất bẩn ở cả những góc nhỏ khó nhằn. Máy có chức năng tự ngắt điện khi đã sạc đầy, thật tiện lợi phải không nào. &lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Máy hút bụi pin 12V Makita CL108FDSYW&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/makita_cl108fdsyw_2_29e4eedc31e94911b8a84fbf77cc218b.jpg&quot; data-was-processed=&quot;true&quot; height=&quot;800&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/makita_cl108fdsyw_2_29e4eedc31e94911b8a84fbf77cc218b.jpg&quot; width=&quot;1200&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Máy hút bụi pin 12V Makita CL108FDSYW đã đem lại nhiều trải nghiệm tuyệt vời cho người dùng thông qua các công nghệ tiên tiến hàng đầu. Sản phẩm có thiết kế hiện đại, đẹp mắt không nằm ngoài mong đợi của người tiêu dùng. Ngoài ra, bạn có thể vừa sử dụng vừa di chuyển máy dễ dàng vì nó nhỏ gọn và được nhà sản xuất trang bị bánh xe.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Máy hút bụi pin 12V Makita CL108FDSYW&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/makita_cl108fdsyw_3_964a7dba5568454588d831b4ed04592c.jpg&quot; data-was-processed=&quot;true&quot; height=&quot;800&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/makita_cl108fdsyw_3_964a7dba5568454588d831b4ed04592c.jpg&quot; width=&quot;1200&quot; /&gt;&lt;/p&gt;\r\n', '&lt;p&gt;&lt;strong&gt;Sản phẩm được mua bao gồm&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Đầu hút T, đầu hút khe, túi bụi vải, bộ lọc trước .&lt;/li&gt;\r\n	&lt;li&gt;01 sạc 1V&lt;/li&gt;\r\n	&lt;li&gt;01 pin 12V/1.5Ah&lt;/li&gt;\r\n	&lt;li&gt;01 Thân ,áy màu trắng.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Đặc điểm nổi bật&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;&lt;strong&gt;Máy hút bụi pin 12V Makita CL108FDSYW &lt;/strong&gt;hoạt động với đa tốc độ.&lt;/li&gt;\r\n	&lt;li&gt;Máy có thiết kế gọn nhẹ giúp người sử dụng linh hoạt trong công việc cũng như không gian làm việc.&lt;/li&gt;\r\n	&lt;li&gt;Sản phẩm cho sức hút mạnh mẽ tạo hiệu quả công việc cao.&lt;/li&gt;\r\n	&lt;li&gt;Máy được thiết kế với vật liệu cao cấp giúp tăng độ bền.&lt;/li&gt;\r\n	&lt;li&gt;Máy sử dụng pin giúp người sử dụng dễ dàng di chuyển trong nhiều không gian&lt;/li&gt;\r\n	&lt;li&gt;Dễ dàng bảo quản và vệ sinh sản phẩm.&lt;/li&gt;\r\n	&lt;li&gt;Tích hợp đèn LED giúp bạn hoạt động và làm việc tại góc hẹp hoặc những nơi không có ánh sáng.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', 'Máy hút bụi dùng pin(12v Max) Makita CL108FDSYW', 'CL108FDSYW', 2981000, 9, 2710000, 2, 'banchay,khuyenmai,hot,noibat,hienthi,moi', 'san-pham', 1669127697, 1669133285, 12),
(35, 3, 84, 't200-6-4257.jpg', 'kem-rang-6in150mm-truper-t200-6-17306', '&lt;p&gt;Kềm răng 6in/150mm Truper T200-6 là sản phẩm được khách hàng các nước trên thế giới nói chung và Việt Nam nói riêng tin dùng. Truper là ông lớn trong lĩnh vực sản xuất dụng cụ cầm tay, đồ nghề của Mexico và thế giới. Sản phẩm của thương hiệu này được gia công, chế tác, lắp ráp trên dây chuyền công nghệ hiện đại và được kiểm tra chặt chẽ, kỹ lưỡng về chất lượng trước khi phân phối, bán trên thị trường. Hiện nay, các dụng cụ cầm tay, đồ nghề của Truper sản xuất được nhiều khách khắp nơi trên thế giới ưa chuộng, đáp ứng yêu cầu của những thị trường đòi hỏi khắt khe nhất như Mỹ.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Kềm răng 6in/150mm Truper T200-6&quot; data-lazy-src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/truper_17306_2_a895a44468af44489c58dc9c27611fe9-1.jpg&quot; data-was-processed=&quot;true&quot; src=&quot;https://dungcuvang.com/wp-content/uploads/2021/05/truper_17306_2_a895a44468af44489c58dc9c27611fe9-1.jpg&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Kềm răng 6in/150mm Truper T200-6 là một đồ nghề cần thiết trong mọi gia đình, nó ngoài tác dụng giữ chặt những vật dụng còn có thể được sử dụng để thể mở được nhiều kích thước bu lông bằng cách tăng đưa ra vào phần đầu của kềm.&lt;/p&gt;\r\n\r\n&lt;p&gt;Toàn bộ sản phẩm kềm răng 6in/150mm Truper T200-6 được chế tạo bằng thép hợp kim cao cấp giúp sản phẩm có độ cứng chắc và bền bỉ vượt trội. Tay cầm của dụng cụ này được bọc nhựa cao cấp và bọc cao su giúp người dùng có cảm giác êm tay khi sử dụng và không hề bị trơn trượt. Với môi trường sử dụng chủ yếu ở trong nhà, kềm răng 6in/150mm Truper T200-6 có độ bền cực tốt nếu khách hàng biết sử dụng và bảo quản đúng cách.&lt;/p&gt;\r\n', '&lt;p&gt;&lt;strong&gt;Đặc điểm nổi bật&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Truper là thương hiệu dụng cụ cầm tay và đồ nghề số 1 của Mexico và khu vực Nam Mỹ.&lt;/li&gt;\r\n	&lt;li&gt;Tay cầm chống trơn trượt được bọc lớp cao su mềm tạo cảm giác êm tay khi cầm sử dụng&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', 'Kềm răng 6in/150mm, Truper T200-6 - 17306', 'T200-6', 142000, 15, 120000, 1, 'banchay,hot,noibat,hienthi,moi', 'san-pham', 1669129270, 1669133255, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_product_cat`
--

CREATE TABLE `table_product_cat` (
  `id` int(11) NOT NULL,
  `id_list` int(11) DEFAULT 0,
  `slugvi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contentvi` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descvi` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namevi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numb` int(11) DEFAULT 0,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_created` int(11) DEFAULT 0,
  `date_updated` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `table_product_cat`
--

INSERT INTO `table_product_cat` (`id`, `id_list`, `slugvi`, `contentvi`, `descvi`, `namevi`, `photo`, `icon`, `numb`, `status`, `type`, `date_created`, `date_updated`) VALUES
(1, 1, 'may-khoan', '', '', 'Máy khoan', '2-1-100x100-9792.jpeg', '1untitled-19-2091.png', 1, 'hienthi,header', 'san-pham', 1668946819, 1669109407),
(2, 1, 'may-mai', '', '', 'Máy  mài', 'may-mai-goc-100x100-7838.jpeg', NULL, 2, 'hienthi', 'san-pham', 1668946854, 1668952824),
(3, 1, 'may-cua', '', '', 'Máy  cưa', 'cuaxichacz-100x100-2307.png', '111untitled-19-1161.png', 3, 'hienthi,header', 'san-pham', 1668946866, 1669109933),
(4, 1, 'may-cat', '', '', 'Máy  cắt', 'may-cat-sat-oshima-modos2-5-100x100-4720.png', NULL, 4, 'hienthi', 'san-pham', 1668946880, 1668952862),
(5, 2, 'may-dung-pin-khong-choi-than', '', '', 'Máy dùng pin không chổi than', 'may-khong-choi-than-100x100-6106.jpeg', '1untitled-19-4104.png', 1, 'hienthi', 'san-pham', 1668947201, 1669109099),
(6, 2, 'ao-khoac-dung-pin', '', '', 'Áo khoác dùng pin', 'untitled-4-8012.png', NULL, 2, 'hienthi', 'san-pham', 1668947212, 1668952552),
(7, 2, 'bo-san-pham-dung-pin', '', '', 'Bộ sản phẩm dùng pin', '42-100x100-1140.jpeg', NULL, 3, 'hienthi', 'san-pham', 1668947235, 1668953048),
(8, 2, 'may-bao-dung-pin', '', '', 'Máy bào dùng pin', 'bao-pin-100x100-2421.jpeg', '111untitled-19-3318.png', 4, 'hienthi,header', 'san-pham', 1668947259, 1669109059),
(10, 2, 'may-cat-co-dung-pin', '', '', 'Máy cắt cỏ dùng pin', 'dur182lrf-1-100x100-8648.jpeg', '111untitled-19-5255.png', 5, 'hienthi', 'san-pham', 1668947323, 1669109114),
(11, 2, 'may-cat-tia-hang-rao-dung-pin', '', '', 'Máy cắt tỉa hàng rào dùng pin', 'may-tia-hang-rao-dung-pin-makita-buh550z-1-100x100-1-8155.png', NULL, 6, 'hienthi', 'san-pham', 1668947341, 1668953131),
(12, 2, 'may-cha-nham-danh-bong-dung-pin', '', '', 'Máy chà nhám - đánh bóng dùng pin', '55-100x100-8936.jpeg', NULL, 7, 'hienthi', 'san-pham', 1668947360, 1668953151),
(13, 2, 'may-hut-bui-dung-pin', '', '', 'Máy hút bụi dùng pin', 'may-hut-bui-dung-pin-makita-dvc261z-100x100-6604.png', NULL, 8, 'hienthi', 'san-pham', 1668947380, 1668953176),
(14, 2, 'may-khac-dung-pin', '', '', 'Máy khác dùng pin', '43-100x100-1883.jpeg', NULL, 9, 'hienthi', 'san-pham', 1668947419, 1668953194),
(15, 2, 'may-phay-dung-pin', '', '', 'Máy phay dùng pin', '41-100x100-3261.jpeg', NULL, 10, 'hienthi', 'san-pham', 1668947434, 1668953219),
(16, 2, 'may-siet-bu-long-dung-pin', '', '', 'Máy siết bu lông dùng pin', 'may-siet-bulong-dung-pin-dewalt-dcf902n-12v-chua-kem-pin-sac-1602748731-100x100-2142.png', NULL, 11, 'hienthi', 'san-pham', 1668947447, 1668952733),
(17, 2, 'may-thoi-dung-pin', '', '', 'Máy thổi dùng pin', 'may-thoi-la-bui-dung-pin-18v-makita-dub184z-1583396876-100x100-5186.jpeg', NULL, 12, 'hienthi', 'san-pham', 1668947461, 1668953237),
(18, 2, 'may-van-vit-dung-pin', '', '', 'Máy vặn vít dùng pin', '45-100x100-6557.jpeg', NULL, 13, 'hienthi', 'san-pham', 1668947475, 1668953255),
(19, 2, 'thiet-bi-khac-dung-pin', '', '', 'Thiết bị khác dùng pin', 'p543-1-100x100-7054.png', NULL, 14, 'hienthi', 'san-pham', 1668947496, 1668953277),
(20, 2, 'phu-kien-pin-bo-sac', '', '', 'Phụ kiện pin &amp; bộ sạc', 'phu-kien-pin-va-bo-sac-6068.png', NULL, 15, 'hienthi', 'san-pham', 1668947524, 1668953309),
(21, 4, 'dong-co-xang', '', '', 'Động cơ xăng', '', NULL, 1, 'hienthi', 'san-pham', 1668947578, 0),
(22, 4, 'may-cua-canh-tren-cao-chay-xang', '', '', 'Máy cưa cành trên cao chạy xăng', '', NULL, 2, 'hienthi', 'san-pham', 1668947594, 0),
(23, 4, 'may-thoi-chay-xang', '', '', 'Máy thổi chạy xăng', '', NULL, 3, 'hienthi', 'san-pham', 1668947606, 0),
(24, 4, 'may-phat-dien-dung-xang', '', '', 'Máy phát điện dùng xăng', '', NULL, 4, 'hienthi', 'san-pham', 1668947620, 0),
(25, 4, 'may-bom-nuoc-dung-xang', '', '', 'Máy bơm nước dùng xăng', '', NULL, 5, 'hienthi', 'san-pham', 1668947635, 0),
(26, 4, 'may-cat-be-tong-chay-xang', '', '', 'Máy cắt bê tông chạy xăng', '', NULL, 6, 'hienthi', 'san-pham', 1668947694, 0),
(27, 4, 'may-cua-xich-chay-xang', '', '', 'Máy cưa xích chạy xăng', '', NULL, 7, 'hienthi', 'san-pham', 1668947761, 0),
(28, 4, 'may-duc-chay-xang', '', '', 'Máy đục chạy xăng', '', NULL, 8, 'hienthi', 'san-pham', 1668947851, 0),
(29, 4, 'may-khac-dung-xang', '', '', 'Máy khác dùng xăng', '', NULL, 9, 'hienthi', 'san-pham', 1668947878, 0),
(30, 4, 'may-phun-thuoc-chay-xang', '', '', 'Máy phun thuốc chạy xăng', '', NULL, 10, 'hienthi', 'san-pham', 1668947893, 0),
(31, 4, 'may-tia-hang-rao-chay-xang', '', '', 'Máy tỉa hàng rào chạy xăng', '', NULL, 11, 'hienthi', 'san-pham', 1668947913, 0),
(32, 4, 'may-xoi-dat-chay-xang', '', '', 'Máy xới đất chạy xăng', '', NULL, 12, 'hienthi', 'san-pham', 1668947928, 0),
(33, 3, 'luc-giac-cac-loai', '', '', 'Lục giác các loại', '', NULL, 1, 'hienthi', 'san-pham', 1668948053, 0),
(34, 3, 'dao-keo-dung-cu-cat', '', '', 'Dao - Kéo - Dụng cụ cắt', '', NULL, 2, 'hienthi', 'san-pham', 1668948074, 0),
(35, 3, 'dung-cu-son', '', '', 'Dụng cụ sơn', '', NULL, 3, 'hienthi', 'san-pham', 1668948090, 0),
(36, 3, 'thuoc-do', '', '', 'Thước đo', '', NULL, 4, 'hienthi', 'san-pham', 1668948104, 0),
(37, 3, 'but-thu-dien', '', '', 'Bút thử điện', '', NULL, 5, 'hienthi', 'san-pham', 1668948117, 0),
(38, 3, 'tuoc-no-vit', '', '', 'Tuốc nơ vít', '', NULL, 6, 'hienthi', 'san-pham', 1668948131, 0),
(39, 3, 'can-siet-can-tuyp', '', '', 'Cần siết - Cần tuýp', '', NULL, 7, 'hienthi', 'san-pham', 1668948149, 0),
(40, 3, 'bo-dung-cu', '', '', 'Bộ dụng cụ', '', NULL, 8, 'hienthi', 'san-pham', 1668948175, 0),
(41, 3, 'co-le-bo-co-le', '', '', 'Cờ lê - bộ cờ lê', '', NULL, 9, 'hienthi', 'san-pham', 1668948188, 0),
(42, 3, 'bua-cam-tay', '', '', 'Búa cầm tay', '', NULL, 10, 'hienthi', 'san-pham', 1668948209, 0),
(43, 3, 'cua-cam-tay', '', '', 'Cưa cầm tay', '', NULL, 11, 'hienthi', 'san-pham', 1668948255, 0),
(44, 3, 'de-tan-dinh', '', '', 'Đe tán đinh', '', NULL, 12, 'hienthi', 'san-pham', 1668948279, 0),
(45, 3, 'do-bao-ho', '', '', 'Đồ bảo hộ', '', NULL, 13, 'hienthi', 'san-pham', 1668948293, 0),
(46, 3, 'do-nghe-khac', '', '', 'Đồ nghề khác', '', NULL, 14, 'hienthi', 'san-pham', 1668948306, 0),
(47, 3, 'dua-cac-loai', '', '', 'Dũa các loại', '', NULL, 15, 'hienthi', 'san-pham', 1668948331, 0),
(48, 3, 'dung-cu-cach-dien', '', '', 'Dụng cụ cách điện', '', NULL, 16, 'hienthi', 'san-pham', 1668948346, 0),
(49, 3, 'dung-cu-duc-lo-taro', '', '', 'Dụng cụ đục lỗ - taro', '', NULL, 17, 'hienthi', 'san-pham', 1668948359, 0),
(50, 3, 'e-to-cao-cac-loai', '', '', 'Ê tô - cảo các loại', '', NULL, 18, 'hienthi', 'san-pham', 1668948371, 0),
(51, 3, 'mo-let-rang', '', '', 'Mỏ lết răng', '', NULL, 19, 'hienthi', 'san-pham', 1668948384, 0),
(52, 3, 'dung-cu-dung-do-nghe', '', '', 'Dụng cụ đựng đồ nghề', '', NULL, 20, 'hienthi', 'san-pham', 1668948398, 0),
(53, 3, 'xa-beng-can-nay', '', '', 'Xà beng cần nạy', '', NULL, 21, 'hienthi', 'san-pham', 1668948410, 0),
(54, 9, 'ampe-kim', '', '', 'Ampe kìm', '', NULL, 1, 'hienthi', 'san-pham', 1668948526, 0),
(55, 9, 'dong-ho-do-van-nang', '', '', 'Đồng hồ đo vạn năng', '', NULL, 2, 'hienthi', 'san-pham', 1668948540, 0),
(56, 9, 'dong-ho-do-dien-tro-cach-dien', '', '', 'Đồng hồ đo điện trở cách điện', '', NULL, 3, 'hienthi', 'san-pham', 1668948556, 0),
(57, 9, 'dong-ho-do-dien-tro-tiep-dat', '', '', 'Đồng hồ đo điện trở tiếp đất', '', NULL, 4, 'hienthi', 'san-pham', 1668948572, 0),
(58, 9, 'may-do-khoang-cach-laser', '', '', 'Máy đo khoảng cách laser', '', NULL, 5, 'hienthi', 'san-pham', 1668948587, 0),
(59, 9, 'may-do-nhiet-do', '', '', 'Máy đo nhiệt độ', '', NULL, 6, 'hienthi', 'san-pham', 1668948605, 0),
(60, 9, 'may-do-do-am', '', '', 'Máy đo độ ẩm', '', NULL, 7, 'hienthi', 'san-pham', 1668948624, 0),
(61, 9, 'may-can-bang-laser', '', '', 'Máy cân bằng laser', '', NULL, 8, 'hienthi', 'san-pham', 1668948640, 0),
(62, 11, 'thang', '', '', 'Thang', '', NULL, 1, 'hienthi', 'san-pham', 1668948686, 0),
(63, 11, 'khoa-o-khoa', '', '', 'Khóa - ổ khóa', '', NULL, 2, 'hienthi', 'san-pham', 1668948710, 0),
(64, 11, 'ban-cat-gach', '', '', 'Bàn cắt gạch', '', NULL, 3, 'hienthi', 'san-pham', 1668948725, 0),
(65, 11, 'xe-day-xe-nang', '', '', 'Xe Đẩy - Xe Nâng', '', NULL, 4, 'hienthi', 'san-pham', 1668948741, 0),
(66, 11, 'pa-lang-xich', '', '', 'Pa lăng xích', '', NULL, 5, 'hienthi', 'san-pham', 1668948764, 0),
(67, 11, 'con-doi', '', '', 'Con đội', '', NULL, 6, 'hienthi', 'san-pham', 1668948779, 0),
(68, 11, 'thiet-bi-chieu-sang', '', '', 'Thiết bị chiếu sáng', '', NULL, 7, 'hienthi', 'san-pham', 1668948797, 0),
(69, 11, 'thiet-bi-dung-cu-san-vuon', '', '', ' Thiết bị - Dụng cụ sân vườn', '', NULL, 8, 'hienthi', 'san-pham', 1668948817, 0),
(70, 11, 'dung-cu-khac', '', '', 'Dụng cụ khác', '', NULL, 9, 'hienthi', 'san-pham', 1668948834, 0),
(71, 10, 'bo-mui', '', '', 'Bộ mũi', '', NULL, 1, 'hienthi', 'san-pham', 1668948855, 0),
(72, 10, 'mui-khoan-cac-loai', '', '', 'Mũi khoan các loại', '', NULL, 2, 'hienthi', 'san-pham', 1668948897, 0),
(73, 10, 'mui-van-vit-ban-ton', '', '', 'Mũi vặn vít - bắn tôn', '', NULL, 3, 'hienthi', 'san-pham', 1668948913, 0),
(74, 10, 'mui-duc-be-tong', '', '', 'Mũi đục bê tông', '', NULL, 4, 'hienthi', 'san-pham', 1668948942, 0),
(75, 10, 'dau-tuyp-cac-loai', '', '', 'Đầu tuýp các loại', '', NULL, 5, 'hienthi', 'san-pham', 1668948969, 0),
(76, 10, 'da-mai-da-cat', '', '', 'Đá mài - đá cắt', '', NULL, 6, 'hienthi', 'san-pham', 1668948995, 0),
(77, 11, 'dia-cat-gach-be-tong', '', '', 'Đĩa cắt gạch - bê tông', '', NULL, 1, 'hienthi', 'san-pham', 1668949012, 0),
(78, 10, 'luoi-cua', '', '', 'Lưỡi cưa', '', NULL, 7, 'hienthi', 'san-pham', 1668949023, 0),
(79, 10, 'choi-danh-set-cha-nham', '', '', 'Chổi đánh sét - chà nhám', '', NULL, 8, 'hienthi', 'san-pham', 1668949045, 0),
(80, 10, 'cac-loai-phu-kien-khac', '', '', 'Các loại phụ kiện khác', '', NULL, 9, 'hienthi', 'san-pham', 1668949060, 0),
(81, 10, 'phu-tung', '', '', 'Phụ tùng', '', NULL, 10, 'hienthi', 'san-pham', 1668949110, 0),
(82, 2, 'may-khoan-pin', '', '', 'Máy Khoan Pin', '48-100x100-3515.jpeg', '1untitled-19-5662.png', 1, 'header,hienthi', 'san-pham', 1668952664, 1669108996),
(83, 1, 'may-thoi-nong', '', '', 'Máy thổi nóng', '', '', 5, 'hienthi', 'san-pham', 1669116309, 0),
(84, 3, 'kem', '', '', 'Kềm', '', '', 1, 'hienthi', 'san-pham', 1669129366, 1669131795);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_product_list`
--

CREATE TABLE `table_product_list` (
  `id` int(11) NOT NULL,
  `slugvi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contentvi` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descvi` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namevi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numb` int(11) DEFAULT 0,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_created` int(11) DEFAULT 0,
  `date_updated` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `table_product_list`
--

INSERT INTO `table_product_list` (`id`, `slugvi`, `contentvi`, `descvi`, `namevi`, `photo`, `icon`, `numb`, `status`, `type`, `date_created`, `date_updated`) VALUES
(1, 'dung-cu-dien', '&lt;p&gt;&lt;strong&gt;Dụng cụ điện cầm tay&lt;/strong&gt; là những máy móc chạy bằng điện được thiết kế nhằm mục đích giúp đỡ con người trong các công việc xây dựng công trình, công nghiệp cơ khí, chế tạo và gia công, sửa chữa lắp đặt đồ dùng nhà cửa, máy móc,…&lt;/p&gt;\r\n\r\n&lt;h2&gt;1. Đặc điểm của dụng cụ điện cầm tay&lt;/h2&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Dụng cụ điện cầm tay&lt;/strong&gt; là thiết bị không thể thiếu phục vụ nhiều nhu cầu của con người ngày nay, gồm nhiều sản phẩm: máy khoan cầm tay, máy mài, máy bắt ốc vít, máy phay, máy chà nhám, máy đánh bóng,… Ưu điểm của các thiết bị này là:&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Thiết kế của &lt;strong&gt;thiết bị điện cầm tay &lt;/strong&gt;thường nhỏ gọn, dễ dàng cho cả người không chuyên sử dụng.&lt;/li&gt;\r\n	&lt;li&gt;Công suất mạnh mẽ giúp người dùng hoàn thành công việc nhanh chóng.&lt;/li&gt;\r\n	&lt;li&gt;Thiết kế vỏ nhựa bọc bên ngoài mang lại cảm giác an toàn cho người dùng.&lt;/li&gt;\r\n	&lt;li&gt;Có thể sử dụng trong nhiều mục đích như gia đình hoặc xây dựng, công nghiệp.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;h2&gt;2. Bảng giá thiết bị điện cầm tay tại Dụng Cụ Số 1&lt;/h2&gt;\r\n\r\n&lt;table border=&quot;1&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; dir=&quot;ltr&quot; style=&quot;width: 100%;&quot; width=&quot;456&quot;&gt;\r\n	&lt;colgroup&gt;\r\n		&lt;col width=&quot;209&quot; /&gt;\r\n		&lt;col width=&quot;100&quot; /&gt;\r\n	&lt;/colgroup&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr&gt;\r\n			&lt;td data-sheets-value=&quot;{&quot; style=&quot;text-align: center;&quot;&gt;&lt;strong&gt;Dụng cụ điện cầm tay&lt;/strong&gt;&lt;/td&gt;\r\n			&lt;td data-sheets-value=&quot;{&quot; style=&quot;text-align: center;&quot;&gt;&lt;strong&gt;Giá thành&lt;/strong&gt;&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td data-sheets-value=&quot;{&quot; style=&quot;text-align: center;&quot;&gt;Bộ 11 dụng cụ điện cầm tay Total THKTV02H111&lt;/td&gt;\r\n			&lt;td data-sheets-numberformat=&quot;{&quot; data-sheets-value=&quot;{&quot; style=&quot;text-align: center;&quot;&gt;408.000VND&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td data-sheets-value=&quot;{&quot; style=&quot;text-align: center;&quot;&gt;Thiết bị điện cầm tay Vimax D10/450W&lt;/td&gt;\r\n			&lt;td data-sheets-numberformat=&quot;{&quot; data-sheets-value=&quot;{&quot; style=&quot;text-align: center;&quot;&gt;437.000VND&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td data-sheets-value=&quot;{&quot; style=&quot;text-align: center;&quot;&gt;Bộ dụng cụ điện cầm tay 25 chi tiết INGCO HKTH10258&lt;/td&gt;\r\n			&lt;td data-sheets-numberformat=&quot;{&quot; data-sheets-value=&quot;{&quot; style=&quot;text-align: center;&quot;&gt;482.000VND&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td data-sheets-value=&quot;{&quot; style=&quot;text-align: center;&quot;&gt;Thiết bị điện cầm tay DCA AJZ07-10&lt;/td&gt;\r\n			&lt;td data-sheets-numberformat=&quot;{&quot; data-sheets-value=&quot;{&quot; style=&quot;text-align: center;&quot;&gt;652.000VND&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td data-sheets-value=&quot;{&quot; style=&quot;text-align: center;&quot; title=&quot;&quot;&gt;Bộ dụng cụ điện cầm tay Kachi có cưa đĩa mài MK89&lt;/td&gt;\r\n			&lt;td data-sheets-numberformat=&quot;{&quot; data-sheets-value=&quot;{&quot; style=&quot;text-align: center;&quot;&gt;799.000VND&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td data-sheets-value=&quot;{&quot; style=&quot;text-align: center;&quot;&gt;Thiết bị điện cầm tay 500w DCA AMB82&lt;/td&gt;\r\n			&lt;td data-sheets-numberformat=&quot;{&quot; data-sheets-value=&quot;{&quot; style=&quot;text-align: center;&quot;&gt;809.000VND&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td data-sheets-value=&quot;{&quot; style=&quot;text-align: center;&quot;&gt;Dụng cụ điện cầm tay Stanley SDH700K-B1&lt;/td&gt;\r\n			&lt;td data-sheets-numberformat=&quot;{&quot; data-sheets-value=&quot;{&quot; style=&quot;text-align: center;&quot;&gt;950.000VND&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td data-sheets-value=&quot;{&quot; style=&quot;text-align: center;&quot;&gt;Bộ 120 món dụng cụ điện cầm tay INGCO HKTHP21201&lt;/td&gt;\r\n			&lt;td data-sheets-numberformat=&quot;{&quot; data-sheets-value=&quot;{&quot; style=&quot;text-align: center;&quot;&gt;990.000VND&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td data-sheets-value=&quot;{&quot; style=&quot;text-align: center;&quot;&gt;Thiết bị điện cầm tay 3 tay cầm FEG EG-5116&lt;/td&gt;\r\n			&lt;td data-sheets-numberformat=&quot;{&quot; data-sheets-value=&quot;{&quot; style=&quot;text-align: center;&quot;&gt;1.000.000VND&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td data-sheets-value=&quot;{&quot; style=&quot;text-align: center;&quot;&gt;Thiết bị điện cầm tay Dewalt DWE8100T&lt;/td&gt;\r\n			&lt;td data-sheets-numberformat=&quot;{&quot; data-sheets-value=&quot;{&quot; style=&quot;text-align: center;&quot;&gt;1.000.000VND&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td data-sheets-value=&quot;{&quot; style=&quot;text-align: center;&quot;&gt;BỘ 130 dụng cụ điện cầm tay TOTAL THKTHP21306&lt;/td&gt;\r\n			&lt;td data-sheets-numberformat=&quot;{&quot; data-sheets-value=&quot;{&quot; style=&quot;text-align: center;&quot;&gt;1.020.000VND&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td data-sheets-value=&quot;{&quot; style=&quot;text-align: center;&quot;&gt;Thiết bị điện cầm tay Stanley SDH 600KV&lt;/td&gt;\r\n			&lt;td data-sheets-numberformat=&quot;{&quot; data-sheets-value=&quot;{&quot; style=&quot;text-align: center;&quot;&gt;1.150.000VND&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td data-sheets-value=&quot;{&quot; style=&quot;text-align: center;&quot;&gt;Thiết bị điện cầm tay Bosch GGS 3000 L&lt;/td&gt;\r\n			&lt;td data-sheets-numberformat=&quot;{&quot; data-sheets-value=&quot;{&quot; style=&quot;text-align: center;&quot;&gt;1.450.000VND&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td data-sheets-value=&quot;{&quot; style=&quot;text-align: center;&quot;&gt;Bộ dụng cụ điện cầm tay Bosch GSB 16 RE&lt;/td&gt;\r\n			&lt;td data-sheets-numberformat=&quot;{&quot; data-sheets-value=&quot;{&quot; style=&quot;text-align: center;&quot;&gt;1.550.000VND&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td data-sheets-value=&quot;{&quot; style=&quot;text-align: center;&quot;&gt;Thiết bị điện cầm tay 3 chức năng KHE 2442 61813600&lt;/td&gt;\r\n			&lt;td data-sheets-numberformat=&quot;{&quot; data-sheets-value=&quot;{&quot; style=&quot;text-align: center;&quot;&gt;6.205.100VND&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n\r\n&lt;h2&gt; &lt;/h2&gt;\r\n\r\n&lt;h2&gt;3. Địa chỉ mua dụng cụ điện cầm tay chính hãng giá tốt tại TP. HCM&lt;/h2&gt;\r\n\r\n&lt;p&gt;Dụng Cụ Số 1 là nhà phân phối chính hãng của các &lt;strong&gt;dụng cụ thiết bị điện cầm tay&lt;/strong&gt; danh tiếng như Bosch, Makita, FEG, Stanley, Black and Decker, Total, Dewalt,… Giá bán các thiết bị luôn ở mức hấp dẫn với nhiều khuyến mãi, chiết khấu ưu đãi dành cho mọi khách hàng.&lt;/p&gt;\r\n\r\n&lt;p&gt;Ngoài ra hình thức bán hàng online tạo sự thuận tiện cho những khách hàng ở xa, hỗ trợ giao hàng tận nhà tiết kiệm và nhanh chóng. Đội ngũ nhân viên có kinh nghiệm kỹ thuật chuyên sâu nhiệt tình hỗ trợ khách hàng giải đáp mọi thắc mắc. Hãy đến Dụng Cụ Số 1 để mua &lt;strong&gt;dụng cụ điện cầm tay chính hãng&lt;/strong&gt; giá rẻ bạn nhé.&lt;/p&gt;\r\n', '', 'Dụng cụ điện', 'anh-chup-man-hinh-2022-11-20-luc-132307-3000.png', '16-100x100-5795.jpeg', 1, 'noibat,hienthi', 'san-pham', 1668946610, 1669196100),
(2, 'dung-cu-pin', '', '', 'Dụng cụ pin', 'anh-chup-man-hinh-2022-11-20-luc-132318-9741.png', '17-100x100-8701.jpeg', 2, 'header,noibat,hienthi', 'san-pham', 1668946647, 1669014708),
(3, 'dung-cu-cam-tay-do-nghe', '', '', 'Dụng cụ cầm tay - đồ nghề', '', '15-100x100-2253.jpeg', 5, 'header,hienthi', 'san-pham', 1668946661, 1668950790),
(4, 'dung-cu-xang', '', '', 'Dụng cụ xăng', '157613880127-9956.jpg', '18-100x100-7274.jpeg', 3, 'noibat,hienthi', 'san-pham', 1668946671, 1669188732),
(5, 'dung-cu-khi-nen', '', '', 'Dụng cụ khí nén', '', '4-1-100x100-4922.jpeg', 4, 'header,hienthi', 'san-pham', 1668946686, 1668950752),
(6, 'dung-cu-xit-rua-hut-bui', '', '', 'Dụng cụ xịt rửa - hút bụi', '', '19-100x100-6676.jpeg', 7, 'header,hienthi', 'san-pham', 1668946697, 1668950821),
(7, 'mo-to-keo-may-bom-nuoc', '', '', 'Mô tơ kéo - máy bơm nước', '', '9-1-100x100-9897.jpeg', 8, 'header,hienthi', 'san-pham', 1668946708, 1668950829),
(8, 'thiet-bi-nganh-han', '', '', 'Thiết bị ngành hàn', '', '8-1-100x100-2688.jpeg', 9, 'header,hienthi', 'san-pham', 1668946726, 1668950851),
(9, 'thiet-bi-do', '', '', 'Thiết bị đo', '', '7-1-100x100-1651.jpeg', 6, 'header,hienthi', 'san-pham', 1668946737, 1668950798),
(10, 'phu-tung-va-phu-kien', '', '', 'Phụ tùng và phụ kiện', '', '10-1-100x100-6341.jpeg', 11, 'header,hienthi', 'san-pham', 1668946752, 1668950881),
(11, 'thiet-bi-dung-cu-khac', '', '', 'Thiết bị - Dụng cụ khác', '', '22-100x100-5319.jpeg', 10, 'header,hienthi', 'san-pham', 1668946762, 1668950858);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_setting`
--

CREATE TABLE `table_setting` (
  `id` int(11) NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namevi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `table_setting`
--

INSERT INTO `table_setting` (`id`, `options`, `namevi`) VALUES
(1, '{\"address\":\"223\\/6 L\\u00ea T\\u1ea5n B\\u00ea, KP2, P. An L\\u1ea1c, Qu\\u1eadn B\\u00ecnh T\\u00e2n, TP.HCM\",\"email\":\"sale.dungcuso1@gmail.com\",\"hotline\":\"0908770279\",\"phone\":\"0963289290\",\"zalo\":\"0908770279\",\"oaidzalo\":\"\",\"website\":\"https:\\/\\/dungcuso1.vn\\/\",\"fanpage\":\"https:\\/\\/www.facebook.com\\/dungcuso01.vn\",\"coords\":\"\",\"linkmap\":\"\",\"coords_iframe\":\"\"}', 'Dụng Cụ Số 1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_static`
--

CREATE TABLE `table_static` (
  `id` int(11) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slugvi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contentvi` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descvi` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namevi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_created` int(11) DEFAULT 0,
  `date_updated` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `table_static`
--

INSERT INTO `table_static` (`id`, `photo`, `slugvi`, `contentvi`, `descvi`, `namevi`, `type`, `status`, `date_created`, `date_updated`) VALUES
(1, '', '34495e', '', '', '34495e', 'color1', 'hienthi', 1668785284, 0),
(2, '', '27589a', '', '', '27589a', 'color2', 'hienthi', 1668785301, 0),
(3, '', '34495e', '', '', '34495e', 'color3', 'hienthi', 1668785314, 1669112151),
(4, '', 'cty-tnhh-dich-vu-cong-nghe-duc-khang', '&lt;p&gt;&lt;span style=&quot;line-height:2;&quot;&gt;&lt;img alt=&quot;&quot; src=&quot;http://demo42.ninavietnam.com.vn/T11_2022/duckhang_2014322w/upload/filemanager/1.png&quot; style=&quot;width: 25px; height: 25px;&quot; /&gt; Địa Chỉ: 223/6 Lê Tấn Bê, KP2, P. An Lạc, Quận Bình Tân, TP.HCM&lt;br /&gt;\r\n&lt;img alt=&quot;&quot; src=&quot;http://demo42.ninavietnam.com.vn/T11_2022/duckhang_2014322w/upload/filemanager/11.png&quot; style=&quot;width: 25px; height: 25px;&quot; /&gt; Hotline: 028 73 08 65 68&lt;br /&gt;\r\n&lt;img alt=&quot;&quot; src=&quot;http://demo42.ninavietnam.com.vn/T11_2022/duckhang_2014322w/upload/filemanager/11.png&quot; style=&quot;width: 25px; height: 25px;&quot; /&gt; Hotline: 0908.464.552 - 0908.770.279 - 0963.289.290&lt;br /&gt;\r\n&lt;img alt=&quot;&quot; src=&quot;http://demo42.ninavietnam.com.vn/T11_2022/duckhang_2014322w/upload/filemanager/12.png&quot; style=&quot;width: 25px; height: 25px;&quot; /&gt; Mail: duckhang.tsc@gmail.com&lt;br /&gt;\r\n&lt;img alt=&quot;&quot; src=&quot;http://demo42.ninavietnam.com.vn/T11_2022/duckhang_2014322w/upload/filemanager/13.png&quot; style=&quot;width: 25px; height: 25px;&quot; /&gt; Web: dungcuso1.vn&lt;/span&gt;&lt;/p&gt;\r\n', '', 'CTY TNHH DỊCH VỤ CÔNG NGHỆ ĐỨC KHANG', 'footer', 'hienthi', 1668953504, 1669193507),
(5, '', '', '&lt;p&gt;&lt;span style=&quot;color:#e74c3c;&quot;&gt;&lt;strong&gt;&lt;span style=&quot;font-size:18px;&quot;&gt;&lt;span style=&quot;line-height:2;&quot;&gt;CTY TNHH DỊCH VỤ CÔNG NGHỆ ĐỨC KHANG&lt;/span&gt;&lt;/span&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;span style=&quot;line-height:2;&quot;&gt;&lt;span style=&quot;font-size:14px;&quot;&gt;Địa  chỉ: 223/6 Lê Tấn Bê, KP2, P. An Lạc, Quận Bình Tân, TP.HCM&lt;br /&gt;\r\nFaxx: 028 73 08 65 68&lt;br /&gt;\r\nHotlinee: 0908.464.552 - 0908.770.279 - 0963.289.290&lt;br /&gt;\r\nEmaill: duckhang.tsc@gmail.com&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n', '', '', 'lienhe', 'hienthi', 1668953515, 1668953986),
(6, '', '', '&lt;p&gt;&lt;strong&gt;Dụng cụ điện cầm tay&lt;/strong&gt; là những máy móc chạy bằng điện được thiết kế nhằm mục đích giúp đỡ con người trong các công việc xây dựng công trình, công nghiệp cơ khí, chế tạo và gia công, sửa chữa lắp đặt đồ dùng nhà cửa, máy móc,…&lt;/p&gt;\r\n\r\n&lt;h2&gt;1. Đặc điểm của dụng cụ điện cầm tay&lt;/h2&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Dụng cụ điện cầm tay&lt;/strong&gt; là thiết bị không thể thiếu phục vụ nhiều nhu cầu của con người ngày nay, gồm nhiều sản phẩm: máy khoan cầm tay, máy mài, máy bắt ốc vít, máy phay, máy chà nhám, máy đánh bóng,… Ưu điểm của các thiết bị này là:&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Thiết kế của &lt;strong&gt;thiết bị điện cầm tay &lt;/strong&gt;thường nhỏ gọn, dễ dàng cho cả người không chuyên sử dụng.&lt;/li&gt;\r\n	&lt;li&gt;Công suất mạnh mẽ giúp người dùng hoàn thành công việc nhanh chóng.&lt;/li&gt;\r\n	&lt;li&gt;Thiết kế vỏ nhựa bọc bên ngoài mang lại cảm giác an toàn cho người dùng.&lt;/li&gt;\r\n	&lt;li&gt;Có thể sử dụng trong nhiều mục đích như gia đình hoặc xây dựng, công nghiệp.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;h2&gt;2. Bảng giá thiết bị điện cầm tay tại Dụng Cụ Số 1&lt;/h2&gt;\r\n\r\n&lt;table border=&quot;1&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; dir=&quot;ltr&quot; style=&quot;width:100%;&quot; width=&quot;456&quot;&gt;\r\n	&lt;colgroup&gt;\r\n		&lt;col width=&quot;209&quot; /&gt;\r\n		&lt;col width=&quot;100&quot; /&gt;\r\n	&lt;/colgroup&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr&gt;\r\n			&lt;td data-sheets-value=&quot;{&quot;&gt;&lt;strong&gt;Dụng cụ điện cầm tay&lt;/strong&gt;&lt;/td&gt;\r\n			&lt;td data-sheets-value=&quot;{&quot;&gt;&lt;strong&gt;Giá thành&lt;/strong&gt;&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td data-sheets-value=&quot;{&quot;&gt;Bộ 11 dụng cụ điện cầm tay Total THKTV02H111&lt;/td&gt;\r\n			&lt;td data-sheets-numberformat=&quot;{&quot; data-sheets-value=&quot;{&quot;&gt;408.000VND&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td data-sheets-value=&quot;{&quot;&gt;Thiết bị điện cầm tay Vimax D10/450W&lt;/td&gt;\r\n			&lt;td data-sheets-numberformat=&quot;{&quot; data-sheets-value=&quot;{&quot;&gt;437.000VND&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td data-sheets-value=&quot;{&quot;&gt;Bộ dụng cụ điện cầm tay 25 chi tiết INGCO HKTH10258&lt;/td&gt;\r\n			&lt;td data-sheets-numberformat=&quot;{&quot; data-sheets-value=&quot;{&quot;&gt;482.000VND&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td data-sheets-value=&quot;{&quot;&gt;Thiết bị điện cầm tay DCA AJZ07-10&lt;/td&gt;\r\n			&lt;td data-sheets-numberformat=&quot;{&quot; data-sheets-value=&quot;{&quot;&gt;652.000VND&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td data-sheets-value=&quot;{&quot; title=&quot;&quot;&gt;Bộ dụng cụ điện cầm tay Kachi có cưa đĩa mài MK89&lt;/td&gt;\r\n			&lt;td data-sheets-numberformat=&quot;{&quot; data-sheets-value=&quot;{&quot;&gt;799.000VND&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td data-sheets-value=&quot;{&quot;&gt;Thiết bị điện cầm tay 500w DCA AMB82&lt;/td&gt;\r\n			&lt;td data-sheets-numberformat=&quot;{&quot; data-sheets-value=&quot;{&quot;&gt;809.000VND&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td data-sheets-value=&quot;{&quot;&gt;Dụng cụ điện cầm tay Stanley SDH700K-B1&lt;/td&gt;\r\n			&lt;td data-sheets-numberformat=&quot;{&quot; data-sheets-value=&quot;{&quot;&gt;950.000VND&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td data-sheets-value=&quot;{&quot;&gt;Bộ 120 món dụng cụ điện cầm tay INGCO HKTHP21201&lt;/td&gt;\r\n			&lt;td data-sheets-numberformat=&quot;{&quot; data-sheets-value=&quot;{&quot;&gt;990.000VND&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td data-sheets-value=&quot;{&quot;&gt;Thiết bị điện cầm tay 3 tay cầm FEG EG-5116&lt;/td&gt;\r\n			&lt;td data-sheets-numberformat=&quot;{&quot; data-sheets-value=&quot;{&quot;&gt;1.000.000VND&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td data-sheets-value=&quot;{&quot;&gt;Thiết bị điện cầm tay Dewalt DWE8100T&lt;/td&gt;\r\n			&lt;td data-sheets-numberformat=&quot;{&quot; data-sheets-value=&quot;{&quot;&gt;1.000.000VND&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td data-sheets-value=&quot;{&quot;&gt;BỘ 130 dụng cụ điện cầm tay TOTAL THKTHP21306&lt;/td&gt;\r\n			&lt;td data-sheets-numberformat=&quot;{&quot; data-sheets-value=&quot;{&quot;&gt;1.020.000VND&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td data-sheets-value=&quot;{&quot;&gt;Thiết bị điện cầm tay Stanley SDH 600KV&lt;/td&gt;\r\n			&lt;td data-sheets-numberformat=&quot;{&quot; data-sheets-value=&quot;{&quot;&gt;1.150.000VND&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td data-sheets-value=&quot;{&quot;&gt;Thiết bị điện cầm tay Bosch GGS 3000 L&lt;/td&gt;\r\n			&lt;td data-sheets-numberformat=&quot;{&quot; data-sheets-value=&quot;{&quot;&gt;1.450.000VND&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td data-sheets-value=&quot;{&quot;&gt;Bộ dụng cụ điện cầm tay Bosch GSB 16 RE&lt;/td&gt;\r\n			&lt;td data-sheets-numberformat=&quot;{&quot; data-sheets-value=&quot;{&quot;&gt;1.550.000VND&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td data-sheets-value=&quot;{&quot;&gt;Thiết bị điện cầm tay 3 chức năng KHE 2442 61813600&lt;/td&gt;\r\n			&lt;td data-sheets-numberformat=&quot;{&quot; data-sheets-value=&quot;{&quot;&gt;6.205.100VND&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n\r\n&lt;h2&gt;3. Địa chỉ mua dụng cụ điện cầm tay chính hãng giá tốt tại TP. HCM&lt;/h2&gt;\r\n\r\n&lt;p&gt;Dụng Cụ Số 1 là nhà phân phối chính hãng của các &lt;strong&gt;dụng cụ thiết bị điện cầm tay&lt;/strong&gt; danh tiếng như Bosch, Makita, FEG, Stanley, Black and Decker, Total, Dewalt,… Giá bán các thiết bị luôn ở mức hấp dẫn với nhiều khuyến mãi, chiết khấu ưu đãi dành cho mọi khách hàng.&lt;/p&gt;\r\n\r\n&lt;p&gt;Ngoài ra hình thức bán hàng online tạo sự thuận tiện cho những khách hàng ở xa, hỗ trợ giao hàng tận nhà tiết kiệm và nhanh chóng. Đội ngũ nhân viên có kinh nghiệm kỹ thuật chuyên sâu nhiệt tình hỗ trợ khách hàng giải đáp mọi thắc mắc. Hãy đến Dụng Cụ Số 1 để mua &lt;strong&gt;dụng cụ điện cầm tay chính hãng&lt;/strong&gt; giá rẻ bạn nhé.&lt;/p&gt;\r\n', '', '', 'doyouknow', 'hienthi', 1668985166, 0),
(7, '', '34495e', '', '', '34495e', 'color4', 'hienthi', 1669013450, 0),
(8, '', 'd3041e', '', '', 'd3041e', 'color5', 'hienthi', 1669013797, 0),
(9, '', '34495e', '', '', '34495e', 'color6', 'hienthi', 1669013887, 0),
(10, '', '27589a', '', '', '27589a', 'color7', 'hienthi', 1669013894, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_user`
--

CREATE TABLE `table_user` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_permission` int(11) DEFAULT 0,
  `username` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirm_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fullname` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` tinyint(1) DEFAULT 0,
  `login_session` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastlogin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinyint(1) DEFAULT 1,
  `secret_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` int(11) DEFAULT 0,
  `numb` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `table_user`
--

INSERT INTO `table_user` (`id`, `id_permission`, `username`, `password`, `confirm_code`, `avatar`, `fullname`, `phone`, `email`, `address`, `gender`, `login_session`, `user_token`, `lastlogin`, `status`, `role`, `secret_key`, `birthday`, `numb`) VALUES
(1, 0, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', '', 'Administrator', '0939513667', 'admin@gmail.com', '222 huỳnh thị na', 1, '9d8510398d14c4230d978c6eea28ed86', '604fa7fa328a50307d8e3b58808b2ebb', '1679582672', 'hienthi', 3, '9d8510398d14c4230d978c6eea28ed86', 1608051600, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `table_news`
--
ALTER TABLE `table_news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_newsletter`
--
ALTER TABLE `table_newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_order`
--
ALTER TABLE `table_order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_order_detail`
--
ALTER TABLE `table_order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_photo`
--
ALTER TABLE `table_photo`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_product`
--
ALTER TABLE `table_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_product_cat`
--
ALTER TABLE `table_product_cat`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_product_list`
--
ALTER TABLE `table_product_list`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_setting`
--
ALTER TABLE `table_setting`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_static`
--
ALTER TABLE `table_static`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_user`
--
ALTER TABLE `table_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `table_news`
--
ALTER TABLE `table_news`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `table_newsletter`
--
ALTER TABLE `table_newsletter`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `table_order`
--
ALTER TABLE `table_order`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `table_order_detail`
--
ALTER TABLE `table_order_detail`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `table_photo`
--
ALTER TABLE `table_photo`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `table_product`
--
ALTER TABLE `table_product`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `table_product_cat`
--
ALTER TABLE `table_product_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT cho bảng `table_product_list`
--
ALTER TABLE `table_product_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `table_setting`
--
ALTER TABLE `table_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `table_static`
--
ALTER TABLE `table_static`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `table_user`
--
ALTER TABLE `table_user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
