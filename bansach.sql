-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 27, 2020 lúc 05:21 AM
-- Phiên bản máy phục vụ: 10.1.37-MariaDB
-- Phiên bản PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bansach`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `user_id` int(11) NOT NULL,
  `role` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '3',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `birthday` date NOT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `login_count` int(11) NOT NULL DEFAULT '0',
  `login_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`user_id`, `role`, `status`, `username`, `password`, `fullname`, `sex`, `birthday`, `phone`, `address`, `login_count`, `login_time`) VALUES
(1, '1', 1, 'admin', '0192023a7bbd73250516f069df18b500', 'Việt Vương123', 1, '1998-01-13', '0961278226', 'Hà Nội', 3, NULL),
(36, '3', 1, 'hoibua', '649cbfd02765ed47b6a589f1c9072473', 'Tuân', 1, '2020-06-24', '0932483572', 'Tiên sơn', 0, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account_role`
--

CREATE TABLE `account_role` (
  `id` int(11) NOT NULL,
  `role` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `account_role`
--

INSERT INTO `account_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Moder'),
(3, 'User');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book1`
--

CREATE TABLE `book1` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` int(30) NOT NULL,
  `tomtat` mediumtext NOT NULL,
  `nxb` varchar(255) NOT NULL,
  `sotrang` int(11) NOT NULL,
  `kichthuoc` varchar(255) NOT NULL,
  `namxb` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `book1`
--

INSERT INTO `book1` (`id`, `title`, `author`, `price`, `tomtat`, `nxb`, `sotrang`, `kichthuoc`, `namxb`) VALUES
(1, '180 Thủ Thuật Và Mẹo Hay Trong Flash CS4  	180 Thủ Thuật Và Mẹo Hay Trong Flash CS4 ', 'Phạm Mạnh Lâm. ', 121, '<h1>Giới thiệu về nội dung</h1>\r\nThủ Thuật Lập Trình PHP\r\n\r\nNội sách dung gồm 3 phần:\r\nPhần I: Hướng dẫn cho bạn cách thực hiện việc kiểm thử (test) các ứng dụng PHP: Phương pháp kiểm thử từng thành phần (unit test), cách tự động sinh mã lệnh kiểm thử, cách tạo robot kiểm thử…\r\nPhần II: Mang đến cho bạn đọc những thủ thuật để viết các ứng dụng chạy trên mọi hệ điều hành Windows, Linux, Macintosh và thậm chí cả PlayStation Portable (PSP), thủ thuật lập trình gửi tin nhắn (instant message)…. \r\nPhần III: Cung cấp những đoạn mã PHP để thực hiện những tính năng rất thú vị như bạn có thể tự tạo ra bản đồ giống như bản đồ của Google, xây dựng ứng dụng web chơi nhạc MP3…\r\n\r\nMời bạn đón đọc.', 'Giao thông vận tải ', 52, '19x27 cm', '12 - 2006'),
(16, 'PHOTOSHOP CS6- CHUYÊN ĐỀ GHÉP VÀ CHỈNH SỬA TÓC', 'Phạm Quang Hiển, Văn Thị Tư', 57, '<h1>Photoshop CS6 Chuyên Đề Ghép Và Chỉnh Sửa Tóc</h1>\r\n\r\nCho dù bạn có là một tín đồ công nghệ hay không thì không thể không biết tới Photoshop, vị \"phù thuỷ biến hoá\" tài tình nhất của mọi thời đại. Hãy thử tượng tượng: bức ảnh xưa cũ đã bị hoen màu theo thời gian nay được hồi sinh trở lại, một ảnh chụp cảnh bình thường nay trở nên lung linh huyền ảo hay tấm poster quảng cáo với nhiều màu sắc bắt mắt... chỉ bằng những thao tác trên chiếc máy tính. Không có vẻ đẹp nào là không thể tạo ra với \"bậc thầy\" chỉnh sửa ảnh Photoshop. Thế nhưng biết phải sử dụng thế nào khi mà giao diện của nó có vô vàn phím, công cụ và chức năng? Photoshop CS6 Chuyên Đề Ghép Và Chỉnh Sửa Tóc sẽ chỉ cho bạn điều đó.\r\n\r\nPhotoshop CS6 là một trong những phân hệ của bộ Adobe Create Suite CS6. Bộ Adobe Create Suite CS6 bao gồm sự nâng cấp hàng loạt phần mềm mạnh như: Photoshop, InDesign, Dreamweaver...Có thể nói Photoshop là chương trình đầy quyền năng nhất trong các phần mềm chỉnh sửa ảnh khác. Photoshop hiện nay là sản phẩm đứng đầu thị trường phần mềm chỉnh sửa ảnh, và được coi là tiêu chuẩn của các nhà đồ họa chuyên nghiệp. Chuyên đề này hướng dẫn giúp các bạn chỉnh sửa ảnh chủ yếu là thao tác ghép và chỉnh sửa tóc bằng chính các công cụ cơ bản trong Photoshop thay vì phải dùng các chương trình chuyên dùng như Corel Knockout.', 'Từ Điển Bách Khoa', 303, '16x24', '4/2013'),
(2, 'Thủ Thuật Lập Trình PHP', 'Phạm Mạnh Lâm. ', 155, '<h1>Giới thiệu về nội dung</h1>\r\nThủ Thuật Lập Trình PHP\r\n\r\nNội sách dung gồm 3 phần:\r\nPhần I: Hướng dẫn cho bạn cách thực hiện việc kiểm thử (test) các ứng dụng PHP: Phương pháp kiểm thử từng thành phần (unit test), cách tự động sinh mã lệnh kiểm thử, cách tạo robot kiểm thử…\r\nPhần II: Mang đến cho bạn đọc những thủ thuật để viết các ứng dụng chạy trên mọi hệ điều hành Windows, Linux, Macintosh và thậm chí cả PlayStation Portable (PSP), thủ thuật lập trình gửi tin nhắn (instant message)…. \r\nPhần III: Cung cấp những đoạn mã PHP để thực hiện những tính năng rất thú vị như bạn có thể tự tạo ra bản đồ giống như bản đồ của Google, xây dựng ứng dụng web chơi nhạc MP3…\r\n\r\nMời bạn đón đọc.', 'Giao thông vận tải ', 52, '19x27 cm', '12 - 2006'),
(3, 'Thực Hành AutoCad 2010 Bằng Hình Minh Họa  	Thực Hành AutoCad 2010 Bằng Hình Minh Họa', 'Nhiều Tác Giả.', 630, '<h1>Giới thiệu về nội dung</h1>\r\n\r\nKể từ năm 1982 AutoCAD đã là công cụ vẽ phổ biến cho những người sử dụng máy tính cá nhân. Cho đến nay, có thể nói có hàng triệu triệu người sử dụng AutoCAD để tạo bản vẽ, bao gồm các kiến trúc sư, kỹ sư, chuyên viên vẽ sơ đồ thiết kế, các quản lý dự án, và các học sinh sinh viên chuyên ngành thiết kế xây dựng.\r\n\r\n\"Giáo trình AutoCAD 2010 thiết kế 2D và 3D\" này được đặc biệt biên soạn dành cho các học sinh sinh viên làm quen với AutoCAD 2010. Đây cũng là giáo trình rất tiện lợi cho các thầy cô giáo dạy vẽ tại các trường cao đẳng và đại học sử dụng làm tài liệu hướng dẫn học tập cho các em.\r\n\r\nSách gồm 10 chương, hướng dẫn các thao tác thực hiện căn bản với AutoCAD 2010, vẽ các đối tượng khác nhau một cách nhanh chóng và chính xác, thiết lập các bản vẽ, tạo bản vẽ bằng những bước đơn giản, chỉnh sửa các đối tượng trong bản vẽ, tạo và chèn các khối vẽ, sử dụng các mẫu ký hiệu mặt cắt, tạo các bảng và chú thích, chèn và hiệu chỉnh các kích thước, chuẩn bị và in bản vẽ.\r\n\r\nBên cạnh những nội dung nêu trên, sách còn có 40 bài tập và 21 bài thực hành nhằm mục đích giúp các bạn học sinh sinh viên nhanh chóng nắm bắt vấn đề và vận dụng những kiến thức mình đã học được vào công việc thực tiễn. Cuối mỗi chương đều có phần câu hỏi ôn tập nhằm giúp bạn tự kiểm tra lại mức độ hiểu bài của mình.\r\n\r\nMời bạn đón đọc.', 'NXB Hồng Đức ', 346, '19x24', '4 - 2010'),
(4, 'Hướng Dẫn Thiết Kế Website', 'Water PC. ', 36, '<h1>Giới thiệu về nội dung</h1>\r\n\r\nNội dung cuốn sách này bao gồm:\r\n\r\nBài 1: Đôi điều với người thiết kế website\r\n\r\nBài 2: Tìm hiểu về ngôn ngữ HTML căn bản trong thiết kế Website\r\n\r\nBài 3: XML trong thiết kế Website\r\n\r\nBài 4: Sử dụng ngôn ngữ JavaScript trong thiết kế Website\r\n\r\nBài 5: Làm quen với Dreamweaver MX trong thiết kế web\r\n\r\nBài 6: Ngôn ngữ Perl\r\n\r\nBài 7: Trình duyệt web thông dụng\r\n\r\nMời bạn đón đọc.', 'Nxb Văn hóa Thông tin ', 256, '13 x 20.5 ', '11 - 2009 '),
(5, 'Giáo Trình Lập Trình Web PHP Và MY SQL - CD', 'T. Hoa ', 28, '', '', 0, '', ''),
(6, 'Thiết Kế Web Động Với PHP5', 'STEVEN HOLZNER', 57, '', '', 0, '', ''),
(7, 'Tự Học PHP Trong 24 Giờ', 'Thuận Thành.', 63, '', '', 0, '', ''),
(8, ' Quản Trị Windows Server 2008 - Tập 2 	Quản Trị Windows Server 2008 - Tập 2', 'Tô Thanh Hải.', 62, '', '', 0, '', ''),
(9, '100 Bài Tập Và Giải Pháp Gỡ Rối Với Java', 'Công Tuân', 28, '<h1>100 Bài Tập Và Giải Pháp Gỡ Rối Với Java</h1>\r\nJava là ngôn ngữ lập trình hướng đối tượng, do vậy không thể dùng Java để viết một chương trình hướng chức năng. Java có thể giải quyết hầu hết các công việc mà các ngôn ngữ khác có thể làm được.\r\nJava là ngôn ngữ lập trình mới do một nhóm nhỏ các nhà khoa học của hãng Sun Microsystems sáng tạo nên. Theo như truyền thuyết của những người tạo ra ngôn ngữ này, thoạt tiên Java được gọi là Oak và người ta định dùng nó để lập trình cho bộ TV (set-top box). Tất cả các khả năng hiện tại cũng như lời đao to búa lớn chỉ mới có sau này. Từ nền tảng Oak lúc đó, hãng Sun đã phát triển cả một chi nhánh tên là JavaSoft.\r\n\r\nVề kỹ thuật, Java chỉ là ngôn ngữ lập trình nhưng có mục tiêu rất xa: nó cho phép lập trình viên tạo các bản sao chương trình mà người dùng có thể chạy trên hầu hết các hệ máy và hệ điều hành. Khả năng này thường được gọi là \"viết một lần, chạy mọi nơi\" ( write o­nce, run anywhere) là một lợi thế cực lớn. Nó biến Java thành công nghệ chủ chốt trong máy tính mạng (NC) và là thành phần sống còn của lập trình Web.\r\nỨng dụng (app) là một chương trình độc lập mà bạn có thể chạy trên máy của mình. Các ứng dụng phi-Java có rất nhiều, trong đó có cả tá bạn đang dùng như Microsoft Word hay Excel. Cho đến nay mới có rất ít ứng dụng Java. Java applet thường chỉ là các chương trình nhỏ hơn bạn nhiều. Chúng chỉ chạy bên trong trình duyệt Web của bạn.', 'Nxb Văn hóa Thông tin', 296, '14.5x20.5 cm', '09/2007'),
(10, 'GIÁO TRÌNH C++ VÀ LẬP TRÌNH HƯỚNG ĐỐI TƯỢNG', 'Phạm Văn Ất, Lê Trường Thông', 113, '<h1>Giáo Trình C++ Và Lập Trình Hướng Đối Tượng</h1>\r\n\r\nLập trình cấu trúc là phương pháp tổ chức, phân chia chương trình thành các hàm, thủ tục. Chúng được dùng để xử lý dữ liệu nhưng lại tách rời các cấu trúc dữ liệu.\r\n\r\nLập trình hướng đối tượng dựa trên việc tổ chức chương trình thành các lớp. Khác với hàm và thủ tục, lớp là một đơn vị bao gồm cả dữ liệu và các phương thức xử lý.\r\n\r\n“Giáo trình C++ & lập trình hướng đối tượng” trình bày một cách hệ thống các khái niệm của lập trình hướng đối tượng được cài đặt trong C++ như lớp, đối tượng, sự thừa kế, tính tương ứng bội và các khả năng mới trong xây dựng, sử dụng hàm như đối tham chiếu, đối mặc định, hàm trùng tên, hàm toán tử. “Giáo trình C++ & lập trình hướng đối tượng” gồm 13 chương và 5 phụ lục được trình bày khá khoa học. Ngoài ra, cuốn sách còn đề cập đến một số vấn đề còn ít được biết đến như cách xây dựng hàm với số đối bất định trong C cũng sẽ được giới thiệu .', 'NXB Bách Khoa Hà Nội', 482, '16 x 24', '2017'),
(11, 'LẬP TRÌNH VÀ CUỘC SỐNG', 'Jeff Atwood', 124, '<h1>Lập Trình Và Cuộc Sống</h1>\r\n\r\nJeff Atwood bắt đầu viết blog Coding Horror vào năm 2004, và tin rằng nó đã làm thay đổi cuộc đời của mình. Anh cần một cách để theo dõi sự phát triển của phần mềm theo thời gian-bất cứ điều gì anh ta nghĩ đến hoặc làm việc trên nó. Jeff đã nghiên cứu các chủ đề mà anh cảm thấy thú vị, sau đó ghi lại nghiên cứu của mình bằng một bài đăng trên blog mà anh có thể dễ dàng tìm lại và tham khải sau này. Theo thời gian, ngày càng có nhiều độc giả truy cập blog tìm thấy các bài viết hữu ích, liên quanvaf thú vị. Hiện nay, có khoảng 100.000 độc giả truy cập blog mỗi ngày cũng rất nhiều bình luận và tương tác trên web đó.\r\n\r\nNội dung blog không tập trung quá nhiều vào mặt kỹ thuật mà thiên về khía cạnh con người trong phát triển phần mềm. Bởi vậy mình nghĩ blog Coding Horror là một trong những blog tiêu biểu để các lập trình viên trẻ có thể học hỏi kinh nghiệm về những vấn đề trong phát triển phần mềm của những người đi trước.', 'NXB Dân Trí', 324, '	16 x 24', '2018'),
(12, 'LẬP TRÌNH ĐIỀU KHIỂN VỚI RASPBERRY', 'TS. Võ Minh Huân, KS. Phạm Quang Huy', 100, '<h1>Lập Trình Điều Khiển Với Raspberry</h1>\r\n\r\nChủ đề rất hấp dẫn, bổ ích và rất hot với những người đam mê công nghệ.\r\n\r\nĐó là Lập trình Raspberry.Với những người đã từng nghe đến Raspberry, hẳn đều biết đó là gì, ứng dụng thế nào, nhưng không phải ai cũng biết lập trình và ứng dụng nó.\r\n\r\nRaspberry ban đầu là một thẻ card được cắm trên bo mạch máy tính được phát triển bởi các nhà phát triển ở Anh.Sau đó Raspberry đã được phát triển thành một bo mạch đơn có chức năng như một máy tính mini dùng để giảng dạy trong môn khoa học máy tính ở các trường trung học.\r\n\r\nVới cuốn sách này, bạn sẽ được hiểu thêm về cách lập trình điều khiển với Raspberry', 'NXB Thanh Niên', 447, '24 x 16', '06-2017'),
(13, 'Lập Trình Với C#', 'Phạm Quang Hiển, Phạm Quang Huy, Vũ Trọng Luật', 88, '<h1>Lập Trình Với C#</h1>\r\n\r\nHướng dẫn người học từng bước lập trình với C#. Xây dựng ứng dụng trên Window Form.\r\nXây dựng ứng dụng, tạo hai trang web quản lý bán hàng và quản lý tuyển sinh với các hướng dẫn từng bước làm cơ sở cho việc thiết kế các trang web phức tạp hơn.', 'Nhà Xuất Bản Thanh Niên', 392, '', '02-2018');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book2`
--

CREATE TABLE `book2` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` int(30) NOT NULL,
  `tomtat` mediumtext NOT NULL,
  `nxb` varchar(255) NOT NULL,
  `sotrang` int(11) NOT NULL,
  `kichthuoc` varchar(255) NOT NULL,
  `namxb` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `book2`
--

INSERT INTO `book2` (`id`, `title`, `author`, `price`, `tomtat`, `nxb`, `sotrang`, `kichthuoc`, `namxb`) VALUES
(1, 'Luật đất đai', 'Trần Thị Thu Hạnh', 55, '<h1>Giới thiệu về nội dung:</h1>\r\n\r\nMục lục:\r\n\r\n \r\n\r\nChương I. Những qui định chung\r\n\r\nChương II.  Quyền của  Nhà nước đối với đất đai  và quản lý Nhà nước về đất đai \r\nChương III.  Chế độ sử dụng các loại đất.\r\nChương IV. Quyền và nghĩa vụ của người sử dụng đất.\r\nChương V.  Thủ tục hành chính về quản lý và sử dụng đất đai.\r\nChương VI. Thanh tra, giải quyết tranh chấp, khiếu nại tố cáo và xử lý vi phạm pháp luật về đất đai.       \r\nChương VII.  Điều khoản thi hành.\r\nPhụ lục ', 'Nxb Thống kê', 282, '14.5x20.5 cm', '2008'),
(2, 'Luật Đấu Thầu Và Văn Bản Hướng Dẫn Thực Hiện ', 'Nhiều Tác Giả.', 24, '', '', 0, '', ''),
(3, 'Luật Thương Mại  	Luật Thương Mại', 'Nhiều Tác Giả.', 27, '', '', 0, '', ''),
(4, 'Luật Kinh Doanh Việt Nam  	Luật Kinh Doanh Việt Nam', 'Nguyễn Quốc Sỹ.', 70, '', '', 0, '', ''),
(5, 'Pháp Luật Đại Cương', 'Lê Học Lâm.', 43, '', '', 0, '', ''),
(6, '3450 Thuật Ngữ Pháp Lý Phổ Thông  	3450 Thuật Ngữ Pháp Lý Phổ Thông', 'Nguyễn Ngọc Điệp.', 125, '', '', 0, '', ''),
(7, 'Giáo Trình Pháp Luật Đại Cương', 'Nguyễn Đăng Liêm.', 25, '', '', 0, '', ''),
(8, 'Luật Giáo Dục', 'Nhiều Tác Giả.', 8, '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book3`
--

CREATE TABLE `book3` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` int(30) NOT NULL,
  `tomtat` mediumtext NOT NULL,
  `nxb` varchar(255) NOT NULL,
  `sotrang` int(11) NOT NULL,
  `kichthuoc` varchar(255) NOT NULL,
  `namxb` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `book3`
--

INSERT INTO `book3` (`id`, `title`, `author`, `price`, `tomtat`, `nxb`, `sotrang`, `kichthuoc`, `namxb`) VALUES
(1, 'Tương lai của quản trị', 'Gary Hamel', 125, '<h1>Giới thiệu về nội dung:</h1>\r\n\r\nTrong tương lai của quản trị, Gary Hamel chứng minh rằng ngày nay các tổ chức đang cần đổi mới quản trị hơn bao giời hết. Mô hình quản trị hiện tại tập trung vào kiểm soát và tính hiệu quả - không còn phù hợp trong một thế giới mà khả năng thích nghi và tính sáng tạo là không thể thiếu để kinh doanh thành công. Không chỉ phá bỏ triệt để hệ thống niền tin cố hữu ngăn cản các công ty của thế kỷ XXI vượt qua những thách thức mới, Hamel còn đưa ra cách thức giúp các công ty từng bước trở thành nhà đổi mới quản trị, Hamel tiết lộ:\r\n\r\nNhững thách thức sống còn sẽ quyết định lợi thế cạnh tranh trong thế giới đầy biến động ngày nay.\r\n\r\nẢnh hưởng tiêu cực của những niềm tin cố hữu trong quản trị\r\n\r\nTiềm năng của Web trong quá trình dân chủ hóa việc thực hành quản trị\r\n\r\nNhững hành động mà công ty của bạn có thể thực hiện bây giờ để tạo dựng lợi thế quản trị cho bản thân.\r\n\r\nMời bạn đón đọc.\r\n', 'Nxb Đại học Kinh tế quốc dân', 404, '14.5x20.5 cm', '03/2010 '),
(2, 'Nghiệp Vụ Ngân Hàng Quốc Tế  ', 'Lê Văn Tư.', 122, '<h1>Giới thiệu về nội dung:</h1>\r\n\r\nNgày nay, mọi hoạt động thương mại, sản xuất và đầu tư ngày càng mang tính chất quốc tế hóa ở nhiều quốc gia. Chính sự toàn cầu hóa nền kinh tế thế giới đã làm tăng lượng giao dịch trong hoạt động tài chính, tiền tệ giữa các nước. Một nền kinh tế mở, tiến tới hội nhập với thị trường thế giới phải được một cơ cấu tài chính hiện đại vững mạnh hỗ trợ, trong đó hệ thống ngân hàng thông qua nghiệp vụ ngân hàng quốc tế, hỗ trợ cho sự phát triển của hoạt động ngoại thương và thu hút đầu tư quốc tế, thúc đẩy sự thành công của quá trình hội nhập kinh tế quốc tế.\r\nNghiệp vụ ngân hàng quốc tế của hệ thống ngân hàng phát triển sẽ thúc đẩy mạnh mẽ hoạt động xuất nhập khẩu của quốc gia, đồng thời là nhân tố tích cực kích thích sự luân chuyển các luồng vốn đầu tư quốc tế vào quốc gia đó. Chính thông qua nghiệp vụ ngân hàng quốc tế, các nhà kinh doanh và đầu tư nhanh chóng nắm bắt và làm chủ các thông lệ về tài chính quốc tế, để có thể thực hiện tốt và cạnh tranh trên lộ trình hội nhập với các nước phát triển có  kinh nghiệm và năng lực, nguồn lực gấp nhiều lần so với chúng ta.\r\nQuyển sách này giới thiệu các cơ chế cơ bản của nghiệp vụ ngân hàng quốc tế, cũng như các kỹ thuật trực tiếp rút ra từ các cơ chế này. Tác giả đã cố gắng thể hiện đơn giản và dễ hiểu các kỹ thuật chuyên sâu, và hy vọng quyển sách sẽ đáp ứng nhu cầu tìm hiểu của các nhà xuất nhập khẩu, các nhà hoạt động ngân hàng, các nhà nghiên cứu và các sinh viên của các trường cao đẳng và đại học khối kinh tế – tài chính – ngân hàng – ngoại thương – kinh doanh quốc tế....', ' Nxb Thanh Niên', 608, '16x24 cm', '2009'),
(3, 'Quản Trị Tài Chính Quốc Tế', 'Ngô Thị Ngọc Huyền.', 60, '', 'dsad', 1, '', ''),
(4, '36 Kế Ứng Dụng Trong Kinh Doanh Và Cuộc Sống', 'Ngọc Bích.', 55, '', '', 0, '', ''),
(5, 'Khác Biệt Hay Là Chết ', 'Jack Trout.', 68, '', '', 0, '', ''),
(6, '50 Lời Bàn Về Thành Công Của Những Người Nổi Tiếng', 'Hoàng Kim.', 23, '', '', 0, '', ''),
(7, 'LỊCH SỬ GIAO THƯƠNG', 'William J. Bernstein', 153, '<h1>Lịch Sử Giao Thương</h1>\r\n\r\nThương mại định hình thế giới như thế nào?\r\n\r\n\r\n“Toàn cầu hóa,” hóa ra không phải là một hay thậm chí là một chuỗi sự kiện; mà đó là tiến trình diễn ra chậm rãi trong một thời gian rất, rất dài. Thế giới không đột nhiên trở nên “phẳng” với phát kiến về Internet, và thương mại không bất ngờ bị các tập đoàn lớn tầm cỡ toàn cầu chi phối vào cuối thế kỷ 20. Khởi đầu bằng hàng hóa giá trị cao được ghi nhận trong lịch sử, sau đó từ từ mở rộng sang các mặt hàng ít quý giá hơn, cồng kềnh và dễ hư hỏng hơn, những thị trường của Cựu Thế giới dần tiến đến hợp nhất. Với hành trình đầu tiên của người châu Âu tới Tân Thế giới, quá trình hội nhập toàn cầu diễn ra ngày\r\n\r\ncàng mạnh mẽ. Hôm nay, các tàu container đồ sộ, máy bay phản lực, Internet, cùng mạng lưới cung ứng và sản xuất ngày càng được toàn cầu hóa chỉ là những bước tiến xa hơn của một quá trình đã diễn ra suốt 5.000 năm qua. Nếu chúng ta muốn biết về những mô hình thương mại toàn cầu đang chuyển dịch nhanh chóng ngày nay, cách thực sự hữu ích là tìm hiểu những gì đã xảy ra trước đây.\r\n\r\nThông qua những câu chuyện và ý tưởng được chọn lọc kỹ càng, tác giả đã cung cấp thông tin và thách thức các nhận định ở cả hai góc độ tư tưởng lớn trong vấn đề tự do thương mại: “tự do thương mại tạo ra những sự khích lệ và cơ hội ngang bằng giúp nâng cao phúc lợi nói chung cho con người đồng thời làm gia tăng chênh lệch giàu nghèo với ảnh hưởng xấu về mặt xã hội.”\r\n\r\n \r\n\r\nĐÁNH GIÁ :\r\n\r\n\"Cuốn sách là lời nhắc nhở rằng thương mại không chỉ là một trong những bản năng lâu đời nhất của con người mà còn là nguyên nhân của những cột mốc phát triển trong lịch sử nhân loại… Đối với bất cứ ai muốn hiểu ý tưởng của Adam Smith, David Ricardo, hoặc các nhà kinh tế học gần đây như Paul Samuelson, đây là cuốn sách dành cho bạn.\" – The Economist\r\n\r\n\"... được lấp đầy bằng các quan sát khôn ngoan về sự tiến triển của thương mại từ thế giới cổ đại đến ngày nay. Bernstein dựa trên một bối cảnh lịch sử rộng lớn để cho thấy sự phát triển của thương mại là một phần của tiến trình thịnh vượng tự nhiên của xã hội và chính sách thương mại là chất xúc tác cho sự phát triển của các quốc gia đầy tham vọng. Chỉ khi biết cách mà thương mại đã định hình quá khứ, chúng ta mới biết vai trò quan trọng của nó – tốt hơn và tệ hơn – khi tiến vào tương lai.\" – Arthur Laffer, người sáng lập và chủ tịch Laffer Associates\r\n\r\n\"Lịch sử thương mại từ thời cổ đại đến hiện tại là một câu chuyện về sự thôi thúc không thể cưỡng lại của công cuộc trao đổi hàng hóa, từ đó nó đã khơi nguồn trao đổi nghệ thuật, khoa học và ý tưởng. Câu chuyện về thương mại là câu chuyện về nhân loại, với một cái kết hạnh phúc trọn vẹn.\" – Pietra Rivoli, tác giả cuốn Du hành cùng áo phông trong nền kinh tế toàn cầu.', 'NXB Thế Giới', 600, '14 x 20.5', '10-2017'),
(8, 'KINH TẾ HỌC VI MÔ', 'NGregory Mankiw', 257, '<h1>“Kinh tế Vi Mô” và “Kinh tế Vĩ Mô” của NXB Cengage</h1>\r\n\r\nNXB Cengage Learning là một trong những Nhà xuất bản lớn hàng đầu trên thế giới có trụ sở chính tại Mỹ và tại khu vực Châu Á có 11 trụ sở tại các nước khác nhau, cung cấp các thể loại sách phục vụ cho việc học tập, giảng dạy và nghiên cứu cho các cá nhân, các trường đại học, cao đẳng, viện nghiên cứu, các doanh nghiệp và thư viện trên toàn thế giới.\r\n\r\n Theo xu hướng đổi mới cơ bản và toàn diện giáo dục Đại học Việt Nam hiện nay và phục vụ cho đề án quốc tế hóa các chương trình đào tạo kinh tế sang hướng tiên tiến để nhanh chóng ngang bằng trình độ khu vực và tiệm cận với giáo dục đại học trên thế giới, một trong những đổi mới để phù hợp với xu thế này là lựa chọn các giáo trình tốt nhất của các NXB nổi tiếng trên thế giới để chuyển ngữ sang tiếng Việt nhằm phục vụ cho việc học của sinh viên được dể dàng hơn, Công ty Cổ phần phát hành sách Tp.HCM – FAHASA đã phối hợp với NXB NXB Cengage Learning  và đội ngũ giảng viên khoa Kinh tế Trường Đại học Kinh tế TP.HCM – một trong 16 trường trọng điểm của Bộ Giáo dục và Đào tạo - tổ chức dịch quyển Kinh tế học của Tác giả N.Gregory Mankiw cho hai phiên bản Kinh tế học vi mô và Kinh tế học vĩ mô ra Tiếng Việt để phục vụ cho việc học tập và nghiên cứu của giảng viên và sinh viên khoa Kinh tế của các Trường Đại học trên cả nước. Sau khi được biên dịch bởi đội ngủ giảng viên Trường ĐH Kinh tế Tp.HCM, NXB Cengage đã tổ chức biên tập và in ấn tại Singapore, bản quyền của 2 quyển sách này thuộc NXB Cengage Learning sách do Công ty FAHASA nhập khẩu và phân phối độc quyền tại Việt Nam.\r\n\r\n N.Gregory Mankiw là giáo sư kinh tế Đại học Harvard. Ông có rất nhiều bài viết và thường xuyên tham gia các chương trình tranh luận về học thuật cũng như các chính sách về kinh tế. Là một trong 25 Nhà kinh tế học nổi tiếng trên thế giới và sách Kinh tế học của ông đã và đang được nhiều trường Đại học trên thế giới sử dụng. Ông cũng là tác giả của giáo trình Kinh tế Vĩ mô trình độ trung cấp bán chạy nhất (Nhà xuất bản Worth). Bên cạnh việc giảng dạy, nghiên cứu và viết lách, Giáo sư Mankiw còn là thành viên nghiên cứu của Ban Nghiên cứu Kinh tế Quốc gia, thành viên tư vấn cho Văn phòng Ngân sách Quốc hội, Cục Dự trữ Liên bang khu vực Boston và New York, thành viên Hội đồng phát triển khảo thí  ETS - chương trình dự bị đại học nâng cao chuyên ngành kinh tế. Từ 2003 đến 2005 ông là chủ tịch Hội đồng Tư vấn Kinh tế cho Tổng thống Hoa Kỳ.\r\n\r\n Đây là lần đầu tiên cuốn sách Kinh tế học của Tác giả N.Gregory Mankiw được dịch sang Tiếng Việt và phát hành tại Việt Nam. Về nội dung 2 cuốn sách, với các khái niệm phổ biến và khái quát nhất về kinh tế vi mô và vĩ mô cũng như những giải thích về các cơ chế hoạt động của nền kinh tế, bộ giáo trình bao gồm 16 phần cung cấp cho người đọc các kiến thức khá toàn diện và chuyên sâu về các nguyên lý kinh tế học như các lý thuyết cổ điển, các lý thuyết về phát triển: nền kinh tế trong dài hạn, các lý thuyết về vòng tròn kinh tế: nền kinh tế trong ngắn hạn, các yếu tố vi mô ẩn sau kinh tế vĩ mô, các tranh luận về chính sách vĩ mô… Tất cả đều được giải thích và đánh giá bởi một vị giáo sư kinh tế hàng đầu trên thế giới. Các khái niệm trong sách được định nghĩa rất rõ ràng, dễ nắm bắt, dễ hiểu, có tóm tắt các chương tạo điều kiện tốt nhất cho việc ôn tập. Các ví dụ sinh động, gắn liền với thực tế, có độ cập nhật phù hợp với đề cương giảng dạy kinh tế học không chỉ của Trường Đại học Kinh tế TP.HCM mà cả các trường đại học khác tại Việt Nam trong khối kinh tế và quản trị. Ngoài ra bộ giáo trình này còn có ngân hàng câu hỏi trắc nghiệm, phần tóm tắt bài giảng và phẩn trình chiếu Power point cho từng chương, phục vụ tốt cho việc thực hành và giảng dạy của sinh viên và giảng viên. Hy vọng bộ giáo trình Kinh tế học vi mô và Kinh tế học vĩ mô của N.Gregory Mankiw bản tiếng Việt sẽ cung cấp cho giảng viên và sinh viên Việt Nam những tài liệu kinh tế hiệu quả và hiện đại nhằm phục vụ cho công tác giảng dạy và học tập được tốt hơn.\r\n\r\n Bộ sách Kinh tế Vi mô và Kinh tế Vĩ mô sẽ là sự lựa chọn đúng đắn cho khoa Kinh tế của các trường Đại học tại Việt Nam.', 'Cengage', 500, '14.5. x 20.5', '2014');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book4`
--

CREATE TABLE `book4` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` int(30) NOT NULL,
  `tomtat` mediumtext NOT NULL,
  `nxb` varchar(255) NOT NULL,
  `sotrang` int(11) NOT NULL,
  `kichthuoc` varchar(255) NOT NULL,
  `namxb` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `book4`
--

INSERT INTO `book4` (`id`, `title`, `author`, `price`, `tomtat`, `nxb`, `sotrang`, `kichthuoc`, `namxb`) VALUES
(1, 'Học Đệm Ghi Ta', 'Cù Minh Nhật', 60, '', '', 0, '', ''),
(2, 'Đặng Thái Sơn - Người Được Chopin Chọn ', 'Ikuma Yoshiko', 45, '', '', 0, '', ''),
(3, 'Tự Học Piano Qua Hình Ảnh ', 'Mary Sue. Tere Stouffer', 45, '', '', 0, '', ''),
(4, 'Trịnh Công Sơn - Vết Chân Dã Tràng ', 'Ban Mai', 85, '', '', 0, '', ''),
(5, 'Chơi Đàn Guitar Bằng Hình Ảnh', 'Arthur Dick - Joe Bennett  ', 20, '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book5`
--

CREATE TABLE `book5` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` int(30) NOT NULL,
  `tomtat` mediumtext NOT NULL,
  `nxb` varchar(255) NOT NULL,
  `sotrang` int(11) NOT NULL,
  `kichthuoc` varchar(255) NOT NULL,
  `namxb` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `book5`
--

INSERT INTO `book5` (`id`, `title`, `author`, `price`, `tomtat`, `nxb`, `sotrang`, `kichthuoc`, `namxb`) VALUES
(1, 'Thương trường đẫm lệ', 'Phù Thạch', 120, '', '', 0, '', ''),
(2, ' Xứ Cát - Tiểu Thuyết Khoa Học Giả Tưởng Lớn Nhất Mọi Thời Đại', 'Frank Herbert', 120, '', '', 0, '', ''),
(3, 'Người Đàn Ông Đa Cảm', 'Javier Marias', 39, '', '', 0, '', ''),
(4, 'Viết', 'Marguerite Duras ', 28, '', '', 0, '', ''),
(5, 'Hot Girl Tây Ban Nha ', 'Lisi Harrison. An Chi. ', 55, '', '', 0, '', ''),
(6, 'Cung Bậc Tình Yêu 2(Truyện Hay Song Ngữ Việt - Anh)', 'TÔN THẤT LAN', 28, '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book6`
--

CREATE TABLE `book6` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` int(30) NOT NULL,
  `tomtat` mediumtext NOT NULL,
  `nxb` varchar(255) NOT NULL,
  `sotrang` int(11) NOT NULL,
  `kichthuoc` varchar(255) NOT NULL,
  `namxb` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `book6`
--

INSERT INTO `book6` (`id`, `title`, `author`, `price`, `tomtat`, `nxb`, `sotrang`, `kichthuoc`, `namxb`) VALUES
(1, 'Kỳ Thi Năng Lực Tiếng Nhật J.Test (A - D)', 'Nhiều Tác Giả.', 60, '', '', 0, '', ''),
(2, 'Essential Skills For Ielts - Expanding Vocabulary Through Reading  	', ': Hu Min - John A Gordon ', 78, '', '', 0, '', ''),
(3, 'English Communication For Your Career - Health Science (Kèm CD) ', 'Soh Yoon Hee.', 136, '', '', 0, '', ''),
(4, 'A Practical English Grammar  	A Practical English Grammar', 'Le Ton Hien.', 48, '', '', 0, '', ''),
(5, '54 Trọng Điểm Làm Bài Thi Môn Tiếng Anh', 'Nguyễn Hà Phương.', 60, '', '', 0, '', ''),
(6, 'Essential Speaking For Ielts (Dùng Kèm 1 Đĩa MP3)', 'Hu Min.', 110, '', '', 0, '', ''),
(7, 'Interactions 2 - Grammar', 'Patricia K. Werner.', 115, '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book7`
--

CREATE TABLE `book7` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` int(30) NOT NULL,
  `tomtat` mediumtext NOT NULL,
  `nxb` varchar(255) NOT NULL,
  `sotrang` int(11) NOT NULL,
  `kichthuoc` varchar(255) NOT NULL,
  `namxb` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `book7`
--

INSERT INTO `book7` (`id`, `title`, `author`, `price`, `tomtat`, `nxb`, `sotrang`, `kichthuoc`, `namxb`) VALUES
(1, 'Tập bản đồ hành chính Việt Nam, khổ A2 ', 'Nxb Bản đồ', 1080, '', '', 0, '', ''),
(2, 'Non Nước Việt Nam - Sắc Nét Trung Bộ ', 'Phạm Côn Sơn', 60, '', '', 0, '', ''),
(3, 'Đồng Bằng Sông Cửu Long - Nét Sinh Hoạt Xưa Và Văn Minh Miệt Vườn (Biên Khảo Sơn Nam, Bìa Cứng) ', 'Sơn Nam', 84, '<h1>Giới thiệu về nội dung:</h1>\r\n\r\nVới hơn 60 năm sống, đọc, tìm hiểu, nghiên cứu và viết, nhà văn - nhà Nam Bộ học Sơn Nam đã trao cho cuộc đời một gia tài thật đồ sộ - gần 60 tác phẩm đã được xuất bản, trong đó có không ít hơn 50 tác phẩm là của riêng ông.\r\n\r\n\r\nNói đến tác phẩm Sơn Nam là nói đến chủ đề về Nam Kỳ Lục Tỉnh, về đất, về người, về lịch sử khẩn hoang và phát triển của Nam Bộ.\r\nTừ sáu tỉnh ban đầu dưới triều Nguyễn gồm Biên Hòa, Gia Định, Định Tường, Vĩnh Long, An Giang và Hà Tiên trong đó có bốn tỉnh thuộc đồng bằng sông (trừ Biên Hòa và Gia Định) nay chúng ta có 13 tỉnh và thành phố trực ương. Sự phát triển không ngừng của đồng bằng sông Cửu Long trong những năm qua luôn hàm chứa những giá trị văn hóa tinh thần lớn lao do tiền nhân - những người đi khai hoang mở đất buổi đầu và qua nhiều thế hệ. Tìm hiểu về những giá trị văn hóa tinh thần đó cũng là tìm hiểu về nền văn minh của người mở đất, tìm hiểu nết ăn, nếp ở, tập quán sinh hoạt của một bộ phận người đã tạo nên diện mạo của một vùng văn hóa. \r\n\r\n\r\nTrong tinh thần đó, Nhà xuất bản Trẻ đã cho xuất bản tập sách Đồng Bằng Sông Cửu Long - Nét Sinh Hoạt Xưa Và Văn Minh Miệt Vườn.\r\nVăn minh miệt vườn là tác phẩm được tác giả hoàn thành giữa năm 1970 và được xuất bản lần đầu tại Sài Gòn năm 1970 bởi Nhà xuất bản An Tiêm. Còn Đồng bằng Sông Cửu Long - Nét sinh hoạt xưa là tác phẩm được viết sau ngày 30.4.1975 và được in lần đầu bởi Nhà xuất bản Thành phố Hồ Chí Minh năm 1985.\r\nTrong lần xuất bản này, 2 tác phẩm được in gộp thành một cuốn để bạn đọc tiện nghiên cứu.\r\nSách được trình bày bìa cứng, xin trân trọng giới thiệu cùng bạn. ', 'Nxb Trẻ', 423, '14x20 cm', ' 2008'),
(4, 'Tìm Hiểu Các Nước TrênThế Giới (202 Quốc Gia Và Vùng Lãnh Thổ) ', 'NGUYỄN VĂN DƯƠNG', 180, '', '', 0, '', ''),
(5, 'Quần Thể Di Tích Huế (Việt Nam - Di Sản Thế Giới)', ' Phan Thuận An', 51, '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book8`
--

CREATE TABLE `book8` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` int(30) NOT NULL,
  `tomtat` mediumtext NOT NULL,
  `nxb` varchar(255) NOT NULL,
  `sotrang` int(11) NOT NULL,
  `kichthuoc` varchar(255) NOT NULL,
  `namxb` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `book8`
--

INSERT INTO `book8` (`id`, `title`, `author`, `price`, `tomtat`, `nxb`, `sotrang`, `kichthuoc`, `namxb`) VALUES
(1, 'Kim Dung Giữa Đời Tôi - Toàn Tập', 'Vũ Sao Đức Biển', 125, '', '', 0, '', ''),
(2, 'Đảo mộng mơ - (bìa cứng)', 'Nguyễn Nhật Ánh ', 99, '', '', 0, '', ''),
(3, 'Đường Cái Quan', 'Bùi Quang Đạt', 25, '', '', 0, '', ''),
(4, 'Đài các tiểu thư', 'Hồng Sakura', 35, '', '', 0, '', ''),
(5, 'Hai bầu trời', 'Khánh Phương', 24, '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book9`
--

CREATE TABLE `book9` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` int(30) NOT NULL,
  `tomtat` mediumtext NOT NULL,
  `nxb` varchar(255) NOT NULL,
  `sotrang` int(11) NOT NULL,
  `kichthuoc` varchar(255) NOT NULL,
  `namxb` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `book9`
--

INSERT INTO `book9` (`id`, `title`, `author`, `price`, `tomtat`, `nxb`, `sotrang`, `kichthuoc`, `namxb`) VALUES
(1, 'Bí mật của một trí nhớ siêu phàm', 'Eran Katz', 59, '', '', 0, '', ''),
(2, 'Trí tuệ Do Thái - Jerome Becomes a Genius', 'Eran Katz', 79, '', '', 0, '', ''),
(3, 'Sao biển và nhện', 'Ori Brafman. Rod A. Beckstrom. ', 79, '', '', 0, '', ''),
(4, 'Những Nguyên Tắc Thành Công ', 'JACK CANFIELD ', 119, '', '', 0, '', ''),
(5, 'Ngụ Ngôn Nhỏ Trí Tuệ Lớn Thành Thông - ', 'Thành Thông', 39, '', '', 0, '', ''),
(6, 'Bài Học Từ Loài Chó - Sống Đơn Giản Để Thành Công Và Hạnh Phúc ', 'William Cottringer. ', 69, '', '', 0, '', ''),
(7, 'Lời Nói Có Đáng Tin?', 'Navarro', 140, '', '', 0, '', ''),
(8, 'ÉMILE HAY LÀ VỀ GIÁO DỤC', 'Jean-Jacques Rousseau', 131, '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book10`
--

CREATE TABLE `book10` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` int(30) NOT NULL,
  `tomtat` mediumtext NOT NULL,
  `nxb` varchar(255) NOT NULL,
  `sotrang` int(11) NOT NULL,
  `kichthuoc` varchar(255) NOT NULL,
  `namxb` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `book10`
--

INSERT INTO `book10` (`id`, `title`, `author`, `price`, `tomtat`, `nxb`, `sotrang`, `kichthuoc`, `namxb`) VALUES
(1, 'Đại Việt Sử Ký Toàn Thư ( Trọn Bộ 3 cuốn )', 'NGÔ ĐỨC THỌ', 270, '', '', 0, '', ''),
(2, 'Triều Nguyễn và lịch sử của chúng ta', 'Trúc Phương', 70, '', '', 0, '', ''),
(3, 'Bí mật ở CANNES – The secret of Cannes', 'Trung Nghĩa', 48, '', '', 0, '', ''),
(4, 'Trường Sơn có một thời như thế', 'Nhiều tác giả', 78, '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book11`
--

CREATE TABLE `book11` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` int(30) NOT NULL,
  `tomtat` mediumtext NOT NULL,
  `nxb` varchar(255) NOT NULL,
  `sotrang` int(11) NOT NULL,
  `kichthuoc` varchar(255) NOT NULL,
  `namxb` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `book11`
--

INSERT INTO `book11` (`id`, `title`, `author`, `price`, `tomtat`, `nxb`, `sotrang`, `kichthuoc`, `namxb`) VALUES
(1, 'Giúp bạn tự xử lý 175 bệnh thường gặp Tác Giả : BS. Donald M. Vickery -', 'James F. Fries ', 110, '', '', 0, '', ''),
(2, 'Ăn Gì Để Phòng Bệnh ', 'BÁC SĨ LÊ THUÝ TƯƠI', 30, '', '', 0, '', ''),
(3, 'Sức Khỏe Người Cao Tuổi ', 'Nguyễn Ý Đức ', 62, '', '', 0, '', ''),
(4, 'Tiếng Nói Cơ Thể Phụ Nữ ', 'HOÀNG ANH', 34, '', '', 0, '', ''),
(5, 'Chẩn Đoán Qua Tay Chữa Trị Bằng Chân - Các Bệnh Thường Gặp ', 'Đường Bình', 35, '', '', 0, '', ''),
(6, 'Trị Bệnh Bằng Thực Phẩm Thường Ngày', ' VƯƠNG MỘNG BƯU', 40, '', '', 0, '', ''),
(7, 'Những Quy Tắc Để Sống Khỏe ', 'Alpha Books', 49, '', '', 0, '', ''),
(8, 'NHÂN TỐ ENZYME - PHƯƠNG THỨC SỐNG LÀNH MẠNH (TÁI BẢN 2018)', 'Hiromi Shinya', 53, '<h1>Nhân Tố Enzyme - Phương Thức Sống Lành Mạnh (Tái Bản 2018)</h1>\r\n\r\nTừ kết quả lâm sàng khi tiến hành kiểm tra dạ dày của hơn 300.000 người, bác sĩ Hiromi Shinya đã rút ra kết luận: “Người có sức khỏe tốt là người có dạ dày đẹp, ngược lại, người có sức khỏe kém là người có dạ dày không đẹp.”\r\n\r\nTrong cuốn sách này, Hiromi Shinya sẽ giới thiệu với các bạn về phương pháp sống lâu và khỏe mạnh mà ông đã dày công nghiên cứu cùng với sự trợ giúp của đông đảo các bệnh nhân của ông.\r\n\r\nVậy, làm thế nào để có thể sống lâu và khỏe mạnh? Nếu nói ngắn gọn trong một câu thôi thì đó là sống mà không tiêu tốn hết “enzyme diệu kỳ”.\r\n\r\nCó lẽ sẽ có nhiều người thắc mắc về cụm từ “enzyme diệu kỳ”. Nói một cách đơn giản, “enzyme diệu kỳ” là enzyme nguyên mẫu của hơn 5.000 loại enzyme trong cơ thể, đảm nhiệm các hoạt động duy trì sự sống của con người.  Các ezyme cần thiết này hình thành ngay trong tế bào của cơ thể sống và chúng ta còn có thể tự tổng hợp enzyme qua các bữa ăn hàng ngày.\r\n\r\nVậy điều khiến chúng ta tiêu tốn enzyme diệu kỳ, làm thế nào để để bổ sung enzyme diệu kỳ hãy cùng tìm hiểu trong cuốn sách Nhân tố Ezyme này nhé.		', 'NXB Thế Giới', 0, '14.5 x 20.5', '2018');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book12`
--

CREATE TABLE `book12` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` int(30) NOT NULL,
  `tomtat` mediumtext NOT NULL,
  `nxb` varchar(255) NOT NULL,
  `sotrang` int(11) NOT NULL,
  `kichthuoc` varchar(255) NOT NULL,
  `namxb` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `book12`
--

INSERT INTO `book12` (`id`, `title`, `author`, `price`, `tomtat`, `nxb`, `sotrang`, `kichthuoc`, `namxb`) VALUES
(1, 'Hào Kiệt Đêm Thế Kỷ ', 'Minh Khoa', 125, '', '', 0, '', ''),
(2, 'Nghệ thuật kiến trúc thế giới ', 'Nguyễn Huy Côn', 37, '', '', 0, '', ''),
(3, 'Áo Dài Hoa Hậu Mai Phương Thuý', 'Nhiều Tác Giả', 55, '', '', 0, '', ''),
(4, '10 bí quyết hình ảnh', 'Lê Minh', 50, '', '', 0, '', ''),
(5, '10 Bí Quyết Thành Công Của Những Diễn Giả MC Tài Năng Nhất Thế Giới', ' Carmine Gallo', 48, '', '', 1, '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book13`
--

CREATE TABLE `book13` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `tomtat` mediumtext COLLATE utf8_unicode_ci,
  `nxb` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sotrang` int(11) DEFAULT NULL,
  `kichthuoc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `namxb` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `booknews`
--

CREATE TABLE `booknews` (
  `news_id` int(11) NOT NULL,
  `news_idtheloai` int(11) NOT NULL,
  `news_idbook` int(11) NOT NULL,
  `news_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `booknews`
--

INSERT INTO `booknews` (`news_id`, `news_idtheloai`, `news_idbook`, `news_date`) VALUES
(2, 11, 8, '2018-11-06 23:48:45'),
(3, 3, 7, '2018-11-07 19:21:06'),
(4, 3, 8, '2018-11-07 19:47:21'),
(6, 1, 16, '2018-11-07 19:52:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cart_user` int(11) NOT NULL,
  `cart_theloai` int(11) NOT NULL,
  `cart_idbook` int(11) NOT NULL,
  `cart_soluong` int(11) NOT NULL DEFAULT '1',
  `cart_thanhtien` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kho`
--

CREATE TABLE `kho` (
  `kho_id` int(11) NOT NULL,
  `kho_idtheloai` int(11) NOT NULL,
  `kho_idsach` int(11) NOT NULL,
  `kho_soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `kho`
--

INSERT INTO `kho` (`kho_id`, `kho_idtheloai`, `kho_idsach`, `kho_soluong`) VALUES
(1, 1, 1, 12),
(2, 1, 16, 4),
(3, 1, 2, 99),
(4, 1, 3, 100),
(5, 1, 4, 100),
(6, 1, 5, 100),
(7, 1, 6, 100),
(8, 1, 7, 100),
(9, 1, 8, 100),
(10, 1, 9, 100),
(11, 1, 10, 100),
(12, 1, 11, 100),
(13, 1, 12, 100),
(14, 1, 13, 100),
(15, 2, 1, 11),
(16, 2, 2, 100),
(17, 2, 3, 99),
(18, 2, 4, 100),
(19, 2, 5, 100),
(20, 2, 6, 99),
(21, 2, 7, 99),
(22, 2, 8, 100),
(23, 3, 1, 100),
(24, 3, 2, 100),
(25, 3, 3, 100),
(26, 3, 4, 100),
(27, 3, 5, 100),
(28, 3, 6, 100),
(29, 3, 7, 100),
(30, 3, 8, 100),
(31, 4, 1, 100),
(32, 4, 2, 100),
(33, 4, 3, 100),
(34, 4, 4, 100),
(35, 4, 5, 100),
(36, 5, 1, 100),
(37, 5, 2, 100),
(38, 5, 3, 100),
(39, 5, 4, 100),
(40, 5, 5, 100),
(41, 5, 6, 100),
(42, 6, 1, 100),
(43, 6, 2, 100),
(44, 6, 3, 100),
(45, 6, 4, 100),
(46, 6, 5, 100),
(47, 6, 6, 100),
(48, 6, 7, 100),
(49, 7, 1, 100),
(50, 7, 2, 100),
(51, 7, 3, 100),
(52, 7, 4, 100),
(53, 7, 5, 100),
(54, 8, 1, 100),
(55, 8, 2, 100),
(56, 8, 3, 100),
(57, 8, 4, 100),
(58, 8, 5, 100),
(59, 9, 1, 100),
(60, 9, 2, 100),
(61, 9, 3, 100),
(62, 9, 4, 100),
(63, 9, 5, 100),
(64, 9, 6, 100),
(65, 9, 7, 100),
(66, 9, 8, 100),
(67, 10, 1, 100),
(68, 10, 2, 100),
(69, 10, 3, 100),
(70, 10, 4, 100),
(71, 11, 1, 100),
(72, 11, 2, 100),
(73, 11, 3, 100),
(74, 11, 4, 100),
(75, 11, 5, 100),
(76, 11, 6, 100),
(77, 11, 7, 100),
(78, 11, 8, 100),
(79, 12, 1, 100),
(80, 12, 2, 100),
(81, 12, 3, 100),
(82, 12, 4, 100),
(83, 12, 5, 100);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsu`
--

CREATE TABLE `lichsu` (
  `history_id` int(11) NOT NULL,
  `history_date` datetime NOT NULL,
  `history_iduser` text COLLATE utf8_unicode_ci NOT NULL,
  `history_idtheloai` int(11) NOT NULL,
  `history_idbook` int(11) NOT NULL,
  `history_num` int(11) NOT NULL,
  `history_totalprice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lichsu`
--

INSERT INTO `lichsu` (`history_id`, `history_date`, `history_iduser`, `history_idtheloai`, `history_idbook`, `history_num`, `history_totalprice`) VALUES
(3, '2018-11-07 22:29:36', '1', 1, 16, 1, 57),
(4, '2018-11-07 22:29:36', '1', 1, 11, 1, 124),
(5, '2018-11-07 22:29:36', '1', 1, 13, 1, 88),
(6, '2018-11-07 22:29:36', '1', 1, 12, 1, 100),
(7, '2018-11-11 21:40:56', '1', 1, 16, 1, 57),
(8, '2018-11-11 21:40:56', '1', 5, 5, 1, 55),
(9, '2018-11-11 21:40:56', '1', 9, 6, 1, 69),
(10, '2018-11-11 21:40:56', '1', 10, 1, 1, 270),
(11, '2018-11-11 21:40:56', '1', 2, 8, 1, 8),
(12, '2018-11-11 21:41:11', '1', 3, 8, 1, 257),
(13, '2018-11-11 21:41:11', '1', 2, 8, 1, 8),
(14, '2018-11-11 21:41:11', '1', 2, 6, 1, 125),
(15, '2018-11-11 21:56:52', '1', 2, 8, 1, 8),
(16, '2018-11-11 21:56:52', '1', 2, 7, 1, 25),
(17, '2018-11-11 21:56:52', '1', 2, 6, 1, 125),
(18, '2018-11-11 21:56:52', '1', 2, 5, 1, 43),
(19, '2018-11-11 21:56:52', '1', 2, 4, 1, 70),
(20, '2018-11-11 21:56:52', '1', 2, 3, 1, 27),
(21, '2018-11-11 21:56:52', '1', 2, 2, 1, 24),
(23, '2018-11-11 23:20:19', '1', 1, 16, 1, 57),
(26, '2018-11-12 00:17:14', '1', 2, 4, 1, 70),
(27, '2018-11-12 19:21:59', '1', 1, 16, 2, 114),
(28, '2018-12-12 19:12:38', '1', 1, 16, 50, 2850),
(29, '2018-12-12 19:13:15', '1', 5, 6, 1, 28),
(30, '2018-12-12 19:13:15', '1', 5, 5, 50, 2750),
(31, '2018-12-12 19:13:15', '1', 5, 4, 50, 1400),
(32, '2018-12-12 20:09:01', '1', 1, 16, 50, 2850),
(34, '2018-12-13 19:52:59', '1', 1, 13, 1, 88),
(35, '2018-12-13 19:53:05', '1', 2, 8, 1, 8),
(36, '2018-12-13 21:21:44', '1', 1, 16, 1, 57),
(37, '2018-12-13 21:22:35', '1', 3, 8, 1, 257),
(38, '2018-12-13 21:23:51', '1', 2, 7, 1, 25),
(39, '2018-12-13 21:28:00', '1', 3, 8, 1, 257),
(40, '2018-12-13 21:29:42', '1', 1, 16, 1, 57),
(41, '2018-12-13 21:31:51', '1', 3, 8, 1, 257),
(42, '2018-12-13 21:33:04', '1', 1, 16, 1, 57),
(43, '2018-12-13 22:21:02', '1', 1, 16, 1, 57),
(44, '2018-12-13 21:40:15', '18', 1, 16, 1, 57),
(45, '2018-12-14 11:47:55', '1', 3, 7, 1, 153),
(46, '2018-12-14 11:59:20', '1', 5, 5, 50, 2750),
(47, '2018-12-18 22:16:05', '1', 1, 16, 1, 57),
(48, '2018-12-18 21:31:13', '1', 4, 1, 1, 60),
(49, '2018-12-18 21:31:13', '1', 2, 7, 1, 25),
(50, '2018-12-17 19:36:47', '1', 1, 16, 1, 57),
(51, '2018-12-19 01:18:44', '1', 1, 2, 1, 155),
(52, '2018-12-18 23:28:27', '1', 2, 7, 1, 25),
(53, '2018-12-18 23:28:27', '1', 2, 6, 1, 125),
(54, '2018-12-18 23:28:27', '1', 2, 3, 1, 27),
(55, '2018-12-19 11:12:35', '1', 1, 16, 1, 57);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsu_temp`
--

CREATE TABLE `lichsu_temp` (
  `history_id` int(11) NOT NULL,
  `history_date` datetime NOT NULL,
  `history_iduser` int(11) NOT NULL,
  `history_idtheloai` int(11) NOT NULL,
  `history_idbook` int(11) NOT NULL,
  `history_num` int(11) NOT NULL,
  `history_totalprice` int(11) NOT NULL,
  `history_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lichsu_temp`
--

INSERT INTO `lichsu_temp` (`history_id`, `history_date`, `history_iduser`, `history_idtheloai`, `history_idbook`, `history_num`, `history_totalprice`, `history_status`) VALUES
(50, '2018-12-13 21:40:15', 18, 1, 16, 1, 57, 1),
(73, '2018-12-19 11:13:47', 1, 3, 8, 1, 257, 0),
(75, '2018-12-19 11:23:50', 1, 1, 16, 1, 57, 0),
(77, '2018-12-19 11:39:03', 1, 3, 7, 1, 153, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `messages`
--

CREATE TABLE `messages` (
  `id_msg` int(11) NOT NULL,
  `body` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user_from` text COLLATE utf8_unicode_ci NOT NULL,
  `date_sent` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `messages`
--

INSERT INTO `messages` (`id_msg`, `body`, `user_from`, `date_sent`) VALUES
(100, '1', 'admin', '2018-12-14 16:41:25'),
(101, '2', 'thucdong', '2018-12-14 16:41:52'),
(102, '3', 'admin', '2018-12-18 20:13:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `matheloai` int(11) NOT NULL,
  `theloai` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`matheloai`, `theloai`) VALUES
(1, 'Tin học'),
(2, 'Pháp luật'),
(3, 'Kinh tế'),
(4, 'Âm nhạc'),
(5, 'Tâm lý - tình cảm'),
(6, 'Ngoại ngữ'),
(7, 'Địa lý'),
(8, 'Văn học'),
(9, 'Kỹ năng sống'),
(10, 'Lịch sử'),
(11, 'Y khoa'),
(12, 'Nghệ thuật'),
(13, 'Võ thuật');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `account_role`
--
ALTER TABLE `account_role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `book1`
--
ALTER TABLE `book1`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `book2`
--
ALTER TABLE `book2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title` (`title`);

--
-- Chỉ mục cho bảng `book3`
--
ALTER TABLE `book3`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title` (`title`);

--
-- Chỉ mục cho bảng `book4`
--
ALTER TABLE `book4`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title` (`title`);

--
-- Chỉ mục cho bảng `book5`
--
ALTER TABLE `book5`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title` (`title`);

--
-- Chỉ mục cho bảng `book6`
--
ALTER TABLE `book6`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title` (`title`);

--
-- Chỉ mục cho bảng `book7`
--
ALTER TABLE `book7`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title` (`title`);

--
-- Chỉ mục cho bảng `book8`
--
ALTER TABLE `book8`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title` (`title`);

--
-- Chỉ mục cho bảng `book9`
--
ALTER TABLE `book9`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title` (`title`);

--
-- Chỉ mục cho bảng `book10`
--
ALTER TABLE `book10`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title` (`title`),
  ADD KEY `title_2` (`title`);

--
-- Chỉ mục cho bảng `book11`
--
ALTER TABLE `book11`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title` (`title`);

--
-- Chỉ mục cho bảng `book12`
--
ALTER TABLE `book12`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title` (`title`);

--
-- Chỉ mục cho bảng `book13`
--
ALTER TABLE `book13`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `booknews`
--
ALTER TABLE `booknews`
  ADD PRIMARY KEY (`news_id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Chỉ mục cho bảng `kho`
--
ALTER TABLE `kho`
  ADD PRIMARY KEY (`kho_id`);

--
-- Chỉ mục cho bảng `lichsu`
--
ALTER TABLE `lichsu`
  ADD PRIMARY KEY (`history_id`);

--
-- Chỉ mục cho bảng `lichsu_temp`
--
ALTER TABLE `lichsu_temp`
  ADD PRIMARY KEY (`history_id`);

--
-- Chỉ mục cho bảng `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_msg`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`matheloai`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `account_role`
--
ALTER TABLE `account_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `book1`
--
ALTER TABLE `book1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `book2`
--
ALTER TABLE `book2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `book3`
--
ALTER TABLE `book3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `book4`
--
ALTER TABLE `book4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `book5`
--
ALTER TABLE `book5`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `book6`
--
ALTER TABLE `book6`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `book7`
--
ALTER TABLE `book7`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `book8`
--
ALTER TABLE `book8`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `book9`
--
ALTER TABLE `book9`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `book10`
--
ALTER TABLE `book10`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `book11`
--
ALTER TABLE `book11`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `book12`
--
ALTER TABLE `book12`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `book13`
--
ALTER TABLE `book13`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `booknews`
--
ALTER TABLE `booknews`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `kho`
--
ALTER TABLE `kho`
  MODIFY `kho_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT cho bảng `lichsu`
--
ALTER TABLE `lichsu`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `lichsu_temp`
--
ALTER TABLE `lichsu_temp`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT cho bảng `messages`
--
ALTER TABLE `messages`
  MODIFY `id_msg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT cho bảng `theloai`
--
ALTER TABLE `theloai`
  MODIFY `matheloai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
