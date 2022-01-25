-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2019 at 12:52 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ivplanner`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_id` int(7) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email_id` varchar(25) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `name`, `email_id`, `password`) VALUES
(1, 'Mark Twain', 'admin@gmail.com', 'adminpass'),
(2, 'admin2', 'admin2@gmail.com', 'admin007'),
(3, 'Mohil', 'mohiltanti7@gmail.com', 'mohil'),
(4, 'Mahesh', 'mchhayani@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `a_id` int(7) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email_id` varchar(25) NOT NULL,
  `password` varchar(10) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `company_name` varchar(25) NOT NULL,
  `f_id` int(7) DEFAULT NULL,
  `visit_id` int(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`a_id`, `name`, `email_id`, `password`, `mobile_no`, `company_name`, `f_id`, `visit_id`) VALUES
(1, 'agent7', 'agent@gmail.com', 'agentpass', '7268217695', 'ABC Pvt. Ltd.', 2, 1),
(2, 'Agent2', 'agent2@gmail.com', '@gent2', '9652387411', 'DEG', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `approvals`
--

CREATE TABLE `approvals` (
  `ap_id` int(7) NOT NULL,
  `f_id` int(7) NOT NULL,
  `c_id` int(7) NOT NULL,
  `visit_id` int(7) NOT NULL,
  `status` varchar(12) NOT NULL DEFAULT 'pending',
  `students` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approvals`
--

INSERT INTO `approvals` (`ap_id`, `f_id`, `c_id`, `visit_id`, `status`, `students`) VALUES
(1, 2, 1, 1, 'pending', 150);

-- --------------------------------------------------------

--
-- Table structure for table `blacklist`
--

CREATE TABLE `blacklist` (
  `blacklist_id` int(7) NOT NULL,
  `visit` varchar(15) NOT NULL,
  `year` int(4) NOT NULL,
  `remarks` varchar(500) NOT NULL,
  `student_id` int(11) NOT NULL,
  `f_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blacklist`
--

INSERT INTO `blacklist` (`blacklist_id`, `visit`, `year`, `remarks`, `student_id`, `f_id`) VALUES
(1, 'Bangalore', 2017, 'Lorem Ipsum', 1, 1),
(4, 'Pune', 2018, 'Lorem Ipsum', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bonafide`
--

CREATE TABLE `bonafide` (
  `bonafide_id` int(7) NOT NULL,
  `docs` binary(200) NOT NULL,
  `f_id` int(7) NOT NULL,
  `class` varchar(3) NOT NULL,
  `semester` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bonafide`
--

INSERT INTO `bonafide` (`bonafide_id`, `docs`, `f_id`, `class`, `semester`) VALUES
(1, 0x0000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000, 1, 'c1', 7);

-- --------------------------------------------------------

--
-- Table structure for table `company_person`
--

CREATE TABLE `company_person` (
  `c_id` int(7) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email_id` varchar(25) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `password` varchar(12) NOT NULL,
  `company_name` varchar(25) NOT NULL,
  `company_city` varchar(10) NOT NULL,
  `visit_activities` varchar(250) NOT NULL,
  `rules & regulations` varchar(250) NOT NULL,
  `branch` varchar(10) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_person`
--

INSERT INTO `company_person` (`c_id`, `name`, `email_id`, `mobile_no`, `password`, `company_name`, `company_city`, `visit_activities`, `rules & regulations`, `branch`, `start_date`, `end_date`) VALUES
(1, 'William Oaks', 'company@gmail.com', '9855236425', 'companypass', 'BSNL', 'Bangalore', ' Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typ', ' Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typ', 'CE', '2019-01-24', '2019-01-28');

-- --------------------------------------------------------

--
-- Table structure for table `connect`
--

CREATE TABLE `connect` (
  `connect_id` int(7) NOT NULL,
  `f_id` int(7) NOT NULL,
  `student_id` int(11) NOT NULL,
  `p_id` int(7) NOT NULL,
  `a_id` int(7) NOT NULL,
  `insurance_id` int(7) NOT NULL,
  `visit_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `connect`
--

INSERT INTO `connect` (`connect_id`, `f_id`, `student_id`, `p_id`, `a_id`, `insurance_id`, `visit_id`) VALUES
(1, 1, 2, 1, 1, 1, 1),
(2, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `coordinator`
--

CREATE TABLE `coordinator` (
  `coordinator_id` int(7) NOT NULL,
  `name` varchar(25) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `email_id` varchar(25) NOT NULL,
  `class` varchar(3) DEFAULT NULL,
  `designation` varchar(9) NOT NULL,
  `f_id` int(7) NOT NULL,
  `payment_id` int(7) DEFAULT NULL,
  `visit_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coordinator`
--

INSERT INTO `coordinator` (`coordinator_id`, `name`, `mobile_no`, `email_id`, `class`, `designation`, `f_id`, `payment_id`, `visit_id`) VALUES
(1, 'Coordinator', '9854123675', 'coordinator@gmail.com', 'c1', 'student', 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `f_id` int(7) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email_id` varchar(25) NOT NULL,
  `institute_email_id` varchar(25) NOT NULL,
  `password` varchar(12) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `college` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`f_id`, `name`, `email_id`, `institute_email_id`, `password`, `gender`, `mobile_no`, `college`) VALUES
(1, 'John Doe', 'faculty@gmail.com', 'faculty@institute.com', 'facultypass', 'M', '986325147', 'MEFGI-FOE'),
(2, 'MARK', 'mark@gmail.com', 'mark@gmail.com', 'markpass', 'M', '9874563211', 'IIT');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fe_id` int(7) NOT NULL,
  `from` varchar(10) NOT NULL,
  `to` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `feedback` varchar(500) NOT NULL,
  `f_id` int(7) NOT NULL,
  `c_id` int(7) NOT NULL,
  `p_id` int(7) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fe_id`, `from`, `to`, `date`, `feedback`, `f_id`, `c_id`, `p_id`, `student_id`) VALUES
(1, 'student', 'faculty', '2019-01-08', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 1, 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `insurance`
--

CREATE TABLE `insurance` (
  `insurance_id` int(7) NOT NULL,
  `company_name` varchar(25) NOT NULL,
  `insurance_name` varchar(25) NOT NULL,
  `amount` int(3) NOT NULL,
  `description` varchar(50000) NOT NULL,
  `docs` varchar(200) NOT NULL,
  `a_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `insurance`
--

INSERT INTO `insurance` (`insurance_id`, `company_name`, `insurance_name`, `amount`, `description`, `docs`, `a_id`) VALUES
(1, 'Reliance', 'Travel Insurance', 500, 'In life almost of the times situations never work out as planned, there are always chances that certain unexpected events do turn up suddenly. Whenever one travels alone, with family or business associates, you would certainly want your trip abroad to be as per your plan. Despite all that careful planning, there may be unforeseen events beyond your control. This may take your peace of mind and put you completely out of control. \r\n<b>Reliance travel plans</b> provides comprehensive cover for you and your family when you are travelling across the globe. It covers you against medical and other financial emergencies during your trip abroad and helps restore your peace and be in control of the situation.', 'assets/insurance/reliance.pdf', 1),
(5, 'Tata AiG', 'Student Gaurd', 592, '<b>TATA AIG Travel Insurance Plan</b> by TATA AIG General Insurance Company Limited offers a wide range of general insurance products. TATA AIG is a joint collaboration between TATA, a trusted name in India and an American Company AIG, market leader in insurance as well as financial services. The company caters to the requirements of insurance plans both in the Life Insurance plans and in General Insurance plans. Travel Insurance plans, another important category of general insurance plans which the company offers to the customers with attractive features and benefits. TATA AIG has specially designed one of this most important general insurance plans, which is travel insurance plans.<br><br>', 'assets/insurance/tata.pdf', 2);

-- --------------------------------------------------------

--
-- Table structure for table `micro_planning`
--

CREATE TABLE `micro_planning` (
  `m_id` int(7) NOT NULL,
  `date` varchar(10) NOT NULL,
  `planning` varchar(250) NOT NULL,
  `remarks` varchar(250) DEFAULT NULL,
  `visit_id` int(7) NOT NULL,
  `f_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `p_id` int(7) NOT NULL,
  `name` varchar(25) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `password` varchar(12) NOT NULL,
  `student_id` int(11) NOT NULL,
  `f_id` int(7) NOT NULL,
  `visit_id` int(7) NOT NULL,
  `status_id` int(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`p_id`, `name`, `mobile_no`, `email_id`, `password`, `student_id`, `f_id`, `visit_id`, `status_id`) VALUES
(1, 'Mark Twain', '9523687411', 'parent@gmail.com', 'parentpass', 2, 2, 1, 1),
(2, 'Stark', '9874563214', 'parent2@gmail.com', 'starkpaass', 1, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(7) NOT NULL,
  `amount` int(5) NOT NULL,
  `date` date NOT NULL,
  `type` varchar(10) NOT NULL,
  `class` varchar(3) NOT NULL,
  `coordinator_id` int(7) NOT NULL,
  `f_id` int(7) NOT NULL,
  `visit_id` int(7) NOT NULL,
  `connect_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `amount`, `date`, `type`, `class`, `coordinator_id`, `f_id`, `visit_id`, `connect_id`) VALUES
(1, 2500, '2019-01-16', 'offline', 'c1', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(7) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `post` varchar(200) NOT NULL,
  `image` binary(200) NOT NULL,
  `f_id` int(7) NOT NULL,
  `a_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `date`, `time`, `post`, `image`, `f_id`, `a_id`) VALUES
(1, '2019-01-24', '06:05:00', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five', 0x0000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `enroll_no` varchar(12) NOT NULL,
  `name` varchar(25) NOT NULL,
  `branch` varchar(10) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `father_mobile_no` varchar(10) NOT NULL,
  `email_id` varchar(25) NOT NULL,
  `institute_email_id` varchar(100) NOT NULL,
  `password` varchar(12) NOT NULL,
  `college` varchar(40) NOT NULL,
  `hostel` varchar(3) NOT NULL,
  `jain_food` varchar(3) NOT NULL,
  `room_preference` varchar(5) DEFAULT NULL,
  `payment_1` varchar(7) NOT NULL DEFAULT 'pending',
  `payment_2` varchar(7) NOT NULL DEFAULT 'pending',
  `semester` int(1) NOT NULL,
  `class` varchar(3) NOT NULL,
  `registered` varchar(3) NOT NULL DEFAULT 'NO',
  `blacklisted` varchar(3) NOT NULL DEFAULT 'NO',
  `blacklist_id` int(7) DEFAULT NULL,
  `f_id` int(7) NOT NULL,
  `visit_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `enroll_no`, `name`, `branch`, `gender`, `mobile_no`, `father_mobile_no`, `email_id`, `institute_email_id`, `password`, `college`, `hostel`, `jain_food`, `room_preference`, `payment_1`, `payment_2`, `semester`, `class`, `registered`, `blacklisted`, `blacklist_id`, `f_id`, `visit_id`) VALUES
(1, '150570107032', 'Christian', 'CE', 'M', '9874563211', '9632587411', 'a@gmail.com', 'l@gmail.com', 'cpassa', 'MEFGI', 'yes', 'no', 'R2', 'paid', 'paid', 7, 'C2', 'NO', 'no', NULL, 2, 1),
(2, '150570107001', 'John doe', 'CE', 'M', '9632587412', '9517538426', 'student@gmail.com', 'student@institute.com', 'studentpass', 'MEFGi', 'yes', 'no', 'R1', 'paid', 'pending', 7, 'C1', 'NO', 'no', NULL, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `todo_list`
--

CREATE TABLE `todo_list` (
  `t_id` int(5) NOT NULL,
  `title` varchar(100) NOT NULL,
  `f_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `todo_list`
--

INSERT INTO `todo_list` (`t_id`, `title`, `f_id`) VALUES
(1, 'Create Trip', 1),
(2, 'Student List Upload', 1),
(3, 'Announcement(mail to students)', 1),
(4, 'Registration', 1),
(5, 'Fees Collection1', 1),
(6, 'Payment to agent', 1),
(7, 'Train booking and ticket sharing to students', 1),
(8, 'Fees collection 2', 1),
(9, 'Payment to agent', 1),
(10, 'Hotel Booking', 1),
(11, 'Food/Transportation', 1),
(12, 'Final Schedule to Students', 1),
(13, 'travel', 1);

-- --------------------------------------------------------

--
-- Table structure for table `undertaking`
--

CREATE TABLE `undertaking` (
  `u_id` int(7) NOT NULL,
  `student_id` int(7) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'pending',
  `date` date DEFAULT NULL,
  `coordinator_name` varchar(100) DEFAULT NULL,
  `f_id` int(7) NOT NULL,
  `visit_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `visit`
--

CREATE TABLE `visit` (
  `visit_id` int(7) NOT NULL,
  `title` varchar(25) NOT NULL,
  `city` varchar(10) NOT NULL,
  `starting_date` date NOT NULL,
  `ending_date` date NOT NULL,
  `description` varchar(500) NOT NULL,
  `cost` int(11) NOT NULL,
  `insurance_id` int(7) NOT NULL,
  `f_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visit`
--

INSERT INTO `visit` (`visit_id`, `title`, `city`, `starting_date`, `ending_date`, `description`, `cost`, `insurance_id`, `f_id`) VALUES
(1, 'IV At Bangalore', 'Bangalore', '2019-01-23', '2019-01-30', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 9000, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `f_id` (`f_id`),
  ADD KEY `visit_id` (`visit_id`);

--
-- Indexes for table `approvals`
--
ALTER TABLE `approvals`
  ADD PRIMARY KEY (`ap_id`),
  ADD KEY `f_id` (`f_id`),
  ADD KEY `c_id` (`c_id`),
  ADD KEY `visit_id` (`visit_id`);

--
-- Indexes for table `blacklist`
--
ALTER TABLE `blacklist`
  ADD PRIMARY KEY (`blacklist_id`),
  ADD KEY `blacklist_ibfk_2` (`student_id`),
  ADD KEY `f_id` (`f_id`);

--
-- Indexes for table `bonafide`
--
ALTER TABLE `bonafide`
  ADD PRIMARY KEY (`bonafide_id`);

--
-- Indexes for table `company_person`
--
ALTER TABLE `company_person`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `connect`
--
ALTER TABLE `connect`
  ADD PRIMARY KEY (`connect_id`),
  ADD KEY `a_id` (`a_id`),
  ADD KEY `f_id` (`f_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `insurance_id` (`insurance_id`),
  ADD KEY `visit_id` (`visit_id`);

--
-- Indexes for table `coordinator`
--
ALTER TABLE `coordinator`
  ADD PRIMARY KEY (`coordinator_id`),
  ADD KEY `f_id` (`f_id`),
  ADD KEY `coordinator_ibfk_5` (`visit_id`),
  ADD KEY `payment_id` (`payment_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fe_id`),
  ADD KEY `c_id` (`c_id`),
  ADD KEY `f_id` (`f_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `insurance`
--
ALTER TABLE `insurance`
  ADD PRIMARY KEY (`insurance_id`),
  ADD KEY `a_id` (`a_id`);

--
-- Indexes for table `micro_planning`
--
ALTER TABLE `micro_planning`
  ADD PRIMARY KEY (`m_id`),
  ADD KEY `f_id` (`f_id`),
  ADD KEY `visit_id` (`visit_id`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `f_id` (`f_id`),
  ADD KEY `visit_id` (`visit_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `f_id` (`f_id`),
  ADD KEY `connect_id` (`connect_id`),
  ADD KEY `visit_id` (`visit_id`),
  ADD KEY `coordinator_id` (`coordinator_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`),
  ADD KEY `a_id` (`a_id`),
  ADD KEY `f_id` (`f_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `enroll_no` (`enroll_no`),
  ADD KEY `blacklist_id` (`blacklist_id`) USING BTREE,
  ADD KEY `f_id` (`f_id`),
  ADD KEY `visit_id` (`visit_id`);

--
-- Indexes for table `todo_list`
--
ALTER TABLE `todo_list`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `f_id` (`f_id`);

--
-- Indexes for table `undertaking`
--
ALTER TABLE `undertaking`
  ADD PRIMARY KEY (`u_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `f_id` (`f_id`),
  ADD KEY `visit_id` (`visit_id`);

--
-- Indexes for table `visit`
--
ALTER TABLE `visit`
  ADD PRIMARY KEY (`visit_id`),
  ADD KEY `f_id` (`f_id`),
  ADD KEY `insurance_id` (`insurance_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ad_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `a_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `approvals`
--
ALTER TABLE `approvals`
  MODIFY `ap_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blacklist`
--
ALTER TABLE `blacklist`
  MODIFY `blacklist_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `company_person`
--
ALTER TABLE `company_person`
  MODIFY `c_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `connect`
--
ALTER TABLE `connect`
  MODIFY `connect_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coordinator`
--
ALTER TABLE `coordinator`
  MODIFY `coordinator_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `f_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `insurance`
--
ALTER TABLE `insurance`
  MODIFY `insurance_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `micro_planning`
--
ALTER TABLE `micro_planning`
  MODIFY `m_id` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `p_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `todo_list`
--
ALTER TABLE `todo_list`
  MODIFY `t_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `undertaking`
--
ALTER TABLE `undertaking`
  MODIFY `u_id` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visit`
--
ALTER TABLE `visit`
  MODIFY `visit_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agent`
--
ALTER TABLE `agent`
  ADD CONSTRAINT `agent_ibfk_3` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`f_id`),
  ADD CONSTRAINT `agent_ibfk_4` FOREIGN KEY (`visit_id`) REFERENCES `visit` (`visit_id`);

--
-- Constraints for table `approvals`
--
ALTER TABLE `approvals`
  ADD CONSTRAINT `approvals_ibfk_1` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`f_id`),
  ADD CONSTRAINT `approvals_ibfk_2` FOREIGN KEY (`c_id`) REFERENCES `company_person` (`c_id`),
  ADD CONSTRAINT `approvals_ibfk_3` FOREIGN KEY (`visit_id`) REFERENCES `visit` (`visit_id`);

--
-- Constraints for table `blacklist`
--
ALTER TABLE `blacklist`
  ADD CONSTRAINT `blacklist_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `blacklist_ibfk_3` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`f_id`);

--
-- Constraints for table `connect`
--
ALTER TABLE `connect`
  ADD CONSTRAINT `connect_ibfk_10` FOREIGN KEY (`p_id`) REFERENCES `parent` (`p_id`),
  ADD CONSTRAINT `connect_ibfk_11` FOREIGN KEY (`insurance_id`) REFERENCES `insurance` (`insurance_id`),
  ADD CONSTRAINT `connect_ibfk_12` FOREIGN KEY (`visit_id`) REFERENCES `visit` (`visit_id`),
  ADD CONSTRAINT `connect_ibfk_7` FOREIGN KEY (`a_id`) REFERENCES `agent` (`a_id`),
  ADD CONSTRAINT `connect_ibfk_8` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`f_id`),
  ADD CONSTRAINT `connect_ibfk_9` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `coordinator`
--
ALTER TABLE `coordinator`
  ADD CONSTRAINT `coordinator_ibfk_4` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`f_id`),
  ADD CONSTRAINT `coordinator_ibfk_5` FOREIGN KEY (`visit_id`) REFERENCES `visit` (`visit_id`),
  ADD CONSTRAINT `coordinator_ibfk_6` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`payment_id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_6` FOREIGN KEY (`c_id`) REFERENCES `company_person` (`c_id`),
  ADD CONSTRAINT `feedback_ibfk_7` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`f_id`),
  ADD CONSTRAINT `feedback_ibfk_8` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `feedback_ibfk_9` FOREIGN KEY (`p_id`) REFERENCES `parent` (`p_id`);

--
-- Constraints for table `insurance`
--
ALTER TABLE `insurance`
  ADD CONSTRAINT `insurance_ibfk_1` FOREIGN KEY (`a_id`) REFERENCES `agent` (`a_id`);

--
-- Constraints for table `micro_planning`
--
ALTER TABLE `micro_planning`
  ADD CONSTRAINT `micro_planning_ibfk_3` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`f_id`),
  ADD CONSTRAINT `micro_planning_ibfk_4` FOREIGN KEY (`visit_id`) REFERENCES `visit` (`visit_id`);

--
-- Constraints for table `parent`
--
ALTER TABLE `parent`
  ADD CONSTRAINT `parent_ibfk_3` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `parent_ibfk_4` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`),
  ADD CONSTRAINT `parent_ibfk_5` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`f_id`),
  ADD CONSTRAINT `parent_ibfk_6` FOREIGN KEY (`visit_id`) REFERENCES `visit` (`visit_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_5` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`f_id`),
  ADD CONSTRAINT `payment_ibfk_6` FOREIGN KEY (`connect_id`) REFERENCES `connect` (`connect_id`),
  ADD CONSTRAINT `payment_ibfk_7` FOREIGN KEY (`visit_id`) REFERENCES `visit` (`visit_id`),
  ADD CONSTRAINT `payment_ibfk_8` FOREIGN KEY (`coordinator_id`) REFERENCES `coordinator` (`coordinator_id`);

--
-- Constraints for table `status`
--
ALTER TABLE `status`
  ADD CONSTRAINT `status_ibfk_2` FOREIGN KEY (`a_id`) REFERENCES `agent` (`a_id`),
  ADD CONSTRAINT `status_ibfk_3` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`f_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`f_id`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`visit_id`) REFERENCES `visit` (`visit_id`);

--
-- Constraints for table `todo_list`
--
ALTER TABLE `todo_list`
  ADD CONSTRAINT `todo_list_ibfk_1` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`f_id`);

--
-- Constraints for table `undertaking`
--
ALTER TABLE `undertaking`
  ADD CONSTRAINT `undertaking_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `undertaking_ibfk_2` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`f_id`),
  ADD CONSTRAINT `undertaking_ibfk_3` FOREIGN KEY (`visit_id`) REFERENCES `visit` (`visit_id`);

--
-- Constraints for table `visit`
--
ALTER TABLE `visit`
  ADD CONSTRAINT `visit_ibfk_8` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`f_id`),
  ADD CONSTRAINT `visit_ibfk_9` FOREIGN KEY (`insurance_id`) REFERENCES `insurance` (`insurance_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
