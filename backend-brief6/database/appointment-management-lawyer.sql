DROP TABLE  client;
CREATE TABLE client(
    id INT AUTO_INCREMENT PRIMARY KEY ,
    Fname VARCHAR(30) NOT NULL ,
    Lname VARCHAR(30) NOT NULL,
    dateBirth DATE NOT NULL,
    email VARCHAR (255) NOT NULL,
    cnie VARCHAR (20) NOT NULL,
    profession VARCHAR(255) NOT NULL,
    ref VARCHAR (30) NOT NULL,
    password VARCHAR(30) NOT NULL
);
DROP TABLE creneaux;
CREATE TABLE creneaux(
    id INT AUTO_INCREMENT PRIMARY KEY ,
    creneaux VARCHAR  (20)
);
DROP TABLE appointment;
CREATE TABLE appointment(
    id INT AUTO_INCREMENT PRIMARY KEY ,
    sujet VARCHAR (255) NOT NULL,
    date DATE NOT NULL,
    idclient INT NOT NULL,
    idcreneaux INT NOT NULL,
    FOREIGN KEY (idclient) REFERENCES client(id) ,
    FOREIGN key (idcreneaux) REFERENCES creneaux(id) 
);
INSERT INTO creneaux (creneaux) values ('de 10 h à 10:30h'),('de 11 h à 11:30h'),('de 14 h à 14:30h'),('de 15 h à 15:30h'),('de 16 h à 16:30h');

