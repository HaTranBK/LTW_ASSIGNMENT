CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `logo` varchar(255) DEFAULT NULL,
  `introduction` text DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Check if table is empty before inserting
INSERT INTO `settings` (`logo`, `introduction`, `facebook`, `instagram`, `phone`, `email`, `address`)
SELECT 'https://shop-olivia.com/cdn/shop/files/thumbnail_OliviaLogo-BLK_400x.png?v=1689365415', 
'At Olivia, our mission is to curate a thoughtfully selected collection of high-end fashion, where every detail reflects the elegance, sophistication, and individuality of our clientele.', 
'https://www.facebook.com/OliviaBoutiquePage/', 
'https://www.instagram.com/oliviaboutique/?hl=es-la',
'0123 456 789',
'info@olivia.com',
'123 Fashion Street, HCM City'
WHERE NOT EXISTS (SELECT 1 FROM `settings`);
