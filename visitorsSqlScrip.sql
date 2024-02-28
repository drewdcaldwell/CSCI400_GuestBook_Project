USE drecaldw;

DROP TABLE IF EXISTS visitors;

CREATE TABLE visitors
(
   ID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
   Fname varchar(15),
   Lname varchar(20)
);

INSERT INTO visitors (Fname, Lname) VALUES ('Drew','Caldwell');
INSERT INTO visitors (Fname, Lname) VALUES ('Justin','Dyer');
INSERT INTO visitors (Fname, Lname) VALUES ('Nathan','Lozoya');
INSERT INTO visitors (Fname, Lname) VALUES ('Mason','Yentes');
