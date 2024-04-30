<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE product_category='tshirt' LIMIT 4");

$stmt->execute();

$related_products = $stmt->get_result();

?>