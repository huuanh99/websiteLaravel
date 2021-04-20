-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 20, 2021 lúc 06:08 PM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `commercial_laravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(150) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `level` int(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `level`, `created_at`, `updated_at`) VALUES
(1, 'huuanh', 'anh@gmail.com', 'anhadmin', 'e10adc3949ba59abbe56e057f20f883e', 0, '2021-04-20 14:29:54', '2021-04-20 07:33:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `id` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`id`, `brandName`, `created_at`, `updated_at`) VALUES
(1, 'DELL', '2021-04-20 04:29:38', '2021-04-20 04:29:55'),
(2, 'SAMSUNG', '2021-04-20 04:29:38', '2021-04-20 04:29:55'),
(3, 'Apple', '2021-04-20 04:29:38', '2021-04-20 04:29:55'),
(4, 'Huawei', '2021-04-20 04:29:38', '2021-04-20 04:29:55'),
(9, 'ACER', '2021-04-20 04:29:38', '2021-04-20 04:29:55'),
(10, 'CANON', '2021-04-20 04:29:38', '2021-04-20 04:29:55'),
(11, 'SONY', '2021-04-20 04:29:38', '2021-04-20 04:29:55'),
(12, 'BITIS', '2021-04-20 04:29:38', '2021-04-20 04:29:55'),
(13, 'MAC', '2021-04-20 04:29:38', '2021-04-20 04:29:55'),
(14, 'NO BRAND', '2021-04-20 04:29:38', '2021-04-20 04:29:55'),
(15, 'PNJ', '2021-04-20 04:29:38', '2021-04-20 04:29:55'),
(16, 'Meteor Shower', '2021-04-20 04:29:38', '2021-04-20 04:29:55'),
(17, 'BKAV', '2021-04-20 04:29:38', '2021-04-20 04:29:55'),
(18, 'OEM', '2021-04-20 04:29:38', '2021-04-20 04:29:55'),
(20, 'VinSmart', '2021-04-20 01:04:24', '2021-04-20 01:04:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `catName`, `created_at`, `updated_at`) VALUES
(4, 'LAPTOP', '2021-04-20 03:35:43', '2021-04-20 03:34:53'),
(5, 'Desktop', '2021-04-20 03:35:43', '2021-04-20 03:34:53'),
(6, 'Mobile Phone', '2021-04-20 03:35:43', '2021-04-20 03:34:53'),
(7, 'Clothing', '2021-04-20 03:35:43', '2021-04-20 03:34:53'),
(8, 'Software', '2021-04-20 03:35:43', '2021-04-20 03:34:53'),
(9, 'Acessories', '2021-04-20 03:35:43', '2021-04-20 03:34:53'),
(10, 'Jewellery', '2021-04-20 03:35:43', '2021-04-20 03:34:53'),
(11, 'Toys Kids', '2021-04-20 03:35:43', '2021-04-20 03:34:53'),
(12, 'Home Decor', '2021-04-20 03:35:43', '2021-04-20 03:34:53'),
(13, 'Beauty Healthcare', '2021-04-20 03:35:43', '2021-04-20 03:34:53'),
(14, 'Shoes', '2021-04-20 03:35:43', '2021-04-20 03:34:53'),
(15, 'Tivi', '2021-04-20 03:35:43', '2021-04-20 03:34:53'),
(18, 'Other', '2021-04-20 03:35:43', '2021-04-20 03:34:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `zipcode` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `city`, `country`, `zipcode`, `phone`, `email`, `password`, `updated_at`) VALUES
(9, 'hoangdinh', '6lk4b khu đô thị mỗ lao', 'hÃ  ná»™i', 'AR', '12345', '0945586004', 'dinh@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2021-04-20 07:03:09'),
(10, 'thu thảo', '124 nguyễn trãi', 'hÃ  ná»™i', 'AR', '123456', '0937564982', 'thao@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2021-04-18 02:15:11'),
(11, 'Quang Huy', '112 Quang Trung', 'SÃ i GÃ²n', 'AF', '5454534', '0945023423', 'huy@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2021-04-18 09:13:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `zipcode` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `time_order` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `customer_id`, `total`, `name`, `zipcode`, `address`, `phone`, `email`, `status`, `time_order`, `created_at`, `updated_at`) VALUES
(20, 10, 425600, 'thu thảo', '123456', '124 nguyễn trãi', '0937564982', 'thao@gmail.com', 2, '2021-04-20 13:32:06', '2021-04-20 06:32:06', '2021-04-20 06:59:59'),
(21, 9, 1671050, 'hoangdinh', '12331', '6lk4b khu đô thị mỗ lao', '0945586004', 'dinh@gmail.com', 0, '2021-04-20 14:01:07', '2021-04-20 07:01:07', '2021-04-20 07:01:07'),
(22, 9, 232750, 'hoangdinh', '12331', '6lk4b khu đô thị mỗ lao', '0945586004', 'dinh@gmail.com', 2, '2021-04-20 14:01:35', '2021-04-20 07:01:35', '2021-04-20 07:02:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_orderdetails`
--

