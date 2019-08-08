-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 06, 2019 at 04:48 PM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_comp`
--

-- --------------------------------------------------------

--
-- Table structure for table `component-dimension-relationship`
--

CREATE TABLE `component-dimension-relationship` (
  `id` int(50) NOT NULL,
  `component_id` varchar(50) DEFAULT NULL,
  `dimension_id` varchar(50) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `component-dimension-relationship`
--

INSERT INTO `component-dimension-relationship` (`id`, `component_id`, `dimension_id`, `created_date`) VALUES
(1, '1', 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `components`
--

CREATE TABLE `components` (
  `id` int(50) NOT NULL,
  `component_name` varchar(1000) DEFAULT NULL,
  `component_image` varchar(1000) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `components`
--

INSERT INTO `components` (`id`, `component_name`, `component_image`, `created_date`) VALUES
(1, 'Tyre', '934209498.jpg', '2019-08-06 16:34:18');

-- --------------------------------------------------------

--
-- Table structure for table `dimensions`
--

CREATE TABLE `dimensions` (
  `id` int(50) NOT NULL,
  `dimension_name` varchar(1000) DEFAULT NULL,
  `dimension_type` varchar(1000) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dimensions`
--

INSERT INTO `dimensions` (`id`, `dimension_name`, `dimension_type`, `created_date`) VALUES
(1, 'Rear', NULL, '2019-08-06 16:36:32'),
(2, 'Front', NULL, '2019-08-06 16:36:42');

-- --------------------------------------------------------

--
-- Table structure for table `project-template-relationship`
--

CREATE TABLE `project-template-relationship` (
  `id` int(50) NOT NULL,
  `project_id` int(50) DEFAULT NULL,
  `template_id` int(50) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project-template-relationship`
--

INSERT INTO `project-template-relationship` (`id`, `project_id`, `template_id`, `created_date`) VALUES
(1, 1, 1, '2019-08-06 16:46:03');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(50) NOT NULL,
  `project_name` varchar(1000) DEFAULT NULL,
  `project_image` varchar(1000) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `project_image`, `created_date`) VALUES
(1, 'Cars', NULL, '2019-08-06 16:32:26');

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id` int(50) NOT NULL,
  `template_title` varchar(1000) DEFAULT NULL,
  `component_order` longtext,
  `component_list` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `template_title`, `component_order`, `component_list`) VALUES
(1, '', 'a:1:{i:0;s:1:\"1\";}', 'a:2:{i:0;s:0:\"\";i:1;a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `component-dimension-relationship`
--
ALTER TABLE `component-dimension-relationship`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `components`
--
ALTER TABLE `components`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dimensions`
--
ALTER TABLE `dimensions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project-template-relationship`
--
ALTER TABLE `project-template-relationship`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `component-dimension-relationship`
--
ALTER TABLE `component-dimension-relationship`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `components`
--
ALTER TABLE `components`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dimensions`
--
ALTER TABLE `dimensions`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `project-template-relationship`
--
ALTER TABLE `project-template-relationship`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
