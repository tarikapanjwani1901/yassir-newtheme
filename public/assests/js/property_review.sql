-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 07, 2022 at 11:07 AM
-- Server version: 5.7.23-23
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kriyacsm_yassirtest`
--

-- --------------------------------------------------------

--
-- Table structure for table `property_review`
--

CREATE TABLE `property_review` (
  `id` int(11) NOT NULL COMMENT 'Auto Incremented ID',
  `property_id` int(10) NOT NULL COMMENT 'Listing ID',
  `user_id` int(11) NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT 'Review comment',
  `rating` float NOT NULL COMMENT 'It will be review number/star',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Created date',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Update date'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_review`
--

INSERT INTO `property_review` (`id`, `property_id`, `user_id`, `comment`, `rating`, `created_at`, `updated_at`) VALUES
(24, 9, 0, 'This is good.', 3, '2018-12-20 05:46:33', '2018-12-20 05:46:33'),
(26, 22, 0, 'very nice', 4, '2019-01-01 11:26:39', '2019-01-01 11:26:39'),
(29, 92, 0, 'nice project', 4, '2019-01-23 08:58:56', '2019-01-23 08:58:56'),
(30, 92, 0, 'nice project', 4, '2019-01-23 08:59:58', '2019-01-23 08:59:58'),
(31, 92, 0, 'nice project', 4, '2019-01-23 09:00:26', '2019-01-23 09:00:26'),
(32, 67, 0, 'very good product', 5, '2019-01-25 08:54:59', '2019-01-25 08:54:59'),
(33, 28, 0, 'Nice work', 4, '2019-01-25 08:55:49', '2019-01-25 08:55:49'),
(34, 4, 0, 'nice', 5, '2019-01-25 08:56:10', '2019-01-25 08:56:10'),
(36, 125, 0, 'one of the best in city.', 5, '2019-02-11 06:42:19', '2019-02-11 06:42:19'),
(37, 4, 0, 'Nice Property', 4, '2019-02-28 11:09:21', '2019-02-28 11:09:21'),
(38, 188, 0, 'outstanding work...', 4, '2019-04-18 08:52:38', '2019-04-18 08:52:38'),
(39, 249, 0, 'Wonderful Designs of Wall paper', 4, '2019-05-30 10:46:44', '2019-05-30 10:46:44'),
(40, 77, 0, 'wonderfull', 4, '2019-07-20 01:51:07', '2019-07-20 01:51:07'),
(41, 77, 0, 'Superb 😍', 5, '2019-07-24 05:30:28', '2019-07-24 05:30:28'),
(42, 251, 0, 'Superb Property ❤️', 5, '2019-08-14 12:14:34', '2019-08-14 12:14:34'),
(43, 280, 0, 'A very well luxurious house with all required amenities.Its a dream house for everyone who are looking for paradise on earth.Keep it up VEGA DEVELOPERS', 5, '2019-10-02 06:04:23', '2019-10-02 06:04:23'),
(44, 304, 0, 'Good material and best delivery service.', 5, '2019-12-26 05:10:20', '2019-12-26 05:10:20'),
(45, 295, 0, 'Provides very good and latest designs of tiles and natural stones. Please visit if you require natural stones and tiles.', 5, '2020-01-07 06:25:24', '2020-01-07 06:25:24'),
(46, 328, 0, 'Nice', 5, '2020-01-12 08:14:21', '2020-01-12 08:14:21'),
(47, 82, 0, 'It\'s perfect time to make some plans for the future and it is time to be happy. I\'ve learn this submit and if I may I desire to counsel you few attention-grabbing issues or tips. Maybe you could write next articles referring to this article. I want to learn even more issues about it!|  а', 3, '2020-01-23 09:53:46', '2020-01-23 09:53:46'),
(48, 450, 0, 'Budget collection and cooperative staff.', 5, '2020-02-25 03:15:08', '2020-02-25 03:15:08'),
(49, 454, 0, 'Nice service', 5, '2020-02-26 09:14:03', '2020-02-26 09:14:03'),
(50, 462, 0, 'Best in the pvc furniture', 5, '2020-09-24 04:34:57', '2020-09-24 04:34:57'),
(51, 486, 0, 'Wonderful', 5, '2020-10-16 10:13:51', '2020-10-16 10:13:51'),
(52, 486, 0, 'Nice service served by ply hub', 5, '2020-10-17 10:12:00', '2020-10-17 10:12:00'),
(53, 486, 0, 'Abhishek is absolutely dedicated towards his commitment. His quality of Hardware and ply is beyond imagination. Best in the industry. Highly recommend him.', 5, '2020-10-17 10:36:20', '2020-10-17 10:36:20'),
(54, 72, 0, 'Superb property', 5, '2020-10-21 04:37:49', '2020-10-21 04:37:49'),
(55, 72, 0, 'Nice property', 4, '2020-10-21 04:39:11', '2020-10-21 04:39:11'),
(56, 72, 0, 'Good infrastructure', 4, '2020-10-21 04:40:49', '2020-10-21 04:40:49'),
(57, 72, 0, 'Good location', 4, '2020-10-22 04:30:07', '2020-10-22 04:30:07'),
(58, 501, 0, 'Good Location at gift city road', 4, '2020-12-09 02:05:19', '2020-12-09 02:05:19'),
(59, 523, 0, 'Good Location', 4, '2021-08-27 12:22:31', '2021-08-27 12:22:31'),
(60, 515, 0, 'Best Location in Motera', 5, '2021-08-27 04:11:19', '2021-08-27 04:11:19'),
(61, 520, 0, 'Superb Video', 5, '2021-08-27 04:28:52', '2021-08-27 04:28:52'),
(62, 503, 0, 'Awesome flat 3 BHK in price of 2 bhk', 4, '2021-08-27 04:35:13', '2021-08-27 04:35:13'),
(63, 503, 0, 'Awesome flat 3 BHK in price of 2 bhk', 4, '2021-08-27 04:35:25', '2021-08-27 04:35:25'),
(64, 502, 0, 'Best Location In kudasan  road touch Flat', 5, '2021-08-27 04:38:10', '2021-08-27 04:38:10'),
(65, 500, 0, 'Ghar ho to Shagun 12 jaisa', 5, '2021-08-27 04:40:13', '2021-08-27 04:40:13'),
(66, 497, 0, 'Good Project I like 3 BHK flat planning', 5, '2021-08-27 04:43:08', '2021-08-27 04:43:08'),
(67, 496, 0, 'Small Project very nice flat', 4, '2021-08-27 04:44:53', '2021-08-27 04:44:53'),
(68, 494, 0, 'I want to purchase garden facing flat', 5, '2021-08-27 04:45:47', '2021-08-27 04:45:47'),
(69, 493, 0, 'very good flat in best location budgeted flat', 4, '2021-08-27 04:46:43', '2021-08-27 04:46:43'),
(70, 492, 0, 'sample house Ready?', 4, '2021-08-27 04:48:14', '2021-08-27 04:48:14'),
(71, 490, 0, '3 bhk Vavol ma road touch best flat', 4, '2021-08-27 04:49:22', '2021-08-27 04:49:22'),
(72, 489, 0, 'wow i like bunglows', 5, '2021-08-27 04:50:40', '2021-08-27 04:50:40'),
(73, 522, 0, '2 BHK Size very nice', 5, '2021-08-27 05:00:23', '2021-08-27 05:00:23'),
(74, 522, 0, '2 BHK Size very nice', 5, '2021-08-27 05:00:24', '2021-08-27 05:00:24'),
(75, 148, 0, 'Best location', 5, '2021-09-15 10:42:36', '2021-09-15 10:42:36'),
(76, 290, 0, 'Superb location road touch', 5, '2021-09-23 11:18:27', '2021-09-23 11:18:27'),
(77, 290, 0, 'Superb location road touch', 5, '2021-09-23 11:18:28', '2021-09-23 11:18:28'),
(78, 522, 0, 'Best location in Budget', 5, '2021-10-04 01:26:37', '2021-10-04 01:26:37'),
(79, 524, 0, 'good flat in budget', 5, '2021-10-12 03:24:24', '2021-10-12 03:24:24'),
(80, 383, 0, 'good location gandhinagar', 4, '2021-11-17 11:42:42', '2021-11-17 11:42:42'),
(81, 279, 0, 'Nice project in Sargasan', 5, '2021-11-17 11:43:26', '2021-11-17 11:43:26'),
(82, 66, 0, 'Best Quality Product', 5, '2021-11-17 03:26:40', '2021-11-17 03:26:40'),
(83, 70, 0, 'Nice', 5, '2021-11-17 03:30:22', '2021-11-17 03:30:22'),
(84, 113, 0, 'best in sargasan', 4, '2021-11-17 03:35:13', '2021-11-17 03:35:13'),
(85, 126, 0, 'Quality', 5, '2021-11-17 03:44:16', '2021-11-17 03:44:16'),
(86, 245, 0, 'Nice product', 5, '2021-11-17 03:52:59', '2021-11-17 03:52:59'),
(87, 245, 0, 'Nice product', 5, '2021-11-17 03:52:59', '2021-11-17 03:52:59'),
(88, 262, 0, 'nice', 5, '2021-11-17 04:02:05', '2021-11-17 04:02:05'),
(89, 395, 0, 'best quality', 4, '2021-11-17 04:04:27', '2021-11-17 04:04:27'),
(90, 443, 0, 'NICE', 5, '2021-11-17 04:06:45', '2021-11-17 04:06:45'),
(91, 383, 0, 'BEST LOCATION', 5, '2021-11-17 04:13:04', '2021-11-17 04:13:04'),
(92, 279, 0, 'good location gandhinagar', 5, '2021-11-17 04:14:56', '2021-11-17 04:14:56'),
(93, 524, 0, 'BEST PROJECT', 5, '2021-11-17 04:17:22', '2021-11-17 04:17:22'),
(94, 521, 0, 'BEST PROJECT', 5, '2021-11-17 04:20:53', '2021-11-17 04:20:53'),
(95, 519, 0, 'BEST LOCATION', 5, '2021-11-17 04:32:08', '2021-11-17 04:32:08'),
(96, 525, 0, 'bEST LOCATION IN VAVOL', 5, '2021-11-17 04:33:51', '2021-11-17 04:33:51'),
(97, 77, 0, 'nice', 5, '2021-11-18 05:17:40', '2021-11-18 05:17:40'),
(98, 280, 0, 'BEST PROJECT', 5, '2021-11-18 05:19:52', '2021-11-18 05:19:52'),
(99, 72, 0, 'BEST LOCATION', 5, '2021-11-18 05:25:21', '2021-11-18 05:25:21'),
(100, 496, 0, 'BEST PROJECT', 5, '2021-11-18 05:26:41', '2021-11-18 05:26:41'),
(101, 494, 0, 'BEST PROJECT', 5, '2021-11-18 05:27:32', '2021-11-18 05:27:32'),
(102, 493, 0, 'Nice', 5, '2021-11-18 05:37:20', '2021-11-18 05:37:20'),
(103, 489, 0, 'BEST LOCATION', 5, '2021-11-18 05:50:05', '2021-11-18 05:50:05'),
(104, 517, 0, 'one of the best', 5, '2021-11-18 05:51:19', '2021-11-18 05:51:19'),
(105, 502, 0, 'Nice', 5, '2021-11-18 05:52:25', '2021-11-18 05:52:25'),
(106, 524, 0, '१', 1, '2021-11-21 10:39:18', '2021-11-21 10:39:18'),
(107, 524, 0, '१', 1, '2021-11-21 10:39:19', '2021-11-21 10:39:19'),
(108, 89, 0, 'nice', 4, '2021-11-22 04:59:58', '2021-11-22 04:59:58'),
(109, 89, 0, 'ak dam badhiya', 5, '2021-11-22 05:00:51', '2021-11-22 05:00:51'),
(110, 89, 0, 'nice interior design', 5, '2021-11-22 05:01:59', '2021-11-22 05:01:59'),
(111, 238, 0, 'nice one', 5, '2021-11-22 05:02:51', '2021-11-22 05:02:51'),
(112, 238, 0, 'nice one', 5, '2021-11-22 05:02:52', '2021-11-22 05:02:52'),
(113, 84, 0, 'nice', 5, '2021-11-22 05:08:55', '2021-11-22 05:08:55'),
(114, 84, 0, 'nice', 5, '2021-11-22 05:08:56', '2021-11-22 05:08:56'),
(115, 84, 0, 'nice furniture design', 5, '2021-11-22 05:10:03', '2021-11-22 05:10:03'),
(116, 519, 0, 'nice property in sargasan', 5, '2021-11-26 03:43:50', '2021-11-26 03:43:50'),
(117, 525, 0, 'amazing', 5, '2021-11-26 03:45:10', '2021-11-26 03:45:10'),
(118, 525, 0, 'amazing', 5, '2021-11-26 03:45:11', '2021-11-26 03:45:11'),
(119, 519, 0, 'This project is near by guda garden very good location to live in gandhinagar', 5, '2021-12-01 04:53:32', '2021-12-01 04:53:32'),
(120, 290, 0, 'super location in gandhinagar it is connect to SG highway', 5, '2021-12-01 04:56:25', '2021-12-01 04:56:25'),
(121, 279, 0, 'I LIKE THIS PROJECT BECOZ IT IS NEAR BY SARGASAN CHOKDI', 5, '2021-12-01 04:58:22', '2021-12-01 04:58:22'),
(122, 503, 0, '2BHK NA BHAV MA 3BHK MALE CHE GOOD', 5, '2021-12-01 05:04:17', '2021-12-01 05:04:17'),
(123, 77, 0, 'I HAVE SEEN THIS PROPERTY FROM FACEBOOK VERY NICE MARKETING', 5, '2021-12-01 05:08:21', '2021-12-01 05:08:21'),
(124, 497, 0, 'THIS PROJECT IS ROAD TOUCH I PERSONALLY SUGGEST TO PURCHASE HERE THANK YOU', 5, '2021-12-01 05:12:38', '2021-12-01 05:12:38'),
(125, 492, 0, 'GANDHINAGAR PROPERTY PRICE IS VERY HIGH', 5, '2021-12-01 05:20:34', '2021-12-01 05:20:34'),
(126, 521, 0, 'VAVOL IS BATTER THAN SARGASAN', 5, '2021-12-01 05:24:50', '2021-12-01 05:24:50'),
(127, 124, 0, 'VAVOL NEAR BY RAILWAY STATION SO THAT WE CAN EASLY TRAWEL', 5, '2021-12-01 05:27:26', '2021-12-01 05:27:26'),
(128, 68, 0, 'VAVOL PRICE NOW SME IS SARGASAN', 4, '2021-12-01 05:29:24', '2021-12-01 05:29:24'),
(129, 124, 0, 'VAVOL IS BATTER THAN SARGASAN', 4, '2021-12-03 04:27:39', '2021-12-03 04:27:39'),
(130, 490, 0, 'VAVOL PRICE NOW SME IS SARGASAN', 5, '2021-12-03 04:32:01', '2021-12-03 04:32:01'),
(131, 502, 0, 'i like the planning', 5, '2021-12-03 04:33:48', '2021-12-03 04:33:48'),
(132, 517, 0, 'GANDHINAGAR PROPERTY PRICE IS VERY HIGH', 5, '2021-12-03 04:37:06', '2021-12-03 04:37:06'),
(133, 490, 0, 'no any property for 1 bhk', 5, '2021-12-03 04:38:53', '2021-12-03 04:38:53'),
(134, 251, 0, 'it s like i live in nature lap super area', 5, '2021-12-03 05:02:41', '2021-12-03 05:02:41'),
(135, 66, 0, 'TV UNITE IS IN BEST DESIGN', 5, '2021-12-07 03:27:23', '2021-12-07 03:27:23'),
(136, 70, 0, 'NICE QUALITY GRANITE', 5, '2021-12-07 03:34:20', '2021-12-07 03:34:20'),
(137, 126, 0, 'AWESOME PVC KITCHEN DESIGN', 5, '2021-12-07 03:40:25', '2021-12-07 03:40:25'),
(138, 245, 0, 'WHICH QUALITY FAN PRODUCT IS IT', 4, '2021-12-07 03:50:43', '2021-12-07 03:50:43'),
(139, 259, 0, 'BLACK GALAXY GRANITE IS NICE', 5, '2021-12-07 03:53:00', '2021-12-07 03:53:00'),
(140, 526, 0, 'best bunglow  project in vavol', 5, '2021-12-08 04:59:09', '2021-12-08 04:59:09'),
(141, 513, 0, '3 - 4 bhk biggest project in sargasan', 5, '2021-12-08 05:02:49', '2021-12-08 05:02:49'),
(142, 512, 0, 'nice location', 4, '2021-12-08 05:05:07', '2021-12-08 05:05:07'),
(143, 527, 0, 'I want to visit this Bungalows', 5, '2021-12-10 11:14:22', '2021-12-10 11:14:22'),
(144, 110, 0, 'canadian pharmaceuticals online  [url=https://disvaiza.mystrikingly.com/#]pharmeasy [/url] \r\ncanadian drugs pharmacy  <a href=\"https://disvaiza.mystrikingly.com/#\">online medicine order discount </a> \r\nshoppers drug mart canada  https://disvaiza.mystrikingly.com/', 3, '2022-01-24 07:27:26', '2022-01-24 07:27:26'),
(145, 533, 0, 'best planning must visit atlist once', 5, '2022-01-26 09:43:11', '2022-01-26 09:43:11'),
(146, 110, 0, 'canadian pharmacy online  [url=https://61fe252e95052.site123.me/blog/canadian-pharmaceuticals-online-viagra-dosages-25mg-50mg-100mg#]online order medicine [/url] \r\npharmacy online shopping  <a href=\"https://61fe252e95052.site123.me/blog/canadian-pharmaceuticals-online-viagra-dosages-25mg-50mg-100mg#\">canadian pharmacy online </a> \r\npharmacies in canada  https://61fe252e95052.site123.me/blog/canadian-pharmaceuticals-online-viagra-dosages-25mg-50mg-100mg', 3, '2022-02-06 04:30:02', '2022-02-06 04:30:02'),
(147, 110, 0, 'canadian prescriptions online  [url=https://61fe252e95052.site123.me/blog/canadian-pharmaceuticals-online-viagra-dosages-25mg-50mg-100mg#]cialis pharmacy online [/url] \r\napproved canadian online pharmacies  <a href=\"https://61fe252e95052.site123.me/blog/canadian-pharmaceuticals-online-viagra-dosages-25mg-50mg-100mg#\">canadian pharmacies </a> \r\ncanada pharmaceuticals online generic  https://61fe252e95052.site123.me/blog/canadian-pharmaceuticals-online-viagra-dosages-25mg-50mg-100mg', 3, '2022-02-06 12:52:42', '2022-02-06 12:52:42'),
(148, 110, 0, 'canadian drugs online pharmacies  [url=https://61fe252e95052.site123.me/blog/canadian-pharmaceuticals-online-viagra-dosages-25mg-50mg-100mg#]pharmacy online prescription [/url] \r\npanacea pharmacy  <a href=\"https://61fe252e95052.site123.me/blog/canadian-pharmaceuticals-online-viagra-dosages-25mg-50mg-100mg#\">canadian pharmacies </a> \r\ncialis pharmacy online  https://61fe252e95052.site123.me/blog/canadian-pharmaceuticals-online-viagra-dosages-25mg-50mg-100mg', 2, '2022-02-07 02:35:16', '2022-02-07 02:35:16'),
(149, 110, 0, 'cialis pharmacy online  [url=https://61fe252e95052.site123.me/blog/canadian-pharmaceuticals-online-viagra-dosages-25mg-50mg-100mg#]canada pharmacy [/url] \r\ncanadian drugs pharmacies online  <a href=\"https://61fe252e95052.site123.me/blog/canadian-pharmaceuticals-online-viagra-dosages-25mg-50mg-100mg#\">pharmacy </a> \r\npharmacies online  https://61fe252e95052.site123.me/blog/canadian-pharmaceuticals-online-viagra-dosages-25mg-50mg-100mg', 2, '2022-02-07 10:58:35', '2022-02-07 10:58:35'),
(150, 110, 0, 'canadian viagra  [url=https://61fe252e95052.site123.me/blog/canadian-pharmaceuticals-online-viagra-dosages-25mg-50mg-100mg#]drugstore online [/url] \r\npharmacy online drugstore  <a href=\"https://61fe252e95052.site123.me/blog/canadian-pharmaceuticals-online-viagra-dosages-25mg-50mg-100mg#\">pharmacie </a> \r\ncanadian online pharmacies legitimate  https://61fe252e95052.site123.me/blog/canadian-pharmaceuticals-online-viagra-dosages-25mg-50mg-100mg', 4, '2022-02-08 06:24:07', '2022-02-08 06:24:07'),
(151, 110, 0, 'canadian pharmacy generic viagra  [url=https://61fe252e95052.site123.me/blog/canadian-pharmaceuticals-online-viagra-dosages-25mg-50mg-100mg#]pharmacies shipping to usa [/url] \r\ncanadian pharcharmy online  <a href=\"https://61fe252e95052.site123.me/blog/canadian-pharmaceuticals-online-viagra-dosages-25mg-50mg-100mg#\">online order medicine </a> \r\nshoppers pharmacy  https://61fe252e95052.site123.me/blog/canadian-pharmaceuticals-online-viagra-dosages-25mg-50mg-100mg', 1, '2022-02-08 02:52:37', '2022-02-08 02:52:37'),
(152, 110, 0, 'navarro pharmacy  [url=https://61fe252e95052.site123.me/blog/canadian-pharmaceuticals-online-viagra-dosages-25mg-50mg-100mg#]cheap pharmacy online [/url] \r\ncanada discount drug  <a href=\"https://61fe252e95052.site123.me/blog/canadian-pharmaceuticals-online-viagra-dosages-25mg-50mg-100mg#\">medicine online order </a> \r\napollo pharmacy online  https://61fe252e95052.site123.me/blog/canadian-pharmaceuticals-online-viagra-dosages-25mg-50mg-100mg', 4, '2022-02-08 11:11:03', '2022-02-08 11:11:03'),
(153, 110, 0, 'compound pharmacy  [url=https://61fe252e95052.site123.me/blog/canadian-pharmaceuticals-online-viagra-dosages-25mg-50mg-100mg#]online pharmacy [/url] \r\ncanada online pharmacies  <a href=\"https://61fe252e95052.site123.me/blog/canadian-pharmaceuticals-online-viagra-dosages-25mg-50mg-100mg#\">online medicine tablets shopping </a> \r\nnavarro pharmacy  https://61fe252e95052.site123.me/blog/canadian-pharmaceuticals-online-viagra-dosages-25mg-50mg-100mg', 1, '2022-02-09 02:02:47', '2022-02-09 02:02:47'),
(154, 110, 0, 'cheap prescription drugs  [url=https://medicine-online.yolasite.com/#]canadian pharmacy online [/url] \r\ndiscount pharmacy  <a href=\"https://medicine-online.yolasite.com/#\">online pharmacies </a> \r\ncanadian pharmaceuticals  https://medicine-online.yolasite.com/', 3, '2022-02-14 05:13:39', '2022-02-14 05:13:39'),
(155, 110, 0, 'pharmacy discount  [url=https://medicine-online.yolasite.com/#]pharmacy intern [/url] \r\ncanada pharmacy  <a href=\"https://medicine-online.yolasite.com/#\">pharmacie </a> \r\ncanada online pharmacies  https://medicine-online.yolasite.com/', 2, '2022-02-14 09:25:22', '2022-02-14 09:25:22'),
(156, 110, 0, 'canada discount drug  [url=https://medicine-online.yolasite.com/#]canada discount drug [/url] \r\nwalgreens pharmacy online  <a href=\"https://medicine-online.yolasite.com/#\">canadian pharmacies </a> \r\ndiscount pharmacies  https://medicine-online.yolasite.com/', 1, '2022-02-15 09:21:37', '2022-02-15 09:21:37'),
(157, 110, 0, 'canadian online pharmacy  [url=https://medicine-online.yolasite.com/#]canadian pharmacies [/url] \r\npharmacy online prescription  <a href=\"https://medicine-online.yolasite.com/#\">pharmacie </a> \r\ncanadian pharmacy review  https://medicine-online.yolasite.com/', 3, '2022-02-17 07:51:18', '2022-02-17 07:51:18'),
(158, 110, 0, 'canadian pharmacy review  [url=https://graph.org/Understand-COVID-19-And-Know-The-Tricks-To-Avoid-It-From-Spreading---Medical-Services-02-21#]pharmacies shipping to usa [/url] \r\ncanadian pharmacies-247  <a href=\"https://telegra.ph/Technology-A-linchpin-To-Maintain-Businesses-Handle-Remote-Workforce-Amid-Pandemic---Technology-02-16#\">canada pharmaceuticals online </a> \r\nonline drugstore  https://graph.org/Understand-COVID-19-And-Know-The-Tricks-To-Avoid-It-From-Spreading---Medical-Services-02-21', 1, '2022-02-22 07:10:20', '2022-02-22 07:10:20'),
(159, 110, 0, 'national pharmacies online  [url=https://graph.org/Understand-COVID-19-And-Know-The-Tricks-To-Avoid-It-From-Spreading---Medical-Services-02-21#]online canadian pharcharmy [/url] \r\ncanadian pharmaceuticals  <a href=\"https://graph.org/Understand-COVID-19-And-Know-The-Tricks-To-Avoid-It-From-Spreading---Medical-Services-02-21#\">pharmacy uk </a> \r\npharmacy intern  https://graph.org/Understand-COVID-19-And-Know-The-Tricks-To-Avoid-It-From-Spreading---Medical-Services-02-21', 1, '2022-02-22 09:00:22', '2022-02-22 09:00:22'),
(160, 110, 0, 'compound pharmacy  [url=https://graph.org/Understand-COVID-19-And-Know-The-Tricks-To-Avoid-It-From-Spreading---Medical-Services-02-21#]shoppers drug mart canada [/url] \r\npharmacies in canada  <a href=\"https://telegra.ph/Technology-A-linchpin-To-Maintain-Businesses-Handle-Remote-Workforce-Amid-Pandemic---Technology-02-16#\">pharmacy online no prescription </a> \r\ninternational pharmacy  https://graph.org/Understand-COVID-19-And-Know-The-Tricks-To-Avoid-It-From-Spreading---Medical-Services-02-21', 1, '2022-02-23 10:46:10', '2022-02-23 10:46:10'),
(161, 110, 0, 'canada pharmaceuticals  [url=http://andere.strikingly.com/#]canada pharmacy [/url] \r\ncanadian online pharmacy  <a href=\"https://graph.org/Omicron-Variant-Symptoms-Is-An-Excessive-Amount-Of-Mucus-A-COVID-19-Symptom-02-24#\">canadian drugs online pharmacies </a> \r\npharmacies online  https://telegra.ph/How-Has-The-COVID-19-Pandemic-Changed-Our-Lives-Globally-02-24', 2, '2022-02-25 06:49:34', '2022-02-25 06:49:34'),
(162, 110, 0, 'shoppers drug mart canada  [url=http://andere.strikingly.com/#]canadian online pharmacies [/url] \r\ncialis pharmacy online  <a href=\"https://kernyusa.estranky.sk/#\">canadian pharmacies online </a> \r\ncanada pharmaceutical online ordering  https://graph.org/Omicron-Variant-Symptoms-Is-An-Excessive-Amount-Of-Mucus-A-COVID-19-Symptom-02-24', 3, '2022-02-25 03:49:19', '2022-02-25 03:49:19'),
(163, 110, 0, 'canadian pharmacies online  [url=https://kernyusa.estranky.sk/#]canadian pharmacies [/url] \r\ncanadian pharcharmy  <a href=\"https://graph.org/Omicron-Variant-Symptoms-Is-An-Excessive-Amount-Of-Mucus-A-COVID-19-Symptom-02-24#\">canadian pharmacies online </a> \r\npharmacy online shopping  https://gpefy8.wixsite.com/pharmacy/post/optimal-frequency-setting-of-metro-services-within-the-age-of-covid-19-distancing-measures', 2, '2022-02-26 05:33:11', '2022-02-26 05:33:11'),
(164, 110, 0, 'online pharmacy busted  [url=https://gpefy8.wixsite.com/pharmacy/post/optimal-frequency-setting-of-metro-services-within-the-age-of-covid-19-distancing-measures#]pharmacies shipping to usa [/url] \r\nonline pharmacies uk  <a href=\"https://telegra.ph/How-Has-The-COVID-19-Pandemic-Changed-Our-Lives-Globally-02-24#\">medicine online shopping </a> \r\nonline pharmacies canada  https://kernyusa.estranky.sk/', 2, '2022-02-26 06:21:07', '2022-02-26 06:21:07'),
(165, 110, 0, 'shoppers pharmacy  [url=https://graph.org/Omicron-Variant-Symptoms-Is-An-Excessive-Amount-Of-Mucus-A-COVID-19-Symptom-02-24#]publix pharmacy online ordering [/url] \r\npharmacy on line  <a href=\"https://kernyusa.estranky.sk/#\">medicine online order </a> \r\ncanadian pharmacies online  https://telegra.ph/How-Has-The-COVID-19-Pandemic-Changed-Our-Lives-Globally-02-24', 3, '2022-02-27 06:36:02', '2022-02-27 06:36:02'),
(166, 110, 0, 'canadian pharmacy online viagra  [url=https://kernyusa.estranky.sk/#]online pharmacies [/url] \r\ncanadian pharmacies online  <a href=\"https://kernyusa.estranky.sk/#\">medical pharmacies </a> \r\ncanadian drugstore  https://graph.org/Omicron-Variant-Symptoms-Is-An-Excessive-Amount-Of-Mucus-A-COVID-19-Symptom-02-24', 4, '2022-02-27 07:41:41', '2022-02-27 07:41:41'),
(167, 110, 0, 'canadian pharmacies  [url=https://graph.org/Omicron-Variant-Symptoms-Is-An-Excessive-Amount-Of-Mucus-A-COVID-19-Symptom-02-24#]cheap pharmacy online [/url] \r\ncheap prescription drugs  <a href=\"https://graph.org/Omicron-Variant-Symptoms-Is-An-Excessive-Amount-Of-Mucus-A-COVID-19-Symptom-02-24#\">canadian pharmaceuticals online </a> \r\ncanadian prescriptions online  https://telegra.ph/How-Has-The-COVID-19-Pandemic-Changed-Our-Lives-Globally-02-24', 1, '2022-02-28 08:47:33', '2022-02-28 08:47:33'),
(168, 110, 0, 'pharmacy online prescription  [url=https://telegra.ph/How-Has-The-COVID-19-Pandemic-Changed-Our-Lives-Globally-02-24#]online order medicine [/url] \r\ncanadian pharmacy  <a href=\"https://telegra.ph/How-Has-The-COVID-19-Pandemic-Changed-Our-Lives-Globally-02-24#\">canada pharmaceuticals online </a> \r\npharmacy online prescription  https://telegra.ph/How-Has-The-COVID-19-Pandemic-Changed-Our-Lives-Globally-02-24', 4, '2022-02-28 10:24:11', '2022-02-28 10:24:11'),
(169, 110, 0, 'viagra pharmacy 100mg  [url=https://graph.org/Omicron-Variant-Symptoms-Is-An-Excessive-Amount-Of-Mucus-A-COVID-19-Symptom-02-24#]online medicine shopping [/url] \r\nonline pharmacies uk  <a href=\"https://kernyusa.estranky.sk/#\">pharmacy online </a> \r\nprescription drugs from canada  https://telegra.ph/How-Has-The-COVID-19-Pandemic-Changed-Our-Lives-Globally-02-24', 1, '2022-03-01 11:23:03', '2022-03-01 11:23:03'),
(170, 110, 0, 'medical pharmacy  [url=https://graph.org/Omicron-Variant-Symptoms-Is-An-Excessive-Amount-Of-Mucus-A-COVID-19-Symptom-02-24#]canada online pharmacies [/url] \r\ngeneric viagra online pharmacy  <a href=\"https://kernyusa.estranky.sk/#\">international pharmacy </a> \r\nmedical pharmacy  https://graph.org/Omicron-Variant-Symptoms-Is-An-Excessive-Amount-Of-Mucus-A-COVID-19-Symptom-02-24', 4, '2022-03-02 12:28:10', '2022-03-02 12:28:10'),
(171, 110, 0, 'pharmacy drugstore online  [url=https://graph.org/Omicron-Variant-Symptoms-Is-An-Excessive-Amount-Of-Mucus-A-COVID-19-Symptom-02-24#]pharmacies shipping to usa [/url] \r\ncanada pharmacy  <a href=\"https://kernyusa.estranky.sk/#\">apollo pharmacy online </a> \r\npharmacies shipping to usa  https://kernyusa.estranky.sk/', 1, '2022-03-02 01:29:33', '2022-03-02 01:29:33'),
(172, 110, 0, 'pills viagra pharmacy 100mg  [url=http://andere.strikingly.com/#]online pharmacies canada [/url] \r\ncanadian pharmacy  <a href=\"http://andere.strikingly.com/#\">publix pharmacy online ordering </a> \r\nwalmart pharmacy online  https://graph.org/Omicron-Variant-Symptoms-Is-An-Excessive-Amount-Of-Mucus-A-COVID-19-Symptom-02-24', 4, '2022-03-03 02:23:02', '2022-03-03 02:23:02'),
(173, 110, 0, 'online drugstore pharmacy  [url=https://telegra.ph/How-Has-The-COVID-19-Pandemic-Changed-Our-Lives-Globally-02-24#]canadian pharmacy online [/url] \r\nlondon drugs canada  <a href=\"http://andere.strikingly.com/#\">canadian online pharmacies </a> \r\nonline pharmacy  https://gpefy8.wixsite.com/pharmacy/post/optimal-frequency-setting-of-metro-services-within-the-age-of-covid-19-distancing-measures', 2, '2022-03-03 03:17:22', '2022-03-03 03:17:22'),
(174, 110, 0, 'online pharmacy drugstore  [url=http://andere.strikingly.com/#]pharmacy online shopping [/url] \r\nbest online international pharmacies  <a href=\"https://graph.org/Omicron-Variant-Symptoms-Is-An-Excessive-Amount-Of-Mucus-A-COVID-19-Symptom-02-24#\">canadian pharmacies-24h </a> \r\ncanadian pharmaceuticals online safe  https://graph.org/Omicron-Variant-Symptoms-Is-An-Excessive-Amount-Of-Mucus-A-COVID-19-Symptom-02-24', 3, '2022-03-04 04:26:14', '2022-03-04 04:26:14'),
(175, 110, 0, 'canada pharmacy online  [url=https://gpefy8.wixsite.com/pharmacy/post/optimal-frequency-setting-of-metro-services-within-the-age-of-covid-19-distancing-measures#]pharmacy online drugstore [/url] \r\nonline pharmacies  <a href=\"https://telegra.ph/How-Has-The-COVID-19-Pandemic-Changed-Our-Lives-Globally-02-24#\">medicine online shopping </a> \r\nshoppers pharmacy  https://telegra.ph/How-Has-The-COVID-19-Pandemic-Changed-Our-Lives-Globally-02-24', 2, '2022-03-04 05:30:11', '2022-03-04 05:30:11'),
(176, 110, 0, 'canadian cialis  [url=http://andere.strikingly.com/#]medicine online order [/url] \r\npharmacy in canada  <a href=\"http://andere.strikingly.com/#\">canadian pharmacies </a> \r\nonline pharmacy drugstore  https://kernyusa.estranky.sk/', 3, '2022-03-05 06:32:50', '2022-03-05 06:32:50'),
(177, 110, 0, 'pharmacies shipping to usa  [url=https://gpefy8.wixsite.com/pharmacy/post/optimal-frequency-setting-of-metro-services-within-the-age-of-covid-19-distancing-measures#]canadian online pharmacies [/url] \r\npharmacy online prescription  <a href=\"https://telegra.ph/How-Has-The-COVID-19-Pandemic-Changed-Our-Lives-Globally-02-24#\">pharmacy online </a> \r\nmexican border pharmacies  https://telegra.ph/How-Has-The-COVID-19-Pandemic-Changed-Our-Lives-Globally-02-24', 3, '2022-03-06 07:01:02', '2022-03-06 07:01:02'),
(178, 110, 0, 'canadian pharmacy drugs online  [url=https://graph.org/Omicron-Variant-Symptoms-Is-An-Excessive-Amount-Of-Mucus-A-COVID-19-Symptom-02-24#]drugstore online [/url] \r\nonline pharmacy busted  <a href=\"https://telegra.ph/How-Has-The-COVID-19-Pandemic-Changed-Our-Lives-Globally-02-24#\">canadian pharmacy review </a> \r\ncanadian pharmacy generic viagra  https://kernyusa.estranky.sk/', 3, '2022-03-06 05:44:24', '2022-03-06 05:44:24'),
(179, 110, 0, 'mexican border pharmacies  [url=http://andere.strikingly.com/#]shoppers drug mart canada [/url] \r\ncanadian drugs online pharmacy  <a href=\"https://kernyusa.estranky.sk/#\">canadian pharmacy </a> \r\nprescription drugs from canada  https://telegra.ph/How-Has-The-COVID-19-Pandemic-Changed-Our-Lives-Globally-02-24', 1, '2022-03-07 04:30:32', '2022-03-07 04:30:32'),
(180, 110, 0, 'canadian pharmacy cialis 20mg  [url=https://gpefy8.wixsite.com/pharmacy/post/optimal-frequency-setting-of-metro-services-within-the-age-of-covid-19-distancing-measures#]pharmeasy [/url] \r\ncanadian pharmacy  <a href=\"https://gpefy8.wixsite.com/pharmacy/post/optimal-frequency-setting-of-metro-services-within-the-age-of-covid-19-distancing-measures#\">order medicine online </a> \r\ncanada discount drug  https://graph.org/Omicron-Variant-Symptoms-Is-An-Excessive-Amount-Of-Mucus-A-COVID-19-Symptom-02-24', 3, '2022-03-07 02:50:15', '2022-03-07 02:50:15'),
(181, 110, 0, 'online pharmacies uk  [url=https://telegra.ph/How-Has-The-COVID-19-Pandemic-Changed-Our-Lives-Globally-02-24#]online order medicine [/url] \r\ncanada pharmacy  <a href=\"https://telegra.ph/How-Has-The-COVID-19-Pandemic-Changed-Our-Lives-Globally-02-24#\">canadian pharmaceuticals online </a> \r\nonline pharmacies legitimate  https://telegra.ph/How-Has-The-COVID-19-Pandemic-Changed-Our-Lives-Globally-02-24', 4, '2022-03-08 01:54:03', '2022-03-08 01:54:03'),
(182, 110, 0, 'walmart pharmacy viagra  [url=https://telegra.ph/How-Has-The-COVID-19-Pandemic-Changed-Our-Lives-Globally-02-24#]order medicine online [/url] \r\nmedical pharmacy  <a href=\"http://andere.strikingly.com/#\">drugstore online </a> \r\nmexican pharmacies  https://telegra.ph/How-Has-The-COVID-19-Pandemic-Changed-Our-Lives-Globally-02-24', 4, '2022-03-08 07:33:29', '2022-03-08 07:33:29'),
(183, 110, 0, 'medical pharmacy  [url=https://gpefy8.wixsite.com/pharmacy/post/optimal-frequency-setting-of-metro-services-within-the-age-of-covid-19-distancing-measures#]order medicine online [/url] \r\nonline pharmacies in usa  <a href=\"https://graph.org/Omicron-Variant-Symptoms-Is-An-Excessive-Amount-Of-Mucus-A-COVID-19-Symptom-02-24#\">drugstore online shopping </a> \r\ncanadian pharmaceuticals online safe  https://graph.org/Omicron-Variant-Symptoms-Is-An-Excessive-Amount-Of-Mucus-A-COVID-19-Symptom-02-24', 2, '2022-03-08 02:02:14', '2022-03-08 02:02:14'),
(184, 110, 0, 'online pharmacy  [url=https://kernyusa.estranky.sk/#]online medicine shopping [/url] \r\ncialis pharmacy online  <a href=\"http://andere.strikingly.com/#\">online pharmacies canada </a> \r\ndrugstore online shopping  http://andere.strikingly.com/', 1, '2022-03-09 07:46:02', '2022-03-09 07:46:02'),
(185, 110, 0, 'pharmacy online prescription  [url=http://andere.strikingly.com/#]international pharmacy [/url] \r\ncanadian pharmacy review  <a href=\"https://gpefy8.wixsite.com/pharmacy/post/optimal-frequency-setting-of-metro-services-within-the-age-of-covid-19-distancing-measures#\">online medicine order discount </a> \r\ncheap pharmacy online  https://graph.org/Omicron-Variant-Symptoms-Is-An-Excessive-Amount-Of-Mucus-A-COVID-19-Symptom-02-24', 3, '2022-03-09 02:02:57', '2022-03-09 02:02:57'),
(186, 110, 0, 'pharmacy online prescription  [url=https://processbuild48083.wixsite.com/sdehnkys#]national pharmacies online [/url] \r\nonline pharmacy canada  <a href=\"https://telegra.ph/Technology-A-linchpin-To-Maintain-Businesses-Handle-Remote-Workforce-Amid-Pandemic---Technology-02-16#\">online order medicine </a> \r\ncanadian viagra generic pharmacy  https://processbuild48083.wixsite.com/sdehnkys', 4, '2022-03-10 12:14:25', '2022-03-10 12:14:25'),
(187, 110, 0, 'canadian pharmaceuticals  [url=https://disvaiza.mystrikingly.com/#]generic viagra online pharmacy [/url] \r\nnavarro pharmacy miami  <a href=\"https://processbuild48083.wixsite.com/sdehnkys#\">canadian pharmacy drugs online </a> \r\nprescription drugs from canada  https://medicine-online.estranky.sk/clanky/understand-covid-19-and-know-the-tricks-to-avoid-it-from-spreading-----medical-services.html', 2, '2022-03-10 05:24:57', '2022-03-10 05:24:57'),
(188, 110, 0, 'canadian viagra  [url=https://graph.org/Understand-COVID-19-And-Know-The-Tricks-To-Avoid-It-From-Spreading---Medical-Services-02-21#]best canadian online pharmacy [/url] \r\npublix pharmacy online ordering  <a href=\"https://telegra.ph/Technology-A-linchpin-To-Maintain-Businesses-Handle-Remote-Workforce-Amid-Pandemic---Technology-02-16#\">compound pharmacy </a> \r\nonline pharmacies  https://medicine-online.estranky.sk/clanky/understand-covid-19-and-know-the-tricks-to-avoid-it-from-spreading-----medical-services.html', 1, '2022-03-10 10:43:19', '2022-03-10 10:43:19'),
(189, 110, 0, 'canadian pharmaceuticals  [url=https://graph.org/Understand-COVID-19-And-Know-The-Tricks-To-Avoid-It-From-Spreading---Medical-Services-02-21#]walmart pharmacy online [/url] \r\n24 hour pharmacy  <a href=\"https://processbuild48083.wixsite.com/sdehnkys#\">mexican pharmacies </a> \r\ncanadian pharmacies  https://disvaiza.mystrikingly.com/', 3, '2022-03-11 03:43:21', '2022-03-11 03:43:21'),
(190, 110, 0, 'canadian pharmacy generic viagra  [url=https://processbuild48083.wixsite.com/sdehnkys#]canadian pharmaceuticals online [/url] \r\nmedical pharmacies  <a href=\"https://telegra.ph/Technology-A-linchpin-To-Maintain-Businesses-Handle-Remote-Workforce-Amid-Pandemic---Technology-02-16#\">canadian pharmacy </a> \r\ncanadian pharmaceuticals  https://processbuild48083.wixsite.com/sdehnkys', 3, '2022-03-12 07:22:53', '2022-03-12 07:22:53'),
(191, 110, 0, 'cheap prescription drugs  [url=https://graph.org/Understand-COVID-19-And-Know-The-Tricks-To-Avoid-It-From-Spreading---Medical-Services-02-21#]drugstore online shopping [/url] \r\ncanada drugs pharmacy online  <a href=\"https://graph.org/Understand-COVID-19-And-Know-The-Tricks-To-Avoid-It-From-Spreading---Medical-Services-02-21#\">online order medicine </a> \r\napproved canadian online pharmacies  https://medicine-online.estranky.sk/clanky/understand-covid-19-and-know-the-tricks-to-avoid-it-from-spreading-----medical-services.html', 2, '2022-03-12 01:01:35', '2022-03-12 01:01:35'),
(192, 110, 0, 'navarro pharmacy miami  [url=https://graph.org/Understand-COVID-19-And-Know-The-Tricks-To-Avoid-It-From-Spreading---Medical-Services-02-21#]online pharmacy [/url] \r\ncanadian viagra generic pharmacy  <a href=\"https://graph.org/Understand-COVID-19-And-Know-The-Tricks-To-Avoid-It-From-Spreading---Medical-Services-02-21#\">online pharmacy </a> \r\ndiscount canadian drugs  https://telegra.ph/Technology-A-linchpin-To-Maintain-Businesses-Handle-Remote-Workforce-Amid-Pandemic---Technology-02-16', 4, '2022-03-12 06:00:29', '2022-03-12 06:00:29'),
(193, 110, 0, 'viagra pharmacy 100mg  [url=https://telegra.ph/Technology-A-linchpin-To-Maintain-Businesses-Handle-Remote-Workforce-Amid-Pandemic---Technology-02-16#]canada pharmacies [/url] \r\ncanadian pharmacy drugs online  <a href=\"https://disvaiza.mystrikingly.com/#\">canadian online pharmacies </a> \r\npharmacy on line  https://medicine-online.yolasite.com/', 4, '2022-03-12 11:09:39', '2022-03-12 11:09:39'),
(194, 110, 0, 'pharmacy in canada  [url=https://disvaiza.mystrikingly.com/#]discount pharmacies [/url] \r\nbest canadian online pharmacy  <a href=\"https://61fe252e95052.site123.me/blog/canadian-pharmaceuticals-online-viagra-dosages-25mg-50mg-100mg#\">canadian pharmacy </a> \r\non line pharmacy  https://medicine-online.estranky.sk/clanky/understand-covid-19-and-know-the-tricks-to-avoid-it-from-spreading-----medical-services.html', 4, '2022-03-13 03:44:57', '2022-03-13 03:44:57'),
(195, 110, 0, 'indian pharmacy  [url=https://processbuild48083.wixsite.com/sdehnkys#]medicine online shopping [/url] \r\ncanadian pharmaceuticals online safe  <a href=\"https://processbuild48083.wixsite.com/sdehnkys#\">pharmacy online </a> \r\nwalgreens pharmacy online  https://disvaiza.mystrikingly.com/', 2, '2022-03-13 08:49:46', '2022-03-13 08:49:46'),
(196, 110, 0, 'indian pharmacy  [url=https://processbuild48083.wixsite.com/sdehnkys#]canadian cialis [/url] \r\nonline canadian pharcharmy  <a href=\"https://processbuild48083.wixsite.com/sdehnkys#\">drugstore online </a> \r\ncheap prescription drugs  https://telegra.ph/Technology-A-linchpin-To-Maintain-Businesses-Handle-Remote-Workforce-Amid-Pandemic---Technology-02-16', 3, '2022-03-13 02:10:44', '2022-03-13 02:10:44'),
(197, 110, 0, 'cheap pharmacy online  [url=https://processbuild48083.wixsite.com/sdehnkys#]online medicine order discount [/url] \r\ndrugstore online  <a href=\"https://medicine-online.estranky.sk/clanky/understand-covid-19-and-know-the-tricks-to-avoid-it-from-spreading-----medical-services.html#\">medical pharmacy </a> \r\nbest online canadian pharmacy  https://telegra.ph/Technology-A-linchpin-To-Maintain-Businesses-Handle-Remote-Workforce-Amid-Pandemic---Technology-02-16', 3, '2022-03-14 12:51:37', '2022-03-14 12:51:37'),
(198, 110, 0, 'pharmacies online  [url=https://telegra.ph/Technology-A-linchpin-To-Maintain-Businesses-Handle-Remote-Workforce-Amid-Pandemic---Technology-02-16#]generic viagra online [/url] \r\ncanadian government approved pharmacies  <a href=\"https://processbuild48083.wixsite.com/sdehnkys#\">pharmacies shipping to usa </a> \r\npharmacies shipping to usa  https://disvaiza.mystrikingly.com/', 3, '2022-03-15 12:54:02', '2022-03-15 12:54:02'),
(199, 110, 0, 'walgreens pharmacy online  [url=https://disvaiza.mystrikingly.com/#]canadian viagra [/url] \r\npharmacy online prescription  <a href=\"https://61fe252e95052.site123.me/blog/canadian-pharmaceuticals-online-viagra-dosages-25mg-50mg-100mg#\">london drugs canada </a> \r\ncanadian pharmacy online viagra  https://61fe252e95052.site123.me/blog/canadian-pharmaceuticals-online-viagra-dosages-25mg-50mg-100mg', 2, '2022-03-15 12:40:19', '2022-03-15 12:40:19'),
(200, 110, 0, 'navarro pharmacy miami  [url=https://disvaiza.mystrikingly.com/#]canadian drugs pharmacies online [/url] \r\nshoppers pharmacy  <a href=\"https://medicine-online.yolasite.com/#\">canada pharmaceutical online ordering </a> \r\npharmacy discount  https://61fe252e95052.site123.me/blog/canadian-pharmaceuticals-online-viagra-dosages-25mg-50mg-100mg', 2, '2022-03-17 08:27:13', '2022-03-17 08:27:13'),
(201, 110, 0, 'navarro pharmacy miami  [url=https://graph.org/Understand-COVID-19-And-Know-The-Tricks-To-Avoid-It-From-Spreading---Medical-Services-02-21#]canadian pharmacy online viagra [/url] \r\nbuy generic viagra online  <a href=\"https://telegra.ph/Technology-A-linchpin-To-Maintain-Businesses-Handle-Remote-Workforce-Amid-Pandemic---Technology-02-16#\">buy viagra pharmacy 100mg </a> \r\ncanadian pharmacy  https://medicine-online.yolasite.com/', 4, '2022-03-17 07:35:37', '2022-03-17 07:35:37'),
(202, 110, 0, '24 hour pharmacy  [url=https://graph.org/Understand-COVID-19-And-Know-The-Tricks-To-Avoid-It-From-Spreading---Medical-Services-02-21#]cheap pharmacy online [/url] \r\ncanadian pharmacy  <a href=\"https://61fe252e95052.site123.me/blog/canadian-pharmaceuticals-online-viagra-dosages-25mg-50mg-100mg#\">navarro pharmacy </a> \r\nonline pharmacy drugstore  https://disvaiza.mystrikingly.com/', 2, '2022-03-18 05:52:37', '2022-03-18 05:52:37'),
(203, 110, 0, 'shoppers drug mart canada  [url=https://61fe252e95052.site123.me/blog/canadian-pharmaceuticals-online-viagra-dosages-25mg-50mg-100mg#]canadian pharmacies online [/url] \r\ncanadian prescriptions online  <a href=\"https://medicine-online.estranky.sk/clanky/understand-covid-19-and-know-the-tricks-to-avoid-it-from-spreading-----medical-services.html#\">canadian pharmaceuticals </a> \r\nshoppers drug mart pharmacy  https://medicine-online.yolasite.com/', 2, '2022-03-18 05:46:03', '2022-03-18 05:46:03'),
(204, 110, 0, 'drugstore online shopping  [url=https://telegra.ph/Technology-A-linchpin-To-Maintain-Businesses-Handle-Remote-Workforce-Amid-Pandemic---Technology-02-16#]discount pharmacies [/url] \r\nonline drugstore pharmacy  <a href=\"https://processbuild48083.wixsite.com/sdehnkys#\">pharmacy online </a> \r\ncanadian pharmacies-24h  https://disvaiza.mystrikingly.com/', 2, '2022-03-19 05:50:45', '2022-03-19 05:50:45'),
(205, 110, 0, 'on line pharmacy  [url=https://61fe252e95052.site123.me/blog/canadian-pharmaceuticals-online-viagra-dosages-25mg-50mg-100mg#]canadian pharmacies-247 [/url] \r\npharmacy discount  <a href=\"https://61fe252e95052.site123.me/blog/canadian-pharmaceuticals-online-viagra-dosages-25mg-50mg-100mg#\">canada discount drug </a> \r\ncheap prescription drugs  https://61fe252e95052.site123.me/blog/canadian-pharmaceuticals-online-viagra-dosages-25mg-50mg-100mg', 2, '2022-03-19 06:52:42', '2022-03-19 06:52:42'),
(206, 110, 0, 'shoppers pharmacy  [url=https://processbuild48083.wixsite.com/sdehnkys#]online pharmacies [/url] \r\ndrugstore online shopping  <a href=\"https://disvaiza.mystrikingly.com/#\">canadian pharcharmy </a> \r\ncheap prescription drugs  https://disvaiza.mystrikingly.com/', 2, '2022-03-20 06:28:00', '2022-03-20 06:28:00'),
(207, 110, 0, 'pharmacy in canada  [url=https://medicine-online.yolasite.com/#]best online international pharmacies [/url] \r\ncanada pharmacy online  <a href=\"https://processbuild48083.wixsite.com/sdehnkys#\">canadian online pharmacies </a> \r\nwalgreens pharmacy online  https://disvaiza.mystrikingly.com/', 3, '2022-03-20 06:02:12', '2022-03-20 06:02:12'),
(208, 110, 0, 'online pharmacies of canada  [url=https://disvaiza.mystrikingly.com/#]best online canadian pharmacy [/url] \r\nmedical pharmacy  <a href=\"https://disvaiza.mystrikingly.com/#\">canadian pharcharmy </a> \r\ncanadian pharmacies online  https://graph.org/Understand-COVID-19-And-Know-The-Tricks-To-Avoid-It-From-Spreading---Medical-Services-02-21', 3, '2022-03-21 04:39:56', '2022-03-21 04:39:56'),
(209, 110, 0, 'pharmacies shipping to usa  [url=https://graph.org/Understand-COVID-19-And-Know-The-Tricks-To-Avoid-It-From-Spreading---Medical-Services-02-21#]canadian pharcharmy [/url] \r\ncanada drugs online  <a href=\"https://medicine-online.yolasite.com/#\">medicine online order </a> \r\nbest canadian online pharmacies  https://medicine-online.yolasite.com/', 1, '2022-03-21 06:28:32', '2022-03-21 06:28:32'),
(210, 110, 0, 'canadian pharmacy online  [url=https://graph.org/Understand-COVID-19-And-Know-The-Tricks-To-Avoid-It-From-Spreading---Medical-Services-02-21#]online medicine to buy [/url] \r\nshoppers pharmacy  <a href=\"https://medicine-online.estranky.sk/clanky/understand-covid-19-and-know-the-tricks-to-avoid-it-from-spreading-----medical-services.html#\">pharmacies in canada </a> \r\npharmacy online drugstore  https://medicine-online.estranky.sk/clanky/understand-covid-19-and-know-the-tricks-to-avoid-it-from-spreading-----medical-services.html', 1, '2022-03-22 05:31:10', '2022-03-22 05:31:10'),
(211, 110, 0, 'aarp recommended canadian pharmacies  [url=https://61fe252e95052.site123.me/blog/canadian-pharmaceuticals-online-viagra-dosages-25mg-50mg-100mg#]canadian pharmacies online [/url] \r\npharmacies in canada  <a href=\"https://telegra.ph/Technology-A-linchpin-To-Maintain-Businesses-Handle-Remote-Workforce-Amid-Pandemic---Technology-02-16#\">canadian pharmacies online </a> \r\ncanada online pharmacies  https://disvaiza.mystrikingly.com/', 3, '2022-03-22 03:31:57', '2022-03-22 03:31:57'),
(212, 110, 0, 'cheap prescription drugs  [url=https://processbuild48083.wixsite.com/sdehnkys#]canadian pharmacies [/url] \r\ncialis pharmacy online  <a href=\"https://processbuild48083.wixsite.com/sdehnkys#\">pharmacy online </a> \r\nonline pharmacy drugstore  https://graph.org/Understand-COVID-19-And-Know-The-Tricks-To-Avoid-It-From-Spreading---Medical-Services-02-21', 4, '2022-03-23 01:33:58', '2022-03-23 01:33:58'),
(213, 110, 0, 'canada pharmacy  [url=https://telegra.ph/Technology-A-linchpin-To-Maintain-Businesses-Handle-Remote-Workforce-Amid-Pandemic---Technology-02-16#]online pharmacies legitimate [/url] \r\nonline pharmacies  <a href=\"https://graph.org/Understand-COVID-19-And-Know-The-Tricks-To-Avoid-It-From-Spreading---Medical-Services-02-21#\">discount pharmacy </a> \r\nshoppers pharmacy  https://61fe252e95052.site123.me/blog/canadian-pharmaceuticals-online-viagra-dosages-25mg-50mg-100mg', 1, '2022-03-23 11:48:18', '2022-03-23 11:48:18'),
(214, 110, 0, 'Sеlf-Imрrovement and success go hаnd in hand. Taking thе stерs tо make уоursеlf а better and mоrе well-roundеd individuаl will рrоvе to bе а wise decisiоn.', 1, '2022-03-23 01:13:11', '2022-03-23 01:13:11'),
(215, 110, 0, 'best online canadian pharmacy  [url=https://disvaiza.mystrikingly.com/#]aarp recommended canadian pharmacies [/url] \r\ncanadian pharmaceuticals  <a href=\"https://processbuild48083.wixsite.com/sdehnkys#\">canadian drugs </a> \r\nbest online international pharmacies  https://graph.org/Understand-COVID-19-And-Know-The-Tricks-To-Avoid-It-From-Spreading---Medical-Services-02-21', 3, '2022-03-23 10:03:43', '2022-03-23 10:03:43'),
(216, 110, 0, 'prescription drugs from canada  [url=https://disvaiza.mystrikingly.com/#]canadian pharmacy [/url] \r\ncanada pharmaceuticals  <a href=\"https://medicine-online.yolasite.com/#\">mexican pharmacies </a> \r\npharmacy online shopping  https://graph.org/Understand-COVID-19-And-Know-The-Tricks-To-Avoid-It-From-Spreading---Medical-Services-02-21', 1, '2022-03-24 07:50:32', '2022-03-24 07:50:32'),
(217, 110, 0, 'canadian pharmacy viagra generic  [url=https://medicine-online.estranky.sk/clanky/understand-covid-19-and-know-the-tricks-to-avoid-it-from-spreading-----medical-services.html#]pharmacy uk [/url] \r\npharmacy online shopping  <a href=\"https://processbuild48083.wixsite.com/sdehnkys#\">on line pharmacy </a> \r\ngeneric viagra online  https://graph.org/Understand-COVID-19-And-Know-The-Tricks-To-Avoid-It-From-Spreading---Medical-Services-02-21', 4, '2022-03-24 06:14:20', '2022-03-24 06:14:20'),
(218, 110, 0, 'apollo pharmacy online  [url=https://medicine-online.yolasite.com/#]compound pharmacy [/url] \r\npanacea pharmacy  <a href=\"https://graph.org/Understand-COVID-19-And-Know-The-Tricks-To-Avoid-It-From-Spreading---Medical-Services-02-21#\">pharmacie </a> \r\ncanada pharmaceutical online ordering  https://disvaiza.mystrikingly.com/', 3, '2022-03-25 04:25:19', '2022-03-25 04:25:19'),
(219, 110, 0, 'generic viagra online  [url=https://telegra.ph/Technology-A-linchpin-To-Maintain-Businesses-Handle-Remote-Workforce-Amid-Pandemic---Technology-02-16#]online pharmacies in usa [/url] \r\nmexican border pharmacies  <a href=\"https://graph.org/Understand-COVID-19-And-Know-The-Tricks-To-Avoid-It-From-Spreading---Medical-Services-02-21#\">drugstore online </a> \r\ncanada discount drug  https://graph.org/Understand-COVID-19-And-Know-The-Tricks-To-Avoid-It-From-Spreading---Medical-Services-02-21', 2, '2022-03-25 02:23:03', '2022-03-25 02:23:03'),
(220, 110, 0, 'online pharmacy canada  [url=https://graph.org/Understand-COVID-19-And-Know-The-Tricks-To-Avoid-It-From-Spreading---Medical-Services-02-21#]international pharmacy [/url] \r\ncanadian government approved pharmacies  <a href=\"https://processbuild48083.wixsite.com/sdehnkys#\">pharmacie </a> \r\nnavarro pharmacy miami  https://kertvbs.webgarden.com/', 3, '2022-03-27 02:56:31', '2022-03-27 02:56:31'),
(221, 110, 0, 'cheap prescription drugs  [url=https://graph.org/Understand-COVID-19-And-Know-The-Tricks-To-Avoid-It-From-Spreading---Medical-Services-02-21#]canada pharmacies [/url] \r\nshoppers pharmacy  <a href=\"https://gerweds.over-blog.com/2022/03/modeling-covid-19-mortality-risk-in-toronto-canada-sciencedirect.html#\">canadian viagra </a> \r\non line pharmacy  https://disvaiza.mystrikingly.com/', 1, '2022-03-30 03:26:57', '2022-03-30 03:26:57'),
(222, 110, 0, 'canadian viagra generic pharmacy  [url=https://medicine-online.estranky.sk/clanky/understand-covid-19-and-know-the-tricks-to-avoid-it-from-spreading-----medical-services.html#]medicine online shopping [/url] \r\nmexican pharmacies  <a href=\"https://swerbus.webgarden.com/#\">pharmacy online </a> \r\ngeneric viagra online  https://graph.org/Understand-COVID-19-And-Know-The-Tricks-To-Avoid-It-From-Spreading---Medical-Services-02-21', 1, '2022-03-30 10:54:51', '2022-03-30 10:54:51'),
(223, 110, 0, 'canada pharmaceutical online ordering  [url=https://kernyusa.estranky.sk/clanky/risk-factors-linked-to-anxiety-disorders-differ-between-women-and-men-during-the-pandemic.html#]canadian pharmaceuticals online [/url] \r\ncanadian online pharmacy  <a href=\"https://swerbus.webgarden.com/#\">canadian pharmaceuticals online </a> \r\nonline pharmacy drugstore  https://processbuild48083.wixsite.com/sdehnkys', 2, '2022-03-31 11:13:43', '2022-03-31 11:13:43'),
(224, 110, 0, 'pharmacies shipping to usa  [url=https://andere.strikingly.com/#]order medicine online [/url] \r\nshoppers pharmacy  <a href=\"https://gpefy8.wixsite.com/pharmacy/post/optimal-frequency-setting-of-metro-services-within-the-age-of-covid-19-distancing-measures#\">online order medicine </a> \r\nindian pharmacy  https://graph.org/Omicron-Variant-Symptoms-Is-An-Excessive-Amount-Of-Mucus-A-COVID-19-Symptom-02-24', 3, '2022-04-01 08:13:44', '2022-04-01 08:13:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `property_review`
--
ALTER TABLE `property_review`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
