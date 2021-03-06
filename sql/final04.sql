-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `carts`;
CREATE TABLE `carts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `u_id` int(10) unsigned NOT NULL,
  `p_id` int(10) unsigned NOT NULL,
  `price` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `carts` (`id`, `u_id`, `p_id`, `price`, `num`, `updated_at`, `created_at`) VALUES
(28,	2,	3,	500,	3,	'2021-01-12 18:52:34',	'2021-01-12 18:52:34'),
(30,	2,	2,	80,	2,	'2021-01-12 19:14:36',	'2021-01-12 19:14:36');

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(7,	'2014_10_12_100000_create_password_resets_table',	2),
(8,	'2014_10_12_200000_add_two_factor_columns_to_users_table',	2),
(9,	'2019_08_19_000000_create_failed_jobs_table',	2),
(10,	'2019_12_14_000001_create_personal_access_tokens_table',	2),
(11,	'2020_12_18_075641_create_sessions_table',	2),
(12,	'2021_01_11_205733_create_carts_table',	3);

DROP TABLE IF EXISTS `orderdetails`;
CREATE TABLE `orderdetails` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `o_id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `num` int(10) NOT NULL,
  `total` bigint(20) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `o_id` (`o_id`),
  KEY `p_id` (`p_id`),
  CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `products` (`id`),
  CONSTRAINT `orderdetails_ibfk_3` FOREIGN KEY (`o_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `u_id` bigint(20) unsigned NOT NULL,
  `total` bigint(20) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `u_id` (`u_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `orders` (`id`, `u_id`, `total`, `updated_at`, `created_at`) VALUES
(34,	2,	1550,	'2021-01-12 18:56:10',	'2021-01-12 18:56:10'),
(35,	2,	1660,	'2021-01-12 19:14:38',	'2021-01-12 19:14:38');

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('3a732036@gm.student.ncut.edu.tw',	'$2y$10$.4Do8FMvEbyENHOCJW1s.ukFWpmb37lxoFDLf9S4N51.cN9hHlHRG',	'2021-01-12 18:46:18');

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '商品編號',
  `class` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '類別',
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '品名',
  `price` bigint(20) NOT NULL COMMENT '單價',
  `stocks` int(10) NOT NULL COMMENT '庫存量',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '上/下架',
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '圖片',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `products` (`id`, `class`, `name`, `price`, `stocks`, `status`, `img`) VALUES
(1,	'黑巧克力',	'明治黑巧克力',	50,	50,	1,	'https://img.my-best.tw/press_component/item_part_images/ae39e5c6930863a5afd654bc00ab0fb1.jpg?ixlib=rails-3.1.0&auto=compress&q=70&lossless=0&w=640&h=640&fit=clip'),
(2,	'黑巧克力',	'瑞士赫蒂75%黑巧克力',	80,	100,	1,	'https://b.ecimg.tw/items/DBAO0DA72651856/000001_1477461240.jpg'),
(3,	'烏龍茶巧克力',	'I-CHOCO烏龍茶巧克力',	500,	100,	1,	'https://www.npmshops.com/main/uploads/npmshops/PrdImg/9902200500131_x.jpg.webp'),
(4,	'黑巧克力',	'82% 純黑巧克力禮盒',	750,	100,	1,	'https://rs.joo.com.tw/website/uploads_product/website_1043/P0104300112549_4_518561.jpg?_71334'),
(5,	'巧克力派',	'LOTTE 黑巧克力派',	200,	100,	1,	'https://tshop.r10s.com/93b/950/d228/36a1/604f/9b24/2814/118aeaadc20242ac110005.jpg?_ex=460x460'),
(6,	'花生巧克力',	'SNICKERS 士力架花生巧克力',	50,	100,	1,	'https://www.watsons.com.tw/medias/-505g-711392.jpg?context=bWFzdGVyfGZyb250L3pvb218MTAwODM4fGltYWdlL2pwZWd8ZnJvbnQvem9vbS85MTgxOTAzMzU1OTM0LmpwZ3xlNzdkNjkxMmNhNjI3ZTU4YzczNzkwYTdlNDZhMGM4NWY2ODkyYjQzY2MzMDVhYjMyYmJiNGY3ZGMxNDY4Y2I5');

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('oV73JIkV66b9ak3M26JBUBJO0tgDZ4kUbRyxLz3a',	2,	'::1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36',	'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiTk1MbU1rOWhQcmZJZG5oV25CV2U3dURHRW5pR2dwUUhwbHdBNExOcSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvb3JkZXIiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkTmFHZ0VlRks0L2NwNk1aOUR2TXJtdU5aT0dkSHJHeS5yZjk5akQuZ2lZVGxMdVBQU09kN1ciO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJE5hR2dFZUZLNC9jcDZNWjlEdk1ybXVOWk9HZEhyR3kucmY5OWpELmdpWVRsTHVQUFNPZDdXIjt9',	1610478890),
('VRPbco7pL3t1rjYlHvH7mV7wMSXiPRg5MHb7yrH2',	NULL,	'::1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36',	'YTo0OntzOjY6Il90b2tlbiI7czo0MDoic0tzMUdLM2l4ZkMxM2pvZGVBTlJjWkRvRzFPOURzRGdEUkM5WGtzTyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMDoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL3Byb2R1Y3RzIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9mb3Jnb3QtcGFzc3dvcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',	1610477188);

DROP TABLE IF EXISTS `shoppingcarts`;
CREATE TABLE `shoppingcarts` (
  `id` int(10) NOT NULL,
  `u_id` bigint(20) unsigned NOT NULL,
  `p_id` int(10) NOT NULL,
  `total` bigint(20) NOT NULL,
  `num` int(10) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `u_id` (`u_id`),
  KEY `p_id` (`p_id`),
  CONSTRAINT `shoppingcarts_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`),
  CONSTRAINT `shoppingcarts_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) unsigned DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1,	'JUN-YOU YE.',	'3a732036@gm.student.ncut.edu.tw',	NULL,	'$2y$10$qa1350oFX2y0PBvRDJizMut39k8CNcQvU/fLxXkLDiTXB2TU/9eIK',	NULL,	NULL,	NULL,	NULL,	NULL,	'2020-12-18 00:09:10',	'2020-12-18 00:09:10'),
(2,	'36',	'onejun3096@gmail.com',	NULL,	'$2y$10$NaGgEeFK4/cp6MZ9DvMrmuNZOGdHrGy.rf99jD.giYTlLuPPSOd7W',	NULL,	NULL,	'FWqThCvwGBqMiXniY3SYfgAkETkGW6uRASY7yFZQ38otVoLLcCnUXoQIrgqs',	NULL,	NULL,	'2020-12-22 17:18:25',	'2021-01-05 05:02:24'),
(3,	'2021',	'2021@gmail.com',	NULL,	'$2y$10$3BDv0A6r08JeRMqJBaPJpuYgs6qq1Ma3sRsmNQzkCSbfX63MFNqDy',	NULL,	NULL,	NULL,	NULL,	NULL,	'2021-01-07 22:43:37',	'2021-01-07 22:43:37');

-- 2021-01-12 19:14:59
