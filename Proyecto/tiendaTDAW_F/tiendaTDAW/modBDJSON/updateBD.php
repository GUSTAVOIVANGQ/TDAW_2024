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

// Iterar sobre cada producto en el JSON
foreach ($data['products'] as $product) {
    // Obtener los datos del producto
    $id = isset($product['id']) ? mysqli_real_escape_string($con, $product['id']) : '';
    $id_cat = isset($product['id_cat']) ? mysqli_real_escape_string($con, $product['id_cat']) : '';
    $id_brand = isset($product['id_brand']) ? mysqli_real_escape_string($con, $product['id_brand']) : '';
    $title = isset($product['title']) ? mysqli_real_escape_string($con, $product['title']) : '';
    $price = isset($product['price']) ? mysqli_real_escape_string($con, $product['price']) : '';
    $description = isset($product['description']) ? mysqli_real_escape_string($con, $product['description']) : '';
    $stock = isset($product['stock']) ? mysqli_real_escape_string($con, $product['stock']) : '';
    $image = isset($product['thumbnail']) ? mysqli_real_escape_string($con, $product['thumbnail']) : '';
    $tags = isset($product['tags']) ? mysqli_real_escape_string($con, implode(", ", $product['tags'])) : '';

    // Debugging: Print the values to check
    echo "ID: $id, Category: $id_cat, Brand: $id_brand, Title: $title, Price: $price, Description: $description, Stock: $stock, Image: $image, Tags: $tags <br>";
    
    // Preparar la consulta SQL para insertar los datos del producto en la tabla
    $sql = "INSERT INTO products (product_id, product_cat, product_brand, product_title, product_price, description, stock, product_image, product_keywords) 
            VALUES ('$id', '$id_cat', '$id_brand', '$title', '$price', '$description', '$stock', '$image', '$tags')";

    // Ejecutar la consulta
    if (mysqli_query($con, $sql)) {
        echo "Producto insertado correctamente: $title <br>";
    } else {
        echo "Error al insertar producto: " . mysqli_error($con) . "<br>";
    }
}

// Cerrar la conexión
mysqli_close($con);

?>
