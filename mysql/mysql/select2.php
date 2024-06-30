<?php
  $conexion = mysqli_connect("localhost","root","","xyz");
  mysqli_query($conexion,"SET NAMES utf8");
  $sql = "SELECT * FROM estudiante WHERE boleta = '2024630002'";
  $res = mysqli_query($conexion, $sql);
  
  echo json_encode(mysqli_fetch_assoc($res));
?>