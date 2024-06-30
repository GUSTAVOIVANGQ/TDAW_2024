<?php
session_start();
include "db.php";

if (isset($_SESSION["uid"])) {

	$f_name = $_POST["firstname"];
	$email = $_POST['email'];
	$address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $monedero_virtual = $_POST['monedero_virtual'];

    $user_id=$_SESSION["uid"];
    $total_count=$_POST['total_count'];
    $prod_total = $_POST['total_price'];

    $i=1;
    $prod_id_=0;
    $prod_price_=0;
    $prod_qty_=0;
    while($i<=$total_count){
        $str=(string)$i;
        $prod_price_+$str = $_POST['prod_price_'.$i];
        $prod_qty_+$str = $_POST['prod_qty_'.$i];
        $sub_total=(int)$prod_price_+$str*(int)$prod_qty_+$str;
        $cambio = (int)$monedero_virtual - (int)$prod_total;
        $p_id =$_POST['product_id_'.$i];
        // imprime todos los valores de la orden de compra en echo
        echo "monedero_virtual: ".$monedero_virtual;
        echo "total_count: ".$total_count;
        echo "prod_price_: ".$_POST['prod_price_'.$i];
        echo "prod_qty_: ".$_POST['prod_qty_'.$i];
        echo "product_title_: ".$_POST['product_title_'.$i];
        echo "product_id_: ".$p_id;
        

        $i++;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Orden de Compra</title>
</head>
<body>
    <div class="container">
        <h2>Orden de Compra</h2>
        <h3>Detalles de la Orden</h3>
        <table>
        <tr>
                <th>Nombre</th>
                <td><?php echo $_SESSION["uid"]; ?></td>
            </tr>
        <tr>
                <th>Nombre</th>
                <td><?php echo $f_name; ?></td>
            </tr>
            <tr>
                <th>Correo</th>
                <td><?php echo $email; ?></td>
            </tr>
            <tr>
                <th>Dirección</th>
                <td><?php echo $address; ?></td>
            </tr>
            <tr>
                <th>Ciudad</th>
                <td><?php echo $city; ?></td>
            </tr>
            <tr>
                <th>Estado</th>
                <td><?php echo $state; ?></td>
            </tr>
            <tr>
                <th>Saldo Monedero</th>
                <td><?php echo $monedero_virtual; ?></td>
            </tr>
            <tr>
                <th>Total de Productos</th>
                <td><?php echo $total_count; ?></td>
            </tr>
            <tr>
                <th>Total a Pagar</th>
                <td><?php echo $prod_total; ?></td>
            </tr>
            <tr>
                <th>cambio</th>
                <td><?php echo $cambio; ?></td>
            </tr>
        </table>
    </div>

</body>
</html>