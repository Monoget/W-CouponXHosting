-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 24, 2023 at 03:03 PM
-- Server version: 10.3.37-MariaDB-cll-lve
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
(1, 'Web hosting', 1, '2022-12-07 02:06:56', '2022-12-06 20:06:56');

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
(1, 2, 1, 'test', 'test', 'assets/images/trendingdeal/16105_Capture.JPG', 'https://couponxhosting.com/Stores', 'dgfsg', 1, '2022-12-07 02:23:03', '2022-12-06 20:23:03');

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
(1, 1, 'macy.com', 'Store', 'Test', 'Test', 'Test', 'assets/images/store/54415_Untitled design.png', 'Test', 'Test', 1, '2022-12-07 02:19:01', '2022-12-06 20:19:01'),
(2, 1, 'Dipto.com', 'Dipto', 'test', 'test', 'test', 'assets/images/store/91955_Capture.JPG', 'test', 'test', 1, '2022-12-07 02:21:14', '2022-12-06 20:21:14'),
(3, 1, 'https://www.tkqlhce.com/click-100751633-11145908', 'Interserver', 'Web Hosting', 'If you\'re looking for a web hosting company that offers a variety of hosting plans to suit your needs, you may want to consider Interserver. Interserver has been in business since 1999 and offers a variety of hosting plans, including shared, VPS, and dedicated hosting.\r\n', 'Interserver Web hosting,Web Hosting', 'assets/images/store/9478_interserver web hosting.jpg', 'Interserver Web hosting\r\n', ' ', 1, '2023-01-11 01:40:18', '2023-01-10 19:40:18'),
(4, 1, 'https://www.dpbolvw.net/click-100751633-11146123', 'Interserver', 'VPS Hosting', 'Interserver is a reliable and affordable VPS hosting provider that offers a wide range of features and services. Their VPS hosting plans are suitable for small to medium businesses and offer a great way to get started with a virtual private server.\r\n', '(IS) Interserver Webhosting and VPS ,VPS Hosting', 'assets/images/store/13450_interserver VPS Hosting.jpg', 'VPS Hosting\r\n', ' ', 1, '2023-01-11 01:42:44', '2023-01-10 19:42:44'),
(5, 1, 'https://www.jdoqocy.com/click-100751633-11146127', ' Interserver', 'InterServer VPS Services', 'If you\'re looking for a reliable and affordable VPS hosting provider, InterServer is a great option to consider. InterServer has been providing quality VPS hosting services for over 17 years, and their experience shows. Their VPS plans come with plenty of storage and bandwidth, and you can choose between Linux and Windows operating systems.\r\n', 'InterServer VPS Services,(IS) Interserver Webhosting and VPS ', 'assets/images/store/29803_interserver vps services.jpg', 'InterServer VPS Services\r\n', ' ', 1, '2023-01-11 01:46:17', '2023-01-10 19:46:17'),
(6, 1, 'https://www.dpbolvw.net/click-100751633-11146125', 'Interserver', 'VPS Hosting Long', 'If you\'re looking for a reliable and affordable VPS hosting provider, InterServer is a great option to consider. InterServer has been providing quality VPS hosting services for over 17 years, and their experience shows. Their VPS plans come with plenty of storage and bandwidth, and you can choose between Linux and Windows operating systems.\r\n', 'VPS Hosting Long,Interserver Cloud VPS Hosting', 'assets/images/store/78264_interserver Cloud VPS Hosting.jpg', 'Interserver Cloud VPS Hosting\r\n', ' ', 1, '2023-01-11 01:48:28', '2023-01-10 19:48:28'),
(7, 1, 'https://www.jdoqocy.com/click-100751633-13326034', '(eUK) eUKhost Ltd', 'Dedicated Server Hosting', 'If you\'re looking for quality, affordable Dedicated Server Hosting, look no further than eUKhost Ltd!\r\n', 'Hosting, Server, Linux, Windows', 'assets/images/store/61798_eukhost Dedicated Server Hosting.jpg', 'eUKhost Enterprise Hosting\r\n', ' ', 1, '2023-01-11 01:51:28', '2023-01-10 19:51:28'),
(8, 1, 'https://www.dpbolvw.net/click-100751633-13326025', '(eUK) eUKhost Ltd', 'cPanel Hosting Plans', 'Want to learn how to setup your own professional web hosting? Look no further than eUKhost Ltd. Our experts can teach you everything you need to get started with cPanel hosting!\r\n', 'cpanel hosting, shared hosting', 'assets/images/store/41399_eukhost cPanel Hosting.jpg', 'Shared Hosting Plans\r\n', ' ', 1, '2023-01-11 01:52:48', '2023-01-10 19:52:48'),
(9, 1, 'https://www.dpbolvw.net/click-100751633-13065587', '(eUK) eUKhost Ltd', 'Cloud Hosting', 'eUKhost Ltd is a web hosting company that offers cloud hosting services. With cloud hosting, your website is hosted on a cluster of servers that are connected to each other. This means that if one server goes down, your website will still be accessible from the other servers in the cluster.\r\n', 'UK, CLoud, Hosting , Offer, Deal, Hosting, Managed services, eukhost,website,server,webmasters,windows server,discount', 'assets/images/store/53928_eukhost cloud hosting.jpg', 'UK Cloud Hosting Services Get Flat 20% Off on our Enterprise Cloud.\r\n', ' ', 1, '2023-01-11 01:57:28', '2023-01-10 19:57:28'),
(10, 1, 'https://www.dpbolvw.net/click-100751633-13326032', '(eUK) eUKhost Ltd', 'Reseller Hosting Plans', 'eUKhost Ltd is a web hosting company based in the United Kingdom. The company offers a variety of hosting services, including reseller hosting. Reseller hosting is a type of web hosting in which the account owner has the ability to resell web hosting services to other users.\r\n', 'Hosting', 'assets/images/store/19659_eukhost Reseller Hosting.jpg', 'eUKhost Offers Best Reseller Hosting\r\n', ' ', 1, '2023-01-11 01:59:09', '2023-01-10 19:59:09'),
(11, 1, 'https://www.tkqlhce.com/click-100751633-13326030', '(eUK) eUKhost Ltd', 'UK VPS Hosting', 'eUKhost Ltd VPS Hosting is one of the most popular web hosting providers in the UK. They offer a wide range of services including shared hosting, reseller hosting, and VPS hosting. They have a strong focus on customer service and offer 24/7 support.\r\n', 'VPS Hosting', 'assets/images/store/61476_eukhost VPS Hosting.jpg', 'VPS Hosting Plans\r\n', ' ', 1, '2023-01-11 02:01:12', '2023-01-10 20:01:12'),
(12, 1, 'https://www.dpbolvw.net/click-100751633-11188597', '(eUK) eUKhost Ltd', 'Web Hosting Services', 'eUKhost Ltd web Hosting is one of the most popular web hosting providers. They offer a wide range of services including shared hosting, reseller hosting, and VPS hosting. They have a strong focus on customer service and offer 24/7 support.\r\n', 'web hosting services,web hosting,website host,uk hosting,eukhost', 'assets/images/store/55950_eukhost Web Hosting.jpg', 'Website Hosting Services in the UK\r\n', ' ', 1, '2023-01-11 02:03:37', '2023-01-10 20:03:37'),
(13, 1, 'https://www.dpbolvw.net/click-100751633-13326026', '(eUK) eUKhost Ltd', 'Windows Hosting', 'eUKhost Ltd is one of the leading providers of Windows hosting services in the United Kingdom. The company has been in business since 2001 and offers a wide range of hosting services to its customers. eUKhost Ltd is a privately held company and is headquartered in Leeds, United Kingdom.\r\n', 'Windows Hosting', 'assets/images/store/25380_eukhost Windows Hosting.jpg', 'Windows Hosting plans\r\n', ' ', 1, '2023-01-11 02:05:12', '2023-01-10 20:05:12'),
(14, 1, 'https://www.tkqlhce.com/click-100751633-13323225', '(eUK) eUKhost Ltd', 'Wordpress Hosting', 'eUKhost Ltd is a leading provider of WordPress hosting solutions. Our WordPress hosting platform is designed to provide a hassle-free experience for businesses and individuals who want to take their online presence to the next level.\r\n', 'UK, Hosting, wordpress Hosting', 'assets/images/store/60552_eukhost Wordpress Hosting.jpg', 'eUKhost offers 25% off on WordPress Hosting\r\n', ' ', 1, '2023-01-11 02:06:44', '2023-01-10 20:06:44');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `store_offer`
--
ALTER TABLE `store_offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trending`
--
ALTER TABLE `trending`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
