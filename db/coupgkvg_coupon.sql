-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 21, 2023 at 02:07 AM
-- Server version: 10.3.38-MariaDB-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coupgkvg_coupon`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `ip` varchar(150) NOT NULL,
  `image` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(15) NOT NULL DEFAULT 'sales',
  `inserted_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `name`, `ip`, `image`, `email`, `password`, `role`, `inserted_at`, `updated_at`) VALUES
(1, 'Monoget Saha', '27.147.190.199', 'assets/images/admin/pic1.jpg', 'monoget1@gmail.com', '@BCD1234', 'Admin', '2022-10-13 23:14:33', '2022-11-28 16:02:18'),
(2, 'Super Admin', '103.107.160.134', 'assets/images/admin/pic1.jpg', 'admin@couponxhosting.com', '@BCD1234', 'Admin', '2022-10-13 00:00:00', '2022-11-28 16:02:24');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `blog_cate_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `image` varchar(500) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `inserted_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE `blog_category` (
  `id` int(11) NOT NULL,
  `bc_name` varchar(150) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `inserted_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `c_name` varchar(150) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `inserted_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `c_name`, `status`, `inserted_at`, `updated_at`) VALUES
(1, 'Web Hosting', 1, '2022-12-07 02:06:56', '2023-03-11 10:51:59');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `inserted_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `id` int(11) NOT NULL,
  `store_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(150) NOT NULL,
  `subtitle` varchar(200) NOT NULL,
  `image` varchar(250) NOT NULL,
  `o_link` varchar(1000) NOT NULL,
  `offer_text` varchar(100) NOT NULL DEFAULT 'Sponsored',
  `status` int(11) NOT NULL DEFAULT 1,
  `inserted_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`id`, `store_id`, `category_id`, `title`, `subtitle`, `image`, `o_link`, `offer_text`, `status`, `inserted_at`, `updated_at`) VALUES
(37, 18, 1, 'Dedicated Server Hosting', 'eUKhost Enterprise Hosting', 'assets/images/trendingdeal/74922_eukhost Dedicated Server Hosting.jpg', 'https://www.dpbolvw.net/click-100751633-13326034', ' ', 1, '2023-04-11 19:08:08', '2023-04-11 13:08:08'),
(38, 18, 1, 'cPanel Hosting Plans', 'Shared Hosting Plans', 'assets/images/trendingdeal/83835_eukhost cPanel Hosting.jpg', 'https://www.kqzyfj.com/click-100751633-13326025', ' ', 1, '2023-04-11 19:08:57', '2023-04-11 13:08:57'),
(39, 18, 1, 'UK Cloud Hosting', 'UK Cloud Hosting Services Get Flat 20% Off on our Enterprise Cloud.', 'assets/images/trendingdeal/92252_eukhost cloud hosting.jpg', 'https://www.kqzyfj.com/click-100751633-13065587', ' ', 1, '2023-04-11 19:11:40', '2023-04-11 13:11:40'),
(40, 18, 1, 'UK Wordpress Hosting', 'eUKhost offers 25% off on Wordpress Hosting Use Coupon Code eUK25WP', 'assets/images/trendingdeal/83530_eukhost Wordpress Hosting.jpg', 'https://www.tkqlhce.com/click-100751633-13323225', ' ', 1, '2023-04-11 19:12:49', '2023-04-11 13:12:49'),
(41, 18, 1, 'UK Reseller Hosting Plans', 'eUKhost Offers Best Reseller Hosting', 'assets/images/trendingdeal/4866_eukhost Reseller Hosting.jpg', 'https://www.anrdoezrs.net/click-100751633-13326032', ' ', 1, '2023-04-11 19:13:49', '2023-04-11 13:13:49'),
(42, 18, 1, 'UK Web Hosting Services', 'UK Web Hosting Services', 'assets/images/trendingdeal/36735_eukhost Web Hosting.jpg', 'https://www.dpbolvw.net/click-100751633-11166383', ' ', 1, '2023-04-11 19:14:37', '2023-04-11 13:14:37'),
(43, 18, 1, 'Web Hosting Services', 'Website Hosting Services in the UK', 'assets/images/trendingdeal/60409_eukhost Web Hosting.jpg', 'https://www.kqzyfj.com/click-100751633-11188597', ' ', 1, '2023-04-11 19:15:42', '2023-04-11 13:15:42'),
(44, 18, 1, 'UK Cloud Hosting', 'UK Cloud Hosting Services Get Flat 20% Off on our Enterprise Cloud.', 'assets/images/trendingdeal/27533_eukhost cloud hosting.jpg', 'https://www.kqzyfj.com/click-100751633-13094082', ' ', 1, '2023-04-11 19:16:48', '2023-04-11 13:16:48'),
(45, 18, 1, 'UK VPS Hosting', 'VPS Hosting Plans', 'assets/images/trendingdeal/97257_eukhost VPS Hosting.jpg', 'https://www.jdoqocy.com/click-100751633-13326030', ' ', 1, '2023-04-11 19:17:34', '2023-04-11 13:17:34'),
(46, 18, 1, 'Cloud Hosting Services', 'eUkhost Offers Cloud Hosting Services', 'assets/images/trendingdeal/65031_eukhost cloud hosting.jpg', 'https://www.dpbolvw.net/click-100751633-13326036', ' ', 1, '2023-04-11 19:18:08', '2023-04-11 13:18:08'),
(47, 18, 1, 'Windows Hosting', 'Windows Hosting plans', 'assets/images/trendingdeal/5364_eukhost Windows Hosting.jpg', 'https://www.anrdoezrs.net/click-100751633-13326026', ' ', 1, '2023-04-11 19:18:38', '2023-04-11 13:18:38'),
(48, 19, 1, 'Web Hosting', 'Interserver Web hosting', 'assets/images/trendingdeal/55055_interserver web hosting.jpg', 'https://www.dpbolvw.net/click-100751633-11145908', ' ', 1, '2023-04-11 19:21:37', '2023-04-11 13:21:37'),
(49, 19, 1, 'VPS Hosting', 'VPS Hosting', 'assets/images/trendingdeal/12892_interserver VPS Hosting.jpg', 'https://www.dpbolvw.net/click-100751633-11146123', ' ', 1, '2023-04-11 19:22:36', '2023-04-11 13:22:36'),
(50, 19, 1, 'VPS Hosting Long', 'Interserver Cloud VPS Hosting', 'assets/images/trendingdeal/46154_interserver VPS Hosting.jpg', 'https://www.dpbolvw.net/click-100751633-11146125', ' ', 1, '2023-04-11 19:23:29', '2023-04-11 13:23:29'),
(51, 19, 1, 'InterServer VPS Services', 'InterServer VPS Services', 'assets/images/trendingdeal/38409_interserver vps services.jpg', 'https://www.anrdoezrs.net/click-100751633-11146127', ' ', 1, '2023-04-11 19:24:42', '2023-04-11 13:24:42'),
(52, 20, 1, 'iPage.com! 75% discount today with a FREE domain! $1.99/month only, Get Started Now!', 'iPage.com! 75% discount today with a FREE domain! $1.99/month only, Get Started Now!', 'assets/images/trendingdeal/67767_domain reg.jpg', 'https://www.anrdoezrs.net/click-100751633-10713131', ' ', 1, '2023-04-11 19:26:40', '2023-04-11 13:26:40'),
(53, 20, 1, 'iPage hosting $27/year a month  - Click Here for More Details!', 'iPage hosting $27/year a month  - Click Here for More Details!', 'assets/images/trendingdeal/45263_web hosting.jpg', 'https://www.jdoqocy.com/click-100751633-10713139', ' ', 1, '2023-04-11 19:28:05', '2023-04-11 13:28:05'),
(54, 20, 1, 'iPage WordPress Hosting - Click Here for More Details', 'iPage WordPress Hosting - Click Here for More Details', 'assets/images/trendingdeal/3977_WordPress Hosting.jpg', 'https://www.tkqlhce.com/click-100751633-13424495', ' ', 1, '2023-04-11 19:28:41', '2023-04-11 13:28:41'),
(55, 20, 1, '100% Eco Friendly Web Hosting Service -- iPage Web Hosting', '100% Eco Friendly Web Hosting Service -- iPage Web Hosting', 'assets/images/trendingdeal/72485_web hosting.jpg', 'https://www.jdoqocy.com/click-100751633-10713148', ' ', 1, '2023-04-11 19:29:11', '2023-04-11 13:29:11'),
(56, 20, 1, 'iPage -- Europe landing page (Ã¢â€šÂ¬2.99/month)', 'Europe webhosting package -- Special Offer Ã¢â€šÂ¬2.99/month (regular price Ã¢â€šÂ¬4.99/month)', 'assets/images/trendingdeal/26522_landing page.jpg', 'https://www.dpbolvw.net/click-100751633-11312053', ' ', 1, '2023-04-11 19:29:39', '2023-04-11 13:29:39'),
(57, 20, 1, 'Web Hosting by iPage - Affordable and E-Commerce Enabled', 'Web Hosting by iPage - Affordable and E-Commerce Enabled', 'assets/images/trendingdeal/83676_web hosting.jpg', 'https://www.kqzyfj.com/click-100751633-10713147', ' ', 1, '2023-04-11 19:30:38', '2023-04-11 13:30:38'),
(58, 20, 1, 'iPage - Small business web hosting you can rely on!', 'iPage - Small business web hosting you can rely on!', 'assets/images/trendingdeal/35988_web hosting.jpg', 'https://www.anrdoezrs.net/click-100751633-10713146', ' ', 1, '2023-04-11 19:31:16', '2023-04-11 13:31:16'),
(59, 20, 1, 'iPage Web Hosting -- Go Green for only $1.99/mo.', 'iPage Web Hosting -- Go Green for only $1.99/mo.', 'assets/images/trendingdeal/67300_web hosting.jpg', 'https://www.anrdoezrs.net/click-100751633-10713143', ' ', 1, '2023-04-11 19:31:42', '2023-04-11 13:31:42'),
(60, 20, 1, 'iPage Dedicated Hosting - Click Here for More Details', 'iPage Dedicated Hosting - Click Here for More Details', 'assets/images/trendingdeal/57002_dedicated hosting.jpg', 'https://www.dpbolvw.net/click-100751633-13424497', ' ', 1, '2023-04-11 19:32:15', '2023-04-11 13:32:15'),
(61, 20, 1, 'iPage Web Hosting for only $1.99/Month', 'iPage Web Hosting for only $1.99/Month', 'assets/images/trendingdeal/62360_web hosting.jpg', 'https://www.kqzyfj.com/click-100751633-10780766', ' ', 1, '2023-04-11 19:32:45', '2023-04-11 13:32:45'),
(62, 20, 1, 'Free 1-year Domain Registration', 'iPage - Great Hosting on sale for only $1.99/mo! Qualified plans include a 1-year registration for .com, .org, .net, .info, .biz, .us and .co.uk domains.', 'assets/images/trendingdeal/75612_domain reg.jpg', 'https://www.tkqlhce.com/click-100751633-10713135', ' ', 1, '2023-04-11 19:33:22', '2023-04-11 13:33:22'),
(63, 20, 1, 'iPage Plan on sale only $1.99 - Unlimited Disk Space, Unlimited Transfer, Unlimited E-mails & Site building tools.', 'iPage Plan on sale only $1.99 - Unlimited Disk Space, Unlimited Transfer, Unlimited E-mails & Site building tools.', 'assets/images/trendingdeal/64946_web hosting.jpg', 'https://www.tkqlhce.com/click-100751633-10713145', ' ', 1, '2023-04-11 19:34:08', '2023-04-11 13:34:08'),
(64, 20, 1, 'iPage Web Hosting only $1.99/mo!!', 'iPage Web Hosting plan only $1.99 per month.', 'assets/images/trendingdeal/34496_web hosting.jpg', 'https://www.anrdoezrs.net/click-100751633-10712810', ' ', 1, '2023-04-11 19:34:39', '2023-04-11 13:34:39'),
(65, 20, 1, 'iPage -- Canada landing page (CA$3.50/month)', 'Canada webhosting package -- Special Offer CA$3.50/month (regular price CA$7.99/month )', 'assets/images/trendingdeal/22813_landing page.jpg', 'https://www.tkqlhce.com/click-100751633-11312048', ' ', 1, '2023-04-11 19:35:07', '2023-04-11 13:35:07'),
(66, 20, 1, 'iPage VPS Hosting - Click Here for More Details!', 'iPage VPS Hosting - Click Here for More Details!', 'assets/images/trendingdeal/59474_vps hosting.jpg', 'https://www.tkqlhce.com/click-100751633-13424477', ' ', 1, '2023-04-11 19:35:33', '2023-04-11 13:35:33'),
(67, 20, 1, 'iPage -- UK landing page (Ã‚Â£1.99/month)', 'UK webhosting package -- Special Offer Ã‚Â£1.99/month (regular price Ã‚Â£4.99/month )', 'assets/images/trendingdeal/11063_landing page.jpg', 'https://www.jdoqocy.com/click-100751633-11312046', ' ', 1, '2023-04-11 19:36:00', '2023-04-11 13:36:00'),
(68, 20, 1, 'iPage -- Australia landing page (AU$2.95/month)', 'Australia webhosting package -- Special Offer AU$2.95month (regular price AU$7.99/month )', 'assets/images/trendingdeal/50705_landing page.jpg', 'https://www.dpbolvw.net/click-100751633-11312049', ' ', 1, '2023-04-11 19:36:23', '2023-04-11 13:36:23'),
(69, 20, 1, 'iPage Web Hosting. Free Domain Registration, Free Setup, Free Support -- All risk free!', 'iPage Free Domain Registration, Free Setup, Free Support -- All risk free!', 'assets/images/trendingdeal/19597_domain reg.jpg', 'https://www.dpbolvw.net/click-100751633-10713140', ' ', 1, '2023-04-11 19:36:51', '2023-04-11 13:36:51'),
(70, 21, 1, 'Work from home via secured connection with free trial of Namecheap VPN!', 'Work from home via secured connection with free trial of Namecheap VPN!', 'assets/images/trendingdeal/11423_VPN services.jpg', 'https://www.tkqlhce.com/click-100751633-14009680', ' ', 1, '2023-04-11 19:38:53', '2023-04-11 13:38:53'),
(71, 21, 1, 'Register Your Domains Hassle-Free', 'Register Your Domains Hassle-Free with Namecheap', 'assets/images/trendingdeal/43705_Domain services.jpg', 'https://www.anrdoezrs.net/click-100751633-12892698', ' ', 1, '2023-04-11 19:39:30', '2023-04-11 13:39:30'),
(72, 21, 1, 'Looking for Whois protection for your domain?', 'Looking for Whois protection for your domain? Get your WhoisGuard for FREE with any domain registration or transfer at Namecheap', 'assets/images/trendingdeal/73672_Whois.jpg', 'https://www.jdoqocy.com/click-100751633-11429061', ' ', 1, '2023-04-11 19:40:02', '2023-04-11 13:40:02'),
(73, 21, 1, 'Protect your Business with an SSL certificate', 'Protect your Business with an SSL certificate. Order now for only $8.88/year at Namecheap!', 'assets/images/trendingdeal/88809_SSL Certificates.jpg', 'https://www.tkqlhce.com/click-100751633-11429088', ' ', 1, '2023-04-11 19:40:32', '2023-04-11 13:40:32'),
(74, 21, 1, 'Is your Whois information protected?', 'Get Whois protection for FREE with any Namecheap domain registration or transfer', 'assets/images/trendingdeal/11569_Whois.jpg', 'https://www.jdoqocy.com/click-100751633-11429065', ' ', 1, '2023-04-11 19:41:06', '2023-04-11 13:41:06'),
(75, 21, 1, 'Get a FREE domain when you buy Shared hosting!', 'Get a FREE domain when you buy Shared hosting!', 'assets/images/trendingdeal/44833_Domain & Shared Hosting.jpg', 'https://www.jdoqocy.com/click-100751633-13925793', ' ', 1, '2023-04-11 19:41:34', '2023-04-11 13:41:34'),
(76, 21, 1, 'Register Your Domains Hassle-Free', 'Register Your Domains Hassle-Free with Namecheap', 'assets/images/trendingdeal/54137_Domain services.jpg', 'https://www.kqzyfj.com/click-100751633-11429042', ' ', 1, '2023-04-11 19:42:03', '2023-04-11 13:42:03'),
(77, 21, 1, 'Get 50% Discount on Green Bar Single-domain EV SSL', 'Get 50% Discount on Green Bar Single-domain EV SSL', 'assets/images/trendingdeal/4503_SSL Certificates.jpg', 'https://www.kqzyfj.com/click-100751633-13246377', ' ', 1, '2023-04-11 19:42:30', '2023-04-11 13:42:30'),
(78, 21, 1, 'Namecheap knows how important a domain name is to your business', 'Namecheap knows how important a domain name is to your business', 'assets/images/trendingdeal/95640_Domain services.jpg', 'https://www.tkqlhce.com/click-100751633-11429057', ' ', 1, '2023-04-11 19:43:02', '2023-04-11 13:43:02'),
(79, 21, 1, 'Get Domain & Hosting at one place with Namecheap!', 'Get Domain & Hosting at one place with Namecheap!', 'assets/images/trendingdeal/74426_Domain & Hosting.jpg', 'https://www.tkqlhce.com/click-100751633-13925791', ' ', 1, '2023-04-11 19:43:35', '2023-04-11 13:43:35'),
(80, 21, 1, 'Get your own address on the web with Namecheap', 'Get your own address on the web with Namecheap', 'assets/images/trendingdeal/11013_Domain services.jpg', 'https://www.kqzyfj.com/click-100751633-11429055', ' ', 1, '2023-04-11 19:44:13', '2023-04-11 13:44:13'),
(81, 21, 1, 'Get your business up and running with these amazing deals!', '\"Get your business up and running with these amazing deals! \"', 'assets/images/trendingdeal/58895_Domain services.jpg', 'https://www.tkqlhce.com/click-100751633-13830889', ' ', 1, '2023-04-11 19:44:45', '2023-04-11 13:44:45'),
(82, 21, 1, 'Namecheap - Homepage', 'Namecheap - Homepage', 'assets/images/trendingdeal/95194_Domain services.jpg', 'https://www.tkqlhce.com/click-100751633-11426545', ' ', 1, '2023-04-11 19:45:12', '2023-04-11 13:45:12'),
(83, 21, 1, 'Hassle-free way to register your domain', 'Hassle-free way to register your domain', 'assets/images/trendingdeal/73694_Domain services.jpg', 'https://www.kqzyfj.com/click-100751633-11429045', ' ', 1, '2023-04-11 19:45:41', '2023-04-11 13:45:41'),
(84, 21, 1, 'Get EV Multi-domain SSL 36% Off', 'Get EV Multi-domain SSL 36% Off', 'assets/images/trendingdeal/99298_SSL Certificates.jpg', 'https://www.dpbolvw.net/click-100751633-13246392', ' ', 1, '2023-04-11 19:46:08', '2023-04-11 13:46:08'),
(85, 21, 1, 'Get .SO, the next big domain in technology at Namecheap!', 'Get .SO, the next big domain in technology at Namecheap!', 'assets/images/trendingdeal/53324_Domain services.jpg', 'https://www.dpbolvw.net/click-100751633-14098457', ' ', 1, '2023-04-11 19:46:36', '2023-04-11 13:46:36'),
(86, 21, 1, 'Save big on your kid\'s first domain name!', 'Save big on your kid\'s first domain name!', 'assets/images/trendingdeal/60448_Domain services.jpg', 'https://www.kqzyfj.com/click-100751633-13830890', ' ', 1, '2023-04-11 19:47:03', '2023-04-11 13:47:03'),
(87, 21, 1, 'Start your domain search', 'Start your domain search here', 'assets/images/trendingdeal/17195_Domain services.jpg', 'https://www.anrdoezrs.net/click-100751633-11674394', ' ', 1, '2023-04-11 19:47:30', '2023-04-11 13:47:30'),
(88, 21, 1, 'Popular Domains for just 99 Cents at Namecheap!', 'Popular Domains for just 99 Cents at Namecheap!', 'assets/images/trendingdeal/35286_Domain services.jpg', 'https://www.dpbolvw.net/click-100751633-14326266', ' ', 1, '2023-04-11 19:47:55', '2023-04-11 13:47:55'),
(89, 21, 1, 'Affordable prices and stellar support', 'Affordable prices and stellar support', 'assets/images/trendingdeal/81794_Domain services.jpg', 'https://www.anrdoezrs.net/click-100751633-11429059', ' ', 1, '2023-04-11 19:48:25', '2023-04-11 13:48:25'),
(90, 21, 1, 'Get creative with Beast mode: the fastest domain name generator!', 'Get creative with Beast mode: the fastest domain name generator!', 'assets/images/trendingdeal/32262_Domain services.jpg', 'https://www.jdoqocy.com/click-100751633-13830887', ' ', 1, '2023-04-11 19:48:54', '2023-04-11 13:48:54'),
(91, 21, 1, 'Great Savings on EV SSL Certificate', 'Great Savings on EV SSL Certificate', 'assets/images/trendingdeal/69391_SSL Certificates.jpg', 'https://www.jdoqocy.com/click-100751633-13246370', ' ', 1, '2023-04-11 19:49:19', '2023-04-11 13:49:19'),
(92, 21, 1, 'Add credibility to your online business!', 'Add credibility to your online business! Get an SSL certificate from only $9/year at Namecheap', 'assets/images/trendingdeal/76854_SSL Certificates.jpg', 'https://www.tkqlhce.com/click-100751633-11429090', ' ', 1, '2023-04-11 19:49:49', '2023-04-11 13:49:49'),
(93, 21, 1, '90% off! .xyz domain at only $1!', '90% off! .xyz domain at only $1!', 'assets/images/trendingdeal/63996_Domain services.jpg', 'https://www.dpbolvw.net/click-100751633-13749014', ' ', 1, '2023-04-11 19:50:15', '2023-04-11 13:50:15'),
(94, 21, 1, '36% OFF Comodo EV Multi-Domain SSL', '36% OFF Comodo EV Multi-Domain SSL. Now just $142.99!', 'assets/images/trendingdeal/48517_SSL Certificates.jpg', 'https://www.kqzyfj.com/click-100751633-12815780', ' ', 1, '2023-04-11 19:50:41', '2023-04-11 13:50:41'),
(95, 21, 1, 'Is your Whois information protected?', 'Get Whois protection for FREE with any Namecheap domain registration or transfer', 'assets/images/trendingdeal/89127_Whois.jpg', 'https://www.jdoqocy.com/click-100751633-11674398', ' ', 1, '2023-04-11 19:51:06', '2023-04-11 13:51:06'),
(96, 21, 1, 'Namecheap VPS Hosting', 'Namecheap VPS Hosting: get the power of a virtual private server from only $11.88/mo', 'assets/images/trendingdeal/14971_Vps hosting.jpg', 'https://www.jdoqocy.com/click-100751633-11429085', ' ', 1, '2023-04-11 19:51:31', '2023-04-11 13:51:31'),
(97, 21, 1, 'Take pride and register a .GAY domain today!', 'Take pride and register a .GAY domain today!', 'assets/images/trendingdeal/42961_Domain services.jpg', 'https://www.jdoqocy.com/click-100751633-14327563', ' ', 1, '2023-04-11 19:51:53', '2023-04-11 13:51:53'),
(98, 21, 1, 'Namecheap New Business Hub - best offers for digital entrepreneurs', 'Namecheap New Business Hub - best offers for digital entrepreneurs', 'assets/images/trendingdeal/59287_Domain services.jpg', 'https://www.kqzyfj.com/click-100751633-13830888', ' ', 1, '2023-04-11 19:52:22', '2023-04-11 13:52:22'),
(99, 21, 1, 'Start your domain search', 'Start your domain search here', 'assets/images/trendingdeal/79271_Domain services.jpg', 'https://www.dpbolvw.net/click-100751633-11429051', ' ', 1, '2023-04-11 19:52:53', '2023-04-11 13:52:53'),
(100, 21, 1, 'Namecheap\'s Best Deals', 'Check out Namecheap\'s best Promotions!', 'assets/images/trendingdeal/55342_Domain services.jpg', 'https://www.tkqlhce.com/click-100751633-13300121', ' ', 1, '2023-04-11 19:53:20', '2023-04-11 13:53:20'),
(101, 21, 1, 'EV Multi-domain SSL Green Bar Security 36% Off', 'EV Multi-domain SSL Green Bar Security 36% Off', 'assets/images/trendingdeal/38556_SSL Certificates.jpg', 'https://www.jdoqocy.com/click-100751633-13246395', ' ', 1, '2023-04-11 19:53:47', '2023-04-11 13:53:47'),
(102, 21, 1, 'Looking for a cheap domain name?', 'Looking for a cheap domain name?', 'assets/images/trendingdeal/10314_Domain services.jpg', 'https://www.anrdoezrs.net/click-100751633-11429053', ' ', 1, '2023-04-11 19:54:06', '2023-04-11 13:54:06'),
(103, 21, 1, 'Namecheap Bundle Deals: FREE domains & 50% off shared hosting!', 'Namecheap Bundle Deals: FREE domains & 50% off shared hosting! ', 'assets/images/trendingdeal/2904_Shared hosting.jpg', 'https://www.anrdoezrs.net/click-100751633-13925795', ' ', 1, '2023-04-11 19:54:40', '2023-04-11 13:54:40'),
(104, 21, 1, 'Get a private email address from Namecheap. Free 2 month trial available', 'Get a private email address from Namecheap. Free 2 month trial available', 'assets/images/trendingdeal/4355_email.jpg', 'https://www.tkqlhce.com/click-100751633-11429093', ' ', 1, '2023-04-11 19:55:06', '2023-04-11 13:55:06'),
(105, 21, 1, 'Ready to start your online business?', 'Ready to start your online business? Try Namecheap web hosting for less than the cost of a domain', 'assets/images/trendingdeal/13812_Domain services.jpg', 'https://www.dpbolvw.net/click-100751633-11429079', ' ', 1, '2023-04-11 19:55:32', '2023-04-11 13:55:32'),
(106, 21, 1, 'Protect your Business with an SSL certificate', 'Protect your Business with an SSL certificate. Order now for only $8.88/year at Namecheap!', 'assets/images/trendingdeal/18306_SSL Certificates.jpg', 'https://www.dpbolvw.net/click-100751633-11674399', ' ', 1, '2023-04-11 19:55:54', '2023-04-11 13:55:54'),
(107, 21, 1, 'VPS hosting: up to 30% off!', 'VPS hosting: up to 30% off!', 'assets/images/trendingdeal/16716_Vps hosting.jpg', 'https://www.anrdoezrs.net/click-100751633-13748989', ' ', 1, '2023-04-11 19:56:24', '2023-04-11 13:56:24'),
(108, 22, 1, 'Value-priced Web Hosting on a rock-solid platform', 'Value-priced Web Hosting on a rock-solid platform', 'assets/images/trendingdeal/94741_web hosting.jpg', 'https://www.kqzyfj.com/click-100751633-10398445', ' ', 1, '2023-04-12 18:18:17', '2023-04-12 12:18:17'),
(109, 22, 1, 'Netfirms.ca Canada Text Link', 'Text link for Netfirms.ca', 'assets/images/trendingdeal/84017_canada domain.jpg', 'https://www.tkqlhce.com/click-100751633-10407205', ' ', 1, '2023-04-12 18:18:47', '2023-04-12 12:18:47'),
(110, 22, 1, 'Netfirms Web Hosting for Small Business', 'Netfirms Web Hosting for Small Business', 'assets/images/trendingdeal/7270_web hosting.jpg', 'https://www.tkqlhce.com/click-100751633-10299008', ' ', 1, '2023-04-12 18:19:17', '2023-04-12 12:19:17'),
(111, 22, 1, 'Discover why Netfirms hosts over 1,000,000 Websites.', 'Discover why Netfirms hosts over 1,000,000 Websites.', 'assets/images/trendingdeal/17830_web hosting.jpg', 'https://www.dpbolvw.net/click-100751633-10299015', ' ', 1, '2023-04-12 18:19:45', '2023-04-12 12:19:45'),
(112, 22, 1, 'Join 1,000,000 customers ...', 'Join 1,000,000 customers with plans as low as $4.95/mo, 24/7 LIVE customer service and fast, dependable servers.', 'assets/images/trendingdeal/37396_web hosting.jpg', 'https://www.jdoqocy.com/click-100751633-10299014', ' ', 1, '2023-04-12 18:20:08', '2023-04-12 12:20:08'),
(113, 22, 1, 'Netfirm Small Business Web Hosting - Over 33% off', 'Netfirms\' best selling web hosting plan now discounted by over 33%. Netfirms Business Web Hosting plan offers small business all the tool they need to succeed online.', 'assets/images/trendingdeal/56685_web hosting.jpg', 'https://www.anrdoezrs.net/click-100751633-10721218', ' ', 1, '2023-04-12 18:20:32', '2023-04-12 12:20:32'),
(114, 22, 1, 'Netfirms: Trusted Web Hosting for as low as $4.95/mo', 'Netfirms: Trusted Web Hosting for as low as $4.95/mo', 'assets/images/trendingdeal/16360_web hosting.jpg', 'https://www.dpbolvw.net/click-100751633-9494762', ' ', 1, '2023-04-12 18:20:57', '2023-04-12 12:20:57'),
(115, 22, 1, 'Netfirms Web Hosting', 'Netfirms Web Hosting', 'assets/images/trendingdeal/38263_web hosting.jpg', 'https://www.anrdoezrs.net/click-100751633-10299016', ' ', 1, '2023-04-12 18:21:20', '2023-04-12 12:21:20'),
(116, 22, 1, 'Limited Time Offer - 20% Off Plus Hosting Plan, now only $3.56/month', 'Limited Time Offer. Netfirms\' best selling web hosting plan now discounted by 20%. Netfirms Plus Web Hosting plan offers small business all the tool they need to succeed online.', 'assets/images/trendingdeal/37250_web hosting.jpg', 'https://www.jdoqocy.com/click-100751633-10721216', ' ', 1, '2023-04-12 18:21:43', '2023-04-12 12:21:43'),
(117, 22, 1, 'Netfirms Web Hosting: Trusted by over 1,000,000 people and growing', 'Netfirms Web Hosting: Trusted by over 1,000,000 people and growing', 'assets/images/trendingdeal/77740_web hosting.jpg', 'https://www.anrdoezrs.net/click-100751633-1532721', ' ', 1, '2023-04-12 18:22:09', '2023-04-12 12:22:09'),
(118, 23, 1, 'Bare Metal Cloud', 'Bare Metal Cloud', 'assets/images/trendingdeal/7043_bare metal cloud.jpg', 'https://www.tkqlhce.com/click-100751633-15406199', ' ', 1, '2023-04-12 18:23:25', '2023-04-12 12:23:25'),
(119, 23, 1, 'Enterprise', 'Enterprise', 'assets/images/trendingdeal/83581_enterprices.jpg', 'https://www.anrdoezrs.net/click-100751633-15406202', ' ', 1, '2023-04-12 18:23:54', '2023-04-12 12:23:54'),
(120, 23, 1, 'Products developed to meet your IT infrastructure application needs and industry requirements', '\"Products developed to meet your IT infrastructure application needs and industry requirements  \"', 'assets/images/trendingdeal/61197_cloud.jpg', 'https://www.tkqlhce.com/click-100751633-15406208', ' ', 1, '2023-04-12 18:25:09', '2023-04-12 12:25:09'),
(121, 23, 1, 'Public Cloud', 'Public CLoud', 'assets/images/trendingdeal/58468_cloud.jpg', 'https://www.tkqlhce.com/click-100751633-15406200', ' ', 1, '2023-04-12 18:25:34', '2023-04-12 12:25:34'),
(122, 23, 1, 'OVHcloud', 'OVHcloud', 'assets/images/trendingdeal/77154_cloud.jpg', 'https://www.dpbolvw.net/click-100751633-15406197', ' ', 1, '2023-04-12 18:26:23', '2023-04-12 12:26:23'),
(123, 23, 1, 'Great deals on VPS, Public Cloud, Bare Metal, Eco, and Hosted Private Cloud Servers', 'Great deals on VPS, Public Cloud, Bare Metal, Eco, and Hosted Private Cloud Servers', 'assets/images/trendingdeal/85294_cloud.jpg', 'https://www.jdoqocy.com/click-100751633-15406206', ' ', 1, '2023-04-12 18:26:52', '2023-04-12 12:26:52'),
(124, 23, 1, 'Hosted Private Cloud', 'Hosted Private Cloud', 'assets/images/trendingdeal/99906_cloud.jpg', 'https://www.dpbolvw.net/click-100751633-15406201', ' ', 1, '2023-04-12 18:27:17', '2023-04-12 12:27:17'),
(125, 24, 1, 'Tsohost VPS Hosting', 'Tsohost VPS hosting', 'assets/images/trendingdeal/15068_vps.jpg', 'https://www.anrdoezrs.net/click-100751633-13231819', ' ', 1, '2023-04-12 18:28:54', '2023-04-12 12:28:54'),
(126, 24, 1, 'Tsohost Cloud Web Hosting', 'Tsohost Cloud Web Hosting', 'assets/images/trendingdeal/61451_cloud.jpg', 'https://www.tkqlhce.com/click-100751633-13231826', ' ', 1, '2023-04-12 18:30:49', '2023-04-12 12:30:49'),
(127, 24, 1, 'Tsohost Dedicated Servers', 'Tsohost Dedicated Servers', 'assets/images/trendingdeal/45863_dedicated server.jpg', 'https://www.jdoqocy.com/click-100751633-13231821', ' ', 1, '2023-04-12 18:31:14', '2023-04-12 12:31:14'),
(128, 24, 1, 'Tsohost WordPress Hosting', 'Tsohost WordPress Hosting', 'assets/images/trendingdeal/84919_wordpress.jpg', 'https://www.kqzyfj.com/click-100751633-13231818', ' ', 1, '2023-04-12 18:31:57', '2023-04-12 12:31:57'),
(129, 24, 1, 'Tsohost Homepage', 'Tsohost Homepage', 'assets/images/trendingdeal/94258_cloud.jpg', 'https://www.kqzyfj.com/click-100751633-13231814', ' ', 1, '2023-04-12 18:32:26', '2023-04-12 12:32:26'),
(130, 25, 1, 'TurnKey Internet', 'TurnKey Internet - Links to homepage', 'assets/images/trendingdeal/73896_Dedicated.jpg', 'https://www.tkqlhce.com/click-100751633-12742286', ' ', 1, '2023-04-12 18:35:18', '2023-04-12 12:35:18'),
(131, 25, 1, 'turnkeyinternet.net', 'turnkeyinternet.net - Links to homepage', 'assets/images/trendingdeal/56485_net.jpg', 'https://www.dpbolvw.net/click-100751633-12742289', ' ', 1, '2023-04-12 18:36:07', '2023-04-12 12:36:07'),
(132, 25, 1, 'www.TurnKeyInternet.net', 'www.TurnKeyInternet.net - Links to homepage', 'assets/images/trendingdeal/20118_net.jpg', 'https://www.dpbolvw.net/click-100751633-12742288', ' ', 1, '2023-04-12 18:36:29', '2023-04-12 12:36:29'),
(133, 25, 1, 'TurnKey Internet - Best Value Deals', 'TurnKey Internet - Best Value Deals', 'assets/images/trendingdeal/77360_Dedicated.jpg', 'https://www.jdoqocy.com/click-100751633-12742295', ' ', 1, '2023-04-12 18:36:52', '2023-04-12 12:36:52'),
(134, 25, 1, 'Black Friday Deals', 'Black Friday Deals', 'assets/images/trendingdeal/16139_Dedicated.jpg', 'https://www.kqzyfj.com/click-100751633-15099868', ' ', 1, '2023-04-12 18:37:17', '2023-04-12 12:37:17'),
(135, 25, 1, 'Dedicated Servers', 'Dedicated Servers - Links to Dedicated Servers page', 'assets/images/trendingdeal/37019_Dedicated.jpg', 'https://www.jdoqocy.com/click-100751633-12742299', ' ', 1, '2023-04-12 18:37:40', '2023-04-12 12:37:40'),
(136, 26, 1, 'Award Winning Web Hosting', 'The Award Winning Web Hosting', 'assets/images/trendingdeal/96637_Web Hosting.jpg', 'https://www.dpbolvw.net/click-100751633-10517875', ' ', 1, '2023-04-12 18:40:03', '2023-04-12 12:40:03'),
(137, 26, 1, 'Triple Rewards', 'For a limited time, get 3x on all resources on our best selling power plan.', 'assets/images/trendingdeal/22391_Web Hosting.jpg', 'https://www.tkqlhce.com/click-100751633-10520999', ' ', 1, '2023-04-12 18:40:31', '2023-04-12 12:40:31'),
(138, 26, 1, 'Webhostingpad', 'Webhostingpad', 'assets/images/trendingdeal/11723_Web Hosting.jpg', 'https://www.anrdoezrs.net/click-100751633-10555752', ' ', 1, '2023-04-12 18:41:19', '2023-04-12 12:41:19'),
(139, 26, 1, 'Create a website your way', 'Create a website your way', 'assets/images/trendingdeal/20583_Web Hosting.jpg', 'https://www.jdoqocy.com/click-100751633-10517871', ' ', 1, '2023-04-12 18:42:40', '2023-04-12 12:42:40'),
(140, 26, 1, 'Power Plan', 'Power Plan includes everything you need at 1,000GB of disk space, 10,000GB of bandwidth and with unlimited features.', 'assets/images/trendingdeal/13466_Web Hosting.jpg', 'https://www.dpbolvw.net/click-100751633-10521005', ' ', 1, '2023-04-12 18:43:05', '2023-04-12 12:43:05'),
(141, 26, 1, '15% off all webhosting use code 15off', 'October Promo 15% off', 'assets/images/trendingdeal/70210_Web Hosting.jpg', 'https://www.anrdoezrs.net/click-100751633-10593677', ' ', 1, '2023-04-12 18:43:28', '2023-04-12 12:43:28');

-- --------------------------------------------------------

--
-- Table structure for table `offer_interaction`
--

CREATE TABLE `offer_interaction` (
  `id` int(11) NOT NULL,
  `store_offer_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `inserted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `inserted_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `s_domain` varchar(250) NOT NULL,
  `s_name` varchar(150) NOT NULL,
  `meta_title` varchar(500) NOT NULL,
  `meta_description` varchar(1000) NOT NULL,
  `meta_keyword` varchar(1000) NOT NULL,
  `image` varchar(500) NOT NULL,
  `about` varchar(5000) NOT NULL,
  `annual` varchar(5000) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `inserted_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `category_id`, `s_domain`, `s_name`, `meta_title`, `meta_description`, `meta_keyword`, `image`, `about`, `annual`, `status`, `inserted_at`, `updated_at`) VALUES
(18, 1, 'https://www.eukhost.com/', 'eUKhost', 'eUKhost - Web Hosting Services', 'eUKHost is a web hosting provider that caters to a wide range of customers, from small businesses to large enterprises. With years of experience in the industry, eUKHost has established a reputation for providing reliable and secure hosting solutions.', 'eUKhost', 'assets/images/store/75979_eukhost.jpg', 'eUKHost is a leading web hosting provider that offers reliable, secure, and affordable hosting solutions for businesses of all sizes. With years of experience and a team of highly qualified professionals, eUKHost ensures that your website is always up and running, providing your customers with a seamless online experience.\r\n\r\nWhether you are looking for shared hosting, VPS hosting, dedicated hosting, or reseller hosting, eUKHost has a range of options to suit your needs. Their state-of-the-art data centers are equipped with the latest technology and infrastructure to ensure maximum uptime, fast loading times, and top-notch security.\r\n\r\nAt eUKHost, they understand that every business has different requirements and budgets, which is why they offer customizable hosting plans that can be tailored to your specific needs. Their friendly and knowledgeable customer support team is available 24/7 to assist you with any queries or issues that may arise.\r\nIf you are looking for a reliable and trustworthy web hosting provider, eUKHost is the perfect choice.', ' ', 1, '2023-03-11 16:57:29', '2023-03-11 10:57:29'),
(19, 1, 'https://www.interserver.net/', 'Interserver', 'Interserver Webhosting and VPS', 'Interserver provides reliable, secure web hosting and VPS services for businesses of any size. With our 24/7/365 technical support, you can be sure that your website is always up and running. Get started today and enjoy the benefits of our reliable hosting solutions.', 'Interserver Webhosting and VPS', 'assets/images/store/96053_interserver.jpg', 'Interserver is a web hosting company that was founded in 1999. The company is headquartered in Secaucus, New Jersey, and provides a wide range of web hosting services to businesses and individuals.\r\n\r\nInterserver\'s hosting services include shared hosting, VPS hosting, cloud hosting, dedicated hosting, and reseller hosting. They also offer additional services such as domain registration, website design, and website migration.\r\n\r\nOne of the unique features of Interserver is their price lock guarantee, which means that the price you sign up for will never increase as long as you remain a customer. They also offer a 30-day money-back guarantee if you\'re not satisfied with their services.\r\n\r\nIn terms of customer support, Interserver provides 24/7/365 support via phone, live chat, and email. They also have a knowledge base and community forum to help customers troubleshoot issues and learn more about web hosting.\r\n\r\nOverall, Interserver is a reliable web hosting provider with a long-standing reputation in the industry. Their competitive pricing, diverse hosting options, and commitment to customer support make them a popular choice for businesses and individuals alike.', ' ', 1, '2023-03-11 17:32:30', '2023-03-11 11:32:30'),
(20, 1, 'https://www.ipage.com/', 'iPage', 'iPage Domain and Web Hosting Services', 'iPage is a web hosting company that offers affordable and easy-to-use hosting solutions for businesses and individuals. With a focus on simplicity and user-friendliness, iPage provides a range of hosting options, including shared hosting, VPS hosting, and dedicated hosting, as well as additional services like domain registration and website design. Their 24/7 customer support, robust security features, and user-friendly control panel make them a popular choice for those new to web hosting.', 'iPage Domain and Web Hosting Services', 'assets/images/store/54372_iPage.jpg', 'iPage is a web hosting company that provides a range of hosting solutions for businesses and individuals. Founded in 1998, iPage is headquartered in Burlington, Massachusetts, and serves customers worldwide.\r\n\r\nTheir hosting services include shared hosting, VPS hosting, and dedicated hosting, as well as additional services such as domain registration, website design, and marketing tools. They offer affordable pricing and a user-friendly control panel for easy website management.\r\n\r\niPage also provides 24/7 customer support via phone, chat, and email, as well as a knowledge base and community forum for self-help and troubleshooting. They have a strong focus on security and provide website scanning and malware removal to protect their customers\' websites.\r\n\r\nOverall, iPage is a reliable and affordable web hosting provider with a strong focus on user-friendliness and customer support. They are a good choice for small businesses and individuals looking to create and manage a website.', ' ', 1, '2023-03-11 17:38:56', '2023-03-11 11:38:56'),
(21, 1, 'https://www.namecheap.com/', 'Namecheap', 'Namecheap Web Hosting', 'Namecheap is a web hosting company that offers affordable and reliable hosting solutions for businesses and individuals. With a range of hosting options, including shared hosting, VPS hosting, and dedicated hosting, as well as domain registration and website design services, Namecheap provides a one-stop-shop for all your web hosting needs. Their 24/7 customer support and commitment to security make them a popular choice among website owners.', 'Namecheap Web Hosting', 'assets/images/store/57373_Namecheap.jpg', 'Namecheap is a web hosting company that provides a range of hosting solutions for businesses and individuals. Founded in 2000, Namecheap is headquartered in Phoenix, Arizona, and serves customers worldwide.\r\n\r\nTheir hosting services include shared hosting, WordPress hosting, VPS hosting, and dedicated hosting, as well as domain registration, website design, and email hosting. Namecheap also provides free website migration and a user-friendly control panel for easy website management.\r\n\r\nNamecheap is committed to security and provides free SSL certificates, domain privacy protection, and two-factor authentication. They also offer a 30-day money-back guarantee and 24/7 customer support via live chat and email.\r\n\r\nOverall, Namecheap is a reliable and affordable web hosting provider with a strong commitment to security and customer support. They are a good choice for small businesses and individuals looking for a comprehensive web hosting solution.', ' ', 1, '2023-03-11 17:58:48', '2023-03-11 11:58:48'),
(22, 1, 'https://www.netfirms.com/', 'Netfirms', 'Netfirms Domain Hosting', 'Netfirms is a web hosting company that provides shared hosting, VPS hosting, and domain registration services to individuals and small businesses. With reliable and affordable hosting plans, as well as website building tools and online marketing services, Netfirms helps businesses establish a strong online presence. Based in Toronto, Canada, Netfirms has a reputation for exceptional customer support and satisfaction.', 'Netfirms Domain Hosting', 'assets/images/store/35876_Netfirms.jpg', 'Netfirms is a web hosting company that provides shared hosting, VPS hosting, and domain registration services to individuals and small businesses. The company was founded in 1998 and is based in Toronto, Canada.\r\n\r\nNetfirms offers a range of hosting plans to meet the needs of different customers. Their shared hosting plans are designed for individuals and small businesses looking to host a single website, while their VPS hosting plans offer more resources and flexibility for businesses that require more control over their hosting environment.\r\n\r\nIn addition to hosting services, Netfirms also provides domain registration, website building tools, and online marketing services to help businesses establish a strong online presence. The company has a reputation for providing reliable and affordable hosting services, with a focus on customer support and satisfaction.', ' ', 1, '2023-03-25 16:35:36', '2023-03-25 10:35:36'),
(23, 1, 'https://www.ovhcloud.com/', 'OVHcloud', 'OVHcloud', 'OVHcloud is a global cloud infrastructure provider that offers a wide range of services, including dedicated servers, cloud hosting, VPS hosting, and domain registration. With a commitment to open-source technology and data security, OVHcloud provides scalable and customizable solutions to businesses of all sizes. The company operates data centers across Europe, North America, and Asia-Pacific, with a focus on flexibility, performance, and reliability. With a wide range of services and a global presence, OVHcloud is a popular choice for businesses looking for secure and reliable cloud infrastructure solutions.', 'OVHcloud', 'assets/images/store/64541_ovhcloud.jpg', 'OVHcloud is a global cloud infrastructure provider that offers a wide range of services, including dedicated servers, cloud hosting, VPS hosting, and domain registration. The company was founded in 1999 by Octave Klaba and is based in Roubaix, France.\r\n\r\nOVHcloud has a presence in over 20 countries and operates data centers across Europe, North America, and Asia-Pacific. The company\'s services are designed to be scalable and customizable, with a focus on flexibility and performance.\r\n\r\nOVHcloud\'s dedicated servers offer high-performance computing resources and can be customized to meet specific business needs. Their cloud hosting and VPS hosting services provide on-demand computing resources with flexible billing options. Additionally, OVHcloud offers domain registration services with a wide range of domain extensions available.\r\n\r\nWith a commitment to open-source technology and data security, OVHcloud is a popular choice for businesses of all sizes looking for reliable and secure cloud infrastructure solutions.', ' ', 1, '2023-03-25 16:38:56', '2023-03-25 10:38:56'),
(24, 1, 'https://www.tsohost.com/', 'TsoHost', 'TsoHost', 'TsoHost is a UK-based web hosting company that provides a range of hosting services, including shared hosting, VPS hosting, and dedicated server hosting, as well as domain registration, website builder tools, and e-commerce solutions. With a reputation for exceptional customer support and a focus on security and performance, TsoHost offers reliable and affordable hosting services designed to meet the needs of individuals and businesses of all sizes. Based in Slough, England, TsoHost is committed to using the latest technology to ensure that their customers\' websites are always up and running, with a 99.9% uptime guarantee.', 'TsoHost Domain', 'assets/images/store/2378_tsohost.jpg', 'TsoHost is a UK-based web hosting company that provides a range of hosting services, including shared hosting, VPS hosting, and dedicated server hosting. The company was founded in 2003 and is headquartered in Slough, England.\r\n\r\nTsoHost offers a range of hosting plans designed to meet the needs of different customers. Their shared hosting plans are ideal for individuals and small businesses, while their VPS and dedicated server hosting plans are designed for businesses that require more resources and flexibility.\r\n\r\nIn addition to hosting services, TsoHost also offers domain registration, website builder tools, and e-commerce solutions to help businesses establish an online presence. The company has a reputation for exceptional customer support and has won several awards for their services.\r\n\r\nTsoHost is committed to providing reliable and affordable hosting services, with a focus on security and performance. They use the latest technology and offer a 99.9% uptime guarantee, ensuring that their customers\' websites are always up and running.', ' ', 1, '2023-03-25 16:43:42', '2023-03-25 10:43:42'),
(25, 1, 'https://www.turnkeyinternet.net/', 'TurnKey Internet', 'TurnKey Internet', 'TurnKey Internet is a New York-based web hosting company that provides a range of hosting solutions, including dedicated servers, VPS hosting, cloud hosting, and colocation services, as well as domain registration, website builder tools, and online marketing services. With a focus on reliability, performance, and security, TurnKey Internet offers scalable hosting solutions to businesses of all sizes. The company is committed to using renewable energy sources and has state-of-the-art data centers in New York and California, providing fast and reliable connectivity across the US and beyond. TurnKey Internet\'s eco-friendly initiatives have earned them several awards, making them a popular choice for businesses looking for sustainable and high-performance hosting solutions.', 'TurnKey Internet', 'assets/images/store/48896_turnkey.jpg', 'TurnKey Internet is a New York-based web hosting company that provides a range of hosting solutions, including dedicated servers, VPS hosting, cloud hosting, and colocation services. The company was founded in 1999 and has since expanded to become a leading provider of hosting services in the US.\r\n\r\nTurnKey Internet\'s hosting services are designed to meet the needs of businesses of all sizes, from startups to large enterprises. Their dedicated servers offer high-performance computing resources and can be customized to meet specific business needs. Their VPS hosting and cloud hosting services provide on-demand computing resources with flexible billing options.\r\n\r\nIn addition to hosting services, TurnKey Internet also offers domain registration, website builder tools, and online marketing services to help businesses establish a strong online presence. The company is committed to using renewable energy sources and has received several awards for their eco-friendly initiatives.\r\n\r\nWith a focus on reliability, performance, and security, TurnKey Internet provides businesses with the infrastructure they need to succeed in today\'s digital world. Their state-of-the-art data centers are located in New York and California, providing businesses with fast and reliable connectivity across the US and beyond.', ' ', 1, '2023-03-25 16:47:26', '2023-03-25 10:47:26'),
(26, 1, 'https://www.webhostingpad.com/', 'WebHostingPad', 'WebHostingPad', 'WebHostingPad is a web hosting company based in Rolling Meadows, Illinois, that provides affordable and reliable hosting solutions to individuals and small businesses. With a range of hosting plans, including shared hosting, VPS hosting, and WordPress hosting, as well as domain registration services, WebHostingPad is committed to providing easy-to-use hosting solutions with unlimited disk space and bandwidth. The company also offers website builder tools, email hosting, and e-commerce solutions, with 24/7 technical support via phone, email, and live chat. With state-of-the-art data centers and a focus on customer support, WebHostingPad provides fast and reliable hosting solutions for businesses of all sizes.', 'WebHostingPad', 'assets/images/store/5718_webpad.jpg', 'WebHostingPad is a web hosting company that provides affordable and reliable hosting solutions to individuals and small businesses. The company was founded in 2005 and is based in Rolling Meadows, Illinois.\r\n\r\nWebHostingPad offers a range of hosting plans, including shared hosting, VPS hosting, and WordPress hosting, as well as domain registration services. Their shared hosting plans are designed to be easy to use and come with a range of features, including unlimited disk space and bandwidth.\r\n\r\nIn addition to hosting services, WebHostingPad also offers website builder tools, email hosting, and e-commerce solutions to help businesses establish an online presence. The company has a strong focus on customer support and offers 24/7 technical support via phone, email, and live chat.\r\n\r\nWebHostingPad is committed to providing affordable hosting solutions without compromising on quality or performance. Their servers are located in state-of-the-art data centers, ensuring fast and reliable connectivity for their customers\' websites. With a range of hosting plans and a focus on customer support, WebHostingPad is a popular choice for individuals and small businesses looking for reliable and affordable hosting solutions.', ' ', 1, '2023-03-25 16:50:18', '2023-03-25 10:50:18');

-- --------------------------------------------------------

--
-- Table structure for table `store_offer`
--

CREATE TABLE `store_offer` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `offer_text` varchar(500) NOT NULL,
  `offer_submit_name` varchar(150) NOT NULL,
  `title` varchar(250) NOT NULL,
  `details` varchar(1000) NOT NULL,
  `code` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `inserted_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `store_offer`
--

INSERT INTO `store_offer` (`id`, `category_id`, `store_id`, `offer_text`, `offer_submit_name`, `title`, `details`, `code`, `status`, `inserted_at`, `updated_at`) VALUES
(4, 1, 18, 'UK Wordpress Hosting', 'eUKhost offers 25% off on Wordpress Hosting Use Coupon Code eUK25WP', 'UK Wordpress Hosting', 'eUKhost offers 25% off on Wordpress Hosting Use Coupon Code eUK25WP', 'eUK25WP', 1, '2023-04-12 18:46:02', '2023-04-12 12:46:02');

-- --------------------------------------------------------

--
-- Table structure for table `trending`
--

CREATE TABLE `trending` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `subtitle` varchar(200) NOT NULL,
  `image` varchar(500) NOT NULL,
  `t_link` varchar(1000) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `inserted_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer_interaction`
--
ALTER TABLE `offer_interaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_offer`
--
ALTER TABLE `store_offer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trending`
--
ALTER TABLE `trending`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `offer_interaction`
--
ALTER TABLE `offer_interaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `store_offer`
--
ALTER TABLE `store_offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trending`
--
ALTER TABLE `trending`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
