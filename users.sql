-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2017 at 02:07 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `p.o.s_berhasil`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'maryadi Admin', 'maryadi071@gmail.com', '$2y$10$z8PdiycCTYY8w4RZt013A.Ndlsx8pOo8PqNSj5iibBX12lTBYGni6', 'admin', '25Ap1YU6Wbsy4Ii2KqfTnIh0R3tpKlJOJoiOabERr7DpP16XcNI0mauBTKM9', '2017-03-18 22:22:53', '2017-03-18 22:22:53'),
(2, 'operator1', 'operator@gmail.com', '$2y$10$2RfymnyTqa36hNfeDwffjedjkIRMD3YJK.cEevHjPhqOQnCzQLRHq', 'operator', 'OMz9yA7BSu8kiq7Y7NJ8Dw1kmkwK1f2aPQX9lgKqVtHp8lFBev5bUpJSZb6w', '2017-03-18 22:27:53', '2017-03-18 22:27:53'),
(3, 'maryadi operator', 'maryadioperator@gmal.com', '$2y$10$SFFwAcQc38IPXs2L4a/qR.o9mYuHLBq8PagW3dFZ8yv3F1Op81dkC', 'operator', 'XPOuC076HZacvGSUZHCemJErmZCBT2pwHphMjWmIecnYhJ2Bvf40xnhyRx2F', '2017-03-21 06:37:25', '2017-03-21 06:37:25'),
(4, 'maryadi operator2', 'maryadioperator2@gmal.com', '$2y$10$wbMd.scUg/.H1VPICUwXte46eGykutSGhw1pY56swyYY9VFIMqub.', 'operator', 'Tfj987ym2KvH9T1HjZGeivtvW08b16eJlTBKxpaR9iQP5N6SZIEBeaUo2MVm', '2017-03-21 06:39:54', '2017-03-21 06:39:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
