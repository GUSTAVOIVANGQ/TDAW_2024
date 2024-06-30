<?php
  $conexion = mysqli_connect("localhost","root","","xyz");
  mysqli_query($conexion,"SET NAMES utf8");
  $sql = "SELECT * FROM estudiante";
  $res = mysqli_query($conexion, $sql);
  $arrayFilas = [];
  while($fila = mysqli_fetch_assoc($res)){
    $arrayFilas[] = $fila;
  }

  $jsonFilas = json_encode($arrayFilas);
  echo $jsonFilas;
?>