-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2015 at 06:42 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `course_repository`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(10) UNSIGNED NOT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `course_descript` varchar(500) DEFAULT NULL,
  `lec_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `fi_name` varchar(30) NOT NULL,
  `course_prereq` varchar(100) NOT NULL,
  `course_code` varchar(20) NOT NULL,
  `credit_hr` int(11) DEFAULT NULL,
  `semester` varchar(20) DEFAULT NULL,
  `year` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `course_dept` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_descript`, `lec_name`, `fi_name`, `course_prereq`, `course_code`, `credit_hr`, `semester`, `year`, `course_dept`) VALUES
(1, 'calculus 1', ' A mathematics course.', '', '', '', '', 4, '', '0', ''),
(2, 'calculus 1', ' A mathematics course.', '', '', '', '', 4, 'Fall', '0', 'on'),
(3, 'Written & Oral Communication', 'Effective communication and writing seminar. ', '', '', '', '', 4, 'Spring', '0', 'on'),
(4, 'Social Theory', ' Theory of our socialization', '', '', '', '', 4, 'Fall', '0', 'on'),
(5, 'Software Engineering', ' This course is primarily focused on the documentation and inquiry processes the software engineers go through when developing a software.', '', '', '', '', 0, 'Fouzi Mpuni', '4', ''),
(10, 'Operating Systems', ' This course is primarily focused on the documentation and inquiry processes the software engineers go through when developing a software.', 'Mr. Aelaf Dafla', 'Fouzi Mpuni', 'c_preq', 'c_cd', 4, 'Summer', 'on', 'on'),
(11, 'Operating Systems', ' This course is primarily focused on the documentation and inquiry processes the software engineers go through when developing a software.', 'Mr. Aelaf Dafla', 'Fouzi Mpuni', 'Web Technology', 'CS - 402', 4, 'Summer', 'on', 'on'),
(12, 'GVV', 'Giving Voice to Value', 'Mr. Awuah', 'Henry Kwame', 'None', 'LED - 001', 1, 'Spring', 'on', 'on'),
(13, 'GVV', 'Giving Voice to Value', 'Mr. Awuah', 'Henry Kwame', 'None', 'LED - 001', 1, 'Spring', 'on', 'on'),
(14, 'GVV', 'Giving Voice to Value', 'Mr. Awuah', 'Henry Kwame', 'None', 'LED - 001', 1, 'Spring', 'on', 'on'),
(15, 'Man ', ' You and Me', 'Mr. Ibu', 'Paw Paw', 'tradition', 'CD - 12', 2, 'Spring', 'on', 'on'),
(16, 'Man ', ' You and Me', 'Mr. Ibu', 'Paw Paw', 'tradition', 'CD - 12', 2, 'Spring', '3', 'on'),
(17, 'Man ', ' You and Me', 'Mr. Ibu', 'Paw Paw', 'tradition', 'CD - 12', 2, 'Spring', '3', 'on'),
(18, 'Theology', ' A study about the word of God, the Holy Bible. ', 'Rev. Steve Buchele', 'Nana Osei', 'Religion', 'Buc - 123', 4, 'Spring', 'Sophomore', 'Art and Science'),
(19, 'Theology', ' A study about the word of God, the Holy Bible. ', 'Rev. Steve Buchele', 'Nana Osei', 'Religion', 'Buc - 123', 0, 'Spring', 'Sophomore', 'Art and Science'),
(20, 'Theology', ' A study about the word of God, the Holy Bible. ', 'Rev. Steve Buchele', 'Nana Osei', 'Religion', 'Buc - 123', 0, 'Spring', 'Sophomore', 'Art and Science'),
(21, 'Theology', ' A study about the word of God, the Holy Bible. ', 'Rev. Steve Buchele', 'Nana Osei', 'Religion', 'Buc - 123', 0, 'Spring', 'Sophomore', 'Art and Science'),
(22, 'Theology', ' A study about the word of God, the Holy Bible. ', 'Rev. Steve Buchele', 'Nana Osei', 'Religion', 'Buc - 123', 0, 'Spring', 'Sophomore', 'Art and Science'),
(23, 'Theology', ' A study about the word of God, the Holy Bible. ', 'Rev. Steve Buchele', 'Nana Osei', 'Religion', 'Buc - 123', 0, 'Spring', 'Sophomore', 'Art and Science'),
(24, 'Theology', ' A study about the word of God, the Holy Bible. ', 'Rev. Steve Buchele', 'Nana Osei', 'Religion', 'Buc - 123', 0, 'Spring', 'Sophomore', 'Art and Science'),
(25, 'Accounting', ' financial accounting', 'Papa T', 'Berikisu', 'Pre Calculus 1', 'BUSA 102', 4, 'Fall', 'Sophomore', 'Business Administration'),
(26, 'Physical education', 'Body Fitness ', 'Mr. Zonah', 'Papee', 'Aerobic', 'BAC 103', 3, 'Fall', 'Junior', ''),
(27, 'Physical education', 'Body Fitness ', 'Mr. Zonah', 'Papee', 'Aerobic', 'BAC 103', 3, 'Fall', 'Junior', 'Art and Science'),
(28, 'Physical education', 'Body Fitness ', 'Mr. Zonah', 'Papee', 'Aerobic', 'BAC 103', 3, 'Fall', 'Junior', 'Art and Science'),
(29, 'Physical education', 'Body Fitness ', 'Mr. Zonah', 'Papee', 'Aerobic', 'BAC 103', 3, 'Fall', 'Junior', 'Art and Science'),
(30, 'Physical education', 'Body Fitness ', 'Mr. Zonah', 'Papee', 'Aerobic', 'BAC 103', 3, 'Fall', 'Junior', 'Art and Science');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
