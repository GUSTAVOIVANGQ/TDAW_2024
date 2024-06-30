<?php
  $conexion = mysqli_connect("localhost","root","","xyz");
  mysqli_query($conexion,"SET NAMES utf8");
  $check = "SELECT * FROM estudiante WHERE boleta = '2024630003'";
  $resCheck = mysqli_query($conexion, $check);
  $respBD = [];
  if(mysqli_num_rows($resCheck) == 1){
    $sql = "DELETE FROM estudiante WHERE boleta = '2024630003'";
    $res = mysqli_query($conexion, $sql);
    if(mysqli_affected_rows($conexion) == 1){
      $respBD["cod"] = 1;
      $respBD["msj"] = "Se eliminó correctamente el alumno.";
    }else{
      $respBD["cod"] = 0;
      $respBD["msj"] = "Error. Favor de intentarlo nuevamente.";
    }
  }else{
    $respBD["cod"] = 2;
    $respBD["msj"] = "Error. Alumno no registrado. Favor de intentarlo nuevamente";
  }
  
  echo json_encode($respBD);
?>