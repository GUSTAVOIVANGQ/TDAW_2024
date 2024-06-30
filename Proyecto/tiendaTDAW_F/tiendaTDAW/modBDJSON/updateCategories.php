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

// Leer el contenido del archivo tiendaJSON.json
$json_file = './../js/tiendaJSON.json';
$json_data = file_get_contents($json_file);

// Decodificar el JSON en un array de PHP
$data = json_decode($json_data, true);

// Extraer datos únicos de categorías
$categories = [];
foreach ($data['products'] as $product) {
    $id_cat = isset($product['id_cat']) ? mysqli_real_escape_string($con, $product['id_cat']) : '';
    $cat_title = isset($product['category']) ? mysqli_real_escape_string($con, $product['category']) : '';

    if ($id_cat && !isset($categories[$id_cat])) {
        $categories[$id_cat] = $cat_title;
    }
}

// Insertar los datos únicos en la tabla
foreach ($categories as $cat_id => $cat_title) {
    // Debugging: Print the values to check
    echo "ID: $cat_id, Title: $cat_title <br>";
    
    // Preparar la consulta SQL para insertar los datos de la categoría en la tabla
    $sql = "INSERT INTO categories (cat_id, cat_title) 
            VALUES ('$cat_id', '$cat_title')
            ON DUPLICATE KEY UPDATE cat_title=VALUES(cat_title)";
    
    // Ejecutar la consulta
    if (mysqli_query($con, $sql)) {
        echo "Categoría insertada correctamente: $cat_title <br>";
    } else {
        echo "Error al insertar categoría: " . mysqli_error($con) . "<br>";
    }
}

// Cerrar la conexión
mysqli_close($con);

?>
