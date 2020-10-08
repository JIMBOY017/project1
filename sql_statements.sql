DROP DATABASE project1;

CREATE DATABASE project1;

use project1;

CREATE TABLE account(
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    gebruikersnaam varchar(255) UNIQUE,
    email varchar(255) UNIQUE,
    type int NOT NULL,
    FOREIGN KEY (type) REFERENCES usertype(id),
    password varchar(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE usertype(
	id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    type varchar(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE persoon(
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    voornaam varchar(255),
    tussenvoegsel varchar(255),
    achternaam varchar(255),
    account_id int NOT NULL,
    FOREIGN KEY (account_id) REFERENCES account(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

SELECT * FROM `account` WHERE 1;

INSERT INTO account(email, password)
VALUES('admin@talnet.nl', 'Test89');