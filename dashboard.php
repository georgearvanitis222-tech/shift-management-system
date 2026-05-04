<?php
include 'db.php';

$totalEmployees = $conn->query("SELECT COUNT(*) as total FROM employees")->fetch_assoc()['total'];
$totalShifts = $conn->query("SELECT COUNT(*) as total FROM shifts")->fetch_assoc()['total'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<header>Dashboard - Σύστημα Διαχείρισης Βαρδιών</header>

<div class="container">

    <div class="dashboard-boxes">
        <div class="dashboard-box">
            Συνολικοί Εργαζόμενοι<br><?php echo $totalEmployees; ?>
        </div>

        <div class="dashboard-box">
            Συνολικές Βάρδιες<br><?php echo $totalShifts; ?>
        </div>
    </div>

    <div class="card">
        <h2>Λειτουργίες Συστήματος</h2>

        <ul>
            <li><a href="add_employee.php">Προσθήκη Εργαζομένου</a></li>
            <li><a href="assign_shift.php">Ανάθεση Βάρδιας</a></li>
            <li><a href="view_shifts.php">Προβολή Βαρδιών</a></li>
            <li><a href="delete_employee.php">Διαγραφή Εργαζομένων</a></li>
        </ul>
    </div>

</div>

</body>
</html>