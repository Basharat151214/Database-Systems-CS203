CREATE DATABASE person1;
SHOW databases;
USE person1;


CREATE TABLE Users(
user_id int NOT NULL,
username varchar(10) NOT NULL,
password varchar(10) NOT NULL,
email varchar(20) NOT NULL,
PRIMARY KEY(user_id)
);

CREATE TABLE Summary(
id int NOT NULL,
total_users int NOT NULL,
Yahoo_users int NOT NULL,
Outlook_users int NOT NULL,
Gmail_users int NOT NULL,
PRIMARY KEY(id)
);


INSERT INTO Users(user_id,username,password,email)
               VALUES ('1','Salman','1234','salman@gmail.com');
INSERT INTO Users(user_id,username,password,email)
               VALUES ('2','Harry','9090','harry@outlook.com');
INSERT INTO Users(user_id,username,password,email)
               VALUES ('3','Atif','Pak123','atif@yahoo.com');
INSERT INTO Users(user_id,username,password,email)
               VALUES ('4','Fawad','Pesh098','fawad@gmail.com');
INSERT INTO Users(user_id,username,password,email)
               VALUES ('5','Mehwish','asd','mehwish@yahoo.com');
INSERT INTO Users(user_id,username,password,email)
               VALUES ('6','Babar','Qwe876','baber@yahoo.com');










INSERT INTO Summary(id,total_users,Yahoo_users,Outlook_users,Gmail_users)
               VALUES ('1','6','3','1','2');



DELIMITER $$
CREATE 	TRIGGER UPDATE_RECORD  before UPDATE
on person1.Users
for each row begin

	UPDATE Summary

	SET new.Yahoo_users = new.Yahoo_users + 1 and new.Gmail_users = new.Gmail_users -1
	where new.email LIKE '%yahoo.com%' and old.email like '%gmail.com%';


	SET new.Outlook_users = new.Outlook_users + 1 and new.Gmail_users = new.Gmail_users -1
	where new.email LIKE '%outlook.com%' and old.email like '%gmail.com%';


	SET new.Gmail_users = new.Gmail_users + 1 and new.Yahoo_users = new.Yahoo_users -1
	where new.email like '%gmail.com%' and old.email like '%yahoo.com%';



	SET new.Outlook_users = new.Outlook_users + 1 and new.Yahoo_users = new.Yahoo_users -1
	where new.email like '%outlook.com%' and old.email like '%yahoo.com%';


	SET new.Gmail_users = new.Gmail_users + 1 and new.Outlook_users = new.Outlook_users -1
	where new.email like '%gmail.com%' and old.email like '%outlook.com%';


	SET new.Yahoo_users = new.Yahoo_users + 1 and new.Outlook_users = new.Outlook_users -1
	where new.email like '%yahoo.com%' and old.email like '%outlook.com%';

END $$
DELIMITER ;

