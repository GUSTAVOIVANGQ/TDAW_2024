<?php
  $boleta = $_POST["boleta"];
  $contrasena = $_POST["contrasena"];

  $conexion = mysqli_connect("localhost","root","","xyz");
  mysqli_query($conexion, "SET NAMES 'utf8'");
  $sql = "SELECT * FROM estudiante WHERE boleta = '$boleta' AND contrasena = '$contrasena'";
  $res = mysqli_query($conexion, $sql);
  if(mysqli_num_rows($res) == 1){
    $estudiante = mysqli_fetch_assoc($res);
    $respAX["cod"] = 1;
    $respAX["msj"] = "Bienvenido: ";
    $respAX["data"] = $estudiante["nombre"]." ".$estudiante["primerApe"]." ".$estudiante["segundoApe"];
    $respAX["icono"] = "success";
  }else{
    $respAX["cod"] = 0;
    $respAX["msj"] = "Error. Favor de intentarlo nuevamente.";
    $respAX["data"] = null;
    $respAX["icono"] = "error";
  }

  echo json_encode($respAX);
?>