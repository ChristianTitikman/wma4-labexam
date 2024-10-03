<?php
$conn = new mysqli('localhost', 'root', '', 'lab_exam');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'];

    $sql = "DELETE FROM students WHERE student_id='$student_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Student deleted successfully.";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
header("Location: index.php"); // Redirect back to the main page
?>