<?php
include("../db.php");

$sql = "SELECT product_title, stock
        FROM products
        WHERE stock > 0
        ORDER BY stock DESC
        LIMIT 10"; // Limitamos a los 10 productos con más stock para que el gráfico sea legible

$result = $con->query($sql);

$products = [];
$stocks = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $products[] = $row["product_title"];
        $stocks[] = $row["stock"];
    }
}

$con->close();

$productsJSON = json_encode($products);
$stocksJSON = json_encode($stocks);
?>