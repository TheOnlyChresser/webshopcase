<?php
// Databaseforbindelsesindstillinger til Azure SQL Database
$serverName = "webshopcasedata.database.windows.net,1433";
$database   = "webshopcasedata"; // Dit databasenavn
$username   = "nikchre";
$password   = "Admin_123";

// DSN til SQL Server med PDO_SQLSRV
$dsn = "sqlsrv:Server=$serverName;Database=$database";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $username, $password, $options);
    echo "Forbindelsen til databasen lykkedes!<br>";
} catch (PDOException $e) {
    die("Databaseforbindelsen mislykkedes: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webshop</title>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        .topbar {
            background-color: #FEFEFE;
            padding: 0px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
        }
        .container {
            margin-top: 80px;
        }
        .products {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .product {
            border: 1px solid #ddd;
            border-radius: 5px;
            margin: 15px;
            padding: 15px;
            width: 200px;
            text-align: center;
            background-color: #fff;
        }
        .product img {
            width: 100%;
            height: auto;
            border-bottom: 1px solid #ddd;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="topbar">
        <ul>
            <li><a href="ikkeadmin.html" class="active">Forsiden</a></li>
            <li><a href="populaere.php">De populære</a></li>
            <li><a href="kontakt.html">Kontakt</a></li>
        </ul>
    </div>
    
    <div class="container">
        <h2>Produkter</h2>
        <div class="products">
            <?php
            try {
                $stmt = $pdo->query("SELECT navn, Pris, billede FROM produkter");
                while ($row = $stmt->fetch()) {
                    echo "<div class='product'>";
                    echo "<img src='" . ($row["billede"] ?: "https://via.placeholder.com/200") . "' alt='" . $row["navn"] . "'>";
                    echo "<h3>" . $row["navn"] . "</h3>";
                    echo "<p>Pris: " . $row["Pris"] . " DKK</p>";
                    echo "</div>";
                }
            } catch (PDOException $e) {
                echo "<p>Fejl ved indlæsning af produkter: " . $e->getMessage() . "</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>