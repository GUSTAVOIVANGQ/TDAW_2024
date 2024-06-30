<?php include("./chartjs/get_global_income.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresos Globales</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Incluir el adaptador de fecha después de Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns"></script></head>
<body>
<div style="width: 80%; margin: auto;">
        <canvas id="globalIncomeChart"></canvas>
    </div>
    <script>
    var datesData = <?php echo $datesJSON; ?>;
    var incomesData = <?php echo $incomesJSON; ?>;
    </script>
    <script src="./chartjs/income_chart_script.js"></script>
</body>
</html>







