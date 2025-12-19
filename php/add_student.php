<?php
session_start();
if (!isset($_SESSION['admin'])) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit();
}

require "db.php";

$matricule = $_POST['matricule'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$date_naissance = $_POST['datenss'];
$email = $_POST['email'];
$specialisation = $_POST['specialite'];

$query = $conn->prepare("INSERT INTO students (matricule, nom, prenom, date_naissance, email, specialisation) VALUES (?, ?, ?, ?, ?, ?)");
$query->bind_param("ssssss", $matricule, $nom, $prenom, $date_naissance, $email, $specialisation);

if ($query->execute()) {
    echo json_encode(['success' => true, 'message' => 'Student added successfully']);
} else {
    echo json_encode(['success' => false, 'message' => 'Error: ' . $conn->error]);
}

$query->close();
$conn->close();
?>