-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2025 at 02:50 PM
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
-- Database: `morphed_rage`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender`, `receiver`, `message`, `timestamp`) VALUES
(85, 'astro@gmail.com', 'alrightbaba@gmail.com', 'Hi', '2023-01-19 21:41:39'),
(86, 'dd@gmail.com', 'alrightbaba@gmail.com', 'Hi', '2023-01-19 22:07:58'),
(87, 'dd@gmail.com', 'alrightbaba@gmail.com', 'Whatsup', '2023-01-20 03:32:33'),
(88, 'dd@gmail.com', 'chotapk@gmail.com', 'Hey', '2023-01-20 03:33:56'),
(89, 'dd@gmail.com', 'chotapk@gmail.com', 'Hi', '2023-01-20 03:39:45'),
(90, 'teddy@yahoo.com', 'alrightbaba@gmail.com', 'Hi\r\n', '2023-01-20 03:54:10'),
(91, 'teddy@yahoo.com', 'bigb@yahoo.com', 'Hi', '2023-01-20 05:26:21'),
(92, 'teddy@yahoo.com', 'tkumari783@gmail.com', 'Hey\r\n', '2023-01-20 05:30:11'),
(93, 'astro@gmail.com', 'roothhh@gmail.com', 'Hey', '2023-01-20 05:32:08'),
(94, 'astro@gmail.com', 'bigb@yahoo.com', 'Hi', '2023-01-20 05:40:08'),
(95, 'bigb@yahoo.com', 'astro@gmail.com', 'Hi', '2023-01-20 05:48:08'),
(96, 'bigb@yahoo.com', 'root10@outlook.com', 'Hi', '2023-01-20 06:01:44'),
(97, 'root10@gmail.com', 'bigb@yahoo.com', 'Hi', '2023-01-20 06:03:28'),
(98, 'bigb@yahoo.com', 'root10@outlook.com', 'Hi', '2023-01-20 06:04:05'),
(99, 'bigb@yahoo.com', 'root10@outlook.com', 'Hi\r\n', '2023-01-20 06:11:33'),
(100, 'astro@gmail.com', 'robin@gmail.com', 'Hey', '2023-01-20 06:21:37'),
(101, 'astro@gmail.com', 'c@gmail.com', 'Hi', '2023-01-20 06:22:07'),
(102, 'astrodude@gmail.com', 'astro@gmail.com', 'Hi', '2023-01-20 06:22:53'),
(103, 'astro@gmail.com', 'astrodude@gmail.com', 'Hi', '2023-01-20 06:23:11'),
(104, 'bigb@yahoo.com', 'root10@gmail.com', 'Hi', '2023-01-20 06:29:06'),
(105, 'astro@gmail.com', 'astrodude@gmail.com', 'Hi', '2023-01-20 07:06:31'),
(106, 'bigb@yahoo.com', 'root10@gmail.com', 'CU', '2023-01-20 07:06:44'),
(107, 'root10@gmail.com', 'bigb@yahoo.com', 'Okaye', '2023-01-20 07:07:00'),
(108, 'test1@gmail.com', 'alrightbaba@gmail.com', 'Jai ho ', '2023-01-20 07:19:08'),
(109, 'nitishk.mca25@nitp.ac.in', 'alrightbaba@gmail.com', 'hi babes whatsup\r\n', '2025-08-27 12:44:52');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `username` varchar(100) NOT NULL,
  `first name` char(100) DEFAULT NULL,
  `last name` char(100) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `dts` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`username`, `first name`, `last name`, `profile_pic`, `dts`) VALUES
('nitishk.mca25@nitp.ac.in', 'Nitish Kumar', 'Chanoria', NULL, '2025-08-27 18:15:19');

-- --------------------------------------------------------

--
-- Table structure for table `security_q`
--

CREATE TABLE `security_q` (
  `username` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `best_friend` varchar(255) NOT NULL,
  `father's_first_name` varchar(255) NOT NULL,
  `1st_school` varchar(255) NOT NULL,
  `fav_color` varchar(255) NOT NULL,
  `fav_fruit` varchar(255) NOT NULL,
  `fav_sweet` varchar(255) NOT NULL,
  `stage_name` varchar(255) NOT NULL,
  `pin_code` int(11) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `security_q`
--

