<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employee_id = $_POST['employee_id'];
    $shift_date = $_POST['shift_date'];
    $shift_type = $_POST['shift_type'];

    $sql = "INSERT INTO shifts (employee_id, shift_date, shift_type)
            VALUES ('$employee_id', '$shift_date', '$shift_type')";

    if ($conn->query($sql) === TRUE) {
        echo "Η βάρδια ανατέθηκε επιτυχώς!";
    } else {
        echo "Σφάλμα: " . $conn->error;
    }
}

$employees = $conn->query("SELECT * FROM employees");
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Ανάθεση Βάρδιας</title>
</head>
<body>

<h2>Ανάθεση Βάρδιας</h2>

<form method="POST">

    Εργαζόμενος:<br>
    <select name="employee_id" required>
        <?php while($row = $employees->fetch_assoc()) { ?>
            <option value="<?php echo $row['id']; ?>">
                <?php echo $row['name']; ?>
            </option>
        <?php } ?>
    </select><br><br>

    Ημερομηνία:<br>
    <input type="date" name="shift_date" required><br><br>

    Τύπος Βάρδιας:<br>
    <select name="shift_type">
        <option>Πρωινή</option>
        <option>Απογευματινή</option>
        <option>Νυχτερινή</option>
    </select><br><br>

    <input type="submit" value="Ανάθεση">

</form>

<br>
<a href="index.php">Επιστροφή</a>

</body>
</html>