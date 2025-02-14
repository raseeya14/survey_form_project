<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "survey_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$age_group = $_POST['age_group'];
$feedback = $_POST['feedback'];

// Insert into database
$sql = "INSERT INTO survey_responses (name, email, gender, age_group, feedback) 
        VALUES ('$name', '$email', '$gender', '$age_group', '$feedback')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Survey submitted successfully!'); window.location.href='index.html';</script>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
