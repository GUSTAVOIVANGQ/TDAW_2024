<?php
include("../db.php");

// Obtener todas las categorías
$sql_categories = "SELECT cat_id, cat_title FROM categories";
$result_categories = $con->query($sql_categories);

$category_list = [];
if ($result_categories->num_rows > 0) {
    while($row = $result_categories->fetch_assoc()) {
        $category_list[] = $row;
    }
}

// Obtener ingresos por producto y categoría
$sql_income = "SELECT p.product_title, c.cat_id, c.cat_title, SUM(o.total_amount) as revenue
               FROM orders o
               JOIN products p ON o.product_id = p.product_id
               JOIN categories c ON p.product_cat = c.cat_id
               GROUP BY o.product_id, c.cat_id
               ORDER BY revenue DESC";

$result_income = $con->query($sql_income);

$product_revenue = [];
if ($result_income->num_rows > 0) {
    while($row = $result_income->fetch_assoc()) {
        $product_revenue[] = $row;
    }
}

$con->close();

$category_list_json = json_encode($category_list);
$product_revenue_json = json_encode($product_revenue);
?>