-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2024 at 06:31 PM
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
-- Database: `lms`
--
CREATE DATABASE IF NOT EXISTS `lms` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `lms`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `email` varchar(70) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`) VALUES
('koushikiverma19@gmail.com', '1904');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `file_path` varchar(250) DEFAULT NULL,
  `cover_img` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `subject`, `file_path`, `cover_img`) VALUES
(1, 'AI Book1 ', 'AI', 'pdfs/ai1pdf.pdf', 'assets/aibook1.jpg'),
(2, 'AI Book2', 'AI', 'pdfs/ai2pdf.pdf', 'assets/aibook2.jpg'),
(5, 'Cyber Security Book1', 'Cyber Security', 'pdfs/cybersecurity1pdf.pdf', 'assets/cybersecuritybook1.jpg'),
(6, 'Cyber Security Book2', 'Cyber Security', 'pdfs/cybersecurity2pdf.pdf', 'assets/cybersecuritybook2.jpg'),
(7, 'Cloud Computing Book1', 'Cloud Computing', 'pdfs/cloudcomputing1pdf.pdf', 'assets/cloudcomputingbook1.jpg'),
(8, 'Cloud Computing Book2', 'Cloud Computing', 'pdfs/cloudcomputing2pdf.pdf', 'assets/cloudcomputingbook2.jpg'),
(9, 'Big Data Book1', 'Big Data', 'pdfs/bigdata1pdf.pdf', 'assets/bigdatabook1.jpg'),
(10, 'Big Data Book2', 'Big Data', 'pdfs/bigdata2pdf.pdf', 'assets/bigdatabook2.jpg'),
(11, 'Full Stack Development Book1', 'Full Stack Development ', 'pdfs/fullstackdevelopment1pdf.pdf', 'assets/fullstackdevelopmentbook1.png'),
(12, 'Full Stack Development Book2', 'Full Stack Development ', 'pdfs/fullstackdevelopment2pdf.pdf', 'assets/fullstackdevelopmentbook2.png'),
(13, 'C Book1', 'C', 'pdfs/c1pdf.pdf', 'assets/cbook1.png'),
(14, 'C Book2', 'C', 'pdfs/c2pdf.pdf', 'assets/cbook2.png'),
(15, 'Java Book1', 'Java', 'pdfs/java1pdf.pdf', 'assets/javabook1.png'),
(16, 'Java Book2', 'Java', 'pdfs/java2pdf.pdf', 'assets/javabook2.png');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `message`, `submitted_at`) VALUES
(1, 'Koushiki', 'koushikiverma19@gmail.com', 'It was nice to use this learning system', '2024-11-15 14:04:34');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` enum('Technology','Language','','') DEFAULT 'Technology',
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `type`, `image_path`) VALUES
(1, 'AI', 'Technology', 'assets/ai.webp'),
(2, 'Big Data', 'Technology', 'assets/bigdata.png'),
(3, 'Cyber Security', 'Technology', 'assets/cybersecurity.png'),
(4, 'Cloud Computing', 'Technology', 'assets/cloudcomputing.jpg'),
(5, 'Full Stack Development', 'Technology', 'assets/fullstackdevelopment.webp'),
(6, 'C ', 'Language', 'assets/c.jpg\r\n'),
(7, 'Java', 'Language', 'assets/java.jpg'),
(8, 'PHP', 'Language', 'assets/php.jpg'),
(9, 'Python', 'Language', 'assets/python.png'),
(10, 'Android', 'Language', 'assets/android.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, 'Koushiki', 'Verma', 'koushikiverma19@gmail.com', '1904'),
(2, 'Riya', 'Verma', 'riya1904@gmail.com', '1904'),
(3, 'Astha', 'Kumari', 'asthakumariars123@gmail.com', 'QWERTY');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `thumbnail_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `subject`, `video_url`, `thumbnail_img`) VALUES
(1, 'AI Video1', 'AI', 'https://www.youtube.com/watch?v=MqffbpjhriQ&t=39s', 'assets/aivideo1.png'),
(2, 'AI Video2', 'AI', 'https://www.youtube.com/watch?v=JMUxmLyrhSk', 'assets/aivideo2.png'),
(3, 'AI Video 3\r\n', 'AI', 'https://www.youtube.com/watch?v=4jmsHaJ7xEA&list=PL9ooVrP1hQOGHNaCT7_fwe9AabjZI1RjI', 'assets/aivideo3.png'),
(4, 'Python Video1', 'Python', 'https://www.youtube.com/watch?v=t2_Q2BRzeEE&list=PLGjplNEQ1it8-0CmoljS5yeV-GlKSUEt0', 'assets/pythonvideo1.png'),
(5, 'Python Video2', 'Python', 'https://www.youtube.com/watch?v=OZIRAavoGng&list=PLjVLYmrlmjGcQfNj_SLlLV4Ytf39f8BF7', 'assets/pythonvideo2.png'),
(6, 'Python Video3', 'Python', 'https://www.youtube.com/watch?v=WGJJIrtnfpk', 'assets/pythonvideo3.png'),
(7, 'PHP Video1', 'PHP', 'https://www.youtube.com/watch?v=m52ljs78S24&list=PL0eyrZgxdwhwwQQZA79OzYwl5ewA7HQih', 'assets/phpvideo1.png'),
(8, 'PHP Video2', 'PHP', 'https://www.youtube.com/watch?v=6EukZDFE_Zg', 'assets/phpvideo2.png'),
(9, 'PHP Video3', 'PHP', 'https://www.youtube.com/watch?v=at19OmH2Bg4&list=PLu0W_9lII9aikXkRE0WxDt1vozo3hnmtR', 'assets/phpvideo3.png'),
(10, 'Big Data Video1', 'Big Data', 'https://www.youtube.com/watch?v=LOuAOZWJ9RA&list=PLxCzCOWd7aiHUUi6ZlansKbDw_cXut0El', 'assets/bigdatavideo1.png'),
(11, 'Big Data Video2', 'Big Data', 'https://www.youtube.com/watch?v=VYe4o_kHMZ8&list=PLo4m8hx3sbb_lclO7n9bDr35Y3TKf56w1', 'assets/bigdatavideo2.png'),
(12, 'Big Data Video3', 'Big Data', 'https://www.youtube.com/watch?v=rsOSrEbK7sU&list=PLLa_h7BriLH2UYJIO9oDoP3W-b6gQeA12', 'assets/bigdatavideo3.png'),
(13, 'Cyber Security Video1', 'Cyber Security', 'https://www.youtube.com/watch?v=DjrbxmXwbBc&list=PLxCzCOWd7aiGnXrHnMcFFPM4lUwQlR7ZT', 'assets/cybersecurityvideo1.png'),
(14, 'Cyber Security Video2', 'Cyber Security', 'https://www.youtube.com/watch?v=Wij5k7beGAY&list=PLHEcKKWWhXy-cq8HHTKRUwckqCMCa12N0', 'assets/cybersecurityvideo2.png'),
(15, 'Cyber Security Video3', 'Cyber Security', 'https://www.youtube.com/watch?v=lpa8uy4DyMo&list=PL9ooVrP1hQOGPQVeapGsJCktzIO4DtI4_', 'assets/cybersecurityvideo3.png'),
(16, 'Cloud Computing Video1.png', 'Cloud Computing', 'https://www.youtube.com/watch?v=2LaAJq1lB1Q&list=PL9ooVrP1hQOFtZ5oAAeOgi_nH-txMcDMu', 'assets/cloudcomputingvideo1.png'),
(17, 'Cloud Computing Video2', 'Cloud Computing', 'https://www.youtube.com/watch?v=M988_fsOSWo&list=PLEiEAq2VkUUIJ3o1tehvtux0_Ynf42CBN', 'assets/cloudcomputingvideo2.png'),
(18, 'Cloud Computing Video3', 'Cloud Computing', 'https://www.youtube.com/watch?v=RmuVkB3siYY&list=PLV8vIYTIdSnaKSiSGvJf2QquSN4lEzGob', 'assets/cloudcomputingvideo3.png'),
(19, 'Full Stack Development Video1', 'Full Stack Development', 'https://www.youtube.com/watch?v=l1EssrLxt7E&list=PLfqMhTWNBTe3H6c9OGXb5_6wcc1Mca52n', 'assets/fullstackdevelopmentvideo1.png'),
(20, 'Full Stack Development Video2', 'Full Stack Development', 'https://www.youtube.com/watch?v=bWACo_pvKxg&list=PLSDeUiTMfxW6VChKWb26Z_mPR4f6fAmMV', 'assets/fullstackdevelopmentvideo2.png'),
(21, 'Full Stack Development Video3', 'Full Stack Development', 'https://www.youtube.com/watch?v=EceJQ05KTf4&list=PLwoh6bBAszPrES-EOajos_E9gvRbL27wz', 'assets/fullstackdevelopmentvideo3.png'),
(22, 'C Video1', 'C', 'https://www.youtube.com/watch?v=8PopR3x-VMY&list=PL9ooVrP1hQOFrNo8jK9Yb2g2eMHz7hTu9', 'assets/cvideo1.png'),
(23, 'C Video2', 'C', 'https://www.youtube.com/watch?v=irqbmMNs2Bo&t=103s', 'assets/cvideo2.png'),
(24, 'C Video3', 'C', 'https://www.youtube.com/watch?v=ec-Cd4jKFWc&list=PLxCzCOWd7aiGmiGl_DOuRMJYG8tOVuapB', 'assets/cvideo3.png'),
(25, 'Java Video1', 'Java', 'https://www.youtube.com/watch?v=yRpLlJmRo2w&list=PLfqMhTWNBTe3LtFWcvwpqTkUSlB32kJop', 'assets/javavideo1.png'),
(26, 'Java Video1', 'Java', 'https://www.youtube.com/watch?v=YOVicRQ6QKE&list=PLqleLpAMfxGAdqZeY_4uVQOPCnAjhH-eT', 'assets/javavideo2.png'),
(27, 'Java Video3', 'Java', 'https://www.youtube.com/watch?v=BGTx91t8q50&list=PLsyeobzWxl7q6oUFts2erdot6jxF_lisP', 'assets/javavideo3.png'),
(28, 'Android Video1', 'Android', 'https://www.youtube.com/watch?v=ZLNO2c7nqjw&list=PL9ooVrP1hQOFUMO28LGDXqzdCeeo60sAL', 'assets/androidvideo1.png'),
(29, 'Android Video2', 'Android', 'https://www.youtube.com/watch?v=NLvaOL6Cm48&list=PL6Q9UqV2Sf1gHCHOKYLDofElSvxtRRXOR', 'assets/androidvideo2.png'),
(30, 'Android Video3', 'Android', 'https://www.youtube.com/watch?v=3Ri9PPsGCEg&list=PLQkwcJG4YTCTq1raTb5iMuxnEB06J1VHX', 'assets/androidvideo3.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76324;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
