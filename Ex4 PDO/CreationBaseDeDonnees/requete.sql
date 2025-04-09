CREATE DATABASE studentbd;
USE studentbd;

CREATE USER 'php' IDENTIFIED BY 'phppass';

GRANT ALL PRIVILEGES
ON *
TO 'php'
WITH GRANT OPTION;

CREATE TABLE Student (
	id int NOT NULL UNIQUE,
    name varchar(50),
    birthday date,
    PRIMARY KEY (id)
);

CREATE TABLE Etudiant (
	id int UNIQUE NOT NULL AUTO_INCREMENT,
    name varchar(40),
    birthday date,
    image varchar(500),
    section varchar(3),
    PRIMARY KEY (id)
);

CREATE TABLE Section (
	id int NOT NULL UNIQUE AUTO_INCREMENT,
    designation varchar(3),
    description varchar(100),
    PRIMARY KEY (id)
);

CREATE TABLE Utilisateur (
	id int UNIQUE NOT NULL AUTO_INCREMENT,
    username varchar(30),
    password varchar(60),
    email varchar(30),
    role enum('user', 'admin'),
    PRIMARY KEY (id)
);

INSERT INTO Student (id, name, birthday) VALUES
(1, 'Aymen', '1982-02-07'),
(2, 'Skander', '2018-07-11');

INSERT INTO Etudiant (id, name, image, birthday, section) VALUES
(1, 'Aymen', 'https://placehold.co/400', '1982-02-07', 'GL'),
(2, 'Skander', 'https://placehold.co/400','2018-07-11', 'RT');

INSERT INTO Section (id, designation, description) VALUES
(1, 'GL', 'Génie Logiciel'),
(2, 'RT', 'Reseaux et Télécommunications');

INSERT INTO Utilisateur (id, username, password, email, role) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'admin'),
(2, 'user', 'user', 'user@gmail.com', 'user');