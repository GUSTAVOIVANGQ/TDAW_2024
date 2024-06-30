<?php
  $conexion = mysqli_connect("localhost","root","","xyz");
  mysqli_query($conexion,"SET NAMES utf8");
  $check = "SELECT * FROM estudiante WHERE boleta = '2024630003'";
  $resCheck = mysqli_query($conexion, $check);
  $respBD = [];
  if(mysqli_num_rows($resCheck) == 0){
    $sql = "INSERT INTO estudiante VALUES('2024630003','Luis','López','López','luis@luis.com',MD5('luisLopez1*'),NOW())";
    $res = mysqli_query($conexion, $sql);
    if(mysqli_affected_rows($conexion) == 1){
      $respBD["cod"] = 1;
      $respBD["msj"] = "Se agregó correctamente el nuevo alumno.";
    }else{
      $respBD["cod"] = 0;
      $respBD["msj"] = "Error. Favor de intentarlo nuevamente.";
    }
  }else{
    $respBD["cod"] = 2;
    $respBD["msj"] = "Error. Alumno ya registrado. Favor de intentarlo nuevamente";
  }
  
  echo json_encode($respBD);
?>