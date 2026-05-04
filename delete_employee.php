<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include 'db.php';

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $conn->query("DELETE FROM shifts WHERE employee_id = $id");
    $conn->query("DELETE FROM employees WHERE id = $id");

    header("Location: delete_employee.php");
    exit();
}

$result = $conn->query("SELECT * FROM employees");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Διαγραφή Εργαζομένων</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<header>Διαχείριση Εργαζομένων</header>

<div class="container">

    <div class="card">
        <h2>Λίστα Εργαζομένων</h2>

        <table>
            <tr>
                <th>ID</th>
                <th>Όνομα</th>
                <th>Τμήμα</th>
                <th>Ενέργεια</th>
            </tr>

            <?php
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row['id']."</td>
                        <td>".$row['name']."</td>
                        <td>".$row['department']."</td>
                        <td>
                            <a class='delete-btn' href='delete_employee.php?delete=".$row['id']."' 
                               onclick=\"return confirm('Είσαι σίγουρος;')\">
                               Διαγραφή
                            </a>
                        </td>
                      </tr>";
            }
            ?>

        </table>

        <div class="back-link">
            <a href='dashboard.php' class="btn">Επιστροφή στο Dashboard</a>
        </div>

    </div>

</div>

</body>
</html>