CREATE TABLE Courses (
  course_code varchar(10) NOT NULL,
  course_name varchar(30) NOT NULL,
  credit_hours varchar(30) NOT NULL,
  roll_no varchar(10) NOT NULL,
  PRIMARY KEY (course_code),
  FOREIGN KEY (roll_no) REFERENCES student (roll_no) ON DELETE CASCADE

)




