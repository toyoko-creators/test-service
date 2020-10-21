CREATE DATABASE IF NOT EXISTS test;
USE test;
DROP TABLE IF EXISTS users;
create table users(
    email NVARCHAR(100) NOT NULL PRIMARY KEY,
    lastname NVARCHAR(50) ,
    firstname NVARCHAR(50),
    VerifyPassword VARCHAR(256)
);

INSERT INTO users VALUES('1045@gmail.com','東横','太郎','$2y$10$Itqj9sYQXBxoQTfUsMMHqOgRKdW6gRA5RuV3PKzhOcfpPL2df5YRS');
INSERT INTO users VALUES('1046@gmail.com','東横','次郎','$2y$10$Itqj9sYQXBxoQTfUsMMHqOgRKdW6gRA5RuV3PKzhOcfpPL2df5YRS');
INSERT INTO users VALUES('1047@gmail.com','東横','三郎','$2y$10$Itqj9sYQXBxoQTfUsMMHqOgRKdW6gRA5RuV3PKzhOcfpPL2df5YRS');
INSERT INTO users VALUES('1048@gmail.com','東横','四郎','$2y$10$Itqj9sYQXBxoQTfUsMMHqOgRKdW6gRA5RuV3PKzhOcfpPL2df5YRS');

DROP TABLE IF EXISTS Clothes;
create table Clothes(
    ImageFile VARCHAR(256) NOT NULL PRIMARY KEY,
    email NVARCHAR(100) NOT NULL,
    WearType enum('Top', 'Under') NOT NULL
);
INSERT INTO Clothes VALUES('11219840665f88e35ce2d153.90786069','1045@gmail.com','Top');

DROP TABLE IF EXISTS closet;
create table closet (
    id int auto_increment,
    email NVARCHAR(100) NOT NULL,
    TopFile VARCHAR(256) NOT NULL,
    UnderFile VARCHAR(256) NOT NULL
);
