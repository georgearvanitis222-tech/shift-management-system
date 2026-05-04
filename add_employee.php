<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $department = $_POST['department'];

    $sql = "INSERT INTO employees (name, department)
            VALUES ('$name', '$department')";

    if ($conn->query($sql) === TRUE) {
        echo "Ο εργαζόμενος προστέθηκε!";
    } else {
        echo "Σφάλμα: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Προσθήκη Εργαζομένου</title>
</head>
<body>

<h2>Προσθήκη Εργαζομένου</h2>

<form method="POST">
    Όνομα:<br>
    <input type="text" name="name" required><br><br>

    Τμήμα:<br>
    <input type="text" name="department" required><br><br>

    <input type="submit" value="Καταχώρηση">
</form>

<br>
<a href="index.php">Επιστροφή</a>

</body>
</html>