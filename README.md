https://itsme-rk.github.io/ONLYX-GYM-MANAGEMENT-SYSTEM/#about-us

link for website .. but u need xampp and phpMyAdmin running


![WhatsApp Image 2024-03-07 at 13 58 30_f72cd5c5](https://github.com/itsme-rk/ONLYX-GYM-MANAGEMENT-SYSTEM/assets/107808330/8b28ed06-530c-4f05-874d-e319f57294ff)
![WhatsApp Image 2024-03-07 at 13 58 29_29df41c0](https://github.com/itsme-rk/ONLYX-GYM-MANAGEMENT-SYSTEM/assets/107808330/afd06ba8-7cee-4340-9aa8-7f952238ec68)
![WhatsApp Image 2024-03-07 at 13 58 32_2b54f4f4](https://github.com/itsme-rk/ONLYX-GYM-MANAGEMENT-SYSTEM/assets/107808330/7676729b-97a4-4ea7-bf24-d768da28d9f9)
![WhatsApp Image 2024-03-07 at 13 58 32_630347d3](https://github.com/itsme-rk/ONLYX-GYM-MANAGEMENT-SYSTEM/assets/107808330/a94367fd-e804-4208-b076-c5f7fc8adcad)
![WhatsApp Image 2024-03-07 at 13 58 31_8a6ec080](https://github.com/itsme-rk/ONLYX-GYM-MANAGEMENT-SYSTEM/assets/107808330/8e0bddd5-5d86-4803-9a62-5c4428491252)
![WhatsApp Image 2024-03-07 at 13 58 31_14778a89](https://github.com/itsme-rk/ONLYX-GYM-MANAGEMENT-SYSTEM/assets/107808330/afd754dc-f5c4-48ff-b488-13ec41ce8ea5)
![image](https://github.com/itsme-rk/ONLYX-GYM-MANAGEMENT-SYSTEM/assets/107808330/4cd9e739-e0e2-4a17-a9b0-e5424d7210d4)
![image](https://github.com/itsme-rk/ONLYX-GYM-MANAGEMENT-SYSTEM/assets/107808330/6cf7c9e5-b7f4-4a88-8419-f10f8f269b48)

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

CREATE TABLE Billing (
    billing ID INT AUTO_INCREMENT PRIMARY KEY,
    Member_ID INT,
    Plan VARCHAR(100),
    Amount DECIMAL(10, 2),
    Billing_Date DATE,
    Payment_Option VARCHAR(100),
    FOREIGN KEY (Member_ID) REFERENCES Member(ID)
);

CREATE TABLE Membership (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Plan VARCHAR(100),
    Monthly_Price DECIMAL(10, 2),
    Annual_Price DECIMAL(10, 2),
    Access VARCHAR(255)
);
CREATE TABLE `receptionist` (
  `id` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `address` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE Schedule (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Day VARCHAR(100),
    Workout_Type VARCHAR(255),
    Diet_Plan VARCHAR(255)
);

CREATE TABLE Signup (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(100) UNIQUE,
    Password VARCHAR(255)
);

CREATE TABLE JoinUsSubmissions (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255) NOT NULL,
    Email VARCHAR(255) NOT NULL,
    Phone VARCHAR(20) NOT NULL,
    Position VARCHAR(20) NOT NULL,
    ResumePath VARCHAR(255) NOT NULL,
    Message TEXT,
    SubmissionTime TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
