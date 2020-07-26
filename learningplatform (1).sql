-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2020 at 03:31 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learningplatform`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `answer_id` int(11) NOT NULL,
  `child_id` varchar(225) NOT NULL,
  `id` int(11) NOT NULL,
  `question_id` varchar(222) NOT NULL,
  `answer` text NOT NULL,
  `status` varchar(33) NOT NULL,
  `corrections` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answer_id`, `child_id`, `id`, `question_id`, `answer`, `status`, `corrections`) VALUES
(24, '2', 36, '1595087971', 'PAUL BIYA', '', ''),
(25, '1', 37, '1595088444', 'MUMA EVELINE', 'CORRECT', 'NONE'),
(26, '2', 38, '1595088665', 'gggggggggggg', '', ''),
(27, '2', 37, '1595088444', 'muma', 'CORRECT', 'NONE'),
(28, '', 39, '1595091516', 'I love u', '', ''),
(29, '', 40, '1595091516', 'kdbcihwdac', '', ''),
(30, '', 41, '1595091516', 'wjdcbWKC', '', ''),
(31, '1', 42, '1595184578', 'kkkkkkkkkkkkkk', '', ''),
(32, '2', 42, '1595184578', 'pppppppppppppppppppp', '', ''),
(33, '1', 43, '1595184819', 'tttttttttttttttttttttttt', '', ''),
(34, '', 39, '1595091516', 'vvvvvvvvvvvvvvvv', '', ''),
(35, '', 40, '1595091516', 'oooooooooooooooooo', '', ''),
(36, '', 41, '1595091516', 'xxxxxxxxxxxxxxxxx', '', ''),
(37, '1', 39, '1595091516', 'asdfasdfasdfas', 'CORRECT', 'NONE'),
(38, '1', 40, '1595091516', 'This is at est\r\n', '', ''),
(39, '1', 41, '1595091516', 'This is the answer for question 41', 'CORRECT', 'NONE'),
(40, '1', 44, '1595728287', 'the ans is 4', 'CORRECT', 'NONE');

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
  `id` int(11) NOT NULL,
  `child_name` varchar(222) NOT NULL,
  `age` varchar(10) NOT NULL,
  `phoneNumber` varchar(222) NOT NULL,
  `pwd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`id`, `child_name`, `age`, `phoneNumber`, `pwd`) VALUES
(1, 'muma', '5', '679165995', '$2y$10$GI7VDbPZ9tdOsBj6Zq3nUeRnFrcOegPJs5sKgtNyPSinmU5w4B6oS'),
(2, 'john', '9', '679165995', '$2y$10$1rtXlTz1QMzfQWDLTxQkVuhjaJu4sSxAF29kCl6Nz7YYhRuvXOCJ.');

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` int(11) NOT NULL,
  `lesson_id` varchar(225) NOT NULL,
  `parent_id` varchar(222) NOT NULL,
  `lesson_type` varchar(20) NOT NULL,
  `lesson_description` text NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `lesson_id`, `parent_id`, `lesson_type`, `lesson_description`, `status`) VALUES
(8, '1595086989', '679165995', 'TEXT', 'Cameroon history', 'UNVIEWED'),
(9, '1595087505', '679165995', 'IMAGE', 'Understand the Following', 'UNVIEWED'),
(10, '1595727828', '679165995', 'VIDEO', 'please work', 'UNVIEWED');

-- --------------------------------------------------------

--
-- Table structure for table `lesson_content`
--

