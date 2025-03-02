<?php
// Opret (eller åbn) en lokal SQLite-database
$db = new PDO('sqlite:webshop.db');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Opret nødvendige tabeller
$tables = [
    "CREATE TABLE IF NOT EXISTS produkter (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        navn TEXT,
        Pris FLOAT,
        product_type TEXT,
        billede TEXT
    )",
    "CREATE TABLE IF NOT EXISTS ordrer (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        order_id INT,
        date DATE,
        product_name TEXT
    )",
    "CREATE TABLE IF NOT EXISTS dato (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        order_id INT,
        date DATE
    )",
    "CREATE TABLE IF NOT EXISTS bruger (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT,
        password TEXT,
        email TEXT,
        loaktion TEXT
    )",
    "CREATE TABLE IF NOT EXISTS økonomi (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        product_name TEXT,
        date DATE,
        old_profit_margins FLOAT,
        old_pris FLOAT
    )"
];

foreach ($tables as $table) {
    $db->exec($table);
}

// Indsæt testdata
$insert = "INSERT INTO produkter (navn, Pris, product_type, billede) VALUES
    ('Philips Diamondclean 9000', 1493, 'Tandbørste', 'https://images.philips.com/is/image/philipsconsumer/d714d66d918c4464ae07afb600b2c346?$pnglarge$&wid=960'),
    ('Oral-B Pro 3000 Sensitive', 369, 'Tandbørste', 'https://shop15101.sfstatic.io/upload_dir/shop/_thumbs/Oral-B_80332158_INT_3.w610.h610.fill.wm.d88e511.jpg'),
    ('Oral-B Vitality Pro', 300, 'Tandbørste', ''),
    ('Curaprox Hydrosonic Pro', 1372, 'Tandbørste', ''),
    ('Oral-B iO 10', 2900, 'Tandbørste', ''),
    ('FineSmile IQ', 599, 'Tandbørste', ''),
    ('Colgate Mundskyl Plax Cool Mint 500ml', 40, 'Mundskyl', ''),
    ('Oral-B Glide 30 stk', 79, 'Tandtråd', ''),
    ('Faaborg Pharma Relief+ Repair Creme 30ml', 55, 'Fluorcreme', ''),
    ('Zendium Classic', 25, 'Tandpasta', ''),
    ('V6 Tyggegummi Oral-B Spearmint', 15, 'Tyggegummi', '')";

$db->exec($insert);

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
            background-color: #f8f8f8;
            padding: 15px;
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
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
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
        <h1>Webshop</h1>
    </div>
    
    <div class="container">
        <h2>Produkter</h2>
        <div class="products">
            <?php
            // Hent produkter fra databasen
            $stmt = $db->query("SELECT navn, Pris, billede FROM produkter");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='product'>";
                echo "<img src='" . ($row["billede"] ?: "https://via.placeholder.com/200") . "' alt='" . $row["navn"] . "'>";
                echo "<h3>" . $row["navn"] . "</h3>";
                echo "<p>Pris: " . $row["Pris"] . " DKK</p>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
</body>
</html>
