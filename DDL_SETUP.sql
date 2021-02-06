-- -------------------------------------------------------------
-- TablePlus 3.12.2(358)
--
-- https://tableplus.com/
--
-- Database: cst-256-clc
-- Generation Time: 2021-01-17 15:45:52.3100
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


DROP TABLE IF EXISTS `cv_items`;
CREATE TABLE `cv_items`
(
  `ID` int NOT NULL AUTO_INCREMENT,
  `NAME` varchar
(100) NOT NULL,
  `DESCRIPTION` varchar
(200) DEFAULT NULL,
  `INSTITUTION` varchar
(100) DEFAULT NULL,
  `START_DATE` date DEFAULT NULL,
  `END_DATE` date DEFAULT NULL,
  `TYPE` varchar
(25) NOT NULL,
  `USER_ID` int NOT NULL,
  PRIMARY KEY
(`ID`),
  KEY `USER_ID`
(`USER_ID`),
  CONSTRAINT `cv_items_ibfk_1` FOREIGN KEY
(`USER_ID`) REFERENCES `users`
(`ID`) ON
DELETE CASCADE
) ENGINE=InnoDB
AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `job_posting_required_skills`;
CREATE TABLE `job_posting_required_skills`
(
  `ID` int NOT NULL AUTO_INCREMENT,
  `NAME` varchar
(100) NOT NULL,
  `DESCRIPTION` varchar
(200) DEFAULT NULL,
  `TYPE` varchar
(25) NOT NULL,
  `JOB_POSTING_ID` int NOT NULL,
  PRIMARY KEY
(`ID`),
  KEY `JOB_POSTING_ID`
(`JOB_POSTING_ID`),
  CONSTRAINT `job_posting_required_skills_ibfk_1` FOREIGN KEY
(`JOB_POSTING_ID`) REFERENCES `job_postings`
(`ID`) ON
DELETE CASCADE
) ENGINE=InnoDB
AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `job_postings`;
CREATE TABLE `job_postings`
(
  `ID` int NOT NULL AUTO_INCREMENT,
  `NAME` varchar
(100) NOT NULL,
  `DESCRIPTION` varchar
(200) DEFAULT NULL,
  `INSTITUTION` varchar
(100) DEFAULT NULL,
  `IDEAL_START_DATE` date DEFAULT NULL,
  `TYPE` varchar
(25) NOT NULL,
  `USER_ID` int NOT NULL,
  PRIMARY KEY
(`ID`),
  KEY `USER_ID`
(`USER_ID`),
  CONSTRAINT `job_postings_ibfk_1` FOREIGN KEY
(`USER_ID`) REFERENCES `users`
(`ID`) ON
DELETE CASCADE
) ENGINE=InnoDB
AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`
(
  `ID` int NOT NULL AUTO_INCREMENT,
  `EMAIL` varchar
(100) NOT NULL,
  `PASSWORD` varchar
(100) NOT NULL,
  `FIRSTNAME` varchar
(100) NOT NULL,
  `LASTNAME` varchar
(100) NOT NULL,
  `ROLE` enum
('ADMIN','USER','MODERATOR','UTILITY') NOT NULL DEFAULT 'USER',
  `SUSPENDED` tinyint
(1) NOT NULL DEFAULT '0',
  PRIMARY KEY
(`ID`),
  UNIQUE KEY `EMAIL`
(`EMAIL`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

INSERT INTO `users` (
  `
