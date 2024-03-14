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

