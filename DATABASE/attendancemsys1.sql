CREATE DATABASE attendancemsys1;

USE attendancemsys1;

CREATE TABLE teachers (
    teacher_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE students (
    student_id INT AUTO_INCREMENT PRIMARY KEY,
    student_name VARCHAR(100) NOT NULL,
    class_id INT NOT NULL
);

CREATE TABLE attendance (
    attendance_id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT,
    class_id INT,
    date DATE,
    status ENUM('Present', 'Absent'),
    FOREIGN KEY (student_id) REFERENCES students(student_id)
);

INSERT INTO teachers (username, password) VALUES 
('Danish Yadav', 'dani12'),
('Alakh Pandey', 'al23');

INSERT INTO students (student_name, class_id) VALUES
('Abhishek Chauhan', 1),
('Alok Kumawat', 2),
('Adarsh Gupta', 3),
('Virat Kohli', 4),
('Manish Paul', 5),
('rohit Sharma', 6);

INSERT INTO attendance (student_id, class_id, date, status) VALUES
(1, 1, '2024-10-01', 'Present'),
(2, 1, '2024-10-01', 'Absent'),
(3, 2, '2024-10-01', 'Present'),
(4, 2, '2024-10-01', 'Present'),
(5, 1, '2024-10-01', 'Absent'),
(6, 2, '2024-10-01', 'Present'),

(1, 1, '2024-10-02', 'Present'),
(2, 1, '2024-10-02', 'Present'),
(3, 2, '2024-10-02', 'Absent'),
(4, 2, '2024-10-02', 'Present'),
(5, 1, '2024-10-02', 'Present'),
(6, 2, '2024-10-02', 'Absent');
