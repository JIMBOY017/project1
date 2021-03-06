CREATE DATABASE erd;

CREATE TABLE books(
	id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	title varchar(255),
    author_id INT NOT NULL,
    FOREIGN KEY (author_id) REFERENCES authors(id),
    publishing_year varchar(255),
    genre varchar(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE authors(
	id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    first_name varchar(255),
    last_name varchar(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE favourites(
	id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    book_id INT NOT NULL,
    FOREIGN KEY (book_id) REFERENCES books(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE users(
	id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username varchar(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);