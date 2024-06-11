Complete project recent files updated for the database part we have used mysql from phpmyadmin xampp database name "OnlyX" table

CREATE TABLE Member (
    ID INT(11) AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255),
    username VARCHAR(255),
    gender VARCHAR(10),
    Date_of_Joining DATE,
    Date_of_Birth DATE,
    Phone VARCHAR(15),
    email VARCHAR(255),
    Coach VARCHAR(255)
);

CREATE TABLE coach (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    date DATE,
    experience INT(11),
    salary DECIMAL(10, 2)
);


CREATE TABLE billing (
    billing_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    member_id INT(11),
    plan VARCHAR(50),
    amount DECIMAL(10, 2),
    billing_date DATE,
    payment_option ENUM('cash', 'upi', 'netbanking')
);

CREATE TABLE Membership (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    plan VARCHAR(50),
    monthly_price DECIMAL(10, 2),
    annual_price DECIMAL(10, 2),
    access VARCHAR(50)
);

CREATE TABLE schedule (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    day VARCHAR(50),
    workout_type VARCHAR(100),
    diet_plan VARCHAR(100)
);

CREATE TABLE signup (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    confirm_password VARCHAR(255)
);

CREATE TABLE JoinUsSubmissions (
    ID INT(11) AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255),
    Email VARCHAR(255),
    Phone VARCHAR(20),
    Position VARCHAR(20),
    ResumePath VARCHAR(255),
    Message TEXT,
    SubmissionTime TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE receptionist (
    id VARCHAR(20) PRIMARY KEY,
    name VARCHAR(20),
    date VARCHAR(20),
    address VARCHAR(20),
    phone VARCHAR(20)
);

CREATE TABLE user_details (
    client_ID INT AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(255),
    lname VARCHAR(255),
    gender VARCHAR(11),
    age INT,
    contact_add INT,
    email VARCHAR(255),
    password VARCHAR(255)
);

