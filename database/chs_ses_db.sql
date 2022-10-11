-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2022 at 02:33 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chs_ses_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `exam_table`
--

CREATE TABLE `exam_table` (
  `exam_id` int(255) NOT NULL,
  `exam_title` varchar(255) NOT NULL,
  `exam_time_limit` varchar(255) NOT NULL,
  `exam_description` varchar(255) NOT NULL,
  `exam_timestamp` date NOT NULL DEFAULT current_timestamp(),
  `exam_status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exam_table`
--

INSERT INTO `exam_table` (`exam_id`, `exam_title`, `exam_time_limit`, `exam_description`, `exam_timestamp`, `exam_status`) VALUES
(1, 'sample', '60', 'sample description sample description', '2022-07-30', 0),
(7, 'Entrance examination 2022', '40', 'sample description for entrance examination 2022', '2022-07-31', 0),
(10, 'August Exam', '1', 'August Exam', '2022-08-29', 0),
(11, 'Exam Title Test', '30', 'This is just a test exam 09-10-2022', '2022-09-10', 0),
(12, 'exam test', '60', 'sample examination september 16', '2022-09-16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(255) NOT NULL,
  `exam_id_fk` int(255) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `question_choice1` varchar(1000) NOT NULL,
  `question_choice2` varchar(1000) NOT NULL,
  `question_choice3` varchar(1000) NOT NULL,
  `question_choice4` varchar(1000) NOT NULL,
  `question_answer` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `exam_id_fk`, `question`, `question_choice1`, `question_choice2`, `question_choice3`, `question_choice4`, `question_answer`) VALUES
(1, 7, 'A father gave $500 to his two sons. He gave X dollars to one son. Which of the following expressions correctly shows the amount he gave to the other son.', '$500 + X', '$500 ÷ X', '$500 x X', '$500 - X', '$500 - X'),
(2, 7, 'Solve X where 5X = 20.', '4', '5', '10', '15', '4'),
(5, 7, 'If X equals 5, what is the value of 6X + 2X - X?', '25', '30', '35', '40', '35'),
(6, 7, 'Which is an even number here?', '3', '9', '5', '6', '6'),
(12, 1, 'V = bdt. Solve the formula for d.', 'd = b/tv', 'd = t/bv', 'd = vbt', 'd = v/bt', 'd = v/bt'),
(13, 1, '- 3 + (-14) =', '11', '-11', '-17', '-42', '-17'),
(14, 1, 'Factor the polynomial 5x - 15. ', 'x = 5', '5(x - 3)', 'x - 3', '5x - 3(5)', '5(x - 3)'),
(15, 1, 'Find 3 consecutive numbers such that 3 times the first is equal to 8 more than the sum of the other two.', '8, 9, 10', '9, 10, 11', '11, 12, 13', '12, 13, 14', '11, 12, 13'),
(16, 7, 'What is 1 + 1?', '2', '3', '4', '5', '2'),
(17, 10, 'What is 1 + 3', '4', '1', '3', '5', '4'),
(21, 12, '1 + 3 = ?', '4', '5', '6', '7', '4'),
(31, 12, '2 + 2 = ?', '1', '2', '3', '4', '4'),
(32, 12, '1 + 1 = ?', '1', '2', '3', '4', '2');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `result_id` int(255) NOT NULL,
  `student_id_fk` int(255) NOT NULL,
  `exam_id_fk` int(255) NOT NULL,
  `question_id_fk` int(255) NOT NULL,
  `result_answer` varchar(1000) NOT NULL,
  `result_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`result_id`, `student_id_fk`, `exam_id_fk`, `question_id_fk`, `result_answer`, `result_date`) VALUES
(1, 11, 12, 21, '4', '2022-09-21 08:20:49'),
(2, 11, 12, 31, '4', '2022-09-21 08:20:49'),
(3, 11, 12, 32, '1', '2022-09-21 08:20:49');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `middle_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `student_password` varchar(255) NOT NULL,
  `student_status` enum('Active','Inactive','','') NOT NULL,
  `exam_attempt` enum('0','1','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `first_name`, `middle_name`, `last_name`, `mobile_number`, `email_address`, `student_password`, `student_status`, `exam_attempt`) VALUES
(1, 'Joyce', 'Hopper', 'Byers', '09203394758', 'joycehb123@yahoo.com', 'joycehb123', 'Active', '0'),
(4, 'Steve', 'Robin', 'Harrington', '09203847581', 'StevelovesRobin@gmail.com', 'ZEmaAPRB', 'Active', '0'),
(10, 'Galadriel', 'Woods', 'Lothlorien', '12345678901', 'galadriel_wl@yahoo.com', 'galadriel123', 'Active', '0'),
(11, 'Rick', 'Scientist', 'Sanchez', '09202354159', 'rickandmorty@yahoo.com', 'sM8PmKH5', 'Active', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','teacher','admin','') NOT NULL,
  `user_status` enum('Active','Deactivated') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `role`, `user_status`) VALUES
(1, 'administrator', 'adminis_traitor', 'admin', 'Active'),
(2, 'Onizuka1', 'greatTeacher1', 'teacher', 'Active');

-- --------------------------------------------------------

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exam_table`
--
ALTER TABLE `exam_table`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exam_table`
--
ALTER TABLE `exam_table`
  MODIFY `exam_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `result_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
