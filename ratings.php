<?php
$data = json_decode(file_get_contents("php://input"), true);
$service = $data['service'];
$rating = intval($data['rating']);

// Connect to database
$conn = new mysqli("localhost", "youruser", "yourpass", "yourdb");
$stmt = $conn->prepare("INSERT INTO ratings (service, rating) VALUES (?, ?)");
$stmt->bind_param("si", $service, $rating);
$stmt->execute();
$stmt->close();
$conn->close();
?>