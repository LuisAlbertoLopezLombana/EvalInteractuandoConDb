<?php

  require('./conector.php');

  session_start();
  $con = new ConectorBD('localhost','admin','admin');
  $response['conexion'] = $con->initConexion('evalinteractuandocondb');
  $resultados;

  if ($response['conexion']=='OK') {
    $datos = 'id='.$_POST['id'];

      if ($con->eliminarRegistro('eventos', $datos)) {
        $resultados['msg'] = "OK";
      }else $resultados['msg'] = "Se ha producido un error en la eliminación";

    $con->cerrarConexion();

  }else {
    $resultados['msg'] = "Se presentó un error en la conexión";
  }

  echo json_encode($resultados);

 ?>
