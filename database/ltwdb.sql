-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 16, 2024 lúc 09:09 PM
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
-- Cơ sở dữ liệu: `ltwdb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`, `name`, `role`, `updated_at`) VALUES
(1, 'admin@hcmut.edu.vn', '$2y$10$.8c8OEDgbHEUM6lmB.mJk.vppsTxRyAvHcogQbjAvD/btY1Sr3NnW', 'Admin', 1, '2023-11-29 17:05:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Bags'),
(2, 'Shirt'),
(3, 'Pants'),
(4, 'Beauty'),
(5, 'Shoes');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(2000) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `username`, `email`, `message`, `status`, `created_at`) VALUES
(9, 'Nguyễn Duy Tùng', 'tung.nguyen2k3hcmut@hcmut.edu.vn', 'Website rất tốt!', 0, '2023-12-06 02:12:55'),
(10, 'Lê Quang Hiển', 'hienlq16103@gmail.com', 'Nước gì mà ngon thế không biết nữa!', 0, '2023-12-06 04:59:16'),
(11, 'Nguyễn Đức Bình', 'binh.nguyenhelloworld@hcmut.edu.vn', 'Nhân viên quá xinh gái, nước rất ngon, 10 điểm không có nhưng!', 0, '2023-12-06 05:00:27'),
(12, 'Nguyễn Duy Tùng', 'tungxenga7@gmail.com', 'dffsd', 0, '2023-12-06 07:21:42'),
(13, 'thien', 'thien.cheviet1404@hcmut.edu.vn', 'hienhien', 0, '2024-11-10 12:03:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_method` varchar(50) NOT NULL DEFAULT 'Tiền mặt khi nhận hàng',
  `payment` bigint(20) NOT NULL,
  `address_receiver` varchar(50) NOT NULL,
  `phone_receiver` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('Đang xử lý','Đang giao','Đã giao') NOT NULL DEFAULT 'Đang xử lý',
  `name_receiver` varchar(50) NOT NULL DEFAULT 'Đang xử lý'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`order_id`, `user_id`, `payment_method`, `payment`, `address_receiver`, `phone_receiver`, `updated_at`, `status`, `name_receiver`) VALUES
