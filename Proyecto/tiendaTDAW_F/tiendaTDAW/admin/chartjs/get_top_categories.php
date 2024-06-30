<?php
include("../db.php");

$sql = "SELECT c.cat_title, SUM(o.quantity) as total_sold
        FROM orders o
        JOIN products p ON o.product_id = p.product_id
        JOIN categories c ON p.product_cat = c.cat_id
        GROUP BY c.cat_id
        ORDER BY total_sold DESC
        LIMIT 5";

$result = $con->query($sql);

$categories = [];
$sales = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $categories[] = $row["cat_title"];
        $sales[] = $row["total_sold"];
    }
}

$con->close();

$categoriesJSON = json_encode($categories);
$salesJSON = json_encode($sales);
?>