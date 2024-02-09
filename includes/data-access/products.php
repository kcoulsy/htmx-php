<?php

include_once __DIR__ . '/db.php';

function get_products($page = 1, $shown = 10) {
    $db = new DB();
    $sql = "SELECT * FROM products LIMIT " . ($page - 1) * $shown . ", $shown";
    $response = $db->query($sql);

    $products = $response->fetchAll(PDO::FETCH_ASSOC);

    return $products;
}

function get_total_products() {
    $db = new DB();
    $sql = "SELECT COUNT(*) as total FROM products";
    $response = $db->query($sql);

    $total = $response->fetch(PDO::FETCH_ASSOC);

    return $total['total'];
}