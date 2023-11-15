-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2023 at 10:03 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ensertest`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `assignment_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `a_title` varchar(10) NOT NULL,
  `a_points` int(5) NOT NULL,
  `a_date` varchar(20) NOT NULL,
  `a_requirements` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`assignment_id`, `class_id`, `a_title`, `a_points`, `a_date`, `a_requirements`) VALUES
(1, 2, 'test', 200, '11/23/23', 'This is a test assignment');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(10) NOT NULL,
  `course_name` varchar(20) NOT NULL,
  `course_desc` varchar(250) DEFAULT NULL,
  `Location` varchar(50) NOT NULL,
  `Instructor` varchar(20) NOT NULL,
  `skills_learned` varchar(100) NOT NULL,
  `course_image` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `course_name`, `course_desc`, `Location`, `Instructor`, `skills_learned`, `course_image`) VALUES
(2, 'CS210', 'This is a simple computer Science couse', 'Mauricio Rodriguez', 'Moscow,ID', 'Computing, Skills', 'classimg/Makijjb_V1.png'),
(3, 'CS210', 'This is a simple computer Science couse', 'Moscow,ID', 'Mauricio Rodriguez', 'Computing, Skills', 'classimg/csclass.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `project_name` varchar(20) NOT NULL,
  `project_desc` varchar(250) NOT NULL,
  `project_loc` varchar(20) NOT NULL,
  `project_stakeholder` varchar(20) NOT NULL,
  `project_skills` varchar(20) NOT NULL,
  `project_img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `project_desc`, `project_loc`, `project_stakeholder`, `project_skills`, `project_img`) VALUES
(1, 'test', 'test', 'test', 'test', 'test', 'projectimg/Classroom.jpg'),
(2, 'test', 'test', 'test', 'test', 'test', 'projectimg/Classroom.jpg'),
(3, 'test', 'test', 'test', 'test', 'test', 'projectimg/Classroom.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `stakeholders`
--

CREATE TABLE `stakeholders` (
  `id` int(11) NOT NULL,
  `stakeholder_username` varchar(50) NOT NULL,
  `stakeholder_first` varchar(50) NOT NULL,
  `stakeholder_last` varchar(50) NOT NULL,
  `stakeholder_email` varchar(50) NOT NULL,
  `stakeholder_sex` varchar(10) DEFAULT NULL,
  `stakeholder_state` varchar(50) DEFAULT NULL,
  `stakeholder_town` varchar(50) DEFAULT NULL,
  `stakeholder_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stakeholders`
--

INSERT INTO `stakeholders` (`id`, `stakeholder_username`, `stakeholder_first`, `stakeholder_last`, `stakeholder_email`, `stakeholder_sex`, `stakeholder_state`, `stakeholder_town`, `stakeholder_password`) VALUES
(1, 'MR', 'mauricio.rodriguez5450@gmail.com', 'M', 'mauricio.rodriguez5450@gmail.com', 'Male', 'Idaho', 'TwinFalls', '49f68a5c8493ec2c0bf489821c21fc3b');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `student_username` varchar(50) NOT NULL,
  `student_first` varchar(50) NOT NULL,
  `student_last` varchar(50) NOT NULL,
  `student_email` varchar(50) NOT NULL,
  `student_sex` varchar(10) DEFAULT NULL,
  `student_state` varchar(50) DEFAULT NULL,
  `student_town` varchar(50) DEFAULT NULL,
  `student_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_username`, `student_first`, `student_last`, `student_email`, `student_sex`, `student_state`, `student_town`, `student_password`) VALUES
(1, 'MER', 'REM', 'M', 'REM', 'Male', 'Idaho', 'TwinFalls', '49f68a5c8493ec2c0bf489821c21fc3b');

-- --------------------------------------------------------

--
-- Table structure for table `syllabus`
--

CREATE TABLE `syllabus` (
  `syllabus_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `class_name` varchar(50) DEFAULT NULL,
  `class_desc` varchar(250) DEFAULT NULL,
  `class_start_date` varchar(10) DEFAULT NULL,
  `class_enddate` varchar(10) DEFAULT NULL,
  `Grading Scheme` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `syllabus`
--

INSERT INTO `syllabus` (`syllabus_id`, `class_id`, `class_name`, `class_desc`, `class_start_date`, `class_enddate`, `Grading Scheme`) VALUES
(1, 2, 'CS210', 'This is a class wher', '9/20/23', '12/7/23', 'A-100-90 B-89-80 C-79-70');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `teacher_username` varchar(25) NOT NULL,
  `teacher_first` varchar(25) NOT NULL,
  `teacher_last` varchar(25) NOT NULL,
  `teacher_email` varchar(50) NOT NULL,
  `teacher_password` varchar(50) NOT NULL,
  `teacher_sex` varchar(10) DEFAULT NULL,
  `teacher_state` varchar(10) DEFAULT NULL,
  `teacher_town` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `teacher_username`, `teacher_first`, `teacher_last`, `teacher_email`, `teacher_password`, `teacher_sex`, `teacher_state`, `teacher_town`) VALUES
(1, 'MR', 'REM', 'M', 'REM', '49f68a5c8493ec2c0bf489821c21fc3b', NULL, 'Idaho', 'TwinFalls'),
(2, 'RM', 'REM', 'M', 'REM', '49f68a5c8493ec2c0bf489821c21fc3b', 'Male', 'Idaho', 'TwinFalls');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`assignment_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stakeholders`
--
ALTER TABLE `stakeholders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `syllabus`
--
ALTER TABLE `syllabus`
  ADD PRIMARY KEY (`syllabus_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stakeholders`
--
ALTER TABLE `stakeholders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `syllabus`
--
ALTER TABLE `syllabus`
  MODIFY `syllabus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
