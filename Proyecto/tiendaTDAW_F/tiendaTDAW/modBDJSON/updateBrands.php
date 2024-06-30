<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "tiendaTDAW";

// Crear conexión
$con = mysqli_connect($servername, $username, $password, $db);

// Verificar conexión
if (!$con) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Leer el contenido del archivo tienda.json
$json_file = './../js/tiendaJSON.json';
$json_data = file_get_contents($json_file);

// Decodificar el JSON en un array de PHP
$data = json_decode($json_data, true);

// Extraer datos únicos de marcas
$brands = [];
foreach ($data['products'] as $product) {
    $id_brand = isset($product['id_brand']) ? mysqli_real_escape_string($con, $product['id_brand']) : '';
    $brand_title = isset($product['brand']) ? mysqli_real_escape_string($con, $product['brand']) : '';

    if ($id_brand && !isset($brands[$id_brand])) {
        $brands[$id_brand] = $brand_title;
    }
}

// Insertar los datos únicos en la tabla
foreach ($brands as $brand_id => $brand_title) {
    // Debugging: Print the values to check
    echo "ID: $brand_id, Title: $brand_title <br>";
    
    // Preparar la consulta SQL para insertar los datos de la marca en la tabla
    $sql = "INSERT INTO brands (brand_id, brand_title) 
            VALUES ('$brand_id', '$brand_title')
            ON DUPLICATE KEY UPDATE brand_title=VALUES(brand_title)";
    
    // Ejecutar la consulta
    if (mysqli_query($con, $sql)) {
        echo "Marca insertada correctamente: $brand_title <br>";
    } else {
        echo "Error al insertar marca: " . mysqli_error($con) . "<br>";
    }
}

// Cerrar la conexión
mysqli_close($con);

?>
