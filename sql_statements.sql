use project1;

CREATE TABLE account(
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    email varchar(255) UNIQUE,
    password varchar(255)
);

CREATE TABLE persoon(
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    voornaam varchar(255),
    tussenvoegsel varchar(255),
    achternaam varchar(255),
    gebruikersnaam varchar(255),
    account_id int NOT NULL,
    FOREIGN KEY (account_id) REFERENCES account(id)
);