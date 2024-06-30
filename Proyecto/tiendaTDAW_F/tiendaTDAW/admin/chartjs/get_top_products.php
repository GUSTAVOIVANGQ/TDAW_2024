<?php
include("../db.php");

$sql = "SELECT p.product_title, SUM(o.quantity) as total_sold
        FROM orders o
        JOIN products p ON o.product_id = p.product_id
        GROUP BY o.product_id
        ORDER BY total_sold DESC
        LIMIT 5";

$result = $con->query($sql);

$products = [];
$sales = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $products[] = $row["product_title"];
        $sales[] = $row["total_sold"];
    }
}

$con->close();

$productsJSON = json_encode($products);
$salesJSON = json_encode($sales);
?>