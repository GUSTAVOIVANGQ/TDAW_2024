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
    // Verificar si hay suficiente saldo en el monedero_virtual antes de realizar la operación
    if ($monedero_virtual >= $prod_total) {
        $stmt_insert = mysqli_prepare($con, "INSERT INTO orders (user_id, order_date, product_id, quantity, price, total_amount) VALUES (?, NOW(), ?, ?, ?, ?)");
        $stmt_update_stock = mysqli_prepare($con, "UPDATE products SET stock = stock - ? WHERE product_id = ?");
    while($i<=$total_count){// Ejecutar las operaciones de base de datos aquí
        $str=(string)$i;
        $product_id_ =$_POST['product_id_'.$i];
        $prod_qty_ = $_POST['prod_qty_'.$i];
        $prod_price_ = $_POST['prod_price_'.$i];
        $sub_total=(int)$prod_price_*(int)$prod_qty_;
        // imprime todos los valores de la orden de compra en echo
        /*
        echo "monedero_virtual: ".$monedero_virtual."<br>";
        echo "total_count: ".$total_count."<br>";
        echo "prod_price_: ".$_POST['prod_price_'.$i]."<br>";
        echo "prod_qty_: ".$_POST['prod_qty_'.$i]."<br>";
        echo "product_title_: ".$_POST['product_title_'.$i]."<br>";
        echo "product_id_: ".$_POST['product_id_'.$i]."<br>";
        echo "user_id: ".$_SESSION["uid"]."<br>";    
        */

        // Almacenar los detalles del producto
        $products[] = [
            'product_id' => $product_id_,
            'product_title' => $_POST['product_title_'.$i],
            'prod_qty' => $prod_qty_,
            'prod_price' => $prod_price_
        ];

        mysqli_stmt_bind_param($stmt_insert, "iiidd", $user_id, $product_id_, $prod_qty_, $prod_price_, $sub_total);
        mysqli_stmt_execute($stmt_insert);

        mysqli_stmt_bind_param($stmt_update_stock, "ii", $prod_qty_, $product_id_);
        mysqli_stmt_execute($stmt_update_stock);
        $i++;
    }

    mysqli_stmt_close($stmt_insert);
    mysqli_stmt_close($stmt_update_stock);

    $cambio = $monedero_virtual - $prod_total;
    $stmt_update_wallet = mysqli_prepare($con, "UPDATE user_info SET monedero_virtual = ? WHERE user_id = ?");
    mysqli_stmt_bind_param($stmt_update_wallet, "di", $cambio, $user_id);
    mysqli_stmt_execute($stmt_update_wallet);
    mysqli_stmt_close($stmt_update_wallet);
    $sql1 = "UPDATE user_info SET monedero_virtual = $cambio WHERE user_id = $user_id";
        if(mysqli_query($con,$sql1)){
            $del_sql="DELETE from cart where user_id=$user_id";
            if(mysqli_query($con,$del_sql)){
                // Almacenar los datos en la sesión para pasarlos a receipt.php
                $_SESSION['order'] = [
                    'f_name' => $f_name,
                    'email' => $email,
                    'city' => $city,
                    'state' => $state,
                    'total_count' => $total_count,
                    'prod_total' => $prod_total,
                    'cambio' => $cambio,
                    'products' => $products
                ];
                header("Location: summary.php");
            }else{
                echo(mysqli_error($con));
            }
        }else{
            echo(mysqli_error($con));
        }
        } else {
        // Cambio aquí: Usar JavaScript para mostrar un mensaje de alerta de saldo insuficiente
        echo "<script>alert('Saldo insuficiente en el monedero virtual.'); window.location.href='index.php';</script>";
        }

}else{
    echo"<script>window.location.href='index.php'</script>";
}
?>