CREATE TABLE `lesson_content` (
  `id` int(11) NOT NULL,
  `lesson_id` varchar(225) NOT NULL,
  `content` text NOT NULL,
  `status` varchar(11) NOT NULL,
  `timestamp_id` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lesson_content`
--

INSERT INTO `lesson_content` (`id`, `lesson_id`, `content`, `status`, `timestamp_id`) VALUES
(10, '6791659951595086989', 'the president of Cameroon is Paul Biya ', 'UNVIEWED', '1595086989'),
(11, '6791659951595087505', 'wallpaper_01.jpg', 'UNVIEWED', '1595087505'),
(12, '6791659951595087505', 'wallpaper_02.jpg', 'UNVIEWED', '1595087505'),
(13, '6791659951595087505', 'wallpaper_03.jpg', 'UNVIEWED', '1595087505'),
(14, '6791659951595087505', 'wallpaper_04.jpg', 'UNVIEWED', '1595087505'),
(15, '6791659951595727828', '001 Course into.mp4', 'UNVIEWED', '1595727828');

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `firstName` varchar(225) NOT NULL,
  `lastName` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `phoneNumber` varchar(40) NOT NULL,
  `password` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`firstName`, `lastName`, `email`, `phoneNumber`, `password`) VALUES
('muma', 'musa', 'ngangmuma00@gmail.com', '679165995', '$2y$10$VxYxlMatB6rmsF2nHCf3a.oRgo8bJMBXiy8wXihi3CAzqXwki5fhy'),
('lewo', 'puis', 'alicendeh16@gmail.com', '6791659996', '$2y$10$2qiKZZYEBSXexOEXW4OHD.UDgcCS3OEtPzU7nJyhiFueWcYOLlLtq'),
('lewo', 'musa', 'paul@gmial.com', '6791659997', '$2y$10$A.JWfx13HKnZJbldw2zDke.UXZMT.Vpt5HX1vyoSU.EQ.BSnH04Ci');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question_id` varchar(225) NOT NULL,
  `parent_id` varchar(225) NOT NULL,
  `question_type` varchar(40) NOT NULL,
  `question_description` text NOT NULL,
  `status` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question_id`, `parent_id`, `question_type`, `question_description`, `status`) VALUES
(25, '1595087971', '679165995', 'TEXT', 'form Cameroon history', 'ANSWERED'),
(26, '1595088444', '679165995', 'TEXT', 'ans', 'ANSWERED'),
(27, '1595088665', '679165995', 'TEXT', 'ans', 'ANSWERED'),
(28, '1595091516', '679165995', 'IMAGE', 'Answer the following questions', 'ANSWERED'),
(29, '1595184578', '679165995', 'TEXT', 'hhhhhhhhhhhh', 'ANSWERED'),
(30, '1595184819', '679165995', 'YOUTUBE', 'ggggggggggggggggg', 'ANSWERED'),
(31, '1595728287', '679165995', 'VIDEO', 'mmmmmmmmmmmmmmm', 'ANSWERED');

-- --------------------------------------------------------

--
-- Table structure for table `question_content`
--

CREATE TABLE `question_content` (
  `id` int(11) NOT NULL,
  `question_id` varchar(225) NOT NULL,
  `content` text NOT NULL,
  `status` varchar(11) NOT NULL,
  `timestamp_id` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_content`
--

INSERT INTO `question_content` (`id`, `question_id`, `content`, `status`, `timestamp_id`) VALUES
(15, '6791659951592344327', 'wallpaper_01.jpg', '', ''),
(16, '6791659951592344327', 'wallpaper_02.jpg', '', ''),
(17, '6791659951592344438', '001 Course into.mp4', '', ''),
(18, '6791659951592344809', 'Who is the president of Cameroon', '', ''),
(19, '6791659951592344905', 'http://youtube.com/watch?v=TlmDsU8GirU', 'ANSWERED', ''),
(20, '6791659951592345116', 'List five things you do to protect your self from covid-19', 'ANSWERED', ''),
(21, '6791659951592382601', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh\r\nggggggggggggggggggggggggggggggggg\r\nyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyuuuuu\r\nggggggggggggggggggggggggggggggggg', 'ANSWERED', ''),
(22, '6791659951592428054', 'https://www.youtube.com/watch?v=cRCOVzkGVJM', '', ''),
(23, '6791659951592869662', 'IMG_20180510_104423.jpg', 'ANSWERED', ''),
(24, '6791659951592869662', 'IMG_20180510_104426.jpg', 'ANSWERED', ''),
(25, '6791659951592869662', 'IMG_20180512_143233.jpg', '', ''),
(26, '6791659951592869662', 'IMG_20180512_143236.jpg', '', ''),
(27, '6791659951593339965', 'do you love God', 'ANSWERED', ''),
(28, '6791659951593342730', 'when was the anexation of cameroon', 'ANSWERED', '1593342730'),
(29, '6791659951593344033', 'how do u see the future of your contry in 35 years to come', 'ANSWERED', '1593344033'),
(30, '6791659951593344174', 'pppppppppppp', 'ANSWERED', '1593344174'),
(31, '6791659951593965193', 'wallpaper_17.jpg', 'ANSWERED', '1593965193'),
(32, '6791659951593965193', 'wallpaper_18.jpg', 'ANSWERED', '1593965193'),
(33, '6791659951593965193', 'wallpaper_19.jpg', 'ANSWERED', '1593965193'),
(34, '6791659951593965193', 'wallpaper_20.jpg', 'ANSWERED', '1593965193'),
(35, '6791659951594510527', 'whats your favourite song', 'ANSWERED', '1594510527'),
(36, '6791659951595087971', 'Who is the president of Cameroon', 'ANSWERED', '1595087971'),
(37, '6791659951595088444', 'what is your name', 'ANSWERED', '1595088444'),
(38, '6791659951595088665', 'who is your mother', 'ANSWERED', '1595088665'),
(39, '6791659951595091516', 'wallpaper_01.jpg', 'ANSWERED', '1595091516'),
(40, '6791659951595091516', 'wallpaper_02.jpg', 'ANSWERED', '1595091516'),
(41, '6791659951595091516', 'wallpaper_03.jpg', 'ANSWERED', '1595091516'),
(42, '6791659951595184578', 'ggggggggggggggggg', 'ANSWERED', '1595184578'),
(43, '6791659951595184819', 'https://www.youtube.com/watch?v=oSjZM8UZx5c', 'ANSWERED', '1595184819'),
(44, '6791659951595728287', '001 Course into.mp4', 'ANSWERED', '1595728287');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lesson_content`
--
ALTER TABLE `lesson_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`phoneNumber`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_content`
--
ALTER TABLE `question_content`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `children`
--
ALTER TABLE `children`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `lesson_content`
--
ALTER TABLE `lesson_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `question_content`
--
ALTER TABLE `question_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
