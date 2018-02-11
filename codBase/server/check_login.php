<?php

require('./conector.php');
$con = new ConectorBD('localhost','admin','admin');

$response['conexion'] = $con->initConexion('evalinteractuandocondb');

if ($response['conexion']=='OK') {
  $tabla=['usuarios'];
  $campos=['id','email', 'psw'];
  $resultado_consulta = $con->consultar($tabla,$campos, 'WHERE email="'.$_POST['username'].'"');
  if ($resultado_consulta->num_rows != 0) {
    $fila = $resultado_consulta->fetch_assoc();
    $passw =$_POST['password'];
    $psw= $fila['psw'];
    if (password_verify($passw,$psw)) {
      $response['msg'] = 'OK';
      session_start();
      $_SESSION['username']=$fila['email'];
      $_SESSION['id']=$fila['id'];
    }else {
      $response['msg'] = 'Contraseña incorrecta';
      $response['acceso'] = 'rechazado';
    }
  }else{
    $response['msg'] = 'Email incorrecto';
    $response['acceso'] = 'rechazado';
  }
}

echo json_encode($response);

$con->cerrarConexion();


 ?>
