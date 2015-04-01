USE books_review;

DROP TABLE IF EXISTS users;

CREATE TABLE users (
 id INTEGER PRIMARY KEY AUTO_INCREMENT,
 email VARCHAR(60) NOT NULL,
 first_name VARCHAR(60) NOT NULL,
 last_name VARCHAR(60) NOT NULL,
 password VARCHAR(128) NOT NULL,
 created_at DATETIME
);


 
 
 
 