<?php
require('./conector.php');

session_start();

$con = new ConectorBD('localhost','admin','admin');

$response['conexion'] = $con->initConexion('evalinteractuandocondb');
$resultados;

if ($response['conexion']=='OK') {
  $tabla=['usuarios u, eventos e'];
  $campos=['*'];
  $user = "'".$_SESSION['username']."'";
  $condicion = ' WHERE u.id = e.id_usuario_fk AND u.email = '.$user;
  if ($resultado_consulta = $con->consultar($tabla,$campos,$condicion)) {
    $resultados['msg'] = 'OK';
    $eventos = [];
    while($fila = $resultado_consulta->fetch_assoc()){
          $fila['start'] .= 'T'.$fila['start_hour'];
          $fila['end'] .= 'T'.$fila['end_hour'];
          $fila['allDay'] = $fila['allDay'] == 0 ? false : true;
          array_push(  $eventos,$fila);
    }
    $resultados['eventos'] =  $eventos;
  }else $resultados['msg'] = "Hubo un problema y los registros no fueron consultados";
}

echo json_encode($resultados);

$con->cerrarConexion();



 ?>
