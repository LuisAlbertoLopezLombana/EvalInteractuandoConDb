<?php
  require('./conector.php');

  session_start();
  $con = new ConectorBD('localhost','admin','admin');
  $response['conexion'] = $con->initConexion('evalinteractuandocondb');
  $resultados;

  if ($response['conexion']=='OK') {


    $datos['title'] = "'".trim($_POST['titulo'])."'";
    $datos['start'] = "'".$_POST['start_date']."'";

    if($datos['title'] != "''" && $datos['start'] != "''"){

      $datos['start_hour'] = "'".$_POST['start_hour']."'";
      $datos['end'] = "'".$_POST['end_date']."'";
      $datos['end_hour'] = "'".$_POST['end_hour']."'";
      $datos['allDay'] = "'".$_POST['allDay']."'";
      $id_user = "'".$_SESSION['id']."'";
      $datos['id_usuario_fk'] = $id_user;
      if ($con->insertData('eventos', $datos)) {
        $resultados['msg'] = "OK";
      }else $resultados['msg'] = "Se ha producido un error en la inserción";
    }else{
        $resultados['msg'] = "Los campos [Título del evento] y la [Fecha inicio] son obligatorios";
    }


    $con->cerrarConexion();

  }else {
    $resultados['msg'] = "Se presentó un error en la conexión";
  }

  echo json_encode($resultados);


 ?>
