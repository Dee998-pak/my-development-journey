CREATE DATABASE IF NOT EXISTS student_management;
USE student_management;

CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    course VARCHAR(100) NOT NULL,
    age INT NOT NULL
);

INSERT INTO students (name,email,phone,course,age) VALUES
('Rahul','rahul@example.com','9876543210','MCA',22),
('Amrita','amrita@example.com','9876501234','MCA',23),
('Deepak','deepak@example.com','9876512345','MCA',22);