CREATE TABLE `tbl_orderdetails` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_orderdetails`
--

INSERT INTO `tbl_orderdetails` (`id`, `order_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(20, 20, 25, 2, '2021-04-20 06:32:06', '2021-04-20 06:32:06'),
(21, 20, 24, 3, '2021-04-20 06:32:06', '2021-04-20 06:32:06'),
(22, 21, 19, 1, '2021-04-20 07:01:07', '2021-04-20 07:01:07'),
(23, 21, 20, 1, '2021-04-20 07:01:07', '2021-04-20 07:01:07'),
(24, 21, 22, 2, '2021-04-20 07:01:07', '2021-04-20 07:01:07'),
(25, 22, 21, 1, '2021-04-20 07:01:35', '2021-04-20 07:01:35'),
(26, 22, 26, 1, '2021-04-20 07:01:35', '2021-04-20 07:01:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `productName` text NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `product_desc` text NOT NULL,
  `type` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `productName`, `catId`, `brandId`, `product_desc`, `type`, `price`, `image`, `created_at`, `updated_at`) VALUES
(12, 'iMac 27\'\' 2020 - 3.3GHz 6-Core I5 8GB 512GB Radeon Pro 5300 4GB', 5, 3, '3.3GHz 6-core 10th-generation Intel Core i5 processor\r\nTurbo Boost up to 4.8GHz\r\n8GB 2666MHz DDR4 memory\r\n512GB SSD storage\r\nRadeon Pro 5300 with 4GB of GDDR6 memory\r\nTwo Thunderbolt 3 ports\r\nRetina 5K 5120-by-2880 P3 display with True Tone', 1, '51800000', '2729b66c97.png', '2021-04-20 10:13:44', '2021-04-20 10:13:44'),
(13, 'Samsung Galaxy S9', 6, 2, 'Chiếc điện thoại hiện đại nhất của SAMSUNG', 0, '26300000', 'cca53d8297.jpg', '2021-04-20 10:13:44', '2021-04-20 10:13:44'),
(14, 'Máy ảnh Canon EOS 800D', 18, 10, 'Máy ảnh siêu đẹp', 0, '17290000', '2c8d4dfd3c.jpg', '2021-04-20 10:13:44', '2021-04-20 10:13:44'),
(15, 'Laptop Acer Nitro 5', 4, 9, 'Laptop hàng đầu đến từ ACER', 0, '19590000', '75aac86276.jpg', '2021-04-20 10:13:44', '2021-04-20 10:13:44'),
(16, 'Iphone 12 Pro Max', 6, 3, 'Siêu phẩm đến từ Apple', 0, '29090000', '6d93b5b901.jpg', '2021-04-20 10:13:44', '2021-04-20 10:13:44'),
(17, 'Tủ lạnh Samsung', 18, 2, 'Tủ lạnh hiện đại', 0, '15950000', 'b40924eb30.jpg', '2021-04-20 10:13:44', '2021-04-20 10:13:44'),
(18, 'Smart Tivi Sony 65 inch KD-65X7000G', 15, 11, 'Kiểu dáng sang trọng với chân đế kim loại, kích thước màn hình lớn 65 inch.\r\nĐộ phân giải 4K sắc nét đi kèm công nghệ HDR10 cho hình ảnh chân thật.\r\nHình ảnh có dải màu rộng, mang đến màu sắc rực rỡ, tự nhiên cùng công nghệ màn hình chấm lượng tử TRILUMINOS.\r\nNâng cấp hình ảnh độ phân giải thấp cho chất lượng sắc nét gần bằng 4K với công nghệ 4K X-Reality PRO.\r\nÂm thanh sống động, mạnh mẽ với công nghệ S-Force Front Surround.\r\nHệ điều hành Linux OS ổn định, dễ thao tác cùng nhiều ứng dụng giải trí phổ biến.\r\nHỗ trợ chiếu màn hình điện thoại android lên tivi với tính năng Screen Mirroring.', 1, '16900000', '2251e4c6e6.jpg', '2021-04-20 10:13:44', '2021-04-20 10:13:44'),
(19, 'Giày Thể Thao Nam Biti\'s Hunter Street - Hanoi Culture Patchwork Old Wall Yellow DSMH02503NAU', 14, 12, 'Tên sản phẩm: Giày Thể Thao Nam Biti\'s Hunter Street - Hanoi Culture Patchwork DSMH02503NAU\r\nThương hiệu:Biti\'s\r\nChính hãng 100%\r\nThời gian bảo hành:3 tháng\r\nĐổi size trong vòng 7 ngày\r\n', 1, '899000', '7e6d2691b9.png', '2021-04-20 10:13:44', '2021-04-20 10:13:44'),
(20, 'Son MAC Chili', 13, 13, '- Chất son lì không bóng.\r\n- Độ lên màu chuẩn.\r\n- Giữ màu lâu đến 5h.\r\n- Không lộ vân môi.', 1, '580000', '7e467ba202.png', '2021-04-20 10:13:44', '2021-04-20 10:13:44'),
(21, 'Kệ Sắt Đáy Gỗ Treo Tường Để Đồ Đa Năng,Trang Trí Nhà Cửa ,Decor Quán Xá - Tặng Kèm Đinh Và Miếng Dán Tường', 12, 14, 'Thông tin sản phẩm:Kệ Sắt Đáy Gỗ Treo Tường Để Đồ Đa Năng, Trang Trí Nhà Cửa , Quán Xá \r\n- Màu Sắc : Màu Đen\r\n- Chất liệu: kệ sắt + đáy gỗ \r\n- Thiết kế : Có Rào Chắn\r\n- Màu sắc: trắng, đen, hồng\r\n- Tặng đinh hoặc móc treo tường\r\n- Kích thước: \r\n+ Size L:  12*14* 45 cm\r\n+ Size M: 11*13* 35 cm\r\n+ Size S: 10*12* 25 cm\r\nĐặc điểm nổi bật:\r\n- Kiểu dáng hiện đại, thu hút người nhìn\r\n- Trang trí nhà cửa, phòng khách, phòng làm việc, quán trà, cafe, khách sạn,...\r\n- Dụng cụ trang trí cho các studio chụp hình, quay quảng cáo,...\r\n- Đựng dụng cụ gia đình, như vật dụng nhà bếp, nhà tắm, .....\r\n- Chịu lực tốt, độ bền cao\r\n- Có loại có thanh ngang giữ đồ giúp đồ không bị rơi vỡ\r\nShop Gia Linh Cam Kết : \r\n- Hình ảnh sản phẩm giống 100%.\r\n- Chất lượng sản phẩm tốt 100%.\r\n- Sản phẩm được kiểm tra kĩ càng, nghiêm ngặt trước khi giao hàng.\r\n- Sản phẩm luôn có sẵn trong kho hàng. \r\n- Giao hàng ngay khi nhận được đơn hàng.\r\n- Hoàn tiền ngay nếu sản phẩm không giống với mô tả.\r\n- Giao hàng toàn quốc, nhận hàng thanh toán. \r\n- Hỗ trợ đổi trả theo quy định.\r\n- Gửi hàng siêu tốc', 1, '125000', 'eed4f413c1.png', '2021-04-20 10:13:44', '2021-04-20 10:13:44'),
(22, 'Ô tô điều khiển từ xa siêu xe Lamborghini DK81003', 11, 14, '- Chất liệu: Nhựa ABS, không chứa hóa chất độc hại, không có viền sắc nhọn, an toàn cho bé\r\n\r\n- Tỉ lệ thiết kế xe: 1:18\r\n\r\n- Pin: 4 pin 1,5V, 2A\r\n\r\n- Độ tuổi: 6 tuổi trở lên\r\n\r\n- Xuất xứ: Trung Quốc\r\n\r\n- Chức năng: 4 chức năng: Tới – lùi - rẽ trái - rẽ phải\r\n\r\n- Xe được thiết kế mô phỏng theo xe thật với tỉ lệ 1:16, thiết kế mô phỏng theo siêu xe Lamborghini với đường nét thể thao, mạnh mẽ\r\n\r\n- Các chi tiết của xe được làm tỉ mỉ, công phu, không góc cạnh\r\n\r\n- Hệ thống điều khiển radio (R/C) ổn định hoạt động tốt ở khoảng cách xa.\r\n\r\n- Sử dụng 4 pin AA (Sản phẩm không kèm pin)\r\n\r\n- Xe được làm từ chất liệu nhựa an toàn với sức khỏe trẻ nhỏ, để phụ huynh an tâm khi bé vui chơi.', 1, '140000', '91747ae3d0.png', '2021-04-20 10:13:44', '2021-04-20 10:13:44'),
(23, 'Bộ trang sức Vàng 14K đính đá CZ PNJ 00132-00103', 10, 15, 'Thương hiệu:\r\nPNJ\r\n \r\nLoại đá chính:\r\nCZ\r\n \r\nMàu đá chính:\r\nTrắng\r\n \r\nHình dạng đá:\r\nTròn\r\n \r\nGiới tính:\r\nNữ\r\n \r\nDịp tặng quà:\r\nSinh nhật\r\nTình yêu\r\nNgày kỷ niệm\r\nCác dịp lễ tết\r\n \r\nQuà tặng cho người thân:\r\nCho Nàng\r\nCho Mẹ\r\n \r\nChủng loại:\r\nSản phẩm theo bộ', 1, '25659000', '2dd107916f.png', '2021-04-20 10:13:44', '2021-04-20 10:13:44'),
(24, 'Vòng Cổ Choker Da Pu Mặt Hình Mưa Sao Băng', 9, 16, 'choker đẹp giá rẻ', 1, '20000', 'c3728b63a0.jpg', '2021-04-20 10:13:44', '2021-04-20 10:13:44'),
(25, 'Phần Mềm Diệt Virus BKAV Profressional 12 Tháng - Hàng Chính Hãng', 8, 17, 'Ngăn chặn bị theo dõi bởi phần mềm gián điệp\r\nNgăn chặn đánh cắp tài khoản ngân hàng, đánh cắp mật khẩu\r\nQuét virus làm chậm máy\r\nSử dụng trí tuệ nhân tạo (AI), tích hợp công nghệ điện toán đám mây, bảo vệ đa lớp\r\nPhần Mềm Diệt Virus BKAV Profressional sử dụng Trí tuệ nhân tạo (AI) tổng hợp các dữ liệu được ghi nhận, phân tích và chỉ ra các mối nguy hiểm người sử dụng có thể gặp phải như bị xóa dữ liệu, bị theo dõi bởi phần mềm gián điệp hay bị mất cắp tài khoản… từ đó phát lệnh xử lý, ngăn chặn và tiêu diệt mã độc.\r\nBkav Pro Internet Security là phần mềm diệt virus tiên phong trong sử dụng công nghệ điện toán đám mây trong lĩnh vực bảo mật, là phần mềm tốt nhất do Hiệp hội An toàn thông tin Việt Nam bình chọn.\r\nBkav Pro được trang bị những công nghệ cao cấp, bảo vệ đa lớp, tự động phát hiện và tiêu diệt virus mà không cần cập nhật mẫu nhận diện mới.\r\nCác bản update được cập nhật liên tục từ máy chủ Bkav, đảm bảo phần mềm luôn có đầy đủ sức mạnh và tính năng mới nhất.\r\nSử dụng Bkav Pro giúp bảo vệ máy tính một cách toàn diện ngăn chặn các loại virus xóa dữ liệu, bị theo dõi bởi phần mềm gián điệp, bị đánh cắp tài khoản ngân hàng,…', 1, '194000', 'a4eaad81fa.png', '2021-04-20 10:13:44', '2021-04-20 10:13:44'),
(26, 'Áo khoác nữ Bomber bóng chày', 7, 18, 'ÁO KHOÁC NAM NỮ BOMBER BÓNG CHÀY NEW YORK XINH XẮN SIÊU HOT TREND', 0, '120000', 'c9131caa64.png', '2021-04-20 10:13:44', '2021-04-20 05:12:09');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `tbl_orderdetails`
--
ALTER TABLE `tbl_orderdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `tbl_orderdetails`
--
ALTER TABLE `tbl_orderdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_orderdetails`
--
ALTER TABLE `tbl_orderdetails`
  ADD CONSTRAINT `tbl_orderdetails_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_orderdetails_ibfk_4` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
