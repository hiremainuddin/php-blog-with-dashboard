-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2020 at 03:38 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `islamic_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `post_count` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`menu_id`, `menu_name`, `post_count`) VALUES
(7, 'PHP', '1'),
(8, 'JAVA', '2'),
(9, 'CSS', '1');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(1020) NOT NULL,
  `post_content` text NOT NULL,
  `post_image` varchar(800) NOT NULL,
  `menu_id` varchar(800) NOT NULL,
  `submenu_id` varchar(1020) NOT NULL,
  `author` varchar(80) NOT NULL,
  `date` date NOT NULL,
  `post_status` varchar(800) NOT NULL DEFAULT 'Disable'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_content`, `post_image`, `menu_id`, `submenu_id`, `author`, `date`, `post_status`) VALUES
(34, 'Lorem ipsum dolor sit amet, consectetur', 'dolor sit amet consectetur adipisicing elit. Excepturi accusantium, dolor error, nisi suscipit vel dicta optio maiores, pariatur tempore voluptatum illum sed consequuntur maxime consectetur rem', '1608048010-office-1730940_1920.jpg', '8', '13', '6', '2020-12-15', 'Enable'),
(35, 'HTML-Lorem ipsum dolor sit amet, consectetur', 'dolor sit amet consectetur adipisicing elit. Excepturi accusantium, dolor error, nisi suscipit vel dicta optio maiores, pariatur tempore voluptatum illum sed consequuntur maxime consectetur rem', '1608048067-pexels-pixabay-159866.jpg', '9', '14', '6', '2020-12-15', 'Enable'),
(36, 'Lorem ipsum dolor sit amet, consectetur', 'dolor sit amet consectetur adipisicing elit. Excepturi accusantium, dolor error, nisi suscipit vel dicta optio maiores, pariatur tempore voluptatum illum sed consequuntur maxime consectetur rem', '1608048117-pexels-skitterphoto-1005324.jpg', '8', '13', '6', '2020-12-15', 'Enable'),
(38, 'HTML-Lorem ipsum dolor sit amet, consectetur', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Possimus accusamus tempore aliquid est expedita, laboriosam, optio. Repellat praesentium, voluptatum dolore vitae doloribus, placeat atque aut, totam magni ratione sunt soluta.', '1608209710-ilya-pavlov-OqtafYT5kTw-unsplash.jpg', '7', '12', '6', '2020-12-17', 'Disable');

-- --------------------------------------------------------

--
-- Table structure for table `sub_menu`
--

CREATE TABLE `sub_menu` (
  `submenu_id` int(11) NOT NULL,
  `menu_id` varchar(20) NOT NULL,
  `submenu_name` varchar(255) NOT NULL,
  `post_count` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_menu`
--

INSERT INTO `sub_menu` (`submenu_id`, `menu_id`, `submenu_name`, `post_count`) VALUES
(12, '7', 'Php introduction', 0),
(13, '8', 'Java Inroduction', 2),
(14, '9', 'Css Inroductions', 1),
(15, '8', 'Java Inroduction', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `f_name` varchar(225) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_pwd` varchar(255) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `user_role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `f_name`, `user_name`, `user_pwd`, `phone`, `user_role`) VALUES
(6, 'mdmain', 'admin', '21232f297a57a5a743894a0e4a801fc3', '01775864306', '1'),
(7, 'julhash', 'julhash', 'ee11cbb19052e40b07aac0ca060c23ee', '01837423993', '1'),
(9, 'ddi', 'admin3', '74b87337454200d4d33f80c4663dc5e5', '2222222222222', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD PRIMARY KEY (`submenu_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `sub_menu`
--
ALTER TABLE `sub_menu`
  MODIFY `submenu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
