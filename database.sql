CREATE DATABASE IF NOT EXISTS cms;
USE cms;


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



CREATE TABLE `course` (
  `c_id` varchar(25) NOT NULL,
  `c_name` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Table structure for table `fa`
--

CREATE TABLE `fa` (
  `fa_id` varchar(25) NOT NULL,
  `t_id` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gradecard`
--

CREATE TABLE `gradecard` (
  `grade` varchar(25) NOT NULL,
  `credits` varchar(25) NOT NULL,
  `s_id` varchar(25) NOT NULL,
  `c_id` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `s_id` varchar(25) NOT NULL,
  `c_id` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s_id` varchar(25) NOT NULL,
  `fname` varchar(25) DEFAULT NULL,
  `mname` varchar(25) DEFAULT NULL,
  `lname` varchar(25) DEFAULT NULL,
  `sex` varchar(25) DEFAULT NULL,
  `dob` varchar(25) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `addr` varchar(500) DEFAULT NULL,
  `attendance` varchar(25) DEFAULT NULL,
  `present` varchar(25) DEFAULT NULL,
  `totaldays` varchar(25) DEFAULT NULL,
  `fa_id` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_phone`
--

CREATE TABLE `student_phone` (
  `s_ph_id` varchar(25) NOT NULL,
  `s_id` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `t_id` varchar(25) NOT NULL,
  `Fname` varchar(25) DEFAULT NULL,
  `Mname` varchar(25) DEFAULT NULL,
  `Lname` varchar(25) DEFAULT NULL,
  `sex` varchar(25) DEFAULT NULL,
  `DOB` varchar(25) NOT NULL,
  `native_place` varchar(25) DEFAULT NULL,
  `Addr` varchar(500) NOT NULL,
  `Qualification` varchar(25) NOT NULL,
  `Salary` varchar(25) NOT NULL,
  `Marital_status` varchar(25) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Attendance` varchar(25) NOT NULL,
  `Present` varchar(25) NOT NULL,
  `Total_days` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Table structure for table `teacher_phone`
--

CREATE TABLE `teacher_phone` (
  `t_ph_id` varchar(25) NOT NULL,
  `t_id` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Table structure for table `teaches`
--

CREATE TABLE `teaches` (
  `c_id` varchar(25) NOT NULL,
  `t_id` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(25) NOT NULL,
  `pass` varchar(25) NOT NULL,
  `type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `pass`, `type`) VALUES
('iamtidu', '12345', 'admin');


--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `c_id` (`c_id`);

--
-- Indexes for table `fa`
--
ALTER TABLE `fa`
  ADD PRIMARY KEY (`fa_id`),
  ADD UNIQUE KEY `fa_id` (`fa_id`),
  ADD KEY `t_id` (`t_id`);

--
-- Indexes for table `gradecard`
--
ALTER TABLE `gradecard`
  ADD PRIMARY KEY (`s_id`,`c_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`s_id`,`c_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`),
  ADD UNIQUE KEY `s_id` (`s_id`),
  ADD KEY `fa_id` (`fa_id`);

--
-- Indexes for table `student_phone`
--
ALTER TABLE `student_phone`
  ADD PRIMARY KEY (`s_ph_id`),
  ADD UNIQUE KEY `s_ph_id` (`s_ph_id`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `teacher_phone`
--
ALTER TABLE `teacher_phone`
  ADD PRIMARY KEY (`t_ph_id`),
  ADD UNIQUE KEY `t_ph_id` (`t_ph_id`),
  ADD KEY `t_id` (`t_id`);

--
-- Indexes for table `teaches`
--
ALTER TABLE `teaches`
  ADD KEY `c_id` (`c_id`),
  ADD KEY `t_id` (`t_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`,`pass`,`type`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fa`
--
ALTER TABLE `fa`
  ADD CONSTRAINT `fa_ibfk_1` FOREIGN KEY (`t_id`) REFERENCES `teacher` (`t_id`);

--
-- Constraints for table `gradecard`
--
ALTER TABLE `gradecard`
  ADD CONSTRAINT `gradecard_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`),
  ADD CONSTRAINT `gradecard_ibfk_2` FOREIGN KEY (`c_id`) REFERENCES `course` (`c_id`);

--
-- Constraints for table `register`
--
ALTER TABLE `register`
  ADD CONSTRAINT `register_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`),
  ADD CONSTRAINT `register_ibfk_2` FOREIGN KEY (`c_id`) REFERENCES `course` (`c_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`fa_id`) REFERENCES `fa` (`fa_id`);

--
-- Constraints for table `student_phone`
--
ALTER TABLE `student_phone`
  ADD CONSTRAINT `student_phone_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`);

--
-- Constraints for table `teacher_phone`
--
ALTER TABLE `teacher_phone`
  ADD CONSTRAINT `teacher_phone_ibfk_1` FOREIGN KEY (`t_id`) REFERENCES `teacher` (`t_id`);

--
-- Constraints for table `teaches`
--
ALTER TABLE `teaches`
  ADD CONSTRAINT `teaches_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `course` (`c_id`),
  ADD CONSTRAINT `teaches_ibfk_2` FOREIGN KEY (`t_id`) REFERENCES `teacher` (`t_id`);
COMMIT;

/