(26, 51, 'Tiền mặt khi nhận hàng', 67000, 'KTX Khu A, ĐHQG - TP. HCM', '0359110455', '2023-11-28 07:40:47', 'Đang xử lý', 'Nguyen Duy Tung'),
(28, 55, 'Tiền mặt khi nhận hàng', 19000, 'rrrr', '0978743012', '2024-11-05 13:07:21', 'Đang xử lý', 'thth'),
(29, 55, 'Tiền mặt khi nhận hàng', 19000, 'trttr', '0978743012', '2024-11-05 13:07:50', 'Đang xử lý', 'thien'),
(30, 55, 'Tiền mặt khi nhận hàng', 76000, 'thienhihi', '0978743012', '2024-11-10 11:55:55', 'Đang xử lý', 'thien'),
(31, 55, 'Tiền mặt khi nhận hàng', 19000, '111', '0978743012', '2024-11-11 09:07:18', 'Đang xử lý', 'thien'),
(32, 55, 'Tiền mặt khi nhận hàng', 57000, 'thiênn', '0978743012', '2024-11-11 09:50:34', 'Đang xử lý', 'thien'),
(33, 55, 'Tiền mặt khi nhận hàng', 19000, 'iii', '0978777111', '2024-11-11 09:52:08', 'Đang xử lý', 'thien'),
(34, 55, 'Tiền mặt khi nhận hàng', 19000, '111', '0978743012', '2024-11-11 09:53:25', 'Đang xử lý', 'thien'),
(35, 55, 'Tiền mặt khi nhận hàng', 19000, '123', '0978743012', '2024-11-11 09:55:14', 'Đang xử lý', '123qweqwe'),
(36, 55, 'Tiền mặt khi nhận hàng', 19000, '111', '0978743012', '2024-11-11 10:00:24', 'Đang xử lý', 'thien'),
(37, 55, 'Tiền mặt khi nhận hàng', 19000, '111', '0978743012', '2024-11-11 10:02:40', 'Đang xử lý', 'thien'),
(38, 55, 'Tiền mặt khi nhận hàng', 19000, '111', '0978743012', '2024-11-11 10:04:37', 'Đang xử lý', 'thien'),
(39, 55, 'Tiền mặt khi nhận hàng', 19000, '111', '0978743012', '2024-11-11 10:08:41', 'Đang xử lý', 'thth'),
(40, 55, 'Tiền mặt khi nhận hàng', 19000, '111', '0978743012', '2024-11-11 10:10:06', 'Đang xử lý', 'thien'),
(41, 55, 'Tiền mặt khi nhận hàng', 19000, 'thienthien', '0978743012', '2024-11-11 10:11:10', 'Đang xử lý', 'thien'),
(42, 55, 'Tiền mặt khi nhận hàng', 19000, '111', '0978743012', '2024-11-11 10:11:58', 'Đang xử lý', 'thien'),
(43, 55, 'Tiền mặt khi nhận hàng', 19000, '111', '0978743012', '2024-11-11 10:12:23', 'Đang xử lý', 'thien'),
(44, 56, 'Tiền mặt khi nhận hàng', 19000, '123123', '0', '2024-11-11 16:55:16', 'Đang xử lý', 'hihi'),
(45, 56, 'Tiền mặt khi nhận hàng', 19000, '111', '0978743012', '2024-11-11 16:58:14', 'Đang xử lý', 'thth'),
(46, 56, 'Tiền mặt khi nhận hàng', 19000, '111', '0978743012', '2024-11-11 16:59:37', 'Đang xử lý', 'thien'),
(47, 56, 'Tiền mặt khi nhận hàng', 19000, 'thienthien', '0978777111', '2024-11-11 17:00:47', 'Đang xử lý', 'rêtrt'),
(48, 56, 'Tiền mặt khi nhận hàng', 19000, 'thienthien', '0978777111', '2024-11-11 17:04:15', 'Đang xử lý', 'thien'),
(49, 55, 'Tiền mặt khi nhận hàng', 19000, '123123', '123123', '2024-11-12 07:20:15', 'Đang xử lý', '123qweqwe'),
(50, 55, 'Tiền mặt khi nhận hàng', 57000, '111', '044', '2024-11-12 07:39:31', 'Đang xử lý', 'thien'),
(51, 55, 'Tiền mặt khi nhận hàng', 5000000, 'thienthien', '0978743012', '2024-11-13 10:33:43', 'Đang xử lý', 'thien');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_item`
--

CREATE TABLE `order_item` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity_item` bigint(20) NOT NULL DEFAULT 1,
  `price` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_item`
--

INSERT INTO `order_item` (`order_id`, `product_id`, `quantity_item`, `price`) VALUES
(28, 3, 1, 19000),
(29, 4, 1, 19000),
(30, 2, 3, 19000),
(30, 3, 1, 19000),
(31, 3, 1, 19000),
(32, 2, 1, 19000),
(32, 3, 2, 19000),
(33, 2, 1, 19000),
(34, 3, 1, 19000),
(35, 2, 1, 19000),
(36, 3, 1, 19000),
(37, 2, 1, 19000),
(38, 2, 1, 19000),
(39, 3, 1, 19000),
(40, 3, 1, 19000),
(41, 2, 1, 19000),
(42, 3, 1, 19000),
(43, 3, 1, 19000),
(44, 4, 1, 19000),
(45, 3, 1, 19000),
(46, 3, 1, 19000),
(47, 3, 1, 19000),
(48, 3, 1, 19000),
(49, 2, 1, 19000),
(50, 3, 3, 19000),
(51, 3, 1, 5000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `content` text DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `post`
--

INSERT INTO `post` (`post_id`, `title`, `content`, `updated_at`, `image`) VALUES
(1, 'Fashion Monday: Summer Basics', 'I\'ve spent the past couple of days cleaning my closet out and taking note of what items are missing or in need of an update; doing so, I realized it was time to replace some of my Spring/Summer basics. ', '2024-11-12 12:50:57', '/ltw/images/fashion-monday-summer-basics-877633.webp'),
(2, 'Wednesday: Social Bug Edition', 'Wether it\'s a BBQ, a rooftop party, or simply lounging in your back-yard with friends, these pieces assure you will be the coolest and the chicest of the bunch…', '2024-11-12 12:54:58', '/ltw/images/wednesday-social-bug-edition-859185.webp'),
(3, 'Mother\'s Day Gift Guide\n', 'Happy Wednesday!\nI can\'t believe it\'s already May... time flies...\nMother\'s Day is right around the corner and if you\'re like me, you\'re probably having trouble finding the perfect gift.\nThis year, I put my thinking hat on and curated a gift-guide to make Mother\'s Day shopping easier for us. The list is designed to help you choose the perfect item or to help you create your own combination. \nHappy Shopping! ', '2024-11-12 12:57:05', '/ltw/images/mothers-day-gift-guide-734600.webp'),
(4, 'FASHION MONDAY: Ulla Johnson', 'Introducing Fashion Mondays with Olivia!\n\nYes, I understand Mondays can be quite dreadful...but I also believe there is nothing a little inspiration can’t fix! For this reason, I decided to share some creativity and fill your Mondays up with tons of fun outfit ideas you can look forward to making you own.\n\nThis week, I selected two of my favorite dresses from Ulla Johnson’s Spring collection and will show two ways you can style each of them. Want to know the best part? All you need to do is switch up the accessories to transition them from day to night!\n\n Hope you have a happy Monday.', '2024-11-12 12:58:21', '/ltw/images/fashion-monday-ulla-johnson-616857.webp'),
(5, 'Fashion Monday: Pj Top Edition\n', 'Now that we are able to enjoy a little bit more of the outside, I\'m going to show you 3 ways I style my PJ tops for the outside world.', '2024-11-12 12:59:52', '/ltw/images/fashion-monday-pj-top-edition-255644.webp'),
(6, 'Fashion Monday: Zimmerman Edition\n', 'Here at Olivia we received some beautiful pieces from Zimmerman’s Summer collection and I\'m obsessed to say the least! I tried a couple of my favorite swim suits from the collection to help you decide which ones to add to your cart. ', '2024-11-12 13:01:07', '/ltw/images/fashion-monday-zimmerman-edition-248195.png'),
(7, 'Work from home: Quarantine Edition!\n', 'I came up with a couple of outfit formulas that are casual & chic enough to wear to a Zoom meeting at home, but can be styled and worn to any day-time activity once we’re able to venture out!\n', '2024-11-12 13:02:31', '/ltw/images/work-from-home-quarantine-edition-633468.webp'),
(8, 'The Italian Charm\n', 'With Aquaman grossing over $200 Million across North America on New Year’s Day, and surpassing $822 million at the global box office by January 2nd, it’s safe to say that 2019 is going swimmingly for DC’s latest superhero offering.\n\nWhilst many movie fans have expressed their delight at seeing Jason Momoa as Aquaman, there’s no denying that Amber Heard is truly fierce as the super-powerful Mera.', '2024-11-12 13:04:08', '/ltw/images/the-italian-charm-174981.webp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `images` varchar(100) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` bigint(20) NOT NULL,
  `price_sale` bigint(20) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `images1` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `name`, `category_id`, `description`, `images`, `quantity`, `price`, `price_sale`, `timestamp`, `images1`) VALUES
