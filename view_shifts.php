<?php
include 'db.php';

$sql = "SELECT shifts.id, employees.name, employees.department,
        shifts.shift_date, shifts.shift_type
        FROM shifts
        JOIN employees ON shifts.employee_id = employees.id";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Προβολή Βαρδιών</title>
</head>
<body>

<h2>Πρόγραμμα Βαρδιών</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Όνομα</th>
        <th>Τμήμα</th>
        <th>Ημερομηνία</th>
        <th>Βάρδια</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row["id"]."</td>
                    <td>".$row["name"]."</td>
                    <td>".$row["department"]."</td>
                    <td>".$row["shift_date"]."</td>
                    <td>".$row["shift_type"]."</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Δεν υπάρχουν βάρδιες</td></tr>";
    }
    ?>

</table>

<br>
<a href="index.php">Επιστροφή</a>

</body>
</html>