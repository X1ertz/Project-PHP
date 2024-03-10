-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2024 at 04:24 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userinfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `diarrys`
--

CREATE TABLE `diarrys` (
  `id` int(100) NOT NULL,
  `userid` int(100) DEFAULT NULL,
  `diarry` text DEFAULT NULL,
  `emoji` varchar(255) DEFAULT NULL,
  `create_date` varchar(255) DEFAULT NULL,
  `topic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diarrys`
--

INSERT INTO `diarrys` (`id`, `userid`, `diarry`, `emoji`, `create_date`, `topic`) VALUES
(31, 5, 'ทั้งนี้ ชีวิตของเขาไม่ค่อยเป็นที่ทราบเท่าใดนัก อาริสโตเติลเกิดในนครสตะไยระ (Stagira) ในภาคเหนือของกรีซ บิดาเขาเสียชีวิตตั้งแต่ยังเยาว์ และผู้ปกครองเป็นผู้เลี้ยงดูเขาต่อมา ครั้นอายุได้ 17 หรือ 18 ปี เขาเข้าร่วมอะคาเดมีของเพลโตในเอเธนส์และอยู่ที่นั่นจนอายุได้ 37 ปี (ประมาณ 347 ปีก่อน ค.ศ.) ไม่นานหลังเพลโตเสียชีวิต อาริสโตเติลออกจากเอเธนส์ และเป็นพระอาจารย์ให้แก่อเล็กซานเดอร์มหาราชเริ่มตั้งแต่ 343 ปีก่อน ', '😀🙂', '8/3/2004', 'Aristotle');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `like_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `post_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`like_id`, `user_id`, `post_id`) VALUES
(221, 5, 225),
(230, 5, 224),
(231, 5, 227),
(232, 5, 226);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `message` text NOT NULL,
  `image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `message`, `image`) VALUES
(224, 5, 'Hi', ''),
(226, 9, 'Sawadee Kaaaa\r\n', 0x696e6465782e676966),
(227, 5, 'มาดิว่ะ', 0x6269626c652e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password1` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password1`, `email`) VALUES
(5, 'X1ertz', '123456', 'brz133380@gmail.com'),
(9, 'pinnpaintt', '123456', 'brz133380@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diarrys`
--
ALTER TABLE `diarrys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diarrys`
--
ALTER TABLE `diarrys`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
