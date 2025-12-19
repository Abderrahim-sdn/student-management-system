<?php
session_start();
if (!isset($_SESSION['admin'])) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit();
}

require "db.php";

$id = $_POST['id'];

$query = $conn->prepare("DELETE FROM students WHERE id=?");
$query->bind_param("i", $id);

if ($query->execute()) {
    echo json_encode(['success' => true, 'message' => 'Student deleted successfully']);
} else {
    echo json_encode(['success' => false, 'message' => 'Error: ' . $conn->error]);
}

$query->close();
$conn->close();
?>