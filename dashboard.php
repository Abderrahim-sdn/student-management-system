<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit();
}

require "php/db.php";

$query = "SELECT * FROM students ORDER BY id DESC";
$result = $conn->query($query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <title>Students DB Management</title>
</head>
<body>
    <main>

        <a href="php/logout.php">
            <div class="logout">
                Logout
                <img src="imgs/logout.png">
            </div>
        </a>

        <table>
            <tr>
                <th>ID</th>
                <th>Matricule</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Date de Naissance</th>
                <th>Email</th>
                <th>Spécialisation</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while($student = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $student['id']; ?></td>
                    <td><?php echo htmlspecialchars($student['matricule']); ?></td>
                    <td><?php echo htmlspecialchars($student['nom']); ?></td>
                    <td><?php echo htmlspecialchars($student['prenom']); ?></td>
                    <td><?php echo htmlspecialchars($student['date_naissance']); ?></td>
                    <td><?php echo htmlspecialchars($student['email']); ?></td>
                    <td><?php echo htmlspecialchars($student['specialisation']); ?></td>
                    <td>
                        <button class="edit-btn" onclick="editStudent(<?php echo $student['id']; ?>)">Edit</button>
                    </td>
                    <td>
                        <button class="delete-btn" onclick="deleteStudent(<?php echo $student['id']; ?>)">Delete</button>
                    </td>
                </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8" style="text-align: center;">No students found</td>
                </tr>
            <?php endif; ?>
        </table>

        <div class="add-student-panel">
            <p class="title">Add New Student</p>
            <hr>

            <form class="inputs" action="">
                <div class="bloc">
                    <label for="matricule">Matricule</label>
                    <input type="text" id="matricule" required>
                </div>

                <div class="bloc">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" required>
                </div>

                <div class="bloc">
                    <label for="prenom">Prenom</label>
                    <input type="text" id="prenom" required>
                </div>

                <div class="bloc">
                    <label for="datenss">Date de Naissance</label>
                    <input type="text" id="datenss" required>
                </div>

                <div class="bloc">
                    <label for="email">Email</label>
                    <input type="text" id="email">
                </div>

                <div class="bloc">
                    <label for="specialite">Spécialisation</label>
                    <input type="text" id="specialite" required>
                </div>
            </form>

            <div class="buttons">
                <button class="cancel-btn">Cancel</button>
                <button class="add-btn">Add</button>
            </div>
        </div>

        <div class="add-student-btn">
            <img src="imgs/add.png" alt="Add Button">
        </div>

    </main>

    <script src="js/script.js"></script>
</body>
</html>