<?php
include("../db.php");

$sql = "SELECT DATE(order_date) as date, SUM(total_amount) as daily_income
        FROM orders
        GROUP BY DATE(order_date)
        ORDER BY date
        LIMIT 30"; // Limitamos a los últimos 30 días para que el gráfico no sea demasiado denso

$result = $con->query($sql);

$dates = [];
$incomes = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $dates[] = $row["date"];
        $incomes[] = $row["daily_income"];
    }
}

$con->close();

$datesJSON = json_encode($dates);
$incomesJSON = json_encode($incomes);
?>