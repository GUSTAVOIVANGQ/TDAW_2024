<?php
  $boleta = $_POST["boleta"];

  $conexion = mysqli_connect("localhost", "root", "", "xyz");
  $sql = "SELECT * FROM estudiante WHERE boleta = '$boleta'";
  $res = mysqli_query($conexion, $sql);
  if(mysqli_num_rows($res) == 1){
    $respAX["cod"] = 1;
    $respAX["msj"] = "Bienvenido: ";
    $respAX["data"] = mysqli_fetch_assoc($res);
    $respAX["icono"] = "success";
  }else{
    $respAX["cod"] = 0;
    $respAX["msj"] = "Error. Favor de intentarlo nuevamente.";
    $respAX["data"] = null;
    $respAX["icono"] = "error";
  }

  echo json_encode($respAX);
?>