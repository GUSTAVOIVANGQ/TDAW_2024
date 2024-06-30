<?php
include "header.php";

if (isset($_SESSION['order'])) {
    $order = $_SESSION['order'];
    $f_name = $order['f_name'];
    $email = $order['email'];
    $city = $order['city'];
    $state = $order['state'];
    $total_count = $order['total_count'];
    $prod_total = $order['prod_total'];
    $cambio = $order['cambio'];
    $products = $order['products'];
} else {
    echo "No se encontraron datos de la orden.";
    exit;
}

// Crear la tabla en PHP
$table_html = '
    <table class="product-table">
        <tr>
            <th>ID del Producto</th>
            <th>Nombre del Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
        </tr>';

foreach ($products as $product) {
    $table_html .= '
        <tr>
            <td>' . $product['product_id'] . '</td>
            <td>' . $product['product_title'] . '</td>
            <td>' . $product['prod_qty'] . '</td>
            <td>' . $product['prod_price'] . '</td>
        </tr>';
}

$table_html .= '
    </table>';

echo '
    <div id="order-summary">
        <h1>Resumen de la Orden</h1>
        <div class="order-details">
            <p><strong>Nombre:</strong> ' . $f_name . '</p>
            <p><strong>Email:</strong> ' . $email . '</p>
            <p><strong>Ciudad:</strong> ' . $city . '</p>
            <p><strong>Estado:</strong> ' . $state . '</p>
            <p><strong>Total de productos:</strong> ' . $total_count . '</p>
            <p><strong>Total a pagar:</strong> ' . $prod_total . '</p>
            <p><strong>Cambio en el monedero virtual:</strong> ' . $cambio . '</p>
        </div>
    
        <h2>Detalles de los productos</h2>
        
        ' . $table_html . '
        <button onclick="confirmPurchase()">Terminar compra</button>
        <button onclick="generateReceipt()">Generar comprobante</button>
    </div>';
include "footer.php";
?>