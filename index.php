<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Enrollment</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        button {
            margin: 5px;
        }
    </style>
</head>
<body>


<!--CREATE DATABASE school;

USE school;

CREATE TABLE students (
    student_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    date_of_birth DATE,
    section VARCHAR(10)
);

CREATE TABLE subjects (
    subject_id INT AUTO_INCREMENT PRIMARY KEY,
    subject_title VARCHAR(100),
    subject_desc TEXT,
    instructor VARCHAR(100)
);

CREATE TABLE enrollment (
    enrollment_id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT,
    subject_id INT,
    date_of_enrollment DATE,
    FOREIGN KEY (student_id) REFERENCES students(student_id),
    FOREIGN KEY (subject_id) REFERENCES subjects(subject_id)
);-->
    <h1>Student Enrollment Form</h1>
    <form action="insert.php" method="POST">
        <input type="text" name="first_name" placeholder="First Name" required>
        <input type="text" name="last_name" placeholder="Last Name" required>
        <input type="date" name="date_of_birth" required>
        <input type="text" name="section" placeholder="Section" required>
        <button type="submit">Add Student</button>
    </form>

    <h2>Students List</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Date of Birth</th>
                <th>Section</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- PHP code to fetch and display students from database will go here -->
            <?php
            // Connect to the database
            $conn = new mysqli('localhost', 'root', '', 'lab_exam');

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch students
            $sql = "SELECT * FROM students";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['student_id']}</td>
                            <td>{$row['first_name']}</td>
                            <td>{$row['last_name']}</td>
                            <td>{$row['date_of_birth']}</td>
                            <td>{$row['section']}</td>
                            <td>
                                <form action='update.php' method='POST' style='display:inline;'>
                                    <input type='hidden' name='student_id' value='{$row['student_id']}'>
                                    <button type='submit'>Update</button>
                                </form>
                                <form action='delete.php' method='POST' style='display:inline;'>
                                    <input type='hidden' name='student_id' value='{$row['student_id']}'>
                                    <button type='submit'>Delete</button>
                                </form>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No students found</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>