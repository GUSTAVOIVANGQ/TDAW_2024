<?php

// Leer el contenido del archivo tienda.json
$json_file = './../js/tiendaJSON.json';
$json_data = file_get_contents($json_file);

// Decodificar el JSON en un array de PHP
$data = json_decode($json_data, true);

$id_cat_counter = 1;
$id_brand_counter = 1;
$category_ids = [];
$brand_ids = [];

foreach ($data['products'] as &$product) {
    // Asignar ID a la categoría
    if (isset($product['category'])) {
        $categoria = $product['category'];
        if (!isset($category_ids[$categoria])) {
            $category_ids[$categoria] = $id_cat_counter++;
        }
        $product['id_cat'] = $category_ids[$categoria];
    } else {
        // Si no existe la categoría, asignar un ID especial (opcional)
        $product['id_cat'] = 0; // o $product['id_cat'] = 0;
    }

    // Asignar ID a la marca
    if (isset($product['brand'])) {
        $marca = $product['brand'];
        if (!isset($brand_ids[$marca])) {
            $brand_ids[$marca] = $id_brand_counter++;
        }
        $product['id_brand'] = $brand_ids[$marca];
    } else {
        // Si no existe la marca, asignar un ID especial (opcional)
        $product['id_brand'] = null; // o $product['id_brand'] = 0;
    }
}

// Codificar el array de PHP de vuelta a JSON
$new_json = json_encode($data, JSON_PRETTY_PRINT);

// Escribir el nuevo JSON de vuelta al archivo
file_put_contents($json_file, $new_json);

echo "Archivo JSON actualizado con id_cat e id_brand para cada producto.";
?>
