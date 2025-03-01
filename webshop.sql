CREATE TABLE ´økonomi´ (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    product_name TEXT,
    date DATE,
    old_profit_margins FLOAT,
    old_pris FLOAT
);

CREATE TABLE bruger (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    name TEXT,
    password TEXT,
    email TEXT,
    loaktion TEXT
);

CREATE TABLE ordrer (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    date DATE,
    product_name TEXT
);

CREATE TABLE dato (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    date DATE
);

CREATE TABLE produkter (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    navn TEXT,
    Pris FLOAT,
    product_type TEXT
);

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

INSERT INTO ordrer (order_id, product_name) VALUES
(1, 'V6 Tyggegummi Oral-B Spearmint'),
(1, 'V6 Tyggegummi Oral-B Spearmint'),
(2, 'Zendium Classic'),
(3, 'Oral-B iO 10'),
(3, 'Zendium Classic'),
(7, 'Philips Diamondclean 9000'),
(4, 'Philips Diamondclean 9000'),
(5, 'Colgate Mundskyl Plax Cool Mint 500ml'),
(6, 'Curaprox Hydrosonic Pro'),
(6, 'Curaprox Hydrosonic Pro');

INSERT INTO dato (order_id, date) VALUES
(1, '2020-07-25'),
(2, '2024-01-02'),
(3, '2024-01-02'),
(4, '2024-02-21'),
(5, '2025-02-01'),
(6, '2025-02-12'),
(7, '2024-01-13');

INSERT INTO bruger (name, password, email, loaktion) VALUES
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

INSERT INTO ´økonomi´ (product_name, date, old_profit_margins, old_pris) VALUES
('Oral-B Pro 3000 Sensitive', '2025-03-01', 0.3, 339.95),
('Oral-B Pro 3000 Sensitive', '2026-03-01', 0.4, 400),
('Colgate Mundskyl Plax Cool Mint 500ml', "2025-05-23". 0.2, 45),
('Colgate Mundskyl Plax Cool Mint 500ml', "2026-05-23". 0.2, 49.99),