-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2020 at 11:20 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokopeda`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `cust_uname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email_cust` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_uname`, `password`, `email_cust`) VALUES
(5, 'customer1', '$2y$10$2K7Xj4KgrQxiRAC9IND0S.sPLSi8SNFvrzng9wzC5ju2HStnDfV2y', 'customer@gmail.com');

-- --------------------------------------------------------

--
-- Stand-in structure for view `orderlist`
-- (See below for the actual view)
--
CREATE TABLE `orderlist` (
`product_id` int(11)
,`product_name` varchar(255)
,`product_price` varchar(255)
,`stock` int(11)
,`kind` varchar(255)
,`status` enum('hidden','visible','','')
,`weight` float
,`product_brand` varchar(255)
,`date_created` datetime
,`updated_at` datetime
,`description` varchar(255)
,`tags` varchar(255)
,`product_image` varchar(255)
,`id_orderdetail` int(11)
,`id_order_od` int(11)
,`id_barang` int(11)
,`kuantitas` int(11)
,`status_order_dtl` enum('dibayar','dikirim','diterima','')
,`id_order` int(11)
,`id_customer` int(11)
,`nm_penerima` varchar(255)
,`dst_province` varchar(255)
,`dst_city` varchar(255)
,`courier` varchar(255)
,`postal_code` varchar(30)
,`detail_address` varchar(255)
,`phone` varchar(100)
,`notes` varchar(200)
,`od_created_at` datetime
,`status_order` enum('checkout','paid','delivered','done')
);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `nm_penerima` varchar(255) NOT NULL,
  `dst_province` varchar(255) NOT NULL,
  `dst_city` varchar(255) NOT NULL,
  `courier` varchar(255) NOT NULL,
  `postal_code` varchar(30) NOT NULL,
  `detail_address` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `notes` varchar(200) NOT NULL,
  `od_created_at` datetime DEFAULT NULL,
  `status_order` enum('checkout','paid','delivered','done') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `id_customer`, `nm_penerima`, `dst_province`, `dst_city`, `courier`, `postal_code`, `detail_address`, `phone`, `notes`, `od_created_at`, `status_order`) VALUES
(17, 5, 'customer1', 'Papua', 'Mimika', 'jne', '123456', 'Jl. Cendrawasih No. 666', '081234213332', 'di depannya ada gapura', '2020-06-08 12:46:12', 'paid'),
(18, 5, 'customer1', 'Kalimantan Utara', 'Nunukan', 'jne', '68124', 'Jl ayam kampung', '083292939923', 'd', '2020-06-10 16:17:33', 'paid'),
(19, 5, 'customer1', 'Kalimantan Utara', 'Nunukan', 'jne', '68124', 'Jl ayam kampung', '083292939923', 'd', '2020-06-10 16:19:15', 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id_orderdetail` int(11) NOT NULL,
  `id_order_od` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `status_order_dtl` enum('dibayar','dikirim','diterima','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id_orderdetail`, `id_order_od`, `id_barang`, `kuantitas`, `status_order_dtl`) VALUES
(16, 17, 1, 3, 'diterima'),
(17, 17, 13, 21, 'diterima'),
(18, 19, 2, 1, 'diterima');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `kind` varchar(255) NOT NULL,
  `status` enum('hidden','visible','','') NOT NULL,
  `weight` float NOT NULL,
  `product_brand` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `stock`, `kind`, `status`, `weight`, `product_brand`, `date_created`, `updated_at`, `description`, `tags`, `product_image`) VALUES
(1, 'Polygon Monarch', '11.000.000', 119, 'sepeda', 'visible', 18, 'polygon', '0000-00-00 00:00:00', '2020-05-20 21:40:51', '                                                                        dsasd                                                                ', 'mtb,polygon', 'sepeda-1.jpg'),
(2, 'Thrill Gentoo', '3.800.000', 1, 'sepeda', 'visible', 15, 'Thrill', '0000-00-00 00:00:00', '2020-05-20 21:40:51', 'Thrill adalah sepeda yang kuat dan tahan di segala medan', 'mtb,thrill', 'sepeda-2.jpg'),
(7, 'Polygon Mommy', '1.200.000', 9, 'sepeda', 'visible', 20, 'Polygon', '2020-05-17 02:59:19', '2020-05-20 21:40:51', '                                    Sepeda Keranjang Buat Emak                                ', 'Keranjang,Polygon', '1589677159.jpg'),
(11, 'United Crossroad', '4.000.000', 0, 'sepeda', 'visible', 15, 'United', '2020-05-26 06:44:53', '2020-05-26 06:44:53', 'dsdsd', 'United,Mtb', '1590468293.jpg'),
(12, 'Helm Keren', '120.000', 0, 'asesoris', 'hidden', 2, 'ink', '2020-05-26 06:45:23', '2020-05-26 06:45:23', '                                                                        dsada                                                                ', 'helm', '1590468323.jpg'),
(13, 'Helm Enigma', '400.000', 21, 'asesoris', 'visible', 2, 'Enigma', '2020-05-31 13:16:15', '2020-05-31 13:16:15', '                                    d                                ', 'Helm,Enigma', '1590923775.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `role` enum('admin','root','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `role`) VALUES
(1, 'admin1', '$2y$12$Jvp/XTVOgnUnvYEuot46EeyeHQwSttIW9aLnE3etvzUEtHy79E0ja', 'dentamauuulana99@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Structure for view `orderlist`
--
DROP TABLE IF EXISTS `orderlist`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `orderlist`  AS  select `p`.`product_id` AS `product_id`,`p`.`product_name` AS `product_name`,`p`.`product_price` AS `product_price`,`p`.`stock` AS `stock`,`p`.`kind` AS `kind`,`p`.`status` AS `status`,`p`.`weight` AS `weight`,`p`.`product_brand` AS `product_brand`,`p`.`date_created` AS `date_created`,`p`.`updated_at` AS `updated_at`,`p`.`description` AS `description`,`p`.`tags` AS `tags`,`p`.`product_image` AS `product_image`,`od`.`id_orderdetail` AS `id_orderdetail`,`od`.`id_order_od` AS `id_order_od`,`od`.`id_barang` AS `id_barang`,`od`.`kuantitas` AS `kuantitas`,`od`.`status_order_dtl` AS `status_order_dtl`,`o`.`id_order` AS `id_order`,`o`.`id_customer` AS `id_customer`,`o`.`nm_penerima` AS `nm_penerima`,`o`.`dst_province` AS `dst_province`,`o`.`dst_city` AS `dst_city`,`o`.`courier` AS `courier`,`o`.`postal_code` AS `postal_code`,`o`.`detail_address` AS `detail_address`,`o`.`phone` AS `phone`,`o`.`notes` AS `notes`,`o`.`od_created_at` AS `od_created_at`,`o`.`status_order` AS `status_order` from ((`product` `p` join `order_detail` `od` on((`od`.`id_barang` = `p`.`product_id`))) join `orders` `o` on((`o`.`id_order` = `od`.`id_order_od`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id_orderdetail`) USING BTREE;

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id_orderdetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
