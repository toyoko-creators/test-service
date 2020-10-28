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
    WearType enum('Top', 'Bottom') NOT NULL
);
INSERT INTO Clothes VALUES('11219840665f88e35ce2d153.90786069','1045@gmail.com','Top');
INSERT INTO Clothes VALUES('12750326105f88e2b1d27894.99618425','1045@gmail.com','Top');
INSERT INTO Clothes VALUES('14294579835f8902f30e1a91.36829885','1045@gmail.com','Bottom');
INSERT INTO Clothes VALUES('1602402965f890120107193.08735220','1046@gmail.com','Top');
INSERT INTO Clothes VALUES('18030105225f88e372151ed2.03156474','1046@gmail.com','Top');
INSERT INTO Clothes VALUES('1828725615f8904f5dc3f37.55858831','1046@gmail.com','Bottom');
INSERT INTO Clothes VALUES('20018706055f89005a87ab11.12576120','1046@gmail.com','Bottom');
INSERT INTO Clothes VALUES('6781987215f890380683ea2.50164434','1046@gmail.com','Bottom');


DROP TABLE IF EXISTS FavoList;
create table FavoList (
    id int auto_increment,
    email NVARCHAR(100) NOT NULL,
    TopFile VARCHAR(256) NOT NULL,
    UnderFile VARCHAR(256) NOT NULL
);

INSERT INTO FavoList VALUES('1045@gmail.com','11219840665f88e35ce2d153.90786069','14294579835f8902f30e1a91.36829885');