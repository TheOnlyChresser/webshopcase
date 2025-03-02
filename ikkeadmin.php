<?php
// Opret (eller åbn) en lokal SQLite-database
$db = new PDO('sqlite:webshop.db');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Opret nødvendige tabeller
$tables = [
    "CREATE TABLE IF NOT EXISTS produkter (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        navn TEXT,
        Pris FLOAT,
        product_type TEXT,
        billede TEXT
    )",
    "CREATE TABLE IF NOT EXISTS ordrer (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        order_id INT,
        date DATE,
        product_name TEXT
    )",
    "CREATE TABLE IF NOT EXISTS dato (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        order_id INT,
        date DATE
    )",
    "CREATE TABLE IF NOT EXISTS bruger (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        name TEXT,
        password TEXT,
        email TEXT,
        loaktion TEXT
    )",
    "CREATE TABLE IF NOT EXISTS økonomi (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
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
    ('Oral-B Vitality Pro', 300, 'Tandbørste', 'https://images.matas.dk/trs/w1780//encode/4210201432326.jpg'),
    ('Curaprox Hydrosonic Pro', 1372, 'Tandbørste', 'https://images.matas.dk/trs/w1780//Assets_v3/600001-700000/660001-661000/660101-660200/660155/product_v1_x2.jpg'),
    ('Oral-B iO 10', 2900, 'Tandbørste', https://csdam.net/data/jpg/0/d42a6582/d42a6582-c5ba-4a07-aabb-2427559ab1a7.jpg'),
    ('FineSmile IQ', 599, 'Tandbørste', 'https://finesmile.dk/cdn/shop/products/Stanalone_Gray_2compressed_540x.png?v=1664187003'),
    ('Colgate Mundskyl Plax Cool Mint 500ml', 40, 'Mundskyl', 'https://images.matas.dk/trs/w1780//encode/726320_1_20240904124242.jpg'),
    ('Oral-B Glide 30 stk', 79, 'Tandtråd', 'https://shop15101.sfstatic.io/upload_dir/shop/_thumbs/1-2722.w610.h610.fill.wm.d88e511.jpg'),
    ('Faaborg Pharma Relief+ Repair Creme 30ml', 55, 'Fluorcreme', 'https://ugleapotek.dk/wp-content/uploads/2024/03/227153-faaborg-relief-repair-creme.jpg'),
    ('Zendium Classic', 25, 'Tandpasta', 'https://apoteka.cloud12.structpim.com/media/k5xl03o3/219511.jpg?width=425&quality=85'),
    ('V6 Tyggegummi Oral-B Spearmint', 15, 'Tyggegummi', 'https://shop15101.sfstatic.io/upload_dir/shop/_thumbs/v6-spearmint.w610.h610.fill.wm.d88e511.jpg')";

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
        .vamu {
    display:flex;
    list-style: none;
}

.vamu li {
    position: relative;
    margin: 15px;
    margin-bottom: 0px;
    margin-top: 0px;
}

.vamu li a {
    top: 0px;
    text-decoration: none;
    color: #000000;
    font-size: 16px;
    padding: 5px;
    position: relative;
    cursor: pointer;
}

.vamu li a::after {
    content: "";
    position: absolute;
    width: 0;
    height: 3px;
    background-color: #4A8DD3;
    bottom: 0;
    left: 50%;
    transition: all 0.3s ease;
}

.vamu li a:hover::after {
    width: 100%;
    left: 0;
}

.vamu li a:hover {
    color: #4A8DD3;
}

.vamu li .menu {
    position: absolute;
    top: 23px;
    left: 0;
    background-color: #FEFEFE;
    list-style: none;
    display: none;
    padding: 10px;
    min-width: 150px;
    z-index: 100;
}

.vamu li:hover .menu {
    display: block;
}

.menu li {
    margin-bottom: 10px;
}

.menu li:last-child {
    margin-bottom: 0;
}

.menu li a {
    color: #000000;
    padding-left: 5px;
    padding-right:5px ;
    padding-top:10px;
    padding-bottom: 10px;
    display: block;
}

.menu li a:hover {
    background-color: #FEFEFE;
    color: #4A8DD3;
}

.vamu li a.active {
    color: #4A8DD3
}

.vamu li a.active:after {
    width: 100%;
    left: 0px;
    background-color: #4A8DD3;
}
    </style>
</head>
<body>
    <div class="topbar">
        <ul class="vamu">
            <li><a href="ikkeadmin.html" class="active">Forsiden</a></li>
            <li>
                <a>Produkter</a>
                <ul class="menu">
                    <li><a href="tandboerster.php">Tandbørster</a></li>
                    <li><a href="tandpasta.php">Tandpasta</a></li>
                    <li><a href="mundskyl.php">Mundskyl</a></li>
                    <li><a href="tandtraed.php">Tandtråd</a></li>
                    <li><a href="fluorcreme.php">Fluorcreme</a></li>
                </ul>
            </li>
            <li>
                <a href="populaere.php">De populære</a>
            </li>
            <li><a href="kontakt.php">Kontakt</a></li>
        </ul>
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
