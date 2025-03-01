<?php
// Databasekonfiguration - tilpas disse værdier til dit miljø
$host = "localhost";
$username = "root";
$password = ""; // Indsæt dit MySQL-password
$dbname = "testdb"; // Navnet på din database

// Opret forbindelse
$conn = new mysqli($host, $username, $password, $dbname);

// Tjek forbindelsen
if ($conn->connect_error) {
    die("Forbindelsen mislykkedes: " . $conn->connect_error);
}

// SQL-kode til oprettelse af tabeller og indsættelse af testdata
$sql = "
-- Drop eksisterende tabeller (hvis de findes)
DROP TABLE IF EXISTS økonomi;
DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS ordrer;
DROP TABLE IF EXISTS produkter;

-- Opret tabellen 'økonomi'
CREATE TABLE økonomi (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    product_name TEXT,
    date DATE,
    old_profit_margins FLOAT,
    old_pris FLOAT
);

-- Opret tabellen 'user'
CREATE TABLE user (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    name TEXT,
    password TEXT,
    email TEXT,
    loaktion TEXT
);

-- Opret tabellen 'ordrer'
CREATE TABLE ordrer (
    id INTEGER PRIMARY KEY,
    date DATE,
    product_name TEXT
);

-- Opret tabellen 'produkter'
CREATE TABLE produkter (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    navn TEXT,
    Pris FLOAT,
    product_type TEXT
);

-- Indsæt data i 'produkter'
INSERT INTO produkter (navn, Pris, product_type) VALUES
('Philips Diamondclean 9000', 1493, 'Tandbørste'),
('Oral-B Pro 3000 Sensitive', 369, 'Tandbørste'),
('Oral-B Vitality', 300, 'Tandbørste'),
('Curaprox Hydrosonic Pro', 1372, 'Tandbørste'),
('Oral-B iO 10', 2900, 'Tandbørste'),
('FineSmile IQ', 599, 'Tandbørste'),
('Colgate Mundskyl Plax Cool Mint 500ml', 40, 'Mundskyl'),
('Oral-B Glide 30 stk', 79, 'Tandtråd'),
('Faaborg Pharma Relief+ Repair Creme 30ml', 55, 'Fluorcreme'),
('Zendium Classic', 25, 'Tandpasta'),
('V6 Tyggegummi Oral-B Spearmint', 15, 'Tyggegummi');

-- Indsæt data i 'ordrer'
INSERT INTO ordrer (id, date, product_name) VALUES
(1, '2020-07-25', 'V6 Tyggegummi Oral-B Spearmint'),
(1, '2020-07-25', 'V6 Tyggegummi Oral-B Spearmint'),
(2, '2024-01-02', 'Zendium Classic'),
(3, '2024-01-02', 'Oral-B iO 10'),
(3, '2024-01-02', 'Zendium Classic'),
(7, '2024-01-13', 'Philips Diamondclean 9000'),
(4, '2024-02-21', 'Philips Diamondclean 9000'),
(5, '2025-02-01', 'Colgate Mundskyl Plax Cool Mint 500ml'),
(6, '2025-02-12', 'Curaprox Hydrosonic Pro'),
(6, '2025-02-12', 'Curaprox Hydrosonic Pro');

-- Indsæt data i 'user'
INSERT INTO user (name, password, email, loaktion) VALUES
('John Doe', 'password123', 'john.doe@example.com', '123 Maple Street, Springfield, IL 62701, USA'),
('Jane Smith', 'securePass!', 'jane.smith@example.com', '456 Oak Avenue, London, SW1A 1AA, UK'),
('Michael Brown', 'myPass123', 'michael.brown@example.com', '789 Pine Road, Sydney, NSW 2000, Australia'),
('Emily Johnson', 'emilyPwd', 'emily.johnson@example.com', '1010 Birch Lane, Toronto, ON M5H 2N2, Canada'),
('Robert Miller', 'robPass', 'robert.miller@example.com', 'Hauptstraße 12, 10115 Berlin, Germany'),
('Laura Garcia', 'lauraPass', 'laura.garcia@example.com', '34 Rue de la République, 75001 Paris, France'),
('James Anderson', 'james123', 'james.anderson@example.com', '56 MG Road, Mumbai, Maharashtra 400001, India'),
('Linda Thomas', 'linda456', 'linda.thomas@example.com', '3-2-1 Shibuya, Tokyo 150-0002, Japan'),
('David Williams', 'davidpwd', 'david.williams@example.com', 'Avenida Paulista, 1000, São Paulo, SP 01310-100, Brazil'),
('Sarah Davis', 'sarahPass', 'sarah.davis@example.com', '78 Nelson Mandela Boulevard, Johannesburg, 2001, South Africa');

-- Eksempel på en SELECT-query:
SELECT * FROM produkter;
";

// Udfør SQL-koden (flere queries)
if ($conn->multi_query($sql)) {
    // Loop igennem alle resultatsættene (ingen output her)
    do {
        // Tomt, vi behøver ikke at gøre noget for de ikke-resultat-queries
    } while ($conn->more_results() && $conn->next_result());
    echo "SQL-koden blev kørt succesfuldt.<br><br>";
} else {
    echo "Fejl under kørsel af SQL-koden: " . $conn->error;
}

// Kør en SELECT-query for at hente data fra 'produkter'
$query = "SELECT * FROM produkter";
$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    echo "<h2>Liste over produkter:</h2>";
    echo "<table border='1' cellpadding='5'>";
    echo "<tr><th>ID</th><th>Navn</th><th>Pris</th><th>Product Type</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['navn'] . "</td>";
        echo "<td>" . $row['Pris'] . "</td>";
        echo "<td>" . $row['product_type'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Ingen produkter fundet.";
}

// Luk forbindelsen
$conn->close();
?>
