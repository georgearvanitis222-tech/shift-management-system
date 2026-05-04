<?php
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == "admin" && $password == "1234") {
        $_SESSION['admin'] = true;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Λάθος στοιχεία σύνδεσης!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<header>Admin Login</header>

<div class="container">
    <div class="card">

        <h2>Σύνδεση Διαχειριστή</h2>

        <?php if($error) echo "<p style='color:red; text-align:center;'>$error</p>"; ?>

        <form method="POST">

            Username:
            <input type="text" name="username" required>

            Password:
            <input type="password" name="password" required>

            <input type="submit" value="Login">

        </form>

    </div>
</div>

</body>
</html>