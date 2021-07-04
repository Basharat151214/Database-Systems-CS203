CREATE DATABASE person;

CREATE TABLE users(
user_id int NOT NULL,
username varchar(10) DEFAULT NULL,
password varchar(10) DEFAULT NULL,
email varchar(20) DEFAULT NULL,
PRIMARY KEY(user_id)
);

CREATE TABLE Summary(
id int NOT NULL,
total_users int DEFAULT NULL,
Yahoo_users int DEFAULT NULL,
Outlook_users int DEFAULT NULL,
Gmail_users int DEFAULT NULL,
PRIMARY KEY(id)
);


INSERT INTO Users VALUES ('1','Salman','1234','salman@gmail.com');
INSERT INTO Users VALUES ('2','Harry','9090','harry@outlook.com');
INSERT INTO Users VALUES ('3','Atif','Pak123','atif@yahoo.com');
INSERT INTO Users VALUES ('4','Fawad','Pesh098','fawad@gmail.com');
INSERT INTO Users VALUES ('5','Mehwish','asd','mehwish@yahoo.com');
INSERT INTO Users VALUES ('6','Babar','Qwe876','baber@yahoo.com');





INSERT INTO Summary VALUES ('1','6','3','1','2');



DELIMITER $$
CREATE 	TRIGGER UPDATE_RECORD  BEFORE UPDATE ON person.users
FOR EACH ROW BEGIN
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

