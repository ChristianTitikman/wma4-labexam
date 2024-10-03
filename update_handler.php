<?php
$conn = new mysqli('localhost', 'root', '', 'lab_exam');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $date_of_birth = $_POST['date_of_birth'];
    $section = $_POST['section'];

    $sql = "UPDATE students SET first_name='$first_name', last_name='$last_name', date_of_birth='$date_of_birth', section='$section' WHERE student_id='$student_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Student updated successfully.";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
header("Location: index.php"); // Redirect back to the main page
?>