-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 02, 2021 at 01:27 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_project_est`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `github_link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `challenge`
--

CREATE TABLE `challenge` (
  `id_chall` int(10) NOT NULL,
  `level` text NOT NULL,
  `langs_and_techs` varchar(60) NOT NULL,
  `zip_file` text NOT NULL,
  `discription` text NOT NULL,
  `challenge_title` varchar(150) NOT NULL,
  ` desktop_preview` varchar(100) NOT NULL,
  `mobile_preview` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `challenge`
--

INSERT INTO `challenge` (`id_chall`, `level`, `langs_and_techs`, `zip_file`, `discription`, `challenge_title`, ` desktop_preview`, `mobile_preview`) VALUES
(1, 'intermediate', 'HTML CSS JS', '1_todo-app-main.zip', 'The classic todo app with a few twists! This app includes a dark/light theme toggle and drag & drop reordering for anyone wanting an extra test.', 'Todo app', '1_mobile-design-dark.jpg', '1_desktop-design-dark.jpg'),
(2, 'intermediate', 'HTML CSS JS', '2_EasyBank-Landing-Page.zip', 'This challenge will provide a nice test for your layout skills. If you\'re ready to move up from Junior challenges, this one is a great next step.', 'Easybank landing page', '2_mobile-design.jpg', '2_desktop-preview.jpg'),
(3, 'newbe', 'HTML CSS JS', '3_Article-Preview-Component.zip', 'Practice your layout skills with this article preview component. There\'s lots of fun to be had playing around with animations for the sharing icons as well.', 'Article preview component', '3_mobile-design.jpg', '3_desktop-preview.jpg'),
(4, 'newbe', 'HTML CSS JS', '4_Coding-Bootcamp-Testimonials-Slider.zip', 'This challenge will be a nice test if you\'re new to JavaScript. It\'s also a great opportunity to play around with content animations and transitions.', 'Coding bootcamp testimonials slider', '4_mobile-design-slide-1.jpg', '4_desktop-preview.jpg'),
(5, 'junior', 'HTML CSS JS', '5_Insure-Landing-Page.zip', 'Test your layout skills with this HTML & CSS only landing page. This challenge is perfect if you\'re starting to get confident in laying out web pages.', 'Insure landing page', '5_mobile-design.jpg', '5_desktop-preview.jpg'),
(6, 'junior', 'HTML CSS', '6_Fylo-Dark-Theme-Landing-Page.zip', 'This design has some nice layout challenges in it. A perfect training ground to practice your Flexbox and/or Grid skills.', 'Fylo dark theme landing page', '6_mobile-design.jpg', '6_desktop-preview.jpg'),
(7, 'intermediate', 'HTML CSS JS API', '7_url-shortening-api-master.zip', 'Integrate with the shrtcode URL shortening API and play with browser storage in this landing page challenge.', 'URL shortening API landing page', '7_desktop-design.jpg', '7_desktop-preview.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `Dev`
--

CREATE TABLE `Dev` (
  `id_Dev` int(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `github_link` varchar(300) NOT NULL,
  `score` int(10) NOT NULL,
  `country` varchar(60) NOT NULL,
  `image` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Dev`
--

INSERT INTO `Dev` (`id_Dev`, `first_name`, `last_name`, `github_link`, `score`, `country`, `image`, `password`, `email`) VALUES
(1, 'you', 'elkaf', 'https://github.com/you', 4, 'morroco', 'dfg', '1234', 'q@gmail.com'),
(2, 'hamza', 'gassai', 'https://github.com/Ghamza-Dev', 6, 'morocco', 'dfgh', '3445', 'c@gmail.com'),
(3, 'Amal', 'Beddiaf', 'https://github.com/Ghamza-Dev', 0, 'Morocco', 'avat.svg', 'amal33', '---'),
(9, 'Ahmed', 'Elghali', 'https://github.com/Ghamza-Dev', 0, 'Morocco', 'avat.svg', '1002', '---'),
(10, 'Fatima', 'anwar', 'https://github.com/Ghamza-Dev', 0, 'Morocco', 'avat.svg', 'anwar874', '---'),
(11, 'Nawal', 'elmansori', 'https://github.com/Ghamza-Dev', 0, 'Morocco', 'avat.svg', '845975', '---'),
(12, 'john', 'Doe', 'https://github.com/Ghamza-Dev', 0, 'Morocco', 'avat.svg', 'aze2154s@', '---'),
(13, 'Kamal', 'dao', 'https://github.com/Ghamza-Dev', 0, 'Morocco', 'avat.svg', '4587', '---'),
(14, 'Ikram', 'jalal', 'https://github.com/Ghamza-Dev', 0, 'Morocco', 'avat.svg', 'elamala', '---'),
(15, 'Abd Elhakim', 'Elhssayer', 'https://github.com/Ghamza-Dev', 0, 'Morocco', 'avat.svg', '6548hgsd8d', '---');

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE `downloads` (
  `id_chall` int(10) NOT NULL,
  `id_Dev` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `downloads`
--

INSERT INTO `downloads` (`id_chall`, `id_Dev`) VALUES
(1, 2),
(2, 2),
(4, 1),
(4, 2),
(5, 12),
(7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Solution`
--

CREATE TABLE `Solution` (
  `id_chall` int(10) NOT NULL,
  `id_Dev` int(10) NOT NULL,
  `github_link` text NOT NULL,
  `demo_link` varchar(300) NOT NULL,
  `feedback` text NOT NULL,
  `li_ke` tinyint(1) DEFAULT NULL,
  `langs` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Solution`
--

INSERT INTO `Solution` (`id_chall`, `id_Dev`, `github_link`, `demo_link`, `feedback`, `li_ke`, `langs`) VALUES
(1, 2, 'https://github.com/Ghamza-Dev/test', 'https://error404', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 0, 'HTML CSS JS'),
(3, 2, 'https://github.com/Ghamza-Dev/test', 'https://error404', 'Hi ,\r\nyou feedback is very appreciated :)', 0, 'HTML CSS JS'),
(4, 2, 'https://github.com/Ghamza-Dev/test', 'https://error404', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur nihil similique qui, quas corrupti est? Atque totam culpa nostrum itaque.\r\n', 0, 'HTML CSS JS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `challenge`
--
ALTER TABLE `challenge`
  ADD PRIMARY KEY (`id_chall`);

--
-- Indexes for table `Dev`
--
ALTER TABLE `Dev`
  ADD PRIMARY KEY (`id_Dev`);

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`id_chall`,`id_Dev`),
  ADD KEY `id_Dev` (`id_Dev`);

--
-- Indexes for table `Solution`
--
ALTER TABLE `Solution`
  ADD PRIMARY KEY (`id_chall`,`id_Dev`),
  ADD KEY `id_Dev` (`id_Dev`),
  ADD KEY `id_chall` (`id_chall`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `challenge`
--
ALTER TABLE `challenge`
  MODIFY `id_chall` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Dev`
--
ALTER TABLE `Dev`
  MODIFY `id_Dev` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `downloads`
--
ALTER TABLE `downloads`
  ADD CONSTRAINT `downloads_ibfk_1` FOREIGN KEY (`id_chall`) REFERENCES `challenge` (`id_chall`),
  ADD CONSTRAINT `downloads_ibfk_2` FOREIGN KEY (`id_Dev`) REFERENCES `Dev` (`id_Dev`);

--
-- Constraints for table `Solution`
--
ALTER TABLE `Solution`
  ADD CONSTRAINT `Solution_ibfk_1` FOREIGN KEY (`id_chall`) REFERENCES `challenge` (`id_chall`),
  ADD CONSTRAINT `Solution_ibfk_2` FOREIGN KEY (`id_Dev`) REFERENCES `Dev` (`id_Dev`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
