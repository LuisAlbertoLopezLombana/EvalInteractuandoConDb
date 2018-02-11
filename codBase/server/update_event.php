<?php

require('./conector.php');

session_start();
$con = new ConectorBD('localhost','admin','admin');
$response['conexion'] = $con->initConexion('evalinteractuandocondb');
$resultados;

if ($response['conexion']=='OK') {
  $condicion = 'id='.$_POST['id'];
  $datos['start'] = "'".$_POST['start_date']."'";
  $datos['end'] = "'".$_POST['end_date']."'";
  $datos['start_hour'] = "'".$_POST['start_hour']."'";
  $datos['end_hour'] = "'".$_POST['end_hour']."'";

    if ($con->actualizarRegistro('eventos', $datos, $condicion)) {
      $resultados['msg'] = "OK";
    }else $resultados['msg'] = "Se ha producido un error en la actualización";

  $con->cerrarConexion();

}else {
  $resultados['msg'] = "Se presentó un error en la conexión";
}

echo json_encode($resultados);


?>
