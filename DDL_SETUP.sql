-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 09, 2021 at 02:30 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT
= 0;
START TRANSACTION;
SET time_zone
= "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cst-256-clc`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users`
(
  `ID` int
(11) NOT NULL,
  `EMAIL` varchar
(100) UNIQUE NOT NULL,
  `PASSWORD` varchar
(100) NOT NULL,
  `FIRSTNAME` varchar
(100) NOT NULL,
  `LASTNAME` varchar
(100) NOT NULL
  `ROLE` enum
('USER', 'MODERATOR', 'ADMIN', 'UTILITY') NOT NULL DEFAULT 'USER',
  `SUSPENDED` boolean NOT NULL DEFAULT false
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`
ID`,
`EMAIL
`, `PASSWORD`, `FIRSTNAME`, `LASTNAME`) VALUES
(1, 'test@email.com', '123456', 'test', 'test'),
(2, 'admin@email.com', '123456', 'testadmin', 'testadmin')

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
ADD PRIMARY KEY
(`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int
(11) NOT NULL AUTO_INCREMENT;


--
-- Table structure for table `cv_items`
--
CREATE TABLE `CST-256-CLC`.`cv_items`
(
	ID int NOT NULL AUTO_INCREMENT,
	NAME varchar
(100) NOT NULL,
	DESCRIPTION varchar
(200),
	INSTITUTION varchar
(100),
	START_DATE DATE NOT NULL,
	END_DATE DATE NOT NULL,
	TYPE varchar
(25) NOT NULL,
	USER_ID int NOT NULL,
 	FOREIGN KEY
(USER_ID)
		REFERENCES users
(ID)
		ON
DELETE CASCADE,
	PRIMARY KEY (ID)
);

--
-- Insert test data for table `cv_items`
--
INSERT INTO cv_items
  (
  NAME,
  DESCRIPTION,
  INSTITUTION,
  START_DATE,
  END_DATE,
  TYPE,
  USER_ID
  )
VALUES
  ("Node.js", "Programming Language", null, null, null, "SKILL", 1),
  ("React", "Web Framework", null, null, null, "SKILL", 1),
  ("Web Content Writing", "Writing Skill", null, null, null, "SKILL", 1),
  ("IT Internship", "Working on an IT support team", "CORE Construction", '2017-02-14', '2018-04-30', "JOB", 1),
  ("Hack AZ", "Hackathon at U of A in Tucson", null, '2018-01-09', '2018-01-11', "LEARNING_EXPERIENCE", 1);

--
-- Table structure for table `job_postings`
--
CREATE TABLE `CST-256-CLC`.`job_postings`
(
	ID int NOT NULL AUTO_INCREMENT,
	NAME varchar
(100) NOT NULL,
	DESCRIPTION varchar
(200),
	INSTITUTION varchar
(100),
	IDEAL_START_DATE DATE,
	TYPE varchar
(25) NOT NULL,
	USER_ID int NOT NULL,
 	FOREIGN KEY
(USER_ID)
		REFERENCES users
(ID)
		ON
DELETE CASCADE,
	PRIMARY KEY (ID)
);

--
-- Insert test data for table `job_postings`
--
INSERT INTO job_postings
  (
  ID,
  NAME,
  DESCRIPTION,
  TYPE,
  USER_ID
  )
VALUES
  (23, "Frontend React Developer", "Lorem Ipsum, work on frontend stuff, get shafted by design constraints....so on and so on", "SALARY", 2),
  (24, "Backend Node.js Developer", "Lorem Ipsum, work on backend stuff, get shafted by architecture constraints....so on and so on", "CONTRACT", 2);

--
-- Table structure for table `job_posting_required_skills`
--
CREATE TABLE `CST-256-CLC`.`job_posting_required_skills`
(
	ID int NOT NULL AUTO_INCREMENT,
	NAME varchar
(100) NOT NULL,
	DESCRIPTION varchar
(200),
	TYPE varchar
(25) NOT NULL,
	JOB_POSTING_ID int NOT NULL,
 	FOREIGN KEY
(JOB_POSTING_ID)
		REFERENCES job_postings
(ID)
		ON
DELETE CASCADE,
	PRIMARY KEY (ID)
);

--
-- Insert test data for table `job_posting_required_skills`
--
INSERT INTO job_posting_required_skills
  (
  NAME,
  DESCRIPTION,
  TYPE,
  JOB_POSTING_ID
  )
VALUES
  ("Node.js", "Programming Language", "SKILL", 24),
  ("React", "Web Framework", "SKILL", 23),
  ("Web Content Writing", "Writing Skill", "SKILL", 23);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
