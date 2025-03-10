<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    try {
        $conn = new PDO("sqlite:webshop.db");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            $message = "Registration successful! Redirecting to login page...";
            header("refresh:3;url=login.php"); // Redirect after 3 seconds
        } else {
            $message = "Error: Could not execute the query.";
        }
    } catch(PDOException $e) {
        $message = "Error: " . $e->getMessage();
    }

    $conn = null;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <input type="submit" value="Register">
    </form>
    <?php
    if ($message != "") {
        echo "<p>$message</p>";
    }
    ?>
</body>
</html>