<?php

require ('../includes/setup.php');

// set up product table if it doesn't exist

$db = new DB();

$sql = "CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    price INT(6) NOT NULL
)";

$db->query($sql);

// insert products if table is empty
$product_types = ["Shirt", "Pants", "Shoes", "Hat", "Gloves", "Jacket", "Socks", "Belt", "Scarf", "Sweater"];
$adjectives = ["Stylish", "Comfortable", "Cozy", "Elegant", "Casual", "Sporty", "Trendy", "Classic", "Modern", "Fancy"];

# Generate 100 random product names
$product_names = [];

for ($i = 0; $i < 100; $i++) {
    $product_names[] = $adjectives[array_rand($adjectives)] . " " . $product_types[array_rand($product_types)];
}

# Generate 100 random prices
$product_prices = [];

for ($i = 0; $i < 100; $i++) {
    $product_prices[] = rand(10, 1000);
}


$sql = "SELECT * FROM products";

$result = $db->query($sql);

if ($result->rowCount() == 0) {
    for ($i = 0; $i < 100; $i++) {
        $sql = "INSERT INTO products (name, price) VALUES ('$product_names[$i]', $product_prices[$i])";
        $db->query($sql);
    }
}
