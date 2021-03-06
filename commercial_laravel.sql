-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 02, 2021 lúc 04:28 PM
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
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2021_04_30_022258_create_comment_table', 1),
(12, '2021_04_30_153441_create_slider_table', 2),
(15, '2021_05_01_062057_create_table_import', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(150) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `is_activated` int(1) NOT NULL DEFAULT 0,
  `level` int(1) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `adminName`, `adminEmail`, `adminPass`, `remember_token`, `is_activated`, `level`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Trần Hữu Anh', 'anh@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 1, 1, 1, '2021-04-20 14:29:54', '2021-05-01 21:29:02'),
(2, 'Trần Đức Hùng', 'duchung@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 1, 0, 1, '2021-05-01 06:40:26', '2021-05-01 21:35:45'),
(4, 'quang', 'quang@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 1, 0, 1, '2021-05-01 08:26:38', '2021-05-01 08:26:38'),
(14, 'Trang', 'huuanhpro00@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 1, 0, 1, '2021-05-02 05:42:48', '2021-05-02 05:47:45');

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
-- Cấu trúc bảng cho bảng `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_comment`
--

INSERT INTO `tbl_comment` (`id`, `customer_id`, `product_id`, `body`, `created_at`, `updated_at`) VALUES
(7, 9, 12, 'Sản phẩm có bảo hành không ạ', '2021-04-29 23:11:07', '2021-04-29 23:11:07'),
(10, 11, 25, 'từ khi dùng sản phẩm này máy mình không còn virus nữa', '2021-04-30 21:13:09', '2021-04-30 21:13:09'),
(11, 9, 25, 'phần mềm này có thời hạn bao lâu hả bạn?', '2021-04-30 21:13:54', '2021-04-30 21:13:54'),
(12, 10, 26, 'áo đẹp quá', '2021-05-01 20:13:35', '2021-05-01 20:13:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_countries`
--

CREATE TABLE `tbl_countries` (
  `id` int(11) NOT NULL,
  `phone_code` int(5) NOT NULL,
  `country_code` char(2) NOT NULL,
  `country_name` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_countries`
--

INSERT INTO `tbl_countries` (`id`, `phone_code`, `country_code`, `country_name`) VALUES
(1, 93, 'AF', 'Afghanistan'),
(2, 358, 'AX', 'Aland Islands'),
(3, 355, 'AL', 'Albania'),
(4, 213, 'DZ', 'Algeria'),
(5, 1684, 'AS', 'American Samoa'),
(6, 376, 'AD', 'Andorra'),
(7, 244, 'AO', 'Angola'),
(8, 1264, 'AI', 'Anguilla'),
(9, 672, 'AQ', 'Antarctica'),
(10, 1268, 'AG', 'Antigua and Barbuda'),
(11, 54, 'AR', 'Argentina'),
(12, 374, 'AM', 'Armenia'),
(13, 297, 'AW', 'Aruba'),
(14, 61, 'AU', 'Australia'),
(15, 43, 'AT', 'Austria'),
(16, 994, 'AZ', 'Azerbaijan'),
(17, 1242, 'BS', 'Bahamas'),
(18, 973, 'BH', 'Bahrain'),
(19, 880, 'BD', 'Bangladesh'),
(20, 1246, 'BB', 'Barbados'),
(21, 375, 'BY', 'Belarus'),
(22, 32, 'BE', 'Belgium'),
(23, 501, 'BZ', 'Belize'),
(24, 229, 'BJ', 'Benin'),
(25, 1441, 'BM', 'Bermuda'),
(26, 975, 'BT', 'Bhutan'),
(27, 591, 'BO', 'Bolivia'),
(28, 599, 'BQ', 'Bonaire, Sint Eustatius and Saba'),
(29, 387, 'BA', 'Bosnia and Herzegovina'),
(30, 267, 'BW', 'Botswana'),
(31, 55, 'BV', 'Bouvet Island'),
(32, 55, 'BR', 'Brazil'),
(33, 246, 'IO', 'British Indian Ocean Territory'),
(34, 673, 'BN', 'Brunei Darussalam'),
(35, 359, 'BG', 'Bulgaria'),
(36, 226, 'BF', 'Burkina Faso'),
(37, 257, 'BI', 'Burundi'),
(38, 855, 'KH', 'Cambodia'),
(39, 237, 'CM', 'Cameroon'),
(40, 1, 'CA', 'Canada'),
(41, 238, 'CV', 'Cape Verde'),
(42, 1345, 'KY', 'Cayman Islands'),
(43, 236, 'CF', 'Central African Republic'),
(44, 235, 'TD', 'Chad'),
(45, 56, 'CL', 'Chile'),
(46, 86, 'CN', 'China'),
(47, 61, 'CX', 'Christmas Island'),
(48, 672, 'CC', 'Cocos (Keeling) Islands'),
(49, 57, 'CO', 'Colombia'),
(50, 269, 'KM', 'Comoros'),
(51, 242, 'CG', 'Congo'),
(52, 242, 'CD', 'Congo, Democratic Republic of the Congo'),
(53, 682, 'CK', 'Cook Islands'),
(54, 506, 'CR', 'Costa Rica'),
(55, 225, 'CI', 'Cote D\'Ivoire'),
(56, 385, 'HR', 'Croatia'),
(57, 53, 'CU', 'Cuba'),
(58, 599, 'CW', 'Curacao'),
(59, 357, 'CY', 'Cyprus'),
(60, 420, 'CZ', 'Czech Republic'),
(61, 45, 'DK', 'Denmark'),
(62, 253, 'DJ', 'Djibouti'),
(63, 1767, 'DM', 'Dominica'),
(64, 1809, 'DO', 'Dominican Republic'),
(65, 593, 'EC', 'Ecuador'),
(66, 20, 'EG', 'Egypt'),
(67, 503, 'SV', 'El Salvador'),
(68, 240, 'GQ', 'Equatorial Guinea'),
(69, 291, 'ER', 'Eritrea'),
(70, 372, 'EE', 'Estonia'),
(71, 251, 'ET', 'Ethiopia'),
(72, 500, 'FK', 'Falkland Islands (Malvinas)'),
(73, 298, 'FO', 'Faroe Islands'),
(74, 679, 'FJ', 'Fiji'),
(75, 358, 'FI', 'Finland'),
(76, 33, 'FR', 'France'),
(77, 594, 'GF', 'French Guiana'),
(78, 689, 'PF', 'French Polynesia'),
(79, 262, 'TF', 'French Southern Territories'),
(80, 241, 'GA', 'Gabon'),
(81, 220, 'GM', 'Gambia'),
(82, 995, 'GE', 'Georgia'),
(83, 49, 'DE', 'Germany'),
(84, 233, 'GH', 'Ghana'),
(85, 350, 'GI', 'Gibraltar'),
(86, 30, 'GR', 'Greece'),
(87, 299, 'GL', 'Greenland'),
(88, 1473, 'GD', 'Grenada'),
(89, 590, 'GP', 'Guadeloupe'),
(90, 1671, 'GU', 'Guam'),
(91, 502, 'GT', 'Guatemala'),
(92, 44, 'GG', 'Guernsey'),
(93, 224, 'GN', 'Guinea'),
(94, 245, 'GW', 'Guinea-Bissau'),
(95, 592, 'GY', 'Guyana'),
(96, 509, 'HT', 'Haiti'),
(97, 0, 'HM', 'Heard Island and Mcdonald Islands'),
(98, 39, 'VA', 'Holy See (Vatican City State)'),
(99, 504, 'HN', 'Honduras'),
(100, 852, 'HK', 'Hong Kong'),
(101, 36, 'HU', 'Hungary'),
(102, 354, 'IS', 'Iceland'),
(103, 91, 'IN', 'India'),
(104, 62, 'ID', 'Indonesia'),
(105, 98, 'IR', 'Iran, Islamic Republic of'),
(106, 964, 'IQ', 'Iraq'),
(107, 353, 'IE', 'Ireland'),
(108, 44, 'IM', 'Isle of Man'),
(109, 972, 'IL', 'Israel'),
(110, 39, 'IT', 'Italy'),
(111, 1876, 'JM', 'Jamaica'),
(112, 81, 'JP', 'Japan'),
(113, 44, 'JE', 'Jersey'),
(114, 962, 'JO', 'Jordan'),
(115, 7, 'KZ', 'Kazakhstan'),
(116, 254, 'KE', 'Kenya'),
(117, 686, 'KI', 'Kiribati'),
(118, 850, 'KP', 'Korea, Democratic People\'s Republic of'),
(119, 82, 'KR', 'Korea, Republic of'),
(120, 381, 'XK', 'Kosovo'),
(121, 965, 'KW', 'Kuwait'),
(122, 996, 'KG', 'Kyrgyzstan'),
(123, 856, 'LA', 'Lao People\'s Democratic Republic'),
(124, 371, 'LV', 'Latvia'),
(125, 961, 'LB', 'Lebanon'),
(126, 266, 'LS', 'Lesotho'),
(127, 231, 'LR', 'Liberia'),
(128, 218, 'LY', 'Libyan Arab Jamahiriya'),
(129, 423, 'LI', 'Liechtenstein'),
(130, 370, 'LT', 'Lithuania'),
(131, 352, 'LU', 'Luxembourg'),
(132, 853, 'MO', 'Macao'),
(133, 389, 'MK', 'Macedonia, the Former Yugoslav Republic of'),
(134, 261, 'MG', 'Madagascar'),
(135, 265, 'MW', 'Malawi'),
(136, 60, 'MY', 'Malaysia'),
(137, 960, 'MV', 'Maldives'),
(138, 223, 'ML', 'Mali'),
(139, 356, 'MT', 'Malta'),
(140, 692, 'MH', 'Marshall Islands'),
(141, 596, 'MQ', 'Martinique'),
(142, 222, 'MR', 'Mauritania'),
(143, 230, 'MU', 'Mauritius'),
(144, 269, 'YT', 'Mayotte'),
(145, 52, 'MX', 'Mexico'),
(146, 691, 'FM', 'Micronesia, Federated States of'),
(147, 373, 'MD', 'Moldova, Republic of'),
(148, 377, 'MC', 'Monaco'),
(149, 976, 'MN', 'Mongolia'),
(150, 382, 'ME', 'Montenegro'),
(151, 1664, 'MS', 'Montserrat'),
(152, 212, 'MA', 'Morocco'),
(153, 258, 'MZ', 'Mozambique'),
(154, 95, 'MM', 'Myanmar'),
(155, 264, 'NA', 'Namibia'),
(156, 674, 'NR', 'Nauru'),
(157, 977, 'NP', 'Nepal'),
(158, 31, 'NL', 'Netherlands'),
(159, 599, 'AN', 'Netherlands Antilles'),
(160, 687, 'NC', 'New Caledonia'),
(161, 64, 'NZ', 'New Zealand'),
(162, 505, 'NI', 'Nicaragua'),
(163, 227, 'NE', 'Niger'),
(164, 234, 'NG', 'Nigeria'),
(165, 683, 'NU', 'Niue'),
(166, 672, 'NF', 'Norfolk Island'),
(167, 1670, 'MP', 'Northern Mariana Islands'),
(168, 47, 'NO', 'Norway'),
(169, 968, 'OM', 'Oman'),
(170, 92, 'PK', 'Pakistan'),
(171, 680, 'PW', 'Palau'),
(172, 970, 'PS', 'Palestinian Territory, Occupied'),
(173, 507, 'PA', 'Panama'),
(174, 675, 'PG', 'Papua New Guinea'),
(175, 595, 'PY', 'Paraguay'),
(176, 51, 'PE', 'Peru'),
(177, 63, 'PH', 'Philippines'),
(178, 64, 'PN', 'Pitcairn'),
(179, 48, 'PL', 'Poland'),
(180, 351, 'PT', 'Portugal'),
(181, 1787, 'PR', 'Puerto Rico'),
(182, 974, 'QA', 'Qatar'),
(183, 262, 'RE', 'Reunion'),
(184, 40, 'RO', 'Romania'),
(185, 70, 'RU', 'Russian Federation'),
(186, 250, 'RW', 'Rwanda'),
(187, 590, 'BL', 'Saint Barthelemy'),
(188, 290, 'SH', 'Saint Helena'),
(189, 1869, 'KN', 'Saint Kitts and Nevis'),
(190, 1758, 'LC', 'Saint Lucia'),
(191, 590, 'MF', 'Saint Martin'),
(192, 508, 'PM', 'Saint Pierre and Miquelon'),
(193, 1784, 'VC', 'Saint Vincent and the Grenadines'),
(194, 684, 'WS', 'Samoa'),
(195, 378, 'SM', 'San Marino'),
(196, 239, 'ST', 'Sao Tome and Principe'),
(197, 966, 'SA', 'Saudi Arabia'),
(198, 221, 'SN', 'Senegal'),
(199, 381, 'RS', 'Serbia'),
(200, 381, 'CS', 'Serbia and Montenegro'),
(201, 248, 'SC', 'Seychelles'),
(202, 232, 'SL', 'Sierra Leone'),
(203, 65, 'SG', 'Singapore'),
(204, 1, 'SX', 'Sint Maarten'),
(205, 421, 'SK', 'Slovakia'),
(206, 386, 'SI', 'Slovenia'),
(207, 677, 'SB', 'Solomon Islands'),
(208, 252, 'SO', 'Somalia'),
(209, 27, 'ZA', 'South Africa'),
(210, 500, 'GS', 'South Georgia and the South Sandwich Islands'),
(211, 211, 'SS', 'South Sudan'),
(212, 34, 'ES', 'Spain'),
(213, 94, 'LK', 'Sri Lanka'),
(214, 249, 'SD', 'Sudan'),
(215, 597, 'SR', 'Suriname'),
(216, 47, 'SJ', 'Svalbard and Jan Mayen'),
(217, 268, 'SZ', 'Swaziland'),
(218, 46, 'SE', 'Sweden'),
(219, 41, 'CH', 'Switzerland'),
(220, 963, 'SY', 'Syrian Arab Republic'),
(221, 886, 'TW', 'Taiwan, Province of China'),
(222, 992, 'TJ', 'Tajikistan'),
(223, 255, 'TZ', 'Tanzania, United Republic of'),
(224, 66, 'TH', 'Thailand'),
(225, 670, 'TL', 'Timor-Leste'),
(226, 228, 'TG', 'Togo'),
(227, 690, 'TK', 'Tokelau'),
(228, 676, 'TO', 'Tonga'),
(229, 1868, 'TT', 'Trinidad and Tobago'),
(230, 216, 'TN', 'Tunisia'),
(231, 90, 'TR', 'Turkey'),
(232, 7370, 'TM', 'Turkmenistan'),
(233, 1649, 'TC', 'Turks and Caicos Islands'),
(234, 688, 'TV', 'Tuvalu'),
(235, 256, 'UG', 'Uganda'),
(236, 380, 'UA', 'Ukraine'),
(237, 971, 'AE', 'United Arab Emirates'),
(238, 44, 'GB', 'United Kingdom'),
(239, 1, 'US', 'United States'),
(240, 1, 'UM', 'United States Minor Outlying Islands'),
(241, 598, 'UY', 'Uruguay'),
(242, 998, 'UZ', 'Uzbekistan'),
(243, 678, 'VU', 'Vanuatu'),
(244, 58, 'VE', 'Venezuela'),
(245, 84, 'VN', 'Viet Nam'),
(246, 1284, 'VG', 'Virgin Islands, British'),
(247, 1340, 'VI', 'Virgin Islands, U.s.'),
(248, 681, 'WF', 'Wallis and Futuna'),
(249, 212, 'EH', 'Western Sahara'),
(250, 967, 'YE', 'Yemen'),
(251, 260, 'ZM', 'Zambia'),
(252, 263, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(30) NOT NULL,
  `country_id` varchar(30) NOT NULL,
  `zipcode` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_activated` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `city`, `country_id`, `zipcode`, `phone`, `email`, `remember_token`, `password`, `is_activated`, `created_at`, `updated_at`) VALUES
(9, 'hoangdinh', '6lk4b khu đô thị mỗ lao', 'Istanbul', '231', '12345', '0945586004', 'dinh@gmail.com', NULL, 'e10adc3949ba59abbe56e057f20f883e', 1, '2021-04-25 05:39:14', '2021-04-24 23:03:07'),
(10, 'thu thảo', '124 nguyễn trãi', 'Sài Gòn', '245', '123456', '0937564982', 'thao@gmail.com', NULL, 'e10adc3949ba59abbe56e057f20f883e', 1, '2021-04-25 05:39:14', '2021-04-24 23:02:05'),
(11, 'Quang Huy', '112 Quang Trung', 'Nam Định', '245', '5454534', '0945023423', 'huy@gmail.com', NULL, 'e10adc3949ba59abbe56e057f20f883e', 1, '2021-04-25 05:39:14', '2021-04-24 23:36:33'),
(12, 'Quang Đức', '341 Trần Thái Tông', 'hà nội', '245', '532834', '0945586009', 'duc@gmail.com', NULL, 'e10adc3949ba59abbe56e057f20f883e', 1, '2021-04-24 22:39:21', '2021-04-24 22:39:21'),
(13, 'trần hữu anh', '76 Phùng Khoang', 'Tokyo', '112', '3423426', '0912273358', 'anh@gmail.com', NULL, 'e10adc3949ba59abbe56e057f20f883e', 1, '2021-04-24 22:42:38', '2021-04-24 22:42:38'),
(14, 'nguyễn đức Quang', '386 trần phú', 'Mumbai', '103', '33242', '0957347234', 'quang@gmail.com', NULL, 'e10adc3949ba59abbe56e057f20f883e', 1, '2021-04-29 06:56:35', '2021-04-29 06:56:35'),
(18, 'thuhuong', '155 Nguyễn Huệ', 'Huế', '245', '532834', '0968234123', 'huuanhpro00@gmail.com', NULL, 'e10adc3949ba59abbe56e057f20f883e', 1, '2021-05-02 01:21:50', '2021-05-02 01:22:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_import`
--

CREATE TABLE `tbl_import` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_import`
--

INSERT INTO `tbl_import` (`id`, `product_id`, `quantity`, `price`, `note`, `created_at`, `updated_at`) VALUES
(5, 23, 4, 15700000, 'Nhập hàng lần 1 từ nhà cung cấp', '2021-05-01 00:34:00', '2021-05-01 01:41:06'),
(6, 23, 2, 15600000, 'nhập hàng lần 2 từ nhà cung cấp', '2021-05-01 00:58:00', '2021-05-01 01:41:37'),
(7, 23, 5, 15500000, 'nhập hàng lần 3 từ nhà cung cấp', '2021-05-01 00:58:51', '2021-05-01 00:58:51'),
(8, 26, 44, 65000, 'Nhập lô hàng áo khoác bomber nữ', '2021-05-01 19:28:56', '2021-05-01 20:14:46'),
(9, 25, 67, 125000, 'Nhập lô hàng phần mềm diệt virus BKAV', '2021-05-01 19:29:48', '2021-05-01 19:29:48'),
(10, 24, 80, 12000, 'Lô hàng vòng cổ, 1 chiếc màu hơi sờn', '2021-05-01 19:30:55', '2021-05-01 19:30:55'),
(11, 22, 35, 75000, 'Nhập lô hàng xe hơi đồ chơi', '2021-05-01 19:31:40', '2021-05-01 19:31:40'),
(12, 21, 52, 68000, 'Nhập kệ sắt treo tường', '2021-05-01 19:32:13', '2021-05-01 19:32:13'),
(13, 20, 25, 320000, 'Nhập son Mac lần 1', '2021-05-01 19:46:08', '2021-05-01 19:46:08'),
(14, 19, 60, 580000, 'Nhập lô hàng bitis hunter', '2021-05-01 19:46:55', '2021-05-01 19:46:55'),
(15, 18, 52, 10200000, 'Nhập lô hàng đầu tivi sony 65 inches', '2021-05-01 19:47:46', '2021-05-01 19:47:46'),
(16, 17, 15, 9800000, 'Lô hàng tủ lạnh samsung đầu tiên', '2021-05-01 19:48:34', '2021-05-01 19:48:34'),
(17, 16, 80, 17500000, 'Lô hàng Iphone 12 pro max nhập từ mỹ', '2021-05-01 19:50:27', '2021-05-01 19:50:27'),
(18, 15, 8, 13300000, 'Nhập lô hàng acer nitro 5', '2021-05-01 19:51:12', '2021-05-01 19:51:12'),
(19, 14, 12, 11800000, 'Nhập lô máy ảnh canon eos 800D', '2021-05-01 19:51:53', '2021-05-01 19:51:53'),
(20, 13, 66, 17900000, 'Nhập lô điện thoại samsung galaxy S9', '2021-05-01 19:52:43', '2021-05-01 19:52:43'),
(21, 12, 5, 36700000, 'Nhập 5 chiếc Imac 2020 27 inches', '2021-05-01 19:53:34', '2021-05-01 19:53:34'),
(22, 26, 6, 69000, 'Nhập lô hàng lần 2', '2021-05-01 20:15:58', '2021-05-01 20:16:24');

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
(21, 9, 1671050, 'hoangdinh', '12331', '6lk4b khu đô thị mỗ lao', '0945586004', 'dinh@gmail.com', 2, '2021-04-20 14:01:07', '2021-04-20 07:01:07', '2021-04-29 06:17:12'),
(22, 9, 232750, 'hoangdinh', '12331', '6lk4b khu đô thị mỗ lao', '0945586004', 'dinh@gmail.com', 2, '2021-04-20 14:01:35', '2021-04-20 07:01:35', '2021-04-20 07:02:34'),
(23, 9, 97656200, 'hoangdinh', '12345', '6lk4b khu đô thị mỗ lao', '0945586004', 'dinh@gmail.com', 2, '2021-04-24 16:53:05', '2021-04-24 09:53:05', '2021-04-29 06:10:53'),
(24, 11, 16055000, 'Quang Huy', '5454534', '112 Quang Trung', '0945023423', 'huy@gmail.com', 1, '2021-04-25 06:38:21', '2021-04-24 23:38:21', '2021-04-30 06:29:42'),
(25, 9, 73586050, 'hoangdinh', '12345', '6lk4b khu đô thị mỗ lao', '0945586004', 'dinh@gmail.com', 2, '2021-04-29 13:16:22', '2021-04-29 06:16:22', '2021-05-01 20:50:52'),
(26, 14, 17763100, 'nguyễn đức Quang', '33242', '386 trần phú', '0957347234', 'huuanhpro00@gmail.com', 1, '2021-04-29 14:00:30', '2021-04-29 07:00:30', '2021-05-01 20:45:37'),
(27, 10, 1956050, 'thu thảo', '123456', '124 nguyễn trãi', '0937564982', 'huuanhpro00@gmail.com', 2, '2021-04-29 14:02:19', '2021-04-29 07:02:19', '2021-04-29 07:19:02'),
(28, 9, 16283000, 'hoangdinh', '12345', '6lk4b khu đô thị mỗ lao', '0945586004', 'dinh@gmail.com', 2, '2021-05-02 03:54:45', '2021-05-01 20:54:45', '2021-05-01 20:56:54');

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
(26, 22, 26, 1, '2021-04-20 07:01:35', '2021-04-20 07:01:35'),
(27, 23, 24, 8, '2021-04-24 09:53:05', '2021-04-24 09:53:05'),
(28, 23, 23, 4, '2021-04-24 09:53:05', '2021-04-24 09:53:05'),
(29, 24, 18, 1, '2021-04-24 23:38:22', '2021-04-24 23:38:22'),
(30, 25, 23, 1, '2021-04-29 06:16:22', '2021-04-29 06:16:22'),
(31, 25, 12, 1, '2021-04-29 06:16:22', '2021-04-29 06:16:22'),
(32, 26, 18, 1, '2021-04-29 07:00:30', '2021-04-29 07:00:30'),
(33, 26, 19, 2, '2021-04-29 07:00:31', '2021-04-29 07:00:31'),
(34, 27, 19, 1, '2021-04-29 07:02:19', '2021-04-29 07:02:19'),
(35, 27, 20, 2, '2021-04-29 07:02:19', '2021-04-29 07:02:19'),
(36, 28, 26, 2, '2021-05-01 20:54:45', '2021-05-01 20:54:45'),
(37, 28, 18, 1, '2021-05-01 20:54:45', '2021-05-01 20:54:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `productName` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_desc` text NOT NULL,
  `type` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `oldprice` int(11) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `productName`, `status`, `catId`, `brandId`, `quantity`, `product_desc`, `type`, `price`, `oldprice`, `image`, `created_at`, `updated_at`) VALUES
(12, 'iMac 27\'\' 2020 - 3.3GHz 6-Core I5 8GB 512GB Radeon Pro 5300 4GB', 1, 5, 3, 4, '3.3GHz 6-core 10th-generation Intel Core i5 processor\r\nTurbo Boost up to 4.8GHz\r\n8GB 2666MHz DDR4 memory\r\n512GB SSD storage\r\nRadeon Pro 5300 with 4GB of GDDR6 memory\r\nTwo Thunderbolt 3 ports\r\nRetina 5K 5120-by-2880 P3 display with True Tone', 1, 51800000, 54200000, '2729b66c97.png', '2021-04-20 10:13:44', '2021-05-01 20:10:21'),
(13, 'Samsung Galaxy S9', 1, 6, 2, 54, 'Chiếc điện thoại hiện đại nhất của SAMSUNG', 0, 26300000, 29990000, 'cca53d8297.jpg', '2021-04-20 10:13:44', '2021-05-01 20:09:33'),
(14, 'Máy ảnh Canon EOS 800D', 1, 18, 10, 10, 'Máy ảnh siêu đẹp', 0, 17290000, NULL, '2c8d4dfd3c.jpg', '2021-04-20 10:13:44', '2021-05-01 20:09:08'),
(15, 'Laptop Acer Nitro 5', 1, 4, 9, 7, 'Laptop hàng đầu đến từ ACER', 0, 19590000, NULL, '75aac86276.jpg', '2021-04-20 10:13:44', '2021-05-01 20:07:25'),
(16, 'Iphone 12 Pro Max', 1, 6, 3, 48, 'Siêu phẩm đến từ Apple', 0, 29090000, 31090000, '6d93b5b901.jpg', '2021-04-20 10:13:44', '2021-05-01 20:06:31'),
(17, 'Tủ lạnh Samsung', 1, 18, 2, 11, 'Tủ lạnh hiện đại', 0, 15950000, NULL, 'b40924eb30.jpg', '2021-04-20 10:13:44', '2021-05-01 20:05:43'),
(18, 'Smart Tivi Sony 65 inch KD-65X7000G', 1, 15, 11, 44, 'Kiểu dáng sang trọng với chân đế kim loại, kích thước màn hình lớn 65 inch.\r\nĐộ phân giải 4K sắc nét đi kèm công nghệ HDR10 cho hình ảnh chân thật.\r\nHình ảnh có dải màu rộng, mang đến màu sắc rực rỡ, tự nhiên cùng công nghệ màn hình chấm lượng tử TRILUMINOS.\r\nNâng cấp hình ảnh độ phân giải thấp cho chất lượng sắc nét gần bằng 4K với công nghệ 4K X-Reality PRO.\r\nÂm thanh sống động, mạnh mẽ với công nghệ S-Force Front Surround.\r\nHệ điều hành Linux OS ổn định, dễ thao tác cùng nhiều ứng dụng giải trí phổ biến.\r\nHỗ trợ chiếu màn hình điện thoại android lên tivi với tính năng Screen Mirroring.', 1, 16900000, NULL, '2251e4c6e6.jpg', '2021-04-20 10:13:44', '2021-05-01 20:54:45'),
(19, 'Giày Thể Thao Nam Biti\'s Hunter Street - Hanoi Culture Patchwork Old Wall Yellow DSMH02503NAU', 1, 14, 12, 40, 'Tên sản phẩm: Giày Thể Thao Nam Biti\'s Hunter Street - Hanoi Culture Patchwork DSMH02503NAU\r\nThương hiệu:Biti\'s\r\nChính hãng 100%\r\nThời gian bảo hành:3 tháng\r\nĐổi size trong vòng 7 ngày', 1, 899000, 950000, '7e6d2691b9.png', '2021-04-20 10:13:44', '2021-05-01 20:05:07'),
(20, 'Son MAC Chili', 1, 13, 13, 8, '- Chất son lì không bóng.\r\n- Độ lên màu chuẩn.\r\n- Giữ màu lâu đến 5h.\r\n- Không lộ vân môi.', 1, 580000, NULL, '7e467ba202.png', '2021-04-20 10:13:44', '2021-05-01 20:04:49'),
(21, 'Kệ Sắt Đáy Gỗ Treo Tường Để Đồ Đa Năng,Trang Trí Nhà Cửa ,Decor Quán Xá - Tặng Kèm Đinh Và Miếng Dán Tường', 1, 12, 14, 51, 'Thông tin sản phẩm:Kệ Sắt Đáy Gỗ Treo Tường Để Đồ Đa Năng, Trang Trí Nhà Cửa , Quán Xá \r\n- Màu Sắc : Màu Đen\r\n- Chất liệu: kệ sắt + đáy gỗ \r\n- Thiết kế : Có Rào Chắn\r\n- Màu sắc: trắng, đen, hồng\r\n- Tặng đinh hoặc móc treo tường\r\n- Kích thước: \r\n+ Size L:  12*14* 45 cm\r\n+ Size M: 11*13* 35 cm\r\n+ Size S: 10*12* 25 cm\r\nĐặc điểm nổi bật:\r\n- Kiểu dáng hiện đại, thu hút người nhìn\r\n- Trang trí nhà cửa, phòng khách, phòng làm việc, quán trà, cafe, khách sạn,...\r\n- Dụng cụ trang trí cho các studio chụp hình, quay quảng cáo,...\r\n- Đựng dụng cụ gia đình, như vật dụng nhà bếp, nhà tắm, .....\r\n- Chịu lực tốt, độ bền cao\r\n- Có loại có thanh ngang giữ đồ giúp đồ không bị rơi vỡ\r\nShop Gia Linh Cam Kết : \r\n- Hình ảnh sản phẩm giống 100%.\r\n- Chất lượng sản phẩm tốt 100%.\r\n- Sản phẩm được kiểm tra kĩ càng, nghiêm ngặt trước khi giao hàng.\r\n- Sản phẩm luôn có sẵn trong kho hàng. \r\n- Giao hàng ngay khi nhận được đơn hàng.\r\n- Hoàn tiền ngay nếu sản phẩm không giống với mô tả.\r\n- Giao hàng toàn quốc, nhận hàng thanh toán. \r\n- Hỗ trợ đổi trả theo quy định.\r\n- Gửi hàng siêu tốc', 1, 125000, NULL, 'eed4f413c1.png', '2021-04-20 10:13:44', '2021-05-01 20:00:35'),
(22, 'Ô tô điều khiển từ xa siêu xe Lamborghini DK81003', 1, 11, 14, 21, '- Chất liệu: Nhựa ABS, không chứa hóa chất độc hại, không có viền sắc nhọn, an toàn cho bé\r\n\r\n- Tỉ lệ thiết kế xe: 1:18\r\n\r\n- Pin: 4 pin 1,5V, 2A\r\n\r\n- Độ tuổi: 6 tuổi trở lên\r\n\r\n- Xuất xứ: Trung Quốc\r\n\r\n- Chức năng: 4 chức năng: Tới – lùi - rẽ trái - rẽ phải\r\n\r\n- Xe được thiết kế mô phỏng theo xe thật với tỉ lệ 1:16, thiết kế mô phỏng theo siêu xe Lamborghini với đường nét thể thao, mạnh mẽ\r\n\r\n- Các chi tiết của xe được làm tỉ mỉ, công phu, không góc cạnh\r\n\r\n- Hệ thống điều khiển radio (R/C) ổn định hoạt động tốt ở khoảng cách xa.\r\n\r\n- Sử dụng 4 pin AA (Sản phẩm không kèm pin)\r\n\r\n- Xe được làm từ chất liệu nhựa an toàn với sức khỏe trẻ nhỏ, để phụ huynh an tâm khi bé vui chơi.', 1, 140000, 175000, '91747ae3d0.png', '2021-04-20 10:13:44', '2021-05-01 19:59:33'),
(23, 'Bộ trang sức Vàng 14K đính đá CZ PNJ 00132-00103', 1, 10, 15, 11, 'Thương hiệu:\r\nPNJ\r\n \r\nLoại đá chính:\r\nCZ\r\n \r\nMàu đá chính:\r\nTrắng\r\n \r\nHình dạng đá:\r\nTròn\r\n \r\nGiới tính:\r\nNữ\r\n \r\nDịp tặng quà:\r\nSinh nhật\r\nTình yêu\r\nNgày kỷ niệm\r\nCác dịp lễ tết\r\n \r\nQuà tặng cho người thân:\r\nCho Nàng\r\nCho Mẹ\r\n \r\nChủng loại:\r\nSản phẩm theo bộ', 1, 25659000, NULL, '2dd107916f.png', '2021-04-20 10:13:44', '2021-05-01 19:59:06'),
(24, 'Vòng Cổ Choker Da Pu Mặt Hình Mưa Sao Băng', 1, 9, 16, 67, 'choker đẹp giá rẻ', 1, 20000, 25000, 'c3728b63a0.jpg', '2021-04-20 10:13:44', '2021-05-01 19:55:12'),
(25, 'Phần Mềm Diệt Virus BKAV Profressional 12 Tháng - Hàng Chính Hãng', 1, 8, 17, 59, 'Ngăn chặn bị theo dõi bởi phần mềm gián điệp\r\nNgăn chặn đánh cắp tài khoản ngân hàng, đánh cắp mật khẩu\r\nQuét virus làm chậm máy\r\nSử dụng trí tuệ nhân tạo (AI), tích hợp công nghệ điện toán đám mây, bảo vệ đa lớp\r\nPhần Mềm Diệt Virus BKAV Profressional sử dụng Trí tuệ nhân tạo (AI) tổng hợp các dữ liệu được ghi nhận, phân tích và chỉ ra các mối nguy hiểm người sử dụng có thể gặp phải như bị xóa dữ liệu, bị theo dõi bởi phần mềm gián điệp hay bị mất cắp tài khoản… từ đó phát lệnh xử lý, ngăn chặn và tiêu diệt mã độc.\r\nBkav Pro Internet Security là phần mềm diệt virus tiên phong trong sử dụng công nghệ điện toán đám mây trong lĩnh vực bảo mật, là phần mềm tốt nhất do Hiệp hội An toàn thông tin Việt Nam bình chọn.\r\nBkav Pro được trang bị những công nghệ cao cấp, bảo vệ đa lớp, tự động phát hiện và tiêu diệt virus mà không cần cập nhật mẫu nhận diện mới.\r\nCác bản update được cập nhật liên tục từ máy chủ Bkav, đảm bảo phần mềm luôn có đầy đủ sức mạnh và tính năng mới nhất.\r\nSử dụng Bkav Pro giúp bảo vệ máy tính một cách toàn diện ngăn chặn các loại virus xóa dữ liệu, bị theo dõi bởi phần mềm gián điệp, bị đánh cắp tài khoản ngân hàng,…', 1, 194000, 220000, 'a4eaad81fa.png', '2021-04-20 10:13:44', '2021-05-01 19:54:51'),
(26, 'Áo khoác nữ Bomber bóng chày', 1, 7, 18, 44, 'ÁO KHOÁC NAM NỮ BOMBER BÓNG CHÀY NEW YORK XINH XẮN SIÊU HOT TREND', 1, 120000, 150000, 'c9131caa64.png', '2021-04-20 10:13:44', '2021-05-01 20:54:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(4, '1a3facfd47.jpg', 1, '2021-04-30 21:00:38', '2021-05-02 05:46:46'),
(5, '98286c1a9e.jpg', 1, '2021-04-30 21:00:45', '2021-04-30 21:07:11'),
(6, 'ffd2211c30.jpg', 1, '2021-04-30 21:06:10', '2021-04-30 21:06:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Chỉ mục cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_comment_customer_id_foreign` (`customer_id`),
  ADD KEY `tbl_comment_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `tbl_countries`
--
ALTER TABLE `tbl_countries`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_import`
--
ALTER TABLE `tbl_import`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_import_product_id_foreign` (`product_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `catId` (`catId`,`brandId`),
  ADD KEY `brandId` (`brandId`);

--
-- Chỉ mục cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
-- AUTO_INCREMENT cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tbl_countries`
--
ALTER TABLE `tbl_countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `tbl_import`
--
ALTER TABLE `tbl_import`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `tbl_orderdetails`
--
ALTER TABLE `tbl_orderdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD CONSTRAINT `tbl_comment_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_comment_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_import`
--
ALTER TABLE `tbl_import`
  ADD CONSTRAINT `tbl_import_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_orderdetails`
--
ALTER TABLE `tbl_orderdetails`
  ADD CONSTRAINT `tbl_orderdetails_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_orderdetails_ibfk_4` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`catId`) REFERENCES `tbl_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_product_ibfk_2` FOREIGN KEY (`brandId`) REFERENCES `tbl_brand` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
