<?php
      require('./conector.php');

      $con = new ConectorBD('localhost','admin','admin');



      $response['conexion'] = $con->initConexion('evalinteractuandocondb');

      if ($response['conexion']=='OK') {
        echo 'OK DB';
        $usuarios = [];
        $datos['nombre'] = "'Camila Bolivar'";
        $datos['psw'] = "'".password_hash("cbt1996", PASSWORD_DEFAULT)."'";
        $datos['email'] ="'lcbt@gmail.com'";
        $datos['fecha_nacimiento']="STR_TO_DATE('31/10/2010', '%d/%m/%Y')";
        array_push(  $usuarios,$datos);

        $datos['nombre'] = "'Luis López'";
        $datos['psw'] = "'".password_hash("lall1987", PASSWORD_DEFAULT)."'";
        $datos['email'] ="'lall@gmail.com'";
        $datos['fecha_nacimiento']="STR_TO_DATE('30/08/1987', '%d/%m/%Y')";
        array_push(  $usuarios,$datos);

        $datos['nombre'] = "'Laura López'";
        $datos['psw'] = "'".password_hash("lclb", PASSWORD_DEFAULT)."'";
        $datos['email'] ="'lclb@gmail.com'";
        $datos['fecha_nacimiento']="STR_TO_DATE('20/09/2017', '%d/%m/%Y')";
        array_push(  $usuarios,$datos);

        foreach ($usuarios as $value) {
          $resultado_consulta = $con->insertData('usuarios',$value);
        }
      }

        $con->cerrarConexion();


 ?>
