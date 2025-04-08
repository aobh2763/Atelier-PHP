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
    image varchar(100),
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