(2, '1969 Embellished Nano Bag in Silver', 1, '1969 Embellished Nano Bag by Rabanne\n\nDetails:\n\nComposition:\n35% Brass / 35% Glass / 30% Steel\nColor: Silver\nMade in Madagascar\nFall 2024', 'Bags/1969-embellished-nano-bag-in-silver-598510.webp', 10, 10000000, 5000000, '2024-11-13 01:43:50', '/ltw/images/Bags/1969-embellished-nano-bag-in-silver-598510.webp'),
(3, '1969 Leather Nano Bag in Dark Brown\n', 1, '1969 Leather Nano Bag by Rabanne\n\nDetails:\n\nComposition:\n90% Leather / 10% Steel\nColor: Dark Brown\nMade in Madagascar\nFall 2024', 'Bags/1969-leather-nano-bag-in-dark-brown-520811.webp', 10, 10000000, 5000000, '2024-11-13 01:44:20', '/ltw/images/Bags/1969-leather-nano-bag-in-dark-brown-520811.webp'),
(4, 'Milo Metallic Vegan Leather Clutch in Smoky Silver', 1, 'Milo Metallic Vegan Leather Clutch by A.L.C.\n\nDetails:\n\nComposition:\n100% Vegan Leather \nColor: Smoky Silver\nImported\nSize: 9in x 5in\nHoliday 2024', 'Bags/milo-metallic-vegan-leather-clutch-in-smoky-silver-134768.webp', 10, 6500000, 6000000, '2024-11-13 01:44:44', '/ltw/images/Bags/milo-metallic-vegan-leather-clutch-in-smoky-silver-134768.webp'),
(5, 'Sac Main Tote Bag in Silver\n', 1, 'Sac Main Tote Bag by Rabanne\n\nDetails:\n\nComposition:\n80% Aluminum / 15% Lamb / 5% Brass\nColor: Silver\nMade in Madagascar\nPre-Fall 2024', 'Bags/sac-main-tote-bag-in-silver-883502.jpg', 10, 7200000, 6000000, '2024-11-13 01:45:16', '/ltw/images/Bags/sac-main-tote-bag-in-silver-883502.jpg'),
(6, 'Sesame Street Tote\n', 1, 'Sesame Street Tote by Flamingo Estate\n\nDetails:\n\nOne man\'s trash is another garden\'s treasure! And who knows more about the importance of reusing, recycling, and reducing than Oscar the Grouch, someone who lives in a trashcan? This Holiday we’re very proud to partner with Sesame Street and Oscar and support their mission to help kids everywhere grow smarter, stronger, and kinder.', 'Bags/sesame-street-tote-669604.webp', 10, 5700000, 2500000, '2024-11-13 01:46:11', '/ltw/images/Bags/sesame-street-tote-676256.webp'),
(7, 'Simone Embellished Bag in Black Crystal\n', 1, 'Simone Embellished Leather Bag by A.L.C.\n\nDetails:\n\nComposition:\n100% Lamb Leather \nColor: Black / Crystal\nImported\nSize: 10.5in x 7.5in\nHoliday 2024', 'Bags/simone-embellished-bag-in-black-crystal-887724.webp', 10, 7600000, 2500000, '2024-11-13 01:46:42', '/ltw/images/Bags/simone-embellished-bag-in-black-crystal-887724.webp'),
(8, 'The Dude Shoulder Bag in Black\n', 1, 'The Dude Shoulder Bag by STAUD\n\nDetails:\n\nComposition:\n100% Cow Leather\nColor: Black\nImported\nFall/Winter 2024', 'Bags/the-dude-shoulder-bag-in-black-428837.webp', 10, 8200000, 7200000, '2024-11-13 01:47:12', '/ltw/images/Bags/the-dude-shoulder-bag-in-black-428837.webp'),
(9, 'Chunky Necklace Shrunken Tee in White\n', 2, 'Chunky Necklace Shrunken Tee by Cinq à Sept\n\nDetails: \n\nComposition:\n100% Cotton\nColor: White\nImported\nThis product is based in Standard Sizing.\nFall/Winter 2024', 'Shirt/chunky-necklace-shrunken-tee-in-white-424898.webp', 20, 7000000, 6000000, '2024-11-13 01:31:07', '/ltw/images/Shirt/chunky-necklace-shrunken-tee-in-white-670588 (1).webp'),
(10, 'Elizabeth Top in Black\n', 2, 'Elizabeth Top by Cinq à Sept\n\nTRUNKSHOW\n\nDetails: \n\nComposition:\n69% Triacetate / 31% Polyester\nColor: Black\nImported\nThis product is based in American (US) Sizing.\nFall/Winter 2024', 'Shirt/elizabeth-top-in-black-725702.webp', 10, 4000000, 3000000, '2024-11-13 01:31:28', '/ltw/images/Shirt/elizabeth-top-in-black-773415.webp'),
(11, 'Heatset Mon Amour Tee in White Black\n', 2, 'Heatset Mon Amour Tee by Cinq à Sept\n\nTRUNKSHOW\n\nDetails: \n\nComposition:\n100% Cotton\nColor: White / Black\nMade in USA\nThis product is based in American (US) Sizing.\nFall/Winter 2024', 'Shirt/heatset-mon-amour-tee-in-white-black-356809.webp', 10, 2000000, 1900000, '2024-11-13 01:31:36', '/ltw/images/Shirt/heatset-mon-amour-tee-in-white-black-222027.webp'),
(12, 'Joelle Embellished Cable Cardigan in Charcoal Lila', 2, 'Composition:\n70% Acrylic / 30% Wool\nColor: Charcoal Lilac / Green\nImported\nThis product is based in American (US) Sizing.\nFall/Winter 2024', 'Shirt/joelle-embellished-cable-cardigan-in-charcoal-lilac-492855.jpg', 10, 10000000, 6000000, '2024-11-13 01:24:40', '/ltw/images/Shirt/joelle-embellished-cable-cardigan-in-charcoal-lilac-902818.jpg'),
(13, 'Rhinestone Fringe Mini Sammy Dress in Ivory\n', 2, 'Rhinestone Fringe Mini Sammy Dress by Cinq à Sept\n\nDetails: \n\nComposition:\n54% Polyester / 39% Viscose / 7% Elastane\nColor: Ivory\nImported\nThis product is based in American (US) Sizing.\nFall/Winter 2024', 'Shirt/rhinestone-fringe-mini-sammy-dress-in-ivory-416481.webp', 10, 6500000, 4000000, '2024-11-13 01:29:10', '/ltw/images/Shirt/rhinestone-fringe-mini-sammy-dress-in-ivory-416481.webp'),
(14, 'Rhinestone Pin Cheyenne Blazer in Ivory\n', 2, 'Rhinestone Pin Cheyenne Blazer by Cinq à Sept\n\nDetails: \n\nComposition:\n69% Triacetate / 31% Polyester\nColor: Ivory\nImported\nThis product is based in Standard Sizing.\nFall/Winter 2024', 'Shirt/rhinestone-pin-cheyenne-blazer-in-ivory-606119.webp', 10, 5500000, 5200000, '2024-11-13 01:29:31', '/ltw/images/Shirt/rhinestone-pin-cheyenne-blazer-in-ivory-869459.webp'),
(15, 'Vegan Leather Long Benji Pant in Black\n', 3, 'Metallic Dionne Pant by Cinq à Sept\n\nTRUNKSHOW\n\nDetails: \n\nComposition:\n69% Triacetate / 31% Polyester\nColor: Black Silver\nImported\nThis product is based in American (US) Sizing.\nFall/Winter 2024', 'Pants/cinq18.1.webp', 10, 5800000, 4900000, '2024-11-13 01:33:02', '/ltw/images/Pants/cinq18.1.webp'),
(16, 'Heatset Belt Ester Pant in Black\n', 3, 'Sequin Cuffed Benji Pant by Cinq à Sept\n\nDetails: \n\nComposition:\n77% Cotton / 21% Polyester / 2% Elastane\nColor: Indigo Clear\nImported\nThis product is based in American (US) Sizing.\nFall/Winter 2024', 'Pants/cuffed-benji-pant-in-indigo-643454.webp', 10, 4700000, 2300000, '2024-11-13 01:35:21', '/ltw/images/Pants/cuffed-benji-pant-in-indigo-643454.webp'),
(17, 'Metallic Dionne Pant in Black Silver\n', 3, 'Giles Pant by Cinq à Sept\n\nTRUNKSHOW\n\nDetails: \n\nComposition:\n100% Cupro\nColor: Plum Radish\nImported\nThis product is based in American (US) Sizing.\nFall/Winter 2024', 'Pants/giles-pant-in-plum-radish-433332.webp', 10, 8500000, 6200000, '2024-11-13 01:35:47', '/ltw/images/Pants/giles-pant-in-plum-radish-725110.webp'),
(18, 'Barrel Aged Balsamic Vinegar\n', 4, 'Roma Heirloom Tomato Candle by Flamingo Estate\n\nDetails:\n\n8.45 oz / 250 mL\nThe Trebbiano and Lambrusco grapes are grown organically and hand-selected by Balsamic maker Nicolo Verrini. His passion for Balsamic was passed down by his grandfather, who started making Balsamic Vinegar back in the 60’s. Nicolo is a firm believer that the best Balsamic begins with the best grapes, and his goal is to preserve the beauty that Mother Nature provides. Use it on EVERYTHING — cheese, salads, and sometimes on a spoon in the middle of the night when nobody is watching!\nMade in Los Angeles', 'Beauty/barrel-aged-balsamic-vinegar-945614.webp', 10, 1200000, 900000, '2024-11-13 01:47:44', '/ltw/images/Beauty/barrel-aged-balsamic-vinegar-945614.webp'),
(19, 'California Native Mountain Wildflower Honey\n', 4, 'California Native Mountain Wildflower Honey by Flamingo Estate\n\nDetails:\n\n19.5 oz / 553 g\nThis Honey was harvested in Southern California using over 30 years of beekeeping experience to keep the Bees happier and the Honey tastier. Deep in the National Forest, away from pesticides and chemicals, our Bees forage on plants like Sage, California Buckwheat, Golden Currant, and Wildflowers creating a truly raw Honey. Just as Mother Nature intended.', 'Beauty/california-native-mountain-wildflower-honey-513200.webp', 10, 6400000, 3500000, '2024-11-13 01:47:54', '/ltw/images/Beauty/california-native-mountain-wildflower-honey-742651.webp'),
(20, 'Fridays From the Garden Cookbook\n', 4, 'Fridays From the Garden Cookbook by Flamingo Estate\n\nDetails:\n\n16 oz / 473 mL\nOur olives are grown on a multi-generational family-run farm, and are hand-selected at peak ripeness then pressed immediately to ensure critical freshness. This farm operates with organic, sustainable and biodynamic principles, honoring the link between people, the land, and the community. The paste from pressing olives is turned into natural compost tea to fertilize the trees and benefit pollinators. They also irrigate their groves with water from their pond, which is rich in soil-beneficial micro-organisms.', 'Beauty/fridays-from-the-garden-cookbook-117824.webp', 10, 950000, 720000, '2024-11-13 01:48:12', '/ltw/images/Beauty/fridays-from-the-garden-cookbook-497739.webp'),
(21, 'Heritage Extra Virgin Olive Oil\n', 4, 'Heritage Extra Virgin Olive Oil by Flamingo Estate\n\nDetails:\n\n16 oz / 473 mL\nOur olives are grown on a multi-generational family-run farm, and are hand-selected at peak ripeness then pressed immediately to ensure critical freshness. This farm operates with organic, sustainable and biodynamic principles, honoring the link between people, the land, and the community. The paste from pressing olives is turned into natural compost tea to fertilize the trees and benefit pollinators. They also irrigate their groves with water from their pond, which is rich in soil-beneficial micro-organisms.', 'Beauty/heritage-extra-virgin-olive-oil-965815.webp', 10, 650000, 430000, '2024-11-13 01:48:39', '/ltw/images/Beauty/heritage-extra-virgin-olive-oil-965815.webp'),
(22, 'Manuka Rich Cream\n', 4, 'Manuka Rich Cream by Flamingo Estate\n\nDetails:\n\n2.5 oz\nRich nourishment for deep layers of the skin, not just the surface\nManuka Honey helps soothe skin, reduce redness, and promote cellular turnover\nLanolin Oil locks in hydration to leave skin softer, faster\nBeautifully blended with Calendula Flowers, Olive Oil, and Shea Butter for a creamy and cloud-like texture\nNo synthetic fragrances, parabens, and phthalates\nWe never test on animals, because we love them so much', 'Beauty/manuka-rich-cream-498030.webp', 10, 240000, 190000, '2024-11-13 01:48:49', '/ltw/images/Beauty/manuka-rich-cream-498030.webp'),
(23, 'Gilda Glass Slipper in PVC Transparent\n', 5, 'Begum Sling 70 Satin by Amina Muaddi\n\nDetails: \n\nComposition:\n100% Goat\nColor: Satin Black\nMade in Italy\nThis product is based on American (US) sizing.\nFall/Winter 2024', 'Shoes/begum-sling-70-in-satin-black-856076.webp', 10, 850000, 660000, '2024-11-13 01:48:56', '/ltw/images/Shoes/begum-sling-70-in-satin-black-288604.webp'),
(24, 'Rosie Slipper Heeled Sandals in Blue\n', 5, 'Davina Embellished Wedge by Clergerie\n\nDetails:\n\nComposition: 100% Leather \nColor: Black\nMade in France\nThis product is based on American (US) sizing.\n35 RC / 4.5 US / 34.5 EU\n36 RC / 5.5 US / 35.5 EU\n37 RC / 6.5 US / 36.5 EU\n38 RC / 7.5 US / 37.5 EU\n39 RC / 8.5 US / 38.5 EU\n40 RC / 9.5 US / 39.5 EU\n41 RC / 10.5 US / 40.5 EU\n42 RC / 11.5 US / 40.5 EU\nFall/Winter 2024', 'Shoes/davina-embellished-wedge-in-black-943193.webp', 10, 650000, 250000, '2024-11-13 01:49:04', '/ltw/images/Shoes/davina-embellished-wedge-in-black-943193.webp'),
(25, 'Lupita Slipper 70 in Nappa White\n', 5, 'Gilda Slipper by Amina Muaddi\n\nDetails: \n\nComposition:\nUPPER: 100% PVC • LINING: 70% GOAT AND 30% PVC • SOLE: 70% LEATHER AND 30% RUBBER\nColor: TRANSPARENT PVC With Crystals\nMade in Italy\nThis product is based on American (US) sizing.\nFall/Winter 2024', 'Shoes/gilda-glass-slipper-in-pvc-transparent-416580.webp', 10, 870000, 540000, '2024-11-13 01:49:14', '/ltw/images/Shoes/gilda-glass-slipper-in-pvc-transparent-416580.webp'),
(26, 'Strass Mesh Anckle Ballerina in Nero\n', 5, 'Lupita Slipper 70 by Amina Muaddi\n\nDetails: \n\nComposition: 100% Goat\nColor: Nappa White\nMade in Italy\nThis product is based on American (US) sizing.\nFall/Winter 2024', 'Shoes/lupita-slipper-70-in-nappa-white-832480.webp', 10, 760000, 700000, '2024-11-13 01:49:22', '/ltw/images/Shoes/lupita-slipper-70-in-nappa-white-832480.webp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL DEFAULT '',
  `content` text DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `review`
--

INSERT INTO `review` (`review_id`, `product_id`, `user_id`, `title`, `content`, `updated_at`) VALUES
(7, 18, 55, 'tốt lắm', '', '2024-11-05 17:15:39'),
(8, 3, 55, 'tốt lắm', 'tốt', '2024-11-11 18:47:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `avatar` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `verify_code` int(11) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `name`, `avatar`, `phone`, `address`, `updated_at`, `verify_code`, `active`) VALUES
(50, 'tung.nguyen2k3hcmut@hcmut.edu.vn', '$2y$10$/GHcGmvcwaOjD2pRcSknuOLdS8e.XvNJIL6NFiaLZq4nsrNufsfZ.', 'Nguyễn Duy Tùng', NULL, '0354304095', 'KTX Khu A, ĐHQG - TP. HCM', '2023-12-06 06:55:35', 355119, b'1'),
(51, 'binh.nguyenhelloworld@hcmut.edu.vn', '$2y$10$X7aTa1sHjqX266HvyT1C0.SDzE0Yl5MiHBGtW38LiJOb3Z0FYNpeK', 'Nguyễn Đức Bình', NULL, '0394433666', 'KTX Khu A, ĐHQG - TP. HCM', '2023-12-06 00:30:07', 109582, b'1'),
(53, 'tungnd.goat@gmail.com', '$2y$10$6QKSTVfZiYoEHM.Yc51qrOxqYGxaRQBn9FLyvNg5NOGk60eKua1nu', 'Tung Nguyen', NULL, '2332313543', 'dia chi ', '2023-12-06 07:27:08', 126110, b'1'),
(54, 'luan.nguyenexecutive@hcmut.edu.vn', '$2y$10$1vZqSwRuIR0PVPPuYSBJwuhf6J0yAJHwiu.kgdxy3vbK3YuLcEwUy', 'binh.nguyenhelloworld@hcmut.edu.vn', NULL, '0394433666', '1/9 Đồ Sơn, quận Tân Bình, TP. HCM', '2023-12-06 07:36:40', 496584, b'1'),
(55, 'thien.cheviet1404@hcmut.edu.vn', '$2y$10$31qKz1dS.VD8pVIlx6LPuurRCD1wRK8hkifzycYXNmJIuQVfi/zNO', 'thien', NULL, '0978743012', '231qwqeq', '2024-11-13 10:32:09', 162763, b'1'),
(56, 'thienoccho567@gmail.com', '$2y$10$zOv.FWnye0gKwfoShjNPF.gNbpJBy7C6.eFByhKDdF6jkcKtUf5Q6', 'thien', NULL, '0978743991', 'thien', '2024-11-11 18:13:20', 311053, b'1');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `FK_order_user` (`user_id`);

--
-- Chỉ mục cho bảng `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `FK_order_item_product` (`product_id`);

--
-- Chỉ mục cho bảng `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `FK_product_category` (`category_id`);

--
-- Chỉ mục cho bảng `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `FK__product` (`product_id`),
  ADD KEY `FK__user` (`user_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `FK_order_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `FK_order_item_order` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_order_item_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_product_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `FK__product` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK__user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
