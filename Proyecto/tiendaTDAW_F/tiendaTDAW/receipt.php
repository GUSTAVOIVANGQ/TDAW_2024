<?php
session_start();
require_once __DIR__ . '/mpdf/vendor/autoload.php';

if (isset($_SESSION['order'])) {
    $order = $_SESSION['order'];

    // Crear una instancia de la clase mPDF
    $mpdf = new \Mpdf\Mpdf(['format' => 'A4']);

    // Configuración de marca de agua
    $mpdf->showWatermarkText = true;
    $mpdf->WriteHTML('<watermarktext content="Poli Tienda" alpha="0.1" />');


    // HTML del documento
    $html = '
    <html>
        <head>
            <style>
                div.compra {
                    page-break-before: always;
                    page: compra;
                }
                @page {
                    odd-header-name: html_MyHeader; /* Nombre del encabezado */
                    odd-footer-name: html_MyFooter; /* Nombre del pie de página */
                }
            </style>
        </head>
        <body>
            <htmlpageheader name="MyHeader">
                <div style="text-align: right; border-bottom: 1px solid #000000; font-weight: bold; font-size: 10pt;">Recibo de compra</div>
            </htmlpageheader>

            <htmlpagefooter name="MyFooter">
                <table width="100%" style="vertical-align: bottom; font-family: serif; font-size: 8pt; color: #000000; font-weight: bold; font-style: italic;">
                    <tr>
                        <td width="33%"><span style="font-weight: bold; font-style: italic; color: #4e1818;">Poli Tienda</span></td>
                        <td width="33%" align="center" style="font-weight: bold; font-style: italic; color: #4e1818;">{PAGENO}/{nbpg}</td>
                        <td width="33%" style="text-align: right; color: #4e1818;">{DATE j-m-Y}</td>
                    </tr>
                </table>
            </htmlpagefooter>

            <div class="compra">
            <h1 style="text-align: center; background: #fffac2">Recibo de Compra</h1>
            <p>Nombre: ' . $order['f_name'] . '</p>
            <p>Email: ' . $order['email'] . '</p>
            <p>Ciudad: ' . $order['city'] . '</p>
            <p>Estado: ' . $order['state'] . '</p>
            <h2>Productos</h2>
            <ul>';
            // Construir la lista de productos
            foreach ($order['products'] as $product) {
                $html .= '<li>' . $product['product_title'] . ' - Cantidad: ' . $product['prod_qty'] . ' - Precio: $' . $product['prod_price'] . '</li>';
            }

            // Finalizar el contenido HTML
            $html .= '</ul>
            <h3>Total: $' . $order['prod_total'] . '</h3>
            <h3>Saldo Restante: $' . $order['cambio'] . '</h3>
            <h3 style="text-align: center; background: #D10024">Compra realizada con éxito</h3>
            </div>
        </body>
    </html>';

    $mpdf->WriteHTML($html);

    // Enviar PDF al navegador para descarga
    $mpdf->OutputHttpDownload('recibo.pdf');

    // Limpia los datos de la sesión
    unset($_SESSION['order']);

    // Mostrar el mensaje de éxito y redirigir a la tienda
    echo "<script>alert('Compra realizada con éxito. Su nuevo saldo es: " . $order['cambio'] . "'); window.location.href='store.php';</script>";
} else {
    echo "No hay datos de orden para generar el recibo.";
}
?>