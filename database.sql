CREATE DATABASE mydatabase;
USE mydatabase;

CREATE TABLE db_form (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255),
    phone VARCHAR(255) UNIQUE,
    password VARCHAR(255)
	subscription_range  INT
);
/*CREATE TABLE debit_form (
    fullname VARCHAR(255),
    email VARCHAR(255),
    Address VARCHAR(255),
    City VARCHAR(255),
    Country VARCHAR(255),
    zip code VARCHAR(255),
    cco VARCHAR(255),
    ccn VARCHAR(255) AUTO_INCREMENT PRIMARY KEY,
    ccv INT,
    year INT,
    month INT
);*/

CREATE TABLE newsletter_form (
   user VARCHAR(255),
   email VARCHAR(255)


)


