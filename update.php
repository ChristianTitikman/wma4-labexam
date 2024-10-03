<?php
$conn = new mysqli('localhost', 'root', '', 'lab_exam');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'];

    // Fetch current student data for the form
    $sql = "SELECT * FROM students WHERE student_id='$student_id'";
    $result = $conn->query($sql);
    $student = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
</head>
<body>
    <h1>Update Student</h1>
    <form action="update_handler.php" method="POST">
        <input type="hidden" name="student_id" value="<?php echo $student['student_id']; ?>">
        <input type="text" name="first_name" value="<?php echo $student['first_name']; ?>" required>
        <input type="text" name="last_name" value="<?php echo $student['last_name']; ?>" required>
        <input type="date" name="date_of_birth" value="<?php echo $student['date_of_birth']; ?>" required>
        <input type="text" name="section" value="<?php echo $student['section']; ?>" required>
        <button type="submit">Update Student</button>
    </form>
</body>
</html>