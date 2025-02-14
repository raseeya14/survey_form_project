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

$query = "SELECT age_group, COUNT(*) as count FROM survey_responses GROUP BY age_group";
$result = $conn->query($query);

$data = ["18-25" => 0, "26-35" => 0, "36-50" => 0, "50+" => 0];

while ($row = $result->fetch_assoc()) {
    $data[$row['age_group']] = (int) $row['count'];
}

echo json_encode(array_values($data));

$conn->close();
?>