INSERT INTO `security_q` (`username`, `nickname`, `best_friend`, `father's_first_name`, `1st_school`, `fav_color`, `fav_fruit`, `fav_sweet`, `stage_name`, `pin_code`, `country`) VALUES
('astro@gmail.com ', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 1, 'A'),
('dd@gmail.com ', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 1, 'A'),
('Kl@gmail.com ', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 1, 'A'),
('project420CS@gmail.com ', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 1, 'A'),
('srk@gmail.com ', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 1, 'A'),
('test1@gmail.com ', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 1, 'A'),
('tkumari783@gmail.com ', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 1, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno.` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `dt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno.`, `username`, `password`, `dt`) VALUES
(9, 'naveenkumar9817921804@gmail.com', '$2y$10$wwPAIhIr40IIafCSnqgoI.YkoH0/HveuEgXAz15XHta0iVJnJAB2O', '2022-11-27 15:16:03'),
(14, 'project420CS@gmail.com', '$2y$10$/1KHIYYowCK8U7rpMZEenORvN2KAPKq4gnpuSIqnjpBmsNYneBsDG', '2022-11-27 17:13:32'),
(20, 'Kl@gmail.com', '$2y$10$m9ySDpYdQZnV1Q4TaCYgUeMjDcE2wTYbBJHlSaLPfTAEcBYs6hZVi', '2022-12-30 04:59:39'),
(21, 'tkumari783@gmail.com', '$2y$10$W9zKJ0aZ613qhpmZpLTmsu63jZ7ItDa3Hc3Zqs0P8mFO2btl32G/6', '2023-01-15 14:17:23'),
(22, 'x@outlook.com', '$2y$10$yVJeqKWLhO6lXWRKKYGn/.q.OnDGw4USTL8J/6d4tatdLQFBixdnK', '2023-01-17 07:38:03'),
(24, 'pk@gmail.com', '$2y$10$LA5Yef.ISnaKJl5gKLt5GORYq9.EPi7dfaX3EG.2bdjd2hqg.3y2i', '2023-01-17 08:45:49'),
(25, 'srk@gmail.com', '$2y$10$ZT7PcSYOMoNaosqUTPUxb.oKf4WJbsii7u565EGJT38HlnGjdGkBW', '2023-01-17 09:57:10'),
(26, 'roothhh@gmail.com', '$2y$10$FA7KByhYVIsqB75lUhQH1u3X9g/tGNuGzfA1YnDwGTzMQ4Xj7yRAK', '2023-01-17 19:35:31'),
(27, 'root@gmail.com', '$2y$10$q3Ouo2HnorKFpZv8wcYwke.O8YVMQ3SKcOkLZt1y5ZK724TwGwPoC', '2023-01-17 19:36:18'),
(28, 'root@outlook.com', '$2y$10$X7usauyKz2j84ezQP86uZeek/g/1nqMm.goR9lAUlt/flkYV2CyPO', '2023-01-17 19:37:44'),
(29, 'root1@outlook.com', '$2y$10$NTp73WcN2TnIv8Hf5KPC9uLBar82aPJykdaNXNlj.rhcYiId0svn2', '2023-01-17 19:39:04'),
(30, 'root3@outlook.com', '$2y$10$6/7SVAFKKb7345qapEc/6.BjVYC/K8DKPg8JH1mZFQ8BDUv94I27.', '2023-01-17 19:43:51'),
(31, 'root4@outlook.com', '$2y$10$I.Rdq3NdgzrulCE/1vJRA.wT5aYJqwDNgZziHVfF/vgCYVIKKi0kq', '2023-01-17 19:45:07'),
(32, 'root5@outlook.com', '$2y$10$yyRj5pu0FYvwToFpl0ZgjeT6NeFrpaniOIK.KHHbcRVLA8tLQ9Xpa', '2023-01-17 19:46:05'),
(33, 'root6@outlook.com', '$2y$10$SkbdsvjBT.iUtRvpaeNpReRojraqPjhe0UQBD2xvay7xJf8LvWyCW', '2023-01-17 19:47:16'),
(34, 'root7@outlook.com', '$2y$10$rcRradjqbeTVtka8XYSO6.Nx1XHMqUrM/iJ9yDDK0Kya8rjB58dQe', '2023-01-17 19:48:13'),
(35, 'root8@outlook.com', '$2y$10$AKJJERLZ6QxtKH3yyS4ki.rJN30RZ4ggvweE7o4WnqrxVsccZINw2', '2023-01-17 19:48:21'),
(36, 'root9@outlook.com', '$2y$10$ZwvMbaydROUlSh9k2uhfcONzf9NlAfxvysZaBJNXsK/MUuFPAg89.', '2023-01-17 19:49:24'),
(37, 'root10@outlook.com', '$2y$10$gL.dOnpIlbQDJdkbczOqqux0nxjUcfsmkygMstJic/1gAWPq0D6Oq', '2023-01-17 19:49:47'),
(38, 'root1@gmail.com', '$2y$10$3ZFJXpdP38S0jcr4eyu5PO8iL72oYDd8vKWQR7JcQLoIEXllWjBCO', '2023-01-17 19:50:06'),
(39, 'root2@gmail.com', '$2y$10$woK.SHDcLcq74zHdwX5/3u7RFi5FPUwbibkdvmyk1UGAOSmRD7HSW', '2023-01-17 19:51:07'),
(40, 'root3@gmail.com', '$2y$10$fGYLWppgzt3XjPWqmjjriePEITM11CCNuAaXWJXcr3NHLEgVxA1w6', '2023-01-17 19:51:19'),
(41, 'root4@gmail.com', '$2y$10$b4SdfDnWRNz5VllIw6PMN.ZmWNEQFB8dQBjZo9EVXeaj/UlK46DYS', '2023-01-17 19:52:09'),
(42, 'root5@gmail.com', '$2y$10$mIXZo9B8M0/EOgspqZugs.wuDIUEFL.36sDg7.2x1CcB95DQHk44e', '2023-01-17 19:53:13'),
(43, 'root6@gmail.com', '$2y$10$qkTpdPyk5iaoRCcT25iqye3npoygbMhr1YJrTVc/w462sTyFt2ycK', '2023-01-17 19:53:21'),
(44, 'root7@gmail.com', '$2y$10$gb2dJKGUjrVC0F/E.1iID.yPhD6NAlMqDM.AN2dLTOJ7bc0SI3QXO', '2023-01-17 19:54:51'),
(45, 'root8@gmail.com', '$2y$10$S67h13raXsHt34auxiQdnePq7lhNDnnqS8KOZLtjsz2y324GGpvq6', '2023-01-17 19:55:01'),
(46, 'root9@gmail.com', '$2y$10$2pV9zZ7a.2HWsi0uvc98EOCA8NxOIHs1fwfiwzW8B5zP.4waBXOi6', '2023-01-17 19:55:15'),
(47, 'root10@gmail.com', '$2y$10$4i9L/j6JlOTmCgMz8Pxgy.9rGa9Rcw6L6fQAePsCpeAT9v7fFe7sK', '2023-01-17 19:55:29'),
(48, 'robin@gmail.com', '$2y$10$H8vXMC28S5pK8LzGR8rn4OSgEoxWEb8rmtIqM/Bpw8UsNB4CyrxSC', '2023-01-17 19:55:42'),
(49, 'astro@gmail.com', '$2y$10$GAQoYMqq/9cltmh6jxWstOJouKHO3JY3RTGJHfiuTfAwQ2EMAedIS', '2023-01-17 19:57:13'),
(50, 'dude@gmail.com', '$2y$10$NG4yqrvGvcdIWXfEQ8SaRu/DLR4yIqQwc3rXknWoaBontG6.6uJCi', '2023-01-17 19:58:42'),
(51, 'astrodude@gmail.com', '$2y$10$fl54/i4Do9wsSYCVXb41YeDOH3ZGhPWeAJStGDRymjQTm1Uc/eiLS', '2023-01-17 20:00:36'),
(52, 'c@gmail.com', '$2y$10$ScgUK4lnhkfeKIvkPr8PwOe.7x1cYQCdLKqIjGUqy0y/4drmM72hC', '2023-01-17 20:01:56'),
(53, 'chotapk@gmail.com', '$2y$10$qcEjVohEU18j3NzwA0TFte4XCl/UOTYdReuz..m/9Tf.ryi.v/6Aa', '2023-01-18 11:36:59'),
(54, 'pkmora@gmail.com', '$2y$10$C25l9HkthXpDzh5d7sHFkOX.J1dtofIRuMHyyl7NATelktQrrfB.m', '2023-01-18 11:50:12'),
(55, 'alrightbaba@gmail.com', '$2y$10$rGkd5ve8KbRenkDOZbiESusvDh1U5CEBHGPYTjXZ2aL6grooSnVXO', '2023-01-19 21:12:25'),
(56, 'bigb@yahoo.com', '$2y$10$X31tEEtGcpGZGWfsu7EdheuqEW4ktCp4mcFX2gKcbyvzbXMNxqgkG', '2023-01-19 21:17:35'),
(57, 'dd@gmail.com', '$2y$10$kOABsoSY8PK6AfLKJPzIMOWKH5ev8/s5zIQ/RBwXQTzOH0TLcCJxi', '2023-01-19 22:06:09'),
(58, 'teddy@yahoo.com', '$2y$10$Kn10/uf1MbQckzFfqh28l.9PVzHwfdGj8sF8Lr7ianiaJUKv9lbcO', '2023-01-20 03:45:27'),
(59, 'test1@gmail.com', '$2y$10$NOgLUQzgYyoyTuv7Y25GBOttc90iWmR2PVahFR3JxTGfriFQOgz9S', '2023-01-20 07:13:15'),
(60, 'test2@gmail.com', '$2y$10$pq.BpRCRDboHcSD/5GcgmeJzGyHLqs4DK6oygd7ZXox2T09nR43U6', '2023-01-20 07:50:47'),
(61, 'test3@gmail.com', '$2y$10$ljHrKWE2sRiIUNEWVUTNg.rH5I/Wi9Ba0cFqCm1ujIY0BgKMy1wK6', '2023-01-20 08:03:42'),
(62, 'nitishk.mca25@nitp.ac.in', '$2y$10$TlNJjgIJ1IU0SnrQXGZ1K.Rg7mvI/l4Z6f9EuW3Yy3rGgi4neYgFS', '2025-08-27 12:41:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `security_q`
--
ALTER TABLE `security_q`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno.`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno.` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
