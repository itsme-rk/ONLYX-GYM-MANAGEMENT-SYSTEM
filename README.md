![WhatsApp Image 2024-03-07 at 13 58 30_f72cd5c5](https://github.com/itsme-rk/ONLYX-GYM-MANAGEMENT-SYSTEM/assets/107808330/8b28ed06-530c-4f05-874d-e319f57294ff)
Complete project recent files updated 
for the database part we have used mysql from phpmyadmin xampp
database name "OnlyX"
table

CREATE TABLE Member (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255),
    Username VARCHAR(100) UNIQUE,
    Gender ENUM('male', 'female', 'other'),
    Date_of_Joining DATE,
    Date_of_Birth DATE,
    Phone VARCHAR(20),
    Email VARCHAR(255),
    Coach_ID INT,
    FOREIGN KEY (Coach_ID) REFERENCES Coach(ID)
);

CREATE TABLE coach (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    date DATE NOT NULL,
    experience INT,
    salary DECIMAL(10, 2)
);