EMAIL`,
`FIRST_NAME
`,
  `LAST_NAME`,
  `PASSWORD`,
  `ROLE`
) VALUES
('test@gmail.com', 'test', 'test', 'test', 'USER'),
('test2@gmail.com', 'test', 'test', 'test', 'USER'),
('test3@gmail.com', 'test', 'test', 'test', 'USER'),


INSERT INTO `cv_items` (`
ID`,
`NAME
`, `DESCRIPTION`, `INSTITUTION`, `START_DATE`, `END_DATE`, `TYPE`, `USER_ID`) VALUES
('1', 'Node.js', 'Programming Language', NULL, NULL, NULL, 'SKILL', '1'),
('2', 'React', 'Web Framework', NULL, NULL, NULL, 'SKILL', '1'),
('3', 'Web Content Writing', 'Writing Skill', NULL, NULL, NULL, 'SKILL', '1'),
('4', 'IT Internship', 'Working on an IT support team', 'CORE Construction', '2017-02-14', '2018-04-30', 'JOB', '1'),
('5', 'Hack AZ', 'Hackathon at U of A in Tucson', NULL, '2018-01-09', '2018-01-11', 'LEARNING_EXPERIENCE', '1');

INSERT INTO `job_posting_required_skills` (`
ID`,
`NAME
`, `DESCRIPTION`, `TYPE`, `JOB_POSTING_ID`) VALUES
('1', 'Node.js', 'Programming Language', 'SKILL', '24'),
('2', 'React', 'Web Framework', 'SKILL', '23'),
('3', 'Web Content Writing', 'Writing Skill', 'SKILL', '23');

INSERT INTO `job_postings` (`
ID`,
`NAME
`, `DESCRIPTION`, `INSTITUTION`, `IDEAL_START_DATE`, `TYPE`, `USER_ID`) VALUES
('23', 'Frontend React Developer', 'Lorem Ipsum, work on frontend stuff, get shafted by design constraints....so on and so on', NULL, NULL, 'SALARY', '2'),
('24', 'Backend Node.js Developer', 'Lorem Ipsum, work on backend stuff, get shafted by architecture constraints....so on and so on', NULL, NULL, 'CONTRACT', '2');

INSERT INTO `users` (`
ID`,
`EMAIL
`, `PASSWORD`, `FIRSTNAME`, `LASTNAME`, `ROLE`, `SUSPENDED`) VALUES
('1', 'test@email.com', 'password', 'testssss', 'test', 'ADMIN', '0'),
('2', 'admin@email.com', '123456', 'testadmin', 'testadmin', 'USER', '0'),
('5', 'tester2@gmail.com', '1234', 'test', 'tester', 'MODERATOR', '1'),
('8', 'admin@gmail.com', '1234', 'test', 'tester', 'UTILITY', '0'),
('13', '123@test.com', '1234', 'fds', 'fds', 'USER', '0'),
('14', 'dcender@my.gcu.edu', '1234', 'fds', 'fds', 'USER', '0');


CREATE TABLE `CST-256-CLC`.`affinity_groups`
(
	ID int NOT NULL AUTO_INCREMENT,
	NAME varchar
(100) NOT NULL,
	DESCRIPTION varchar
(200),
	TYPE varchar
(25) NOT NULL,
	PRIMARY KEY
(ID)
);

INSERT INTO `
CST-256-CLC
`.`affinity_groups`
(
	NAME,
	DESCRIPTION,
	TYPE
	)
	VALUES
('Developers', 'A place for developers to connect', 'INTEREST'),
('Plumbers', 'A place for plumbers to connect', 'CAREER'),
('Stock Brokers', 'A place for stock brokers to connect', 'CAREER')

DROP TABLE IF EXISTS `affinity_group_users`
CREATE TABLE `CST-256-CLC`.`affinity_group_users`
(
	ID int NOT NULL AUTO_INCREMENT,
	USER_ID int NOT NULL,
	GROUP_ID int NOT NULL,
	PRIMARY KEY
(ID),
	FOREIGN KEY
(USER_ID)
		REFERENCES users
(ID)
		ON
DELETE CASCADE,
	FOREIGN KEY (GROUP_ID)
REFERENCES affinity_groups
(ID)
		ON
DELETE CASCADE
);


INSERT INTO `
CST-256-CLC
`.`affinity_group_users`
(
	USER_ID,
	GROUP_ID
	)
	VALUES
(1, 1),
(2, 1),
(3, 3)


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
