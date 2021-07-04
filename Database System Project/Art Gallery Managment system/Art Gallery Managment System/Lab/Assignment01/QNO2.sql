
CREATE TABLE IF NOT EXISTS `subjects` (
  `SUBJECT_ID` int(10) NOT NULL,
  `TITLE` varchar(10) NOT NULL,
   PRIMARY KEY (`SUBJECT_ID`)
);
-- ---------------------------------------------------------
CREATE TABLE IF NOT EXISTS `teachers` (
  `TEACHER_ID` int(10) NOT NULL,
  `FNAME` varchar(15) NOT NULL,
  `LNAME` varchar(15) NOT NULL,
  PRIMARY KEY (`TEACHER_ID`)
);

-- ----------------------------------------------------------

CREATE TABLE IF NOT EXISTS `groups` (
  `GROUP_ID` int(10) NOT NULL,
  `NAME` varchar(15) NOT NULL,
  PRIMARY KEY (`GROUP_ID`)
);

-- -----------------------------------------------------------
CREATE TABLE IF NOT EXISTS `subject_teacher` (
  `SUBJECT_ID` int(10) DEFAULT NULL,
  `TEACHER_ID` int(10) DEFAULT NULL,
  `GROUP_ID` int(10) DEFAULT NULL,
  FOREIGN KEY (`SUBJECT_ID`) REFERENCES subjects(`SUBJECT_ID`),
  FOREIGN KEY (`TEACHER_ID`) REFERENCES teachers(`TEACHER_ID`),
  FOREIGN KEY (`GROUP_ID`) REFERENCES groups(`GROUP_ID`)
);
-- -----------------------------------------------------------
CREATE TABLE IF NOT EXISTS `students` (
  `STUDENT_ID` int(10) NOT NULL,
  `FNAME` varchar(10) DEFAULT NULL,
  `LNAME` varchar(10) DEFAULT NULL,
  `GROUP_ID` int(10) DEFAULT NULL,
  PRIMARY KEY (`STUDENT_ID`),
  FOREIGN KEY (`GROUP_ID`) REFERENCES groups(`GROUP_ID`)
);
-- ----------------------------------------------------------
CREATE TABLE IF NOT EXISTS `marks` (
  `MARK_ID` int(10) NOT NULL,
  `STUDENT_ID` int(10) DEFAULT NULL,
  `SUBJECT_ID` int(10) DEFAULT NULL,
  `DATE_TIME` datetime DEFAULT NULL,
  `MARK` int(10) DEFAULT NULL,
  PRIMARY KEY (`MARK_ID`),
  FOREIGN KEY (`SUBJECT_ID`) REFERENCES subjects(`SUBJECT_ID`),
  FOREIGN KEY (`STUDENT_ID`) REFERENCES students(`STUDENT_ID`)
);